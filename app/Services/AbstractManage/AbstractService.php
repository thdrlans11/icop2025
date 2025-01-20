<?php

namespace App\Services\AbstractManage;

use App\Models\AbstractAuthor;
use App\Models\AbstractInstitution;
use App\Models\AbstractPeriod;
use App\Models\AbstractRegistration;
use App\Models\Country;
use App\Services\CommonService;
use App\Services\dbService;
use App\Services\Util\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class AbstractService
 * @package App\Services
 */
class AbstractService extends dbService
{ 
    public function registration(Request $request)
    {        
        $periodCheck = $this->periodCheck();

        if( !$periodCheck['result'] ){
            return redirect()->route('abstract.guide')->withInfo($periodCheck['msg']);
        }
        
        if( $request->sid ){
            $abstract = AbstractRegistration::find(decrypt($request->sid));
        }

        $data['step'] = $request->step;
        $data['countrys'] = (new Country())->countryList('KOR');
        $data['captcha'] = (new CommonService())->captchaMakeService();
        $data['edate'] = $periodCheck['edate'];
        $data['apply'] = $abstract ?? null;
        $data['subNum'] = '2';

        return view('abstract.registration')->with($data);
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
                $registration = new AbstractRegistration();
                $registration->year = config('site.common.default.year');                
                $registration->rnum = $this->makeRegistNumber();
            }else{
                $registration = AbstractRegistration::find(decrypt($request->sid));
            }
    
            $registration->ptype = $request->ptype;
            $registration->topic = $request->topic;
            $registration->institution_count = $request->institution_count;
            $registration->author_count = $request->author_count;
            $registration->subject = $request->subject;
            $registration->content = $request->content;
            $registration->keyword = $request->keyword;
            $registration->agree1 = $request->agree1;
            $registration->agree2 = $request->agree2;
            $registration->save();

            //삭제된 소속 데이터 정리
            AbstractInstitution::whereNotIn('sid', $request->institution_sid)->where('asid', $registration->sid)->delete();

            for( $i=1; $i<=$request->institution_count; $i++ ){
                if( isset($request->institution_sid[$i-1]) ){
                    $institution = AbstractInstitution::find($request->institution_sid[$i-1]);
                }else{
                    $institution = new AbstractInstitution();
                }
                $institution->asid = $registration->sid;
                $institution->sort_number = $i;
                $institution->country = $request->country[$i-1];
                $institution->department = $request->department[$i-1];
                $institution->affiliation = $request->affiliation[$i-1];
                $institution->city = $request->city[$i-1];
                $institution->save();
            }

            //삭제된 저자 데이터 정리
            AbstractAuthor::whereNotIn('sid', $request->author_sid)->where('asid', $registration->sid)->delete();

            for( $i=1; $i<=$request->author_count; $i++ ){
                if( isset($request->author_sid[$i-1]) ){
                    $author = AbstractAuthor::find($request->author_sid[$i-1]);
                }else{
                    $author = new AbstractAuthor();
                }
                $author->asid = $registration->sid;
                $author->sort_number = $i;
                $author->first_name = $request->author_firstname[$i-1];
                $author->last_name = $request->author_lastname[$i-1];
                $author->email = $request->author_email[$i-1];
                $author->mobile = $request->author_mobile[$i-1];
                $author->country = $request->author_country[$i-1];
                $author->institution_1 = $request->author_institution_1[$i-1];
                $author->institution_2 = $request->author_institution_2[$i-1];
                $author->presentation_author = $request['p_author_'.$i] == 'Y' ? 'Y' : 'N';
                $author->corresponding_author = $request['c_author_'.$i] == 'Y' ? 'Y' : 'N';
                $author->save();
            }            

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 초록등록 스텝 1 저장');

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.registration.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{

                switch($request->saveMode){
                    case 'imsi' : $moveStep = $request->step; break;
                    case 'next' : $moveStep = $request->step + 1; break;
                }

                return redirect()->route('abstract.registration', ['step'=>$moveStep, 'sid'=>encrypt($registration->sid)]);
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

            $registration = AbstractRegistration::find(decrypt($request->sid));
            
            //완료시에만 저장
            if( $request->saveMode == 'next' && checkUrl() != 'admin' ){
                if( $registration->status == 'N' ){
                    $mailSend = true;                    
                    $registration->status = 'Y';
                    $registration->complete_at = now();
                }
            }

            $registration->save();

            if( $mailSend ){
                $p_author = $registration->getPresentation();
                $c_author = $registration->getCorresponding();

                $registration->first_name = $p_author->first_name;
                $registration->last_name = $p_author->last_name;
                $registration->email = $p_author->email;
    
                (new MailService())->makeMail($registration, 'abstractComplete');

                //교신저자도 보낼지?
                if( $p_author->email != $c_author->email ){

                    $registration->first_name = $c_author->first_name;
                    $registration->last_name = $c_author->last_name;
                    $registration->email = $c_author->email;
        
                    (new MailService())->makeMail($registration, 'abstractComplete');

                }
            }

            $this->dbCommit($msg ?? ( checkUrl() == 'admin' ? '관리자 ' : '사용자' ).' 초록등록 스텝 2 저장');

            switch($request->saveMode){
                case 'next' : $moveStep = $request->step + 1; break;
            }

            if( checkUrl() == 'admin' ){
                return redirect()->route('admin.registration.modifyForm', ['step'=>$request->step, 'sid'=>encrypt($registration->sid)]);
            }else{
                return redirect()->route('abstract.registration', ['step'=>$moveStep, 'sid'=>encrypt($registration->sid)]);
            }

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        }
    }

    public function search()
    {
        $data['subNum'] = '3';
        $data['country'] = (new Country())->countryList('KOR');

        return $data;
    }

    public function searchResult(Request $request)
    {
        $lists = AbstractRegistration::whereHas('authors', function($q) use($request){
            $q->where('country', $request->searchCcode)->where('email', $request->searchEmail)->where('presentation_author', 'Y');
        })->get();

        if( $lists->count() <= 0 ){
            return redirect()->back()->withError('Entered is incorrect. Please try again.');
        }

        $periodCheck = $this->periodCheck();

        $data['lists'] = $lists;        
        $data['subNum'] = '3';
        $data['modifyYn'] = $periodCheck['result'];
        $data['edate'] = $periodCheck['edate'];

        return view('abstract.searchResult')->with($data);
    }

    private function periodCheck(){

        $period = AbstractPeriod::find(1);

        if( !$period ){
            return ['result'=>false, 'msg'=>'This is not the registration period.'];
        }else{
            if( strtotime($period->sdate) > time() || strtotime($period->edate) < time() ){
                return ['result'=>false, 'msg'=>'This is not the registration period.'];
            }else{
                return ['result'=>true, 'msg'=>'', 'edate'=>$period->edate];
            } 
        }

    }

    private function makeRegistNumber()
    {
        $maxNumber = AbstractRegistration::selectRaw('max(substring(rnum,3)) as maxNumber')->where('year', config('site.common.default.year'))->first();
        return 'A-'.($maxNumber['maxNumber']?sprintf('%04d',($maxNumber['maxNumber'])+1):'0001');
    }

    public function delete(Request $request)
    {
        $registration = AbstractRegistration::find(decrypt($request->sid));
        $registration->delete();

        return redirect()->route('abstract.registration.search')->withSuccess('The abstract has been removed.');
    }
    
    public function preview(Request $request)
    {
        $registration = AbstractRegistration::find(decrypt($request->sid));

        $data['apply'] = $registration;

        return view('abstract.preview')->with($data);
    }

}
