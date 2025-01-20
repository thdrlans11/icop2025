@extends('include.layout')

@section('content')
<div class="abstract-conbox">
    <div class="info-box text-center">
        <img src="/assets/image/sub/ic_calendar.png" alt=""><span>Abstract Submission deadline : <strong class="text-orange">by {{ $edate->format('F').' '.$edate->format('d') }} ({{  $edate->format('D')  }}), {{ $edate->format('Y') }}</strong></span>
    </div>

    @if( $modifyYn )
    <div class="btn-wrap text-right">
        <a href="{{ route('abstract.registration', ['step'=>'1']) }}" class="btn btn-type1 color-type7">Abstract Submission</a>
    </div>
    @endif

    <div class="table-wrap scroll-x touch-help">
        <table class="cst-table">
            <caption class="hide">Abstract Submission</caption>
            <colgroup>
                <col style="width: 8%;">
                <col style="width: 15%;">
                <col>
                <col style="width: 12%;">
                <col style="width: 20%;">
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Abstract No.</th>
                    <th scope="col">Abstract Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Review / Modify</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $lists as $key => $apply )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $apply->rnum }}</td>
                    <td class="text-left">
                        {{ $apply->subject }}
                    </td>
                    <td>
                        <span class="{{ $apply->status == 'Y' ? 'text-blue' : 'text-red' }}">{{ config('site.abstract.status')[$apply->status] }}</span>
                    </td>
                    <td>
                        <div class="btn-wrap">
                            @if( $apply->status == 'Y' )
                            <a href="{{ route('abstract.preview', ['sid'=>encrypt($apply->sid)]) }}" class="btn btn-small btn-mypage btn-preview color-type8 Load_Base_fix" Wsize="1500" Hsize="900" Tsize="2%">Preview</a>
                            @endif

                            @if( $modifyYn )
                            <a href="{{ route('abstract.registration', ['step'=>'1', 'sid'=>encrypt($apply->sid)]) }}" class="btn btn-small btn-mypage  btn-line color-type8">Modify</a>
                            <a href="#n" onclick="swalConfirm('Are you sure you want to delete it?', '', function(){ location.href='{{ route('abstract.delete', ['sid'=>encrypt($apply->sid)]) }}'; })"class="btn btn-small btn-mypage color-type9">Delete</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>        
@endsection