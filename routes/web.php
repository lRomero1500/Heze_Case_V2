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
//region Lobby
Route::get('/','lobby@index')->middleware('auth');
//endregion
//region Mantenimiento
Route::get('mantenimiento','mantenimiento@index')->middleware('auth');
Route::get('mantenimiento/empresas','mantenimiento@empresasIndex')->middleware('auth');
Route::get('mantenimiento/colaboradores','mantenimiento@colaboradoresIndex')->middleware('auth');
Route::get('mantenimiento/getEmpresa/{id}','mantenimiento@getEmpresa');
Route::get('mantenimiento/getColaborador/{id}','mantenimiento@getColaborador');
Route::post('mantenimiento/creaEditEmpresas','mantenimiento@creaEditEmpresas');
Route::post('mantenimiento/creaEditColaboradores', 'mantenimiento@creaEditColaboradores');
Route::post('mantenimiento/delEmpresa/{id}','mantenimiento@delEmpresa');
Route::post('mantenimiento/delColaborador/{id}','mantenimiento@delColaborador');
//endregion
Route::get('pmlite','pmlite@index')->middleware('auth');
//region Error
Route::get('error','ErrorController@index');
//endregion