<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Clinica Dental</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
    <script src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js') }}"></script>
    <script src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js') }}"></script> 
    <script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ URL::asset('js/locales/bootstrap-datetimepicker.es.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/all.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.css') }}"/>
        <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('site\docs\4.3\examples\dashboard\dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Clinica Dental</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('agendar_hora') }}">
              <span data-feather="file"></span>
              Agendar Hora
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('historial') }}">
              <span data-feather="users"></span>
              Historial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('historial_detalle') }}">
              <span data-feather="users"></span>
              Historial Detalle
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      @yield('contenido')
    </main>
  </div>
</div>
</html>
