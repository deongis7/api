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
Route::get('/jaminan','ControllerJaminan@index');
Route::get('/jaminan/{id}','ControllerJaminan@show');
Route::post('/jaminan/store','ControllerJaminan@store');
