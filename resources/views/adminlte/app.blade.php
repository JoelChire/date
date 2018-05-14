<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ega&Siara | @yield('head_title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="{{ asset('/adminlte/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/adminlte/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/adminlte/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/adminlte/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/adminlte/css/skins/skin-purple.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('head_link')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="{{ asset('/home') }}" class="logo">
      <span class="logo-mini">D</span>
      <span class="logo-lg">DATE</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('/imagenes') }}/{{ Auth::user()->foto }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ asset('/imagenes') }}/{{ Auth::user()->foto }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }} -
                  @if(Auth::user()->role==0)
                    Administrador
                  @elseif(Auth::user()->role==1)
                    Miembro Premium
                  @elseif(Auth::user()->role==2)
                    Miembro Estándar
                  @endif
                  <small>Miembro desde {{ Carbon\Carbon::parse(Auth::user()->created_at)->format('( d - m - Y )') }}</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                    Salir
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <li>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/imagenes') }}/{{ Auth::user()->foto }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><center>BIENVENIDO</center></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-film"></i> <span>PERFIL</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ asset('/peliculas') }}">Visualizar</a></li>
            <li><a href="{{ asset('/peliculas/list') }}">Editar</a></li>
          </ul>
        </li>
        @if(Auth::user()->role==0)
          <li class="treeview">
            <a href="#"><i class="fa fa-cog"></i> <span>ASIGNATURAS</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ asset('/actores') }}">IS1</a></li>
              <li><a href="{{ asset('/escritores') }}">Base de datos</a></li>
              <li><a href="{{ asset('/productores') }}">Matemática</a></li>
            </ul>
          </li>
        @endif
        @if(Auth::user()->role==2)
          <br>
          <br>
          <img width="100%" src="{{ asset('/publicidad/001.jpeg') }}">
        @endif
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        @yield('header_title')
        <small>@yield('header_descripion')</small>
      </h1>
    </section>
    <section class="content container-fluid">
      @yield('content')
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      @yield('footer')
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Ega&Siara</a>.</strong> Todos los derechos reservados.
  </footer>

</div>
<script src="{{ asset('/adminlte/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/adminlte/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/adminlte/js/adminlte.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
document.oncontextmenu = function(){return false;}
</script>
@yield('script')
</body>
</html>
