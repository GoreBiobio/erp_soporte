<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Soportes extends Controller
{
    public function nuevo_soporte(){


        $funcionarios = DB::table('funcionarios')
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

        $estado_soporte = DB::table('estados')
            ->where([
                ['nivelEstado', 'Soporte'],
                ['subnivelEstado', 'Nivel'],
                ['estadoEstado', 'Activa']
            ])
            ->get();

        $estado_soporte_b = DB::table('estados')
            ->where([
                ['nivelEstado', 'Soporte'],
                ['subnivelEstado', 'Interno'],
                ['estadoEstado', 'Activa']
            ])
            ->get();

        return view('back_end.soportes.nuevo',[
            'funcionarios' => $funcionarios,
            'tipo_sop_a' => $tipo_soporte,
            'tipo_sop_b' => $tipo_soporte_b,
            'tipo_sop_c' => $tipo_soporte_c,
            'estado_sop_a' => $estado_soporte,
            'estado_sop_b' => $estado_soporte_b
        ]);

    }
}
