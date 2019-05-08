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
       Entidades
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todas as Entidades </h1>
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#entidadesModal"></i></object>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Entidade</th>
                  <th>Nome</th>
                  <th>Contacto</th>
                  <th>Email</th>
                  <th>Programa</th>
                  <th>Contabilista</th>
                  <th>Validade do Contrato</th>
                  <th>Contacto do Contabilista</th>
                  <th>Observações</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody> 
                <p></p>


                @foreach($data as $entidade)
              <tr>
              <td>{{$entidade->idEntidade}}</td>
              <td>{{$entidade->nome}}</td>
              <td>{{$entidade->contacto}}</td>
              <td>{{$entidade->email}}</td>
              <td>{{$entidade->programa}}</td>
              <td>{{$entidade->contabilista}}</td>
              <td>{{$entidade->validade_contrato}}</td>
              <td>{{$entidade->contacto_contabilista}}</td>
              <td>{{$entidade->observacoes}}</td>
               <td >  <button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button>
              </tr>
                @endforeach
            
                </tbody>
              </table>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <div id="entidadesModal" tabindex ="-1" class="modal fade">
    <div class="modal-dialog" role="document" >
    
        <div class="modal-content">
       
            <div class="modal-header">
           
            <form action="{{route('tarefas.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Adicionar </h1>
            

            </div>
            <div class="modal-body">

                      <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Indique o nome da Entidade</label>
                        <div>
                          <input type="text" id="name" name="name" >
                        </div>
                      </div>
                
                      <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Indique o contacto telefónico da Entidade</label>
                        <div>
                          <input type="text" id="contacto" name="contacto" >
                        </div>´

                      <div class="form-group">                    
                      <label class="control-label" style="margin-right:18px;" >Indique o email da Entidade</label>
                      <div>
                        <input type="text" id="email" name="email" >
                      </div>

                      <label >Validade do Contrato</label>
                      <div>
                          <div class='input-group datetime' name="datetimepicker6" id='datetimepicker6'  >
                            <input type='datetime' class="form-control" name="datetimepicker6" id="datetimepicker6"  />
                              <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                        </div>

                        <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Indique o contacto telefónico do contabilista</label>
                        <div>
                          <input type="text" id="contactocontabilista" name="contactocontabilista" >
                        </div>´

         
                    <div class="form-group">
                        <label class="control-label">Observações</label>
                        <div>
                          <textarea class="form-control" name="observacoes" id="obs" rows="3"></textarea>
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