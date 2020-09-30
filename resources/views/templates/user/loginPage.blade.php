<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Unotec</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="{{url('assets/bootstrap-4.5.2/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>

      body{
        background-image: url({{url('assets/images/login-page.jpg')}})
      }
      .error{color:red;}
      
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
    <link href="{{url('assets/bootstrap-4.5.2/signin.css')}}" rel="stylesheet">
  </head>
  <body class="text-center">

    <form id="" name="login"  class="needs-validation form-signin" novalidate>
  @csrf
  <img class="mb-4" src="{{url('assets/logos/logo-2078018_640.png')}}" alt="" width="130" height="130">
  <h1 class="h3 mb-3 font-weight-normal" style="color:#fff">Login</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email " required autofocus>
  <div class="invalid-feedback">
            Este campo e obrigatorio.
          </div>
  <label for="inputPassword" class="sr-only">Senha</label>
  <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
  <div class="invalid-feedback">
            Este campo e obrigatorio.
          </div>
  <div class="checkbox mb-3">
    <label>
      <div class="error"></div>
      <label style="color:#fff">
        <input type="checkbox" value="remember-me"> Lembrar-me
      </label>
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted">&copy; Unotec-Solutions 2019-2020</p>
</form>

<script src="{{url('assets/bootstrap-4.5.2/form-validation.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="{{url('assets/scripts/auth.js')}}"></script>
</body>
<script>

</script>
</html>
