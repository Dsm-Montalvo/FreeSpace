<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Recerva</title>

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
          <a class="nav-link active" href="{{ route('reserva') }}">Reserva de Espacios</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('historial') }}">Historial de Reserva</a>
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

<h1>Ingresar Datos</h1>

<hr>
    <form method="POST" action="{{ route('guardarDatos') }}">
        @csrf

        <div>
          <label for="fechaRegistro">Fecha de Registro:</label>
          <input type="date" id="fechaRegistro" name="fechaRegistro" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
      </div>
  
      <div>
          <label for="fechaUtilizar">Fecha a Utilizar:</label>
          <input type="date" id="fechaUtilizar" name="fechaUtilizar" min="{{ date('Y-m-d') }}" required>
      </div>

        <div>
            <label for="horaInicio">Hora de Inicio:</label>
            <select id="horaInicio" name="horaInicio">
                @for ($hour = 7; $hour <= 20; $hour++)
                    @for ($minute = 0; $minute < 60; $minute += 50)
                        <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                @endfor
            </select>
        </div>

        <div>
            <label for="horaFinal">Hora de Finalización:</label>
            <select id="horaFinal" name="horaFinal">
                @for ($hour = 7; $hour <= 20; $hour++)
                    @for ($minute = 0; $minute < 60; $minute += 50)
                        <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                @endfor
            </select>
        </div>

        <div>
            <label for="aula">Aula:</label>
            <input type="text" id="aula" name="aula" placeholder="107">
        </div>

      

        <button type="submit">Guardar Datos</button>
    </form>

</body>
</html>