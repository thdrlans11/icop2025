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

        if( $(this).val() == "C" ){
            swalAlert("Comming Soon!", "", "info");
            return false;
        }

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
        swalAlert("Please enter your Email.", "", "warning", "email");
        return false;
    }

    if( !isCorrectEmail(email) ){
        swalAlert("Email address seems incorrect (check @ and .’s)", "", "warning", "email");
        return false;
    }
    
    $.ajax({
        type: 'POST',
        url: '/registration/emailCheck',
        data: { email : email },
        async: false,
        success: function(data) {
			if( $.trim(data) == "already" ){
                swalAlert("This email is already registered on the website. Please try a different e-mail address.", "", "warning", "email");
                emailCheckValue = false;
            }else{
                swalAlert("Available to use", "", "success", "email");
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
            swalAlert("Please select the Country", "", "warning", "ccode");
            return false;
        }
        if( !$(f.email).val() ){
            swalAlert("Please enter your Email.", "", "warning", "email");
            return false;
        }
    
        if( !emailCheckValue ){
            swalAlert("Please check for duplicate Email.", "", "warning", "email");
            return false;
        }
    }
    if( !$("input:radio[name='title']").is(":checked") ){
        swalAlert("Please select the Title", "", "warning", "titleA");
        return false;
    }else{
        if( $("input:radio[name='title']:checked").val() == "Z" ){
            if( !$(f.title_etc).val() ){
                swalAlert("Please enter your Other Etc.", "", "warning", "title_etc");
                return false;
            }
        }
    }
    if( !$("input:radio[name='degree']").is(":checked") ){
        swalAlert("Please select the Degree", "", "warning", "degreeA");
        return false;
    }
    if( !$(f.firstName).val() ){
        swalAlert("Please enter your First Name.", "", "warning", "firstName");
        return false;
    }
    if( !$(f.lastName).val() ){
        swalAlert("Please enter your Last Name.", "", "warning", "lastName");
        return false;
    }
    if( $(f.ccode).val() == "KR" && !$(f.name).val() ){
        swalAlert("Please enter your Name.", "", "warning", "name");
        return false;
    }
    if( !$(f.department).val() ){
        swalAlert("Please enter your Department.", "", "warning", "department");
        return false;
    }
    if( !$(f.affiliation).val() ){
        swalAlert("Please enter your Affiliation.", "", "warning", "affiliation");
        $(f.affiliation).focus();
        return false;
    }
    if( !$(f.cnum).val() || !$(f.mobile).val() ){
        swalAlert("Please enter your Phone Number.", "", "warning", "cnum");
        return false;
    }

    var captcha = $("#captcha").val();
    var captchaCheck = true;

    if( !captcha ){
        swalAlert("Please enter the captcha", "", "warning", "captcha");
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
        swalAlert("Captcha authentication failed.", "", "warning", "captcha");
        return false;
    }
}

function registrationCheck_02(f)
{
    if( !$("input:radio[name='category']").is(":checked") ){
        swalAlert("Please select the Category", "", "warning", "categoryA");
        return false;
    }
    if( !$("input:radio[name='attendType']").is(":checked") ){
        swalAlert("Please select the Attendance Type", "", "warning", "attendTypeF");
        return false;
    }else{
        if( $("input:radio[name='attendType']:checked").val() == "O" ){
            if( !$("input:checkbox[name='oneDay[]']").is(":checked") ){
                swalAlert("Please select the Register Date", "", "warning", "oneDayA");
                return false;
            }
        }
    }
    if( !$("input:radio[name='accompanying']").is(":checked") ){
        swalAlert("Please select the Accompanying Person", "", "warning", "accompanyingN");
        return false;
    }
    if( !$("input:radio[name='banquet']").is(":checked") ){
        swalAlert("Please select the Banquet", "", "warning", "banquetN");
        return false;
    }
    if( $("input:radio[name='category']:checked").val() == "B" ){
        if( $("#delfile").length > 0 ){
            if( $(f.userfile).val() == "" && $("#delfile").is(":checked") ){
                swalAlert("Please enter Student Verification Documents.", "", "warning", "userfile");
                return false;
            }
        }else{
            if( $(f.userfile).val() == "" ){
                swalAlert("Please enter Student Verification Documents.", "", "warning", "userfile");
                return false;
            }
        }
    }
    
    var captcha = $("#captcha").val();
    var captchaCheck = true;

    if( !captcha ){
        swalAlert("Please enter the captcha", "", "warning", "captcha");
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
        swalAlert("Captcha authentication failed.", "", "warning", "captcha");
        return false;
    }
}

function registrationCheck_03(f)
{
    if( !$("input:radio[name='payMethod']").is(":checked") ){
        swalAlert("Please select the Payment Method", "", "warning", "payMethodC");
        return false;
    }else{
        if( $("input:radio[name='payMethod']:checked").val() == "B" ){  
            if( !$(f.payName).val() ){
                swalAlert("Please enter Registrant’s Name & Affiliation.", "", "warning", "payName");
                return false;
            }
            if( !$(f.payDate).val() ){
                swalAlert("Please enter Eexpected Remittance Date.", "", "warning", "payDate");
                return false;
            }
        }
    }

    var captcha = $("#captcha").val();
    var captchaCheck = true;

    if( !captcha ){
        swalAlert("Please enter the captcha", "", "warning", "captcha");
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
        swalAlert("Captcha authentication failed.", "", "warning", "captcha");
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