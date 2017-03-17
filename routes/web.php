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
    return redirect('/inicio');
});

Auth::routes();
Route::group(['middleware' => ['auth']],function(){
	Route::get('/inicio', 'HomeController@index');

	/**
	*User Routes
	*/
	Route::get('/usuarios/registrar', 'UsersController@showDataForm');
	Route::get('/usuarios/editar/{id}', 'UsersController@showUpdateForm');
	Route::post('/usuarios/editar/{id}', 'UsersController@update');
	Route::post('/usuarios/registrar', 'UsersController@register');
	Route::get('/usuarios/listar', 'UsersController@index');
	Route::get('/usuarios', function(){ return redirect('/usuarios/listar');});
});
Route::get('/about-us', 'HomeController@about');
