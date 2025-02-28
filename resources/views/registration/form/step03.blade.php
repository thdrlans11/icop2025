<!-- Country > Korea, Repulic of 선택 시 노출 -->
<div class="price-box">
    <img src="/assets/image/sub/ic_price.png" alt="">
    <div class="text-wrap">
        <strong class="tit">Registration Total Fee : <span class="text-orange totalPriceSpan"></span></strong>
        <p class="priceText">
            
        </p>
    </div>
</div>

<div class="sub-tit-wrap">
    <h4 class="sub-tit">Payment process</h4>
</div>
<div class="write-wrap">
    <ul>
        <li>
            <div class="form-tit">Payment Method <strong class="required">*</strong></div>
            <div class="form-con">
                <div class="radio-wrap cst">
                    @foreach( config('site.registration.payMethod') as $key => $val ) @if( $key == 'F' ) @continue @endif
                    <label for="payMethod{{ $key }}" class="radio-group">
                        <input type="radio" name="payMethod" id="payMethod{{ $key }}" value="{{ $key }}" {{ ( $apply->payMethod ?? '' ) == $key ? 'checked' : '' }}>{{ $val }}
                    </label>
                    @endforeach
                </div>
            </div>
        </li>
    </ul>
</div>

<div class="write-wrap Bbox" {!! ( $apply->payMethod ?? '' ) != 'B' ? 'style="display:none"' : '' !!}>
    <ul>
        <!-- Bank Transfer 선택 시 노출-->
        @if( $apply->lang == 'KOR' )
        <li>
            <div class="form-tit">Bank Name</div>
            <div class="form-con">
                WOORI BANK
            </div>
        </li>
        @else
        <li class="n2">
            <div class="form-tit">Bank Name</div>
            <div class="form-con">
                WOORI BANK
            </div>
            <div class="form-tit">Bank Address</div>
            <div class="form-con">
                32, Gwangnam-ro, Suyeong-gu, Busan, Republic of Korea
            </div>
        </li>
        <li class="n2">
            <div class="form-tit">Account No.</div>
            <div class="form-con">
                1081-201-425622
            </div>
            <div class="form-tit">Account Name</div>
            <div class="form-con">
                The Korean society of protistology
            </div>
        </li>
        <li>
            <div class="form-tit">Swift Code</div>
            <div class="form-con">
                HVBKKRSEXXX
            </div>
        </li>
        @endif
        <li class="n2">
            <div class="form-tit">Registrant’s Name & Affiliation <strong class="required">*</strong></div>
            <div class="form-con">
                <input type="text" name="payName" id="payName" value="{{ $apply->payName ?? '' }}" class="form-item">
            </div>
            <div class="form-tit">Eexpected Remittance Date <strong class="required">*</strong></div>
            <div class="form-con">
                <input type="text" name="payDate" id="payDate" value="{{ $apply->payDate ?? '' }}" class="form-item datepicker dateCalendar">
            </div>
        </li>
    </ul>
</div>
 
<div class="border-box mt-40 Bbox" {!! ( $apply->payMethod ?? '' ) != 'B' ? 'style="display:none"' : '' !!}>
    <strong class="tit">Notice</strong>
    <ul class="list-type list-type-dot">
        <li>All bank remittance charges are to be paid by the registrants.</li>
        <li>A remitter’s name MUST BE SAME as the registrant’s name.</li>
        <li>If the remitter’s name is different from the name of the registrant, please send a copy of the transfer receipt to the ICOP2025 Secretariat at <a href="mailto:icop2025org@gmail.com" target="_blank">icop2025org@gmail.com</a>. <br>
        The registrant’s and remitter’s names should be stated in the email.</li>
        <li>Registration fees are contingent upon the date of payment receipt in our account, and they will be adjusted accordingly if payment is not received by the specified deadline.</li>
        <li>Bank Transfer may take a week to confirm the payment.</li>
    </ul>
</div>

