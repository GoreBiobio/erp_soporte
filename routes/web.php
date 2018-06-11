<?php

Route::get('/', function () {
    return view('welcome');
});

// Rutas de Módulos Que No Requieren Autentificación
route::get('/rut', 'Front_End@home');

route::get('/Word','GenerarWord@crearWord');

// Rutas Módulo Recursos Humanos
Route::get('/Funcionarios/Nuevo','Funcionarios@nuevo_funcionario');
Route::post('/Funcionarios/Guardar','Funcionarios@guardar_funcionario');

//Rutas Módulo de Inventario
Route::get('/Inventarios/Hardware','Inventarios@nuevo_hardware');
Route::post('/Inventarios/GuardarHardware','Inventarios@guardar_hardware');

Route::get('/Inventarios/Software','Inventarios@nuevo_software');
Route::post('/Inventarios/GuardarSoftware','Inventarios@guardar_software');

route::get('/Inventarios/Auditar', 'Inventarios@auditar');

route::post('/Inventarios/porCaja','Inventarios@por_caja');
route::post('/Inventarios/porTipo','Inventarios@por_tipo');



//Rutas Módulo de Enlace Comodatos
Route::get('/Comodatos/EnlazarHard', 'Comodatos@enlazar_equipos');
Route::post('/Comodatos/EnlazarHardPasoUno','Comodatos@enlazar_equipos_pasouno');
Route::post('/Comodatos/Guardar', 'Comodatos@guardar_nuevo');

route::get('/Comodatos/Auditar', 'Comodatos@auditar');
route::post('/Comodatos/porFuncionario','Comodatos@por_funcionario');

Route::get('/Comodatos/EnlazarSoft', 'Comodatos@enlazar_software');


//Rutas Módulo de Generar Word
route::post('/Comodatos/GenerarWord', 'GenerarWord@generar_word');


//Rutas Módulo Mantención
Route::get('/Mantencion/Nuevo', 'Mantenciones@nueva_mantencion');
Route::get('/Mantencion/Gestion', 'Mantenciones@gestion_mantencion');

//Rutas Módulo Soporte
Route::get('/Soporte/Nuevo', 'Soportes@nuevo_soporte');
Route::post('/Soporte/Guardar','Soportes@guardar_soporte');

Route::get('/Soporte/Gestion', 'Soportes@gestion_soporte');

// Rutas Módulo Mensajes
Route::get('/Mensajeria', 'Mensajes@ver');

// Agrupación de Rutas que Requieren Autentificación
Route::group(['middleware' => 'auth'], function () {

});
