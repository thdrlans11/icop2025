@extends('include.layout')

@section('content')
<article class="main-visual inner-layer-wide">
    <div class="main-visual-wrap js-main-visual cf">
        <div class="main-visual-con main-visual-con01">
            <div class="main-visual-text inner-layer">
                <h2 class="main-visual-tit">
                    <img src="/assets/image/main/img_mainvisual01.png" alt="16th International Congress of Protistology 2025, Joint meeting of ICOP/ISOP 2025">
                </h2>
            </div>

            <div class="visual-menu-wrap">
                <!-- Quick Mene-->
                <ul class="main-quick-menu">
                    <li class="type-bd">
                        <a href="{{ route(config('site.menu.sub_menu.2.1.route_target'), config('site.menu.sub_menu.2.1.route_param')) }}" class="tit">
                            <img src="/assets/image/main/ic_quick01.png" alt="">
                            <strong>Program at <br>a glance</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route(config('site.menu.sub_menu.2.2.route_target'), config('site.menu.sub_menu.2.2.route_param')) }}" class="tit type-bg">
                            <img src="/assets/image/main/ic_quick02.png" alt="">
                            <strong>Program in <br>Detail</strong>
                        </a>
                    </li>
                    <li class="type-bd">
                        <a href="{{ route(config('site.menu.sub_menu.3.1.route_target'), config('site.menu.sub_menu.3.1.route_param')) }}" class="tit">
                            <img src="/assets/image/main/ic_quick03.png" alt="">
                            <strong>Abstract <br>Guidelines</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route(config('site.menu.sub_menu.4.1.route_target'), config('site.menu.sub_menu.4.1.route_param')) }}" class="tit type-bg">
                            <img src="/assets/image/main/ic_quick04.png" alt="">
                            <strong>Registration <br>Guidelines</strong>
                        </a>
                    </li>
                    <li class="type-bd">
                        <a href="{{ route(config('site.menu.sub_menu.5.1.route_target'), config('site.menu.sub_menu.5.1.route_param')) }}" class="tit">
                            <img src="/assets/image/main/ic_quick05.png" alt="">
                            <strong>Venue</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route(config('site.menu.sub_menu.5.3.route_target'), config('site.menu.sub_menu.5.3.route_param')) }}" class="tit type-bg">
                            <img src="/assets/image/main/ic_quick06.png" alt="">
                            <strong>Accommodation</strong>
                        </a>
                    </li>
                </ul>
    
                <!-- Important Date -->
                <ul class="main-visual-menu cf">
                    <li>
                        Abstract Submission Deadline
                        <p class="date">Apr 15 (Tue.), 2025</p>
                        <span class="dday {{ DDay('abstract') == 'END' ? 'end' : '' }}">{{ DDay('abstract') }}</span>
                    </li>
                    <li>
                        Early Bird Registration Deadline
                        <p class="date">Apr 15 (Tue.), 2025</p>
                        <span class="dday {{ DDay('earlyRegistration') == 'END' ? 'end' : '' }}">{{ DDay('earlyRegistration') }}</span>
                    </li>
					 <li>
                        Notice of Acceptance
                        <p class="date">1st Notice:<br>April 7 (Mon.), 2025<br>
						2nd Notice:<br>April 21 (Mon.), 2025</p>
                       <!--  <span class="dday {{ DDay('lastRegistration') == 'END' ? 'end' : '' }}">{{ DDay('lastRegistration') }}</span> -->
                    </li>
                   <!--  <li>
                        Last Registration Deadline
                        <p class="date">April 30 (Wed), 2025</p>
                        <span class="dday {{ DDay('lastRegistration') == 'END' ? 'end' : '' }}">{{ DDay('lastRegistration') }}</span>
                    </li> -->
                    <li>
                        Congress
                        <p class="date">June 22-27, 2025</p>
                        <span class="dday {{ DDay('event') == 'END' ? 'end' : '' }}">{{ DDay('event') }}</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <div class="main-visual-con main-visual-con02">
            <div class="main-visual-text inner-layer">
                <h2 class="main-visual-tit">
                    <img src="/assets/image/main/img_mainvisual01.png" alt="">
                </h2>
            </div>
        </div> --}}
    </div><!--// main-visual-wrap-->        
</article>

