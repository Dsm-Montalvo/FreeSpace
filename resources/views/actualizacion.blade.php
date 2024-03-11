<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Insertar</title>´
    <style>
       
        body{
            background-color: #bdc6ab;
            border-left: 15px;
        }
    </style>
</head>
<body>
    <!-- inicio de navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('index') }}">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuarios
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('listado') }}">Mostrar Usuarios</a></li>
                  <li><a class="dropdown-item disabled" href="{{ route('listadoPIR') }}">Datos del Sensor</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('create')}}">Registrar Usuario</a></li>
                </ul>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>
      <!--  final del navbar -->

      <h1>Actualizacion de datos</h1>

      <form action="{{ route('update.save') }}" method="POST" class="roe g-3">
        @csrf

        <br><br><hr>

        <input type="hidden" name="id" class="form-control" id="id" value="{{ $data['_id'] }}" >

        <div class="col-md-4">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $data['name'] }}" placeholder="ejemplo: Daniel">
            <div class="incorrecto" id="mensajeName"></div>
        </div>
        <div class="col-md-4">
            <label for="app" class="form-label">Apellido Paterno</label>
            <input type="text" name="app" class="form-control" id="app" value="{{ $data['app'] }}" placeholder="ejemplo: Montalvo">
            <div class="incorrecto" id="mensajeApp"></div>
        </div>
        <div class="col-md-4">
            <label for="apm" class="form-label">Apellido Materno</label>
            <input type="text" name="apm" class="form-control" id="apm" value="{{ $data['apm'] }}" placeholder="ejemplo: Montalvo">
            <div class="incorrecto" id="mensajeApm"></div>
        </div>
        <div class="col-md-4">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ $data['date'] }}" placeholder="ejemplo: 2024-02-2024">
            <div class="incorrecto" id="mensajeDate"></div>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">Correo</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $data['email'] }}" placeholder="ejemplo: al222210568@gmail.com">
            <div class="incorrecto" id="mensajeEmail"></div>
        </div>
        <div class="col-md-4">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ $data['password'] }}" >
            <div class="incorrecto" id="mensajePass"></div>
        </div>
        <br><br>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" name="valida" value="Validar Formulario" id="submit">
        </div>
    </form>
</body>
</html>