<?php

namespace App\Http\Controllers;

use App\entidades;
use Illuminate\Http\Request;
use DB;


class EntidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = DB::table('entidade')->get();
        
        if(count($data) >0 ){
            return view('entidades',$data);
        }
        else{
            return view('entidades');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\entidades  $entidades
     * @return \Illuminate\Http\Response
     */
    public function show(entidades $entidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\entidades  $entidades
     * @return \Illuminate\Http\Response
     */
    public function edit(entidades $entidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\entidades  $entidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, entidades $entidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\entidades  $entidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(entidades $entidades)
    {
        //
    }

    
}
