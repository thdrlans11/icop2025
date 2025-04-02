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
                        <strong class="tit">Tour A (14:00~19:30)</strong>
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
                        <strong class="tit">Tour B (14:00~ 22:00)</strong>
                        <ul class="list-type list-type-bar">
                            <li>Gyeongbokgung Palace</li>
							<li>Bukchon Hanok Village</li>
							<li>Insadong Antique Street Tour</li>
							<li>Tojong Samgyetang (Korean chiecken Soup with Ginsaeng<br>
							<span style="margin-left:100px;">+</span><br>
							N-Seoul Tower & Observatory</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="cost">
                <strong>Cost per person :</strong>
                <div>
                    <p>
                        Tour A : ₩82,000 <br>
						Tour B : ₩124,000 <br>
                       <!--  <span class="fz-small">* If you only apply for the afternoon tour, it costs ₩82,000</span> -->
                    </p>
                   
                </div>
            </li>
			<li class="date">
                <strong>Application period : </strong> <p>April. 1(Tue.)~April.30(Wed.) </p> <!-- <p style="color: red;">※ We will inform you later.</p>  -->
            </li>
			<li class="qr">
                <strong>Application QR code </strong>
                <ul class="qr-list">
                    <li>
                        <div class="img-wrap">
                            <img src="/assets/image/sub/img_qr01.png" alt="">
                            <strong class="tit">Tour A (&#8361;82,000)</strong>
                        </div>
                    </li>
                    <li>
                        <div class="img-wrap">
                            <img src="/assets/image/sub/img_qr02.png" alt="">
                            <strong class="tit">Tour B (&#8361;124,000)</strong>
                        </div>
                    </li>
                </ul>
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
                    <strong class="tit">2. Namsangol Hanok Village</strong>
                    <p>
                        Namsan, a symbol of Seoul, was formerly known as Mount Mookmyeok and has been referred to as Namsan due to its location south of the capital city. With its beautiful natural scenery, Namsan was a place where our ancestors built pavilions in the valleys and engaged in leisure activities, expressing their appreciation for nature through poetry and painting. The area attracted many people, especially the elegant men and women of the time, who sought to enjoy the splendid landscapes.
						On a 7,934m<sup>2</sup> site located to the northeast of Namsan, five traditional hanok (Korean houses) from various parts of the city have been relocated and restored. The interiors are furnished with period-appropriate items that reflect the status and character of the people who once lived there, providing a glimpse into the lives of our ancestors. The traditional garden has been restored to its original form, with native plants from Namsan's natural vegetation planted, and a stream has been created to allow water to flow naturally. Pavilions and ponds have also been restored, creating a garden in traditional style.
						To the west of the garden, a picturesque stream flows, and around it, antique-style pavilions have been built, evoking the old atmosphere of Namsan, where our ancestors once leisurely enjoyed the surroundings. Additionally, a time capsule was buried 15 meters underground on November 29, 1994, to commemorate the 600th anniversary of Seoul as the capital. The capsule contains 600 items representing the city’s appearance, civic life, and social culture, which will be revealed to future generations in the year 2394.
                    </p>
                </div>
                <div class="img-wrap">
                    <img src="/assets/image/sub/img_tour_course02_v2.png" alt="BUKCHON HANOK VILLAGE">
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
                    <img src="/assets/image/sub/img_tour_course04_v2.png" alt="* Dinner. Tojong SAMGYETANG (CHICKEN SOUP WITH GINSENG)">
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