<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tarefas;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $guard_name = 'web';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $user = auth()->user();
        
        if ($user->hasAnyRole(Role::all())) {

            return view('home');

        } else {
            $role = Role::create(['name'=>"{$user->name}"]);
            $user->assignRole("{$user->name}");
            $role->givePermissionTo('verTarefas');
            $role->givePermissionTo('verEntidades');
            $role->givePermissionTo('verPrograma');
            $role->givePermissionTo('verContabilista');
            return view('home');
        }
        


        $permission = Permission::findById(1);
        
        
    }

    public function test()
    {
        return view('testhome');
    }
    
    public function store(Request $request){
        $this->validate($request,[
        'idtarefas' => 'required',
        'data_inicio' => 'required',
        'data_fim' => 'required',
        'observacao' => 'required',
        'entidade' => 'required',
        'utilizador_idutilizador' => 'required',
        'utilizador_tipoutilizador' => 'required',
        'tipo_tarefa_idtipo_tarefa' => 'required']);
    }

}
