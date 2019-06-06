<?php
  $userlog = auth()->user(); 
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
@if($userlog->alterarPermissoes == 1)  

@extends('layouts.main')
@section('content')
<section class="content-header">
    <h1>
      Utilizadores
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    @if(count($errors) > 0)
            <div class="aler alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
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
              <h1 class="box-title">Selecione o Utilizador </h1>
               <object align="right"><i class="fa fa-plus-square fa-2x"  data-target="#novoUserModal" type="button" 
              class="bv" data-toggle="modal"></i></object>

            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th> Nome </th>
                <th> Email </th>
                </thead>
                <tbody> 
                <p></p>
                </tr>
                @foreach($data3 as $user)
              <tr>

              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              
              <td>
              <a href="#  <button type="button" class="btn btn-warning" type="button" class="bv" data-toggle="modal"
                data-id="{{$user->id}}"
                data-nome="{{$user->name}}"
                data-email="{{$user->email}}"
                data-target="#editUserModal" ><i class="fa fa-edit fa"></i> </a>


                <a href="#  <button type="button" class="btn btn-primary" type="button" class="bv" data-toggle="modal"
                data-target="#editPermissoes" ><i class="fa fa-lock fa"></i> </a>

                </td>
                @endforeach
              </tbody> 
                </table>
                </div>
                </div>
                </div>
</section>
      



        <div id="novoUserModal"  class="modal fade">
                    <div class="modal-dialog" role="document">
                    <form method="POST" action="/registar"> 
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Adicionar um novo Utilizador </h1>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" id ="password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" id ="confirm_password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                           
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registar') }}
                                </button>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <div id="editUserModal"  class="modal fade">
                    <div class="modal-dialog" role="document">
                    <form action="{{route('registar.update','test')}}" method="POST" id="editForm">
            {{ method_field('patch') }}
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Adicionar um novo Utilizador </h1>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">          

                            <div class="form-group row">
                            <input type="hidden" name="idUser" id="id" value="">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registar') }}
                                </button>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <div id="editPermissoes"  class="modal fade">
                    <div class="modal-dialog" role="document">
                    <form method="POST" action="/registar"> 
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @csrf
                            <h1 class="modal-title">Editar Permissões </h1>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                <input type="checkbox" name="nUser" value="nUser"> Criar Utilizadores<br>
                                <input type="checkbox" name="eUser" value="eUser"> Editar Utilizadores<br>
                                <input type="checkbox" name="lUser" value="lUser"> Listar Utilizadores<br>
                                <input type="checkbox" name="rUser" value="rUser"> Remover Utilizadores<br>
                                <input type="checkbox" name="nDist" value="nDist"> Criar Distritos<br>
                                <input type="checkbox" name="eDist" value="eDist"> Editar Distritos<br>
                                <input type="checkbox" name="lDist" value="lDist"> Listar Distritos<br>
                                <input type="checkbox" name="rDist" value="rDist"> Remover Distritos<br>
                                <input type="checkbox" name="nConc" value="nConc"> Criar Concelho<br>
                                <input type="checkbox" name="eConc" value="eConc"> Editar Concelho<br>
                                <input type="checkbox" name="lConc" value="lConc"> Listar Concelho<br>
                                <input type="checkbox" name="rConc" value="rConc"> Remover Concelho<br>
                                <input type="checkbox" name="nTarefa" value="nTarefa"> Criar Tarefas<br>
                     <input type="checkbox" name="eTarefa" value="eTarefa"> Editar Tarefas<br>
                                </div>
                     <div class="col-md-4">
           
                     <input type="checkbox" name="lTarefa" value="lTarefa"> Listar Tarefas<br>
                     <input type="checkbox" name="rTarefa" value="rTarefa"> Remover Tarefas<br>
                     <input type="checkbox" name="cEntidade" value="cEntidade"> Criar Entidades<br>
                     <input type="checkbox" name="eEntidade" value="eEntidade"> Editar Entidades<br>
                     <input type="checkbox" name="lEntidade" value="lEntidade"> Listar Entidades<br>
                     <input type="checkbox" name="rEntidade" value="rEntidade"> Remover Entidades<br>
                     <input type="checkbox" name="nPrograma" value="nPrograma"> Criar Programas<br>
                     <input type="checkbox" name="ePrograma" value="ePrograma"> Editar Programas<br>
                     <input type="checkbox" name="lPrograma" value="lPrograma"> Listar Programas<br>
                     <input type="checkbox" name="rPrograma" value="rPrograma"> Remover Programas<br>

                     <input type="checkbox" name="nContabilista" value="nContabilista"> Criar Contabilistas<br>
                     <input type="checkbox" name="eContabilista" value="eContabilista"> Editar Contabilistas<br>
                     <input type="checkbox" name="lContabilista" value="lContabilista"> Listar Contabilistas<br>
                     <input type="checkbox" name="rContabilista" value="rContabilista"> Remover Contabilistas<br>

                     </div>

                     <div class="col-md-3">
                     <input type="checkbox" name="lLogs" value="lLogs"> Listar Logs<br>
                     <input type="checkbox" name="selecionartudo" value="selecionartudo"> Selecionar tudo<br>
                     <input type="checkbox" name="limpartodos" value="limpartodos"> Limpar tudo<br>
                     </div>
                     </div>

                           
                          
                            

                           <p>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Alterações   ') }}
                                </button>
                            </div>
                            </div>
                            </div>
                            
                        
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

@else
  ERROOOO
@endif
@endsection
