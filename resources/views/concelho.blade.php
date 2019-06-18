
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
@if($user->can('verConcelhos'))
<section class="content-header">
    <h1>
       Concelho
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todos os Concelhos </h1>
              @if($user->can('addConcelhos'))
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#concelhoModal"></i></object>
              @endif
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome do Concelho</th>
                  <th>Distrito</th>             
                  @if($user->can('edtConcelhos') || $user->can('rmConcelhos'))
                  <th>Ações</th>
                  @endif
                </tr>
                </thead>
                <tbody> 
                <p></p>


                @foreach($data6 as $conc)
              <tr>
              <td>{{$conc->nome}}</td>
              <?php 
              $connect = mysqli_connect("localhost","root","","p4");
              if($connect->connect_error){
                die("connection failed:".$connect->connect_error);
              }
              $auxiliar = $conc->distrito;

              $query = "SELECT nome from distritos where $auxiliar = iddistrito";
              $result = $connect->query($query);

              while ($row = $result->fetch_assoc()) {
                echo "<td>". $row['nome']. "</td>" ;
              }
              ?>
              <td>
              @if($user->can('edtConcelhos'))
              <a href="#"    <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal"
                data-nome="{{$conc->nome}}"
                data-id1="{{$conc->idconcelho}}"
                data-distrito="{{$conc->distrito}}"

                data-target="#editconcelhoModal" ><i class="fa fa-edit fa"></i> </a>

                @endif
                @if($user->can('edtConcelhos') && $user->can('rmConcelhos'))
                <a href="concelho/delete/{{$conc->idconcelho}}" onclick="return confirm('Tem a certeza que quer apagar o Concelho: {{$conc->nome}} ?')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
               @elseif($user->can('rmConcelhos'))
               <td><a href="concelho/delete/{{$conc->idconcelho}}" onclick="return confirm('Tem a certeza que quer apagar o Concelho: {{$conc->nome}} ?')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
               @endif
               </td>
                @endforeach
              </tbody> 
                </table>
                </div>
                <div id="concelhoModal"  class="modal fade">
                    <div class="modal-dialog" role="document" >
                    <form method="POST" action="/concelho">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Adicionar um novo Concelho </h1>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          

                            <label class="control-label" style="margin-right:18px;" >Nome do Concelho</label>
                            <div>
                            <input type="text" name="name" id="nome" >
                            
                            </div>
                            <label class="control-label" style="margin-right:18px;" >Distrito</label>

                        <div>
                            <select name="distrito" id="distrito">
                            @foreach ($distrito_class as $data)
                            <option value="{{$data->iddistrito}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>

                            
                        </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Adicionar Concelho
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->

  <div id="editconcelhoModal"  class="modal fade">
                    <div class="modal-dialog" role="document" >
                    <form action="{{route('concelho.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
            @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Editar um Concelho </h1>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          
                            <input type="hidden" name="id1" id="id1" value="">  
                            <label class="control-label" style="margin-right:18px;" >Nome do Concelho</label>
                            <div>
                            <input type="text" name="name" id="nome" >
                            
                            </div>
                            <label class="control-label" style="margin-right:18px;" >Distrito</label>

                        <div>
                            <select name="distrito" id="distrito">
                            @foreach ($distrito_class as $data)
                            <option value="{{$data->iddistrito}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>

                            
                        </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Editar Concelho
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
@else
Nao tens permissoes
@endif
@endsection