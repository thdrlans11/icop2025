
<div class="write-wrap">
    <div class="write-tit-wrap text-center">
        <h5>Organizer</h5>
    </div>
    <ul class="write-wrap">
        <li>
            <div class="form-tit">Symposium No.</div>
            <div class="form-con">
                {{ $apply->rnum }}
            </div>
        </li>
        <li>
            <div class="form-tit">Symposium Date</div>
            <div class="form-con">
                {{ $apply->complete_at }}
            </div>
        </li>
        <li>
            <div class="form-tit">Country</div>
            <div class="form-con">
                {{ $apply->country->cn }}
            </div>
        </li>
        <li>
            <div class="form-tit">Name</div>
            <div class="form-con">
                {{ $apply->firstName.' '.$apply->lastName }}
            </div>
        </li>
        <li>
            <div class="form-tit">Affiliation</div>
            <div class="form-con">
                {{ $apply->affiliation }}
            </div>
        </li>
        <li>
            <div class="form-tit">E-mail</div>
            <div class="form-con">
                {{ $apply->email }}
            </div>
        </li>
        <li>
            <div class="form-tit">Phone Number</div>
            <div class="form-con">
                +{{ $apply->cnum.' '.$apply->mobile }}
            </div>
        </li>
        <li>
            <div class="form-tit">Photo <br><span class="help-text">(Only jpg, png)</span></div>
            <div class="form-con">
                <div class="attach-file"><a href="{{ route('download', ['type'=>'only', 'tbl'=>'symposium', 'sid'=>encrypt($apply->sid)]) }}" class="link">{{ $apply->filename }}</a></div>
            </div>
        </li>
        <li>
            <div class="form-tit">Symposium Title</div>
            <div class="form-con">
                {{ $apply->title }}
            </div>
        </li>
        <li>
            <div class="form-tit">Brief synopsis of topic</div>
            <div class="form-con">
                {{ $apply->topic }}
            </div>
        </li>
    </ul>
</div>

<div class="write-wrap">
    <div class="write-tit-wrap text-center">
        <h5>Speakers</h5>
    </div>
    <div class="table-wrap">
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
                    <th scope="row">Speaker 1 <strong class="required">*</strong></th>
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
</div>

                