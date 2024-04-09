$(document).ready(function() {
    let ids;

    // Realiza una solicitud GET a la API para obtener los IDs de los usuarios registrados
    $.get('https://api-mongodb-9be7.onrender.com/api/allHuellaIds', function(data) {
        ids = data;
    
        // Agrega un controlador de eventos al campo de entrada huellaId
        $('#huellaId').on('input', function() {
            let huellaId = $(this).val();
            let validationMessage = $('#validationMessage');

                // Valida el nuevo ID de la huella
                if (ids.includes(huellaId)) {
                    validationMessage.text('El ID de la huella ya ha sido registrado. Recuerda agregar tu ID asignada');
                    validationMessage[0].style.color = 'red'; // Cambiar color a rojo
                } else if (huellaId !== "") {
                    validationMessage.text('El ID de la huella es válido y está disponible');
                    validationMessage[0].style.color = '#45dc4e'; // Cambiar color a verde
                } else {
                    validationMessage.text('Error: El campo está vacío');
                    validationMessage[0].style.color = '#000000'; // Cambiar color a negro
                }
        });
    });
});
