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
Route::get('/pengguna/confirm-oprec/{idoprec}', 'HomeController@confirmOprec');
Route::get('/pengguna/confirm-oprec/confirm/{iduser}/{idoprec}', 'PendaftarOprecController@joinOprec');
Route::get('/pengguna/my-profile', 'HomeController@vProfile');
Route::get('/pengguna/my-profile/{id}', 'HomeController@eProfile');
/*instansi*/
Route::get('/pengguna/instansi', 'InstansiController@viewMyInstance');
Route::get('/pengguna/instansi/delete/{id}', 'InstansiController@deleteInstance');
Route::get('/pengguna/instansi/update/{id}', 'InstansiController@editInstance');
Route::post('/pengguna/instansi/update/{id}', 'InstansiController@updateInstance');

/*oprec*/
Route::get('/pengguna/instansi/{idinstansi}/make/oprec', 'OprecController@create');
Route::get('/pengguna/instansi/{idinstansi}/alloprec', 'OprecController@viewAllOprec');
Route::post('/pengguna/instansi/{idinstansi}/alloprec', 'OprecController@publish'); 	
Route::get('/unpublish/{idinstansi}/{idoprec}', 'OprecController@unpublish');
Route::post('/oprec/edit/{id}', 'OprecController@updateOprec');
Route::get('/oprec/edit/{id}', 'OprecController@edit');

/*bidang*/
Route::get('/pengguna/instansi/{idinstansi}/oprec/{idoprec}/make/field', 'BidangController@create');
Route::get('/pengguna/instansi/{idinstansi}/oprec/{idoprec}/allfield', 'BidangController@viewAllField');

/*PendaftarOPrec*/

/*Tugas*/
Route::get('/pengguna/instansi/{idinstansi}/oprec/{idoprec}/commontask', 'BidangController@viewAllField');
Route::get('/pengguna/instansi/{idinstansi}/oprec/{idoprec}/field/{idtugas}/fieldtask', 'BidangController@viewAllField');


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
Route::resource('bidang', 'BidangController');
/*---------------------------------------------------*/
/*ADMIN THINGS*/
Route::get('/admin', 'HomeController@homeAdmin');


Route::get('/file-server/file-prove-instansi/{file}', 'InstansiController@getDownloadProve');
Route::get('/instansi/status/accept/{id}', 'InstansiController@acceptInstance');
Route::get('/instansi/status/ignore/{id}', 'InstansiController@ignoreInstance');

/*Route::get('user/profile', [
	'as' => 'profile.name', 'uses' => 'BidangController@create'
	]);*/