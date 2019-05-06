
@extends('layouts.main')

@section('content')

<style type="text/css" media="Screen">
object:hover, object.hover {
  color:#006400;
  cursor: pointer; 
}
object {
  color: #4BB543;
}


</style>
<section class="content-header">
      <h1>
        Tarefas
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title" >Tarefas dos proximos 30 dias </h1>
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#entidadesModal"></i></object>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Tarefa</th>
                  <th>Id Utilizador</th>
                  <th>Tipo</th>
                  <th>Data Inicio</th>
                  <th>Data Fim</th>
                  <th>Observações</th>
                  <th>Id Entidade</th>
                </tr>
                </thead>
                <tbody>
                <?php

            $connect = mysqli_connect("localhost","root", "", "p4");
            if($connect->connect_error){
              die("Connection failed:". $connect-> connect_error);
            }

            $query = "SELECT * FROM tarefas WHERE data_fim <= CURDATE() + INTERVAL 30 DAY";
            $result = $connect -> query($query);

            if ($result-> num_rows > 0) {
              while ($row = $result-> fetch_assoc()){
                echo "<tr>";
                echo "<td>". $row["idtarefas"] ."</td>";
                echo "<td>". $row["id_utilizador"] ."</td>";
                echo "<td>". $row["tipo_tarefa_idtipo_tarefa"] ."</td>";
                echo "<td>". $row["data_inicio"] ."</td>";
                echo "<td>". $row["data_fim"] ."</td>";
                echo "<td>". $row["observacao"] ."</td>";
                echo "<td>". $row["entidade"] ."</td>";
                echo "</tr>";
              }
            }
            ?>
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
            

                <h1 class="modal-title">Nova tarefa</h1>
            </div>
            <div class="modal-body">
                
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                    @csrf
                        <label class="control-label" style="margin-right:18px;" >Indique a Entidade</label>
                        <div>
                            <select name="entidade" id="entidade">
                            @foreach ($entidade_class as $data)
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
                      
                            <div class='input-group datetime' name="datetimepicker6" id='datetimepicker6'  >
                                <input type='datetime' class="form-control" placeholder="data inicial" name="datetimepicker6" id="datetimepicker6"  />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                
                                </div><label for="username">Data do Fim da Tarefa</label>
                                <div class="form-group">
                            <div class='input-group datetime' name="datetimepicker7" id='datetimepicker7'>
                                <input type='datetime' class="form-control" placeholder="data final" name="datetimepicker7" id="datetimepicker7"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                          </div>
                      </div>
         </div>
                    <div class="form-group">
                        <label class="control-label">Observações</label>
                        <div>
                          <textarea class="form-control" name="observacoes" rows="3"></textarea>
                          </div>
                    </div>
                    <div class="form-group">
                        <div>
                        
                            <button href="tarefas/create" type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->
  
      <!-- /.row -->
    </section>
@endsection