<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $num_sop = DB::table('solicitudsoportes')
            ->where('estadoSop','<>','Cerrado')
            ->count();

        $num_mant = DB::table('solicitudmantenciones')
            ->where('estadoMant','<>','Cerrado')
            ->count();


        return view('adminlte::home',[
            'num_sop' => $num_sop,
            'num_mant' => $num_mant
        ]);
    }
}