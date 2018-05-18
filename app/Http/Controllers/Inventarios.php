<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Inventarios extends Controller
{
    public function nuevo_inventario(){

        $tipos = DB::table('tipos')
            ->where([
            ['nivelTipo', 'Hardware'],
            ['subnivelTipo', 'Nuevo'],
            ['estadoTipo', 'Activa']
        ])
            ->get();

        $ubicaciones = DB::table('cajas')
            ->join('secciones', 'secciones.idSecc','=','cajas.secciones_idSecc')
            ->join('bodegas', 'bodegas.idBod','=','secciones.bodegas_idBod')
            ->where('estadoCaja','=','Activa')
            ->get();

        $e_a = DB::table('estados')
            ->where([
                ['nivelEstado', 'Hardware'],
                ['subnivelEstado', 'Nuevo'],
                ['estadoEstado', 'Activa']
            ])
            ->get();

        $e_b = DB::table('estados')
            ->where([
                ['nivelEstado', 'Hardware'],
                ['subnivelEstado', 'NuevoB'],
                ['estadoEstado', 'Activa']
            ])
            ->get();

        $marcas_modelos = DB::table('modelos')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->where('estadoModelo', 'Activa')
            ->get();

        return view('back_end.inventarios.nuevo',
            [
                'm_m' => $marcas_modelos,
                'tipos' => $tipos,
                'e_a' => $e_a,
                'e_b' => $e_b,
                'ubic' => $ubicaciones
            ]);
    }
}
