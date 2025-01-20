<?php

namespace App\Services\Admin\AbstractManage;

use App\Models\AbstractPeriod;
use App\Models\AbstractRegistration;
use App\Models\Country;
use App\Services\dbService;
use App\Services\Util\ExcelService;
use Illuminate\Http\Request;

/**
 * Class AbstractService
 * @package App\Services
 */
class AbstractService extends dbService
{
    public function list(Request $request)
    {
        if( $request->del != 'Y' ){
            $lists = AbstractRegistration::orderBy('created_at','desc');
        }else{
            $lists = AbstractRegistration::onlyTrashed()->orderBy('created_at','desc');
        }
        
        foreach( $request->all() as $key => $val ){
            if( ( $key == 'rnum' || $key == 'ptype' || $key == 'country' || $key == 'status' || $key == 'subject' || $key == 'pname' || $key == 'cname' ) && $val ){
                if( $key == 'pname' ){
                    $lists->whereHas('authors', function($q) use($val){
                        $q->whereRaw("CONCAT(first_name,' ',last_name) LIKE '%".$val."%'")->where('presentation_author', 'Y');
                    });
                }else if( $key == 'cname' ){
                    $lists->whereHas('authors', function($q) use($val){
                        $q->whereRaw("CONCAT(first_name,' ',last_name) LIKE '%".$val."%'")->where('corresponding_author', 'Y');
                    });
                }else if( $key == 'country' ){
                    $lists->whereHas('authors', function($q) use($val){
                        $q->where('country', $val)->where('presentation_author', 'Y');
                    });
                }else{
                    $lists->where($key, 'LIKE', '%'.$val.'%');
                }
            }
        }

        if ($request->excel) {
            $cntQuery = clone $lists;
            return (new ExcelService())->RegistrationExcel($lists, $cntQuery->count());
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
        $data['period'] = AbstractPeriod::find(1);
        $data['country'] = (new Country())->countryList('KOR');

        return $data;
    }

    public function dbChange(Request $request)
    {   
        $this->transaction();

        try {

            if( $request->db == 'abstract_periods' ){

                $abstractPeriod = AbstractPeriod::find(decrypt($request->sid));
                $abstractPeriod[$request->field] = $request->value;
                $abstractPeriod->save();

                $msg = '관리자 초록등록 날짜 변경';

            }else{

                $abstract = AbstractRegistration::withTrashed()->find(decrypt($request->sid));

                if( $request->field == 'delete' ){
                    if( $request->value == 'Y' ){
                        $abstract->delete();
                        $msg = '관리자 초록등록 삭제';
                    }else{
                        $abstract->restore();
                        $msg = '관리자 초록등록 복구';
                    }
                    
                }else{
                    $abstract[$request->field] = $request->value;
                    $abstract->save();
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
        $abstract = AbstractRegistration::find(decrypt($request->sid));
        $data['apply'] = $abstract;

        return $data;
    }    

    public function memo(Request $request)
    {   
        $this->transaction();

        try {

            $abstract = AbstractRegistration::find(decrypt($request->sid));
            $abstract->memo = $request->memo;
            $abstract->save();

            $this->dbCommit('초록등록 메모 변경'); 
            
            return redirect()->back()->withSuccess('메모 저장이 완료되었습니다.')->with('close','Y');

        } catch (\Exception $e) {

            return $this->dbRollback($e);

        }
    }
}
