<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

        $soportes = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->where([
                ['funcRespoSolServ', '=', null],
                ['estadoSolServ', '=', '15']
            ])
            ->get();


        $soportes_h = DB::table('solicitudsoportes')
            ->join('tipos', 'tipos.idTipo', '=', 'solicitudsoportes.tipoSopD')
            ->join('estados', 'estados.idEstado', '=', 'solicitudsoportes.estadoSop')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where([
                ['funcRespoSop', '=', null],
                ['estadoSop', '=', '15']
            ])
            ->get();


        return view('adminlte::home',[
            'num_sop' => $num_sop,
            'num_mant' => $num_mant,
            'incidencias' => $incidencias,
            'listadoSop' => $soportes,
            'listadoSopHard' => $soportes_h,
        ]);
    }
}