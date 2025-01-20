@extends('admin.include.layout')

@push('css')
<link rel="stylesheet" href="/devCss/jquery-ui-timepicker-addon.css">
@endpush

@push('scripts')
<script src="/devScript/jquery-ui-timepicker-addon.js"></script>
<script>
$(document).ready(function(){
	$(".dateTimeCalendar").datetimepicker({
		dateFormat:'yy-mm-dd',
		monthNamesShort:[ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ],
		dayNamesMin:[ '일', '월', '화', '수', '목', '금', '토' ],
		changeMonth:true,
		changeYear:true,
		showMonthAfterYear:true,
		timeFormat:'HH:mm:ss',
		controlType:'select',
		oneLine:true,
	});
});

function dbChange(sid,db,field,f){

    var value = '';

	if( db == 'abstract_periods' ){
		if( !$(f).prev().val() ){
            swalAlert('날짜를 입력해주세요.', '', 'warning');			
			return false;
		}else{
            value = $(f).prev().val();
        }
	}else if( db == 'abstract' && field == 'delete' ){
        value = $(f).data('status');
    }else{
        value = $(f).val();
    }

    $.ajax({
        type: 'POST',
        url: '{{ route('admin.abstract.dbChange') }}',
        data: { sid : sid, db : db, field : field, value : value },
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

@section('content')

@include('admin.abstract.inc.avg')

<div class="sub-tab-wrap">
    <ul class="sub-tab-menu cf">
        <li {!! !request()->query('del') ? 'class="on"' : '' !!}><a href="{{ route('admin.abstract.list', request()->except('del','page')) }}">All List</a></li>
        <li {!! request()->query('del') == 'Y' ? 'class="on"' : '' !!}><a href="{{ route('admin.abstract.list', ['del'=>'Y'] + request()->except('del','page')) }}">Cancel</a></li>
    </ul>
</div>

<form action="{{ route('admin.abstract.list') }}" method="get">
    <fieldset>
        <legend class="hide">검색</legend>
        <div class="table-wrap">
            <table class="cst-table">
                <caption class="hide">
                    <colgroup>
                        <col style="width: 18%;">
                        <col style="width: 32%;">
                        <col style="width: 18%;">
                        <col style="width: 32%;">
                    </colgroup>
                    <tbody>
                        <tr>                            
                            <th scope="row">초록 접수번호</th>
                            <td class="text-left">
                                <input type="text" name="rnum" id="rnum" value="{{ request()->query('rnum') }}" class="form-item">
                            </td>
                            <th scope="row">Presentation Type</th>
                            <td class="text-left">
                                <select name="ptype" id="ptype" class="form-item">
                                    <option value="">All</option>
                                    @foreach( config('site.abstract.ptype') as $key => $val )
                                    <option value="{{ $key }}" {{ request()->query('ptype') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">발표자 이름<br>(Presenting Author’s)</th>
                            <td class="text-left">
                                <input type="text" name="pname" id="pname" value="{{ request()->query('pname') }}" class="form-item">
                            </td>
                            <th scope="row">책임저자 이름<br>(Corresponding Author’s)</th>
                            <td class="text-left">
                                <input type="text" name="cname" id="cname" value="{{ request()->query('cname') }}" class="form-item">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td class="text-left">
                                <select name="country" id="country" class="form-item">
                                    <option value="">==COUNTRY CHOICE==</option>
                                    @foreach( $country as $key => $val )
                                    <option value="{{ $val['cn'] }}" {{ request()->query('country') == $val['cn'] ? 'selected' : '' }}>{{ $val['cn'] }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <th scope="row">Status</th>
                            <td class="text-left">
                                <select name="status" id="status" class="form-item">
                                    <option value="">All</option>
                                    @foreach( config('site.abstract.status') as $key => $val )
                                    <option value="{{ $key }}" {{ request()->query('status') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Abstract Title</th>
                            <td class="text-left" colspan="3">
                                <input type="text" name="subject" id="subject" value="{{ request()->query('subject') }}" class="form-item">
                            </td>
                        </tr>
                    </tbody>
                </caption>
            </table>
        </div>
        
        <div class="table-wrap">
            <table class="cst-table">
                <caption class="hide">기간 등록</caption>
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 30%;">
                    <col style="width: 20%;">
                    <col style="width: 30%;">
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row">초록 등록 시작 일시</th>
                        <td class="text-left">
                            <div class="form-group has-btn">
                                <input type="text" class="form-item dateTimeCalendar" readonly value="{{ $period['sdate'] ?? '' }}">
                                <span class="material-symbols-outlined" style="font-size:30px; cursor: pointer;" onclick="dbChange('{{ encrypt('1') }}', 'abstract_periods', 'sdate', this);">save_as</span>    
                            </div>
                        </td>
                        <th scope="row">초록 등록 종료 일시</th>
                        <td class="text-left">
                            <div class="form-group has-btn">
                                <input type="text" class="form-item dateTimeCalendar" readonly value="{{ $period['edate'] ?? '' }}">
                                <span class="material-symbols-outlined" style="font-size:30px; cursor: pointer;" onclick="dbChange('{{ encrypt('1') }}', 'abstract_periods', 'edate', this);">save_as</span>    
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="btn-wrap text-center">
            <button type="submit" class="btn btn-type1 color-type4">검색</button>
            <button type="reset" class="btn btn-type1 color-type6" onclick="location.href='{{ route('admin.abstract.list') }}'">검색 초기화</button>
            <a href="{{ route('admin.abstract.excel', request()->except('page')) }}" class="btn btn-type1 color-type10">Get Excel File</a>

            <a href="{{ route('admin.abstract.excel', request()->except('page')) }}" onclick="swalAlert('준비중 입니다.', '', 'info'); return false;" class="btn btn-type1 color-type9">워드 백업</a>
            <a href="{{ route('admin.abstract.excel', request()->except('page')) }}" onclick="swalAlert('준비중 입니다.', '', 'info'); return false;" class="btn btn-type1 color-type9">워드 백업 미리보기</a>
        </div>
    </fieldset>
</form>

<div class="list-contop text-right cf">
    <span class="cnt full-left">
        [총 <strong>{{ $lists->count() }}</strong>명]
    </span>
    <select name="" id="" class="form-item" onchange="location.href='/admin/registration/?paginate='+$(this).val()">
        <option value="20">20</option>
        <option value="30" {{ request()->query('paginate') == '30' ? 'selected' : '' }}>30</option>
        <option value="50" {{ request()->query('paginate') == '50' ? 'selected' : '' }}>50</option>
        <option value="100" {{ request()->query('paginate') == '100' ? 'selected' : '' }}>100</option>
    </select>
    개씩 보기
</div>
<div class="table-wrap">
    <table class="cst-table list-table">
        <caption class="hide">목록</caption>
        <colgroup>
            <col style="width: 2%;">
            <col style="width: 4%;">
            <col style="width: 8%;">
            <col style="width: 10%;">
            <col style="width: *">
            <col style="width: 8%;">
            <col style="width: 8%;">
            <col style="width: 12%;">
            <col style="width: 8%;">

            <col style="width: 8%;">
            <col style="width: 6%;">
            <col style="width: 6%;">

            <col style="width: 4%;">
            <col style="width: 4%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">접수번호</th>
                <th scope="col">Status</th>
                <th scope="col">Presentation Type</th>
                <th scope="col">Topic</th>
                <th scope="col">Presentation<br>author</th>
                <th scope="col">Corresponding<br>author</th>
                <th scope="col">Abstract Title</th>
                <th scope="col">최초 등록일</th>
                <th scope="col">최종 수정일</th>
                <th scope="col">워드백업</th>
                <th scope="col">Mail 재발송</th>
                <th scope="col">메모</th>
                <th scope="col">관리</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $lists as $index => $d )
            <tr>
                <td>{{ $d->seq }}</td>
                <td>
                    @if( $d->status == 'Y' )
                    <a href="{{ route('admin.abstract.modifyForm', ['sid'=>encrypt($d->sid), 'step'=>'1']) }}" class="Load_Base_fix" Wsize="1500" Hsize="900" Tsize="2%" Reload="Y">{{ $d->rnum }}</a>
                    @else
                    {{ $d->rnum }}
                    @endif
                </td>
                <td>
                    <select onchange="dbChange('{{ encrypt($d->sid) }}', 'abstract', 'status', this);" class="form-item">  
                        @foreach( config('site.abstract.status') as $key => $val )
                        <option value="{{ $key }}" {{ $d->status == $key ? 'selected' : '' }}>{{ $val }}</option>
                        @endforeach
                    </select>
                </td>
                <td>{{ config('site.abstract.ptype')[$d->ptype] }}</td>
                <td>{{ config('site.abstract.topic')[$d->topic] }}</td>
                <td>{{ $d->getPresentation()->first_name.' '.$d->getPresentation()->last_name }}</td>
                <td>{{ $d->getCorresponding()->first_name.' '.$d->getCorresponding()->last_name }}</td>
                <td>{{ $d->subject }}</td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->complete_at }}</td>
                <td>
                    @if( $d->status == 'Y' )
                    <a href="#n" class="btn btn-small color-type4" onclick="swalAlert('준비중 입니다.', '', 'info');">워드백업</a>
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if( $d->status == 'Y' )
                    <a href="{{ route('admin.abstract.sendMailForm', ['sid'=>encrypt($d->sid)]) }}" class="btn btn-small color-type7 Load_Base_fix" Wsize="730" Hsize="900" Tsize="2%" Reload="N">메일발송</a>
                    @else
                    -
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.abstract.memoForm', ['sid'=>encrypt($d->sid)]) }}" class="Load_Base_fix" Wsize="730" Hsize="900" Tsize="2%" Reload="Y">
                        <span class="material-symbols-outlined">
                            content_paste{{ !$d->memo ? '_off' : ''}}
                        </span>
                    </a>
                </td>
                <td>
                    @if( request()->query('del') == 'Y' )
                    <a href="#n" class="btn btn-small color-type4 btn-recovery" onclick="swalConfirm('복구 처리하시겠습니까?', '', function(){ dbChange('{{ encrypt($d->sid) }}','abstract','delete',$('.btn-recovery')); })" data-status="N">복구</a>
                    @else
                        <a href="{{ route('admin.abstract.modifyForm', ['sid'=>encrypt($d->sid), 'step'=>'1']) }}" class="btn-admin btn-modify Load_Base_fix" Wsize="1500" Hsize="900" Tsize="2%" Reload="Y"><img src="/devAdmin/assets/image/admin/ic_modify.png" alt="수정"></a>
                        <a href="#n" class="btn-admin btn-del" onclick="swalConfirm('삭제 처리하시겠습니까?', '', function(){ dbChange('{{ encrypt($d->sid) }}','abstract','delete',$('.btn-del')); })" data-status="Y"><img src="/devAdmin/assets/image/admin/ic_del.png" alt="삭제"></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $lists->links('paginateUser', ['list'=>$lists]) }}

</div>
@endsection   
