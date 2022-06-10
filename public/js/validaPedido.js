document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("pedido").addEventListener('submit', validaPedido); 
});

//Expresiones regulares para la validación de formularios.
const espacio = /^\s+$/; // Solo hay espacios en blanco.
// Nos aseguramos que el usuario introduce un número de movil.
const movilValido = /[0-9-]+$/;
// Nos aseguramos que el usuario solo introduce números.
const numero = /^[0-9]+$/;


//Función para validar el formulario de reparación. Recibe un evento por parámetro
function validaPedido(evento){
    //Evitamos que el evento se ejecute hasta que se cumplan todas las condiciones de la validación.
    evento.preventDefault();
    // Obtenemos el valor de lo que el usuario escribe en los inputs
    let unidad = document.getElementById("unidad").value;
    let componente = document.getElementById("componente").value;
    let marca = document.getElementById("marca").value;
    let modelo = document.getElementById("modelo").value;
    let movil = document.getElementById("movil").value;
    let nserie = document.getElementById("nserie").value;
    let fianza = document.getElementById("fianza").value;
    let precio_final = document.getElementById("precio_final").value;

    /* Si lo que el usuario introduce no cumple con las condiciones de validación se le muestra un mensaje con el error y hacemos return.
     Es importante recalcar que el formulario debe ser flexible para que pueda ser utilizado en la tienda de reparación*/
    if( unidad == null || unidad.length == 0 || espacio.test(unidad)  ) {
        alert("No se ha introducido el número de unidades");
        return;
    }
    else if(numero.test(unidad)){
        alert("La unidades introducidas no son válidas")
    }
    else if( componente == null || componente.length == 0 || espacio.test(componente)  ) {
        alert("No se ha introducido el componente");
        return;
    }
    else if( marca == null || marca.length == 0 || espacio.test(marca)  ) {
        alert("No se ha introducido la marca");
        return;
    }
    else if( modelo == null || modelo.length == 0 || espacio.test(modelo)  ) {
        alert("No se ha introducido el modelo");
        return;
    }
    else if(movilValido.test(movil)){
        alert("El nombre introducido no es válido");
    }
    else if(numero.test(fianza)){
        alert("La fianza introducida no es válido");
    }
    else if(numero.test(precio_final)){
        alert("El precio introducido no es válido");
    }

    // Si cumple todas las condiciones enviamos el formulario.
    this.submit();
}