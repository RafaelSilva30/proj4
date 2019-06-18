
<?php
          $user = auth()->user();
          
          ?>  

@if($user->can('verPrograma'))

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
       Programa
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todos os Programas </h1>
              @if($user->can('addPrograma'))
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#programasModal"></i></object>
              @endif
            </div>
            <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Nome</th>
                  <th>Data de Validade</th>
                  <th>Users </th>
                  @if($user->can('edtPrograma') || $user->can('rmPrograma'))
                  <th>Ações</th>
                  @endif
                </tr>
                </thead>
                <tbody> 
                <p></p>


                @foreach($data2 as $prog)
              <tr>

              <td>{{$prog->nome}}</td>
              <td>{{$prog->data_validade}}</td>

              <?php 

              $connect = mysqli_connect("localhost","root","","p4");
              if($connect->connect_error){
                die("connection failed:".$connect->connect_error);
              }
              $auxiliar = $prog->id_prog_user;

              $query = "SELECT user from prog_users where $auxiliar = iduser_prog";
              $result = $connect->query($query);

              while ($row = $result->fetch_assoc()) {
                echo "<td>". $row['user']. "</td>" ;
              }
              //echo("<script>console.log('PHP: ".$result."');</script>");
              //echo "<td> $result </td>";
              ?>
              
              @if($user->can('edtPrograma'))
              <td>
             <a href="#" <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal"
              data-id1="{{$prog->idprograma}}"
              data-nome="{{$prog->nome}}"
              data-data_validade="{{$prog->data_validade}}"
               data-target="#editProgramaModal" ><i class="fa fa-edit fa"></i> </a>
               @endif
               @if($user->can('rmPrograma')  && $user->can('edtPrograma'))
              <a href="programa/delete/{{$prog->idprograma}}" onclick="return confirm('Tem a certeza que quer apagar o programa: {{$prog->nome}} ?')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
              @elseif ( $user->can('rmPrograma'))
              <td><a href="programa/delete/{{$prog->idprograma}}" onclick="return confirm('Tem a certeza que quer apagar o programa: {{$prog->nome}} ?')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
              @endif
                @endforeach
              </tbody> 
                </table>


<div id="programasModal"  class="modal fade">
    <div class="modal-dialog" role="document" >
    <form method="POST" action="/programa">
        <div class="modal-content">
       
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Adicionar um novo Programa </h1>
            </div>
            <div class="modal-body">
            <div class="form-group">          
            <input type="hidden" name="Idprogramas" id="id1" value="">
              <label class="control-label" style="margin-right:18px;" >Nome do Programa</label>
            <div>
              <input type="text" name="name" id="nome" >
              </div>
            </div>
            
                      
                      <label >Validade do Programa</label>
                      <div>
                        <div class="input-group date" data-provide="datepicker" name ="datepicker0" id ="datepicker1">
                        <input type="text" class="form-control" input class="datepicker" name ="datepicker" id ="datepicker1" data-date-format="mm/dd/yyyy">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>  
                    <p>
                              </div>
                              @foreach($data3 as $user)
                              <input type="checkbox" name="user[]" value="{{$user->name}}"> {{$user->name}}<br>
                              @endforeach
                        
                            <button href="programa/create" type="submit" class="btn btn-success">
                                Adicionar Programa
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->

  <div id="editProgramaModal" tabindex ="-1" class="modal fade">
    <div class="modal-dialog" role="document" >
    
        <div class="modal-content">
       
            <div class="modal-header">
           
            <form action="{{route('programas.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
            @csrf
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Editar Programa</h1>
            </div>
            <div class="modal-body">
            
            <label class="control-label" style="margin-right:18px;" >Nome do Programa</label>
            <div>
              <input type="text" name="name" id="nome" >
              </div>
                   
                    <div class="form-group">
                    
                     <input type="hidden" name="id1" id="id1">

                     <div class='input-group date' >
                    <label>Validade do Programa:</label>
                    <input type='text' id='datetimepicker1' name='datetimepicker1' data-date-format="YYYY-MM-DD" class="form-control" />
                   
                  </div>
                  @foreach($data3 as $user)
                              <input type="checkbox" name="user[]" value="{{$user->name}}"> {{$user->name}}<br>
                              @endforeach
                    <div class="form-group">
                        <div>
                        
                            <button href="programa/update" type="submit" class="btn btn-success">
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
@else
  <h1> Nao tem permissoes </h1>
  @endif