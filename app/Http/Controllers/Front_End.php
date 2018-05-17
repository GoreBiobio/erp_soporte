<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Front_End extends Controller
{
    public function home(){

        return view('front_end.home.index');

    }
}
