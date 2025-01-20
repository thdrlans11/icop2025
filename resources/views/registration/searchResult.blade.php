@extends('include.layout')

@section('content')
<div class="sub-conbox inner-layer">
    @if( $apply->payStatus == 'Y' )
    <div class="btn-wrap text-right">
        <a href="{{ route('registration.receipt', ['sid'=>encrypt($apply->sid)]) }}" class="btn btn-type1 btn-line color-type5" onclick="window.open(this.href,'receipt','width=800,height=852,scrollbars=yes'); return false;">
            <img src="/assets/image/sub/ic_receipt.png" alt=""> Receipt
        </a>
    </div>
    @endif
    <div class="write-form-wrap">
        <form action="" method="">
            <fieldset>
                <legend class="hide">Go to Register</legend>
                
                @include('registration.form.step04')
                
                @if( $apply->payStatus == 'N' && $modifyYn )
                <div class="btn-wrap text-center">
                    <a href="{{ route('apply.registration', ['step'=>'1', 'rgubun'=>$rgubun, 'sid'=>encrypt($apply->sid)]) }}" class="btn btn-type1 btn-line color-type4">Modify</a>
                </div>
                @endif
            </fieldset>
        </form>
    </div>
</div>
@endsection   