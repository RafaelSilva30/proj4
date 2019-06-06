<?php

namespace App\Http\Controllers;

use App\distrito;
use App\logs;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data5['data5'] = distrito::all();
        return view('distrito',$data5);
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
        $data = new distrito;
        $data->nome = $request->name;
        $data->save();

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Distrito";
        $log->descricao = "O user: {$user->name} criou o distrito: {$request->name}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/distrito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function show(distrito $distrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function edit(distrito $distrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $distrito = distrito::findOrFail($request->id1);
        $distrito->nome = $request->name;
        $distrito->save();
        

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Distrito";
        $log->descricao = "O user: {$user->name} editou o distrito {$request->id1}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/distrito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            distrito::destroy($id);
            $user = auth()->user();
            $log = new logs;
            $log->ip = request()->ip();
            $log->menu = "Distrito";
            $log->descricao = "O user: {$user->name} apagou o distrito {$id}";
            $log->users_id = $user->id ;
            $log->save();

            return redirect('/distrito');

        }catch(\Illuminate\Database\QueryException $ex){ 
         return "<h1> ERRO O DISTRITO ESTÁ ASSOCIADA A UMA ENTIDADE";   
         ;
        }
    }
}
