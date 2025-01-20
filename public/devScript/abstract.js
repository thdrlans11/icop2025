$(document).ready(function(){

    $(".saveNext").click(function(){
        $("#saveMode").val("next");
        $("#registrationForm").submit();
    })

    // $(".saveImsi").click(function(){
    //     $("#saveMode").val("imsi");
    //     $("#registrationForm").submit();
    // })

    //소속 제거
	$(document).on("click",".del_institution",function(){
		$(this).closest(".institution_box").remove();
		
		var count = $(".institution_box").length;
		$("#institution_count").val(count);
        
		$("select[name='author_institution_1[]']").find("option:last").remove();
        $("select[name='author_institution_2[]']").find("option:last").remove();
		
		for( var i=1; i<=count; i++ ){
			$(".institution_number").eq(i-1).html(i);
		}
	});
	
	//저자 제거
	$(document).on("click",".del_author",function(){
		
		$(this).closest("tr").remove();
		
		var count = $("#author_count").val()-1;
		$("#author_count").val( count );
		
		for( var i=1; i<=count; i++ ){
			$(".author_number").eq(i-1).html(i);
			$("input:radio[name^='p_author']").eq(i-1).attr("name","p_author_"+i);
            $("input:radio[name^='c_author']").eq(i-1).attr("name","c_author_"+i);
		}
		
	});

	$(document).on('keyup', '#subject', function () {
		let value = $(this).val();
		const length = value.split(' ').length;
		const maxLength = 30;

		if (length > maxLength) {
			value = '';
			alert('The title should be less than ' + maxLength + ' words.');
		}

		$(this).val(value);
		$('#subject_length').val(length);
	});

	$(document).on("click","input[name^='p_author_']",function(){
		$("input[name^='p_author_']").attr("checked",false);
		$(this).prop("checked",true);
	});
	
	$(document).on("click","input[name^='c_author_']",function(){
		$("input[name^='c_author_']").attr("checked",false);
		$(this).prop("checked",true);
	});
});

function make_institution(){
	
	var count = $("#institution_count").val();
	var i_length = $(".institution_box").length;
	
	//숫자로 재정의
	count    = Number(count);
	i_length = Number(i_length);

	if( count != i_length ){
		
		if( count > i_length ){
            
            for( var i = i_length+1; i <= count ; i++  ){
                
                var clone = $(".institution_box").eq(0).clone();
                $(clone).find(".institution_number").html(i);
                $(clone).find("input, select").val("");
                
                if( i >= 2 ){
                    $(clone).find(".write-tit-wrap").append('<a href="#n" class="btn btn-small color-type6 del_institution">Delete</a>');
                }
                    
                $(".institution_container").append(clone);

                $("select[name='author_institution_1[]']").append("<option value="+(i)+">"+(i)+"</option>");
                $("select[name='author_institution_2[]']").append("<option value="+(i)+">"+(i)+"</option>");
            }
                	
		}else{

			for( var i = i_length; i > count ; i-- ){
                
				$(".institution_box").eq(i-1).remove();
				
				$("select[name='author_institution_1[]'] option[value='"+i+"']").remove();
                $("select[name='author_institution_2[]'] option[value='"+i+"']").remove();
			}

		}
		
	}
	
}

function make_author(){
	
	var count = $("#author_count").val();
	var a_length = $(".author_box").length;
	
	//숫자로 재정의
	count    = Number(count);
	a_length = Number(a_length);
	
	if( count != a_length ){
		
		if( count > a_length ){

            for( var i = a_length+1; i <= count ; i++  ){

                var clone = $(".author_box").eq(0).clone();
                $(clone).find(".author_number").html(i);
                $(clone).find("input:text").val("");
                $(clone).find("input:radio").attr("checked",false);
                $(clone).find("select[name='author_institution_1[]']").val("1");
                $(clone).find("select[name='author_institution_2[]']").val("");
                $(clone).find("input:radio[name^='p_author']").attr("name","p_author_"+i);
                $(clone).find("input:radio[name^='c_author']").attr("name","c_author_"+i);
                $("#author_table").append(clone);
                
            }
			
		}else{

			for( var i = a_length; i > count ; i-- ){
				$(".author_box").eq(i-1).remove();
			}

		}
		
	}
	
}

