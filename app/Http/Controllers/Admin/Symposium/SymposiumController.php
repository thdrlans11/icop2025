<?php

namespace App\Http\Controllers\Admin\Symposium;

use App\Http\Controllers\Controller;
use App\Services\Admin\Symposium\SymposiumService;
use App\Services\Symposium\SymposiumService as SymposiumUserService;
use Illuminate\Http\Request;

class SymposiumController extends Controller
{
    private $SymposiumService;
    private $SymposiumUserService;

    public function __construct()
    {
        $this->SymposiumService = new SymposiumService();
        $this->SymposiumUserService = new SymposiumUserService();
    }

    public function list(Request $request)
    {
        return view('admin.symposium.list')->with( $this->SymposiumService->list($request) );
    }

    public function modifyForm(Request $request)
    {
        return view('admin.symposium.form')->with( $this->SymposiumService->modifyForm($request) );
    }

    public function modify(Request $request)
    {
        if( $request->step == '1' ){
            return $this->SymposiumUserService->upsert_01($request);
        }else if( $request->step == '2' ){
            return $this->SymposiumUserService->upsert_02($request);
        }
    }

    public function sendMailForm(Request $request)
    {
        return view('admin.symposium.mail')->with( $this->SymposiumService->sendMailForm($request) );
    }

    public function sendMail(Request $request)
    {
        return $this->SymposiumService->sendMail($request);
    }
    
    public function excel(Request $request)
    {
        $request->merge(['excel' => true]);
        return $this->SymposiumService->list($request);
    }

    public function dbChange(Request $request)
    {
        return $this->SymposiumService->dbChange($request);
    }
}
