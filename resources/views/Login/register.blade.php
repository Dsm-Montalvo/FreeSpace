<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>Registrarse</title>
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
            <a class="nav-link"  href="{{ route('login')}}">Iniciar Sesión</a>
          </li> </ul>
        </form>
      </div>
    </div>
  </nav>
  <!--  final del navbar -->

  <div class="content">
    <section>
    <form action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
      @csrf
      {{csrf_field() }}
        <h1>Registrarse </h1>
        <div class="inputbox">
            <ion-icon name="name-outline"> </ion-icon>
            <input type="text" name="name" id="name" required>
            <label for= "">Nombre</label>
        </div>
        <div class="incorrecto" id="mensajeNombre"></div>
        <div class="inputbox">
            <ion-icon name="app-outline"> </ion-icon>
            <input type="text" name="app" id="app" required>
            <label for= "">Apellido Paterno</label>
        </div>
        <div class="incorrecto" id="mensajeApp"></div>
        <div class="inputbox">
            <ion-icon name="apm-outline"> </ion-icon>
            <input type="text" name="apm" id="apm" required>
            <label for= "">Apellido Materno</label>
        </div>
        <div class="incorrecto" id="mensajeApm"></div>
        <div class="inputbox">
            <ion-icon name="date-outline"></ion-icon>
            <input type="date" name="date" id="date" required>
            <label for= ""></label>
        </div>
        <div class="inputbox">
            <ion-icon name="email-outline"> </ion-icon>
            <input type="email" name="email" id="email"  required>
            <label for= "">Correo</label>
        </div>
       
        <div class="inputbox">
            <ion-icon name="password-outline"></ion-icon>
            <input type="password" name="password" id="password" required>
            <label for="">contraseña</label>
        </div>
        <div class="inputbox">
            <ion-icon name="confirm-password-outline"></ion-icon>
            <input type="password" name="confirmarpassword" id="confirmarpassword" required>
            <label for="">confirmar contraseña</label>
        </div>

        <div class="incorrecto" id="mensajeCorreo"></div>
        <div class="incorrecto" id="mensajeCorreo"></div>
        <div id="mensajePassword"></div>
            <ul id="listaCriterios">
                <li class="criterio-lista" id="criterioLongitud">Longitud mínima de 8 caracteres: <span class="icono" id="iconoLongitud"></span></li>
                <li class="criterio-lista" id="criterioEspecial">Al menos 1 carácter especial: <span class="icono" id="iconoEspecial"></span></li>
                <li class="criterio-lista" id="criterioNumero">Al menos 1 número: <span class="icono" id="iconoNumero"></span></li>
                <li class="criterio-lista" id="criterioMayuscula">Al menos 1 letra mayúscula: <span class="icono" id="iconoMayuscula"></span></li>
                <li class="criterio-lista" id="criterioIgualdad">Confirmar contraseña coincide: <span class="icono" id="iconoIgualdad"></span></li>
            </ul>
            <div class="barratexto" id="barratexto"></div>
            <div class="barra-seguridad" id="barra-seguridad"></div>
            <div class="texto-barra" id="texto-barra"></div>
            <br>

        
            <input type="submit" class="submit" value="Guardar">
        
    </form>
</section>
  </div>
<script src="{{asset ('js/validaciones.js')}}"></script>
</body>
</html>