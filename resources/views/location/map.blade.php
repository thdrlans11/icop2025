@extends('include.layout')

@section('content')
<div class="sub-tit-wrap">
    <h4 class="sub-tit">How to get to the Venue (Sungkyunkwan University)</h4>
</div>
<div class="trans-map-info">
    <ul>
        <li><strong>Address: </strong>25-2 Seonggyungwan-ro, Jongno District, Seoul</li>
        <li><strong>주소: </strong>서울특별시 종로구 성균관로 25-2</li>
    </ul>
</div>
<div class="trans-map-wrap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3161.5874518967466!2d126.99528769207716!3d37.58833114338896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca2d4cdb87315%3A0x5b2b20a2005c6114!2sSungkyunkwan%20University%20(Humanities%20%26%20Social%20Sciences%20Campus)!5e0!3m2!1sen!2skr!4v1735863006013!5m2!1sen!2skr" width="" height="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="map-tit-wrap">
    <h4 class="map-tit">From Incheon International Airport <img src="/assets/image/sub/ic_airport.png" alt=""></h4>
</div>
<h5 class="map-info-tit"><span>By Airport Bus</span></h5>
<div class="table-wrap">
    <table class="cst-table type2">
        <caption class="hide">Airport Bus #6011</caption>
        <colgroup>
            <col>
            <col>
            <col>
            <col>
        </colgroup>
        <thead>
            <tr>
                <th scope="col" colspan="4">Airport Bus #6011</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">First Bus</th>
                <td class="text-left">
                    T1 05:45 / T2 05:25
                </td>
                <th scope="row">Last Bus</th>
                <td class="text-left">
                    T1 23:15 / T2 22:55
                </td>
            </tr>
            <tr>
                <th scope="row">Route & Time Table</th>
                <td class="text-left" colspan="3">
                    <a href="https://www.airport.kr/ap_en/1504/subview.do?enc=Zm5jdDF8QEB8JTJGYnVzJTJGYXBfZW4lMkZidXNSb3V0ZUxpc3QuZG8lM0ZzaXRlSWQlM0RhcF9lbiUyNnJvdXRlQXJlYSUzRCUyNnNlYXJjaFZhbCUzRDYwMTElMjY%3D" target="_blank" class="btn btn-small btn-round color-type1">Click</a>
                </td>
            </tr>
            <tr>
                <th scope="row">Fare</th>
                <td class="text-left" colspan="3">
                    17,000 KRW
                </td>
            </tr>
            <tr>
                <th scope="row">Payment</th>
                <td class="text-left" colspan="3">
                    You can buy the ticket at the onsite at the airport.
                </td>
            </tr>
            <tr>
                <th scope="row">Bus Stop</th>
                <td class="text-left" colspan="3">
                    Terminal 1) Exit Gate B and take the bus at the Bus Stop B. <br>
                    Terminal 2) Take the bus at the Bus Stop 31 at the Transportation center Basement 1.
                </td>
            </tr>
            <tr>
                <th scope="row">Where to get off</th>
                <td class="text-left" colspan="3">
                    Get off at “Sungkyunkwan University” Stop. (approx. 90 minutes)
                </td>
            </tr>
            <tr>
                <th scope="row">How to get to the venue</th>
                <td class="text-left" colspan="3">
                    You can either walk from where you get off (approx. 20 minutes) or <br>
                    take a green bus #07 and get off at the 600 Years Anniversary Hall.
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="terminal-info-wrap">
    <div class="sub-tab-wrap">
        <ul class="sub-tab-menu js-tab-menu">
            <li class="on"><a href="#n">Terminal 1</a></li>
            <li><a href="#n">Terminal 2</a></li>
        </ul>
    </div>
    <div class="sub-tab-con js-tab-con" style="display: block;">
        <img src="/assets/image/sub/img_terminal01.png" alt="Terminal 1">
    </div>
    <div class="sub-tab-con js-tab-con">
        <img src="/assets/image/sub/img_terminal02.png" alt="Terminal 2">
    </div>
</div>

<h5 class="map-info-tit"><span>By Metro</span></h5>
<div class="con-wrap">
    <div class="table-wrap">
        <table class="cst-table type3">
            <caption class="hide">When using Express Train</caption>
            <colgroup>
                <col style="width: 40%;">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" colspan="2">When using Express Train</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Fare</th>
                    <td>12,400 KRW</td>
                </tr>
                <tr>
                    <th scope="row">Duration</th>
                    <td>100 minutes</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-wrap">
        <table class="cst-table type2">
            <caption class="hide">When using “All stop Train”</caption>
            <colgroup>
                <col style="width: 40%;">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" colspan="2">When using “All stop Train”</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Fare</th>
                    <td>4,550 KRW</td>
                </tr>
                <tr>
                    <th scope="row">Duration</th>
                    <td>120 minutes</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<p>
    Take the <strong>Airport Railroad (AREX)</strong> from <strong>Incheon International Airport Terminal 1 or 2</strong>. (You can choose either Express train or All stop train.) <br>
    <strong>Transfer to Line Number 4 (light blue line) at Seoul Station and get off at Hyehwa Station.</strong> <br>
    From Hyehwa Station, use the Exit # 1 and from there, you can walk to the venue or take a green bus #07 and get off at the 600 Years Anniversary Hall.
</p>

<div class="map-tit-wrap">
    <h4 class="map-tit">From Incheon International Airport <img src="/assets/image/sub/ic_airport.png" alt=""></h4>
</div>
<h5 class="map-info-tit mt-0"><span>By Metro (approx. 90 minutes / 1,800 KRW)</span></h5>
<p>
    You <strong>can also take the Airport Railroad from Gimpo International Airport and transfer at Seoul Station to Line Number 4 (light blue line) and get off at Hyehwa Station.</strong> <br>
    <strong>Or, you can take Line Number 5 (purple line) from the airport and transfer at Dongdaemun History & Culture Park Station to Line number 4 (line blue line) and get off at Hyehwa Station.</strong> <br>
    From Hyehwa Station, use the Exit # 1 and from there, you can walk to the venue or take a green bus #07 and get off at the 600 Years Anniversary Hall.
</p>

<h5 class="map-info-tit"><span>By Bus (approx. 100 minutes / 1,800 KRW)</span></h5>
<p>
    Take a blue bus #601 from platform 4 outside of the arrival hall. Get off at Sungkyunkwan University Entrance Stop. <br>
    And take a green bus #07 and get off at the 600 Years Anniversary Hall.
</p>
@endsection