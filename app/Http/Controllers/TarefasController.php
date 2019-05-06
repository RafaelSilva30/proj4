<?php

namespace App\Http\Controllers;

use App\tarefas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataatual = Carbon::now()->addMonths(1);
        echo("<script>console.log('PHP: ".Carbon::now()->subDays(0)."');</script>");
 
         $tarefas = DB::table('tarefas')->get();
         
     
         // erro, falta condição para filtrar as datas
             //$tarefasProximas = DB::table('tarefas')->whereDate($tarefa->data_fim, '<', $dataatual);
  
         //
 
 
         
         return view('tarefas.index')->with('tarefas', $tarefas);
         return view('tarefas.index')->with('tarefas', $tarefasProximas);
         return view('user.index', ['users' => $users]);
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = auth()->user();


        $entidade =  $request->get('entidade');
        $tipotarefa = $request->get('tipo_tarefa');
        

        $tarefas = new tarefas;
        $tarefas->id_utilizador = $user->id;
        $tarefas->data_inicio = Carbon::parse($request->dateaatimepicker6);
        $tarefas->data_fim = Carbon::parse($request->datetaaimepicker7);
        $tarefas->entidade = $entidade;
        $tarefas->tipo_tarefa_idtipo_tarefa = $tipotarefa;
        $tarefas->observacao = $request->observacoes;
        $tarefas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function show(tarefas $tarefas)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function edit(tarefas $tarefas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tarefas $tarefas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function destroy(tarefas $tarefas)
    {
        //
    }
}
