<?php

namespace App\Services\Admin\Symposium;

use App\Models\Country;
use App\Models\SpecialSymposium;
use App\Models\SpecialSymposiumPeriod;
use App\Services\CommonService;
use App\Services\dbService;
use App\Services\Util\ExcelService;
use App\Services\Util\WordService;
use App\Services\Util\MailService;
use Illuminate\Http\Request;

/**
 * Class SymposiumService
 * @package App\Services
 */
class SymposiumService extends dbService
{
    public function list(Request $request)
    {
        if( $request->del != 'Y' ){
            $lists = SpecialSymposium::orderBy('created_at','desc');
        }else{
            $lists = SpecialSymposium::onlyTrashed()->orderBy('created_at','desc');
        }
        
        foreach( $request->all() as $key => $val ){
            if( ( $key == 'ccode' || $key == 'rnum' || $key == 'email' || $key == 'regName' || $key == 'category' || $key == 'attendType' || $key == 'payMethod' || $key == 'payStatus' || $key == 'lang' ) && $val ){
                if( $key == 'regName' ){
                    $lists->where(function($lists) use ($val) {
                        $lists->whereRaw("CONCAT(firstName,' ',lastName) LIKE '%".$val."%'")
                            ->orWhere('name', 'LIKE', '%' . $val . '%');
                    });
                }else{
                    $lists->where($key, 'LIKE', '%'.$val.'%');
                }
            }
        }

        if ($request->excel) {
            $cntQuery = clone $lists;
            return (new ExcelService())->SymposiumExcel($lists, $cntQuery->count(), (new Country())->countryList('KOR'));
        }

        if ($request->word) {
            return (new WordService())->makeWord($lists, 'symposium');
        }

        if( $request->paginate ){
            $paginate = $request->paginate;
        }else{
            $paginate = '20';
        }

        $lists = $lists->paginate($paginate)->appends($request->query());
        $lists = setListSeq($lists);
        $data['lists'] = $lists;
        $data['type'] = $request->type;
        $data['period'] = SpecialSymposiumPeriod::find(1);
        $data['country'] = (new Country())->countryList('KOR');

        return $data;
    }

    public function modifyForm(Request $request)
    {
        $registration = SpecialSymposium::find(decrypt($request->sid));

        $data['step'] = $request->step;
        $data['type'] = $registration->type;        
        $data['country'] = (new Country())->countryList('KOR');
        $data['captcha'] = (new CommonService())->captchaMakeService();
        $data['apply'] = $registration;
        return $data;
    }

    public function sendMailForm(Request $request)
    {
        $registration = SpecialSymposium::find(decrypt($request->sid));
        $mailBody = (new MailService())->makeMail($registration, 'symposiumComplete', 'preview');

        $data['apply'] = $registration;
        $data['mailBody'] = $mailBody;

        return $data;
    }

    public function sendMail(Request $request)
    {
        $registration = SpecialSymposium::find(decrypt($request->sid));

        if( $request->email ){
            $registration->email = $request->email;
        }

        (new MailService())->makeMail($registration, 'symposiumComplete');

        return redirect()->back()->withSuccess('메일 전송이 완료되었습니다.')->with('close','Y');
    }

    public function dbChange(Request $request)
    {   
        $this->transaction();

        try {

            if( $request->db == 'symposium_periods' ){

                $registrationPeriod = SpecialSymposiumPeriod::find(decrypt($request->sid));
                $registrationPeriod[$request->field] = $request->value;
                $registrationPeriod->save();

                $msg = '관리자 Speical Symposium 날짜 변경';

            }else{

                $registration = SpecialSymposium::withTrashed()->find(decrypt($request->sid));

                if( $request->field == 'delete' ){
                    if( $request->value == 'Y' ){
                        $registration->delete();
                        $msg = '관리자 Speical Symposium 삭제';
                    }else{
                        $registration->restore();
                        $msg = '관리자 Speical Symposium 복구';
                    }
                    
                }

            }               

            $this->dbCommit($msg); 
            
            return 'success';

        } catch (\Exception $e) {

            return $this->dbRollback($e, 'ajax');

        }
    }

    public function memoForm(Request $request)
    {
        $registration = SpecialSymposium::find(decrypt($request->sid));
        $data['apply'] = $registration;

        return $data;
    }    

    public function memo(Request $request)
    {   
        $this->transaction();

        try {

            $registration = SpecialSymposium::find(decrypt($request->sid));
            $registration->memo = $request->memo;
            $registration->save();

            $this->dbCommit('심포지엄 메모 변경'); 
            
            return redirect()->back()->withSuccess('메모 저장이 완료되었습니다.')->with('close','Y');

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        }
    }
}
