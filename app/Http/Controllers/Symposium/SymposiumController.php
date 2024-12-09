<?php

namespace App\Http\Controllers\Symposium;

use App\Http\Controllers\Controller;
use App\Services\Symposium\SymposiumService;
use Illuminate\Http\Request;

class SymposiumController extends Controller
{
    private $SymposiumService;

    public function __construct()
    {
        $this->SymposiumService = new SymposiumService();

        view()->share([
            'mainNum' => '2',
            'subNum' => '4'
        ]);
    }

    public function registration(Request $request)
    {
        return $this->SymposiumService->registration($request);
    }

    public function emailCheck(Request $request)
    {
        return $this->SymposiumService->emailCheck($request);
    }

    public function upsert(Request $request)
    {
        if( $request->step == '1' ){
            return $this->SymposiumService->upsert_01($request);
        }else if( $request->step == '2' ){
            return $this->SymposiumService->upsert_02($request);
        }
    }
}
