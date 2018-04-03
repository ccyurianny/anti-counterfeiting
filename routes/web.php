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
Route::post('/counterfeiting', 'counterfeiting\ValidateController@check');
Route::get('/cities', 'counterfeiting\ValidateController@index');
Route::post('/import-excel', 'ExcelController@importUsers');
Route::get('/cargar-datos', function () {
    return view('cargar');
});