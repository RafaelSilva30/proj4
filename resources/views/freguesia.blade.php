
<?php
          $user = auth()->user();
          
          ?>  

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
       Freguesia
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todas as Freguesias </h1>
            
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#freguesiaModal"></i></object>

            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome da Freguesia</th>
                  <th>Concelho</th>             
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody> 
                <p></p>


                @foreach($data7 as $freg)
              <tr>
              <td>{{$freg->Nome}}</td>
              <?php 
              $connect = mysqli_connect("localhost","root","","p4");
              if($connect->connect_error){
                die("connection failed:".$connect->connect_error);
              }
              $auxiliar = $freg->ID_Concelho;

              $query = "SELECT nome from concelhos where $auxiliar = idconcelho";
              $result = $connect->query($query);

              while ($row = $result->fetch_assoc()) {
                echo "<td>". $row['nome']. "</td>" ;
              }
              ?>
              <td>
              
              <a href="#  <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal"
                data-nome="{{$freg->Nome}}"
                data-id1="{{$freg->ID_Freguesia}}"
                data-concelho="{{$freg->ID_Concelho}}"
                data-target="#editfreguesiaModal" ><i class="fa fa-edit fa"></i> </a>
                <a href="freguesia/delete/{{$freg->ID_Freguesia}}" onclick="return confirm('Tem a certeza que quer apagar o Concelho: {{$freg->Nome}} ?')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a>    
               
               </td>
                @endforeach
              </tbody> 
                </table>
                </div>
                <div id="freguesiaModal"  class="modal fade">
                    <div class="modal-dialog" role="document" >
                    <form method="POST" action="/freguesia">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Adicionar uma nova Freguesia </h1>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          

                            <label class="control-label" style="margin-right:18px;" >Nome da Freguesia</label>
                            <div>
                            <input type="text" name="name" id="nome" >
                            
                            </div>
                            <label class="control-label" style="margin-right:18px;" >Concelho</label>

                        <div>
                            <select name="concelho" id="concelho">
                            @foreach ($concelho_class as $data)
                            <option value="{{$data->idconcelho}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Adicionar Freguesia
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->

  <div id="editfreguesiaModal"  class="modal fade">
                    <div class="modal-dialog" role="document" >
                    <form action="{{route('freguesia.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
            @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Editar uma Freguesia </h1>
                            </div>
                           
                            <div class="modal-body">
                            <div class="form-group">    
                            <input type="hidden" name="id1" id="id1" value="">      
                            <label class="control-label" style="margin-right:18px;" >Nome da Freguesia</label>
                            <div>
                            
                            <input type="text" name="name" id="nome">
                            </div>
                            <label class="control-label" style="margin-right:18px;" >Concelho</label>

                        <div>
                            <select name="concelho" id="concelho">
                            @foreach ($concelho_class as $data)
                            <option value="{{$data->idconcelho}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Adicionar Freguesia
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->

@endsection