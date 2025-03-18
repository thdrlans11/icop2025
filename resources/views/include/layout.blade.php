<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes,viewport-fit=cover">
<meta name="format-detection" content="telephone=no, address=no, email=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<meta name="Author" content="{{ config('site.common.info.name') }}">
<meta name="Keywords" content="{{ config('site.common.info.name') }}">
<meta name="description" content="{{ config('site.common.info.name') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('site.common.info.name') }}</title>
<link rel="icon" href="/assets/image/favicon.ico">
<link type="text/css" rel="stylesheet" href="/assets/css/slick.css">
<link type="text/css" rel="stylesheet" href="/assets/css/jquery-ui.min.css">
<link type="text/css" rel="stylesheet" href="/assets/css/common.css">
<link type="text/css" rel="stylesheet" href="/devScript/colorbox/example3/colorbox.css" />
@stack('css')

<script type="text/javascript" src="/assets/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.rwdImageMaps.js"></script>
<script type="text/javascript" src="/assets/js/common.js"></script>
<script type="text/javascript" src="/devScript/common.js"></script>
<script src="/devScript/colorbox/jquery.colorbox-min.js"></script>
@stack('scripts')
</head>
<body>
    <!-- 
        main일 때 calss="main"
        sub일 때 class="sub"
    -->
    <div class="wrap {{ $wrapClass ?? 'sub' }}">
        <header id="header" class="js-header">
            <div class="header-wrap inner-layer">
                <div class="dday-wrap">
                    <div class="dday-conbox">
                        <img src="/assets/image/common/ic_dday.png" alt="">
                        <div class="dday">
                            <strong>{{ DDay('event') }}</strong>
                            <span class="today">Today {{ date('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>
                <h1 class="header-logo">
                    <a href="{{ route('main') }}"><img src="/assets/image/common/h1_logo.png" alt="ICOP SEOUL, KOREA, 2025"></a>
                </h1>
                <div class="util-wrap">
                    <ul class="util-menu inner-layer-wide">
                        <li class="home"><a href="{{ route('main') }}">HOME</a></li>
                        @if( auth('admin')->check() )
                        <li class="admin"><a href="{{ route('admin') }}" target="_blank">ADMIN</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <nav id="gnb">
                <div class="gnb-wrap inner-layer">
                    <ul class="gnb js-gnb">
                        @foreach( config('site.menu.menu') as $key => $val )
                        <li>
                            <a href="{{ route($val['route_target'],$val['route_param']) }}">
                                {{ $val['name'] }}
                                @if( $key == '2' || $key == '5' )
                                <span class="new">N</span>
                                @endif
                            </a>
                            @if( isset( config('site.menu.sub_menu')[$key] ) )
                            <ul>
                                @foreach( config('site.menu.sub_menu')[$key] as $skey => $sval ) @if( $key == '4' && $skey > 3 ) @continue @endif
                                <li>
                                    <a href="{{ route($sval['route_target'],$sval['route_param']) }}">
                                        {{ $sval['name'] }}
                                        @if( ( $key == '2' && $skey == '3' ) || ( $key == '5' && $skey == '3' ) || ( $key == '5' && $skey == '4' ) )
                                        <span class="new">N</span>
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </header>

        <section id="container" class="{{ $wrapClass ?? 'sub' }}">
            @if( !isset($wrapClass) )
            <article class="sub-visual">
                <div class="sub-visual-con inner-layer">
                    <div class="sub-visual-text">
                        <img src="/assets/image/sub/img_subvisual_text01.png" alt="16th International Congress of Protistology 2025, Joint meeting of ICOP/ISOP 2025">
                        <img src="/assets/image/sub/img_subvisual_text02.png" alt="June 22 (Sunday), - June 27 (Friday), 2025. Sungkyunkwan University, Seoul, Korea (TBC)">
                    </div>
                    <div class="sub-visual-logo">
                        <img src="/assets/image/sub/img_subvisual_logo.png" alt="ISOP, ICOP, The Korean Society of Protistologsis. The Korean Society of Phycology">
                    </div>
                </div>
            </article>
            <article class="sub-menu-wrap">
                <div class="sub-menu inner-layer cf">
                    <a href="/" class="btn btn-home"></a>
                    <ul class="sub-menu-list js-sub-menu-list cf">
                        <li class="sub-menu-depth01">
                            <a href="#n" class="btn-sub-menu js-btn-sub-menu">{{ config('site.menu.menu')[$mainNum]['name'] }}</a>
                            <ul>
                                @foreach( config('site.menu.menu') as $key => $val )
                                <li><a href="{{ route($val['route_target'],$val['route_param']) }}">{{ $val['name'] }}</a>
                                @endforeach
                            </ul>
                        </li>
                        <li class="sub-menu-depth02">
                            <a href="#n" class="btn-sub-menu js-btn-sub-menu">{{ config('site.menu.sub_menu')[$mainNum][$subNum]['name'] }}</a>
                            <ul>
                                @foreach( config('site.menu.sub_menu')[$mainNum] as $skey => $sval ) 
                                @if( $mainNum == '4' && $skey > 3 && !isset($rgubun) ) @continue @endif
                                @if( $mainNum == '4' && $skey <= 3 && isset($rgubun) ) @continue @endif
                                <li {!! $subNum == $skey ? 'class="on"' : '' !!}>
                                    <a href="{{ route($sval['route_target'],$sval['route_param']) }}"><span>{{ $sval['name'] }}</span></a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="sub-contents">
                <div class="page-tit-wrap inner-layer">
                    <h3 class="page-tit">{{ config('site.menu.sub_menu')[$mainNum][$subNum]['name'] }}</h3>
                </div>
                <div class="sub-conbox inner-layer">
            @endif

                     @yield('content')         

            @if( !isset($wrapClass) )
                </div>
            </article>
            @endif
        </section>

        <footer id="footer">
            <button type="button" class="btn-top js-btn-top">
                <img src="/assets/image/common/ic_top.png" alt="">
            </button>
            <div class="footer-wrap inner-layer">
                <strong class="footer-logo">
                    <img src="/assets/image/common/footer_logo02.png" alt="한국원생생물학회. The Korean Society of Protistologists">
                </strong>
                <div class="footer-con">
                    <strong class="tit">
                        The Korean Society of Protistologists
                    </strong>
                    <ul>
                        <li>#251, 50-1, Yonsei-ro, Seodaemun-gu, Seoul, Republic of Korea</li>
                        <li>TEL: <a href="tel:+82-2-446-6123" target="_blank">+82-2-446-6123</a></li>
                        <li>
                            Business Registration No.: 226-82-70216 | Name of Representative: Mann Kyoon Shin
                        </li>
                    </ul>

                    <strong class="tit">
                        Congress Team
                    </strong>
                    <ul>
                        <li>E-Mail: <a href="mailto:icop2025org@gmail.com" target="_blank">icop2025org@gmail.com</a></li>
                    </ul>
                </div>
                <strong class="footer-logo">
                    <img src="/assets/image/common/footer_logo.png" alt="ICOP SEOUL, KOREA, 2025.">
                </strong>
            </div>
            <p class="copy">
                Copyright &copy; ICOP 2025. All Rights Reserved.
            </p>
        </footer>
    </div>

    @include('sweetalert::alert')
</body>
</html>
