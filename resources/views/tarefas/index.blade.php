@extends('layouts.main')

@section('content')

<?php
            use Carbon\Carbon;
            Carbon::setLocale('pt');
          $user = auth()->user();
          
          ?>    
<style type="text/css" media="Screen">
object:hover, object.hover {
  color:#006400;
  cursor: pointer; 
}
object {
  color: #4BB543;
}
</style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<section class="content-header">
      <h1>
       Tarefas
      </h1>
    </section>

    
    <!-- Main content -->
    <section class="content">
    @if(count($errors) > 0)
            <div class="aler alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}} </li>            
                    @endforeach
            </div>
        @endif
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todas as Tarefas </h1>
              @if($user->addTarefas == 1)
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#entidadesModal"></i></object>
              @endif
            </div>
            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>

                  <th>Nome do Utilizador</th>
                  <th>Data Inicio</th>
                  <th>Data Fim</th>
                  <th>Tempo Total </th>
                  <th>Observações</th>
                  <th>Id Entidade</th>
                  <th>Tipo</th>
                  @if($user->editTarefas == 1 || $user->deleteTarefas == 1)
                  <th>Ações</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                <p></p>
                
                    @if(count($tarefas) >=1)
                     

                        @foreach($tarefas as $tarefa)
                        
                                <tr>


                                <?php 
                                        
                                        $connect = mysqli_connect("localhost","root","","p4");

                                        if($connect->connect_error){
                                            die("connection failed:".$connect->connect_error);
                                        }
                                        $auxiliar = $tarefa->id_utilizador;

                                        $query = "SELECT name from users where $auxiliar = id";
                                        $result = $connect->query($query);

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<td>". $row['name']. "</td>" ;
                                        }
                                        //echo("<script>console.log('PHP: ".$result."');</script>");
                                        //echo "<td> $result </td>";
                                            
                                        $startTime = Carbon::parse($tarefa->data_inicio);
                                        $finishTime = Carbon::parse($tarefa->data_fim);
                                        if($tarefa->data_fim == null){
                                            $totalDuration = "Sem data final";
                                        }else{
                                        $totalDuration = $finishTime->diffForHumans($startTime);
                                        }
                                ?>

                                <td>{{$tarefa->data_inicio}}</td>
                                <td>{{$tarefa->data_fim}}</td>
                                <td>{{$totalDuration}}</td>
                                
                                
                                
                                
                                <td>{{$tarefa->observacao}}</td>
                                        
                                <?php 
                                        $connect = mysqli_connect("localhost","root","","p4");

                                        if($connect->connect_error){
                                            die("connection failed:".$connect->connect_error);
                                        }
                                        $auxiliar = $tarefa->entidade;

                                        $query = "SELECT nome from entidades where $auxiliar = idEntidade";
                                        $result = $connect->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<td>". $row['nome']. "</td>" ;
                                        }
                                        //echo("<script>console.log('PHP: ".$result."');</script>");
                                        //echo "<td> $result </td>";
                                ?>

                                <?php 
                                        header('Content-Type: text/html; charset=utf-8');
                                        
                                        $connect = mysqli_connect("localhost","root","","p4");

                                        if($connect->connect_error){
                                            die("connection failed:".$connect->connect_error);
                                        }
                                        $auxiliar = $tarefa->tipo_tarefa_idtipo_tarefa;

                                        $query = "SELECT nome from tipo_tarefa where $auxiliar = idtipo_tarefa";
                                        $result = $connect->query($query);

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<td>". $row['nome']. "</td>" ;
                                        }
                                        //echo("<script>console.log('PHP: ".$result."');</script>");
                                        //echo "<td> $result </td>";

                                        $query = "SELECT idEntidade from tarefas";
                                        $result = $query;
                                ?>   
                                
                               
                                
                                @if($user->editTarefas == 1 )
                                <td>
                                        
                            <a href= "#" <button type="button" class="btn btn-warning" type="button"  data-toggle="modal" 
                            data-id="{{$tarefa->idtarefas}}"
                            data-myentidade="{{$tarefa->entidade}}"
                            data-tipotarefa="{{$tarefa->tipo_tarefa_idtipo_tarefa}}"
                            data-dataini="{{$tarefa->data_inicio}}"
                            data-datafim="{{$tarefa->data_fim}}"
                            data-observacao="{{$tarefa->observacao}}"
                             data-target="#editTarefasModal" ><i class="fa fa-edit fa" ></i></a>

                             @endif
                           
                             @if($user->deleteTarefas == 1 && $user->editTarefas == 1 )
                                 <a href="tarefas/delete/{{$tarefa->idtarefas}}"><button type="button"  class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
                                @elseif($user->deleteTarefas == 1 && $user->editTarefas == 0 )
                                <td><a href="tarefas/delete/{{$tarefa->idtarefas}}"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
                                @endif
                               
                                </tr>
                        @endforeach
                    @else  
                        <p>Sem Tarefas</p> 
                    @endif   
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      <div id="entidadesModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        
            <div class="modal-header">
            <form method="POST" action="/tarefas">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h1 class="modal-title">Nova tarefa</h1>  
            </div>
            <div class="modal-body">
                
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                    @csrf
                        <label class="control-label" style="margin-right:18px;" >Entidade</label>
                        <div>
                            <select name="entidades">
                            @foreach ($nome_entidades as $data)
                            <option value="{{$data->idEntidade}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>
                    </div>
                
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tipo de Tarefa</label>
                        <div>
                        <select name="tipo_tarefa"  style="margin-right:10px;">
                            @foreach ($tipo_class as $data)
                            <option value="{{$data->idtipo_tarefa}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                    </div><label for="username">Data do Inicio da Tarefa</label>
                      <div>
                      
                            <div class='input-group datetime' name="datetimepicker6" id="datetimepicker6"  >
                                <input type='datetime' class="form-control" placeholder="data inicial" name="datetimepicker6" id="datetimepicker6"  />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div><label for="username">Data do Fim da Tarefa</label>
                                <div class="form-group">
                            <div class='input-group datetime' name="datetimepicker7" id="datetimepicker7" >
                                <input type='datetime' class="form-control" placeholder="data final" name="datetimepicker7" id="datetimepicker7"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                          </div>
                      </div>

         
                    <div class="form-group">
                        <label class="control-label">Observações</label>
                        <div>
                          <textarea class="form-control" name="observacoes" rows="3" maxlength="150"></textarea>
                          </div>
                          <label id="count"></label>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            
                            
                            <button type ="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button href="tarefas/create" type="submit" class="btn btn-primary">
                                Criar Tarefa

                                
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->


  <div id="editTarefasModal" tabindex ="-1" class="modal fade">
    <div class="modal-dialog" role="document" >
    
        <div class="modal-content">
       
            <div class="modal-header">
           
            <form action="{{route('tarefas.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Editar tarefa</h1>
            
            
            </div>
            <div class="modal-body">

                    <input type="hidden" name="idtarefas" id="id" value="">
                    <div class="form-group">
                    
                        <label class="control-label" style="margin-right:18px;" >Entidade</label>
                        <div>
                            <select name="entidades" id="entidade">
                            @foreach ($nome_entidades as $data)
                            <option value="{{$data->idEntidade}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>
                    </div>
                
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tipo de Tarefa</label>
                        <div>
                        <select name="tipo_tarefa" id="tipo_tarefa" style="margin-right:10px;">
                            @foreach ($tipo_class as $data)
                            <option value="{{$data->idtipo_tarefa}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                    </div><label for="username">Data do Inicio da Tarefa</label>
                      <div>
                      
                            <div class='input-group datetime' name="datetimepicker6" id="datetimepicker6">
                                <input type='datetime' class="form-control" value="{{$tarefa->data_ini}}" name="datetimepicker6" id="datetimepicker6"  />
                                
                                </div><label for="username">Data do Fim da Tarefa</label>
                                <div class="form-group">
                            <div class='input-group datetime' name="datetimepicker7" id="datetimepicker7" >
                                <input type='datetime' class="form-control" value="{{$tarefa->data_fim}}" name="datetimepicker7" id="datetimepicker7"/>
                              </div>
                          </div>
                      </div>
         
                    <div class="form-group">
                        <label class="control-label">Observações</label>
                        <div>
                          <textarea class="form-control" name="observacoes" id="obs" rows="3" maxlength="150"></textarea>
                          <label id="count"></label>
                          </div>
                    </div>
                    
                    <div class="form-group">
                        <div>
                        
                            <button href="tarefas/update" type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->
</section>

@endsection


