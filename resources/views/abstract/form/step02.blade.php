<ul class="write-wrap">
    <li>
        <div class="form-tit">Abstract No.</div>
        <div class="form-con">
            <span class="text-blue">{{ $apply->rnum }}</span>
        </div>
    </li>
    <li>
        <div class="form-tit">Presentation Type <strong class="required">*</strong></div>
        <div class="form-con">
            {{ config('site.abstract.ptype')[$apply->ptype] }}
        </div>
    </li>
    <li>
        <div class="form-tit">Abstract Topics <strong class="required">*</strong></div>
        <div class="form-con">
            {{ config('site.abstract.topic')[$apply->topic] }} {{ $apply->topic == 'Z' ? '( '.$apply->topic_other.' )' : '' }}
        </div>
    </li>
    @if( $apply->award == 'Y' || $apply->student == 'Y' )
    <li>
        <div class="form-tit">Apply for Awards</div>
        <div class="form-con">
            @if( $apply->student == 'Y')
            <div>I am a Student</div>
            @endif
            
            @if( $apply->award == 'Y')
            <div>I agree to present in the ‘Awards Session’ session.</div>
            @endif
        </div>
    </li>
    @endif
</ul>

<div class="write-wrap">
    <div class="write-tit-wrap text-center">
        <h5>Authors Information</h5>
    </div>
    <div class="table-wrap scroll-x touch-help">
        <table class="cst-table">
            <caption class="hide">Authors inforamtion</caption>
            <colgroup>
                <col style="width: 6%;">
                <col>
                <col>
                <col style="width: 18%;">
                <col style="width: 12%;">
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">Order</th>
                    <th scope="col">First Name <strong class="required">*</strong></th>
                    <th scope="col">Last Name <strong class="required">*</strong></th>
                    <th scope="col">E-Mail <strong class="required">*</strong></th>
                    <th scope="col">Mobile </th>
                    <th scope="col">Country <strong class="required">*</strong></th>
                    <th scope="col">Institution No. <strong class="required">*</strong></th>
                    <th scope="col">Presentation Author <strong class="required">*</strong></th>
                    <th scope="col">Corresponding Author <strong class="required">*</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $apply->authors as $author  )
                <tr>
                    <td>{{ $author->sort_number }}</td>
                    <td>
                        {{ $author->first_name ?? '' }}
                    </td>
                    <td>
                        {{ $author->last_name ?? '' }}
                    </td>
                    <td>
                        <a href="mailto:{{ $author->email ?? '' }}" target="_blank" class="link">{{ $author->email ?? '' }}</a>
                    </td>
                    <td>
                        <a href="{{ $author->mobile ?? '' }}">{{ $author->mobile ?? '' }}</a>
                    </td>
                    <td>
                        {{ $author->country ?? '' }}
                    </td>
                    <td>
                        {{ $author->institution_1 ?? '' }} {{ $author->institution_2 ? ', '.$author->institution_2 : '' }}
                    </td>
                    <td>
                        <div class="radio-wrap cst text-center">
                            <label for="" class="radio-group"><input type="radio" {{ ( $author->presentation_author ?? '' ) == 'Y' ? 'checked' : '' }} onclick="return false"></label>
                        </div>
                    </td>
                    <td>
                        <div class="radio-wrap cst text-center">
                            <label for="" class="radio-group"><input type="radio" {{ ( $author->corresponding_author ?? '' ) == 'Y' ? 'checked' : '' }} onclick="return false"></label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="write-wrap">
    <div class="write-tit-wrap text-center">
        <h5>Abstract Information</h5>
    </div>
    <ul>
        <li>
            <div class="form-tit">Abstract Title <strong class="required">*</strong></div>
            <div class="form-con">
                {{ $apply->subject ?? '' }}
            </div>
        </li>
        <li>
            <div class="form-tit">Abstract <strong class="required">*</strong></div>
            <div class="form-con">
                {!! $apply->content ?? '' !!}
            </div>
        </li>
        <li>
            <div class="form-tit">Keywords <strong class="required">*</strong></div>
            <div class="form-con">
                {{ $apply->getKeyword() }}
            </div>
        </li>
    </ul>
</div>                        