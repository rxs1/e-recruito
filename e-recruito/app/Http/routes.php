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


/*---------------------------------------------------*/
/*POST USER*/
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@authentication');
Route::post('/pengguna/my-profile/{id}', 'UserController@editProfile');
/*---------------------------------------------------*/

/*---------------------------------------------------*/
/*UNTUK BUAT Instansi*/
Route::resource('instansi', 'InstansiController');
/*---------------------------------------------------*/
/*ADMIN THINGS*/
Route::get('/admin', 'HomeController@homeAdmin');
Route::resource('user', 'UserController');

Route::get('/file-server/file-prove-instansi/{file}', 'InstansiController@getDownloadProve');
Route::get('/instansi/status/accept/{id}', 'InstansiController@acceptInstance');
Route::get('/instansi/status/ignore/{id}', 'InstansiController@ignoreInstance');