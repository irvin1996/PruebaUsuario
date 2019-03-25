<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Viajes Positivos</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_info">
        @auth

          <span>Bienvenido, {{auth::user()->name}} </span>
        @endauth
@guest
      <span>Bienvenido</span>
@endguest
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{route('indexAdmin')}}"><i class="fa fa-home"></i> Inicio </a></li>
           <li><a><i class="fa fa-edit"></i> Mantenimientos <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">

                <li><a href="{{route('usuario.cliente-destino')}}">Clientes-Destinos</a></li>
              <li><a href="{{route('indexDestinos')}}">Destinos</a></li>
                <li><a href="{{route('paises.index')}}">Pais</a></li>
              <li><a href="{{route('usuario.index')}}">Usuarios</a></li>


            </ul>
          </li>

           <li><a><i class="fa fa-edit"></i>Reportes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('listadoclientdest')}}">Listado Clientes-Destinos</a></li>
              <li><a href="{{route('ListadoDestinos')}}">Listado Destinos - País</a></li>
                    <li><a href="{{route('ListadoDestinosFechas')}}">Listado Destinos - Fechas</a></li>
              <li><a href="{{route('listado.usuario')}}">Listado Usuarios</a></li>
              <li><a href="{{route('ListadoUsuPasaporte')}}">Listado Usuario Pasaporte</a></li>
            </ul>
          </li>
        </ul>
      </div>


    </div>
    <!-- /sidebar menu -->


  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>


      <ul class="nav navbar-nav navbar-right">


        <li class="">
          @guest
            <a href="{{route('login')}}" class="user-profile "  aria-expanded="false">

       Iniciar Sesion </a>


             </a>
          @endguest
            @auth
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

          {{ Auth::user()->name }}


            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Profile</a></li>
            <li>
              <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            </li>
          </ul>
            @endauth
        </li>

      </ul>

    </nav>
  </div>
</div>
<!-- /top navigation -->
