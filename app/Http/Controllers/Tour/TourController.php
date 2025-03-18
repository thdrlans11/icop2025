<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function __construct()
    {
        view()->share([
            'mainNum' => '7'
        ]);
    }

    public function trip()
    {
        return view('tour.trip')->with(['subNum' => '1']);
    }
    public function dailyProgram()
    {
        return view('tour.dailyProgram')->with(['subNum' => '2']);
    }
}
