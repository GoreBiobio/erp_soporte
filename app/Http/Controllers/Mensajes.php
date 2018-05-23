<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Mensajes extends Controller
{
    public function ver(){

        $mensajes = DB::table('mensajes')
        ->get();

        return view('back_end.mensajes.ver',[
            'msjes' => $mensajes
        ]);

    }
}
