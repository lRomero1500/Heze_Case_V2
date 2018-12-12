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

Route::get('acceso/login','controlAcceso@index')->name('login');
Route::get('/','dashboard@home')->middleware('auth');
Route::get('dashboard/home','dashboard@home')->middleware('auth');
Route::get('dashboard/crm/clientes','dashboard@clientes')->middleware('auth');
Route::get('dashboard/crm/empresas','dashboard@empresas')->middleware('auth');
Route::get('dashboard/crm/colaboradores','dashboard@colaboradores')->middleware('auth');
Route::post('valida', 'controlAcceso@validaUsr');
Route::post('ingresa','controlAcceso@ingresaUsr');
Route::get('front/cotizador','frontController@index')->middleware('auth');
Route::get('error','ErrorController@index');

/*--------------------------Inicio-Mantenimiento--------------------------*/
/*Route::get('dashboard/mant/clientes','companiasController@index')->middleware('auth');*/
Route::get('dashboard/mant/empresas','companiasController@index')->middleware('auth');
Route::get('dashboard/mant/colaboradores','colaboradores@index')->middleware('auth');
Route::get('getEmpresa/{id}','companiasController@show');
Route::post('CreaEditEmpresa','companiasController@store');
Route::post('deleteEmpresa/{id}','companiasController@destroy');
/*Route::get('dashboard/mant/colaboradores','companiasController@index')->middleware('auth');*/
/*----------------------------Fin-Mantenimiento----------------------------*/
