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
//--------USERS--------//
Route::post('/registar', 'RegistarController@store');

Route::patch('/registar/{id}',[
    'as' => 'registar.update',
    'uses' => 'RegistarController@update'
]); 
Route::get('/permissao/edit/{id}', 'PermissoesController@edit');
Route::post('/permissao/{id}', 'PermissoesController@update');
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
//------------DISTRITOS-------------//
Route::get('/distrito', 'DistritoController@index')->name('distrito');
Route::post('/distrito', 'DistritoController@store');
Route::get('/distrito/delete/{id}','DistritoController@destroy');
Route::patch('/distrito/{id}',[
    'as' => 'distrito.update',
    'uses' => 'DistritoController@update'
]); 
//------------CONCELHO-------------//
Route::get('/concelho', 'ConcelhoController@index')->name('concelho');
Route::post('/concelho', 'ConcelhoController@store');
Route::get('/concelho/delete/{id}','ConcelhoController@destroy');
Route::patch('/concelho/{id}',[
    'as' => 'concelho.update',
    'uses' => 'ConcelhoController@update'
]); 

//------------Freguesia-------------//
Route::get('/freguesia', 'FreguesiaController@index')->name('freguesia');
Route::post('/freguesia', 'FreguesiaController@store');
Route::get('/freguesia/delete/{id}','FreguesiaController@destroy');
Route::patch('/freguesia/{id}',[
    'as' => 'freguesia.update',
    'uses' => 'FreguesiaController@update'
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

Route::get('/permissoes', 'PermissoesController@index')->name('permissoes');

Route::get('/logs', 'LogsController@index')->name('logs');

Route::get('permitir_alterar_permissoes/{id}','PermissoesController@permitir_alterar_permissoes');
Route::get('nao_alterar_permissoes/{id}','PermissoesController@nao_alterar_permissoes');

// PERMISSOES TAREFAS
Route::get('permitir_edit_tarefas/{id}','PermissoesController@permitir_edit_tarefas');
Route::get('nao_permitir_edit_tarefas/{id}','PermissoesController@nao_permitir_edit_tarefas');

Route::get('permitir_add_tarefas/{id}','PermissoesController@permitir_add_tarefas');
Route::get('nao_permitir_add_tarefas/{id}','PermissoesController@nao_permitir_add_tarefas');

Route::get('permitir_ver_tarefas/{id}','PermissoesController@permitir_ver_tarefas');
Route::get('nao_ver_tarefas/{id}','PermissoesController@nao_permitir_ver_tarefas');

Route::get('permitir_delete_tarefas/{id}','PermissoesController@permitir_delete_tarefas');
Route::get('nao_permitir_delete_tarefas/{id}','PermissoesController@nao_permitir_delete_tarefas');
// PERMISSOES ENTIDADES
Route::get('permitir_ver_entidades/{id}','PermissoesController@permitir_ver_entidades');
Route::get('nao_permitir_ver_entidades/{id}','PermissoesController@nao_permitir_ver_entidades');

Route::get('permitir_add_entidades/{id}','PermissoesController@permitir_add_entidades');
Route::get('nao_permitir_add_entidades/{id}','PermissoesController@nao_permitir_add_entidades');

Route::get('permitir_edit_entidades/{id}','PermissoesController@permitir_edit_entidades');
Route::get('nao_permitir_edit_entidades/{id}','PermissoesController@nao_permitir_edit_entidades');

Route::get('permitir_delete_entidades/{id}','PermissoesController@permitir_delete_entidades');
Route::get('nao_permitir_delete_entidades/{id}','PermissoesController@nao_permitir_delete_entidades');

// PERMISSOES PROGRAMAS

Route::get('permitir_ver_programas/{id}','PermissoesController@permitir_ver_programas');
Route::get('nao_permitir_ver_programas/{id}','PermissoesController@nao_permitir_ver_programas');

Route::get('permitir_add_programas/{id}','PermissoesController@permitir_add_programas');
Route::get('nao_permitir_add_programas/{id}','PermissoesController@nao_permitir_add_programas');

Route::get('permitir_edit_programas/{id}','PermissoesController@permitir_edit_programas');
Route::get('nao_permitir_edit_programas/{id}','PermissoesController@nao_permitir_edit_programas');

Route::get('permitir_delete_programas/{id}','PermissoesController@permitir_delete_programas');
Route::get('nao_permitir_delete_programas/{id}','PermissoesController@nao_permitir_delete_programas');

// PERMISSOES CONTABILISTAS

Route::get('permitir_ver_contabilistas/{id}','PermissoesController@permitir_ver_contabilistas');
Route::get('nao_permitir_ver_contabilistas/{id}','PermissoesController@nao_permitir_ver_contabilistas');

Route::get('permitir_add_contabilistas/{id}','PermissoesController@permitir_add_contabilistas');
Route::get('nao_permitir_add_contabilistas/{id}','PermissoesController@nao_permitir_add_contabilistas');

Route::get('permitir_edit_contabilistas/{id}','PermissoesController@permitir_edit_contabilistas');
Route::get('nao_permitir_edit_contabilistas/{id}','PermissoesController@nao_permitir_edit_contabilistas');

Route::get('permitir_delete_contabilistas/{id}','PermissoesController@permitir_delete_contabilistas');
Route::get('nao_permitir_delete_contabilistas/{id}','PermissoesController@nao_permitir_delete_contabilistas');