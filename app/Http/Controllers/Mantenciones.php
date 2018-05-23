<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Mantenciones extends Controller
{
    public function nueva_mantencion(){


        $tipo_mantencion = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Mantencion'],
                ['subnivelTipo', 'Solicitud'],
                ['estadoTipo', 'Activa']
            ])
        ->get();

        $tipo_mantencion_b = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Mantencion'],
                ['subnivelTipo', 'Tipo'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        return view('back_end.mantenciones.nuevo',[
            'tipo_mant_a' => $tipo_mantencion,
            'tipo_mant_b' => $tipo_mantencion_b
        ]);

    }
}
