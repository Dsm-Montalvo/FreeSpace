$(document).ready(function() {

    var datosAnteriores = ''; // Variable para almacenar los datos anteriores
  
    // Función para verificar el mensaje y actualizar la página o mostrar una alerta
    function verificarMensaje(data) {
      var mensaje = data.mensaje;
      var $infoSalón = $('#info_salón');
      if (mensaje === 'Huella encontrada, salón libre') {
        // Actualiza el contenido de tu documento HTML con el mensaje de salón libre y cambia a verde
        $infoSalón.removeClass('ocupado').addClass('libre').html('El salón está libre.');
      } else if (mensaje === 'Huella encontrada, salón ocupado') {
        // Guarda los datos actuales como datos anteriores
        datosAnteriores = 'Nombre del profesor: ' + data.nombre + ' ' + data.app + ' ' + data.apm + ', Hora: ' + data.hora;
        // Actualiza el contenido de tu documento HTML con los datos recibidos y cambia a rojo
        $infoSalón.removeClass('libre').addClass('ocupado').html(datosAnteriores);
      } else if (mensaje === 'El salón ya está ocupado por otro profesor') {
        // Muestra una ventana flotante con el mensaje y los datos
        alert(mensaje + ' Nombre del profesor: ' + data.nombre + ' ' + data.app + ' ' + data.apm + ', Hora: ' + data.hora);
        // Mantiene los datos anteriores en la página
        $infoSalón.html(datosAnteriores);
      }
    }
  
    // Función para realizar la consulta a la API cada cierto tiempo
    function consultarAPI() {
      $.ajax({
        url: 'https://api-mongodb-9be7.onrender.com/api/salon', // La URL a tu servidor que devuelve el mensaje y los datos
        type: 'GET',
        success: function(response) {
          // Suponiendo que la respuesta del servidor es un objeto JSON como el que proporcionaste
          verificarMensaje(response);
        }
      });
    }
  
    // Establece un intervalo para consultar la API cada 5 segundos (5000 milisegundos)
    setInterval(consultarAPI, 5000);
});