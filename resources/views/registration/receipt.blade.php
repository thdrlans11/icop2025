<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ICOP/ISOP 2025</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0;padding: 0;" onload="print()">
    <table style="width:650px;max-width:650px;margin: 0 auto;padding:0;border:1px solid #ddd;border-collapse: collapse;border-spacing:0;box-sizing:border-box;letter-spacing: -0.02em;">
        <tbody>
            <tr>
                <td style="padding: 0;text-align: center;text-align: center;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 20px;color: #050505;">
                    <img src="{{ env('APP_URL') }}/assets/image/mail/mail_header.jpg" alt="16th International Congress of Protistology 2025, Joint meeting of ICOP/ISOP 2025. June 22 (Sunday), - June 27 (Friday), 2025. Sungkyunkwan University, Seoul, Korea (TBC)" style="display: inline-block;border:0 none;vertical-align: top;" />
                </td>
            </tr>
            <tr>
                <td style="padding: 40px 35px 50px;box-sizing:border-box;">
                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                        <tbody>
                            <tr>
                                <th scope="col" style="padding-bottom: 40px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 45px;font-weight: 700;line-height: 1;color: #0579b5;letter-spacing: -0.02em;text-align: center;">
                                    Receipt
                                </th>
                            </tr>
                            <tr>
                                <td style="position: relative;z-index: 1;">
                                    <table style="width: 100%;border-collapse: collapse;border-spacing: 0;">
                                        <colgroup>
                                            <col style="width: 195px;">
                                            <col style="width: 350px;">
                                        </colgroup>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;">
                                                Country
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->country->cn }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;">
                                                Name
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->firstName.' '.$apply->lastName }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;">
                                                Affiliation
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {{ $apply->affiliation }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="padding: 10px 15px;background-color: #f4f4f4;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;font-weight: 700;color: #000000;line-height: 1.3;">
                                                Amount
                                            </th>
                                            <td style="padding: 10px 15px;border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 14px;color: #444444;line-height: 1.3">
                                                {!! $apply->makeTotalText() !!}
                                            </td>
                                        </tr>
                                    </table>
                                    <img src="{{ env('APP_URL') }}/assets/image/mail/bg_receipt.png" alt="ICOP SEOUL, KOREA 2025." style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);z-index: -1;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 40px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;color: #282828;line-height: 1.3;letter-spacing: -0.02em;text-align: center;">
                                    {{ $apply->payComplete_at ? $apply->payComplete_at->toDateString() : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 40px;font-family: 'Malgun Gothic', '맑은고딕', '돋움', 'dotum', sans-serif;font-size: 16px;font-weight: 700;color: #282828;line-height: 1.3;letter-spacing: -0.02em;text-align: center;">
                                    The Korean Society of Protistologists and <br/>
                                    The Korean Society of Phycology
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