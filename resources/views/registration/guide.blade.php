@extends('include.layout')

@section('content')


    <div class="sub-tab-wrap">
        <ul class="sub-tab-menu n2">
            <li {!! $cgubun == 'E' ? 'class="on"' : '' !!}><a href="{{ route('registration.guide', ['cgubun'=>'E']) }}">Overseas</a></li>
            <li {!! $cgubun == 'K' ? 'class="on"' : '' !!}><a href="{{ route('registration.guide', ['cgubun'=>'K']) }}" -onClick="alert('Will be updated')">국내 참가자</a></li>
        </ul>
    </div>

    @if( $cgubun == 'E' )
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Important Dates</h4>
    </div>
    <div class="regi-date-wrap">
        <div class="regi-date-conbox">
            Early Bird Registration Closes
            <strong>by 31 March 2025 (23:59 KST)</strong>
        </div>
        <div class="regi-date-conbox">
            Late Registration Closes
            <strong>by 30 April 2025 (23:59 KST)</strong>
        </div>
    </div>

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Registration Procedure</h4>
    </div>
    <ul class="regi-step-list">
        <li>
            <div class="img-wrap">
                <img src="/assets/image/sub/ic_regi_step01.png" alt="">
            </div>
            <strong class="tit">Go to Registration</strong>
        </li>
        <li>
            <div class="img-wrap">
                <img src="/assets/image/sub/ic_regi_step02.png" alt="">
            </div>
            <strong class="tit">Complete Payment</strong>
        </li>
        <li>
            <div class="img-wrap">
                <img src="/assets/image/sub/ic_regi_step03.png" alt="">
            </div>
            <strong class="tit">Receive Confirmation Letter</strong>
        </li>
    </ul>

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Registration Fee</h4>
    </div>
    <div class="table-wrap">
        <table class="cst-table">
            <caption class="hide">Registration Fee</caption>
            <colgroup>
                <col style="width: 18%;">
                <col>
                <col style="width: 28%;">
                <col style="width: 28%;">
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="bg-skyblue">Registration Fee</th>
                    <th scope="col" class="bg-navy">Early Bird Registration <br><span>(~March 31, 2025)</span></th>
                    <th scope="col" class="bg-green">Late Registration <br><span>(March 31 – April 30, 2025)</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" rowspan="4">Registration</th>
                    <td>Delegate</td>
                    <td class="bg-blue">USD 600</td>
                    <td class="bg-green2">USD 700</td>
                </tr>
                <tr>
                    <td>Student</td>
                    <td class="bg-blue">USD 350</td>
                    <td class="bg-green2">USD 500</td>
                </tr>
                <tr>
                    <td>Accompanying Person</td>
                    <td colspan="2">USD 150</td>
                </tr>
                <tr>
                    <td>One-day Pass</td>
                    <td colspan="2">USD 150</td>
                </tr>
                <tr>
                    <th scope="row">Social Event</th>
                    <td>Banquet</td>
                    <td colspan="2">USD 100</td>
                </tr>
            </tbody>
        </table>
    </div>
    <ul class="list-type list-type-dot mt-15">
        <li class="text-red">To register as a student (including Post Doctor), you need to submit proof of your student status, such as a copy of your student ID or a certificate of enrollment with a valid date.</li>
    </ul>

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Registration Fee Includes</h4>
    </div>
    <div class="table-wrap">
        <table class="cst-table">
            <caption class="hide">Registration Fee Includes</caption>
            <colgroup>
                <col style="width: 25%;">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">Registration Category</th>
                    <th scope="col">Registration fee includes Access to</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Delegates</th>
                    <td class="text-left">
                        All program Sessions <br>
                        Lunch (Mon, Tue, Thu, Fri) <br>
                        Coffee Break <br>
                        Exhibition Hall
                    </td>
                </tr>
                <tr>
                    <th scope="row">Student</th>
                    <td class="text-left">
                        All program Sessions <br>
                        Lunch (Mon, Tue, Thu, Fri) <br>
                        Coffee Break <br>
                        Exhibition Hall
                    </td>
                </tr>
                <tr>
                    <th scope="row">Accompanying Person</th>
                    <td class="text-left">
                        All program Sessions <br>
                        Coffee Break
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Payment Methods</h4>
    </div>
    <div class="table-wrap">
        <table class="cst-table">
            <caption class="hide">Payment Methods</caption>
            <colgroup>
                <col style="width: 25%;">
                <col>
            </colgroup>
            <tbody>
                <tr>
                    <th scope="row">Credit Card</th>
                    <td class="text-left">
                        <ul class="list-type list-type-dot">
                            <li>Payment by credit card is possible only through the online registration system.</li>
                            <li>All service charges of credit cards are to be paid by the registrants.</li>
                            <li>The actual charged amount may differ according to the exchange rate.</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row" rowspan="2">Wire Transfer</th>
                    <td class="text-left">
                        <ul class="list-type list-type-dot">
                            <li>All bank remittance charges are to be paid by the registrants.</li>
                            <li>A remitter’s name MUST BE SAME as the registrant’s name.</li>
                            <li>Registration fees are contingent upon the date of payment receipt in our account, and they will be adjusted accordingly if payment is not received by the specified deadline.</li>
                            <li>Bank Transfer may take a week to confirm the payment.</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="text-left">
                        <div class="inner-table-wrap">
                            <table class="cst-table">
                                <caption class="hide">Wrie Transfer</caption>
                                <colgroup>
                                    <col style="width: 25%;">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>BANK NAME</td>
                                        <td class="text-left">WOORI BANK</td>
                                    </tr>
                                    <tr>
                                        <td>BANK ADDRESS</td>
                                        <td class="text-left">32, Gwangnam-ro, Suyeong-gu, Busan, Republic of Korea</td>
                                    </tr>
                                    <tr>
                                        <td>ACCOUNT NO.</td>
                                        <td class="text-left">1081-201-425622</td>
                                    </tr>
                                    <tr>
                                        <td>ACCOUNT NAME</td>
                                        <td class="text-left">The Korean society of protistology</td>
                                    </tr>
                                    <tr>
                                        <td>SWIFT CODE</td>
                                        <td class="text-left">HVBKKRSEXXX</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Cancellation Policy</h4>
    </div>
    <ul class="list-type list-type-dot">
        <li>All the cancellation charge shall be deducted from the refund amount.</li>
    </ul>
    <div class="table-wrap mt-20">
        <table class="cst-table">
            <caption class="hide">Cancellation Policy</caption>
            <colgroup>
                <col style="width: 25%;">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">Refund</th>
                    <th scope="col">Notice</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">100%</th>
                    <td>
                        <strong class="text-red">by 23:59, April 30 (Wed.) 2025 (KST)</strong>
                    </td>
                </tr>
                <tr>
                    <th scope="row">No Refund</th>
                    <td>
                        <strong class="text-red">from May 1 (Thu.) 2025 (KST)</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if( $cgubun == 'K' )
    <!-- s:국내 참가자 -->
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Important Dates</h4>
    </div>
    <div class="regi-date-wrap">
        <div class="regi-date-conbox">
            Early Bird Registration Closes
            <strong>2025년 3월 31일 (월)</strong>
        </div>
        <div class="regi-date-conbox">
            Late Registration Closes
            <strong>2025년 4월 30일 (수)</strong>
        </div>
    </div>

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">등록 절차</h4>
    </div>
    <div class="img-box">
        <img src="/assets/image/sub/img_process.png" alt="">
        <div class="text-wrap">
            원생생물학회, 조류학회의 홈페이지 배너 및 게시판 링크를 통해서 진행할 수 있습니다. 
            <div class="btn-wrap">
                <a href="https://kosp.kr/bbs/?code=notice&mode=view&number=114" target="_blank" class="btn btn-type1 color-type10">원생생물학회 <span class="arrow"><img src="/assets/image/icon/ic_btn_arrow.png" alt=""></span></a>
				  <a href="https://www.algae.or.kr/boards/notice/36831/detail/community/notice/" target="_blank" class="btn btn-type1 color-type10">조류학회 <span class="arrow"><img src="/assets/image/icon/ic_btn_arrow.png" alt=""></span></a>
            </div>
        </div>
    </div>
        <!-- <div class="sub-tit-wrap">
        <h4 class="sub-tit">등록비 안내</h4>
    </div>
