var emailCheckValue = false;

$(document).ready(function(){

    $(".savePrev").click(function(){
        $("#saveMode").val("prev");
        $("#registrationForm").submit();
    })

    $(".saveNext").click(function(){
        $("#saveMode").val("next");
        $("#registrationForm").submit();
    })

    $(".saveImsi").click(function(){
        $("#saveMode").val("imsi");
        $("#registrationForm").submit();
    })

    $("#ccode").change(function(){
        var cnum = $("#ccode").find("option:selected").data("cnum");
        var cc   = $("#ccode").val();

        $("#cnum").val(cnum);
        if( cc == "KR" ){
            $(".korBox").show();
        }else{
            $(".korBox").find("input:text").val("");
            $(".korBox").hide();
        }
    });

    $("input:radio[name='category']").click(function(){
        if( $(this).val() == "B" ){
            $(".studentBox").show();
        }else{
            $(".studentBox").find("input:file").val("");
            $(".studentBox").hide();
        }
    });

    $("input:radio[name='attendType']").click(function(){
        if( $(this).val() == "O" ){
            $(".oneDayBox").show();
        }else{
            $(".oneDayBox").find("input:checkbox").attr("checked",false);
            $(".oneDayBox").hide();
        }
    });

    $("input:radio[name='title']").click(function(){
        if( $(this).val() == "Z" ){
            $("#title_etc").attr("disabled",false);
        }else{
            $("#title_etc").val("").attr("disabled",true);
        }
    });

    $("input:radio[name='payMethod']").click(function(){
        if( $(this).val() == "B" ){
            $(".Bbox").show();
        }else{
            $(".Bbox").find("input:text").val("");
            $(".Bbox").hide();
        }
    });

});

function emailCheck()
{
    let email = $("#email").val();

    if( !email ){
        swalAlert("이메일을 입력해주세요.", "", "warning", "email");
        return false;
    }

    if( !isCorrectEmail(email) ){
        swalAlert("이메일 규칙에 맞지 않습니다. (check @ and .’s)", "", "warning", "email");
        return false;
    }
    
    $.ajax({
        type: 'POST',
        url: '/registration/emailCheck',
        data: { email : email },
        async: false,
        success: function(data) {
			if( $.trim(data) == "already" ){
                swalAlert("이미 사용된 이메일입니다<br>다른 이메일로 다시 시도해주시기 바랍니다.", "", "warning", "email");
                emailCheckValue = false;
            }else{
                swalAlert("사용 가능합니다.", "", "success", "email");
                emailCheckValue = true;
            }
        }
    });

    return false;
}

function makePrice(lang){

    var type = $("input:hidden[name='type']").val();
    var category = $("input:radio[name='category']:checked").val();
    var attendType = $("input:radio[name='attendType']:checked").val();
    var accompanying = $("input:radio[name='accompanying']:checked").val();
    var banquet = $("input:radio[name='banquet']:checked").val();
    var oneDay = "";

    $("input:checkbox[name='oneDay[]']").each(function(index){
        if( $(this).is(":checked") ){
            oneDay += (oneDay?',':'')+$(this).val();
        }
    });
    
    priceProcess(type, lang, category, attendType, accompanying, banquet, oneDay);
}

function priceProcess(type, lang, category, attendType, accompanying, banquet, oneDay)
{
    $.ajax({
        type: 'POST',
        url: '/registration/makePrice',
        data: { 
                type : type,
                lang : lang,
                category : category,
                attendType : attendType,
                accompanying : accompanying,
                banquet : banquet,
                oneDay : oneDay
              },
        async: false,
        success: function(data) {
			$(".totalPriceSpan").html(data.priceUnit);
            $("#price").val(data.price);
            $(".priceText").html(data.priceText);
        }
    });    
}

function registrationCheck_01(f)
{
    if( !$("input:hidden[name='sid']").val() ){
        if( !$(f.ccode).val() ){
            swalAlert("국가를 선택해주세요.", "", "warning", "ccode");
            return false;
        }
        if( !$(f.email).val() ){
            swalAlert("이메일을 입력해주세요.", "", "warning", "email");
            return false;
        }
    
        if( !emailCheckValue ){
            swalAlert("이메일 확인을 진행해주세요.", "", "warning", "email");
            return false;
        }
    }
    if( !$("input:radio[name='title']").is(":checked") ){
        swalAlert("Title을 선택해주세요.", "", "warning", "titleA");
        return false;
    }else{
        if( $("input:radio[name='title']:checked").val() == "Z" ){
            if( !$(f.title_etc).val() ){
                swalAlert("Title Other을 입력해주세요.", "", "warning", "title_etc");
                return false;
            }
        }
    }
    if( !$("input:radio[name='degree']").is(":checked") ){
        swalAlert("Degree를 선택해주세요.", "", "warning", "degreeA");
        return false;
    }
    if( $(f.ccode).val() == "KR" && !$(f.name).val() ){
        swalAlert("성명 (국문)을 입력해주세요.", "", "warning", "name");
        return false;
    }
    if( !$(f.firstName).val() ){
        swalAlert("성명 (영문)을 입력해주세요.", "", "warning", "firstName");
        return false;
    }
    if( !$(f.lastName).val() ){
        swalAlert("성명 (영문)을 입력해주세요.", "", "warning", "lastName");
        return false;
    }
    if( !$(f.department).val() ){
        swalAlert("부서를 입력해주세요.", "", "warning", "department");
        return false;
    }
    if( !$(f.affiliation).val() ){
        swalAlert("소속을 입력해주세요.", "", "warning", "affiliation");
        $(f.affiliation).focus();
        return false;
    }
    if( !$(f.cnum).val() || !$(f.mobile).val() ){
        swalAlert("연락처를 입력해주세요.", "", "warning", "cnum");
        return false;
    }

    var captcha = $("#captcha").val();
    var captchaCheck = true;

    if( !captcha ){
        swalAlert("자동화 프로그램 입력 방지 번호를 입력해주세요.", "", "warning", "captcha");
        return false;
    }

    $.ajax({
        type: 'POST',
        url: '/common/captcha-check',
        data: { captcha : captcha },
        async: false,
        success: function(data) {
			if( $.trim(data) == "fail" ){
                captchaCheck = false;
            }
        }
    });
    
    if( !captchaCheck ){
        swalAlert("자동화 프로그램 입력방지 인증에 실패하였습니다.", "", "warning", "captcha");
        return false;
    }
}

