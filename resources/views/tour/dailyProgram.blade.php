@extends('include.layout')

@section('content')
    <div class="tour-conbox">
        <div class="sub-tit-wrap">
            <h4 class="sub-tit">Tour Program</h4>
        </div>
        <ul class="tour-program-list">
            <li class="date">
                <strong>Date :</strong> <p>JUN. 25(Wed.), 2025</p>
            </li>
            <li class="itinerary">
                <strong>Itinerary</strong>
                <div class="bg-box">
                    <div>
                        <strong class="tit">Afternoon Tour (14:00~19:30)</strong>
                        <ul class="list-type list-type-bar">
                            <li>
                                Gyeongbokgung Palace
                            </li>
                            <li>
                                Bukchon Hanok Village
                            </li>
                            <li>
                                Insadong Antique Street Tour
                            </li>
                            <li>
                                Tojong Samgyetang (Korean chiecken Soup with Ginsaeng
                            </li>
                        </ul>
                    </div>
                    <div>
                        <strong class="tit">[Optional] Evening Tour (20:00~22:00)</strong>
                        <ul class="list-type list-type-bar">
                            <li>N-Seoul Tower & Observatory</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="cost">
                <strong>Cost per person :</strong>
                <div>
                    <p>
                        ₩90,000 <br>
                        <span class="fz-small">* If you only apply for the afternoon tour, it costs ₩52,000</span>
                    </p>
                    <div class="qr-box">
                        <img src="/assets/image/sub/img_qr.png" alt="">
                    </div>
                </div>
            </li>
        </ul>

        <div class="tour-course">
            <h4 class="tour-course-tit">Afternoon Tour (14:00~19:30)</h4>
            <div class="tour-course-con">
                <div class="text-wrap">
                    <strong class="tit">1. GYEONGBOKGUNG PALACE</strong>
                    <p>
                        Built in 1395, Gyeongbokgung Palace is commonly referred to as the Northern Palace because its location is furthest north when compared to the neighboring palaces of Changdeokgung (Eastern Palace) and Gyeonghuigung (Western Palace) Palace. <br>Gyeongbokgung Palace is arguably the most beautiful, and remains the largest of all five palaces.
                    </p>
                </div>
                <div class="img-wrap">
                    <img src="/assets/image/sub/img_tour_course01.png" alt="GYEONGBOKGUNG PALACE">
                </div>
            </div>
            <div class="tour-course-con">
                <div class="text-wrap">
                    <strong class="tit">2. BUKCHON HANOK VILLAGE</strong>
                    <p>
                        Surrounded by Gyeongbokgung Palace, Changdeokgung Palace and Jongmyo Shrine, Bukchon Hanok Village is home to hundreds of traditional houses, called hanok, that date back to the Joseon Dynasty. The name Bukchon, which literally translates to "northern village," came about as the neighborhood lies north of two significant Seoul landmarks, Cheonggyecheon Stream and Jongno. Today, many of these hanoks operate as cultural centers, guesthouses, restaurants and tea houses, providing visitors with an opportunity to experience, learn and immerse themselves in traditional Korean culture. Also, the rickshaw tour guides you to the smaller alleys as well.
                    </p>
                </div>
                <div class="img-wrap">
                    <img src="/assets/image/sub/img_tour_course02.png" alt="BUKCHON HANOK VILLAGE">
                </div>
            </div>
            <div class="tour-course-con">
                <div class="text-wrap">
                    <strong class="tit">3. INSADONG ANTIQUE STREET</strong>
                    <p>
                        Located in the heart of the city, Insadong is an important place where old but precious and traditional goods are on display. There is one main road in Insadong with alleys on each side. Within these alleys are galleries, traditional restaurants, traditional teahouses, and cafes. To keep the ambience, even international cafes like Starbucks changed their banners from English spelling to Korean alphabet Hangeul.
                    </p>
                </div>
                <div class="img-wrap">
                    <img src="/assets/image/sub/img_tour_course03.png" alt="INSADONG ANTIQUE STREET">
                </div>
            </div>
            <div class="tour-course-con">
                <div class="text-wrap">
                    <strong class="tit text-skyblue">
                        * Dinner <br>
                        Tojong SAMGYETANG (CHICKEN SOUP WITH GINSENG)
                    </strong>
                    <p>
                        This nutritious dish consists of chicken slowly cooked with a variety of healthy medicinal herbs, resulting in tender meat and a rich yet light broth. The meal is complemented with a ginseng liquor aperitif and standard side dishes, including kkakdugi (diced radish kimchi) and cabbage kimchi.
                    </p>
                </div>
                <div class="img-wrap">
                    <img src="/assets/image/sub/img_tour_course04.png" alt="* Dinner. Tojong SAMGYETANG (CHICKEN SOUP WITH GINSENG)">
                </div>
            </div>
        </div>

        <div class="tour-course">
            <h4 class="tour-course-tit">Evening Tour (20:00~22:00)</h4>
            <div class="tour-course-con">
                <div class="text-wrap">
                    <strong class="tit">N SEOUL TOWER & OBSERVATORY</strong>
                    <p>
                        The N Seoul Tower shows visitors the harmony of Namsan's nature, the 21st century state of the art, resting with leisure, and various cultures. With the latest LED technology lighting which constantly changes colors and patterns, it has become a 'light art' providing various media art together with an unusual cultural art experience.
                    </p>
                </div>
                <div class="img-wrap">
                    <img src="/assets/image/sub/img_tour_course05.png" alt="N SEOUL TOWER & OBSERVATORY">
                </div>
            </div>
        </div>
    </div>
@endsection