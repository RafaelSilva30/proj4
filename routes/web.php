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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testhome', 'HomeController@test')->name('testhome');

Route::resource('tarefas','TarefasController');
Route::get('/tarefas', 'TarefasController@index')->name('tarefas');
Route::post('/tarefas', 'TarefasController@store');

