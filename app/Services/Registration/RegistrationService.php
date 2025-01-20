<?php

namespace App\Services\Registration;

use App\Models\Country;
use App\Models\Registration;
use App\Models\RegistrationPeriod;
use App\Services\dbService;
use App\Services\CommonService;
use App\Services\Util\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class RegistrationService
 * @package App\Services
 */
class RegistrationService extends dbService
{
    public function registration(Request $request)
    {        
        $periodCheck = $this->periodCheck();

        if( !$periodCheck['type'] ){
            return redirect()->route('registration.guide')->withInfo($periodCheck['msg']);
        }else{
            $type = $periodCheck['type'];
        }
        
        if( $request->sid ){
            $registration = Registration::find(decrypt($request->sid));
            if( $registration->payStatus != 'N' ){
                $type = $registration->type;
            }
        }

        $data['step'] = $request->step;
        $data['type'] = $type;        
        if( $request->rgubun == 'KOR' || ( isset($registration) && $registration->ccode == 'KR' ) ){
            $data['country'] = (new Country())->countryList('KOR');
        }else{
            $data['country'] = (new Country())->countryList();
        }
        $data['captcha'] = (new CommonService())->captchaMakeService();
        $data['apply'] = $registration ?? null;
        $data['rgubun'] = $request->rgubun ?? null;
        $data['subNum'] = $request->rgubun ? '5' : '2';

        return view('registration.registration')->with($data);
    }

    public function emailCheck(Request $request)
    {
        $apply = Registration::where('year', config('site.common.default.year'))->where('email', $request->email)->first();

        if( $apply ){
            return 'already';
        }else{
            return 'vailable';
        }
    }

    public function makePrice(Request $request)
    {
        $totalPrice = 0;
        $priceText = '';

        $type = $request->type; //타입
        $lang = $request->lang; //국가
        $category = $request->category; //카테고리
        $attendType = $request->attendType; //참석타입
        $accompanying = $request->accompanying; //동반자
        $banquet = $request->banquet; //만찬
        $oneDay = $request->oneDay; //원데이

        $unit = config('site.registration.unit')[$lang];

        if( $category && $attendType ){
            if( $attendType == 'F' ){
                $categoryPrice = config('site.registration.categoryPrice')[$lang][$type][$category];                 
                $priceText .= config('site.registration.category')[$category].' – '.$unit.' '.number_format($categoryPrice).'<br>';
                $totalPrice += $categoryPrice;
            }else{
                if( $oneDay ){
                    $oneDayArray = explode(',',$oneDay);
                    $oneDayString = '';
                    foreach( $oneDayArray as $key => $val ){
                        $oneDayString .= ($key>0?',':'').config('site.registration.oneDay')[$val];
                    }

                    $categoryPrice = config('site.registration.oneDayPrice')[$lang]*count($oneDayArray);                 
                    $priceText .= config('site.registration.category')[$category].' - One day – June '.$oneDayString.' – '.$unit.' '.number_format($categoryPrice).'<br>';
                    $totalPrice += $categoryPrice;
                }
            }
        }

        if( $accompanying && $accompanying != 'N' ){
            $accompanyingPrice = config('site.registration.accompanyingPrice')[$lang]*$accompanying;
            $priceText .= 'Accompanying Person - '.config('site.registration.accompanying')[$accompanying].' – '.$unit.' '.number_format($accompanyingPrice).' <br>';
            $totalPrice += $accompanyingPrice;
        }

        if( $banquet && $banquet != 'N' ){
            $banquetPrice = config('site.registration.banquetPrice')[$lang]*$banquet;
            $priceText .= 'Banquet - '.config('site.registration.banquet')[$banquet].' – '.$unit.' '.number_format($banquetPrice).' <br>';
            $totalPrice += $banquetPrice;
        }

        return ['priceUnit'=>$unit.' '.number_format($totalPrice), 'price'=>$totalPrice, 'priceText'=>$priceText];
        
    }

    public function upsert_01(Request $request)
    {   
        //허니팟 작동 ( 봇 방지 )
        if( !$request->sid && checkUrl() != 'admin' ){
            
            $rules = array(
                'my_name' => 'honeypot',
                'my_time' => 'required|honeytime:5'
            );

            $validator = Validator::make(['my_name'=>$request->my_name, 'my_time'=>$request->my_time], $rules);

            if($validator->fails()){
                return redirect()->route('main');
            }

        }

        $this->transaction();

        try {    

            if( !$request->sid ){
                $registration = new Registration();
                $registration->year = config('site.common.default.year');                
                $registration->rnum = $this->makeRegistNumber();
                $registration->lang = ( $request->ccode == 'KR' ? 'KOR' : 'ENG' );
                $registration->ccode = $request->ccode;
                $registration->email = $request->email;
            }else{
                $registration = Registration::find(decrypt($request->sid));
            }
    
            $registration->type = $request->type;
            $registration->title = $request->title;
            $registration->title_etc = $request->title_etc;
            $registration->degree = $request->degree;
            $registration->firstName = $request->firstName;
            $registration->lastName = $request->lastName;
            $registration->name = $request->name;
            $registration->department = $request->department;
            $registration->affiliation = $request->affiliation;
            $registration->cnum = $request->cnum;
            $registration->mobile = $request->mobile;    
            $registration->save();

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 사전등록 스텝 1 저장');

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.registration.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{
                return redirect()->route('apply.registration', ['step'=>'2', 'rgubun'=>$request->rgubun, 'sid'=>encrypt($registration->sid)]);
            }
            

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        } 
        
    }

