@extends('include.layout')

@section('content')
<div class="sponsor-info-conbox">
    <div class="sub-tit-wrap">
        <h4 class="sub-tit">신청기한</h4>
    </div>
    <div class="bg-img-box">
        <img src="/assets/image/sub/ic_cal.png" alt="">
        <div class="text-wrap">
            <p class="tit">후원신청 마감일 : <strong>2025년 4월 30일(수)</strong></p>
        </div>
    </div>

    <div class="sub-tit-wrap">
        <h4 class="sub-tit">관련 자료 다운로드</h4>
    </div>
    <ul class="list-type list-type-dot">
        <li>후원신청을 원하는 기업, 기관은 아래 후원신청서를 작성하시어 ICOP 2025 사무국(<a href="mailto:icop2025org@gmail.com" target="_blank" class="link">icop2025org@gmail.com</a>)으로 보내주시기 바랍니다.</li>
        <li>후원신청 관련하여 문의사항이 있으실 경우 사무국으로 문의해주시기 바랍니다.</li>
    </ul>
    <div class="btn-wrap">
        <a href="/assets/file/ICOP_2025_Sponsorship_Prospectus_Final(KOR)_0116_v2.pdf" class="btn btn-download" download>후원전시 안내서</a>
        <a href="/assets/file/ICOP_2025_sponsor_application_form_0116.docx" class="btn btn-download" download>후원신청서</a>
        <a href="/assets/file/ICOP_2025_sponsor_business-license.pdf" class="btn btn-download" download>사업자등록증</a>
        <a href="/assets/file/ICOP_2025_sponsor_bank.pdf" class="btn btn-download"  download>통장사본</a>
    </div>
</div>
@endsection            