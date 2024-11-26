<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        view()->share([
            'mainNum' => '1'
        ]);
    }

    public function overview()
    {
        return view('about.overview')->with(['subNum' => '1']);
    }

    public function welcome()
    {
        return view('about.welcome')->with(['subNum' => '2']);
    }

    public function society()
    {
        return view('about.society')->with(['subNum' => '3']);
    }

    public function committee()
    {
        return view('about.committee')->with(['subNum' => '4']);
    }

    public function contact()
    {
        return view('about.contact')->with(['subNum' => '6']);
    }
}
