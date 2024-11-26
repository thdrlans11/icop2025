@extends('include.layout')

@push('scripts')
<script type="text/javascript" src="/devScript/registration.js?time={{ time() }}"></script>
@endpush

@section('content')
<div class="sub-conbox inner-layer">
    <div class="border-box">
        <ul class="list-type list-type-dot">
            <li>Please input the correct information submitted for the registration.</li>
            <li>If you have a problem in search of your information, please contact the ICOP/ISOP 2025 secretariat (<a href="mailto:icop2025org@gmail.com" target="_blank">icop2025org@gmail.com</a>).</li>
        </ul>

        <strong class="tit">[ Payment Receipt ]</strong>
        <ul class="list-type list-type-dot">
            <li>It is available to check and print out only after the payment completion. You can easily find a button to print out the receipt on the search result.</li>
        </ul>
    </div>

    <div class="write-form-wrap">
        <form action="{{ route('registration.searchResult') }}" method="post" onsubmit="return registrationSearchCheck(this)">
            {{ csrf_field() }}
            <fieldset>
                <legend class="hide">Registration confirmation and Receipt</legend>
                <ul class="write-wrap">
                    <li>
                        <div class="form-tit">Country <strong class="required">*</strong></div>
                        <div class="form-con">
                            <select name="searchCcode" id="searchCcode" class="form-item">
                                <option value="">Country choice</option>
                                @foreach( $country as $key => $val )
                                <option value="{{ $key }}">{{ $val['cn'] }}</option>
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
