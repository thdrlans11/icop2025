<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        view()->share([
            'mainNum' => '5'
        ]);
    }

    public function venue()
    {
        return view('location.venue')->with(['subNum' => '1']);
    }

    public function map()
    {
        return view('location.map')->with(['subNum' => '2']);
    }

    public function accommodation()
    {
        return view('location.accommodation')->with(['subNum' => '3']);
    }

    public function restaurant()
    {
        return view('location.restaurant')->with(['subNum' => '4']);
    }
}
