<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ICOP/ISOP 2025</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0;padding: 0;">
    <table style="width:650px;max-width:650px;margin: 0 auto;padding:0;border:1px solid #ddd;border-collapse: collapse;border-spacing:0;box-sizing:border-box;letter-spacing: -0.02em;">
        <tbody>
            <tr>
                <td style="padding: 0;text-align: center;text-align: center;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 20px;color: #050505;">
                    <img src="{{ env('APP_URL') }}/assets/image/mail/mail_header.jpg" alt="16th International Congress of Protistology 2025, Joint meeting of ICOP/ISOP 2025. June 22 (Sunday), - June 27 (Friday), 2025. Sungkyunkwan University, Seoul, Korea (TBC)" style="display: inline-block;border:0 none;vertical-align: top;" />
                </td>
            </tr>
            <tr>
                <th scope="row" style="padding: 20px;background-color: #0579b5;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 18px;font-weight: 700;color: #fff;line-height: 1.3;letter-spacing: -0.02em;box-sizing: border-box;">
                    @if( $apply->payStatus == 'N' )
                    [{{ config('site.common.info.siteName') }}] The registration profile has been created successfully. <br/>
                    (Request to deposit)
                    @else
                    [{{ config('site.common.info.siteName') }}] Your registration has been successfully completed.
                    @endif
                </th>
            </tr>
            <tr>
                <td style="padding: 30px 30px 90px;box-sizing:border-box;">
                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                        <tbody>
                            <tr>
                                <th scope="col" style="font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.7;text-align: left;">
                                    Dear {{ $apply->firstName }} {{ $apply->lastName }},
                                </th>
                            </tr>
                            @if( $apply->payStatus == 'N' )
                            <tr>
                                <td style="padding-bottom: 35px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 15px;line-height: 1.7;">
                                    Thank you for registering at the ICOP/ISOP 2025. <br/>
                                    Your online registration has been processed and is pending payment by bank transfer. <br/><br/>
                                    Your registration is only complete upon the full payment of your registration fee. After making the payment, a copy of the bank transfer statement with your name and address and the payment details must be submitted to the secretariat at ICOP/ISOP 2025. <br/>
                                    Upon receipt of your full payment, a confirmation letter will be sent to you. <br/><br/>
                                    If you have further inquiries, please contact the secretariat at ICOP/ISOP 2025. <br/>
                                    Thank you.
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td style="padding-bottom: 35px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 15px;line-height: 1.7;">
                                    This is the official confirmation slip of your registration ICOP/ISOP 2025. <br/>
                                    Your registration details are as follows.
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td style="padding: 0 25px;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 195px;">
                                            <col style="width: 350px;">
                                        </colgroup>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Registration No.
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                <strong style="color: #1736d3;">{{ $apply->rnum }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Registration Date
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->complete_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Country
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->country->cn }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                E-mail
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Title
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->makeTitle() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Degree
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ config('site.registration.degree')[$apply->degree] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Name
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->firstName.' '.$apply->lastName }}
                                            </td>
                                        </tr>
                                        @if( $apply->ccode == 'KR' )
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                국문 성명
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->name }}
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Department
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->department }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Affiliation
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->affiliation }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Phone Number
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                +{{ $apply->cnum.' '.$apply->mobile }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Category
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ config('site.registration.category')[$apply->category] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Attendance Type
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ config('site.registration.attendType')[$apply->attendType] }}
                                            </td>
                                        </tr>
                                        @if( $apply->attendType == 'O' )
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Which date you want to register?
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->getOneDay('value') }}
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Accompanying Person
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {!! $apply->accompanying ? $apply->accompanying == 'N' ? config('site.registration.accompanying')[$apply->accompanying] : $apply->makeTotalText('accompanying') : '' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Banquet
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {!! $apply->banquet ? $apply->banquet == 'N' ? config('site.registration.banquet')[$apply->banquet] : $apply->makeTotalText('banquet') : '' !!}
                                            </td>
                                        </tr>
                                        @if( $apply->category == 'B' )
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                File upload
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->filename }}
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Total Amount
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {!! $apply->makeTotalText() !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Payment method
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ config('site.registration.payMethod')[$apply->payMethod] }}
                                            </td>
                                        </tr>
                                        @if( $apply->payMethod == 'B' )
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Registrant’s Name & Affiliation
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->payName }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Eexpected Remittance Date
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->payDate }}
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Payment Status
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                <strong style="color: {{ $apply->payStatus != 'N' ? '#ff0000' : '#1736d3' }};">{{ config('site.registration.payStatus')[$apply->payStatus] }}</strong>
                                            </td>
                                        </tr>
                                        
                                        <!-- Country > Korea, Repblic of 선택한 경우 노출 -->
                                        @if( $apply->ccode == 'KR' )
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Bank Account Information
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                TBD
                                            </td>
                                        </tr>
                                        @else
                                        <!-- Country > Korea, Repblic of 외 국가 선택한 경우 노출 -->
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Bank Account Information
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                TBD
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Bank Address
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                TBD
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Account No.
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                TBD
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Account Name
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                TBD
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Swift Code
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                TBD
                                            </td>
                                        </tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 40px;text-align: center;">
                                    <a href="{{ env('APP_URL') }}" target="_blank"><img src="{{ env('APP_URL') }}/assets/image/mail/btn_mail_home.jpg" alt="ICOP/ISOP 2025Website"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>        
            <tr>
                <td>
                    <img src="{{ env('APP_URL') }}/assets/image/mail/mail_footer.jpg" alt="Contact Information | Congress Team. E.info@icop2025.org. P.+82-2-6959-5333. F.+82-2-70-8677-6333. Copyright @ ICOP 2025. All Rights Reserved." style="display: inline-block;border:0 none;vertical-align: top;" />
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>