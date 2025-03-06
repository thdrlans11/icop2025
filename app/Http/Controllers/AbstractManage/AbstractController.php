<?php

namespace App\Http\Controllers\AbstractManage;

use App\Http\Controllers\Controller;
use App\Services\AbstractManage\AbstractService;
use Illuminate\Http\Request;

class AbstractController extends Controller
{
    private $AbstractService;

    public function __construct()
    {
        $this->AbstractService = new AbstractService();

        view()->share([
            'mainNum' => '3'
        ]);
    }

    public function guide()
    {
        return view('abstract.guide')->with(['subNum'=>'1']);
    }

    public function registration(Request $request)
    {
        return $this->AbstractService->registration($request);
    }

    public function upsert(Request $request)
    {
        if( $request->step == '1' ){
            return $this->AbstractService->upsert_01($request);
        }else if( $request->step == '2' ){
            return $this->AbstractService->upsert_02($request);
        }
    }

    public function search()
    {
        return view('abstract.search')->with( $this->AbstractService->search());
    }

    public function searchResult(Request $request)
    {
        return $this->AbstractService->searchResult($request);
    }

    public function delete(Request $request)
    {
        return $this->AbstractService->delete($request);
    }

    public function preview(Request $request)
    {
        return $this->AbstractService->preview($request);
    }

    public function awards()
    {
        return view('abstract.awards')->with(['subNum'=>'5']);
    }
   
}
