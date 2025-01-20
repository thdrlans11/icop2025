@push('scripts')
<script src="/devScript/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
const tinymce_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '/common/tinyUpload');

    xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
    };

    xhr.onload = () => {
        if (xhr.status === 403) {
            reject({message: 'HTTP Error: ' + xhr.status, remove: true});
            return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
        }

        const json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
        }

        resolve(json.location);
    };

    xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };

    const formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
    formData.append('_token', $('meta[name=csrf-token]').attr('content'));

    xhr.send(formData);
});

tinymce.init({
    selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
    language: 'ko_KR',
    plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help | wordcount',
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,        
    image_class_list: [
        {title: 'img-responsive', value: 'img-responsive'},
    ],
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',

    paste_webkit_styles: 'all',  // 웹킷 스타일 유지

    images_upload_handler: tinymce_image_upload_handler,
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);                    
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
        };
        input.click();
    },
    setup: function(editor) {

        editor.on('init', function(args) {
            if ($('#max_words').length > 0) {
                let tinymceVal = editor.getContent(); // 내용 가져오기
                tinymceVal = tinymceVal.replace(/<[^>]*>?/g, ""); // html 태그 삭제
                tinymceVal = tinymceVal.replace(/\&nbsp;/g, ' '); // &nbsp 삭제

                const countLength = tinymceVal.split(' ').length;

                const wordcount = tinymce.activeEditor.plugins.wordcount;
                
                const editorName = editor.getElement().getAttribute('name');
                const lengthCheckEditor = [
                    'content'
                ];

                if (lengthCheckEditor.includes(editorName)) {
                    let tinywordCnt = 0;
                    const maxLength = 300;

                    $('#' + editor.id).closest('div').find('.tinyword-cnt').val(countLength)

                    $('.tinyword-cnt').each(function (k, v) {
                        tinywordCnt += parseInt($(v).val());
                    });

                    if (tinywordCnt > maxLength) {
                        editor.setContent('');
                        alert('The content should be less than ' + maxLength + ' characters.');
                    }

                    $('#max_words').html(tinywordCnt);
                }
            }
        });

        editor.on('keyup', function(e) {
            if ($('#max_words').length > 0) {
                let tinymceVal = editor.getContent(); // 내용 가져오기
                tinymceVal = tinymceVal.replace(/<[^>]*>?/g, ""); // html 태그 삭제
                tinymceVal = tinymceVal.replace(/\&nbsp;/g, ' '); // &nbsp 삭제

                const countLength = tinymceVal.split(' ').length;

                const wordcount = tinymce.activeEditor.plugins.wordcount;
                
                const editorName = editor.getElement().getAttribute('name');
                const lengthCheckEditor = [
                    'content'
                ];

                if (lengthCheckEditor.includes(editorName)) {
                    let tinywordCnt = 0;
                    const maxLength = 300;

                    $('#' + editor.id).closest('div').find('.tinyword-cnt').val(countLength)

                    $('.tinyword-cnt').each(function (k, v) {
                        tinywordCnt += parseInt($(v).val());
                    });

                    if (tinywordCnt > maxLength) {
                        editor.setContent('');
                        alert('The content should be less than ' + maxLength + ' characters.');
                    }

                    $('#max_words').html(tinywordCnt);
                }
            }
        });
    }
});

const tinyEmptyCheck = (target) => {
    let tinymceVal = tinymce.get(target).getContent(); // 내용 가져오기
    tinymceVal = tinymceVal.replace(/<[^>]*>?/g, ""); // html 태그 삭제
    tinymceVal = tinymceVal.replace(/\&nbsp;/g, ' '); // &nbsp 삭제

    return isEmpty(tinymceVal);
}

const isEmpty = (str) => {
    if (typeof str === 'string') {
        str = str.replace(/ /g, ''); // 공백 제거
        str = str.replace(/\n/g, ""); // 줄바꿈 제거
    }

    return (typeof str === "undefined" || str === null || str === "") ? true : false;
}
</script>
@endpush