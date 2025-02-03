
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>{{ config('site.common.info.siteName') }}</title>
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
                <td style="padding: 30px 30px 90px;box-sizing:border-box;">
                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                        <tbody>
                            <tr>
                                <th scope="col" style="font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.7;text-align: left;">
                                    Dear {{ $apply->first_name }} {{ $apply->last_name }},
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 35px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 15px;line-height: 1.7;">
                                    Thank you for the online submission of your abstract to {{ config('site.common.info.siteName') }}. <br/>
                                    Your abstract has been successfully submitted as follows.
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 25px;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 195px;">
                                            <col style="width: 350px;">
                                        </colgroup>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Abstract No.
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                <strong style="color: #1736d3;">{{ $apply->rnum }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Presentation Type
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ config('site.abstract.ptype')[$apply->ptype] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                Abstract Topics
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ config('site.abstract.topic')[$apply->topic] }} {{ $apply->topic == 'Z' ? '( '.$apply->topic_other.' )' : '' }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="padding-top: 30px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.2;text-align: left;">Authors Information</th>
                            </tr>
                            <tr>
                                <td style="padding: 10px 25px 0;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 195px;">
                                            <col style="width: 350px;">
                                        </colgroup>
                                        <tbody>
                                            @foreach( $apply->authors as $author  )
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Order
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;line-height: 1.3">
                                                    {{ $author->sort_number }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    First Name
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->first_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Last Name
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->last_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    E-Mail
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Mobile
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->mobile }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Institution No.
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->institution_1 ?? '' }} {{ $author->institution_2 ? ', '.$author->institution_2 : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Presentation Author
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->presentation_author }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Corresponding Author
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $author->corresponding_author }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="padding-top: 30px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;line-height: 1.2;text-align: left;">Abstract Information</th>
                            </tr>
                            <tr>
                                <td style="padding: 10px 25px 0;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 195px;">
                                            <col style="width: 350px;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Abstract Title
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;line-height: 1.3">
                                                    {{ $apply->subject ?? '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Abstract
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {!! $apply->content ?? '' !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;text-align: left;">
                                                    Keywords
                                                </th>
                                                <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                    {{ $apply->getKeyword() }}
                                                </td>
                                            </tr>
                                        </tbody>
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