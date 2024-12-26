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
                    <img src="{{ env('APP_URL') }}/assets/image/mail/mail_header_241204.jpg" alt="16th International Congress of Protistology 2025, Joint meeting of ICOP/ISOP 2025. June 22 (Sunday), - June 27 (Friday), 2025. Sungkyunkwan University, Seoul, Korea (TBC)" style="display: inline-block;border:0 none;vertical-align: top;" />
                </td>
            </tr>
            <tr>
                <th scope="row" style="padding: 20px;background-color: #0579b5;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 18px;font-weight: 700;color: #fff;line-height: 1.3;letter-spacing: -0.02em;box-sizing: border-box;">
                   Thank you for submitting a proposal for the Special Symposium!
                </th>
            </tr>
            <tr>
                <td style="padding: 30px 30px 90px;box-sizing:border-box;">
                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                        <tbody>
                            <tr>
                                <th scope="col" style="padding-bottom: 30px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.7; text-align:left;">
                                    Thank you for submitting a proposal for the Special Symposium for ICOP/ISOP 2025!
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 35px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 15px;line-height: 1.7;">
                                    If you would like to edit or update your proposal, please email us at icop2025org@gmail.com before January 31, 2025, which is the final day for proposal submissions. <br/><br/>
                                    The results of the proposal review and acceptance will be informed via email after the review process. <br/><br/>
                                    If you have any further inquiries, please feel free to contact us at icop2025org@gmail.com. <br/>
                                    Thank you.
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 25px 30px;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 195px;">
                                            <col style="width: 350px;">
                                        </colgroup>
                                        <tr>
                                            <th scope="col" colspan="2" style="padding-bottom: 10px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.7;text-align: left;">Organizer</th>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Symposium No.
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                <strong style="color: #1736d3;">{{ $apply->rnum }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Symposium Date
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
                                                Name
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->firstName.' '.$apply->lastName }}
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
                                                E-mail
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->email }}
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
                                                Photo <br/>(Only jpg, png)
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                <u>{{ $apply->filename }}</u>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Symposium Title
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->title }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Brief synopsis of topic
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->topic }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 25px;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col>
                                            <col>
                                            <col>
                                            <col>
                                        </colgroup>
                                        <tr>
                                            <th scope="col" colspan="5" style="padding-bottom: 10px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.7;text-align: left;">Speakers</th>
                                        </tr>                                        
                                        <tr>
                                            <th scope="row" style="padding: 10px 0;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: center;">
                                                No.
                                            </th>
                                            <th scope="row" style="padding: 10px 0;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: center;">
                                                Name
                                            </th>
                                            <th scope="row" style="padding: 10px 0;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: center;">
                                                Affiliation
                                            </th>
                                            <th scope="row" style="padding: 10px 0;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: center;">
                                                Country
                                            </th>
                                            <th scope="row" style="padding: 10px 0;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: center;">
                                                Lecture Title
                                            </th>
                                        </tr>
                                        @foreach( $apply->speakers as $key => $val )
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: center;">
                                                Speaker {{ $key+1 }}
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3;text-align: center;">
                                                {{ $val->fname.' '.$val->lname }}
                                            </td>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3;text-align: center;">
                                                {{ $val->affi }}
                                            </td>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3;text-align: center;">
                                                {{ $country[$val->ccode]['cn'] }}
                                            </td>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3;text-align: center;">
                                                {{ $val->title }}
                                            </td>
                                        </tr>
                                        @endforeach
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
                    <img src="{{ env('APP_URL') }}/assets/image/mail/mail_footer.png" alt="Contact Information | Congress Team. E.info@icop2025.org. P.+82-2-6959-5333. F.+82-2-70-8677-6333. Copyright @ ICOP 2025. All Rights Reserved." style="display: inline-block;border:0 none;vertical-align: top;" />
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>