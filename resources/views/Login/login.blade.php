<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Login</title>
</head>
<body>
    <!-- inicio de navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('img/logo.jpg') }}" alt="" width="60" height="54">
      </a>
      <a class="navbar-brand" href="{{ route('index') }}">FreeSpace</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="{{ route('info') }}">Quienes Somos</a>
          </li>
        </ul>
        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active"  href="{{ route('login')}}">Iniciar Sesión</a>
          </li> </ul>
        </form>
      </div>
    </div>
  </nav>
  <!--  final del navbar -->
  <div class="content">
    <section>
    <form action="{{route ('ingresar')}}" method="GET">
      {{ csrf_field() }}
        <h1>inicio </h1>
        <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" id="email" required>
            <label for= "">Correo</label>
        </div>
        <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" id="password" required>
            <label for="">contraseña</label>
        </div>
        
        <input type="submit" class="submit" value="Iniciar">

        <div class="register">
            <p>No tengo una cuenta <a href="{{ route('register')}}">Registrarse</a></p>
        </div>
        <hr>
        <div class="register">
          <p>Eres Docente!!!? Crea una cuenta <a href="{{ route('registerteacher')}}">Registrarse</a></p>
      </div>
    </form>
</section>
</div>
</body>
</html>