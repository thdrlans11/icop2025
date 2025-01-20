<!-- Country > Korea, Repulic of 선택 시 노출 -->
<div class="sub-tit-wrap">
    <h4 class="sub-tit">등록구분 선택</h4>
</div>
<div class="table-wrap">
   <table class="cst-table">
                    <caption class="hide">등록비 안내</caption>
                    <colgroup>
                        <col style="width: 18%;">
                        <col>
                        <col style="width: 28%;">
                        <col style="width: 28%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="bg-skyblue">구분</th>
                            <th scope="col" class="bg-navy">Early Bird Registration <br><span>(3월 14일까지)</span></th>
                            <th scope="col" class="bg-green">Late Registration <br><span>(3월 15일 - 4월 30일)</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" rowspan="4">등록비</th>
                            <td>Delegate</td>
                            <td class="bg-blue">500,000원</td>
                            <td class="bg-green2">600,000원</td>
                        </tr>
                        <tr>
                            <td>Student <br>Post Doctor </td>
                            <td class="bg-blue">300,000원</td>
                            <td class="bg-green2">400,000원</td>
                        </tr>
						<tr>
                            <td>Accompanying Person</td>
                            <td colspan="2">150,000 원</td>
                        </tr>
                        <tr>
                            <td>One-day Pass</td>
                            <td colspan="2">150,000 원</td>
                        </tr>
                        <tr>
                            <th scope="row">사교행사</th>
                            <td>Banquet</td>
                            <td colspan="2">150,000 원</td>
                        </tr>
                    </tbody>
                </table>
</div>
<div class="write-wrap mt-60">
    <div class="write-tit-wrap text-center">
        <h5>{{ config('site.registration.chaText')[$type] }}</h5>
    </div>
    <ul>
        <li>
            <div class="form-tit">구분 <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.registration.category') as $key => $val )
                    <label for="category{{ $key }}" class="radio-group">
                        <input type="radio" name="category" id="category{{ $key }}" value="{{ $key }}" {{ ( $apply->category ?? '' ) == $key ? 'checked' : '' }} onclick="makePrice('{{$apply->lang}}')">{{ $val }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
        <li>
            <div class="form-tit">참석 구분 <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.registration.attendType') as $key => $val )
                    <label for="attendType{{ $key }}" class="radio-group">
                        <input type="radio" name="attendType" id="attendType{{ $key }}" value="{{ $key }}" {{ ( $apply->attendType ?? '' ) == $key ? 'checked' : '' }} onclick="makePrice('{{$apply->lang}}')">{{ $val }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="oneDayBox" {!! ( $apply->attendType ?? '' ) != 'O' ? 'style="display:none"' : '' !!}>
            <div class="form-tit">참석 희망 날짜 <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="checkbox-wrap cst">
                    @foreach( config('site.registration.oneDay') as $key => $val )
                    <label for="oneDay{{ $key }}" class="checkbox-group">
                        <input type="checkbox" name="oneDay[]" id="oneDay{{ $key }}" value="{{ $key }}" {{ isset($apply->oneDay) && in_array($key,$apply->oneDay) ? 'checked' : '' }} onclick="makePrice('{{$apply->lang}}')">June {{ $val }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
        <li>
            <div class="form-tit">Accompanying Person <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.registration.accompanying') as $key => $val )
                    <label for="accompanying{{ $key }}" class="radio-group">
                        <input type="radio" name="accompanying" id="accompanying{{ $key }}" value="{{ $key }}" {{ ( $apply->accompanying ?? '' ) == $key ? 'checked' : '' }} onclick="makePrice('{{$apply->lang}}')">{{ $val }} {{ $key != 'N' ? '- '.config('site.registration.unit')[$apply->lang].' '.number_format(config('site.registration.accompanyingPrice')[$apply->lang]*$key) : '' }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
        <li>
            <div class="form-tit">Banquet <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.registration.banquet') as $key => $val )
                    <label for="banquet{{ $key }}" class="radio-group">
                        <input type="radio" name="banquet" id="banquet{{ $key }}" value="{{ $key }}" {{ ( $apply->banquet ?? '' ) == $key ? 'checked' : '' }} onclick="makePrice('{{$apply->lang}}')">{{ $val }} {{ $key != 'N' ? '- '.config('site.registration.unit')[$apply->lang].' '.number_format(config('site.registration.banquetPrice')[$apply->lang]*$key) : '' }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="write-wrap studentBox" {!! ( $apply->category ?? '' ) != 'B' ? 'style="display:none"' : '' !!}>
    <div class="write-tit-wrap text-center">
        <h5>학생 증빙 자료 제출 (jpg, png, gif, pdf 파일)</h5>
    </div>
    <ul>
        <li>
            <div class="form-tit">파일 업로드 <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="filebox">
                    <input class="upload-name form-item" id="filenameText" value="" placeholder="Select File" readonly="readonly">
                    <label for="userfile">파일 검색</label>
                    <input type="file" id="userfile" name="userfile" class="file-upload" onclick="return file_check('{{ $apply['filename'] ?? '' }}','delfile')" onchange="fileAcceptCheck(this, 'filenameText', '');" accept=".jpg, .png, .gif, .pdf">
                    @if( isset($apply->realfile) )
                    <div class="attach-file">
                        <a href="{{ route('download', ['type'=>'only', 'tbl'=>'registration', 'sid'=>encrypt($apply->sid)]) }}">{{ $apply->filename }}</a>
                        <input type="checkbox" name="delfile" id="delfile" value="{{ $apply->realfile ?? '' }}" style="position: relative; top:2px" class="ml-10"/><span class="file-link ml-5">Please check if you wish to delete</span>
                    </div>
                    @endif
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="price-box">
    <img src="/assets/image/sub/ic_price.png" alt="">
    <div class="text-wrap">
        <strong class="tit">총 결제 금액 : <span class="text-orange totalPriceSpan">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format($apply->price) }}</span></strong>
        <input type="hidden" name="price" id="price" value="{{ $apply->price }}" readonly/>
        <p class="priceText">
        </p>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
    makePrice('{{ $apply->lang }}');
});    
</script>
@endpush