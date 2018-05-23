<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;

class Funcionarios extends Controller
{
    public function nuevo_funcionario()
    {

        $estados = DB::table('estados')
            ->where([
                ['nivelEstado', 'Funcionarios'],
                ['subnivelEstado', 'Nuevo'],
                ['estadoEstado', 'Activa']
            ])
            ->get();

        $tipos = DB::table('tipos')
            ->where([
                ['nivelTipo', 'Contrato'],
                ['subnivelTipo', 'Nuevo'],
                ['estadoTipo', 'Activa']
            ])
            ->get();

        $deptos = DB::table('departamentos')
            ->join('divisiones', 'divisiones.idDiv', '=', 'departamentos.divisiones_idDiv')
            ->where('estadoDepto', 'Activa')
            ->get();

        $funcionarios = DB::table('funcionarios')
            ->join('departamentos', 'departamentos.idDepto', '=', 'funcionarios.departamentos_idDepto')
            ->join('divisiones', 'divisiones.idDiv', '=', 'departamentos.divisiones_idDiv')
            ->join('estados', 'estados.idEstado', '=', 'funcionarios.estadoFunc')
            ->get();

        return view('back_end.funcionarios.nuevo',
            [
                'deptos' => $deptos,
                'estados' => $estados,
                'tipos' => $tipos,
                'funcionarios' => $funcionarios
            ]);
    }

    public function guardar_funcionario(Request $request)
    {

        $fecha = new DateTime;
        $rutFunc = $request->input('RutFunc');
        $paternoFunc = $request->input('PaternoFunc');
        $maternoFunc = $request->input('MaternoFunc');
        $nombresFunc = $request->input('NombreFunc');
        $correoFunc = $request->input('EmailFunc');
        $anexoFunc = $request->input('AnexoFunc');
        $fonoFunc = $request->input('TelefonoFunc');
        $tipoContratoFunc = $request->input('TipoContratoFunc');
        $estadoFunc = $request->input('EstadoFunc');
        $deptoFunc = $request->input('IdDepto');
        $campoNull = null;

        DB::table('funcionarios')->insert([
            'fecCreaFunc' => $fecha,
            'rutFunc' => $rutFunc,
            'paternoFunc' => $paternoFunc,
            'maternoFunc' => $maternoFunc,
            'nombresFunc' => $nombresFunc,
            'correoFunc' => $correoFunc,
            'anexoFunc' => $anexoFunc,
            'fonoFunc' => $fonoFunc,
            'fecBajaFunc' => $campoNull,
            'motivoBajaFunc' => $campoNull,
            'contratoFunc' => $tipoContratoFunc,
            'estadoFunc' => $estadoFunc,
            'departamentos_idDepto' => $deptoFunc
        ]);

    }

}
