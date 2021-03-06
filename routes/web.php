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

Route::get('/phpinfo', function () {
    phpinfo();
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/help','ControllerDocument@getDownload');
Route::get('/faq','ControllerDocument@getDownloadFAQ');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/jaminan','ControllerJaminan@index');
	Route::get('/jaminan/{id}','ControllerJaminan@show');
	Route::post('/jaminan/store','ControllerJaminan@store');
	Route::post('/validity/store','ControllerJaminan@update');
	Route::post('/jaminan/json/store','ControllerJaminanJSON@store');
	Route::post('/validity/json/store','ControllerJaminanJSON@update');
});


//Route::get('/tes','ControllerJaminan@tes');