function registrationCheck_02(f)
{
    if( !$("input:radio[name='category']").is(":checked") ){
        swalAlert("구분을 선택해주세요.", "", "warning", "categoryA");
        return false;
    }
    if( !$("input:radio[name='attendType']").is(":checked") ){
        swalAlert("참석 구분을 선택해주세요.", "", "warning", "attendTypeF");
        return false;
    }else{
        if( $("input:radio[name='attendType']:checked").val() == "O" ){
            if( !$("input:checkbox[name='oneDay[]']").is(":checked") ){
                swalAlert("원하는 날짜를 선택해주세요.", "", "warning", "oneDayA");
                return false;
            }
        }
    }
    if( !$("input:radio[name='accompanying']").is(":checked") ){
        swalAlert("Accompanying Person을 선택해주세요.", "", "warning", "accompanyingN");
        return false;
    }
    if( !$("input:radio[name='banquet']").is(":checked") ){
        swalAlert("Banquet를 선택해주세요.", "", "warning", "banquetN");
        return false;
    }
    if( $("input:radio[name='category']:checked").val() == "B" ){
        if( $("#delfile").length > 0 ){
            if( $(f.userfile).val() == "" && $("#delfile").is(":checked") ){
                swalAlert("학생 증빙 자료 제출을 해주세요.", "", "warning", "userfile");
                return false;
            }
        }else{
            if( $(f.userfile).val() == "" ){
                swalAlert("학생 증빙 자료 제출을 해주세요.", "", "warning", "userfile");
                return false;
            }
        }
    }
    
    var captcha = $("#captcha").val();
    var captchaCheck = true;

    if( !captcha ){
        swalAlert("자동화 프로그램 입력 방지 번호를 입력해주세요.", "", "warning", "captcha");
        return false;
    }

    $.ajax({
        type: 'POST',
        url: '/common/captcha-check',
        data: { captcha : captcha },
        async: false,
        success: function(data) {
			if( $.trim(data) == "fail" ){
                captchaCheck = false;
            }
        }
    });
    
    if( !captchaCheck ){
        swalAlert("자동화 프로그램 입력방지 인증에 실패하였습니다.", "", "warning", "captcha");
        return false;
    }
}

function registrationCheck_03(f)
{
    if( !$("input:radio[name='payMethod']").is(":checked") ){
        swalAlert("등록비 결제수단을 선택해주세요.", "", "warning", "payMethodC");
        return false;
    }else{
        if( $("input:radio[name='payMethod']:checked").val() == "B" ){  
            if( !$(f.payName).val() ){
                swalAlert("송금자명을 입력해주세요.", "", "warning", "payName");
                return false;
            }
            if( !$(f.payDate).val() ){
                swalAlert("송금예정일을 입력해주세요.", "", "warning", "payDate");
                return false;
            }
        }
    }

    var captcha = $("#captcha").val();
    var captchaCheck = true;

    if( !captcha ){
        swalAlert("자동화 프로그램 입력 방지 번호를 입력해주세요.", "", "warning", "captcha");
        return false;
    }

    $.ajax({
        type: 'POST',
        url: '/common/captcha-check',
        data: { captcha : captcha },
        async: false,
        success: function(data) {
			if( $.trim(data) == "fail" ){
                captchaCheck = false;
            }
        }
    });
    
    if( !captchaCheck ){
        swalAlert("자동화 프로그램 입력방지 인증에 실패하였습니다.", "", "warning", "captcha");
        return false;
    }

    if( $("input:radio[name='payMethod']:checked").val() == "C" && $("input:hidden[name='adminMode']").val() != "Y" ){
        startPayment();
        return false;
    }
}

function registrationSearchCheck(f)
{
    if( !$(f.searchCcode).val() ){
        swalAlert("Please select Country.", "", "warning", "searchCcode");
        return false;
    }
    if( !$(f.searchEmail).val() ){
        swalAlert("Please enter the Email.", "", "warning", "searchEmail");
        return false;
    }
    var email = $(f.searchEmail).val();
    if( !isCorrectEmail(email) ){
        swalAlert("Email address seems incorrect (check @ and .’s)", "", "warning", "searchEmail");
        return false;
    }
}