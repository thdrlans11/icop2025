@extends('include.layout')

@section('content')

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
            <ul class="regi-step-list">
        <li>
            <div class="img-wrap">
                <img src="/assets/image/sub/ic_regi_step01.png" alt="">
            </div>
            <strong class="tit">온라인 등록하기</strong>
        </li>
        <li>
            <div class="img-wrap">
                <img src="/assets/image/sub/ic_regi_step02.png" alt="">
            </div>
            <strong class="tit">결제하기</strong>
        </li>
        <li>
            <div class="img-wrap">
                <img src="/assets/image/sub/ic_regi_step03.png" alt="">
            </div>
            <strong class="tit">확인 메일 받기</strong>
        </li>
    </ul>
            <div class="sub-tit-wrap">
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
                            <th scope="col" class="bg-navy">Early Bird Registration <br><span>(3월 31일까지)</span></th>
                            <th scope="col" class="bg-green">Late Registration <br><span>(3월 31일 - 4월 30일)</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" rowspan="4">등록비</th>
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
                            <td>Accompanying Person</td>
                            <td colspan="2">150,000 원</td>
                        </tr>
                        <tr>
                            <td>One-day Pass</td>
                            <td colspan="2">150,000 원</td>
                        </tr>
                        <tr>
                            <th scope="row">사교행사</th>
                            <td>Banquet</td>
                            <td colspan="2">100,000 원</td>
                        </tr>
						 <tr>
                            <th scope="row">투어</th>
                            <td>Field Trip</td>
                            <td colspan="2">350,000원</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul class="list-type list-type-dot mt-15">
                <li class="text-red">학생 등록의 경우, 등록 시 학생증을 필히 제출해주십시오.</li>
				<li class="text-red">Field Trip은 결제 완료 기준으로 10명 선착순 신청입니다.</li>
            </ul>
			<div class="sub-tit-wrap">
                <h4 class="sub-tit">등록비 포함사항</h4>
            </div>
		 <div class="table-wrap mt-20">
                <table class="cst-table">
                    <caption class="hide">취소 및 환불</caption>
                    <colgroup>
                        <col style="width: 40%;">
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <th scope="row">
                                Delegate<br>
								Student<br>
								Post Doctor
                            </th>
                            <td>
                                세션장 및 전시장 출입<br>
								점심 (월,화,목,금) – 수요일 점심 미제공<br>
								커피브레이크
                            </td>
                        </tr>
                       <tr>
                            <th scope="row">
                                Accompanying Person
                            </th>
                            <td>
                                점심 (월,화,목,금) – 수요일 점심 미제공<br>
								커피브레이크
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                </table>
            </div>
@endsection