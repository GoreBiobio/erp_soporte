<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;
use DB;

class Soportes extends Controller
{
    public function nuevo_soporte()
    {

        $funcionarios = DB::table('funcionarios')
            ->orderBy('paternoFunc', 'asc')
            ->get();

        $tipo_soporte = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Soporte'],
                ['subnivelTipo', 'Solicitud'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $tipo_soporte_b = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Soporte'],
                ['subnivelTipo', 'Tipo'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $tipo_soporte_c = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Soporte'],
                ['subnivelTipo', 'Forma'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $tipo_soporte_d = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Soporte'],
                ['subnivelTipo', 'Nivel'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $estado_soporte = DB::table('estados')
            ->where([
                ['nivelEstado', 'Soporte'],
                ['subnivelEstado', 'Interno'],
                ['estadoEstado', 'Activa']
            ])
            ->get();

        $mis_soportes = DB::table('solicitudSoportes')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudSoportes.funcSolicSop')
            ->where('funcRespoSop','=', Auth::user()->idFuncUser)
            ->get();

        return view('back_end.soportes.nuevo', [
            'funcionarios' => $funcionarios,
            'tipo_sop_a' => $tipo_soporte,
            'tipo_sop_b' => $tipo_soporte_b,
            'tipo_sop_c' => $tipo_soporte_c,
            'tipo_sop_d' => $tipo_soporte_d,
            'estado_sop' => $estado_soporte,
            'm_sop' => $mis_soportes
        ]);

    }

    public function guardar_soporte(Request $request)
    {

        $fecha = new DateTime;
        $idUsuario = $request->input('idUsuario');
        $idEquipo = $request->input('idEquipo');
        $TSA = $request->input('TSA');
        $TSB = $request->input('TSB');
        $TSC = $request->input('TSC');
        $TSD = $request->input('TSD');
        $ESB = $request->input('ESB');
        $idInfo = $request->input('idInfo');
        $DetSol = $request->input('DetSol');
        $ObsSol = $request->input('ObsSol');
        $campoNull = null;


        DB::table('solicitudSoportes')->insert([
            'fecCreaSop' => $fecha,
            'solicitudSop' => $DetSol,
            'hardSop' => $idEquipo,
            'obsSoftSop' => $ObsSol,
            'tipoSopA' => $TSA,
            'tipoSopB' => $TSB,
            'tipoSopC' => $TSC,
            'tipoSopD' => $TSD,
            'funcSolicSop' => $idUsuario,
            'funcRespoSop' => $idInfo,
            'estadoSop' => $ESB
        ]);

        return back();
    }

    public function gestion_soporte()
    {

        $soportes =  $soportes = DB::table('solicitudSoportes')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudSoportes.funcSolicSop')
            ->where('funcRespoSop','=',null)
            ->get();

        return view('back_end.soportes.gestion', [
            'listadoSop' => $soportes
        ]);

    }

}
