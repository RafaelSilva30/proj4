<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proj4</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>



</head>

</head>
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>4</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Proj</b>4</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/logo.png" class="user-image" alt="User Image">

                <?php

                  $user = auth()->user();

                  echo"<span class='hidden-xs'>$user->name</span>";
                  
                ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/logo.png" class="img-circle" alt="User Image">
                <p>
                {{$user->name}}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <a href="#" class="btn btn-default btn-flat" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __( ' Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

        <?php
          $user = auth()->user();
          echo"<p>$user->name</p>";
          ?>
          <i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less style="display: block;" -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        @if($user->can('verTarefas'))
        <li class="treeview">
          <a href="#">
          <i class="fa fa-tasks" ></i><span>Tarefas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-down"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('home')}}"><i class="fa fa-circle-o"></i> Consultar proximas tarefas</a></li>
            <li><a href="{{route('tarefas')}}"><i class="fa fa-circle-o"></i> Todas as Tarefas</a></li>
          </ul>
          </li>
          @endif

           @if($user->can('addUtilizadores'))
        <li class="treeview">
        <a href="#">
          <i class="fa fa-users" ></i><span>Utilizadores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-down"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li> <a href="{{route('permissoes')}}"><i class="fa fa-unlock" aria-hidden="true"></i> <span>Gerir utilizadores</span></a></li>
        </ul>
        </li>
        @endif

        @if($user->can('verDistritos') || ($user->can('verConcelhos')) || ($user->can('verFreguesias')))
        <li class="treeview">
        <a href="#">
          <i class="fa fa-users" ></i><span>Munícipios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-down"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @if($user->can('verDistritos'))
        <li> <a href="{{route('distrito')}}"><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Distritos</span></a></li>
        @endif
        @if($user->can('verConcelhos'))
        <li> <a href="{{route('concelho')}}"><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Concelhos</span></a></li>
        @endif
        @if($user->can('verFreguesias'))
        <li> <a href="{{route('freguesia')}}"><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Freguesia</span></a></li>
        @endif
        </ul>
        </li>
        
        @endif
        @if($user->can('verEntidades'))
        <li class="treeview">
        <li> <a href="{{route('entidade')}}"><i class="fa fa-user-circle"></i></i> <span>Entidades</span></li>
            <span class="pull-right-container" >
            </span>
          </a>
        </li>
        @endif
        @if($user->can('verPrograma'))
        <li class="treeview">
        <li> <a href="{{route('programa')}}"><i class="fa fa-copyright" aria-hidden="true"></i> <span>Programas</span></li>
            <span class="pull-right-container" >
            </span>
          </a>
        </li>
        @endif
        @if($user->can('verContabilista'))
        <li class="treeview">
        <li> <a href="{{route('contabilista')}}"><i class="fa fa-eur" aria-hidden="true"></i> <span>Contabilista</span></li>
            <span class="pull-right-container" >
            </span>
          </a>
        </li>
        @endif
        @if($user->can('verLogs'))
        <li class="treeview">
        <li> <a href="{{route('logs')}}"><i class="fa fa-cogs" aria-hidden="true"></i> <span>logs</span></li>
            <span class="pull-right-container" >
            </span>
          </a>
        </li>

        @endif
        
        </ul>
        
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018-2019 Miguel e Rafael </a> &nbsp;&nbsp;</strong>  All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 
<script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->


  <script src="./../bower_components/moment/min/moment.min.js"></script>
  <script src="./../bower_components/moment/locale/pt.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="../../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="../../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

  
<!-- page script -->
<script>
  $(function () {
    var table = $('#example1').dataTable({

   
      "language": {
            "lengthMenu": "Mostrar _MENU_ registos por página",
            "emptyTable": "Sem dados disponíveis",
            "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
            "info": "A mostrar de _START_ até _END_ de _TOTAL_ registos",
            "infoFiltered": "(filtrado de _MAX_ registos no total)",
            "search": "Procurar:",
            "zeroRecords": "Não foram encontrados resultados",  
            "paginate": {
            "first": "Primeiro",
            "last": "Último",
            "next": "Seguinte",
            "previous": "Anterior"
            }
        },
  });


    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,

    })
    $('#example10').DataTable({
      'ordering'    : false,
      'paging'      : true,


    })
 

  var table1 = $('#example5').dataTable({

    
"language": {
      "lengthMenu": "Mostrar _MENU_ registos por página",
      "emptyTable": "Sem dados disponíveis",
      "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
      "info": "A mostrar de _START_ até _END_ de _TOTAL_ registos",
      "infoFiltered": "(filtrado de _MAX_ registos no total)",
      "search": "Procurar:",
      "zeroRecords": "Não foram encontrados resultados",  
      "paginate": {
      "first": "Primeiro",
      "last": "Último",
      "next": "Seguinte",
      "previous": "Anterior"
      }
  },
  "order": [[ 1, "desc" ]],

});
$('div.dataTables_filter input').unbind();
  $('div.dataTables_filter input').bind('keyup', function(e) {
      if(e.keyCode == 13) {
        table.fnFilter(this.value);
          table1.fnFilter(this.value);
      } 
  });
})
</script>



<script>

    $('#editTarefasModal').on('show.bs.modal', function (event) {
      console.log('modal open');
      var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var entidade = button.data('myentidade')
      var tipotarefa = button.data('tipotarefa')
      var dataini = button.data('dataini')
      var datafinal = button.data('datafim')
      var obs = button.data('observacao')
      var id = button.data('id');
      
      var modal = $(this)

      modal.find('.modal-body #entidade').val(entidade)
      modal.find('.modal-body #tipo_tarefa').val(tipotarefa)
      modal.find('.modal-body #datetimepicker6').val(dataini)
      modal.find('.modal-body #datetimepicker7').val(datafinal)
      modal.find('.modal-body #obs').val(obs)
      modal.find('.modal-body #id').val(id)
      
    })

