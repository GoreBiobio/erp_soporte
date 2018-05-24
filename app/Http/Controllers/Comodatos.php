<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Comodatos extends Controller
{

    public function enlazar_equipos(){

        $hard_disponible = DB::table('hardwares')
            ->where([
                ['comodatoHard', null],
                ['estadoHardNB', 'Liberado'],
            ])
            ->join('modelos', 'modelos.idModelo','=','hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca','=','modelos.marcas_idMarca')
            ->join('cajas','cajas.idCaja','=','hardwares.cajas_idCaja')
            ->join('secciones','secciones.idSecc','=','cajas.secciones_idSecc')
            ->join('bodegas','bodegas.idBod','=','secciones.bodegas_idBod')
            ->get();

        return view('back_end.comodatos.enlazarHard',[
            'h_d' => $hard_disponible
        ]);

    }

}
