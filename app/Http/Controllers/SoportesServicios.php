<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionProfesionalServicio;
use App\Mail\CierreProfesionalServicio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;
use DB;
use Illuminate\Support\Facades\Mail;

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

        $id_soporte = $request->input('idSolServ');

        $soporte = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('users', 'users.idFuncUser', 'solicitud_servicio.funcRespoSolServ')
            ->where('idSolServ', '=', $id_soporte)
            ->first();

        $mailData = array(
            'fecCreaSolServ' => $soporte->fecCreaSolServ,
            'name' => $soporte->name,
            'email' => $soporte->email,
            'solicitudServ' => $soporte->solicitudServ,
            'servicio' => $soporte->servicio,
            'nombreEstado' => $soporte->nombreEstado
        );

        Mail::to('informatica@gorebiobio.cl')
            ->cc($soporte->correoFunc)
            ->send(new AsignacionProfesionalServicio($mailData));

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

        $documentos = DB::table('documentos')
            ->join('solicitud_servicio', 'solicitud_servicio.idSolServ', '=', 'documentos.subnivelDoc')
            ->where('subnivelDoc', '=', $id_soporte)
            ->get();

        return view('back_end.soportesservicios.ficha_servicio', [
            'soporte' => $soporte,
            'forma' => $forma_soporte,
            'tipo_soporte' => $tipo_soporte,
            'documentos' => $documentos
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

        $id_soporte = $request->input('idSolServ');

        $soporte = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('users', 'users.idFuncUser', 'solicitud_servicio.funcRespoSolServ')
            ->where('idSolServ', '=', $id_soporte)
            ->first();

        $mailData = array(
            'fecCreaSolServ' => $soporte->fecCreaSolServ,
            'name' => $soporte->name,
            'email' => $soporte->email,
            'obsCierreSolServ' => $soporte->obsCierreSolServ,
            'servicio' => $soporte->servicio,
            'nombreEstado' => $soporte->nombreEstado
        );

        Mail::to('informatica@gorebiobio.cl')
            ->cc($soporte->correoFunc)
            ->send(new CierreProfesionalServicio($mailData));

        return redirect('/Soporte/GestionServicios');
    }

    public function jefatura_sw(){

        $soportes = DB::table('solicitud_servicio')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->where([
                ['funcAprobSolServ', '=', null],
                ['estadoSolServ', '<>', 14],
                ['estadoSolServ', '<>', 15],
                ['estadoSolServ', '<>', 16],
                ['estadoSolServ', '<>', 19],
                ['estadoSolServ', '<>', 20]

            ])
            ->get();

        return view('back_end.soportesservicios.jefatura', [
            'listadoSop' => $soportes,
        ]);

    }

    public function aprueba_jefatura(Request $request){

        $fecha = new DateTime;

        DB::table('solicitud_servicio')
            ->where('idSolServ', $request->input('idSolServ'))
            ->update([
                'fecAprobSolServ' => $fecha,
                'estadoSolServ' => 19
            ]);

        return back();
    }

}
