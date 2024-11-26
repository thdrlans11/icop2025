<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Services\Registration\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    private $RegistrationService;

    public function __construct()
    {
            
        $this->RegistrationService = new RegistrationService();

        view()->share([
            'mainNum' => '4'
        ]);
    }

    public function guide()
    {
        return view('registration.guide')->with(['subNum'=>'1']);
    }

    public function registration(Request $request)
    {
        return $this->RegistrationService->registration($request);
    }
    
    public function emailCheck(Request $request)
    {
        return $this->RegistrationService->emailCheck($request);
    }

    public function makePrice(Request $request)
    {
        return $this->RegistrationService->makePrice($request);
    }

    public function upsert(Request $request)
    {
        if( $request->step == '1' ){
            return $this->RegistrationService->upsert_01($request);
        }else if( $request->step == '2' ){
            return $this->RegistrationService->upsert_02($request);
        }else if( $request->step == '3' ){
            return $this->RegistrationService->upsert_03($request);
        }
    }

    public function receipt(Request $request)
    {
        return view('registration.receipt')->with( $this->RegistrationService->receipt($request) );
    }

    public function search()
    {
        return view('registration.search')->with( $this->RegistrationService->search());
    }

    public function searchResult(Request $request)
    {
        return $this->RegistrationService->searchResult($request);
    }
}
