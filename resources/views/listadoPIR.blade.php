<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Usuarios</title>
    <link rel="stylesheet" href="{{asset('css/estilosweb2.css')}}">
    <style>
       
        body{
            background-color: #bdc6ab;
            border-left: 15px;
        }
    </style>
</head>
<body>
     <!-- inicio de navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('listado') }}">
        <img src="{{ asset('img/logo.jpg') }}" alt="" width="60" height="54">
      </a>
      <a class="navbar-brand" href="{{ route('listado') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('listado') }}">Mostrar Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  href="{{ route('listadoPIR') }}">Datos del Sensor</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('create')}}">Registrar Usuario</a>
          </li>
        </ul>
        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('index')}}">Cerrar Sesión</a>
          </li> </ul>
        </form>
      </div>
    </div>
  </nav>
  <!--  final del navbar -->
    <h1>Datos</h1>
    <br>
    <hr>
    
    
    @if(count($datosPIR) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th>Sensor:</th>
                <th>Estado:</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datosPIR as $registro)
                <tr>
                    <td>{{ $registro['sensor'] }}</td>
                    <td>{{ $registro['status'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No hay registros disponibles.</p>
@endif
</body>
</html>