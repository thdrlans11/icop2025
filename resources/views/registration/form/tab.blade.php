<div class="step-list-wrap">
    <ul class="step-list">
        <li {!! $step == '1' ? 'class="on"' : '' !!}>
            Step 01
            <strong>Personal Information</strong>
        </li>
        <li {!! $step == '2' ? 'class="on"' : '' !!}>
            Step 02
            <strong>Select registration fee</strong>
        </li>
        <li {!! $step == '3' ? 'class="on"' : '' !!}>
            Step 03
            <strong>Payment progress</strong>
        </li>
        <li {!! $step == '4' ? 'class="on"' : '' !!}>
            Step 04
            <strong>Confirmation</strong>
        </li>
    </ul>
</div>

@if( $step == '3' && $apply->lang != 'KOR' )
<div class="bg-img-box">
    <img src="/assets/image/sub/ic_notice.png" alt="">
    <div class="text-wrap">
        <strong class="tit">Please make sure your information is correct.</strong>
    </div>
</div>
@endif

@if( $step == '4' )
<div class="bg-img-box">
    <img src="/assets/image/sub/ic_success.png" alt="">
    <div class="text-wrap">
        <strong class="tit">Your online registration has been successfully submitted!</strong>
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