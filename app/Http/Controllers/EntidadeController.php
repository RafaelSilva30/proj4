<?php

namespace App\Http\Controllers;


use App\entidade;
use Illuminate\Http\Request;
use DB;


class EntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['data'] = entidade::all();

        $data2['data2'] = DB::table('tarefas')->get();
        //$data['data'] = DB::table('entidade')->get();
       
        
        if(count($data) >0 ){
            return view('entidade',$data,$data2);
        }
        else{
            return view('entidade');
        }

        return view('entidade.index')->with('entidade', $data  );
        
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

        $programa =  $request->get('programa');
        $concelho = $request->get('concelho');
        $distrito = $request->get('distrito');
        $contabilista = $request->get('contabilista');


        $data = new entidade;
        $data->nome = $request->name;
        $data->contacto = $request->contacto;
        $data->email = $request->email;
        $data->validade_contrato = $request->datepicker;
        $data->contacto_contabilista = $request->contactocontabilista;
        $data->observacoes = $request->observacoes;
        $data->concelho = $concelho;
        $data->distrito = $distrito;
        $data->contabilista = $contabilista;
        $data->programa = $programa;
        $data->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function show(entidade $entidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function edit(entidade $entidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\entidade  $entidade
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
       $entidade = entidade::findOrFail($request->idEntidade);

        $entidade->entidade = $request->nome;
        $entidade->contacto = $request->contacto;
        $entidade->email = $request->email;
        $entidade->validade_contrato = $request->datepicker;
        $entidade->observacoes = $request->obs;
        $entidade->contabilista = $request->contabilista;
        $entidade->contacto_contabilista = $request->obs;
        $entidade->concelho = $request->concelho;
        $entidade->distrito = $request->distrito;
        $entidade->programa = $request->programa;
        $entidade->save();
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            entidade::destroy($id);
            return redirect('/entidade');

        }catch(\Illuminate\Database\QueryException $ex){ 
         return "<h1> OH BURRO DO crl";   
         ;
        }
        
    }


   
    
}
