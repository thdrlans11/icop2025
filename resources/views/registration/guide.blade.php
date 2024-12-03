@extends('include.layout')

@section('content')
<div class="sub-conbox inner-layer">

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">Important Dates</h4>
    </div>
    <div class="regi-date-wrap">
        <div class="regi-date-conbox">
            Early Bird Registration Closes
            <strong>by 7 March 2025 (23:59 KST)</strong>
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
                    <th scope="col" class="bg-navy">Early Bird Registration <br><span>(~March 7, 2025)</span></th>
                    <th scope="col" class="bg-green">Late Registration <br><span>(March 8 – April 30, 2025)</span></th>
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
</div>
@endsection