</script>
<script>

$('#editEntidadesModal').on('show.bs.modal', function (event) {
  console.log('modal open');
  var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  

  var nome = button.data('nome')
      var distrito = button.data('distrito')
      var concelho = button.data('concelho')
      var contacto = button.data('contacto')
      var email = button.data('email')
      var datacontrato = button.data('datacontrato');
      var contabilista = button.data('contabilista');
      var contactocontabilista = button.data('contactocontabilista');
      var observacoes = button.data('observacoes');
      var id = button.data('id');
      
      var modal = $(this)

      modal.find('.modal-body #nome').val(nome)
      modal.find('.modal-body #distrito').val(distrito)
      modal.find('.modal-body #concelho').val(concelho)
      modal.find('.modal-body #contacto').val(contacto)
      modal.find('.modal-body #email').val(email)
      modal.find('.modal-body #datetimepicker1').val(datacontrato)
      modal.find('.modal-body #contabilista').val(contabilista)
      modal.find('.modal-body #contactocontabilista').val(contactocontabilista)
      modal.find('.modal-body #observacoes').val(observacoes)
      modal.find('.modal-body #id').val(id)



})

</script>


<script>

    $('#editProgramaModal').on('show.bs.modal', function (event) {
      console.log('modal open');
      var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
     
      
      var id = button.data('id1');
      var nome = button.data('nome');
      var data_val = button.data('data_validade');
      
      var modal = $(this)
      modal.find('.modal-body #datetimepicker1').val(data_val)
      modal.find('.modal-body #id1').val(id)
      modal.find('.modal-body #nome').val(nome)
   
    })

</script>

<script>

    $('#editPermissoes').on('show.bs.modal', function (event) {
      console.log('modal open');
      var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
     
      var id = button.data('id');
      
      
      var modal = $(this)

      
      modal.find('.modal-body #id').val(id)



   
    })

</script>

<script>

$('#editdistritoModal').on('show.bs.modal', function (event) {
  console.log('modal open');
  var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 
  
  var id = button.data('id1');
  var nome = button.data('nome');
  

  
  var modal = $(this)

  modal.find('.modal-body #id1').val(id)
  modal.find('.modal-body #nome').val(nome)
  

})

</script>

<script>

$('#editconcelhoModal').on('show.bs.modal', function (event) {
  console.log('modal open');
  var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  
  
  var id = button.data('id1');
  var nome = button.data('nome');
  var distrito = button.data('distrito')
  
  var modal = $(this)

  modal.find('.modal-body #id1').val(id)
  modal.find('.modal-body #nome').val(nome)
  modal.find('.modal-body #distrito').val(distrito)
})

</script>

<script>

$('#editfreguesiaModal').on('show.bs.modal', function (event) {
  console.log('modal open');
  var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 
  
  var id = button.data('id1');
  var nome = button.data('nome');
  var concelho = button.data('concelho')

  
  var modal = $(this)

  modal.find('.modal-body #id1').val(id)
  modal.find('.modal-body #nome').val(nome)
  modal.find('.modal-body #concelho').val(concelho)

})

</script>

<script>

    $('#exampleModalPreview').on('show.bs.modal', function (event) {
      console.log('modal open');
      var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
     
      
      var id = button.data('id1');
     
      
      var modal = $(this)
 
      modal.find('.modal-body #id1').val(id)
     var temp = id;

   
    })

</script>



<script>

    $('#editarContabilista').on('show.bs.modal', function (event) {
      console.log('modal open');
      var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       var id_programa = button.data('id');
      var nome = button.data('nome');
      var contacto = button.data('contacto');
      var email = button.data('email');
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id_programa)
      modal.find('.modal-body #nome').val(nome)
      modal.find('.modal-body #contacto').val(contacto)
      modal.find('.modal-body #email').val(email)
      

   
    })

</script>


<script>

$('#editUserModal').on('show.bs.modal', function (event) {
  console.log('modal open');
  var button = $(event.relatedTarget) // Button that triggered the modal// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  

      var nome = button.data('nome')
      var email = button.data('email')
      var id = button.data('id');
      
      var modal = $(this)

      modal.find('.modal-body #name').val(nome)
      modal.find('.modal-body #email').val(email)
      
      modal.find('.modal-body #id').val(id)




})
</script>


<script>

$(function(){
 $('btn_edit').click(function() {
   $('#timePopup').modal('show');
 });
});

</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({ 
          locale: 'pt',
          format:'YYYY-MM-DD HH:mm:ss',
          });
        $('#datetimepicker7').datetimepicker({
          format:'YYYY-MM-DD HH:mm:ss',
            locale: 'pt',
        });
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $('.datepicker').datepicker({

        }).on('hide', function(e) {
        e.stopPropagation();
      });

      $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $('.datepicker1').datepicker({

        }).on('hide', function(e) {
        e.stopPropagation();
      });

        $("body").on("dp.change", "#datetimepicker6", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
      
        $("body").on("dp.change", "#datetimepicker7", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });


        $('#datetimepicker1').datetimepicker();

    });
</script>
<script>
function toggle(source) {
  checkboxes = document.getElementsByName('permissao[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
</body>
</html>
