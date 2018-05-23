<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::get('/rut', 'Front_End@home');

Route::get('/Funcionarios/Nuevo','Funcionarios@nuevo_funcionario');
Route::post('/Funcionarios/Guardar','Funcionarios@guardar_funcionario');


Route::get('/Inventarios/Hardware','Inventarios@nuevo_hardware');
Route::post('/Inventarios/GuardarHardware','Inventarios@guardar_hardware');

Route::get('/Inventarios/Software','Inventarios@nuevo_software');
Route::post('/Inventarios/GuardarSoftware','Inventarios@guardar_software');


Route::get('/Mantenciones/Nuevo', 'Mantenciones@nueva_mantencion');

Route::get('/Soporte/Nuevo', 'Soportes@nuevo_soporte');

Route::get('/Mensajeria', 'Mensajes@ver');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
