@extends('include.layout')

@push('scripts')
<script type="text/javascript" src="/devScript/registration.js?time={{ time() }}"></script>
@endpush

@section('content')
<div class="sub-conbox inner-layer">
    
    @include('registration.form.tab')

    <div class="write-form-wrap">
        <form id="registrationForm" name="PGIOForm" action="{{ route('apply.registration.upsert', ['step'=>$step]) }}" method="post" enctype="multipart/form-data" onsubmit="return registrationCheck_0{{ $step }}(this);">
            {{ csrf_field() }}
            <input type="hidden" name="step" value="{{ $step }}"/>
            <input type="hidden" name="type" value="{{ $type }}"/>
            <input type="hidden" name="sid" value="{{ isset($apply) ? encrypt($apply->sid) : '' }}"/>
            <input type="hidden" name="saveMode" id="saveMode" value=""/>

            @if( $step == 1 && !isset($apply) )
            {!! Honeypot::generate('my_name', 'my_time') !!}
            @endif

            @if( $step == 3 && $apply->payStatus == 'N' )
            @include('registration.payGate.form')
            @endif

            <fieldset>
                <legend class="hide">Go to Register</legend>

                @include('registration.form.step0'.$step)

                @if( $step != 4 )
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
                    @if( $step == 1 )
                    <a href="{{ route('registration.guide') }}" class="btn btn-type1 color-type2">Cancel</a>
                    <button type="submit" class="btn btn-type1 color-type1">Submit</button>
                    @elseif( $step == 4 )
                        @if( $apply->payStatus == 'N' )
                        <a href="{{ route('apply.registration', ['step'=>'1', 'sid'=>encrypt($apply->sid)]) }}" class="btn btn-type1 btn-line color-type4">Modify</a>
                        @endif
                    <a href="{{ route('registration.search') }}" class="btn btn-type1 color-type5">Go to Registration confirmation and Receipt</a>
                    @else 
                    <a href="{{ route('registration.guide') }}" class="btn btn-type1 color-type2">Cancel</a>
                    <a href="#n" class="btn btn-type1 btn-line color-type2 savePrev">Save & Previous</a>
                        @if( $step == 2 )
                        <a href="#n" class="btn btn-type1 color-type1 saveImsi">Save</a>
                        <a href="#n" class="btn btn-type1 btn-line color-type4 saveNext">Save & Next</a>
                        @else
                        <a href="#n" class="btn btn-type1 color-type1 saveNext">Completed</a>
                        @endif
                    @endif
                </div>
            </fieldset>
        </form>

        @if( $step == 3 && $apply->payStatus == 'N' )
        <div id="PGIOscreen" class="mt-30"></div>
        @endif
    </div>
</div>
@endsection
