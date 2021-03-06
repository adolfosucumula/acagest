<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="{{url('assets/bootstrap-4.5.2/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Bootstrap core CSS -->
<link href="{{url('assets/bootstrap-4.5.2/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
      label{font-size:12pt}
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
    <link href="{{url('assets/bootstrap-4.5.2/dashboard.css')}}" rel="stylesheet">
  </head>
  <body> 
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow navbar-expand-md">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Esperanca</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">...</a>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">
        @if(session()->exists('username'))
        {{ Auth::user()->name }}
        @endif
      </a>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{route('logout.do')}}">Sair</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <!--<li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="{{route('stud')}}">
              <span data-feather="users"></span>
              Estudantes
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="{{route('workerHome')}}">
              <span data-feather="users"></span>
              Trabalhadores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="{{route('bill')}}">
              <span data-feather="shopping-cart"></span>
              Propina
            </a>
            <a class="nav-link" href="{{route('bill.new')}}">
              <span data-feather="shopping-cart"></span>
              Pagar Propina
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <!--<li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>-->
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      
      @yield('content')
      
    </main>
  </div>
</div>

<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>-->
      <script>window.jQuery || document.write('<script src="{{url("assets/bootstrap-4.5.2/js/vendor/jquery.slim.min.js")}}"><\/script>')</script>
      <script src="{{url('assets/bootstrap-4.5.2/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="{{url('assets/bootstrap-4.5.2/dashboard.js')}}"></script>
  <script src="{{url('assets/bootstrap-4.5.2/form-validation.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="{{url('assets/scripts/country.js')}}"></script>
  <script src="{{url('assets/scripts/category-course.js')}}"></script>
  <script src="{{url('assets/scripts/input-number-filter.js')}}"></script>
  <script src="{{url('assets/scripts/student.js')}}"></script>
  
</body>
<script>
   
</script>
</html>