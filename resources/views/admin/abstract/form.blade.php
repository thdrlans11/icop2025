@extends('include.layoutPopup')

@push('scripts')
<script type="text/javascript" src="/devScript/abstract.js?time={{ time() }}"></script>
@endpush

@section('content')

@if( $step == '1' )
<div class="bg-box bg-skyblue mb-20">
    <strong class="tit">Instruction</strong>
    <ul class="list-type list-type-check">
        <li>Submitter is responsible for typing errors.</li>
        <li>The abstract must not exceed <strong class="text-red">300</strong> words. Please do not include title, author, or institution information in the abstract.</li>
        <li>The character count only includes text in the BODY of your abstract.</li>
    </ul>
</div>
@endif

<div class="sub-conbox inner-layer">
    
    <div class="write-form-wrap">
        <form id="registrationForm" action="{{ route('admin.abstract.modify', ['sid'=>encrypt($apply->sid), 'step'=>$step]) }}" method="post" enctype="multipart/form-data" onsubmit="return registrationCheck_0{{ $step }}(this);">
            {{ csrf_field() }}
            <input type="hidden" name="step" value="{{ $step }}"/>
            <input type="hidden" name="sid" value="{{ encrypt($apply->sid) }}"/>
            <input type="hidden" name="saveMode" id="saveMode" value=""/>
            <fieldset>
                <legend class="hide">Go to Register</legend>

                @include('abstract.form.step0'.$step)

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
                    <a href="" class="btn btn-type1 color-type2 colorClose">Close</a>

                    @if( $step == 1 )
                    <a href="#n" class="btn btn-type1 color-type1 saveNext">Modify</a>
                    <a href="{{ route('admin.abstract.modifyForm', ['sid'=>encrypt($apply->sid), 'step'=>$step+1]) }}" class="btn btn-type1 btn-line color-type4">Next</a>
                    @endif

                    @if( $step == 2 )
                    <a href="{{ route('admin.abstract.modifyForm', ['sid'=>encrypt($apply->sid), 'step'=>$step-1]) }}" class="btn btn-type1 btn-line color-type2">Previous</a>
                    @endif
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
