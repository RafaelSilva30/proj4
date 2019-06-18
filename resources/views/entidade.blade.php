
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

@if($user->can('verEntidades'))
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
              @if($user->can('addEntidades'))
              <object align="right"><i class="fa fa-plus-square fa-2x"   type="button" 
              class="bv" data-toggle="modal" data-target="#entidadesModal"></i></object>
              @endif
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Nome</th>
                  <th>Contacto</th>
                  <th>Email</th>
                  <th>Programas</th>
                  <th>Contabilista</th>
                  <th>Validade do Contrato</th>
                  <th>Contacto do Contabilista</th>
                  <th>Observações</th>
                  @if($user->can('edtEntidades') || $user->can('rmEntidades'))
                  <th>Ações</th>
                  @endif
                </tr>
                </thead>
                <tbody> 
                <p></p>


                @foreach($data as $entidade)
              <tr>

              <td>{{$entidade->nome}}</td>
              <td>{{$entidade->contacto}}</td>
              <td>{{$entidade->email}}</td>

              <?php 
              
              $connect = mysqli_connect("localhost","root","","p4");

              if($connect->connect_error){
                die("connection failed:".$connect->connect_error);
              }
              $auxiliar = $entidade->programa;

              $query = "SELECT programas from ent_progs where $auxiliar = entidadePrograma";
              $result = $connect->query($query);

              while ($row = $result->fetch_assoc()) {
                echo "<td>". $row['programas']. "</td>" ;
              }
              //echo("<script>console.log('PHP: ".$result."');</script>");
              //echo "<td> $result </td>";
              ?>

              <?php 
              
              $connect = mysqli_connect("localhost","root","","p4");

              if($connect->connect_error){
                die("connection failed:".$connect->connect_error);
              }
              $auxiliar = $entidade->contabilista;

              $query = "SELECT nome from contabilistas where $auxiliar = idcontabilista";
              $result = $connect->query($query);

              while ($row = $result->fetch_assoc()) {
                echo "<td>". $row['nome']. "</td>" ;
              }
              //echo("<script>console.log('PHP: ".$result."');</script>");
              //echo "<td> $result </td>";
              $query = "SELECT entidade from tarefas";
              $result = $query;
              
              $query2 = "SELECT entidades.idEntidade from entidades,tarefas WHERE entidades.idEntidade=tarefas.entidade";
              $result2 = $connect->query($query2);
              
              $row2 = $result2->fetch_assoc();
              


              ?>
               
              <td>{{$entidade->validade_contrato}}</td>
              <td>{{$entidade->contacto_contabilista}}</td>
              <td>{{$entidade->observacoes}}</td>

             

             
              
               
                
              

              @if($user->can('edtEntidades'))
              <td>
              <a href= "#" <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal"
              data-id="{{$entidade->idEntidade}}"
              data-nome="{{$entidade->nome}}"
              data-distrito="{{$entidade->distrito}}"
              data-concelho="{{$entidade->concelho}}"
              data-contacto="{{$entidade->contacto}}"
              data-email="{{$entidade->email}}"
              data-datacontrato="{{$entidade->validade_contrato}}"
              data-contabilista="{{$entidade->contabilista}}"
              data-contactocontabilista="{{$entidade->contacto_contabilista}}"
              data-programa="{{$entidade->programa}}"
              data-observacoes="{{$entidade->observacoes}}"
               data-target="#editEntidadesModal" ><i class="fa fa-edit fa"></i> </a>
               @endif

               @if($user->can('edtEntidades') && $user->can('rmEntidades'))
                <a href="entidades/delete/{{$entidade->idEntidade}}" onclick="return confirm('Tem a certeza que quer apagar a entidade: {{$entidade->nome}}')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
                @elseif ( $user->can('rmEntidades'))
               <td> <a href="entidades/delete/{{$entidade->idEntidade}}" onclick="return confirm('Tem a certeza que quer apagar a entidade: {{$entidade->nome}}')"><button type="button" class="btn btn-danger"><i class="fa fa-remove fa" ></i></button></a> </td>
                @endif
                </td>
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

      <div id="entidadesModal"  class="modal fade">
    <div class="modal-dialog" role="document" >
    <form method="POST" action="/entidade">
        <div class="modal-content">
       
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Adicionar uma nova Entidade </h1>
            

            </div>
            <div class="modal-body">
            <div class="form-group">          
                  
              <label class="control-label" style="margin-right:18px;" > Nome da Entidade</label>
            <div>
              <input type="text" name="name" id="nome" >
              </div>
            </div>
            <label class="control-label" style="margin-right:18px;" >Distrito</label>
                        <label class="control-label" style="margin-right:18px;" >Concelho</label>
                        <div>
                            <select name="distrito" id="distrito">
                            @foreach ($distrito_class as $data)
                            <option value="{{$data->iddistrito}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>

                            <select name="concelho" id="concelho">
                            @foreach ($concelho_class as $data)
                            <option value="{{$data->idconcelho}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>
                        <p> </p>
                      <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Contacto telefónico da Entidade</label>
                        <div>
                          <input type="text" id="contacto" name="contacto" >
                        </div>
                      <div class="form-group">                    
                      <label class="control-label" style="margin-right:18px;" >Email da Entidade</label>
                      <div>
                        <input type="text" id="email" name="email" >
                      </div>
                      <label >Validade do Contrato</label>
                      <div>
                        <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" input class="datepicker" name ="datepicker" data-date-format="mm/dd/yyyy">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>  
                              </div>

                        <label class="control-label" style="margin-right:18px;" >Contabilista</label>
                        <div>
                            <select name="contabilista">
                            @foreach ($contabilista_class as $data)
                            <option value="{{$data->idcontabilista}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>

                        <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Contacto telefónico do contabilista</label>
                        <div>
                          <input type="text" id="contactocontabilista" name="contactocontabilista" >
                        </div>

                        <label class="control-label" style="margin-right:18px;" >Programa</label>
                        <div>
                            
                            @foreach ($programa_class as $data)
                            <input type="checkbox" name="programa[]" value="{{$data->nome}}"> {{$data->nome}}<br>
                            @endforeach 
                            </select>
                        </div>


                    <div class="form-group">
                        <label class="control-label">Observações</label>
                        <div>
                          <textarea class="form-control" name="observacoes" id="obs" rows="3" maxlength="150"></textarea>
                          </div>
                    </div>
                    <div class="form-group">
                        <div>
                        
                            <button href="entidade/create" type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --> 
  </div><!-- /.modal -->

