
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
@if($user->can('verContabilista'))
<section class="content-header">
    <h1>
       Contabilista
      </h1>
</section>
    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title">Todas os Contabilistas </h1>
                    @if($user->can('addContabilista'))
                    <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
                    class="bv" data-toggle="modal" data-target="#ContabilistaModal"></i></object>
                    @endif
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                    <th>Nome</th>
                    <th>Contacto</th>
                    <th>Email</th>
                    @if($user->can('edtContabilista') || $user->can('rmContabilista'))
                  <th>Ações</th>
                  @endif
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($data3)>=1)
                    
                    @foreach($data3 as $contabilista)

                    <tr>

                    <td>{{$contabilista->nome}}</td>
                    <td>{{$contabilista->contacto}}</td>
                    <td>{{$contabilista->email}}</td>
                        
                  
                    @if($user->can('edtContabilista'))
                        <td>
                       <a href="#" <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal" 
                        data-id = "{{$contabilista->idcontabilista}}"
                        data-nome = "{{$contabilista->nome}}"
                        data-contacto = "{{$contabilista->contacto}}"
                        data-email = "{{$contabilista->email}}"
                        data-target="#editarContabilista" ><i class="fa fa-edit fa"></i> </a>
                        @endif
                        @if($user->can('edtContabilista') && $user->can('rmContabilista'))
                        <a href="contabilista/delete/{{$contabilista->idcontabilista}}"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
                        @elseif ($user->can('rmContabilista'))
                       <td> <a href="contabilista/delete/{{$contabilista->idcontabilista}}"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
                        @endif
                    </td>
                    </tr>
                    
                  
                    @endforeach

                    @endif
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div id="ContabilistaModal"  class="modal fade">
    <div class="modal-dialog" role="document" >
    <form method="POST" action="/contabilista">
        <div class="modal-content">
       
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Adicionar um novo Contabilista </h1>
            @csrf
           
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          
                                <input type="hidden" name="id" id="id" value="">
                            <label class="control-label" style="margin-right:18px;" >Nome do Contabilista</label>
                            <div>
                                <input type="text" name="name" id="nome"  >
                            </div>

                            
                                    
                            <label class="control-label" style="margin-right:18px;" >Contacto do Contabilista</label>
                            <div>
                                <input type="text" name="contact" id="contacto" maxlength="9" >
                            </div>


                            <label class="control-label" style="margin-right:18px;" >Email do Contabilista</label>
                            <div>
                                <input type="text" name="email" id="email">
                            </div>
                            </div>
                            <button href="contabilista/create" type="submit" class="btn btn-success">
                                Adicionar Contabilista
                            </button>
                        </div>
                    </div>
                </form>
         
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 

    <div id="editarContabilista"  class="modal fade">
    <div class="modal-dialog" role="document" >
    <form action="{{route('contabilista.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
        <div class="modal-content">
       
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Editar um  Contabilista </h1>
            @csrf
           
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          
                                <input type="hidden" name="id" id="id" value="">
                            <label class="control-label" style="margin-right:18px;" >Nome do Contabilista</label>
                            <div>
                                <input type="text" name="name" id="nome"  >
                            </div>

                            
                                    
                            <label class="control-label" style="margin-right:18px;" >Contacto do Contabilista</label>
                            <div>
                                <input type="text" name="contact" id="contacto" maxlength="9" >
                            </div>


                            <label class="control-label" style="margin-right:18px;" >Email do Contabilista</label>
                            <div>
                                <input type="text" name="email" id="email">
                            </div>
                            </div>
                            <button href="contabilista/update" type="submit" class="btn btn-success">
                                Adicionar Contabilista
                            </button>
                        </div>
                    </div>
                </form>
         
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 

</section>
  @endif
@endsection