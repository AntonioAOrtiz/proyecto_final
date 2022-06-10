// Evento para que la función se cargue después de que se cargue la página.
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("reparacion").addEventListener('submit', validaReparacion); 
});

//Expresiones regulares para la validación de formularios.
const espacio = /^\s+$/; // Solo hay espacios en blanco.
// El email debe tener la estructura de un email.
const emailValido = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/;
// Nos aseguramos con esta expresión que el usuario introduzca nombres y apellidos reales.
const nombreValido = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;
// Nos aseguramos que el usuario introduce un número de movil.
const movilValido = /[0-9-]+$/;
// Nos aseguramos que el usuario solo introduce números.
const numero = /^[0-9]+$/;


//Función para validar el formulario de reparación. Recibe un evento por parámetro
function validaReparacion(evento){
    //Evitamos que el evento se ejecute hasta que se cumplan todas las condiciones de la validación.
    evento.preventDefault();
    // Obtenemos el valor de lo que el usuario escribe en los inputs
    let nombre = document.getElementById("nombre").value;
    let dni = document.getElementById("dni").value;
    let movil = document.getElementById("movil").value;
    let email = document.getElementById("email").value;
    let producto = document.getElementById("producto").value;
    let marca = document.getElementById("marca").value;
    let modelo = document.getElementById("modelo").value;
    let nserie = document.getElementById("nserie").value;
    let pin = document.getElementById("pin").value;
    let password = document.getElementById("password").value;
    let averia_report = document.getElementById("averia_report").value;
    let presupuesto = document.getElementById("presupuesto").value;

    /* Si lo que el usuario introduce no cumple con las condiciones de validación se le muestra un mensaje con el error y hacemos return.
     Es importante recalcar que el formulario debe ser flexible para que pueda ser utilizado en la tienda de reparación*/
    if( nombre == null || nombre.length == 0 || espacio.test(nombre)  ) {
        alert("No se ha introducido el nombre del cliente");
        return;
    }
    else if(nombreValido.test(nombre)){
        alert("El nombre introducido no es válido")
    }
    else if(dni == null || dni.length == 0 || espacio.test(dni) ){
        alert("No se ha introducido el dni del cliente");
        return;
    }
    else if(movil == null || movil.length == 0 || espacio.test(movil) ){
        alert("No se ha introducido el dni del cliente");
        return;
    }
    else if(movilValido.test(movil)){
        alert("El nombre introducido no es válido")
    }
    else if(emailValido.test(email)){
        alert("El email introducido no es válido")
    }
    else if(numero.test(pin)){
        alert("El pin introducido no es válido")
    }
    else if(numero.test(password)){
        alert("La contraseña de desbloqueo introducida no es válida")
    }
    else if(numero.test(presupuesto)){
        alert("El presupuesto introducido no es válido")
    }

    // Si cumple todas las condiciones enviamos el formulario.
    this.submit();

    

}    