<article class="main-contents notice-block">
    <div class="inner-layer">
        <div class="main-conbox main-board-conbox">
            <div class="main-tit-wrap btn-tit-block type2">
                <h3 class="main-tit">Notice &amp; Newsletters</h3>
                <div class="board-btn-wrap">
                    <button class="btn-rolling btn-news-prev slick-arrow" type="button"><span class="hide">Previous</span></button>
                    <button class="btn-rolling btn-news-next slick-arrow" type="button"><span class="hide">Next</span></button>
                    <a href="/board/notice" class="btn btn-more">More View <span class="arrow">+</span></a>
                </div> 
            </div>
            <div class="main-board-list js-board-rolling">
                @foreach( $notices as $notice )
                <div class="main-board-con">
                    <div class="con-link" onclick="location.href='{{ route('board.view', ['code'=>$notice->code, 'sid'=>base64_encode($notice->sid)]) }}'" href="">
                        <strong class="subject ellipsis2">{{ $notice->subject }}</strong>
                        <div class="contents ellipsis3" style="overflow:hidden">
                            {!! $notice->content !!}
                        </div>
                        <span class="date">
                            {{ $notice->created_at->toDateString() }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</article>

<article class="main-contents speaker-bg">
    <div class="inner-layer">
        <div class="main-tit-wrap btn-tit-block type2">
            <h3 class="main-tit">Key Speakers</h3>
            <div class="board-btn-wrap">
                <button class="btn-rolling btn-speakers-prev slick-arrow" type="button"><span class="hide">Previous</span></button>
                <button class="btn-rolling btn-speakers-next slick-arrow" type="button"><span class="hide">Next</span></button>
                <a href="{{ route(config('site.menu.sub_menu.2.3.route_target'), config('site.menu.sub_menu.2.3.route_param')) }}" class="btn btn-more">More View <span class="arrow">+</span></a>
            </div> 
        </div>
        <div class="speakers-wrap">
            <div class="speakers-rolling cf js-speakers-rolling">
			<div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_04.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Mann Kyoon Shin</strong>
                        <p class="affiliation">Dept. of Biological Science, University of Ulsan<br>Professor, University of Ulsan</p>
                    </div>
                </div>
				<div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_03.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Andrew J. Roger</strong>
                        <p class="affiliation">Dept. of Biochemistry and Molecular Biology, Dalhousie University</p>
                    </div>
                </div>
				 <div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_05.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Shuhai Xiao</strong>
                        <p class="affiliation">Dept. of Geobiology, Virginia Tech<br>Professor, Virginia Tech</p>
                    </div>
                </div>
				<div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_06.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Thomas Mock</strong>
                        <p class="affiliation">School of Environmental Sciences, University of East Anglia UK</p>
                    </div>
                </div>
                <div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_01.png" alt=""><!--// image size: w200 x h210 -->
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Gautam Dey</strong>
                        <p class="affiliation">EMBL<br>(European Molecular Biology Laboratory)</p>
                    </div>
                </div>
                <div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_02.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Jana Milucka</strong>
                        <p class="affiliation">Max Planck Institute for Marine Microbiology</p>
                    </div>
                </div>
				<div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_07.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Shan Gao</strong>
                        <p class="affiliation">Professor<br>Ocean University of China, China</p>
                    </div>
                </div>
				<div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_08.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Laura Eme</strong>
                        <p class="affiliation">Associate Professor<br>
University of Rhode Island, USA
                    </div>
                </div>
				<div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/speakers_09.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">Anna Karnkowska</strong>
                        <p class="affiliation">Associate Professor<br>University of Warsaw, Poland</p>
                    </div>
                </div>
                
                
               
				
               <!--  <div class="speakers-con">
                    <div class="img-wrap">
                        <img src="/assets/image/main/img_no_speakers.png" alt="">
                    </div>
                    <div class="text-wrap">
                        <strong class="tit">TBD</strong>
                        <p class="affiliation">TBD</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</article>

<article class="sponsor-wrap">
    <div class="sponsor-rolling-wrap inner-layer">
        <span class="tit font-sebang">Sponsors By</span>
        <div class="sponsor-rolling js-sponsor-rolling">
            <a href="https://www.tomocube.com/" target="_blank"><img src="/assets/image/main/bnr_tomocube_250115.jpg" alt=""></a>
            <a href="https://www.nnibr.re.kr/" target="_blank"><img src="/assets/image/main/bnr_NNIBR_250310.png" alt=""></a>
            <a href="https://fbp.nnibr.re.kr/fbcc/" target="_blank"><img src="/assets/image/main/bnr_FBCC_250310.png" alt=""></a>
            <a href="https://www.dnalink.com/" target="_blank"><img src="/assets/image/main/bnr_DNALINK_250311.png" alt=""></a>
            <a href="https://xenohelix.com/" target="_blank"><img src="/assets/image/main/bnr_xeno_250317.png" alt=""></a>
            <a href="http://www.genomicbase.com/" target="_blank"><img src="/assets/image/main/bnr_genomic_250328.png" alt=""></a>
			<a href="https://blog.naver.com/j_one_bio" target="_blank"><img src="/assets/image/main/bnr_jone_250331.png" alt=""></a>
			<a href="https://www.frontiersin.org/" target="_blank"><img src="/assets/image/main/bnr_frontires_250331.png" alt=""></a>
			<a href="https://www.sciencedirect.com/journal/european-journal-of-protistology" target="_blank"><img src="/assets/image/main/bnr_elsevier_250401.png" alt=""></a>
			<a href="https://www.moore.org/" target="_blank"><img src="/assets/image/main/bnr_moore_250331.png" alt=""></a>
			<a href="https://www.skku.edu/eng/" target="_blank"><img src="/assets/image/main/bnr_skku_250331.png" alt=""></a>
			<a href="https://bk21four.skku.edu/bio/main/main.jsp" target="_blank"><img src="/assets/image/main/bnr_brainkorea_250331.png" alt=""></a>

<!--             <a href="#n" target="_blank"><img src="/assets/image/main/img_no_sponsor.png" alt=""></a> -->
        </div>
    </div>
</article>

@if( !isset($_COOKIE['layer_main']) )
<script>
function setCookiePopup( name, value, expiredays ){
    var todayDate = new Date();
    todayDate.setDate( todayDate.getDate() + expiredays );
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";";
    $('.pop-main').hide();
}	
</script>
<div class="popup-wrap pop-main">
    <div class="popup-rolling-wrap inner-layer n3">
        <div class="popup-contents">
            <div class="popup-conbox popup-link-conbox">
                <p class="tit">
                    Orakai Hotel Special Price <br>
                    for ICOP 2025
                </p>
                <div class="btn-wrap text-center">
                    <a href="https://be4.wingsbooking.com/BWORAKAI1313?lang_type=EN" target="_blank" class="btn btn-reserve"><img src="/assets/image/main/ic_btn_link.png" alt=""> Reservation Link <img src="/assets/image/main/ic_pop_link.png" alt="" class="ic-click"></a>
                </div>
                <div class="img-wrap text-cetner">
                    <img src="/assets/image/main/img_pop_apply.png" alt="Apply Promotion Code">
                </div>
            </div>
        </div>

        <div class="popup-contents">
            <div class="popup-conbox popup-info-conbox">
                <img src="/assets/image/main/ic_pop_notice.png" alt="" class="ic-notice">
                <p class="tit">
                    Field Trip Information
                </p>
                <div class="img-wrap">
                    <img src="/assets/image/main/img_popup_field.png" alt="">
                </div>
                <div class="btn-wrap text-center">
                    <a href="https://icop2025.org/tour" class="btn btn-more">READ MORE<img src="/assets/image/main/ic_pop_link.png" alt="" class="ic-click"></a>
                </div>
            </div>
        </div>

        <div class="popup-contents">
            <div class="popup-conbox">
                <div class="img-wrap"><a href="https://icop2025.org/board/notice/view/Mw=="><img src="/assets/image/main/img_popup_symposia.png" alt=""></a></div>
            </div>
        </div>
        
        <div class="popup-footer">
            <div class="checkbox-wrap cst text-center">
                <label for="chk2" class="checkbox-group">
                    <input type="checkbox" name="" id="chk2" onclick="setCookiePopup('layer_main','done','1')">Not Open for 24 Hours
                </label>
            </div>
        </div>
        <button type="button" class="btn-pop-close" onclick="$('.pop-main').hide();"><span class="hide">팝업 닫기</span></button>
    </div>
</div>
@endif

@endsection

