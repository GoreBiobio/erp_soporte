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

    public function enlazar_software()
    {

        $soft_disponible = DB::table('softwares')
            ->where([
                ['comodatoSoft', null],
            ])
            ->join('tipos','tipos.idTipo','softwares.tipoBSoft')
            ->get();

        return view('back_end.comodatos.enlazarSoft', [
            's_w' => $soft_disponible
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

    public function enlazar_software_pasouno(Request $request)
    {

        $idSoftware = $request->input('idSoft');

        $funcionarios = DB::table('funcionarios')
            ->where('motivoBajaFunc', '=', null)
            ->OrderBy('paternoFunc')
            ->get();

        $ficha_soft = DB::table('softwares')
            ->where('idSoft', '=', $idSoftware)
            ->first();

        return view('back_end.comodatos.fichaSoftware', [
            'fic_soft' => $ficha_soft,
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
            'fechaDevolComod' => $fecDevol,
            'ubicacionEquiposComod' => $ubiqEq,
            'funcRecibeComod' => $funcRecCom,
            'funcEntregaComod' => $funcEntCom,
            'estadoComod' => $estadoCom,
            'estadoEqComod' => $estadAntEqCom . '-' . $estadoEqCom,
            'tipoUsoComod' => $tipoCom,
            'hardwares_idHard' => $idHardware
        ]);

        // Cambia el estado del Hardware a En Comodato y cambia el estado de hardware a Usado.
        DB::table('hardwares')
            ->where('idHard', $idHardware)
            ->update([
                'estadoHardNA' => 'Usado',
                'estadoHardNB' => 'En Comodato'
            ]);

        return $this->enlazar_equipos();
    }

    public function archivar_comodato(Request $request)
    {

        $fecAhora = new DateTime;
        $idHardware = $request->input('idHard');
        $idComodato = $request->input('idCom');

        // Cambia el estado del Comodato a Archivo y pone la fecha de devolución al Gore.

        DB::table('comodatos')
            ->where('idComod', '=', $idComodato)
            ->update([
               'fechaDevolComod' => $fecAhora,
                'estadoComod' => 'Archivo'
            ]);

        // Cambia el estado del Hardware a En Comodato y cambia el estado de hardware a Usado.
        DB::table('hardwares')
            ->where('idHard', $idHardware)
            ->update([
                'estadoHardNB' => 'Liberado',
                'cajas_idCaja' => 1
            ]);

        return $this->enlazar_equipos();
    }

    public function guardar_nuevo_sw(Request $request)
    {



    }


    public function auditar()
    {

        $usos = DB::table('estados')
            ->where([
                ['nivelEstado', 'Hardware'],
                ['subnivelEstado', 'NuevoB'],
                ['estadoEstado', 'Activa']
            ])
            ->OrderBy('nombreEstado')
            ->get();

        $funcionarios = DB::table('funcionarios')
            ->OrderBy('paternoFunc')
            ->get();


        return view('back_end.comodatos.auditar', [
            'usos' => $usos,
            'funcionarios' => $funcionarios
        ]);
    }

    public function por_funcionario(Request $request)
    {

        $idFuncionario = $request->input('VerFuncionarios');

        $comodatos = DB::table('comodatos')
            ->where('funcRecibeComod', $idFuncionario)
            ->join('hardwares', 'hardwares.idHard', 'comodatos.hardwares_idHard')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->get();

        return view('back_end.comodatos.por_funcionarios', [
            'comodatos' => $comodatos
        ]);

    }

}
