
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
              <h1 class="box-title" >Tarefas dos proximo 30 dias </h1>
              

              
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


  
      <!-- /.row -->
    </section>
@endsection