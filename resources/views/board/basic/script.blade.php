@push('css')
<link type="text/css" rel="stylesheet" href="/devScript/plupload/2.3.6/jquery.plupload.queue/css/jquery.plupload.queue.css" />
@endpush
@push('scripts')
<script src="/devScript/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="/devScript/plupload/2.3.6/plupload.full.min.js"></script>
<script src="/devScript/plupload/2.3.6/i18n/ko.js"></script>
<script src="/devScript/plupload/2.3.6/jquery.plupload.queue/jquery.plupload.queue.min.js" ></script>
<script>
$(document).ready(function(){    

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
                'removeformat | help',
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
        }
   });
   
   $('#plupload').pluploadQueue({
        runtimes : 'html5,flash',
        flash_swf_url : '/script/Moxie.swf',
        silverlight_xap_url : '/script/Moxie.xap',
        url : '{{ route('plUpload', ['directory'=>'board/'.$code]) }}',
        dragdrop: true,
        headers: {
            Accept: 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        filters : {
            max_file_size : '20mb'
        },
        init: {
            PostInit: function(up) {
                $(up.getOption('container')).find('.plupload_button.plupload_start').hide();
            },
            Error: function (up, err) {
                if (err.code === plupload.HTTP_ERROR) {
                    up.stop();
                    swalAlert('파일 업로드 에러 - ' + err.message, '', 'error');
                }
            },
            FileUploaded: function (up, file, info) {
                var data = JSON.parse(info.response);

                if (data.realfile !== undefined) {
                    var file_index = $('#' + file.id).index();
                    $('#plupload').append('<input type="hidden" name="plupload_' + file_index + '_stored_path" value="' + data.realfile + '" />');
                }
            }
        }
    });

    $("input:radio[name='popup']").click(function(){

        var value = $(this).val();

        if( value == "Y" ){
            $(".popupBox").show();
        }else{
            $(".popupBox").find("input:radio").attr("checked",false);
            $(".popupBox").find("input:text").val("");
            $(".popupBox, .popupDetailBox").hide();
        }

    });

    $("input:radio[name='popup_detail']").click(function(){

        var value = $(this).val();

        if( value == "Y" ){
            $(".popupDetailBox").show();
        }else{            
            $(".popupDetailBox").find("input:text").val("");
            $(".popupDetailBox").hide();
        }
        
    });

    $("input:radio[name='popup_select']").click(function(){

        var value = $(this).val();

        if( value == "2" ){
            $(".popupContentBox").show();
        }else{
            tinymce.get("popup_content").setContent("");
            $(".popupContentBox").hide();
        }

    });

});

function preview(){

    var subject = $("#subject").val();
    var width = $("#width").val();
    var height = $("#height").val();
    var top = $("#position_y").val();
    var left = $("#position_x").val();

    if( subject == "" ){
        swalAlert("제목을 입력해주세요.", "", "warning", "subject");
        return false;
    }

    if( $("input:radio[name='popup_select']:checked").val() == "1" ){
        var tiny_text = tinymce.get("content").getContent("");
    }else{
        var tiny_text = tinymce.get("popup_content").getContent("");
    }

    tiny_text = tiny_text.replace(/(<([^>]+)>)/ig,"");
    tiny_text = tiny_text.replace(/<br\/>/ig, "\n");
    tiny_text = tiny_text.replace(/<(\/)?([a-zA-Z]*)(\s[a-zA-Z]*=[^>]*)?(\s)*(\/)?>/ig, "");
    
    if(!$.trim(tiny_text)){
        swalAlert('내용을 입력해 주세요.', "", "warning");
        return false;
    }

    var f = document.getElementById("bbs_form");
    var newWin = window.open("", "popUpPreview", "width=" + width + ",height=" + height + ",top=" + top+ ",left=" + left  + ",scrollbars=yes,resizable=yes");
    f.target = "popUpPreview";
    f.action = "{{ route('board.popupPreview', $code) }}";
    f.submit();

    f.action = "{{ route('board.upsert', ['code'=>$code, 'sid'=>!empty($data)?base64_encode($data['sid']):'']) }}"; //다시 액션값 원상복구
}

function check_bbs(f){

    if( $(f.name).val() == "" ){
        swalAlert("작성자를 입력해주세요.", "", "warning", "name");
        return false;
    }
    
    // if( $(f.email).val() == "" ){
    //     swalAlert("이메일을 입력해주세요.", "", "warning", "email");
    //     return false;
    // }

    @if( config('site.board')[$code]['UseCategory'] && !isset($parent_data) )
    if( !$("input:radio[name='category']").is(":checked") ){
        swalAlert("카테고리를 선택해주세요.", "", "warning", "categoryA");
        return false;
    }
    @endif

    if( $(f.subject).val() == "" ){
        swalAlert("제목을 입력해주세요.", "", "warning", "subject");
        return false;
    }

    @if( config('site.board')[$code]['UsePopup'] && !isset($parent_data) )
    if( !$("input:radio[name='popup']").is(":checked") ){
        swalAlert("팝업설정 유무를 선택해주세요.", "", "warning", "popupY");
        return false;
    }
    if( $("input:radio[name='popup']:checked").val() == "Y" ){
        if( !$("input:radio[name='popup_skin']").is(":checked") ){
            swalAlert("팝업 스킨을 선택해주세요.", "", "warning", "popup_skin1");
            return false;
        }
        if( !$("input:radio[name='popup_detail']").is(":checked") ){
            swalAlert("팝업 자세히보기 설정 유무를 선택해주세요.", "", "warning", "popup_detailY");
            return false;
        }
        if( $(f.popup_sdate).val() == "" || $(f.popup_edate).val() == "" ){
            swalAlert("팝업 시작일, 종료일을 설정해주세요.", "", "warning", "popup_sdate");
            return false;
        }
    }
    @endif

    var tiny_text = tinymce.get("content").getContent("");
    tiny_text = tiny_text.replace(/(<([^>]+)>)/ig,"");
    tiny_text = tiny_text.replace(/<br\/>/ig, "\n");
    tiny_text = tiny_text.replace(/<(\/)?([a-zA-Z]*)(\s[a-zA-Z]*=[^>]*)?(\s)*(\/)?>/ig, "");
    
    if(!$.trim(tiny_text)){
        swalAlert('내용을 입력해 주세요.', '', 'warning');
        return false;
    }

    //파일업로드 사용
    @if( config('site.board')[$code]['UseFile'] )
    var $plupload_queue = $('#plupload').pluploadQueue();
    
    if ($plupload_queue.files.length > 0) {
        $plupload_queue.bind('UploadComplete', function(up, files) {
            if ($plupload_queue.total.failed === 0) {
                $("#bbs_form").attr("onsubmit","");
                $("#bbs_form").submit();
            }
        });

        $plupload_queue.start();         
    } else {
        return true;
    }

    return false;
    @else
    return true;
    @endif

}
</script>
@endpush