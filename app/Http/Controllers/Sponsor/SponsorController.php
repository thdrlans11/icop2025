<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;

class SponsorController extends Controller
{
    public function __construct()
    {
        view()->share([
            'mainNum' => '6'
        ]);
    }

    public function info()
    {
        return view('sponsor.info')->with(['subNum' => '2']);
    }

    public function ship()
    {
        return view('sponsor.ship')->with(['subNum' => '1']);
    }
}
