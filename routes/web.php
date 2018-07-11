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

Route::get('/test',['uses'=>'ImagesController@test']);


Route::get('/home',['uses'=>'ImagesController@index','as'=>'home']);

Route::post('/saveImg',['uses'=>'ImagesController@SubmitDate']);

Route::post('/request',['uses'=>'ImagesController@request']);


Route::get('/getRequests',['uses'=>'ImagesController@getRequests']);


Route::get('/action/{id}/{status}',['uses'=>'ImagesController@action']);



