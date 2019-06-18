<?php

namespace App\Http\Controllers;


use App\programa;
use App\logs;
use App\User;
use App\progUser;
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
        
        $user = auth()->user();
        
        $data3 = User::all();
        $data4 = progUser::all();

        $arrAux = [];
        foreach($data4 as $prog){
            
            $text = explode(" ",$prog->user);
            for ($i = 0; $i <= count($text)-1; $i++) {
              $aux = "$user->name,";
              $aux2 = "$user->name";
               if(strcmp($text[$i],$aux) == 0 || strcmp($text[$i],$aux2)== 0){
                array_push($arrAux,$prog->iduser_prog);
                }
            }  
        }
        $data2 = programa::whereIn('id_prog_user', $arrAux)->get();
        //return view('programa',$data2,$data3);
        return view('programa',['data2' => $data2],['data3' => $data3]);
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

    public function storeProgUser(Request $request){
        

        $data = new programa;
        
        $data->save();

        if(isset($_POST['user'])){
            $checked = implode(', ', $_POST['user']); 
            
            $progUser = new progUser;
            $progUser->programa = $data->idprograma;
            $progUser->user = $checked;

            $progUser->save();


        }
        $request->iduser_prog = $progUser->iduser_prog;

        return $this->store($request, $data);
     }

    public function store(Request $request, $data)
    {

        $data->id_prog_user = $request->iduser_prog;
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


    public function updateProgUser(Request $request){
        $programa = programa::findOrFail($request->id1);

        $programa->save();


        if(isset($_POST['user'])){

            $checked = implode(', ', $_POST['user']); 

            $progUser = new progUser;
            $progUser->user = $checked;
            $progUser->programa = $programa->idprograma;
            $progUser->save();
        }
        $request->iduser_prog = $progUser->iduser_prog;

        return $this->update($request, $programa);
     }


    public function update(Request $request,$programa)
    {
       
        $programa->nome = $request->name;
        $programa->data_validade = $request->datetimepicker1;
        $programa->id_prog_user = $request->iduser_prog;
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