function move_author(f,mode){
	
	var target = $(f).closest("tr");
	var count = $("#author_count").val();
		
	if( mode == "down" ){
		target.next().after(target);
	}else{
		target.prev().before(target);
	}
	
	for( var i=1; i<=count; i++ ){
		$(".author_number").eq(i-1).html(i);
        $("input:radio[name^='p_author']").eq(i-1).attr("name","p_author_"+i);
        $("input:radio[name^='c_author']").eq(i-1).attr("name","c_author_"+i);
	}
	
}

function registrationCheck_01(f)
{
    if( !$("input:radio[name='ptype']").is(":checked") ){
        swalAlert("Please select the Presentation Type", "", "warning", "ptypeO");
        return false;
    }
    if( !$("input:radio[name='topic']").is(":checked") ){
        swalAlert("Please select the Abstract Topics", "", "warning", "topicA");
        return false;
    }

	//소속
	var institution_count = $(f.institution_count).val();
	
	for( var i=0; i<institution_count; i++ ){
		if( !$("select[name='country[]']").eq(i).val() ){
			swalAlert("Please choose Country", "", "warning");
			return false;
		}
		if( !$("input:text[name='department[]']").eq(i).val() ){
			swalAlert("Please enter Department.", "", "warning");
			return false;
		}
		if( !$("input:text[name='affiliation[]']").eq(i).val() ){
			swalAlert("Please enter Affiliation.", "", "warning");
			return false;
		}
		if( !$("input:text[name='city[]']").eq(i).val() ){
			swalAlert("Please enter City.", "", "warning");
			return false;
		}
		
	}

	//저자
	var author_count = $(f.author_count).val();
	
	for( var i=0; i<author_count; i++ ){
		if( !$("input:text[name='author_firstname[]']").eq(i).val() ){
			swalAlert("Please enter First Name.", "", "warning");
			return false;
		}
		if( !$("input:text[name='author_lastname[]']").eq(i).val() ){
			swalAlert("Please enter Last Name.", "", "warning");
			return false;
		}
		if( !$("input:text[name='author_email[]']").eq(i).val() ){
			swalAlert("Please enter Email.", "", "warning");
			return false;
		}
		if( !$("input:text[name='author_mobile[]']").eq(i).val() ){
			swalAlert("Please enter Mobile.", "", "warning");
			return false;
		}
		if( !$("select[name='author_country[]']").eq(i).val() ){
			swalAlert("Please select the Country.", "", "warning");
			return false;
		}
		if( !$("select[name='author_institution_1[]']").eq(i).val() ){
			swalAlert("Please select the First institution.", "", "warning");
			return false;
		}
	}

	if( $("input:radio[name^='p_author_']:checked").length <= 0 ){
		swalAlert("Please choose Presenting Author.", "", "warning");
		return false;
	}
	if( $("input:radio[name^='c_author_']:checked").length <= 0 ){
		swalAlert("Please choose Corresponding Author.", "", "warning");
		return false;
	}

	if( !$(f.subject).val() ){
		swalAlert("Please enter Abstract Title.", "", "warning");
	}

	if (tinyEmptyCheck('content')) {
		swalAlert("Please enter Abstract.", "", "warning", "content");
		return false;
	}

	var keywordCheck = false;
	$("input[name='keyword[]']").each(function(){
		if( $(this).val() ){
			keywordCheck = true;
		}
	});

	if( !keywordCheck ){
		swalAlert("Please enter Keyword.", "", "warning");
		return false;
	}

	if( !$("input:radio[name='agree1']").is(":checked") ){
		swalAlert("Please select Yes or No regarding to change your presentation type.", "", "warning", "agree1Y");
		return false;
	}
	if( !$("input:radio[name='agree2']").is(":checked") ){
		swalAlert("Please select Yes or No regarding to Copyright Agreement.", "", "warning", "agree2Y");
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
	return true;
}

function abstractSearchCheck(f)
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