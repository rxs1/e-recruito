<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*HOME*/
Route::get('/', 'HomeController@index');
Route::get('/signup', 'HomeController@signup');
Route::get('/login', 'HomeController@login');
/*---------------------------------------------------*/
/*GET USER*/
Route::get('/logout', 'UserController@logout');
/*---------------------------------------------------*/

/*isLogin*/
Route::get('/pengguna', 'HomeController@homeUser');
Route::get('/pengguna/my-profile', 'HomeController@vProfile');
Route::get('/pengguna/my-profile/{id}', 'HomeController@eProfile');
/*instansi*/
Route::get('/pengguna/instansi', 'InstansiController@viewMyInstance');
Route::get('/pengguna/instansi/delete/{id}', 'InstansiController@deleteInstance');
Route::get('/pengguna/instansi/update/{id}', 'InstansiController@editInstance');
Route::post('/pengguna/instansi/update/{id}', 'InstansiController@updateInstance');
/*bidang*/
/*oprec*/
Route::get('/pengguna/instansi/{id}/make/oprec', 'OprecController@create');


/*---------------------------------------------------*/
/*POST USER*/
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@authentication');
Route::post('/pengguna/my-profile/{id}', 'UserController@editProfile');

/*---------------------------------------------------*/

/*---------------------------------------------------*/
/*RESOURCE*/
Route::resource('instansi', 'InstansiController');
Route::resource('user', 'UserController');
Route::resource('oprec', 'OprecController');
Route::resource('tugas', 'TugasController');
Route::resource('bidang', 'BidangController');
/*---------------------------------------------------*/
/*ADMIN THINGS*/
Route::get('/admin', 'HomeController@homeAdmin');


Route::get('/file-server/file-prove-instansi/{file}', 'InstansiController@getDownloadProve');
Route::get('/instansi/status/accept/{id}', 'InstansiController@acceptInstance');
Route::get('/instansi/status/ignore/{id}', 'InstansiController@ignoreInstance');