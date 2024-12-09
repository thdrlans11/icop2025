<div class="sub-tit-wrap">
    <h4 class="sub-tit">Personal Information</h4>
</div>
<ul class="write-wrap">
    <li>
        <div class="form-tit">Country <strong class="required">*</strong></div>
        <div class="form-con">
            @if( !$apply )
            <select name="ccode" id="ccode" class="form-item">
                <option value="">Country choice</option>
                @foreach( $country as $key => $val )
                <option value="{{ $key }}" data-cnum="{{ $val['cnum'] }}" {{ ( $apply->country ?? '' ) == $key ? 'selected' : '' }}>{{ $val['cn'] }}</option>
                @endforeach
            </select>
            @else
            {{ $country[$apply->ccode]['cn'] }}
            @endif
        </div>
    </li>
    <li>
        <div class="form-tit">Name <strong class="required">*</strong></div>
        <div class="form-con">
            <div class="form-group n2">
                <input type="text" name="firstName" id="firstName" class="form-item engOnly" onchange="toFirstOpper(this)" value="{{ $apply->firstName ?? '' }}" placeholder="First name">
                <input type="text" name="lastName" id="lastName" class="form-item engOnly" onchange="toFirstOpper(this)" value="{{ $apply->lastName ?? '' }}" placeholder="Last name">
            </div>
        </div>
    </li>
    <li>
        <div class="form-tit">Affiliation <strong class="required">*</strong></div>
        <div class="form-con">
            <input type="text" name="affiliation" id="affiliation" value="{{ $apply->affiliation ?? '' }}" class="form-item engNumOnly">
        </div>
    </li>
    <li>
        <div class="form-tit">E-mail <strong class="required">*</strong></div>
        <div class="form-con">
            @if( !$apply )
            <div class="form-group has-btn">
                <input type="text" name="email" id="email" value="{{ $apply->email ?? '' }}" class="form-item">
                <a href="#n" onclick="emailCheck();" class="btn btn-small color-type3">Duplication check</a>
            </div>
            @else
            {{ $apply->email }}
            @endif
        </div>
    </li>
    <li>
        <div class="form-tit">Phone Number <strong class="required">*</strong></div>
        <div class="form-con">
            <div class="form-group form-group-text n2">
                <div class="text-wrap">
                    <p>+ Country Code</p>
                    <input type="text" name="cnum" id="cnum" value="{{ $apply->cnum ?? '' }}" class="form-item numOnly">
                </div>
                <span class="text">-</span>
                <div class="text-wrap">
                    <p>Mobile Number</p>
                    <input type="text" name="mobile" id="mobile" value="{{ $apply->mobile ?? '' }}" class="form-item numOnly">
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="form-tit">Photo <strong class="required">*</strong> <br><span class="help-text">(Only Jpg, png)</span></div>
        <div class="form-con">
            <div class="filebox">
                <input class="upload-name form-item" id="filenameText" value="" placeholder="Select File" readonly="readonly">
                <label for="userfile">Select File</label>
                <input type="file" id="userfile" name="userfile" class="file-upload" onclick="return file_check('{{ $apply['filename'] ?? '' }}','delfile')" onchange="fileAcceptCheck(this, 'filenameText', '');" accept=".jpg, .png">
                @if( isset($apply->realfile) )
                <div class="attach-file">
                    <a href="{{ route('download', ['type'=>'only', 'tbl'=>'symposium', 'sid'=>encrypt($apply->sid)]) }}">{{ $apply->filename }}</a>
                    <input type="checkbox" name="delfile" id="delfile" value="{{ $apply->realfile ?? '' }}" style="position: relative; top:2px" class="ml-10"/><span class="file-link ml-5">Please check if you wish to delete</span>
                </div>
                @endif
            </div>
        </div>
    </li>
</ul>

<div class="sub-tit-wrap">
    <h4 class="sub-tit">Symposium Information</h4>
</div>
<ul class="write-wrap">
    <li>
        <div class="form-tit">Symposium Title <strong class="required">*</strong></div>
        <div class="form-con">
            <input type="text" name="title" id="title" value="{{ $apply->title ?? '' }}" class="form-item engNumOnly">
        </div>
    </li>
    <li>
        <div class="form-tit">Brief synopsis of topic <strong class="required">*</strong></div>
        <div class="form-con">
            <input type="text" name="topic" id="topic" value="{{ $apply->topic ?? '' }}" class="form-item engNumOnly">
        </div>
    </li>
</ul>

<div class="price-box">
    <img src="/assets/image/sub/ic_price.png" alt="">
    <div class="text-wrap">
        <p>
            Please note that each symposium organizer should be recommended to invite FOUR speakers, with 20 minutes allotted for each talk, totaling 80 minutes for each symposium. <br>
            We plan to offer a budget of <strong class=" text-orange">1,000,000 WON</strong> (the official currency of the Republic of Korea) for each symposium.
        </p>
    </div>
</div>

<div class="table-wrap mt-60">
    <table class="cst-table">
        <caption class="hide">Speakers Information</caption>
        <colgroup>
            <col style="width: 12%;">
            <col>
            <col>
            <col>
            <col>
        </colgroup>
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Afflication</th>
                <th scope="col">Country</th>
                <th scope="col">Lecture Title</th>
            </tr>
        </thead>
        <tbody>
            @for( $i=1; $i<=4; $i++ )
            <tr>
                <th scope="row">Speaker {{ $i }} <strong class="required">*</strong></th>
                <td>
                    <div class="form-group n2">
                        <input type="text" name="speakerFirstName[]" id="speakerFirstName{{ $i }}" class="form-item engOnly" onchange="toFirstOpper(this)" value="{{ $apply->speakers[$i-1]->fname ?? '' }}" placeholder="First name">
                        <input type="text" name="speakerLastName[]" id="speakerLastName{{ $i }}" class="form-item engOnly" onchange="toFirstOpper(this)" value="{{ $apply->speakers[$i-1]->lname ?? '' }}" placeholder="Last name">
                    </div>
                </td>
                <td>
                    <input type="text" name="speakerAffiliation[]" id="speakerAffiliation{{ $i }}" value="{{ $apply->speakers[$i-1]->affi ?? '' }}" class="form-item engNumOnly">
                </td>
                <td>
                    <select name="speakerCcode[]" id="speakerCcode{{ $i }}" class="form-item">
                        <option value="">Country choice</option>
                        @foreach( $country as $key => $val )
                        <option value="{{ $key }}" data-cnum="{{ $val['cnum'] }}" {{ ( $apply->speakers[$i-1]->ccode ?? '' ) == $key ? 'selected' : '' }}>{{ $val['cn'] }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="speakerLectureTitle[]" id="speakerLectureTitle{{ $i }}" value="{{ $apply->speakers[$i-1]->title ?? '' }}" class="form-item engNumOnly">
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>