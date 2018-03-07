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
    return view('layouts/admin');
});
Route::resource('institucion','institucionController');
Route::get('/institucion/create','institucionController@create');

Route::get('/json-lisprovincias','institucionController@lisprovincias');

Route::get('/json-lisdistritos', 'institucionController@lisdistritos');


Route::resource('docentes','DocenteController');
Route::resource('planillas','PlanillaController');
Route::get('/planillas/create','PlanillaController@create');
//Route::get('/planillas/edit','PlanillaController@edit');

Route::get('/json-lisprovincias','PlanillaController@lisprovincias');

Route::get('/json-lisdistritos', 'PlanillaController@lisdistritos');
Route::get('/json-lisInstitucion', 'PlanillaController@lisInstitucion');

