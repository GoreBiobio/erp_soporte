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

        $mis_soportes = DB::table('solicitudsoportes')
            ->join('tipos', 'tipos.idTipo', '=', 'solicitudsoportes.tipoSopD')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where('funcRespoSop', '=', Auth::user()->idFuncUser)
            ->get();

        return view('back_end.soportes.nuevo', [
            'funcionarios' => $funcionarios,
            'tipo_sop_a' => $tipo_soporte,
            'tipo_sop_b' => $tipo_soporte_b,
            'tipo_sop_c' => $tipo_soporte_c,
            'tipo_sop_d' => $tipo_soporte_d,
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

        $soportes = DB::table('solicitudsoportes')
            ->join('tipos', 'tipos.idTipo', '=', 'solicitudsoportes.tipoSopD')
            ->join('estados', 'estados.idEstado', '=', 'solicitudsoportes.estadoSop')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where('funcRespoSop', '=', null)
            ->get();

        $sop_pend = DB::table('solicitudsoportes')
            ->join('tipos', 'tipos.idTipo', '=', 'solicitudsoportes.tipoSopD')
            ->join('estados', 'estados.idEstado', '=', 'solicitudsoportes.estadoSop')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where([
                ['funcRespoSop', '=', Auth::user()->idFuncUser],
                ['estadoSop', '<>', 'Cerrado']
            ])
            ->get();

        return view('back_end.soportes.gestion', [
            'listadoSop' => $soportes,
            'sop_pend' => $sop_pend
        ]);

    }

    public function archivo_soporte()
    {

        $sop_arc = DB::table('solicitudsoportes')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where([
                ['funcRespoSop', '=', Auth::user()->idFuncUser],
                ['estadoSop', '=', 'Cerrado'],
            ])
            ->get();

        return view('back_end.soportes.archivo', [
            'sop_arc' => $sop_arc
        ]);

    }

    public function ficha_soporte(Request $request)
    {

        $id_soporte = $request->input('idSoporte');

        $forma_soporte = DB::table('tipos')
            ->where([
                ['nivelTipo', '=', 'Soporte'],
                ['subnivelTipo', '=', 'Tipo'],
                ['estadoTipo', '=', 'Activa'],
            ])
            ->get();

        $tipo_soporte = DB::table('tipos')
            ->where([
                ['nivelTipo', '=', 'Soporte'],
                ['subnivelTipo', '=', 'Forma'],
                ['estadoTipo', '=', 'Activa'],
            ])
            ->get();

        $soporte = DB::table('solicitudsoportes')
            ->join('funcionarios', 'funcionarios.idFunc', 'solicitudsoportes.funcSolicSop')
            ->join('tipos', 'tipos.idTipo', '=', 'solicitudsoportes.tipoSopD')
            ->join('estados', 'estados.idEstado', '=', 'solicitudsoportes.estadoSop')
            ->join('hardwares', 'idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'idMarca', '=', 'modelos.marcas_idMarca')
            // ->join('users', 'users.idFuncUser', 'solicitudsoportes.funcRespoSop')
            ->where('idSolSop', '=', $id_soporte)
            ->first();

        return view('back_end.soportes.ficha_soporte', [
            'soporte' => $soporte,
            'forma' => $forma_soporte,
            'tipo_soporte' => $tipo_soporte
        ]);

    }

    public function tomar(Request $request)
    {

        DB::table('solicitudsoportes')
            ->where('idSolSop', $request->input('idSoporte'))
            ->update([
                'funcRespoSop' => Auth::user()->idFuncUser,
                'estadoSop' => 16

            ]);

        return redirect('/Soporte/Gestion');
    }

    public function motivo(Request $request)
    {

        DB::table('solicitudsoportes')
            ->where('idSolSop', $request->input('idSoporte'))
            ->update([
                'tipoSopB' => $request->input('motivo')
            ]);

        return redirect('/Soporte/Gestion');
    }

    public function forma(Request $request)
    {

        DB::table('solicitudsoportes')
            ->where('idSolSop', $request->input('idSoporte'))
            ->update([
                'tipoSopC' => $request->input('forma')
            ]);

        return redirect('/Soporte/Gestion');
    }

    public function observaciones(Request $request)
    {

        DB::table('solicitudsoportes')
            ->where('idSolSop', $request->input('idSoporte'))
            ->update([
                'obsSoftSop' => $request->input('ObsSop')
            ]);

        return redirect('/Soporte/Gestion');

    }

    public function observacionescierre(Request $request)
    {

        DB::table('solicitudsoportes')
            ->where('idSolSop', $request->input('idSoporte'))
            ->update([
                'obsCierreSop' => $request->input('ObsSopCierre')
            ]);

        return redirect('/Soporte/Gestion');

    }

    public function cerrar(Request $request)
    {
        $fecha = new DateTime;

        DB::table('solicitudsoportes')
            ->where('idSolSop', $request->input('idSop'))
            ->update([
                'fecCierreSop' => $fecha,
                'estadoSop' => 17
            ]);

        return redirect('/Soporte/Gestion');
    }
}
