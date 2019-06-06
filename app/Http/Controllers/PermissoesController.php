<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class PermissoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data3['data3'] = User::all();
        return view('permissoes',$data3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
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
     * @param  \App\permissoes  $permissoes
     * @return \Illuminate\Http\Response
     */
    public function show(permissoes $permissoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\permissoes  $permissoes
     * @return \Illuminate\Http\Response
     */
    public function edit(permissoes $permissoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\permissoes  $permissoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, permissoes $permissoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\permissoes  $permissoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(permissoes $permissoes)
    {
        //
    }





    public function permitir_alterar_permissoes($id){
        //permitir
        
        $user = User::find($id);
        $user->alterarPermissoes = 1;
        $user->save();
        
            return redirect('/permissoes');
        
           
        
    }

    public function nao_alterar_permissoes($id){
        $logado = auth()->user();
        $user = User::find($id);
       
        if($logado == $user){
            
            $user->alterarPermissoes = 0;
            $user->save();
            return redirect('/tarefas');
        } else{

            $user->alterarPermissoes = 0;
            $user->save();
            return redirect('/permissoes');
        }
    }

    public function permitir_add_tarefas($id){
        //permitir
        
        $user = User::find($id);
        $user->addTarefas = 1;
        $user->verTarefas =1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_add_tarefas($id){
        
        $user = User::find($id);
        $user->addTarefas = 0;
        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_edit_tarefas($id){
        //permitir
        
        $user = User::find($id);
        $user->editTarefas = 1;
        $user->verTarefas =1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_edit_tarefas($id){
        
        $user = User::find($id);
        $user->editTarefas = 0;
        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_ver_tarefas($id){
        //permitir
        
        $user = User::find($id);
        $user->verTarefas = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_ver_tarefas($id){
        
        $user = User::find($id);
        $user->verTarefas = 0;
        $user->editTarefas = 0;
        $user->deleteTarefas = 0;
        $user->addTarefas = 0;
        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_delete_tarefas($id){
        //permitir
        
        $user = User::find($id);
        $user->deleteTarefas = 1;
        $user->verTarefas =1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_delete_tarefas($id){
        
        $user = User::find($id);
        $user->deleteTarefas = 0;
        $user->save();
        return redirect('/permissoes');
    }


    // PERMISSOES ENTIDADES 
    public function permitir_ver_entidades($id){
        //permitir
        
        $user = User::find($id);
        $user->verEntidades = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_ver_entidades($id){
        
        $user = User::find($id);
        $user->verEntidades = 0;
       
        $user->editEntidades = 0;
        $user->deleteEntidades = 0;
        $user->addEntidades = 0;

        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_add_entidades($id){
        //permitir
        
        $user = User::find($id);
        $user->verEntidades = 1;
        $user->addEntidades = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_add_entidades($id){
        
        $user = User::find($id);
        $user->addEntidades = 0;
        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_edit_entidades($id){
        //permitir
        
        $user = User::find($id);
        $user->editEntidades = 1;
        $user->verEntidades = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_edit_entidades($id){
        
        $user = User::find($id);
        $user->editEntidades = 0;
        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_delete_entidades($id){
        //permitir
        
        $user = User::find($id);
        $user->verEntidades = 1;
        $user->deleteEntidades = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_delete_entidades($id){
        
        $user = User::find($id);
        $user->deleteEntidades = 0;
        $user->save();
        return redirect('/permissoes');
    }

    // PERMISSOES PROGRAMAS

    public function permitir_ver_programas($id){
        //permitir
        
        $user = User::find($id);
        $user->verProgramas = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_ver_programas($id){
        
        $user = User::find($id);
        $user->verProgramas = 0;
        $user->addProgramas = 0;
        $user->editProgramas = 0;
        $user->deleteProgramas = 0;

        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_add_programas($id){
        //permitir
        
        $user = User::find($id);
        $user->verProgramas = 1;
        $user->addProgramas = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_add_programas($id){
        
        $user = User::find($id);
        $user->addProgramas = 0;
        $user->save();
        return redirect('/permissoes');
    }
    public function permitir_edit_programas($id){
        //permitir
        
        $user = User::find($id);
        $user->verProgramas = 1;
        $user->editProgramas = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_edit_programas($id){
        
        $user = User::find($id);
        $user->editProgramas = 0;
        $user->save();
        return redirect('/permissoes');
    }

    public function permitir_delete_programas($id){
        //permitir
        
        $user = User::find($id);
        $user->verProgramas = 1;
        $user->deleteProgramas = 1;
        $user->save();
        return redirect('/permissoes');
    }

    public function nao_permitir_delete_programas($id){
        
        $user = User::find($id);
        $user->deleteProgramas = 0;
        $user->save();
        return redirect('/permissoes');
    }
// PERMISSOES CONTABILISTAS

public function permitir_ver_contabilistas($id){
    //permitir
    
    $user = User::find($id);
    $user->verContabilistas = 1;
    $user->save();
    return redirect('/permissoes');
}

public function nao_permitir_ver_contabilistas($id){
    
    $user = User::find($id);
    $user->verContabilistas = 0;
    $user->addContabilistas = 0;
    $user->editContabilistas = 0;
    $user->deleteContabilistas = 0;
    $user->save();
    return redirect('/permissoes');
}

public function permitir_add_contabilistas($id){
    //permitir
    
    $user = User::find($id);
    $user->verContabilistas = 1;
    $user->addContabilistas = 1;
    $user->save();
    return redirect('/permissoes');
}

public function nao_permitir_add_contabilistas($id){
    
    $user = User::find($id);
    $user->addContabilistas = 0;
    $user->save();
    return redirect('/permissoes');
}

public function permitir_edit_contabilistas($id){
    //permitir
    
    $user = User::find($id);
    $user->verContabilistas = 1;
    $user->editContabilistas = 1;
    $user->save();
    return redirect('/permissoes');
}

public function nao_permitir_edit_contabilistas($id){
    
    $user = User::find($id);
    $user->editContabilistas = 0;
    $user->save();
    return redirect('/permissoes');
}

public function permitir_delete_contabilistas($id){
    //permitir
    
    $user = User::find($id);
    $user->verContabilistas = 1;
    $user->deleteContabilistas = 1;
    $user->save();
    return redirect('/permissoes');
}

public function nao_permitir_delete_contabilistas($id){
    
    $user = User::find($id);
    $user->deleteContabilistas = 0;
    $user->save();
    return redirect('/permissoes');
}
}
