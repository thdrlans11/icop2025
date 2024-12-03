<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        view()->share([
            'mainNum' => '2'
        ]);
    }

    public function speakers()
    {
        return view('program.speakers')->with(['subNum' => '3']);
    }

    public function symposia()
    {
        return view('program.symposia')->with(['subNum' => '4']);
    }

}
