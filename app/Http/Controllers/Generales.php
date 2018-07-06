<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Generales extends Controller
{

    public function proximamente()
    {

        return view('back_end.generales.proximamente');

    }
}