<div class="sub-tit-wrap">
    <h4 class="sub-tit">Cancellation Policy</h4>
</div>
<ul class="list-type list-type-dot">
    <li>
        Cancellation can be made by following steps:
        <ul class="list-type list-type-bar">
            <li>Go to &lt;Confirmation & Receipt&gt; and find your registration information.</li>
            <li>Request registration cancellation by clicking the ‘Registration Cancel’ button at the bottom of the page.</li>
            <li>All the valid refund will be proceeded within 30 days after the last day of the congress.</li>
        </ul>
    </li>
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

<div class="sub-tit-wrap">
    <h4 class="sub-tit">Privacy Policy</h4>
</div>
<div class="term-wrap">
    <div class="term-conbox">
        We value your personal information and abide by the Act on Promotion of Information Network Usage and Information Protection. The Korean Society of Protistologists and The Korean Society of Phycology (hereafter: ‘the Society) uses the personal information provided by you to provide personal information about what you use and We will inform you of what measures are being taken to protect personal information. <br>
        The Society will notify you through the website announcement (or individual notice) when revising the Privacy Policy. <br><br>

        - This policy will be effective as of December 1, 2024.<br><br>

        <strong class="tit">■ Personal information items to collect</strong> <br>
        The Society collects personal information for the management of the annual scientific session of the Korean Society of Protistologists and The Korean Society of Phycology (hereafter: ‘the Event’) <br><br>

        - Collection items: nationality, KHRS member ID, e-mail address, date of birth, title, degree, name, department, affiliation, phone number, service history, access log, cookie, bank account information(from whom request registration fee and refund)
        - How to collect personal information: Website, Online Registration <br><br>

        <strong class="tit">■ Purpose of collecting personal information</strong> <br>
        The Society uses the collected personal information for the following purposes: <br><br>

        - Conduct contracts for service delivery: Content delivery, Identity verification <br>
        - Registrant Management: Personal identification, Assistance of participation in ‘the event’, Notice, Compliant handling, etc. <br><br>

        <strong class="tit">■ Retention and use period of personal information</strong> <br>
        As a general rule, after the purpose of collecting and using personal information is achieved, we will destroy the information immediately. <br>
        But, if it is necessary to preserve it in accordance with the relevant laws and regulations, the Society keeps the registrant’s information for a certain period as stipulated by related laws and regulations as follows. <br><br>

        - Retention items: name, login ID <br>
        - Preservation grounds: Act on Consumer Protection in e-Commerce etc. <br>
        - Retention period: 5 years <br><br>

        Additional Records <br>
        - Records on contract or withdrawal of subscription: <br>
        5 years (Act on Consumer Protection in Electronic Commerce etc.) <br>
        - Record of payment and goods supply: <br>
        5 years (Consumer Protection Act for Electronic Commerce etc.) <br>
        - Record of dissatisfaction or dispute of consumer: <br>
        3 years (Consumer protection law in e-commerce etc.) <br>
        - Records on collection / processing and use of credit information: <br>
        3 years (Act on the Use and Protection of Credit Information) <br><br>

        <strong class="tit">■ Procedures and methods of destroying personal information </strong><br>
        In principle, the Society will destroy the information without delay after the purpose of collecting and using personal information is achieved. The procedure and method of destruction are as follows. <br><br>

        A. Destruction procedure <br>
        The information entered by the registrant for the registration is transferred to a separate DB after the purpose has been accomplished (in the case of a paper sheet), and the information is protected according to internal policies and other related laws <br>
        (See the period of retention and use). Personal information transferred to a separate DB will not be used for any purpose other than that held by law unless otherwise provided by law. <br><br>

        B. Destruction method <br>
        - Personal information stored in an electronic file is deleted using a technical method that cannot play the record. <br>
        - Personal information printed on paper is crushed by using paper shredder. <br><br>

        <strong class="tit">■ Providing personal information</strong> <br>
        The society does not provide the user's personal information in principle. However, except as follows. <br><br>

        - If the users have agreed in advance <br>
        - In accordance with the provisions of the law or for the purpose of investigation, If there is a request <br><br>

        <strong class="tit">■ Consignment of collected personal information</strong> <br>
        The Society entrusts the management of the personal information to companies for the Event operation for certain purposes as below: <br><br>

        1. M2COMM: Entire Event management <br>
        2. M2 Community: ICOP 2025 website management. <br><br>

        The Society will not entrust a single personal information to any other 3rd party companies except the companies listed above. If such a need arises in the future, we will notify the customer of the entrusted person and entrusted business contents, and will obtain prior consent if necessary. <br><br>

        <strong class="tit">■ Rights of users and legal representatives and how to exercise them</strong> <br>
        You and your legal representative may at any time, view your personal information or the personal information of children under the age of 14, and may ask you to modifiy or to terminate your registration. After the registration completed fully with registration payment, the personal information can be modified only by the secretariat. If you need it, please contact to the KHRS secretariat. <br>
        If you request correction of errors in your personal information, we will not use or provide your personal information until you have completed the correction. The society will process personal information that has been terminated or deleted at the request of the user or legal representative in accordance with the conditions specified in the "Period of Retention and Usage of Personal Information Collected and is prohibited from being viewed or accessed for other purposes. <br><br>

        <strong class="tit">■ Matters concerning the installation, operation and rejection of the automatic collection device of personal information</strong> <br>
        The Society operates 'cookies' that store and find your information from time to time. A cookie is a small text file sent to your browser by the server used to run the society’s website and stored on your computer's hard disk. The research meeting uses cookies for the following purposes: <br><br>

        ▶ Purpose of use such as cookie <br>
        - Analyzes the frequency and duration of visits to members and non-members, grasps the user's taste and interests, <br>
        Provide targeted marketing and personalized service through various event attendance and number of visits <br><br>

        You have the option of installing cookies. Therefore, you can allow all cookies by setting options in your web browser, check each time a cookie is saved, or refuse to save all cookies. <br><br>

        ▶ How to decline cookie setting <br>
        Example: To decline cookie settings, you can accept all cookies by selecting the option of your web browser, check each time you save cookies, or refuse to save all cookies. <br><br>

        Setup Method Example (for Internet Explorer): Tools> Internet Options> Privacy at the top of your web browser <br><br>

        However, if you refuse to install cookies, it may be difficult to provide services. <br><br>

        <strong class="tit">■ Civil Service on Personal Information</strong> <br>
        In order to protect customer's personal information and to handle complaints related to personal information, the Society has designated the related department and personal information manager as follows. <br><br>

        Person in charge of personal information management Name: Korean Society of Protistologists and The Korean Society of Phycology <br>
        Email: <a href="mailto:sunkim@pknu.ac.kr" target="_blank">sunkim@pknu.ac.kr</a> <br><br>

        You may report all personal information related complaints arising from the services of the Society to your personal  information manager or department. The Society will promptly  <br>
        I will give you enough reply. <br><br>

        If you need to report or consult about other privacy infringement, please contact the following organizations. <br><br>

        1. The Personal Dispute Mediation Committee (www.1336.or.kr/1336) <br>
        2. Information Protection Mark Certification Committee (www.eprivacy.or.kr/02-580-0533-4) <br>
        3. Internet Crime Investigation Center (http://icic.sppo.go.kr/02-3480-3600) <br>
        4. The Cyber Terror Response Center (www.ctrc.go.kr/02-392-0330)
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
    priceProcess('{{ $apply->type ?? '' }}', '{{ $apply->lang ?? '' }}', '{{ $apply->category ?? '' }}', '{{ $apply->attendType ?? '' }}', '{{ $apply->accompanying ?? '' }}', '{{ $apply->banquet ?? '' }}', '{{ $apply->getOneDay('key') }}', '{{ $apply->tour ?? '' }}');
});    
</script>
@endpush