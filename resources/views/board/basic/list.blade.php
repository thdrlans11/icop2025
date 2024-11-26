@extends('include.layout')

@push('scripts')
<script>
function dbChange(sid,field,value){
    $.ajax({
        type: 'POST',
        url: '{{ route('board.dbChange', ['code'=>$code]) }}',
        data: { sid : sid, field : field, value : value },
        async: false,
        success: function(data) {
            if( data == 'error' ){
                swalAlert('시스템에러입니다.', '', 'error');
            }else{
                location.reload();
            }
        }
    });
}
</script>
@endpush

@push('css')
<link href="/assets/board/assets/css/board.css" rel="stylesheet">
@endpush

@section('content')
<div id="board" class="board-wrap">
	
	<div class="sch-form-wrap">
		<form action="{{ route('board.list', $code) }}" method="get">
			<fieldset>
				<legend class="hide">검색</legend>                                      
				<div class="sch-wrap">
					<span class="cnt">All <strong class="text-blue">{{ $lists->count() }}</strong></span>
					<div class="form-group">
						<select name="keyfield" id="keyfield" class="form-item sch-cate">
							@foreach( config('site.board')[$code]['Search'] as $key => $val )
							<option value="{{ $key }}" @if( request()->query('keyfield') == $key ) selected @endif>{{ $val }}</option>
							@endforeach
						</select>
						<input type="text" name="keyword" id="keyword" value="{{ request()->query('keyword') }}" class="form-item sch-key">
						<button type="submit" class="btn btn-sch"><span class="hide">검색</span></button>
					</div>
				</div>
			</fieldset>
		</form>                            
	</div>

	<ul class="board-list">
		<li class="list-head">
			<div class="bbs-no bbs-col-xs n-bar">No</div>
			<div class="bbs-tit n-bar">Title</div>
			<div class="bbs-file bbs-col-xs n-bar">File</div>
			<div class="bbs-date bbs-col-m">Date</div>
			<div class="bbs-cate bbs-col-s">Hits</div>
			@if( isAdminCheck() )
			<div class="bbs-admin bbs-col-s">M/D</div>
			@endif
		</li>
		
		@foreach( $lists as $index => $board )	
		<li>
			<div class="bbs-no bbs-col-xs n-bar">
				{{ $board->seq }}
			</div>
			<div class="bbs-tit n-bar">
				<a href="{{ route('board.view', ['code'=>$code, 'sid'=>base64_encode($board->sid)]) }}" class="ellipsis">{{ $board->subject }}</a>
				@if( $board->created_at->copy()->addDay(1) > now() )
				<span class="ic-new">N</span>
				@endif
			</div>
			<div class="bbs-file bbs-col-xs n-bar">
				@if( $board['files_count'] > 0 )
				<img src="/assets/board/assets/image/ic_attach_file.png" alt="">
				@endif
			</div>
			<div class="bbs-name bbs-col-m">{{ $board->created_at->toDateString() }}</div>
			<div class="bbs-hit bbs-col-s n-bar">{{ $board->ref }}</div>
			@if( isAdminCheck() )
			<div class="bbs-admin bbs-col-s">
				<div class="btn-admin">
					<a href="{{ route( 'board.form', ['code'=>$code, 'sid'=>base64_encode($board['sid'])] ) }}" class="btn btn-modify"><span class="hide">수정</span></a>
					<a href="#n" class="btn btn-delete" onclick="swalConfirm('정말 삭제하시겠습니까?', '', function(){ location.href='{{ route( 'board.delete', ['code'=>$code, 'sid'=>base64_encode($board['sid'])] ) }}' })"><span class="hide">삭제</span></a>
				</div>
			</div>
			@endif
		</li>
		@endforeach
		
		@if( $notice->isEmpty() && $lists->isEmpty() )
		<li class="no-data text-center">
			No Contents.
		</li>
		@endif
	</ul>

	@if( isAdminCheck() )
	<div class="btn-wrap text-right">
		<a href="{{ route('board.form', $code ) }}" class="btn btn-board btn-write">Write</a>
	</div>
	@endif

	{{ $lists->links('paginateUser', ['list'=>$lists]) }}

</div>



@endsection		
