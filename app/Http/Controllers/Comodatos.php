<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use datetime;
use DB;

class Comodatos extends Controller
{

    public function enlazar_equipos()
    {

        $hard_disponible = DB::table('hardwares')
            ->where([
                ['comodatoHard', null],
                ['estadoHardNB', 'Liberado'],
            ])
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('cajas', 'cajas.idCaja', '=', 'hardwares.cajas_idCaja')
            ->join('secciones', 'secciones.idSecc', '=', 'cajas.secciones_idSecc')
            ->join('bodegas', 'bodegas.idBod', '=', 'secciones.bodegas_idBod')
            ->get();

        return view('back_end.comodatos.enlazarHard', [
            'h_d' => $hard_disponible
        ]);
    }

    public function enlazar_equipos_pasouno(Request $request)
    {

        $idHardware = $request->input('idHard');

        $funcionarios = DB::table('funcionarios')
            ->where('motivoBajaFunc', '=', null)
            ->OrderBy('paternoFunc')
            ->get();

        $ficha_hard = DB::table('hardwares')
            ->where('idHard', '=', $idHardware)
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('cajas', 'cajas.idCaja', '=', 'hardwares.cajas_idCaja')
            ->join('secciones', 'secciones.idSecc', '=', 'cajas.secciones_idSecc')
            ->join('bodegas', 'bodegas.idBod', '=', 'secciones.bodegas_idBod')
            ->first();

        $comodatos = DB::table('comodatos')
            ->where('hardwares_idHard', '=', $idHardware)
            ->join('funcionarios', 'funcionarios.idFunc', 'comodatos.funcRecibeComod')
            ->join('users', 'users.idFuncUser', 'comodatos.funcEntregaComod')
            ->get();

        return view('back_end.comodatos.fichaHardware', [
            'fic_hard' => $ficha_hard,
            'com' => $comodatos,
            'func' => $funcionarios
        ]);

    }

    public function guardar_nuevo(Request $request)
    {

        $fecCarga = new DateTime;
        $fecDevol = $request->input('FecDevol');
        $ubiqEq = $request->input('UbicEqui');
        $funcRecCom = $request->input('idFuncRec');
        $funcEntCom = $request->input('idInfo');
        $estadoCom = 'Activo';
        $estadAntEqCom = $request->input('estadoAntEq');
        $estadoEqCom = 'Usado';
        $tipoCom = null;
        $idHardware = $request->input('idHard');

        DB::table('comodatos')->insert([
            'fechaIngComod' => $fecCarga,
            'fechaDevEstComod' => $fecDevol,
            'ubicacionEquiposComod' => $ubiqEq,
            'funcRecibeComod' => $funcRecCom,
            'funcEntregaComod' => $funcEntCom,
            'estadoComod' => $estadoCom,
            'estadoEqComod' => $estadAntEqCom . '-' . $estadoEqCom,
            'tipoUsoComod' => $tipoCom,
            'hardwares_idHard' => $idHardware
        ]);

        // Cambia el estado del Hardware a En Comodato.
        DB::table('hardwares')
            ->where('idHard', $idHardware)
            ->update([
                'estadoHardNB' => 'En Comodato'
            ]);



        return $this->enlazar_equipos();

    }

}
