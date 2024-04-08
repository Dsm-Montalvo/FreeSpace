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
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allRecervas') }}">Recervaciones</a>
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

<h1>Reverva tu Espacio</h1>

<hr>

<div class="container" style="margin-left: 20px;">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('guardarDatos') }}" class="row g-2">
                @csrf

                <div class="col-md-12">
                    <label for="fechaRegistro" class="form-label">Fecha de Registro:</label>
                    <input type="date" id="fechaRegistro" class="form-control" name="fechaRegistro" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                </div>

                <div class="col-md-12">
                    <label for="fechaUtilizar" class="form-label">Fecha a Utilizar:</label>
                    <input type="date" id="fechaUtilizar" class="form-control" name="fechaUtilizar" min="{{ date('Y-m-d') }}" required>
                </div>

                <div class="col-md-12">
                    <label for="horaInicio" class="form-label">Hora de Inicio:</label>
                    <select id="horaInicio" class="form-control" name="horaInicio"></select>
                </div>

                <div class="col-md-12">
                    <label for="horaFinal" class="form-label">Hora de Finalización:</label>
                    <select id="horaFinal" class="form-control" name="horaFinal"></select>
                </div>

                <div class="col-md-12">
                  <label for="aula" class="form-label">Aula:</label>
                  <select id="aula" class="form-select" name="aula">
                      <option value="101">101</option>
                      <option value="102">102</option>
                      <option value="103">103</option>
                  </select>
              </div>
                
                @if ($userData)
                    <input type="hidden" name="user_id" id="user_id" value="{{ $userData['id'] }}">
                @else
                    <p>No se han encontrado datos de usuario.</p>
                @endif
                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
      // Función para rellenar los select boxes con las opciones de hora
      function fillSelectBoxes() {
          var inicioSelect = document.getElementById("horaInicio");
          var finalSelect = document.getElementById("horaFinal");
  
          var horas = ["07:00", "07:50", "08:40", "09:30", "10:20", "11:10", "12:00", "12:50", "13:40", "14:30", "15:20", "16:10", "17:00", "17:50", "18:40", "19:30", "20:20", "21:10"];
  
          for (var i = 0; i < horas.length; i++) {
              var option = new Option(horas[i], horas[i]);
              inicioSelect.add(option);
              finalSelect.add(option.cloneNode(true));
          }
      }
  
      // Llamar a la función para rellenar los select boxes al cargar la página
      fillSelectBoxes();
  </script>
</body>
</html>