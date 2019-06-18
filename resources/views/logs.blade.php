

<?php
          $user = auth()->user();
          
          ?>  

@extends('layouts.main')

@section('content')
@if($user->can('verLogs'))
<section class="content-header">

    <h1>
       Logs
      </h1>
    </section>

   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h1 class="box-title">Todos os Logs </h1>
              </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Data</th>
                  <th>Menu</th>
                  <th>IP</th>
                  <th>Descricao</th>
                  <th>User Id</th>
                  </tr>
                  </thead>
                <tbody> 
                <p></p>
                @foreach($data4 as $log)
              <tr>
              <td>{{$log->updated_at}}</td>
              <td>{{$log->Menu}}</td>
              <td>{{$log->ip}}</td>
              <td>{{$log->descricao}}</td>
              <td>{{$log->users_id}}</td>
              @endforeach
              </tbody> 
                </table>
                </div>

                </div>
                </div>

  @else
  Nao tens permissões
  @endif
@endsection