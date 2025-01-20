<?php

namespace App\Http\Controllers\Admin\AbstractManage;

use App\Http\Controllers\Controller;
use App\Services\Admin\AbstractManage\AbstractService;
use App\Services\AbstractManage\AbstractService as AbstractUserService; 
use Illuminate\Http\Request;

class AbstractController extends Controller
{
    private $AbstractService;
    private $AbstractUserService;

    public function __construct()
    {
        $this->AbstractService = new AbstractService();
        $this->AbstractUserService = new AbstractUserService();
    }

    public function list(Request $request)
    {
        return view('admin.abstract.list')->with( $this->AbstractService->list($request) );
    }

    public function modifyForm(Request $request)
    {
        return view('admin.abstract.form')->with( $this->AbstractService->modifyForm($request) );
    }

    public function modify(Request $request)
    {
        if( $request->step == '1' ){
            return $this->AbstractUserService->upsert_01($request);
        }
    }

    public function sendMailForm(Request $request)
    {
        return view('admin.abstract.mail')->with( $this->AbstractService->sendMailForm($request) );
    }

    public function sendMail(Request $request)
    {
        return $this->AbstractService->sendMail($request);
    }

    public function dbChange(Request $request)
    {
        return $this->AbstractService->dbChange($request);
    }

    public function memoForm(Request $request)
    {
        return view('admin.abstract.memo')->with( $this->AbstractService->memoForm($request) );
    }

    public function memo(Request $request)
    {
        return $this->AbstractService->memo($request);
    }

    public function excel(Request $request)
    {
        $request->merge(['excel' => true]);
        return $this->AbstractService->list($request);
    }
}
