// ajax Setup
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function(){

    // 텍스트 박스에 앞뒤 공백을 없애준다.
	$("input[type='text'], textarea").blur(function(){
		var text = $.trim($(this).val());
		$(this).val(text);
	});

	// datepicker
	jQuery(function(a){a.datepicker.regional.ko={closeText:"닫기",prevText:"이전달",nextText:"다음달",currentText:"오늘",monthNames:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],monthNamesShort:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],dayNames:["일","월","화","수","목","금","토"],dayNamesShort:["일","월","화","수","목","금","토"],dayNamesMin:["일","월","화","수","목","금","토"],weekHeader:"Wk",dateFormat:"yy-mm-dd",firstDay:0,isRTL:false,showMonthAfterYear:false,yearSuffix:"년"};a.datepicker.setDefaults(a.datepicker.regional.ko)});
	$('.dateCalendar').datepicker({showMonthAfterYear:true, changeMonth: true,	changeYear: true,	dateFormat: "yy-mm-dd", yearRange: 'c-100:c+3', minDate: new Date()});

    $(document).on("change",".engOnly", function() {
		var ex = /[^A-Za-z_\`\~\!\@\#\$\%\^\&\*\(\)\-\=\+\\\{\}\[\]\'\"\;\:\<\,\>\.\?\/\s]/gm;
		  if( ex.test( $(this).val() ) ) {
				alert('Please enter English only.');
			  	$(this).val( $(this).val().replace( ex, '' ) ).focus();
		  }
	});

	$(document).on("change",".engNumOnly", function() {
		var ex = /[^a-zA-Z0-9\s]/gm;
		  if( ex.test( $(this).val() ) ) {
				alert('Please enter English only.');
			  	$(this).val( $(this).val().replace( ex, '' ) ).focus();
		  }
	});

	$(document).on("change",".numOnly", function() {
		var ex = /[^0-9\+\-\s]/gm;
		if( ex.test( $(this).val() ) ) {
			alert('Please enter Number only.');
			$(this).val( $(this).val().replace( ex, '' ) ).focus();
		}
	});

    $(document).on("change",".korOnly", function() {
		var ex = /[^ㄱ-ㅎ|ㅏ-ㅣ|가-힣\s]/gm;
		if( ex.test( $(this).val() ) ) {
			alert('한글만 입력해 주세요.');
			$(this).val( $(this).val().replace( ex, '' ) ).focus();
		}
	});

	$(document).on("change",".emailOnly", function() {
		if( !isCorrectEmail( $(this).val() ) ) {
			alert('Email address seems incorrect (check @ and .’s)');
			$(this).val('').focus();
		}
	});

	$(".Load_Base_fix").on('click',function(){
		var W_custom = $(this).attr('Wsize');
		var H_custom = $(this).attr('Hsize');
		var T_custom = $(this).attr('Tsize');
		var Reload = $(this).attr('Reload');
		var Browser_W = $(window).width();
		var Browser_H = $(window).height();

		var Active = $(this).attr('Active') ?? 'Y';
		if( Active == "N" ){ return false;}

		if((Browser_H-50)<H_custom){
			H_custom = "90%;";
		}
		if((Browser_W-50)<W_custom){
			W_custom = "80%;";
		}
		if(Reload=='Y'){
			$(".Load_Base_fix").colorbox({iframe:true, transition:"fade", width:W_custom, maxWidth:"100%", height:H_custom, maxHeight:"100%", top:T_custom,speed:150,fixed:true,closeButton:false,overlayClose:true,scrolling:true,escKey:true,opacity:0.5,reposition:true,onClosed:function(){
				location.reload();
			}});	
		}else if(Reload=='L'){
			$(".Load_Base_fix").colorbox({iframe:true, transition:"fade", width:W_custom, maxWidth:"100%", height:H_custom, maxHeight:"100%", top:T_custom,speed:150,fixed:true,closeButton:false,overlayClose:true,scrolling:true,escKey:true,opacity:0.5,reposition:true,onClosed:function(){
				
			}});
		}else{
			$(".Load_Base_fix").colorbox({iframe:true, transition:"fade", width:W_custom, maxWidth:"100%", height:H_custom, maxHeight:"100%", top:T_custom,speed:150,fixed:true,closeButton:false,overlayClose:true,scrolling:true,escKey:true,opacity:0.5,reposition:true});
		}
	});
	
	$(document).on("click",".colorClose",function(){
		parent.$.colorbox.close();
	});

	$("#allCheck").click(function(){
		if( $(this).is(":checked") ){
			$("input:checkbox[name='listSid[]']").prop('checked',true);
		}else{
			$("input:checkbox[name='listSid[]']").prop('checked',false);
		}
	});

});

function toFirstOpper(f){

	var orgStr = $(f).val();
	
	//무조건 소문자 변환 후 첫글자 대문자 처리
	orgStr = orgStr.toLowerCase();
	$(f).val(orgStr);

	if(orgStr != ''){

		var result = '';
		var result2 = '';
		var objStr = new Object();
		var objStr2 = new Object();
		var delim = ' ';

		objStr = orgStr.split(delim);

		for( var i=0; i < objStr.length; i++) {
			objStr[i] = objStr[i].substr(0,1).toUpperCase() + objStr[i].substr(1,objStr[i].length);
			result = result + objStr[i]+" ";
		}

		//alert(result);return false;
		result = $.trim(result);
		//First Name의 - 기호 구분시 첫 문자를 대문자로 치환
		delim = '-';
		objStr2 = result.split(delim);

		for( var i=0; i < objStr2.length; i++) {
			objStr2[i] = objStr2[i].substr(0,1).toUpperCase() + objStr2[i].substr(1,objStr2[i].length);
			result2 = result2 + objStr2[i];
			if (i < objStr2.length-1) result2 = result2 + "-";
		}

		result2 = $.trim(result2);
		$(f).val(result2);
	}
	return result2;

}

function toAllOpper(f){
	var orgStr = $(f).val();
	if(orgStr != ''){
		var result = orgStr.toUpperCase();
		$(f).val(result);
	}
}

function file_check(file, name){
	if( file && $("#"+name).is(":checked") == false ){
		alert("There are already files attached. Please check for deletion and change it.");
		return false;
	}else{
		return true;
	}
}

function openDaumPostcode(kind){
	if( kind == "office" ){
		var space = "office_";
	}else if( kind == "home" ){
		var space = "home_";
	}else{
		var space = "";
	}

	new daum.Postcode({
		oncomplete: function(data) {
			$(":text[name='"+space+"zipcode']").val(data.zonecode);
			$(":text[name='"+space+"addr']").val(data.address).focus();
		}
	}).open();
}

// file accept check
const fileAcceptCheck = (_this, fileTxt, msg = null) => {
    const extArr = $(_this).attr('accept').replace(/\s+/g, '').split(',');
    const ext = '.' + $(_this).val().split('.').pop().toLowerCase();

    if ($.inArray(ext, extArr) == -1) {
        if (!msg) {
            msg = (ext + ' 파일은 업로드 하실 수 없습니다.');
        }
        
        $(_this).val('');
        $('#' + fileTxt).val('');
        alert(msg);
        return false;
    }

    return true;
}

// Refresh captcha
const refreshCaptcha = () => {
	$.ajax({
        type: 'POST',
        url: '/common/captcha-make',
        success: function(data) {
			$('#captcha').val('');
            $('#captcha_img').attr('src', data);
        }
    });
}

function isCorrectEmail(email) {
	if(!email) return false;
	return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(email);
}

const swalAlert = function(title, msg, type, target){

	formattedWidth = swalTitleWidth(title);
	
	Swal.fire({ 
		icon: type,
		title: title, 
		text: msg,
		width: formattedWidth,
		allowOutsideClick: false, 
		didClose: () => {
			$("#"+target).focus(); 
		}
	});
}

const swalConfirm = function(title, msg, callback){

	formattedWidth = swalTitleWidth(title);

	Swal.fire({ 
		icon: 'question',
		title: title, 
		text: msg, 
		width: formattedWidth,
		allowOutsideClick: false,
		confirmButtonText: '확인',
		showCancelButton: true,
		cancelButtonText: '취소'
	}).then( result => {
		if( result.isConfirmed ){
			if (callback) { callback(); }
		}
	});
}

const swalTitleWidth = function(title){

	inputText = title;
	font = "1rem";

	canvas = document.createElement("canvas");
	context = canvas.getContext("2d");
	context.font = font;
	width = context.measureText(inputText).width;
	formattedWidth = Math.ceil(width) + 200;

	return formattedWidth;

}