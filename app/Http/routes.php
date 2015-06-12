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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'test@test');
Route::get('/test1', 'test@test1');
Route::get('/testInsert', 'test@testInsert');
Route::get('/newest', 'SourceController@newest');
Route::get('/dataOfDay', 'SourceController@dataOfDay');
Route::get('/push', 'SourceController@pushData');
