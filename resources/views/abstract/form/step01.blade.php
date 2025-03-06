<!DOCTYPE html>
@include('abstract.tinymce')

<ul class="write-wrap">
    <li>
        <div class="form-tit">Presentation Type <strong class="required">*</strong></div>
        <div class="form-con">
            <div class="radio-wrap cst">
                @foreach( config('site.abstract.ptype') as $key => $val )
                <label for="ptype{{ $key }}" class="radio-group">
                    <input type="radio" name="ptype" id="ptype{{ $key }}" value="{{ $key }}" {{ ( $apply->ptype ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                </label>
                @endforeach
            </div>
        </div>
    </li>
    <li>
        <div class="form-tit">Abstract Topics <strong class="required">*</strong> </div>
        <div class="form-con">
            <div class="radio-wrap cst n2">
                @foreach( config('site.abstract.topic') as $key => $val )
                <label for="topic{{ $key }}" class="radio-group">
                    <input type="radio" name="topic" id="topic{{ $key }}" value="{{ $key }}" {{ ( $apply->topic ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                    @if( $key == 'Z' )
                    <input type="text" name="topic_other" id="topic_other" value="{{ $apply->topic_other ?? '' }}" class="form-item" {{ ( $apply->topic ?? '' ) != 'Z' ? 'readonly' : '' }} />
                    @endif
                </label>
                @endforeach
            </div>
        </div>
    </li>
</ul>

<ul class="write-wrap">
    <li>
        <div class="form-tit">Apply for Awards</div>
        <div class="form-con">
            @if( $_SERVER['REMOTE_ADDR'] == '218.235.94.223' )
            <div class="checkbox-wrap cst mb-10">
                <label for="student" class="checkbox-group">
                    <input type="checkbox" name="student" id="student" value="Y" {{ ( $apply->student ?? '' ) == 'Y' ? 'checked' : '' }}>I am a Student
                </label>
            </div>
            @endif
            <div class="checkbox-wrap cst">
                <label for="award" class="checkbox-group">
                    <input type="checkbox" name="award" id="award" value="Y" {{ ( $apply->award ?? '' ) == 'Y' ? 'checked' : '' }}>I agree to present in the ‘Awards Session’ session.
                </label>
            </div>
        </div>
    </li>
</ul>    

<div class="sub-tit-wrap mt-60">
    <h4 class="sub-tit">Authors Information</h4>
</div>
<div class="line-box">
    <ul class="list-type list-type-dot">
        <li>If the author and co-author’s institution are the same, please select <strong class="text-blue">‘1’ as the institution number</strong> and click Insert button to enter all required information.</li>
        <li>If the author and co-author’s institution are different, please select <strong class="text-blue">the number of institution</strong> and click the Insert button to enter all required information.</li>
    </ul>
</div>
<div class="select-box">
    <div class="form-group">
        Select the number of all institution
        <select name="institution_count" id="institution_count" class="form-item x-small">
            @for( $i=1; $i<=30; $i++ )
            <option value="{{ $i }}" {{ ( $apply->institution_count ?? '' ) == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        <a href="#n" class="btn btn-small color-type3" onclick="make_institution();"><span class="plus">+</span> Insert</a>
    </div>
    <div class="help-text">
        Fields marked with an asterisk(<strong class="required">*</strong>) are required.
    </div>
</div>
<div class="write-wrap institution_container">
    <?
       $defaultInstitution = array( '0'=> (object) array( 'sort_number'=>'1' ) );
       $defaultInstitution = (object) $defaultInstitution;
    ?>
    @foreach( $apply->institutions ?? $defaultInstitution as $institution )
    <div class="write-wrap institution_box">
        <div class="write-tit-wrap">
            <h5>Institution #<span class="institution_number">{{ $institution->sort_number }}</span></h5>
            <input type="hidden" name="institution_sid[]" value="{{ $institution->sid ?? '' }}"/>
        </div>
        <ul>
            
            <li class="n2">
                <div class="form-tit">Country <strong class="required">*</strong></div>
                <div class="form-con">
                    <select name="country[]" id="" class="form-item">
                        <option value="">SELECT</option>
                        @foreach( $countrys as $country )
                        <option value="{{ $country['cn'] }}" {{ ( $institution->country ?? '' ) == $country['cn'] ? 'selected' : '' }}>{{ $country['cn'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-tit">Department <strong class="required">*</strong></div>
                <div class="form-con">
                    <input type="text" name="department[]" value="{{ $institution->department ?? '' }}" class="form-item korNumNone" onchange="toFirstOpper(this)">
                </div>
            </li>
            
            <li class="n2">
                <div class="form-tit">Affiliation <strong class="required">*</strong></div>
                <div class="form-con">
                    <input type="text" name="affiliation[]" value="{{ $institution->affiliation ?? '' }}" class="form-item korNumNone" onchange="toFirstOpper(this)">
                </div>
                <div class="form-tit">City <strong class="required">*</strong></div>
                <div class="form-con">
                    <input type="text" name="city[]" value="{{ $institution->city ?? '' }}" class="form-item korNumNone" onchange="toFirstOpper(this)">
                </div>
            </li>
        </ul>
    </div>
    @endforeach
</div>

<div class="select-box">
    <div class="form-group">
        Select the number of all authors (including a presenting and corresponding author)
        <select name="author_count" id="author_count" class="form-item x-small">
            @for( $i=1; $i<=30; $i++ )
            <option value="{{ $i }}" {{ ( $apply->author_count ?? '' ) == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        <a href="#n" class="btn btn-small color-type3" onclick="make_author()"><span class="plus">+</span> Insert</a>
    </div>
</div>

<div class="write-wrap">
    <div class="table-wrap scroll-x touch-help">
        <table class="cst-table">
            <caption class="hide">Authors inforamtion</caption>
            <colgroup>
                <col style="width: 6%;">
                <col>
                <col>
                <col>
                <col>
                <col>
                <col style="width: 13%;">
                <col>
                <col>
                <col style="width: 11%;">
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">Order</th>
                    <th scope="col">First Name <strong class="required">*</strong></th>
                    <th scope="col">Last Name <strong class="required">*</strong></th>
                    <th scope="col">E-Mail <strong class="required">*</strong></th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Country <strong class="required">*</strong></th>
                    <th scope="col">Institution No. <strong class="required">*</strong></th>
                    <th scope="col">Presentation Author <strong class="required">*</strong></th>
                    <th scope="col">Corresponding Author <strong class="required">*</strong></th>
                    <th scope="col">Author Order</th>
                </tr>
            </thead>
            <tbody id="author_table">
                <?
                $defaultAuthor = array( '0'=> (object) array( 'sort_number'=>'1' ) );
                $defaultAuthor = (object) $defaultAuthor;
                ?>
                @foreach( $apply->authors ?? $defaultAuthor as $author )
                <tr class="author_box">
                    <td class="author_number">
                        {{ $author->sort_number }}
                        <input type="hidden" name="author_sid[]" value="{{ $author->sid ?? '' }}"/>
                    </td>
                    <td>
                        <input type="text" name="author_firstname[]" value="{{ $author->first_name ?? '' }}" class="form-item korNumNone" onchange="toFirstOpper(this)">
                    </td>
                    <td>
                        <input type="text" name="author_lastname[]" value="{{ $author->last_name ?? '' }}" class="form-item korNumNone" onchange="toFirstOpper(this)">
                    </td>
                    <td>
                        <input type="text" name="author_email[]" value="{{ $author->email ?? '' }}" id="" class="form-item emailOnly">
                    </td>
                    <td>
                        <input type="text" name="author_mobile[]" value="{{ $author->mobile ?? '' }}" id="" class="form-item numOnly">
                    </td>
                    <td>
                        <select name="author_country[]" class="form-item">
                            <option value="">Select</option>
                            @foreach( $countrys as $country )
                            <option value="{{ $country['cn'] }}" {{ ( $author->country ?? '' ) == $country['cn'] ? 'selected' : '' }}>{{ $country['cn'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="author_institution_1[]" class="form-item w-40p">
                            @for( $i=1; $i <= ( $apply->institution_count ?? 1 ); $i++ )
                            <option value="{{ $i }}" {{ ( $author->institution_1 ?? '' ) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <select name="author_institution_2[]" id="" class="form-item w-40p">
                            <option value=""></option>
                            @for( $i=1; $i <= ( $apply->institution_count ?? 1 ); $i++ )
                            <option value="{{ $i }}" {{ ( $author->institution_2 ?? '' ) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <div class="radio-wrap cst text-center">
                            <label for="" class="radio-group">
                                <input type="radio" name="p_author_{{ $author->sort_number }}" {{ ( $author->presentation_author ?? '' ) == 'Y' ? 'checked' : '' }} value="Y">
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="radio-wrap cst text-center">
                            <label for="" class="radio-group">
                                <input type="radio" name="c_author_{{ $author->sort_number }}" {{ ( $author->corresponding_author ?? '' ) == 'Y' ? 'checked' : '' }} value="Y">
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="#n" class="btn btn-arrow up" onclick="move_author(this,'up')"></a>
                        <a href="#n" class="btn btn-arrow down" onclick="move_author(this,'down')"></a>
                        <a href="#n" class="btn btn-arrow delete del_author"></a>
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
            <div class="form-tit">Abstract Title <strong class="required">*</strong> </div>
            <div class="form-con">
                <input type="text" name="subject" id="subject" value="{{ $apply->subject ?? '' }}" class="form-item korNumNone" onchange="toFirstOpper(this)">
                <p class="mt-10">
                    (<input type="text" id="subject_length" value="{{ empty($apply->subject) ? '' : count(explode(' ', $apply->subject)) }}" class="form-item n-bd text-center" readonly>) 30words (The title should be less than 30 words.)
                </p>
                <p class="help-text text-red mt-10">* The First letter of the words should be typed in capital. Article and Preposition are to be written in small letter.</p>
            </div>
        </li>
    </ul>
    <ul>
        <li class="wide">
            <div class="form-tit text-left">
                ※ The abstract must not exceed 300 words. (All abstracts words : <strong class="text-red"><span id="max_words">0</span> / 300</strong>) <br>
                (Less than 300 words excluding the abstract title. Spaces do not count as characters.)
            </div>
        </li>
        <li>
            <div class="form-tit">Abstract <strong class="required">*</strong></div>
            <div class="form-con">
                <input type="hidden" value="0" class="tinyword-cnt">
                <textarea name="content" id="content" class="form-item tinymce">{!! $apply->content ?? '' !!}</textarea>
            </div>
        </li>
        <li>
            <div class="form-tit">Keywords <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="form-group n5">
                    @for( $i=0; $i<5; $i++ )
                    <input type="text" name="keyword[]" value="{{ $apply->keyword[$i] ?? '' }}" class="form-item">
                    @endfor
                </div>
            </div>
        </li>
        <li class="wide">
            <div class="form-tit">Do you agree on changing your presentation type between oral presentation and poster after abstract acceptance? <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.abstract.answer') as $key => $val )
                    <label for="agree1{{ $key }}" class="radio-group">
                        <input type="radio" name="agree1" id="agree1{{ $key }}" value="{{ $key }}" {{ ( $apply->agree1 ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="wide">
            <div class="form-tit">Copyright Agreement <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.abstract.agree') as $key => $val )
                    <label for="agree2{{ $key }}" class="radio-group">
                        <input type="radio" name="agree2" id="agree2{{ $key }}" value="{{ $key }}" {{ ( $apply->agree2 ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
    </ul>
</div>