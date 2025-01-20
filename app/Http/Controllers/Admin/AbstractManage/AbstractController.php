<?php

namespace App\Http\Controllers\Admin\AbstractManage;

use App\Http\Controllers\Controller;
use App\Services\Admin\AbstractManage\AbstractService;
use Illuminate\Http\Request;

class AbstractController extends Controller
{
    private $AbstractService;
    private $RegistrationUserService;

    public function __construct()
    {
        $this->AbstractService = new AbstractService();
        //$this->RegistrationUserService = new RegistrationUserService();
    }

    public function list(Request $request)
    {
        return view('admin.abstract.list')->with( $this->AbstractService->list($request) );
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
}
