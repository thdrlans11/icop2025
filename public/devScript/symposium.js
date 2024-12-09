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

    $("#ccode").change(function(){
        var cnum = $("#ccode").find("option:selected").data("cnum");
        $("#cnum").val(cnum);
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
        url: '/symposium/emailCheck',
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

function registrationCheck_01(f)
{
    if( !$("input:hidden[name='sid']").val() ){
        if( !$(f.ccode).val() ){
            swalAlert("Please select the Country", "", "warning", "ccode");
            return false;
        }        
    }
    if( !$(f.firstName).val() ){
        swalAlert("Please enter your First Name.", "", "warning", "firstName");
        return false;
    }
    if( !$(f.lastName).val() ){
        swalAlert("Please enter your Last Name.", "", "warning", "lastName");
        return false;
    }
    if( !$(f.affiliation).val() ){
        swalAlert("Please enter your Affiliation.", "", "warning", "affiliation");
        $(f.affiliation).focus();
        return false;
    }

    if( !$("input:hidden[name='sid']").val() ){
        if( !$(f.email).val() ){
            swalAlert("Please enter your Email.", "", "warning", "email");
            return false;
        }

        if( !emailCheckValue ){
            swalAlert("Please check for duplicate Email.", "", "warning", "email");
            return false;
        }
    } 
    
    if( !$(f.cnum).val() || !$(f.mobile).val() ){
        swalAlert("Please enter your Phone Number.", "", "warning", "cnum");
        return false;
    }
    if( $("#delfile").length > 0 ){
        if( $(f.userfile).val() == "" && $("#delfile").is(":checked") ){
            swalAlert("Please enter Photo.", "", "warning", "userfile");
            return false;
        }
    }else{
        if( $(f.userfile).val() == "" ){
            swalAlert("Please enter Photo.", "", "warning", "userfile");
            return false;
        }
    }

    if( !$(f.title).val() ){
        swalAlert("Please select the Symposium Title.", "", "warning", "title");
        return false;
    }
    if( !$(f.topic).val() ){
        swalAlert("Please select the Brief synopsis of topic .", "", "warning", "topic");
        return false;
    }

    for( var i=0; i<4; i++ ){
        if( !$("#speakerFirstName"+(i+1)).val() ){
            swalAlert("Please enter Speaker"+(i+1)+" First Name.", "", "warning", "speakerFirstName"+(i+1));
            return false;
        }
        if( !$("#speakerLastName"+(i+1)).val() ){
            swalAlert("Please enter Speaker"+(i+1)+" Last Name.", "", "warning", "speakerLastName"+(i+1));
            return false;
        }
        if( !$("#speakerAffiliation"+(i+1)).val() ){
            swalAlert("Please enter Speaker"+(i+1)+" Affiliation.", "", "warning", "speakerAffiliation"+(i+1));
            return false;
        }
        if( !$("#speakerCcode"+(i+1)).val() ){
            swalAlert("Please enter Speaker"+(i+1)+" Country.", "", "warning", "speakerCcode"+(i+1));
            return false;
        }
        if( !$("#speakerLectureTitle"+(i+1)).val() ){
            swalAlert("Please enter Speaker"+(i+1)+" Lecture Title.", "", "warning", "speakerLectureTitle"+(i+1));
            return false;
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

function registrationCheck_02(f)
{
    return true
}