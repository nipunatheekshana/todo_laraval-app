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

Route::get('/', function ()

{
    return view('index');
});


route::get('/todo','todocontroller@index');
route::post('/todo','todocontroller@store');
route::get('/todo/{Task}','todocontroller@show');
route::get('/todo/{Task}/edit','todocontroller@edit');
route::patch('/todo/{Task}','todocontroller@update');
route::delete('/todo/{Task}','todocontroller@destroy');
route::delete('/clean/{Ctask}','todocontroller@cdestroy');
route::post('/done/{Task}','todocontroller@done');


