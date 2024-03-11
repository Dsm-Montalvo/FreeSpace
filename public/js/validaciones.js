/*  -- - - - validacion del Campo de Nombre (Requerido) - - -  */
var dato1 = document.getElementById("name").addEventListener("keyup", validaNombre);

function validaNombre(){    
    var nombre =document.getElementById("name").value;
    if(nombre != ""){
        document.getElementById("mensajeNombre").classList.remove('incorrecto');        
        document.getElementById("mensajeNombre").classList.add('correcto');
        document.getElementById("mensajeNombre").innerHTML= "correcto "     ; 
    }
    else{
        document.getElementById("mensajeNombre").classList.remove('correcto');
        document.getElementById("mensajeNombre").classList.add('incorrecto');
        document.getElementById("mensajeNombre").innerHTML= "Error: el campo de Nombre esta vacio";
    }
} 

/* ---validacion del campo de Apellido Paterno (solo texto)--- */
var dato2 = document.getElementById("app").addEventListener("keyup", validaApp);

function validaApp() {
    var app = document.getElementById("app").value;
    if(app != ""){
        document.getElementById("mensajeApp").classList.remove('incorrecto');        
        document.getElementById("mensajeApp").classList.add('correcto');
        document.getElementById("mensajeApp").innerHTML= "Correcto "; 
    }
    else{
        document.getElementById("mensajeApp").classList.remove('correcto');
        document.getElementById("mensajeApp").classList.add('incorrecto');
        document.getElementById("mensajeApp").innerHTML= "Error: el campo de Apellido Paterno esta vacio";
    }
}


/*---  validacion del Campo de Apellido Materno (longitud mayor a 4 caracteres) ----*/

var dato3 = document.getElementById("apm").addEventListener("keyup", validaApm);

function validaApm(){
    var apm = document.getElementById("apm").value;
    if(apm != ""){
        document.getElementById("mensajeApm").classList.remove('incorrecto');        
        document.getElementById("mensajeApm").classList.add('correcto');
        document.getElementById("mensajeApm").innerHTML= "Correcto "; 
    }
    else{
        document.getElementById("mensajeApm").classList.remove('correcto');
        document.getElementById("mensajeApm").classList.add('incorrecto');
        document.getElementById("mensajeApm").innerHTML= "Error: el campo de Apellido Materno esta vacio";
    }
}

/* --- validacion del campo en Correo (formato de correo)--- */

var dato4= document.getElementById("email").addEventListener("keyup",validaCorreo);

function validaCorreo(){
    var correo = document.getElementById("email").value;
    if(correo != ""){
        /* --- pattern empleado para validar el campo con solo letras ---- */

        var pattern = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        if (pattern.test(correo)){
            document.getElementById("mensajeCorreo").classList.remove('incorrecto');
            document.getElementById("mensajeCorreo").classList.add('correcto');
            document.getElementById("mensajeCorreo").innerHTML= "el formato del correo es correcto";
        }
        else{
            document.getElementById("mensajeCorreo").classList.remove('correcto');
            document.getElementById("mensajeCorreo").classList.add('incorrecto');
            document.getElementById("mensajeCorreo").innerHTML= "Error: el formato del correo es incorrecto"
        }
    }
    else{
        document.getElementById("mensajeCorreo").classList.remove('correcto');
        document.getElementById("mensajeCorreo").classList.add('incorrecto');
        document.getElementById("mensajeCorreo").innerHTML= "error el campo correo esta vacio";
    }
}



/* ---validacion del campo de Fecha de nacimiento --- */
var dato5 = document.getElementById("date").addEventListener("keyup", date);

function date(){
    var fecha= document.getElementById("date").value;
    if(fecha != ""){
        var segmentos = fecha.split("-");
        var year = new Date().getFullYear();
        var edad = year - segmentos[0];
        document.getElementById("mensajeFecha").classList.remove('incorrecto');
        document.getElementById("mensajeFecha").classList.remove('menor');
        document.getElementById("mensajeFecha").classList.remove('mayor');
        if(edad < 18){
            document.getElementById("mensajeFecha").classList.add('menor');
            document.getElementById("mensajeFecha").innerHTML= " Usted es menor de edad con "+ edad + " de edad.";
        }
        else{
            document.getElementById("mensajeFecha").classList.add('mayor');
            document.getElementById("mensajeFecha").innerHTML= "Usted es mayor de edad con " + edad + "de edad.";
        }
    }
    else
    {
        document.getElementById("mensajeFecha").classList.remove('correcto');
        document.getElementById("mensajeFecha").classList.add('incorrecto');
        document.getElementById("mensajeFecha").innerHTML= "Error: el Campo de Fecha de nacimiento esta Vacio";
    }
}
/* ---------------------------------------------------------------------------------------------------- */


