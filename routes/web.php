<?php

Route::get('/', function () {
    return view('vendor.adminlte.auth.login');
});

// Rutas de Módulos Que No Requieren Autentificación
route::get('/rut', 'Front_End@home');
route::get('Proximamente', 'Generales@proximamente');

// Rutas Módulo Recursos Humanos
Route::get('/Funcionarios/Nuevo', 'Funcionarios@nuevo_funcionario');
Route::post('/Funcionarios/Guardar', 'Funcionarios@guardar_funcionario');
Route::post('/Funcionario/Ficha', 'Funcionarios@ficha_funcionario');

//Rutas Módulo de Inventario
Route::get('/Inventarios/Hardware', 'Inventarios@nuevo_hardware');
Route::post('/Inventarios/GuardarHardware', 'Inventarios@guardar_hardware');

Route::get('/Inventarios/Software', 'Inventarios@nuevo_software');
Route::post('/Inventarios/GuardarSoftware', 'Inventarios@guardar_software');

route::get('/Inventarios/Auditar', 'Inventarios@auditar');

route::post('/Inventarios/porCaja', 'Inventarios@por_caja');
route::post('/Inventarios/porTipo', 'Inventarios@por_tipo');


//Rutas Módulo de Enlace Comodatos
Route::get('/Comodatos/EnlazarHard', 'Comodatos@enlazar_equipos');
Route::post('/Comodatos/EnlazarHardPasoUno', 'Comodatos@enlazar_equipos_pasouno');
Route::post('/Comodatos/Guardar', 'Comodatos@guardar_nuevo');
Route::post('/Comodatos/Terminar', 'Comodatos@archivar_comodato');

route::get('/Comodatos/Auditar', 'Comodatos@auditar');
route::post('/Comodatos/porFuncionario', 'Comodatos@por_funcionario');

Route::get('/Comodatos/EnlazarSoft', 'Comodatos@enlazar_software');
Route::post('/Comodatos/EnlazarSoftPasoUno', 'Comodatos@enlazar_software_pasouno');
Route::post('/Comodatos/GuardarSW', 'Comodatos@guardar_nuevo_sw');


//Rutas Módulo de Generar Word
route::post('/Comodatos/GenerarWord', 'GenerarWord@generar_word_comodato');
route::post('/Comodatos/GenerarWordDevolucion','GenerarWord@generar_word_devolucion');


//Rutas Módulo Mantención
Route::get('/Mantencion/Nuevo', 'Mantenciones@nueva_mantencion');
Route::get('/Mantencion/Gestion', 'Mantenciones@gestion_mantencion');

//Rutas Módulo Soporte Hardware
Route::get('/Soporte/Nuevo', 'Soportes@nuevo_soporte');
Route::post('/Soporte/Guardar', 'Soportes@guardar_soporte');
Route::get('/Soporte/Archivo', 'Soportes@archivo_soporte');

Route::get('/Soporte/Gestion', 'Soportes@gestion_soporte');

Route::post('/Soporte/Ficha', 'Soportes@ficha_soporte');
Route::post('/Soporte/Tomar', 'Soportes@tomar');
Route::post('/Soporte/MotivoSolicitud', 'Soportes@motivo');
Route::post('/Soporte/SoporteEntregado', 'Soportes@forma');
Route::post('/Soporte/Observaciones', 'Soportes@observaciones');
Route::post('/Soporte/ObservacionesCierre', 'Soportes@observacionescierre');
Route::post('/Soporte/Cierre', 'Soportes@cerrar');

//Rutas Módulo Soporte Servicios
//Route::get('/Soporte/Nuevo', 'Soportes@nuevo_soporte');
//Route::post('/Soporte/Guardar', 'Soportes@guardar_soporte');
//Route::get('/Soporte/Archivo', 'Soportes@archivo_soporte');

Route::get('/Soporte/GestionServicios', 'SoportesServicios@gestion_soporte');

Route::post('/Soporte/FichaServicio', 'SoportesServicios@ficha_soporte');
Route::post('/Soporte/TomarServicio', 'SoportesServicios@tomar');
Route::post('/Soporte/MotivoSolicitudServicio', 'SoportesServicios@motivo');
Route::post('/Soporte/SoporteEntregadoServicio', 'SoportesServicios@forma');
Route::post('/Soporte/ObservacionesServicio', 'SoportesServicios@observaciones');
Route::post('/Soporte/ObsCierreServicio', 'SoportesServicios@observacionescierre');
Route::post('/Soporte/CierreServicio', 'SoportesServicios@cerrar');

//Rutas Módulo Gestión de Jefaturas
Route::get('/Soporte/JefaturaSW','SoportesServicios@jefatura_sw');
Route::post('/Soporte/ApruebaJefatura','SoportesServicios@aprueba_jefatura');




// Rutas Módulo Mensajes
Route::get('/Mensajeria', 'Mensajes@ver');

//Rutas Módulo Incidencia
Route::get('/Incidencia/Nuevo', 'Incidencias@nuevo_incidencia');
Route::post('/Incidencia/Guardar', 'Incidencias@guardar_incidencia');
Route::post('/Incidencia/Cerrar','Incidencias@cerrar_incidencia');
Route::post('/Incidencia/Ficha', 'Incidencias@ficha_incidencia');

// Agrupación de Rutas que Requieren Autentificación
Route::group(['middleware' => 'auth'], function () {

});
