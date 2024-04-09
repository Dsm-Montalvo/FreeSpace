<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Historial</title>

    <link rel="stylesheet" href="{{asset('css/estilosweb.css')}}">
</head>
<body>
<!-- inicio de navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('indexp') }}">
      <img src="{{ asset('img/logo.jpg') }}" alt="" width="60" height="54">
    </a>
    <a class="navbar-brand" href="{{ route('indexp') }}">FreeSpace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('explorar') }}">Explorar Espacios</a>
        </li>
      </ul>
      {{-- <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="{{ route('detalles') }}">Detalles de Espacios</a>
        </li>
      </ul> --}}
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reserva') }}">Reserva de Espacios</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('historial') }}">Historial de Reserva</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allRecervas') }}">Reservaciones</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0" style="margin-left: auto;">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cerrarSesion') }}">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--  final del navbar -->
<center>
  

  <h1>Historial</h1>

</center>
<table class="table table-hover border border-5 border-danger  table-bordered" >
  <thead>
      <tr>
          <th>Fecha de Registro</th>
          <th>Fecha a Utilizar</th>
          <th>Hora de Inicio</th>
          <th>Hora de Finalización</th>
          <th>Aula</th>
          <th>ID de Usuario</th>
          <th>Nombre Usuario</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($datos as $dato)
      <tr>
          <td>{{ $dato['fechaRegistro'] }}</td>
          <td>{{ $dato['fechaUtilizar'] }}</td>
          <td>{{ $dato['horaInicio'] }}</td>
          <td>{{ $dato['horaFinal'] }}</td>
          <td>{{ $dato['aula'] }}</td>
          <td>{{ $dato['idUsuario'] }}</td>
          <td>{{ $userData['name'] }} {{ $userData['app'] }} {{ $userData['apm'] }}</td>
      </tr>
      @endforeach
  </tbody>
</table>


</body>
</html>