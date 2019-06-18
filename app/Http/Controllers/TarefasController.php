<?php

namespace App\Http\Controllers;

use App\tarefas;
use App\logs;
use App\programa;
use App\progUser;
use App\entidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTarefa;
use Carbon\Carbon;
use DB;
class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $dataatual = Carbon::now()->addMonths(1);
        echo("<script>console.log('PHP: ".Carbon::now()->subDays(0)."');</script>");
 
         $tarefas = tarefas::all();
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

         $data2 = programa::whereIn('id_prog_user', $arrAux)->join('tarefas', 'programas.idprograma', '=', 'tarefas.id_prog')->get();

         return view('tarefas.index')->with(['tarefas' => $data2]);
         return view('tarefas.index')->with('tarefas', $tarefasProximas,$data2);
         return view('user.index', ['users' => $users],$data2);
       
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
    public function store(Request $request)
    {
        $entidade = entidade::findOrFail($request->entidades);
        $user = auth()->user();
        $tipotarefa = $request->get('tipo_tarefa');

        
        $this->validate($request, [
            'datetimepicker6' => 'required',
            'observacoes'   => 'required',

        ]);
        $data = array(
            'name' => $entidade->nome,
            'tipo' => $tipotarefa,
            'data_inicio' => $request->datetimepicker6,
            'observacoes' => $request->observacoes,
        );
        Mail::to($entidade->email)->send(new MailTarefa($data));

        
        

        $tarefas = new tarefas;
        $tarefas->id_utilizador = $user->id;
        $tarefas->data_inicio = $request->datetimepicker6;
        $tarefas->data_fim = $request->datetimepicker7;
        $tarefas->id_prog = $request->programa;
        
        $tarefas->entidade = $request->entidades;
        $tarefas->tipo_tarefa_idtipo_tarefa = $tipotarefa;
        $tarefas->observacao = $request->observacoes;
        $tarefas->save();

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Tarefas";
        $log->descricao = "O user: {$user->name} criou uma tarefa";
        $log->users_id = $user->id;
        $log->save();
       
        return redirect('/tarefas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return tarefas::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = tarefas::find($id);
        return view('/tarefas_edit',compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $tarefa = tarefas::findOrFail($request->idtarefas);

        $tarefa->entidade = $request->entidades;
        $tarefa->tipo_tarefa_idtipo_tarefa = $request->tipo_tarefa;
        $tarefa->data_inicio = $request->datetimepicker6;
        $tarefa->data_fim = $request->datetimepicker7;
        $tarefa->observacao = $request->observacoes;
        $tarefa->save();

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Tarefas";
        $log->descricao = "O user: {$user->name} alterou a tarefa com o id:{$request->idtarefas}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/tarefas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tarefas::destroy($id);

        $user = auth()->user();
        $log = new logs;
        $log->ip = request()->ip();
        $log->menu = "Tarefas";
        $log->descricao = "O user: {$user->name} apagou a tarefa com o id:{$id}";
        $log->users_id = $user->id ;
        $log->save();
        return redirect('/tarefas');

        return redirect('/tarefas');
    }
}
