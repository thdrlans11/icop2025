@extends('include.layout')

@push('scripts')
<script type="text/javascript" src="/devScript/symposium.js?time={{ time() }}"></script>
@endpush

@section('content')
<div class="sub-conbox inner-layer">
    
    @if( $step == 1 || $step == 2 )
        @include('symposium.form.tab')
        
        <div class="bg-img-box">
            <img src="/assets/image/sub/ic_notice.png" alt="">
            <div class="text-wrap">
                <strong class="tit">Please fill in the requested information below and submit by February 14</strong>
            </div>
        </div>
    @else
        <div class="bg-img-box">
            <img src="/assets/image/sub/ic_success.png" alt="">
            <div class="text-wrap">
                <strong class="tit">
                    Thank you for submitting. <br>
                    Confirmation letter has been sent to your email address.
                </strong>
            </div>
        </div>
    @endif

    <div class="write-form-wrap">
        <form id="registrationForm" action="{{ route('apply.symposium.upsert', ['step'=>$step]) }}" method="post" enctype="multipart/form-data" onsubmit="return registrationCheck_0{{ $step }}(this);">
            {{ csrf_field() }}
            <input type="hidden" name="step" value="{{ $step }}"/>
            <input type="hidden" name="sid" value="{{ isset($apply) ? encrypt($apply->sid) : '' }}"/>
            <input type="hidden" name="saveMode" id="saveMode" value=""/>

            @if( $step == 1 && !isset($apply) )
            {!! Honeypot::generate('my_name', 'my_time') !!}
            @endif
            <fieldset>
                <legend class="hide">Special Symposia 등록</legend>                        

                @include('symposium.form.step0'.$step)

                @if( $step == 1 )
                <div class="sub-tit-wrap">
                    <h4 class="sub-tit">Preventing Automation Program Entry</h4>
                </div>
                <ul class="write-wrap">
                    <li>
                        <div class="form-con">
                            <div class="captcha">
                                <span class="img"><img id="captcha_img" src="{{ $captcha }}"></span>
                                <button type="button" onclick="refreshCaptcha();return false;"><img src="/assets/image/icon/ic_refresh.png" class="refresh"></button>                                                
                                <input type="text" id="captcha" class="form-item">
                            </div>
                            <p class="help-text mt-10 text-blue">
                                * For information security, you can register as a member after entering the text written below.
                            </p>
                        </div>
                    </li>
                </ul>
                @endif

                <div class="btn-wrap text-center">
                    @if( $step <= 2 )    
                        <a href="{{ route('main') }}" class="btn btn-type1 color-type2">Cancel</a>
                        @if( $step == 2 )
                        <a href="#n" class="btn btn-type1 btn-line color-type4 savePrev">Modify</a>
                        @endif
                        <button type="button" class="btn btn-type1 color-type1 saveNext">{{ $step == 1 ? 'Next' : 'Submit' }}</button>
                    @else
                        <a href="{{ route('main') }}" class="btn btn-type1 color-type1">Home</a>
                    @endif
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection   