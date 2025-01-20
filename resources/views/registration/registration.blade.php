@extends('include.layout')

@push('scripts')

@if( $rgubun == 'KOR' )
<script type="text/javascript" src="/devScript/registration{{ $rgubun }}.js?time={{ time() }}"></script>
@else
<script type="text/javascript" src="/devScript/registration.js?time={{ time() }}"></script>
@endif


@endpush

@section('content')
<div class="sub-conbox inner-layer">
    
    @include('registration.form'.$rgubun.'.tab')

    <div class="write-form-wrap">
        <form id="registrationForm" name="PGIOForm" action="{{ route('apply.registration.upsert', ['step'=>$step, 'rgubun'=>$rgubun]) }}" method="post" enctype="multipart/form-data" onsubmit="return registrationCheck_0{{ $step }}(this);">
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

                @include('registration.form'.$rgubun.'.step0'.$step)

                @if( $step != 4 )
                <div class="sub-tit-wrap">
                    <h4 class="sub-tit">
                        @if( $rgubun == 'KOR' )
                        자동화 프로그램 입력 방지
                        @else
                        Preventing Automation Program Entry
                        @endif
                        
                    </h4>
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
                                @if( $rgubun == 'KOR' )
                               * 정보 보안을 위해 오른쪽에 표시된 빨간색 글자를 동일하게 입력해야 다음 페이지로 진행 가능합니다.
                                @else
                                * For information security, you can register as a member after entering the text written below.
                                @endif
                            </p>
                        </div>
                    </li>
                </ul>
                @endif

                @if( $rgubun == 'KOR' )
                <div class="btn-wrap text-center">
                    @if( $step == 1 )
                    <a href="{{ route('registration.guide') }}" class="btn btn-type1 color-type2">취소</a>
                    <button type="submit" class="btn btn-type1 color-type1">다음</button>
                    @elseif( $step == 4 )
                        @if( $apply->payStatus == 'N' )
                        <a href="{{ route('apply.registration', ['step'=>'1', 'sid'=>encrypt($apply->sid)]) }}" class="btn btn-type1 btn-line color-type4">수정</a>
                        @endif
                    <a href="{{ route('registration.search') }}" class="btn btn-type1 color-type5">등록 확인 및 영수증</a>
                    @else 
                    <a href="{{ route('registration.guide') }}" class="btn btn-type1 color-type2">취소</a>
                    <a href="#n" class="btn btn-type1 btn-line color-type2 savePrev">저장 및 이전</a>
                        @if( $step == 2 )
                        <a href="#n" class="btn btn-type1 color-type1 saveImsi">저장</a>
                        <a href="#n" class="btn btn-type1 btn-line color-type4 saveNext">저장 및 다음</a>
                        @else
                        <a href="#n" class="btn btn-type1 color-type1 saveNext">완료</a>
                        @endif
                    @endif
                </div>
                @else
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
                @endif
            </fieldset>
        </form>

        @if( $step == 3 && $apply->payStatus == 'N' )
        <div id="PGIOscreen" class="mt-30"></div>
        @endif
    </div>
</div>
@endsection
