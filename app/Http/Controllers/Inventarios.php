<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;

class Inventarios extends Controller
{
    public function nuevo_hardware()
    {

        $tipos = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Hardware'],
                ['subnivelTipo', 'Nuevo'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $ubicaciones = DB::table('cajas')
            ->join('secciones', 'secciones.idSecc', '=', 'cajas.secciones_idSecc')
            ->join('bodegas', 'bodegas.idBod', '=', 'secciones.bodegas_idBod')
            ->where('estadoCaja', '=', 'Activa')
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

        $hard_disponible = DB::table('hardwares')
            ->where('estadoHardNB', 'Liberado')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('cajas', 'cajas.idCaja', '=', 'hardwares.cajas_idCaja')
            ->join('secciones', 'secciones.idSecc', '=', 'cajas.secciones_idSecc')
            ->join('bodegas', 'bodegas.idBod', '=', 'secciones.bodegas_idBod')
            ->get();

        return view('back_end.inventarios.hardware',
            [
                'm_m' => $marcas_modelos,
                'tipos' => $tipos,
                'e_a' => $e_a,
                'e_b' => $e_b,
                'ubic' => $ubicaciones,
                'hard_d' => $hard_disponible
            ]);
    }

    public function nuevo_software()
    {

        $tipo_sw_a = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Software'],
                ['subnivelTipo', 'Nuevo'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $tipo_sw_b = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Software'],
                ['subnivelTipo', 'Uso'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $tipo_sw_c = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Software'],
                ['subnivelTipo', 'Interno'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        return view('back_end.inventarios.software', [
            'licSW' => $tipo_sw_a,
            'usoSW' => $tipo_sw_b,
            'intSW' => $tipo_sw_c
        ]);
    }

    public function guardar_hardware(Request $request)
    {

        $fecha = new DateTime;
        $FolioInv = $request->input('FolioInv');
        $NomHard = $request->input('NomHard');
        $NumSerie = $request->input('NumSerie');
        $ImeiHard = $request->input('ImeiHard');
        $CapHard = $request->input('CapHard');
        $RamHard = $request->input('RamHard');
        $ProcHard = $request->input('ProcHard');
        $NumFono = $request->input('NumFono');
        $IpHard = $request->input('IpHard');
        $MacHard = $request->input('MacHard');
        $EstActHard = $request->input('EstActHard');
        $EstInihard = $request->input('EstInihard');
        $IdModelo = $request->input('IdModelo');
        $TipoHard = $request->input('TipoHard');
        $UbiqHard = $request->input('UbiqHard');
        $ObsHard = $request->input('ObsHard');
        $campoNull = null;

        DB::table('hardwares')->insert([
            'fecCargaHard' => $fecha,
            'fol_invHard' => $FolioInv,
            'nombreHard' => $NomHard,
            'numSerieHard' => $NumSerie,
            'imeiHard' => $ImeiHard,
            'capacidadHard' => $CapHard,
            'ramHard' => $RamHard,
            'procesadorHard' => $ProcHard,
            'obsHard' => $ObsHard,
            'numTelHard' => $NumFono,
            'ipHard' => $IpHard,
            'comodatoHard' => $campoNull,
            'macHard' => $MacHard,
            'fecBajaHard' => $campoNull,
            'estadoHardNA' => $EstActHard,
            'estadoHardNB' => $EstInihard,
            'tipoHard' => $TipoHard,
            'facturas_idFac' => 1,
            'cajas_idCaja' => $UbiqHard,
            'modelos_idModelo' => $IdModelo
        ]);
    }

    public function guardar_software(Request $request)
    {

        $fecha = new DateTime;
        $nomSoft = $request->input('NomSoft');
        $obsSoft = $request->input('ObsSoft');
        $fecCad = $request->input('fecCadSoft');
        $tipoA = $request->input('LicSw');
        $tipoB = $request->input('UsoSoft');
        $tipoC = $request->input('TipoSoft');
        $campoNull = null;

        DB::table('softwares')->insert([
            'fecCargaSoft' => $fecha,
            'nombreSoft' => $nomSoft,
            'obsSoft' => $obsSoft,
            'comodatoSoft' => $campoNull,
            'fecCadLicSoft' => $fecCad,
            'tipoASoft' => $tipoA,
            'tipoBSoft' => $tipoB,
            'tipoCSoft' => $tipoC,
            'estadoSoft' => $campoNull
        ]);

        return back();
    }

}
