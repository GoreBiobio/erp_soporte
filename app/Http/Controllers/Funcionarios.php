<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Funcionarios extends Controller
{
    public function nuevo_funcionario(){
        return view ('back_end.funcionarios.nuevo');
    }
}
