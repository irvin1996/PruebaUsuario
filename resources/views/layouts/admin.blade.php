<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />
  <link rel="shortcut icon" href="images/viajesPositivosLOgo.png" />

  <title>Viajes Positivos </title>

<!--ESTE JS ES NECESARIO PARA LA FUNCIONALIDAD-->
        <script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.js') }}"></script>
  <!-- Bootstrap -->

  <link href="{{ URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{URL::to('css/custom.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Datatables esto es lo que hace que se aplique lo de asc o des en la tabla
   <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet"> -->

  <link href="{{URL::to('css/mystyle.css')}}" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @include('partials.admin-header')

        <!-- page content -->
        <div class="right_col" role="main" style="background-image: url('{{URL::to('images/viajesPositivosLOgo.png')}}'); width:'100%'; height:'100%';  background-position: center center;   background-repeat: no-repeat, repeat;  background-size: 100%; background-color: #fff; ">
            @yield('contenido')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <strong>Copyright &copy; 2018 <a href="http://viajespositivos.com/wp/">Viajes Positivos</a>.</strong> Derechos Reservados.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <script type="text/javascript" src="{{ URL::to('js/Usuario.js') }}"></script>
  <script type="text/javascript" src="{{ URL::to('js/Destino.js') }}"></script>
    <!-- jQuery -->
    <script src="{{URL::to('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{URL::to('js/bootstrap.min.js') }}"></script>
    <!-- Datatables -->
      <script src="{{URL::to('js/jquery.dataTables.min.js') }}"></script>
      <script src="{{URL::to('js/dataTables.bootstrap.min.js') }}"></script>
        <!--
        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    -->
    <!-- Custom Theme Scripts -->
    <script src="{{URL::to('js/custom.min.js') }}"></script>

  </body>
</html>
