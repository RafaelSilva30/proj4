@extends('layouts.main')
@section('content')
<?php
$aux = $data3->roles;

?>

<form class="form-horizontal " method="POST" action="/permissao/{{$data3->id}}">
@csrf
<fieldset>

<!-- Form Name -->

<section class="content-header">
    <h1>
       Editar o Utilizador
      </h1>
    </section>
<!-- Text input-->
<br>
<br>

<div class="form-group">



  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" value="{{$data3->name}}" class="form-control input-md" required="">
  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput2">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" value="{{$data3->email}}" class="form-control input-md" required="">
  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
</div>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Permissões</label>
  <div class="col-md-8">
  <div class="checkbox">
    <label for="checkboxes-0">
    <div class="col-md-6">
    
    <input type="checkbox" name="permissao[]" value="verUtilizadores"@if($data3->can('verUtilizadores')) checked @endif > Listar Utilizadores<br>
        <input type="checkbox" name="permissao[]" value="addUtilizadores" @if($data3->can('addUtilizadores')) checked @endif> Criar Utilizadores<br>
        <input type="checkbox" name="permissao[]" value="edtUtilizadores" @if($data3->can('edtUtilizadores')) checked @endif> Editar Utilizadores<br>
        
        <input type="checkbox" name="permissao[]" value="rmUtilizadores" @if($data3->can('rmUtilizadores')) checked @endif> Remover Utilizadores<br>
        
        <input type="checkbox" name="permissao[]" value="verDistritos"@if($data3->can('verDistritos')) checked @endif> Listar Distritos<br>
        <input type="checkbox" name="permissao[]" value="addDistritos" @if($data3->can('addDistritos')) checked @endif> Criar Distritos<br>
        <input type="checkbox" name="permissao[]" value="edtDistritos" @if($data3->can('edtDistritos')) checked @endif> Editar Distritos<br>
        
        <input type="checkbox" name="permissao[]" value="rmDistritos" @if($data3->can('rmDistritos')) checked @endif> Remover Distritos<br>
        <input type="checkbox" name="permissao[]" value="verConcelhos"@if($data3->can('verConcelhos')) checked @endif> Listar Concelhos<br>
        <input type="checkbox" name="permissao[]" value="addConcelhos" @if($data3->can('addConcelhos')) checked @endif> Criar Concelhos<br>
        <input type="checkbox" name="permissao[]" value="edtConcelhos"@if($data3->can('edtConcelhos')) checked @endif> Editar Concelhos<br>
        <input type="checkbox" name="permissao[]" value="rmDistritos" @if($data3->can('rmDistritos')) checked @endif> Remover Concelhos<br>

        <input type="checkbox" name="permissao[]" value="verFreguesias"@if($data3->can('verFreguesias')) checked @endif> Listar Freguesias<br>
        <input type="checkbox" name="permissao[]" value="addFreguesias" @if($data3->can('addFreguesias')) checked @endif> Criar Freguesias<br>
        <input type="checkbox" name="permissao[]" value="edtFreguesias"@if($data3->can('edtFreguesias')) checked @endif> Editar Freguesias<br>
        <input type="checkbox" name="permissao[]" value="rmFreguesias"@if($data3->can('rmFreguesias')) checked @endif> Remover Freguesias<br>

        
        
        
	</div>

    <div class="col-md-6">
    <input type="checkbox" name="permissao[]" value="verTarefas" @if($data3->can('verTarefas')) checked @endif> Listar Tarefas<br>
        <input type="checkbox" name="permissao[]" value="addTarefas" @if($data3->can('addTarefas')) checked @endif> Criar Tarefas<br>
        <input type="checkbox" name="permissao[]" value="edtTarefas" @if($data3->can('edtTarefas')) checked @endif> Editar Tarefas<br>
        <input type="checkbox" name="permissao[]" value="rmTarefas" @if($data3->can('rmTarefas')) checked @endif> Remover Tarefas<br>
    <input type="checkbox" name="permissao[]" value="verEntidades" @if($data3->can('verEntidades')) checked @endif> Listar Entidades<br>
    <input type="checkbox" name="permissao[]" value="addEntidades" @if($data3->can('addEntidades')) checked @endif> Criar Entidades<br>
    <input type="checkbox" name="permissao[]" value="edtEntidades" @if($data3->can('edtEntidades')) checked @endif> Editar Entidades<br>

    <input type="checkbox" name="permissao[]" value="rmEntidades" @if($data3->can('rmEntidades')) checked @endif> Remover Entidades<br>
    <input type="checkbox" name="permissao[]" value="verPrograma" @if($data3->can('verPrograma')) checked @endif> Listar Programas<br>
    <input type="checkbox" name="permissao[]" value="addPrograma" @if($data3->can('addPrograma')) checked @endif> Criar Programas<br>
    <input type="checkbox" name="permissao[]" value="edtPrograma" @if($data3->can('edtPrograma')) checked @endif> Editar Programas<br>

    <input type="checkbox" name="permissao[]" value="rmPrograma" @if($data3->can('rmPrograma')) checked @endif> Remover Programas<br>
    <input type="checkbox" name="permissao[]" value="verContabilista" @if($data3->can('verContabilista')) checked @endif> Listar Contabilistas<br>
    <input type="checkbox" name="permissao[]" value="addContabilista" @if($data3->can('addContabilista')) checked @endif> Criar Contabilistas<br>
    <input type="checkbox" name="permissao[]" value="edtContabilista" @if($data3->can('edtContabilista')) checked @endif> Editar Contabilistas<br>

    <input type="checkbox" name="permissao[]" value="rmContabilista" @if($data3->can('rmContabilista')) checked @endif> Remover Contabilistas<br>
    <input type="checkbox" name="permissao[]" value="verLogs" @if($data3->can('verLogs')) checked @endif> Listar Logs<br>

    <strong><input type="checkbox" onClick="toggle(this)" /> Selecionar Todos<br/></strong>
	</div>

    </div>
    <br>
    <strong> 

    <br>
     
        </strong>
        
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
        <br>
        <button type="submit"  onclick="return confirm('Tem a certeza que quer guardar as alterações?')" class="btn btn-primary">
            {{ __('Guardar Alterações') }}
        </button>
            </div>
        </div>
  </div>
  
</div>

</fieldset>
</form>

@endsection