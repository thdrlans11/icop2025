@extends('include.layout')

@push('scripts')
<script type="text/javascript" src="/devScript/abstract.js?time={{ time() }}"></script>
@endpush

@section('content')
<div class="abstract-conbox">
    @if( $step == '1' )
    <div class="info-box text-center">
        <img src="/assets/image/sub/ic_calendar.png" alt=""><span>Abstract Submission deadline : <strong class="text-orange">by {{ $edate->format('F').' '.$edate->format('d') }} ({{  $edate->format('D')  }}), {{ $edate->format('Y') }}</strong></span>
    </div>
    <div class="bg-box bg-skyblue">
        <strong class="tit">Instruction</strong>
        <ul class="list-type list-type-check">
            <li>Submitter is responsible for typing errors.</li>
            <li>The abstract must not exceed <strong class="text-red">300</strong> words. Please do not include title, author, or institution information in the abstract.</li>
            <li>The character count only includes text in the BODY of your abstract.</li>
        </ul>
    </div>
    @endif

    @if( $step == '2' )
    <div class="bg-box bg-skyblue text-center">
        <img src="/assets/image/sub/ic_submit.png" alt="">
        <p>
            Please check the details below and click the <strong class="text-green">‘Submit’</strong> button to complete your abstract submission. <br>
            If you are in modify mode, the 'Submit' button will be displayed as 'Modify' button.
        </p>
    </div>
    @endif

    <div class="write-form-wrap">
        <form id="registrationForm" action="{{ route('abstract.registration.upsert', ['step'=>$step]) }}" method="post" enctype="multipart/form-data" onsubmit="return registrationCheck_0{{ $step }}(this);">
            {{ csrf_field() }}
            <input type="hidden" name="step" value="{{ $step }}"/>
            <input type="hidden" name="sid" value="{{ isset($apply) ? encrypt($apply->sid) : '' }}"/>
            <input type="hidden" name="saveMode" id="saveMode" value=""/>

            @if( $step == 1 && !isset($apply) )
            {!! Honeypot::generate('my_name', 'my_time') !!}
            @endif

            <fieldset>
                <legend class="hide">Online Submission</legend>
                
                @include('abstract.form.step0'.$step)

                @if( $step == 1 )
                <div class="sub-tit-wrap">
                    <h4 class="sub-tit">Preventing Automation Program Entry</h4>
                </div>
                <div class="write-wrap">
                    <ul>
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
                </div>
                @endif

                @if( $step != '3' )
                <div class="btn-wrap text-center">
                    <a href="{{ route('abstract.guide') }}" class="btn btn-type1 color-type2">Cancel</a>
                    @if( $step == '1' )
                    {{-- <button type="button" class="btn btn-type1 btn-line color-type4 saveImsi">Temporary Save</button> --}}
                    <button type="button" class="btn btn-type1 color-type4 saveNext">Save & Preview</button>
                    @elseif( $step == '2' )
                    <a href="{{ route('abstract.registration', ['step'=>'1', 'sid'=>encrypt($apply->sid)]) }}" class="btn btn-type1 btn-line color-type4">Modify</a>
                    <button type="button" class="btn btn-type1 color-type1 saveNext">Submit</button>
                    @endif
                </div>
                @endif
            </fieldset>
        </form>
    </div>
</div>
@endsection