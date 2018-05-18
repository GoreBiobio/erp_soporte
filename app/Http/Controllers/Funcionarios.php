<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
