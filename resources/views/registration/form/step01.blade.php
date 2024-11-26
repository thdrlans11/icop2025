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
        <div class="form-tit">Title <strong class="required">*</strong></div>
        <div class="form-con">
            <div class="radio-wrap cst">
                @foreach( config('site.registration.title') as $key => $val )
                <label for="title{{ $key }}" class="radio-group">
                    <input type="radio" name="title" id="title{{ $key }}" value="{{ $key }}" {{ ( $apply->title ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                </label>
                @endforeach
                <input type="text" name="title_etc" id="title_etc" value="{{ $apply->title_etc ?? '' }}" class="form-item engOnly" {{ ( $apply->title ?? '' ) != 'Z' ? 'disabled' : '' }}>
            </div>
        </div>
    </li>
    <li>
        <div class="form-tit">Degree <strong class="required">*</strong></div>
        <div class="form-con">
            <div class="radio-wrap cst">
                @foreach( config('site.registration.degree') as $key => $val )
                <label for="degree{{ $key }}" class="radio-group">
                    <input type="radio" name="degree" id="degree{{ $key }}" value="{{ $key }}" {{ ( $apply->degree ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                </label>
                @endforeach
            </div>
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
    
    <!-- Country > Korea, Repulic of 선택 시 노출 -->
    <li class="korBox" {!! ( $apply->ccode ?? '' ) != 'KR' ? 'style="display:none"' : '' !!}>
        <div class="form-tit">국문 성명 <strong class="required">*</strong></div>
        <div class="form-con">
            <input type="text" name="name" id="name" class="form-item korOnly" value="{{ $apply->name ?? '' }}">
        </div>
    </li>
    <li>
        <div class="form-tit">Department <strong class="required">*</strong></div>
        <div class="form-con">
            <input type="text" name="department" id="department" value="{{ $apply->department ?? '' }}" class="form-item engNumOnly">
        </div>
    </li>
    <li>
        <div class="form-tit">Affiliation <strong class="required">*</strong></div>
        <div class="form-con">
            <input type="text" name="affiliation" id="affiliation" value="{{ $apply->affiliation ?? '' }}" class="form-item engNumOnly">
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
</ul>