<div class="table-wrap">
        <table class="cst-table">
            <caption class="hide">등록비 안내</caption>
            <colgroup>
                <col style="width: 18%;">
                <col>
                <col style="width: 28%;">
                <col style="width: 28%;">
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="bg-skyblue">구분</th>
                    <th scope="col" class="bg-navy">Early Bird Registration <br><span>(3월 14일까지)</span></th>
                    <th scope="col" class="bg-green">Late Registration <br><span>(3월 15일 - 4월 30일)</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" rowspan="3">등록비</th>
                    <td>Delegate</td>
                    <td class="bg-blue">500,000원</td>
                    <td class="bg-green2">600,000원</td>
                </tr>
                <tr>
                    <td>Student <br>Post Doctor </td>
                    <td class="bg-blue">300,000원</td>
                    <td class="bg-green2">400,000원</td>
                </tr>
                <tr>
                    <td>One-day Pass</td>
                    <td colspan="2">추후 전달 예정입니다.</td>
                </tr>
                <tr>
                    <th scope="row">사교행사</th>
                    <td>Banquet</td>
                    <td colspan="2">추후 전달 예정입니다.</td>
                </tr>
            </tbody>
        </table>
    </div>
    <ul class="list-type list-type-dot mt-15">
        <li class="text-red">학생 등록의 경우, 등록 시 학생증을 필히 제출해주십시오.</li>
    </ul>
    
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">등록비 결제 수단</h4>
    </div>
    <div class="con-wrap">
        <div class="table-wrap">
            <table class="cst-table">
                <caption class="hide">계좌이체</caption>
                <colgroup>
                    <col style="width: 40%;">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">계좌이체</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>은행명</td>
                        <td>우리은행</td>
                    </tr>
                    <tr>
                        <td>예금주</td>
                        <td>한국원생생물학회</td>
                    </tr>
                    <tr>
                        <td>계좌번호</td>
                        <td>1005-604-724823</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-wrap">
            <table class="cst-table">
                <caption class="hide">카드결제</caption>
                <thead>
                    <tr>
                        <th scope="col">카드결제</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="3" class="text-left">
                            <ul class="list-type list-type-dot">
                                <li>카드결제는 온라인에서만 가능하며 할부 결제는 불가능합니다.</li>
                            </ul>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
    <ul class="list-type list-type-dot mt-15">
        <li>계좌이체로 등록비를 납부하실 경우, 송금자와 등록자의 이름이 동일해야 합니다.</li>
        <li>등록자와 금인 이름이 다를 경우, 사무국으로 연락주시기 바랍니다. (<a href="mailto:icop2025org@gmail.com" target="_blank" class="link">icop2025org@gmail.com</a>)</li>
    </ul>
    
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">등록비 영수증 발급</h4>
    </div>
    <ul class="list-type list-type-dot">
        <li>등록비 납부를 완료하신 경우 메뉴바의 “등록 확인 및 영수증 발급“ 을 클릭하시고, 국가 및 등록 이메일을 입력하시면 출력 또는 다운로드 받을 수 있습니다.</li>
    </ul>
    
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">취소 및 환불</h4>
    </div>
    <ul class="list-type list-type-dot">
        <li class="text-red">등록 취소 시 반드시 이메일을 통하여 취소 내용을 사무국으로 접수해 주시기 바랍니다. (<a href="mailto:icop2025org@gmail.com" target="_blank" class="link">icop2025org@gmail.com</a>)</li>
        <li>등록을 취소할 경우 환불 조건은 다음과 같습니다.</li>
    </ul>
    <div class="table-wrap mt-20">
        <table class="cst-table">
            <caption class="hide">취소 및 환불</caption>
            <colgroup>
                <col style="width: 60%;">
                <col>
            </colgroup>
            <tbody>
                <tr>
                    <th scope="row">
                        <strong class="text-red">2025년 4월 30일 (수)</strong> 까지 취소 시
                    </th>
                    <td>
                        100% 환불
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <strong class="text-red">2025년 5월 1일 (목)</strong> 이후 취소 시
                    </th>
                    <td>
                        환불 불가
                    </td>
                </tr>
            </tbody>
        </table> -->
    </div>
    @endif

@endsection
