<?php

namespace App\Services\Symposium;

use App\Models\Country;
use App\Models\SpecialSymposium;
use App\Models\SpecialSymposiumPeriod;
use App\Services\CommonService;
use App\Services\dbService;
use App\Services\Util\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class SymposiumService
 * @package App\Services
 */
class SymposiumService extends dbService
{
    public function registration(Request $request)
    {        
        $periodCheck = $this->periodCheck();

        if( !$periodCheck['result'] ){
            return redirect()->route('main')->withInfo($periodCheck['msg']);
        }
        
        if( $request->sid ){
            $registration = SpecialSymposium::find(decrypt($request->sid));
        }

        $data['step'] = $request->step;
        $data['country'] = (new Country())->countryList('KOR');
        $data['captcha'] = (new CommonService())->captchaMakeService();
        $data['apply'] = $registration ?? null;

        return view('symposium.registration')->with($data);
    }

    public function emailCheck(Request $request)
    {
        $apply = SpecialSymposium::where('year', config('site.common.default.year'))->where('email', $request->email)->where('status','Y')->first();

        if( $apply ){
            return 'already';
        }else{
            return 'vailable';
        }
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

                $lang = $request->ccode == 'KR' ? 'KOR' : 'ENG';

                $registration = new SpecialSymposium();
                $registration->year = config('site.common.default.year');                
                $registration->lang = $lang;
                $registration->ccode = $request->ccode;
                $registration->email = $request->email;
            }else{
                $registration = SpecialSymposium::find(decrypt($request->sid));
            }
    
            $registration->firstName = $request->firstName;
            $registration->lastName = $request->lastName;
            $registration->affiliation = $request->affiliation;
            $registration->cnum = $request->cnum;
            $registration->mobile = $request->mobile;    

            if( $request->userfile ){
                $file = (new CommonService())->fileUploadService($request->userfile, 'symposium');
                $registration->filename = $file['filename'];
                $registration->realfile = $file['realfile'];            
            }
    
            if( $request->delfile ){
                (new CommonService())->fileDeleteService($request->delfile);
            }

            $registration->title = $request->title;
            $registration->topic = $request->topic;

            //speakers 처리
            $speakers = [];
            for( $i=0; $i<=3; $i++ ){
                $speaker = [];
                $speaker['fname'] = $request->speakerFirstName[$i];
                $speaker['lname'] = $request->speakerLastName[$i];
                $speaker['affi'] = $request->speakerAffiliation[$i];
                $speaker['ccode'] = $request->speakerCcode[$i];
                $speaker['title'] = $request->speakerLectureTitle[$i];

                array_push($speakers, $speaker);
            }
            
            $registration->speakers = $speakers;
            $registration->save();

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 심포지엄 스텝 1 저장');

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.symposium.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{
                return redirect()->route('apply.symposium', ['step'=>'2', 'sid'=>encrypt($registration->sid)]);
            }
            

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        } 
        
    }

    public function upsert_02(Request $request)
    {
        $this->transaction();

        try {    

            $mailSend = false;

            $registration = SpecialSymposium::find(decrypt($request->sid));
            
            //완료시에만 저장
            if( $request->saveMode == 'next' && checkUrl() != 'admin' ){
                if( $registration->status == 'N' ){
                    $mailSend = true;
                    $registration->rnum = $this->makeRegistNumber($registration->lang);                    
                    $registration->status = 'Y';
                    $registration->complete_at = now();
                }
            }

            $registration->save();

            if( $mailSend ){
                (new MailService())->makeMail($registration, 'symposiumComplete');
            }

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 심포지엄 스텝 2 저장');

            switch($request->saveMode){
                case 'prev' : $moveStep = $request->step - 1; break;
                case 'next' : $moveStep = $request->step + 1; break;
            }

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.symposium.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{
                return redirect()->route('apply.symposium', ['step'=>$moveStep, 'sid'=>encrypt($registration->sid)]);
            }

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        }
    }

    private function periodCheck()
    {
        $period = SpecialSymposiumPeriod::find(1);

        if( !$period || strtotime($period->sdate) > time() || strtotime($period->edate) < time() ){
            return ['result'=>false, 'msg'=>'This is not the registration period.'];
        }else{
            return ['result'=>true];
        }
    }

    private function makeRegistNumber($lang)
    {
        $maxNumber = SpecialSymposium::selectRaw('max(substring(rnum,4)) as maxNumber')->where('year', config('site.common.default.year'))->where('lang', $lang)->first();
        return 'R'.( $lang == 'KOR' ? 'K' : 'F' ).'-'.($maxNumber['maxNumber']?sprintf('%04d',($maxNumber['maxNumber'])+1):'0001');
    }
}