var passwordInput = document.getElementById("password").addEventListener("keyup", validaPassword);
var confirmarPasswordInput = document.getElementById("confirmarpassword").addEventListener("keyup", validaPassword);
var mensajePassword = document.getElementById("mensajePassword");
var listaCriterios = document.getElementById("listaCriterios");
var barraSeguridad = document.querySelector(".barra-seguridad");
var iconoLongitud = document.getElementById("iconoLongitud");
var iconoEspecial = document.getElementById("iconoEspecial");
var iconoNumero = document.getElementById("iconoNumero");
var iconoMayuscula = document.getElementById("iconoMayuscula");


function validaPassword() {
  var password = document.getElementById("password").value;
  var confirmarPassword = document.getElementById("confirmarpassword").value;
  var regexLongitud = /.{8,}/;
  var regexEspecial = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/;
  var regexNumero = /\d/;
  var regexMayuscula = /[A-Z]/; var regex = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-])(?=.*\d)(?=.*[A-Z]).{8,}$/;

  validarCriterio(regexLongitud.test(password), iconoLongitud);

  // Validar Carácter Especial
  validarCriterio(regexEspecial.test(password), iconoEspecial);

  // Validar Número
  validarCriterio(regexNumero.test(password), iconoNumero);

  // Validar Letra Mayúscula
  validarCriterio(regexMayuscula.test(password), iconoMayuscula);

  validarCriterio(password === confirmarPassword && confirmarPassword !== "", iconoIgualdad);


  // Barra de seguridad
  var longitud = password.length;
  if (longitud >= 8 && longitud <= 10) {
    barraSeguridad.style.width = "33%";
    barraSeguridad.className = "barra-seguridad poca-seguridad";
    document.getElementById("texto-barra").innerHTML="Poca-seguridad";
  } else if (longitud >= 11 && longitud <= 13) {
    barraSeguridad.style.width = "66%";
    barraSeguridad.className = "barra-seguridad insegura";
    document.getElementById("texto-barra").innerHTML="Insegura";
  } else if (longitud >= 14) {
    barraSeguridad.style.width = "100%";
    barraSeguridad.className = "barra-seguridad segura";
    document.getElementById("texto-barra").innerHTML="Segura";
  } else {
    barraSeguridad.style.width = "0";
    barraSeguridad.className = "barra-seguridad";
    document.getElementById("barratexto").innerHTML= "Error: el Campo de contraseña esta Vacio";
    document.getElementById("texto-barra").innerHTML="No cumple";
  }

  
    if(password != ""){
        if(password.length >= 7 ){
        document.getElementById("barratexto").classList.remove('incorrecto');
        document.getElementById("barratexto").classList.add('correcto');
        document.getElementById("barratexto").innerHTML= "La contraseña cumple con la cantidad minima, cantidad: " + password.length;
        }
        else{
            document.getElementById("barratexto").classList.remove('correcto');
            document.getElementById("barratexto").classList.add('incorrecto');
            document.getElementById("barratexto").innerHTML="Error: No cumple con la cantidad minima, cantidad: " + password.length;
        }
    }
    else {
        document.getElementById("barratexto").classList.remove('correcto');
        document.getElementById("barratexto").classList.add('incorrecto');
        document.getElementById("barratexto").innerHTML= "Error:La contraseña esta vacia esta Vacio ";
    }

    submit.disabled = !(longitud >= 8  && password === confirmarPassword && confirmarPassword !== "");
}

function validarCriterio(cumpleCriterio, icono) {
  if (cumpleCriterio) {
    icono.innerHTML = "&#10004;"; // Palomita
    icono.style.color = "green";
  } else {
    icono.innerHTML = "&#10006;"; // Tache
    icono.style.color = "red";
  }
}

