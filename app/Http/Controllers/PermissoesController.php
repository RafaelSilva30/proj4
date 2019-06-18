<?php

namespace App\Http\Controllers;


use App\User;
use Spatie\Permission\Models\Role;
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
    public function edit($id)
    {
        $data3['data3'] = User::findOrFail($id);
        
        return view('userEdit',$data3);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\permissoes  $permissoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
                
            ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();



        if(isset($_POST['permissao'])){
            $permissoes = $_POST['permissao'];

            $role = Role::findById($id);
            $role->syncPermissions();       
            foreach($permissoes as $key => $value){
                
                
                $role->givePermissionTo($value);
            }
        }
       

        return redirect('/permissoes');


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

}
