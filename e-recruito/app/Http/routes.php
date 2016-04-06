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
Route::get('/login', 'HomeController@login');
/*---------------------------------------------------*/


/*POST USER*/
Route::post('/', 'UserController@create');
Route::post('/login', 'UserController@authentication');
/*---------------------------------------------------*/

