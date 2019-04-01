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



Route::get('dashboard/home','dashboard@home')->middleware('auth');
Route::get('dashboard/crm/clientes','dashboard@clientes')->middleware('auth');
Route::get('dashboard/crm/empresas','dashboard@empresas')->middleware('auth');
Route::get('dashboard/crm/colaboradores','dashboard@colaboradores')->middleware('auth');
Route::get('front/cotizador','frontController@index')->middleware('auth');


//region Control de Acceso
Route::get('acceso/login','controlAcceso@index')->name('login');
Route::get('acceso/logout','controlAcceso@logout');
Route::post('valida', 'controlAcceso@validaUsr');
Route::post('ingresa','controlAcceso@ingresaUsr');
//endregion
//region Control de Acceso
Route::get('Usuario/misdatos','Usuarios@index');
//endregion

//region Lobby
Route::get('/','lobby@index')->middleware('auth');
//endregion
//region Mantenimiento
Route::get('mantenimiento','mantenimiento@index')->middleware('auth');
Route::get('mantenimiento/empresas','mantenimiento@empresasIndex')->middleware('auth');
Route::get('mantenimiento/departamentos','mantenimiento@departamentosIndex')->middleware('auth');
Route::get('mantenimiento/servicios','mantenimiento@serviciosIndex')->middleware('auth');
Route::get('mantenimiento/colaboradores','mantenimiento@colaboradoresIndex')->middleware('auth');
Route::get('mantenimiento/clientes','mantenimiento@clientesIndex')->middleware('auth');
Route::get('mantenimiento/getEmpresa/{id}','mantenimiento@getEmpresa');
Route::get('mantenimiento/getDepartamento/{id}','mantenimiento@getDepartamento');
Route::get('mantenimiento/getServicio/{id}','mantenimiento@getServicio');
Route::get('mantenimiento/getColaborador/{id}','mantenimiento@getColaborador');
Route::post('mantenimiento/creaEditEmpresas','mantenimiento@creaEditEmpresas');
Route::post('mantenimiento/creaEditDepartamentos','mantenimiento@creaEditDepartamentos');
Route::post('mantenimiento/creaEditServicios','mantenimiento@creaEditServicios');
Route::post('mantenimiento/creaEditColaboradores', 'mantenimiento@creaEditColaboradores');
Route::post('mantenimiento/creaEditClientes', 'mantenimiento@creaEditClientes');
Route::post('mantenimiento/delEmpresa/{id}','mantenimiento@delEmpresa');
Route::post('mantenimiento/delDepartamento/{id}','mantenimiento@delDepartamento');
Route::post('mantenimiento/delServicio/{id}','mantenimiento@delServicio');
Route::post('mantenimiento/delColaborador/{id}','mantenimiento@delColaborador');
Route::post('mantenimiento/delCliente/{id}','mantenimiento@delCliente');
//endregion
//region Pmlite
Route::get('pmlite','pmlite@index')->middleware('auth');
Route::get('pmlite/proyectos/ver','pmlite@proyectoVer')->middleware('auth');
Route::get('pmlite/proyectos/crear','pmlite@proyectoCrear')->middleware('auth');
Route::get('pmlite/tareas/ver','pmlite@tareaVer')->middleware('auth');
Route::get('pmlite/tareas/crear','pmlite@tareaCrear')->middleware('auth');
Route::post('pmlite/creaEditProyecto','pmlite@creaEditProyecto');
//endregion
//region Error
Route::get('error','ErrorController@index');
//endregion
