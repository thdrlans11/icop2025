<? 
$registrationAvg = (new app\Models\Registration)->registrationAvg();
$optionAvg = $registrationAvg['optionAvg'];
$countryAvg = $registrationAvg['countryAvg'];
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
                            <li>전체 : <a href="{{ route('admin.registration.list') }}">{{ number_format($optionAvg->totalCount) }}건</a></li>
                            <li>국내 : <a href="{{ route('admin.registration.list', ['lang'=>'KOR']) }}">{{ number_format($optionAvg->countryK) }}건</a></li>
                            <li>국외 : <a href="{{ route('admin.registration.list', ['lang'=>'ENG']) }}">{{ number_format($optionAvg->countryE) }}건</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Payment Status</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.payStatus') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['payStatus'=>$key]) }}">
                                    {{ $val }} : {{ number_format($optionAvg['payStatus'.$key]) }}건
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Payment Method</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.payMethod') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['payMethod'=>$key]) }}">
                                    {{ $val }} : {{ number_format($optionAvg['payMethod'.$key]) }}건
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Category</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.category') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['category'=>$key]) }}">
                                    {{ $val }} : {{ number_format($optionAvg['category'.$key]) }}건
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Attendance Type</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.attendType') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['attendType'=>$key]) }}">
                                    {{ $val }} : {{ number_format($optionAvg['attendType'.$key]) }}건
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
                                <a href="{{ route('admin.registration.list', ['ccode'=>$key]) }}">
                                    {{ $val['cn'] }} : {{ number_format($val['count']) }}건
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Banquest - Payment needed</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.banquet') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['banquet'=>$key, 'payStatus'=>'N']) }}">
                                    {{ $val }} : {{ number_format($optionAvg['banquetN'.$key]) }}건
                                </a> 
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="form-tit">Banquest - Complete</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.banquet') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['banquet'=>$key, 'payStatus'=>'YF']) }}">
                                    {{ $val }} : {{ number_format($optionAvg['banquetY'.$key]) }}건
                                </a> 
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>                
                <li>
                    <div class="form-tit">Field Trip - Payment needed</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.tour') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['tour'=>$key, 'payStatus'=>'N']) }}">
                                    {{ $val }} : {{ number_format($optionAvg['tourN'.$key]) }}건
                                </a> 
                            </li>
                            @endforeach
                        </ul>    
                    </div>
                </li>
                <li>
                    <div class="form-tit">Field Trip - Complete</div>
                    <div class="form-con">
                        <ul class="bar-list">
                            @foreach( config('site.registration.tour') as $key => $val )
                            <li>
                                <a href="{{ route('admin.registration.list', ['tour'=>$key, 'payStatus'=>'YF']) }}">
                                    {{ $val }} : {{ number_format($optionAvg['tourY'.$key]) }}건
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