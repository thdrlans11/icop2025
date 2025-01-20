<div class="step-list-wrap">
    <ul class="step-list">
        <li {!! $step == '1' ? 'class="on"' : '' !!}>
            Step 01
            <strong>개인정보 입력</strong>
        </li>
        <li {!! $step == '2' ? 'class="on"' : '' !!}>
            Step 02
            <strong>등록구분 선택</strong>
        </li>
        <li {!! $step == '3' ? 'class="on"' : '' !!}>
            Step 03
            <strong>등록비 결제</strong>
        </li>
        <li {!! $step == '4' ? 'class="on"' : '' !!}>
            Step 04
            <strong>등록 확인</strong>
        </li>
    </ul>
</div>

@if( $step == '3' )
<div class="bg-img-box">
    <img src="/assets/image/sub/ic_notice.png" alt="">
    <div class="text-wrap">
        <strong class="tit">아래의 정보가 맞는지 확인하여 주시기 바랍니다.</strong>
    </div>
</div>
@endif

@if( $step == '4' )
<div class="bg-img-box">
    <img src="/assets/image/sub/ic_success.png" alt="">
    <div class="text-wrap">
        <strong class="tit">등록이 성공적으로 제출되었습니다!</strong>
    </div>
</div>

@if( $apply->payStatus != 'N' )
<div class="btn-wrap text-right">
    <a href="{{ route('registration.receipt', ['sid'=>encrypt($apply->sid)]) }}" class="btn btn-type1 btn-line color-type5" onclick="window.open(this.href,'receipt','width=800,height=852,scrollbars=yes'); return false;">
        <img src="/assets/image/sub/ic_receipt.png" alt=""> Receipt
    </a>
</div>
@endif

@endif