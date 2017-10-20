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

Route::get('/', 'TDLController@index');
Route::get('/tambahList', 'TDLController@tambahList');
Route::get('/editList/{id}', 'TDLController@editList');
Route::post('/store', 'TDLController@store');
Route::get('/done/{id}', 'TDLController@done');
Route::get('/showdone', 'TDLController@showdone');
Route::post('/update/{id}', 'TDLController@update');
Route::get('/delete/{id}', 'TDLController@deleteList');
