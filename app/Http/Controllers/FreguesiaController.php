<?php

namespace App\Http\Controllers;

use App\freguesia;
use App\logs;
use Illuminate\Http\Request;

class FreguesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data7['data7'] = freguesia::all();
        return view('freguesia',$data7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $concelho = $request->get('concelho');

        $data = new freguesia;
        $data->nome = $request->name;
        $data->ID_Concelho = $concelho;    
        $data->save();

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Freguesia";
        $log->descricao = "O user: {$user->name} criou a freguesia: {$request->name}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/freguesia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\freguesia  $freguesia
     * @return \Illuminate\Http\Response
     */
    public function show(freguesia $freguesia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\freguesia  $freguesia
     * @return \Illuminate\Http\Response
     */
    public function edit(freguesia $freguesia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\freguesia  $freguesia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $freguesia = freguesia::findOrFail($request->id1);
        $freguesia->Nome = $request->name;
        $freguesia->ID_Concelho = $request->concelho;
        $freguesia->save();
        

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Freguesia";
        $log->descricao = "O user: {$user->name} editou a freguesia {$request->id1}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/freguesia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\freguesia  $freguesia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            freguesia::destroy($id);
            $user = auth()->user();
            $log = new logs;
            $log->ip = request()->ip();
            $log->menu = "Freguesia";
            $log->descricao = "O user: {$user->name} apagou o freguesia {$id}";
            $log->users_id = $user->id ;
            $log->save();

            return redirect('/freguesia');

        }catch(\Illuminate\Database\QueryException $ex){ 
         return "<h1> ERRO O DISTRITO ESTÁ ASSOCIADA A UMA ENTIDADE";   
         ;
        }
    }
}
