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
                ['estadoSolServ', '=', '16']
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

}
