<?php

namespace App\Http\Controllers;

use App\contabilista;
use Illuminate\Http\Request;

class ContabilistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data3['data3'] = contabilista::all();

         
        if(count($data3) >0 ){
            return view('contabilista',$data3);
        }
        else{
            return view('contabilista');
        }
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
        $cont = new contabilista;
        $cont->nome = $request->name;
        $cont->contacto = $request->contact;
        $cont->email = $request->email;
        $cont->save();
        return redirect('/contabilista');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contabilista  $contabilista
     * @return \Illuminate\Http\Response
     */
    public function show(contabilista $contabilista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contabilista  $contabilista
     * @return \Illuminate\Http\Response
     */
    public function edit(contabilista $contabilista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contabilista  $contabilista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contabilista $contabilista)
    {
        
         
        $cont = contabilista::findOrFail($request->id);

        $cont->nome = $request->name;
        $cont->contacto = $request->contact;
        $cont->email = $request->email;
        $cont->save();  

        return redirect('/contabilista');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contabilista  $contabilista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            contabilista::destroy($id);
            return redirect('/contabilista');

        }catch(\Illuminate\Database\QueryException $ex){ 
         return "<h1> ERRO O CONTABILISTA ESTÁ ASSOCIADA A UMA ENTIDADE";   
         ;
        }
    }
}
