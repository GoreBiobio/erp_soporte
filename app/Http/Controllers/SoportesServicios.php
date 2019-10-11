<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;
use DB;

class SoportesServicios extends Controller
{

    public function gestion_soporte()
    {

        $soportes = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->where([
                ['funcRespoSolServ', '=', null],
                ['estadoSolServ', '=', '15']
            ])
            ->get();

        $sop_pend = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->where([
                ['funcRespoSolServ', '=', Auth::user()->idFuncUser],
                ['estadoSolServ', '<>', '19'],
                ['estadoSolServ', '<>', '20']
            ])
            ->get();

        return view('back_end.soportesservicios.gestion', [
            'listadoSop' => $soportes,
            'sop_pend' => $sop_pend
        ]);
    }

    public function tomar(Request $request)
    {

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'funcRespoSolServ' => Auth::user()->idFuncUser,
                'estadoSolServ' => 16
            ]);

        return redirect('/Soporte/GestionServicios');
    }

    public function ficha_soporte(Request $request)
    {

        $id_soporte = $request->input('idSolServ');

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

        $soporte = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->where('idSolServ', '=', $id_soporte)
            ->first();

        return view('back_end.soportesservicios.ficha_servicio', [
            'soporte' => $soporte,
            'forma' => $forma_soporte,
            'tipo_soporte' => $tipo_soporte
        ]);

    }

    public function motivo(Request $request)
    {

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'tipoSolServB' => $request->input('motivo')
            ]);

        return redirect('/Soporte/GestionServicios');
    }

    public function forma(Request $request)
    {

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'tipoSolServC' => $request->input('forma')
            ]);

        return redirect('/Soporte/GestionServicios');
    }

    public function observaciones(Request $request)
    {

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'obsSolServ' => $request->input('ObsSopServ')
            ]);

        return redirect('/Soporte/GestionServicios');

    }

    public function observacionescierre(Request $request)
    {

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'obsCierreSolServ' => $request->input('ObsSopCierre')
            ]);

        return redirect('/Soporte/GestionServicios');

    }

    public function cerrar(Request $request)
    {
        $fecha = new DateTime;

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'fecCierreSolServ' => $fecha,
                'estadoSolServ' => 17
            ]);

        return redirect('/Soporte/GestionServicios');
    }

}
