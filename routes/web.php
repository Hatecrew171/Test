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
Route::get('/', 'ClinicaController@index');
Route::get('agendar_hora', 'ClinicaController@agendar_hora')->name('agendar_hora');
Route::POST('guardar_hora', 'ClinicaController@guardar_hora')->name('guardar_hora');
Route::POST('update_hora', 'ClinicaController@update_hora')->name('update_hora');
Route::get('editar_hora/{id}/', 'ClinicaController@editar_hora')->name('editar_hora');
Route::get('eliminar_hora/{id}/', 'ClinicaController@eliminar_hora')->name('eliminar_hora');
Route::get('historial', 'ClinicaController@historial')->name('historial');
Route::get('historial_detalle', 'ClinicaController@historial_detalle')->name('historial_detalle');
Route::get('informacion_historial/{fecha_inicio}/{fecha_final}', 'ClinicaController@informacion_historial')->name('informacion_historial');
Route::get('obtener_precio/{id_servicio}', 'ClinicaController@obtener_precio')->name('obtener_precio');

