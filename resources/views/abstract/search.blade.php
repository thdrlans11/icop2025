
@extends('include.layout')

@push('scripts')
<script type="text/javascript" src="/devScript/abstract.js?time={{ time() }}"></script>
@endpush

@section('content')
<div class="abstract-conbox">
       
    <div class="line-box border-box">
        <img src="/assets/image/sub/ic_review.png" alt="">
        <div class="text-wrap">
            <ul class="list-type list-type-dot">
                <li>To review and make modifications, please put your information below which you used when you submitted the abstract.</li>
                <li>If you have a problem in search of your information, please contact the ICOP/ISOP 2025 secretariat (<a href="mailto:icop2025org@gmail.com" target="_blank">icop2025org@gmail.com</a>).</li>
            </ul>
        </div>
    </div>

    <div class="write-form-wrap">
        <form action="{{ route('abstract.registration.searchResult') }}" method="post" onsubmit="return abstractSearchCheck(this)">
            {{ csrf_field() }}
            <fieldset>
                <legend class="hide">Abstract Reveiw & Modification</legend>
                <ul class="write-wrap">
                    <li>
                        <div class="form-tit">Country <strong class="required">*</strong></div>
                        <div class="form-con">
                            <select name="searchCcode" id="searchCcode" class="form-item">
                                <option value="">Country choice</option>
                                @foreach( $country as $key => $val )
                                <option value="{{ $val['cn'] }}">{{ $val['cn'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="form-tit">E-mail <strong class="required">*</strong></div>
                        <div class="form-con">
                            <input type="text" name="searchEmail" id="searchEmail" class="form-item">
                        </div>
                    </li>
                </ul>
                <div class="btn-wrap text-center">
                    <button type="submit" class="btn btn-type1 color-type4">Search</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
        