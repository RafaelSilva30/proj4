<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tarefas;

use Carbon\Carbon;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        return view('testhome');
    }
    
    public function store(Request $request){
        $this->validate($request,[
        'idtarefas' => 'required',
        'data_inicio' => 'required',
        'data_fim' => 'required',
        'observacao' => 'required',
        'entidade' => 'required',
        'utilizador_idutilizador' => 'required',
        'utilizador_tipoutilizador' => 'required',
        'tipo_tarefa_idtipo_tarefa' => 'required']);
    }

}
