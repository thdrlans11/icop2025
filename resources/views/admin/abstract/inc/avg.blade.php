<? 
$abstractAvg = (new app\Models\AbstractRegistration)->abstractAvg();
$optionAvg = $abstractAvg['optionAvg'];
$countryAvg = $abstractAvg['countryAvg'];
?>
<ul class="write-wrap mb-50">
    <li class="full">
        <div class="form-tit text-center">
            <button type="button" class="btn btn-small color-type5  js-btn-toggle on">통계현황 닫기</button>
        </div>
        <div class="form-con js-toggle-con">
            <ul class="write-wrap">
                <li>
                    <div class="form-tit">접수현황</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.abstract.status') as $key => $val )
                            <li>
                                <a href="{{ route('admin.abstract.list', ['status'=>$key]) }}">
                                    {{ $val }} : {{ number_format($optionAvg['status'.$key]) }}건
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>                
                <li>
                    <div class="form-tit">나라별</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( $countryAvg as $key => $val )
                            <li>
                                <a href="{{ route('admin.abstract.list', ['country'=>$key]) }}">
                                    {{ $val['cn'] }} : {{ number_format($val['count']) }}건
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Presentation Type</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.abstract.ptype') as $key => $val )
                            <li>
                                <a href="{{ route('admin.abstract.list', ['ptype'=>$key]) }}">
                                    {{ $val }} : {{ number_format($optionAvg['ptype'.$key]) }}건
                                </a> 
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>                
            </ul>
        </div>
    </li>
</ul>