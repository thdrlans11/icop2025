<div class="sub-tit-wrap">
    <h4 class="sub-tit">Personal Information</h4>
</div>
<ul class="write-wrap">
    <li>
        <div class="form-tit">Country <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->country->cn }}
        </div>
    </li>
    <li>
        <div class="form-tit">Name <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->firstName.' '.$apply->lastName }}
        </div>
    </li>
    <li>
        <div class="form-tit">Affiliation <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->affiliation }}
        </div>
    </li>
    <li>
        <div class="form-tit">E-mail <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->email }}
        </div>
    </li>
    <li>
        <div class="form-tit">Phone Number <strong class="required">*</strong></div>
        <div class="form-con">
            +{{ $apply->cnum.' '.$apply->mobile }}
        </div>
    </li>
    <li>
        <div class="form-tit">Photo <strong class="required">*</strong> <br><span class="help-text">(Only Jpg, png)</span></div>
        <div class="form-con">
            <div class="attach-file">
                <a href="{{ route('download', ['type'=>'only', 'tbl'=>'symposium', 'sid'=>encrypt($apply->sid)]) }}" class="link">{{ $apply->filename }}</a>
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
            {{ $apply->title }}
        </div>
    </li>
    <li>
        <div class="form-tit">Brief synopsis of topic <strong class="required">*</strong></div>
        <div class="form-con">
            {{ $apply->topic }}
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
            @foreach( $apply->speakers as $key => $val )
            <tr>
                <th scope="row">Speaker {{ $key+1 }} <strong class="required">*</strong></th>
                <td>
                    {{ $val->fname.' '.$val->lname }}
                </td>
                <td>
                    {{ $val->affi }}
                </td>
                <td>
                    {{ $country[$val->ccode]['cn'] }}
                </td>
                <td>
                    {{ $val->title }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

                        