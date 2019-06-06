
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
       Distritos
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todos os Distritos </h1>
            
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#distritoModal"></i></object>

            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>           
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody> 
                <p></p>


                @foreach($data5 as $dist)
              <tr>
              <td>{{$dist->nome}}</td>
              <td>
                  
              <a href="#"  <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal" 
                data-nome="{{$dist->nome}}"
                data-id1="{{$dist->iddistrito}}"
                  data-target="#editdistritoModal" ><i class="fa fa-edit fa"></i> </a>
                <a href="distrito/delete/{{$dist->iddistrito}}" onclick="return confirm('Tem a certeza que quer apagar o Distrito: {{$dist->nome}} ?')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a>
               
               </td>
                @endforeach
              </tbody> 
                </table>
                </div>
                <div id="distritoModal"  class="modal fade">
                    <div class="modal-dialog" role="document" >
                    <form method="POST" action="/distrito">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Adicionar um novo Distrito </h1>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          

                            <label class="control-label" style="margin-right:18px;" >Nome do Distrito</label>
                            <div>
                            <input type="text" name="name" id="nome" >
                            </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Adicionar Distrito
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->

  <div id="editdistritoModal"  class="modal fade">
                    <div class="modal-dialog" role="document" >
                    <form action="{{route('distrito.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
            @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Editar um Distrito </h1>
                            </div>
                           
                            <div class="modal-body">
                            <div class="form-group">    
                            <input type="hidden" name="id1" id="id1" value="">      
                            <label class="control-label" style="margin-right:18px;" >Nome do Distrito</label>
                            <div>
                            
                            <input type="text" name="name" id="nome">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Adicionar Distrito
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->

@endsection