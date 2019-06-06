<?php

namespace App\Http\Controllers;


use App\programa;
use App\logs;
use Illuminate\Http\Request;

use DB;


        

    
class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data2['data2'] = programa::all();

        if(count($data2) >0 ){
            return view('programa',$data2);
        }
        else{
            return view('programa');
        }
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
        $data = new programa;
        $data->nome = $request->name;
        $data->data_validade = $request->datepicker;
        $data->save();
        
        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Programa";
        $log->descricao = "O user {$user->name} Criou o programa com o nome:{$request->name}";
        $log->users_id = $user->id ;
        $log->save();

        return redirect('/programa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(programa $programa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $programa = programa::findOrFail($request->id1);

        $programa->nome = $request->name;
        $programa->data_validade = $request->datetimepicker1;

        $programa->save();

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Programa";
        $log->descricao = "O user {$user->name} editou o programa com o id: {$request->id1}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/programa');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            programa::destroy($id);
            $user = auth()->user();
            $log = new logs;
            $log->ip = request()->ip();
            $log->menu = "Programa";
            $log->descricao = "O user: {$user->name} apagou o programa {$id}";
            $log->users_id = $user->id ;
            $log->save();

            return redirect('/programa');

        }catch(\Illuminate\Database\QueryException $ex){ 
         return "<h1> ERRO O PROGRAMA ESTÁ ASSOCIADA A UMA ENTIDADE";   
         ;
        }
    }
}
