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
Route::get('/entidades', 'EntidadesController@index')->name('Entidades');


Route::get('/tarefas', 'TarefasController@index')->name('tarefas');
Route::post('/tarefas', 'TarefasController@store');

//Route::resource('tarefas','TarefasController');


Route::get('tarefas/delete/{id}','TarefasController@destroy');

Route::get('tarefas/edit/{id}','TarefasController@edit');
//Route::post('tarefas/update/{id}','TarefasController@update');

Route::patch('/tarefas/{id}',[
    'as' => 'tarefas.update',
    'uses' => 'TarefasController@update'
]);
