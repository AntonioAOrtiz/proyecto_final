
//Función para guardar los valores de los componentes, importe y su cantidad juntos para insertarlos en la base de datos.
let GuardarVal = function(){
    //Obtenemos el campo del formulario y creamos un array por cada uno.
    let lstComp = document.getElementsByClassName("componente"), arrayComp = [];
    let lstImp = document.getElementsByClassName("importe"), arrayImp = [];
    let lstCant = document.getElementsByClassName("cantidad"), arrayCant = [];

    // Creamos los divs donde irán los datos juntos.
    let vCmp = document.createElement("div");
    let vImp = document.createElement("div");
    let vCnt = document.createElement("div");
    //Le asignamos una clase y la definimos para los estilos
    vCmp.setAttribute("class","input-field col s4");
    vImp.setAttribute("class","input-field col s4");
    vCnt.setAttribute("class","input-field col s4");
    //Pintamos un textarea hidden por componente, importe y cantidad
    vCmp.innerHTML='<textarea id="vC" name="vC" class="materialize-textarea" hidden="hidden"></textarea>';
    vImp.innerHTML='<textarea id="vI" name="vI" class="materialize-textarea" hidden="hidden"></textarea>';
    vCnt.innerHTML='<textarea id="vCn" name="vCn" class="materialize-textarea" hidden="hidden"></textarea>';
    //Hacemos un appendchild de los textarea en un div que está en el HTML
    document.getElementById("caja_valor").appendChild(vCmp);
    document.getElementById("caja_valor").appendChild(vImp);
    document.getElementById("caja_valor").appendChild(vCnt);

    // Por cada valor hacemos que el array lo tome y lo pintamos en el textarea hidden separado por una /.
    // Este textarea es el que vamos a tomar para insertar en la base de datos.
    for (let i = 0; i < lstComp.length; i++)
    {
      arrayComp[i] = lstComp[i].value;

      console.log (lstComp[i].value);
      document.getElementById("vC").innerHTML += lstComp[i].value + "/";
    }

    for (let i = 0; i < lstImp.length; i++)
    {
      arrayImp[i] = lstImp[i].value;

      console.log (lstImp[i].value);
      document.getElementById("vI").innerHTML += lstImp[i].value + "/";
    }

    for (let i = 0; i < lstCant.length; i++)
    {
      arrayCant[i] = lstCant[i].value;

      console.log (lstCant[i].value);     
      document.getElementById("vCn").innerHTML += lstCant[i].value + "/";
    }      
  }


// Función para crear nuevos campos de formulario componente, importe y cantidad.
function nuevoComponente()
  { 

    //Creamos el div donde estará alojado.
    let nuevoComp = document.createElement("div");
    // Creamos una clase para este div y la definimos para los estilos.
    nuevoComp.setAttribute("class","input-field col s4");
    //Pintamos el input con su correspondiente label.
    nuevoComp.innerHTML='<input name="componente[]" type="text" class="componente"/> <label for="componente">Componente</label>';
    //Obtenemos el div donde va a ir alojado el nuevo campo del formulario y le hacemos appendchild.
    document.getElementById("lst_comp").appendChild(nuevoComp);

    let nuevoImporte = document.createElement("div");
    nuevoImporte.setAttribute("class","input-field col s4");
    nuevoImporte.innerHTML='<input name="importe[]" type="text" class="importe"/> <label for="importe">Importe</label>';
    document.getElementById("lst_comp").appendChild(nuevoImporte);

    let nuevaCantidad = document.createElement("div");
    nuevaCantidad.setAttribute("class","input-field col s4");
    nuevaCantidad.innerHTML='<input name="cantidad[]" type="text" class="cantidad"/> <label for="cantidad">Cantidad</label>';
    document.getElementById("lst_comp").appendChild(nuevaCantidad);
  }