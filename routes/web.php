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
//--------TAREFAS-------------//
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/tarefas', 'TarefasController@index')->name('tarefas');
Route::post('/tarefas', 'TarefasController@store');

Route::get('tarefas/delete/{id}','TarefasController@destroy');

Route::get('tarefas/edit/{id}','TarefasController@edit');

Route::patch('/tarefas/{id}',[
    'as' => 'tarefas.update',
    'uses' => 'TarefasController@update'
]);


//------------PROGRAMAS-------------//
Route::get('/programa', 'ProgramaController@index')->name('programa');
Route::post('/programa', 'ProgramaController@store');
Route::get('/programa/delete/{id}','ProgramaController@destroy');

Route::patch('/programa/{id}',[
    'as' => 'programas.update',
    'uses' => 'ProgramaController@update'
]); 

Route::post('programa/{id}','ProgramaController@update');


//------------ENTIDADES-------------//
Route::get('/entidade', 'EntidadeController@index')->name('entidade');
Route::post('/entidade', 'EntidadeController@store');
Route::get('/entidades/delete/{id}','EntidadeController@destroy');

Route::patch('/entidade/{id}',[
    'as' => 'entidade.update',
    'uses' => 'EntidadeController@update'
]);

//------------CONTABILISTA-------------//
Route::get('/contabilista', 'ContabilistaController@index')->name('contabilista');
Route::post('/contabilista', 'ContabilistaController@store');
Route::get('contabilista/delete/{id}','ContabilistaController@destroy');



Route::patch('/contabilista/{id}',[
    'as' => 'contabilista.update',
    'uses' => 'ContabilistaController@update'
]);
