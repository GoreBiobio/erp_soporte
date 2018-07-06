<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $num_sop = DB::table('solicitudsoportes')
            ->where('estadoSop','<>','Cerrado')
            ->count();

        $num_mant = DB::table('solicitudmantenciones')
            ->where('estadoMant','<>','Cerrado')
            ->count();

        $incidencias = DB::table('incidencias')
            ->join('users', 'users.idFuncUser','incidencias.funcAprobIncid')
            ->where('estadoIncid','=','Activa')
            ->get();

        return view('adminlte::home',[
            'num_sop' => $num_sop,
            'num_mant' => $num_mant,
            'incidencias' => $incidencias
        ]);
    }
}