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
 
         $tarefas = tarefas::all();
         
     
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
        $tarefas->data_inicio = $request->datetimepicker6;
        $tarefas->data_fim = $request->datetimepicker7;
        $tarefas->entidade = $entidade;
        $tarefas->tipo_tarefa_idtipo_tarefa = $tipotarefa;
        $tarefas->observacao = $request->observacoes;
        $tarefas->save();

        return redirect('/tarefas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return tarefas::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = tarefas::find($id);
        return view('/tarefas_edit',compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $tarefa = tarefas::findOrFail($request->idtarefas);

        $tarefa->entidade = $request->entidade;
        $tarefa->tipo_tarefa_idtipo_tarefa = $request->tipo_tarefa;
        $tarefa->data_inicio = $request->datetimepicker6;
        $tarefa->data_fim = $request->datetimepicker7;
        $tarefa->observacao = $request->observacoes;
        $tarefa->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tarefas::destroy($id);
        return redirect('/tarefas');
    }
}
