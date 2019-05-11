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
Route::get('/entidade', 'EntidadeController@index')->name('entidade');
Route::post('/entidade', 'EntidadeController@store');
Route::get('/entidades/delete/{id}','EntidadeController@destroy');

Route::patch('/entidade/{id}',[
    'as' => 'entidades.update',
    'uses' => 'EntidadeController@update'
]);
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


