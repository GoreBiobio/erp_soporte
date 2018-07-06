<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DB;

class Incidencias extends Controller
{

    public function nuevo_incidencia()
    {

        $tipos = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Incidencia'],
                ['subnivelTipo', 'Nuevo'],
                ['estadoTipo', 'Activa']
            ])
            ->orderBy('nombreTipo')
            ->get();

        $servicios = DB::table('tipos')
        ->where([
            ['nivelTipo', 'Incidencia'],
            ['subnivelTipo', 'Servicios'],
            ['estadoTipo', 'Activa']
        ])
        ->orderBy('nombreTipo')
        ->get();

        $incidencias = DB::table('incidencias')
            ->where('funcAprobIncid', '=', Auth::id())
            ->get();

        return view('back_end.incidencias.nuevo',[
            'tipos' => $tipos,
            'servicios' => $servicios,
            'incidencias' => $incidencias
        ]);

    }

    public function guardar_incidencia(Request $request){

        DB::table('incidencias')->insert([
            'fecIncid' => $request->input('fec_inc'),
            'horaIncid' => $request->input('hora_inc'),
            'detalleIncid' => $request->input('det_inc'),
            'obsIncid' => $request->input('obs_inc'),
            'fechaCierreIncid' => $request->input('fec_f_inc'),
            'horaCierreIncid' => $request->input('hora_f_inc'),
            'fechaAprobIncid' => null,
            'horaAprobIncid' => null,
            'funcAprobIncid' => $request->input('idInfo'),
            'tipoInc' => $request->input('tipo_inc'),
            'servAfectado' => $request->input('serv_afec'),
            'estadoIncid' => 'Activa'
        ]);

        return back();

    }

    public function cerrar_incidencia(Request $request){

        DB::table('incidencias')
            ->where('idIncid', $request->input('idInc'))
            ->update([
                'estadoIncid' => 'Superada',
                'fechaAprobIncid' => new datetime(),
                'horaAprobIncid' => new datetime()
            ]);

        return back();
    }


    public function ficha_incidencia(Request $request){

        $incidencias = DB::table('incidencias')
            ->where('idIncid','=',$request->input('idInc'))
            ->join('users','users.idFuncUser', 'incidencias.funcAprobIncid')
            ->first();

        return view('back_end.incidencias.ficha_incidencia',[
            'incidencias' => $incidencias
        ]);

    }
}
