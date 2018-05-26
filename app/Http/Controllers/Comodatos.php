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

    public function enlazar_equipos_pasouno(Request $request){

        $idHardware = $request->input('idHard');

        $ficha_hard = DB::table('hardwares')
            ->where('idHard','=', $idHardware)
            ->join('modelos', 'modelos.idModelo','=','hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca','=','modelos.marcas_idMarca')
            ->join('cajas','cajas.idCaja','=','hardwares.cajas_idCaja')
            ->join('secciones','secciones.idSecc','=','cajas.secciones_idSecc')
            ->join('bodegas','bodegas.idBod','=','secciones.bodegas_idBod')
            ->first();

        $comodatos = DB::table('comodatos')
            ->where('hardwares_idHard','=', $idHardware)
            ->get();

        return view('back_end.comodatos.fichaHardware',[
            'fic_hard' => $ficha_hard,
            'com' => $comodatos
        ]);

    }

}
