<?php

namespace App\Http\Controllers;

use App\concelho;
use App\logs;
use Illuminate\Http\Request;

class ConcelhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data6['data6'] = concelho::all();
        return view('concelho',$data6);
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
        $distrito = $request->get('distrito');

        $data = new concelho;
        $data->nome = $request->name;
        $data->distrito = $distrito;    
        $data->save();

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Concelho";
        $log->descricao = "O user: {$user->name} criou o concelho: {$request->name}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/concelho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function show(concelho $concelho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function edit(concelho $concelho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $concelho = concelho::findOrFail($request->id1);
        $concelho->nome = $request->name;
        $concelho->distrito = $request->distrito;
        $concelho->save();
        

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Concelho";
        $log->descricao = "O user: {$user->name} editou o concelho {$request->id1}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/concelho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            concelho::destroy($id);
            $user = auth()->user();
            $log = new logs;
            $log->ip = request()->ip();
            $log->menu = "Concelho";
            $log->descricao = "O user: {$user->name} apagou o concelho {$id}";
            $log->users_id = $user->id ;
            $log->save();

            return redirect('/concelho');

        }catch(\Illuminate\Database\QueryException $ex){ 
         return "<h1> ERRO O CONCELHO ESTÁ ASSOCIADA A UMA ENTIDADE";   
         ;
        }
    }
}
