<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Detalles</title>
    <!-- Incluye Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="{{asset('css/estilosweb.css')}}">
</head>
<body>
<!-- inicio de navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('indexe') }}">
      <img src="{{ asset('img/logo.jpg') }}" alt="" width="60" height="54">
    </a>
    <a class="navbar-brand" href="{{ route('indexe') }}">FreeSpace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('calendario') }}">Explorar Espacios</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active " href="{{ route('detalle') }}">Detalles de Espacios</a>
        </li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allRecervasE') }}">Recervaciones</a>
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

  <h1>Aula 102</h1>

</center>
<div style="width: 100%; display: flex; justify-content: space-between;">
  <div style="width: 30%; ">
      <canvas id="temperaturaChart" width="400" height="200"></canvas>
  </div>
  <div style="width: 30%;">
      <canvas id="humedadChart" width="400" height="200"></canvas>
  </div>
  <div style="width: 30%;">
      <canvas id="movimientoChart" width="400" height="200"></canvas>
  </div>
</div>

<br><br><hr>
<div >
<table class="table table-hover border border-2 border-success  table-bordered" >
  <thead>
      <tr>
          <th>Fecha de Registro</th>
          <th>Fecha a Utilizar</th>
          <th>Hora de Inicio</th>
          <th>Hora de Finalización</th>
          <th>Aula</th>
          <th>ID de Usuario</th>
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
      </tr>
      @endforeach
  </tbody>
</table>
</div>



<script>
  var temperaturaData = @json($temperaturaData);
  var humedadData = @json($humedadData);
  var movimientoData = @json($movimientoData);

  var ctx1 = document.getElementById('temperaturaChart').getContext('2d');
  var temperaturaChart = new Chart(ctx1, {
      type: 'line',
      data: {
          labels: Array.from(Array(temperaturaData.length).keys()),
          datasets: [{
              label: 'Temperatura',
              data: temperaturaData,
              backgroundColor: 'rgba(0, 0, 0, 0.5)',
              borderColor: 'rgba(144, 45, 255, 1)',
              borderWidth: 1
          }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        
      }
      
      
  });

  var ctx2 = document.getElementById('humedadChart').getContext('2d');
  var humedadChart = new Chart(ctx2, {
      type: 'line',
      data: {
          labels: Array.from(Array(humedadData.length).keys()),
          datasets: [{
              label: 'Humedad',
              data: humedadData,
              backgroundColor: 'rgba(144, 45, 255, 0.2)',
              borderColor: 'rgba(255, 255, 255, 1)',
              borderWidth: 1
          }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
      }
  });

  var ctx3 = document.getElementById('movimientoChart').getContext('2d');
  var movimientoChart = new Chart(ctx3, {
      type: 'bar',
      data: {
          labels: Array.from(Array(movimientoData.length).keys()),
          datasets: [{
              label: 'Movimiento',
              data: movimientoData,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(103, 246, 255, 1)',
              borderWidth: 1
          }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        
      }
  });
</script>
</body>
</html>