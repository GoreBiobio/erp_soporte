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
        try {
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
            $jefatura = $request->input('jefatura');
            if ($jefatura == 'jefatura') {
                $jefatura = 'SI';
            } else {
                $jefatura = 'NO';
            }
            $deptoFunc = $request->input('IdDepto');

            DB::table('funcionarios')->insert([
                'fecCreaFunc' => $fecha,
                'rutFunc' => $rutFunc,
                'paternoFunc' => $paternoFunc,
                'maternoFunc' => $maternoFunc,
                'nombresFunc' => $nombresFunc,
                'correoFunc' => $correoFunc,
                'anexoFunc' => $anexoFunc,
                'fonoFunc' => $fonoFunc,
                'contratoFunc' => $tipoContratoFunc,
                'estadoFunc' => $estadoFunc,
                'jefatura' => $jefatura,
                'departamentos_idDepto' => $deptoFunc
            ]);

            return redirect('/Funcionarios/Nuevo')->with('status', '¡Usuario Agregado!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/Funcionarios/Nuevo')->with('error', '¡Error, No se pudo agregar el nuevo usuario, verifique el el funcionario no se encuentre ya ingresado!');
        }
    }

    public function ficha_funcionario(Request $request)
    {

        $id = $request->input('idFuncionario');

        $func = DB::table('funcionarios')
            ->where('idFunc','=', $id)
            ->first();

        $comodatos = DB::table('comodatos')
            ->where('funcRecibeComod', '=', $id)
            ->join('users', 'users.idFuncUser', 'comodatos.funcEntregaComod')
            ->join('hardwares', 'hardwares.idHard','comodatos.hardwares_idHard')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->get();

        $soportes = DB::table('solicitudsoportes')
            ->where('funcSolicSop', '=', $id)
            ->join('hardwares', 'hardwares.idHard','solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->get();

        return view('back_end.funcionarios.ficha_funcionario', [
            'comodatos' => $comodatos,
            'soportes' => $soportes,
            'funcionario' => $func
        ]);

    }

}