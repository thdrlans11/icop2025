@extends('include.layoutPopup')

@section('content')
<div class="abstract-conbox">
    <div class="write-form-wrap">
        <form id="" action="">
            <fieldset>
                <legend class="hide">Abstract Preview</legend>

                <div class="sub-tit-wrap">
                    <h4 class="sub-tit">Abstract Preview</h4>
                </div>
                
                @include('abstract.form.step02')

                <div class="btn-wrap text-center">
                    <a href="" class="btn btn-type1 color-type2 colorClose">Close</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