</div>
</div>
</div>

<div id="editEntidadesModal"  class="modal fade">
    <div class="modal-dialog" role="document" >
    <form action="{{route('entidade.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
        <div class="modal-content">
       
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <h1 class="modal-title">Editar uma Entidade </h1>
            

            </div>
            <div class="modal-body">
            <div class="form-group">          
            <input type="hidden" name="idEntidade" id="id" value="">
              <label class="control-label" style="margin-right:18px;" >Nome da Entidade</label>
            <div>
              <input type="text" name="name" id="nome" >
              </div>
            </div>
            <label class="control-label" style="margin-right:18px;" >Distrito</label>
                        <label class="control-label" style="margin-right:18px;" > Concelho</label>
                        <div>
                            <select name="distrito" id="distrito">
                            @foreach ($distrito_class as $data)
                            <option value="{{$data->iddistrito}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>

                            <select name="concelho" id="concelho">
                            @foreach ($concelho_class as $data)
                            <option value="{{$data->idconcelho}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>
                        <p> </p>
                      <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Contacto telefónico da Entidade</label>
                        <div>
                          <input type="text" id="contacto" name="contacto" >
                        </div>
                      <div class="form-group">                    
                      <label class="control-label" style="margin-right:18px;" >Email da Entidade</label>
                      <div>
                        <input type="text" id="email" name="email" >
                      </div>
                      <div class='input-group date' >
                    <label>Validade do Contrato:</label>
                    <input type='text' id='datetimepicker1' name='datetimepicker1' data-date-format="YYYY-MM-DD" class="form-control" />
                    
                  </div>

                        <label class="control-label" style="margin-right:18px;" >Contabilista</label>
                        <div>
                            <select name="contabilista" id="contabilista">
                            @foreach ($contabilista_class as $data)
                            <option value="{{$data->idcontabilista}}" >{{$data->nome}}</option>
                            @endforeach 
                            </select>
                        </div>

                        <div class="form-group">                    
                        <label class="control-label" style="margin-right:18px;" >Contacto telefónico do contabilista</label>
                        <div>
                          <input type="text" id="contactocontabilista" name="contactocontabilista" >
                        </div>

                        <label class="control-label" style="margin-right:18px;" >Programa</label>
                        <div>
                        @foreach ($programa_class as $data)
                            <input type="checkbox" name="programa[]" value="{{$data->nome}}"> {{$data->nome}}<br>
                            @endforeach 
                            </select>
                        </div>
                    <div class="form-group">
                        <label class="control-label">Observações</label>
                        <div>
                          <textarea class="form-control" name="observacoes" id="observacoes" rows="3" maxlength="150"></textarea>
                          <label id="count"></label>
                          </div>
                    </div>
                    <div class="form-group">
                        <div>
                        
                            <button href="entidade/update" type="submit" class="btn btn-success">
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

      @else

      <section class="content-header">
      <h1> Não tem Permissões para aceder a esta página.</h1>
    </section>


@endif
@endsection