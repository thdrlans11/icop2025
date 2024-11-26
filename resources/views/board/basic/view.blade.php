@extends('include.layout')

@push('css')
<link href="/assets/board/assets/css/board.css" rel="stylesheet">
<link href="/assets/css/editor.css" rel="stylesheet">
@endpush

@section('content')

<div id="board" class="board-wrap">

	<div class="board-view">

		<div class="view-contop">
			<h4 class="view-tit">
				{{ $data->subject }}
			</h4>
			<div class="view-info text-right">
				<span><strong>Writer : </strong>{{ $data->name }}</span>
				<span><strong>Date : </strong>{{ $data->created_at->toDateString() }}</span>
				<span><strong>Hits : </strong>{{ $data->ref }}</span>
			</div>
		</div>
		@if( config('site.board')[$code]['UseCategory'] && $data->linkurl )
		<div class="view-link text-right">
			<a href="{{ $data->linkurl }}" target="_blank">{{ $data->linkurl }}</a>
		</div>
		@endif		
		<div class="view-contents editor-contents">
			{!! $data['content'] !!}	
		</div>
		@if( config('site.board')[$code]['UseFile'] && $files->isNotEmpty() )
		<div class="view-attach">
			<div class="view-attach-con">
				<div class="con">
					@foreach( $files as $key => $f )
					<a href="{{ route('download', ['type'=>'only', 'tbl'=>'boardFile', 'sid'=>base64_encode($f['sid'])]) }}" target="_blank">{{ $f['filename'] }} ( Download {{ number_format($f['download']) }} )</a>
					@endforeach
				</div>
			</div>
		</div>
		@endif

		<div class="btn-wrap text-right">
			<a href="{{ route('board.list', $code) }}" class="btn btn-board btn-list">List</a>
			@if( isAdminCheck() || ( auth('web')->check() && $data->id == auth('web')->user()->user_id ) )
			<a href="{{ route('board.form', ['code'=>$code, 'sid'=>base64_encode($data->sid)]) }}" class="btn btn-board btn-modify">Modify</a>
			<a href="{{ route('board.delete', ['code'=>$code, 'sid'=>base64_encode($data->sid)]) }}" class="btn btn-board btn-delete">Delete</a>
			@endif
		</div>
	</div>
</div>
@endsection        
