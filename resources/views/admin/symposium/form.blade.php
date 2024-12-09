@extends('include.layoutPopup')

@push('scripts')
<script type="text/javascript" src="/devScript/symposium.js?time={{ time() }}"></script>
@endpush

@section('content')
<div class="sub-conbox inner-layer">
    
    @include('symposium.form.tab')

    <div class="write-form-wrap">
        <form id="registrationForm" action="{{ route('admin.symposium.modify', ['sid'=>encrypt($apply->sid), 'step'=>$step]) }}" method="post" enctype="multipart/form-data" onsubmit="return registrationCheck_0{{ $step }}(this);">
            {{ csrf_field() }}
            <input type="hidden" name="step" value="{{ $step }}"/>
            <input type="hidden" name="sid" value="{{ encrypt($apply->sid) }}"/>
            <input type="hidden" name="saveMode" id="saveMode" value=""/>
            <input type="hidden" name="adminMode" value="Y"/>
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
                    <a href="" class="btn btn-type1 color-type2 colorClose">Close</a>

                    @if( $step == 1 )
                    <a href="#n" class="btn btn-type1 color-type1 saveNext">Modify</a>
                    @endif

                    @if( $step == 2 )
                    <a href="{{ route('admin.symposium.modifyForm', ['sid'=>encrypt($apply->sid), 'step'=>$step-1]) }}" class="btn btn-type1 btn-line color-type2">Previous</a>
                    @endif

                    @if( $step == 1 )
                    <a href="{{ route('admin.symposium.modifyForm', ['sid'=>encrypt($apply->sid), 'step'=>$step+1]) }}" class="btn btn-type1 btn-line color-type4">Next</a>
                    @endif
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
