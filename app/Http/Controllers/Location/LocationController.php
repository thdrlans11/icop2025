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
}