    public function upsert_02(Request $request)
    {
        $this->transaction();

        try {    

            $registration = Registration::find(decrypt($request->sid));
            $registration->type = $request->type;
            $registration->category = $request->category;
            $registration->attendType = $request->attendType;
            $registration->oneDay = $request->oneDay;
            $registration->accompanying = $request->accompanying;
            $registration->banquet = $request->banquet;
            $registration->price = $request->price;

            if( $request->userfile ){
                $file = (new CommonService())->fileUploadService($request->userfile, 'registration');
                $registration->filename = $file['filename'];
                $registration->realfile = $file['realfile'];            
            }
    
            if( $request->delfile ){
                (new CommonService())->fileDeleteService($request->delfile);
            }

            $registration->save();

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 사전등록 스텝 2 저장');

            switch($request->saveMode){
                case 'prev' : $moveStep = $request->step - 1; break;
                case 'imsi' : $moveStep = $request->step; break;
                case 'next' : $moveStep = $request->step + 1; break;
            }

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.registration.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{
                return redirect()->route('apply.registration', ['step'=>$moveStep, 'rgubun'=>$request->rgubun, 'sid'=>encrypt($registration->sid)]);
            }
            

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        }

    }

    public function upsert_03(Request $request)
    {
        $this->transaction();

        try {    

            $mailSend = false;

            $registration = Registration::find(decrypt($request->sid));
            $registration->type = $request->type;
            $registration->payMethod = $request->payMethod;            
            $registration->payName = $request->payName;
            $registration->payDate = $request->payDate;
            
            //완료시에만 저장
            if( $request->saveMode == 'next' && checkUrl() != 'admin' ){
                if( $request->payMethod == 'C' && $registration->payStatus == 'N' ){
                    $registration->pgCode = $request->replycode;
                    $registration->pgMsg = $request->replyMsg;
                    $registration->pgTid = $request->tid;
                    $registration->payStatus = 'Y';
                    $registration->payComplete_at = now();                
                }
                if( $registration->status == 'N' ){
                    $mailSend = true;                    
                    $registration->status = 'Y';
                    $registration->complete_at = now();
                }
            }

            $registration->save();

            if( $mailSend ){
                (new MailService())->makeMail($registration, 'registrationComplete');
            }

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 사전등록 스텝 3 저장');

            switch($request->saveMode){
                case 'prev' : $moveStep = $request->step - 1; break;
                case 'next' : $moveStep = $request->step + 1; break;
            }

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.registration.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{
                return redirect()->route('apply.registration', ['step'=>$moveStep, 'rgubun'=>$request->rgubun, 'sid'=>encrypt($registration->sid)]);
            }

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        }
    }

    public function receipt(Request $request)
    {
        $registration = Registration::find(decrypt($request->sid));
        $data['apply'] = $registration;

        return $data;
    }

    public function search(Request $request)
    {
        $data['country'] = (new Country())->countryList('KOR');
        $data['subNum'] = $request->rgubun ? '6' : '3';
        $data['rgubun'] = $request->rgubun ?? null;

        return $data;
    }

    public function searchResult(Request $request)
    {
        $registration = Registration::where('ccode', $request->searchCcode)->where('email', $request->searchEmail)->first();

        if( !$registration ){
            return redirect()->back()->withError('Entered is incorrect. Please try again.');
        }

        $periodCheck = $this->periodCheck();

        $data['apply'] = $registration;        
        $data['subNum'] = $registration->ccode == 'KR' ? '6' : '3';
        $data['rgubun'] = $registration->ccode == 'KR' ? 'KOR' : null;
        $data['modifyYn'] = ( $periodCheck['type'] ? true : false );

        return view('registration.searchResult')->with($data);
    }

    private function periodCheck(){

        $type = null;
        $period = RegistrationPeriod::find(1);

        if( !$period ){
            return ['type'=>$type, 'msg'=>'This is not the registration period.'];
        }

        if( strtotime($period->Esdate) < time() && strtotime($period->Eedate) > time() ){
            $type = 'E';
        }else if( strtotime($period->Lsdate) < time() && strtotime($period->Ledate) > time() ){
            $type = 'L';
        }
        
        if( !$type ){
            return ['type'=>$type, 'msg'=>'This is not the registration period.'];
        }else{
            return ['type'=>$type, 'msg'=>''];
        }

    }

    private function makeRegistNumber()
    {
        $maxNumber = Registration::selectRaw('max(substring(rnum,3)) as maxNumber')->where('year', config('site.common.default.year'))->first();
        return 'R-'.($maxNumber['maxNumber']?sprintf('%04d',($maxNumber['maxNumber'])+1):'0001');
    }
}
