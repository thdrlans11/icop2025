<!-- Country > Korea, Repulic of 선택 시 노출 -->
<div class="sub-tit-wrap">
    <h4 class="sub-tit">Select registration fee</h4>
</div>
<div class="table-wrap">
    <table class="cst-table">
        <caption class="hide">Registration Fee</caption>
        <colgroup>
            <col style="width: 18%;">
            <col>
            <col style="width: 28%;">
            <col style="width: 28%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col" colspan="2" class="bg-skyblue">Registration Fee</th>
                <th scope="col" class="bg-navy">Early Bird Registration <br><span>(~March 31, 2025)</span></th>
                <th scope="col" class="bg-green">Late Registration <br><span>(March 31, 2025~)</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" rowspan="4">Registration</th>
                <td>Delegate</td>
                <td class="bg-blue">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.categoryPrice')[$apply->lang]['E']['A']) }}</td>
                <td class="bg-green2">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.categoryPrice')[$apply->lang]['L']['A']) }}</td>
            </tr>
            <tr>
                <td>Student<br>Post Doctor 
				</td>
                <td class="bg-blue">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.categoryPrice')[$apply->lang]['E']['B']) }}</td>
                <td class="bg-green2">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.categoryPrice')[$apply->lang]['L']['B']) }}</td>
            </tr>
            <tr>
                <td>Accompanying Person</td>
                <td colspan="2">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.accompanyingPrice')[$apply->lang]) }}</td>
            </tr>
            <tr>
                <td>One-day Pass</td>
                <td colspan="2">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.oneDayPrice')[$apply->lang]) }}</td>
            </tr>
            <tr>
                <th scope="row">Social Event</th>
                <td>Banquet</td>
                <td colspan="2">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format(config('site.registration.banquetPrice')[$apply->lang]) }}</td>
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
            <div class="form-tit">Category <strong class="required">*</strong></div>
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
            <div class="form-tit">Attendance Type <strong class="required">*</strong></div>
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
            <div class="form-tit">Which date you want to register? <strong class="required">*</strong></div>
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

<div class="write-wrap mt-60">
    <div class="write-tit-wrap text-center">
        <h5>Field Trip</h5>
    </div>
    <ul>
        <li>
            <div class="form-tit">Field Trip <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.registration.tour') as $key => $val )
                    <label for="tour{{ $key }}" class="radio-group">
                        <input type="radio" name="tour" id="tour{{ $key }}" value="{{ $key }}" {{ ( $apply->tour ?? '' ) == $key ? 'checked' : '' }} onclick="makePrice('{{$apply->lang}}')">{{ $val }} {{ $key != 'N' ? '- '.config('site.registration.unit')[$apply->lang].' '.number_format(config('site.registration.tourPrice')[$apply->lang]) : '' }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
    </ul>
</div>    

<div class="write-wrap studentBox" {!! ( $apply->category ?? '' ) != 'B' ? 'style="display:none"' : '' !!}>
    <div class="write-tit-wrap text-center">
        <h5>Student Verification Documents (Student ID or Certificate of Enrollment) (Only jpg, png, gif, pdf)</h5>
    </div>
    <ul>
        <li>
            <div class="form-tit">File upload <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="filebox">
                    <input class="upload-name form-item" id="filenameText" value="" placeholder="Select File" readonly="readonly">
                    <label for="userfile">Select File</label>
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
        <strong class="tit">Registration Total Fee : <span class="text-orange totalPriceSpan">{{ config('site.registration.unit')[$apply->lang] }} {{ number_format($apply->price) }}</span></strong>
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