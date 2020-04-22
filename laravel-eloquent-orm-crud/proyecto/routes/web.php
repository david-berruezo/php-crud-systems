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


// application
// get
Route::get('/', 'TaskController@index');
Route::get('/add', 'TaskController@add');
Route::get('/edit', 'TaskController@edit');
Route::get('/edit/{id}', 'TaskController@edit');
Route::get('/delete', 'TaskController@delete');
Route::get('/delete/{id}', 'TaskController@delete');
// post
Route::post('/edit', 'TaskController@edit');
Route::post('/add', 'TaskController@add');


// Route Methods
// Ejemplos de routes

/*
Route::get();
Route::post();
Route::put();
Route::delete();
Route::any();

Route::get('/', function () {
    return view('index');
});

Route::get('/prueba', function () {
    return view('index');
});

Route::get('/prueba/{id}', function () {
    return view('index',['id'=> "prueba"]);
});

Route::get('/saludar', function () {
    return 'Hola';
});

$me_despido = function(){
    return 'Adios';
};

Route::get('/despedir',$me_despido);
*/
