<script language="javascript" type="text/javascript" src="https://api.paygate.net/ajax/common/OpenPayAPI.js"></script>
<script type="text/javascript">
function startPayment() {
    doTransaction(document.PGIOForm);
    $("#PGIOscreen").show();
}

function getPGIOresult() {
    //verifyReceived(getPGIOElement('tid')); //(선택사항)
    var replycode = getPGIOElement('replycode');
    var replyMsg = getPGIOElement('replyMsg');
    // 거래 성공 처리
    if(replycode=='0000'){
        swalAlert("Payment has been completed.", "", "success");
		document.PGIOForm.submit();
    }else{
        //거래 실패 처리
        $("#PGIOscreen").hide();
        $("input:hidden[name='replycode']").val("");
		$("input:hidden[name='replyMsg']").val("");
		$("input:hidden[name='tid']").val("");
        $("form[name='PGIOForm']").find("input:hidden[name^='card']").val("");
        swalAlert(replyMsg, "", "warning");
    }
}
</script>

<input type="hidden" name="mid" value="paygateus">
<input type="hidden" name="charset" value="UTF-8">
<input type="hidden" name="langcode" value="US">
<input type="hidden" name="paymethod" value="104">
<input type="hidden" name="unitprice" id="unitprice" value="{{ $apply->price }}">
<input type="hidden" name="goodcurrency" value="USD">
<input type="hidden" name="goodname" id="goodname" value="ICOP 2025 Registration">
<input type="hidden" name="receipttoname" value="{{ $apply->makeName() }}">
<input type="hidden" name="receipttoemail" value="{{ $apply->email }}">
<input type="hidden" name="receipttotel" value="{{ $apply->mobile }}">
<input type="hidden" name="cardauthcode" value="">
<input type="hidden" name="cardtype" value="">
<input type="hidden" name="cardnumber" value="">
<input type="hidden" name="cardsecretnumber" size="3" value="">
<input type="hidden" name="cardexpiremonth" size="2" value="">
<input type="hidden" name="cardexpireyear" size="4" value="">
<input type="hidden" name="cardownernumber" size="13" value="">
<input type="hidden" name="tid" value="">
<input type="hidden" name="replycode" value="">
<input type="hidden" name="replyMsg" value="">