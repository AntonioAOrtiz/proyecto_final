
let GuardarVal = function(){
    let lstComp = document.getElementsByClassName("componente"), arrayComp = [];
    let lstImp = document.getElementsByClassName("importe"), arrayImp = [];
    let lstCant = document.getElementsByClassName("cantidad"), arrayCant = [];

    let vCmp = document.createElement("div");
    let vImp = document.createElement("div");
    let vCnt = document.createElement("div");

    vCmp.setAttribute("class","input-field col s4");
    vImp.setAttribute("class","input-field col s4");
    vCnt.setAttribute("class","input-field col s4");

    vCmp.innerHTML='<textarea id="vC" name="vC" class="materialize-textarea" hidden="hidden"></textarea>';
    vImp.innerHTML='<textarea id="vI" name="vI" class="materialize-textarea" hidden="hidden"></textarea>';
    vCnt.innerHTML='<textarea id="vCn" name="vCn" class="materialize-textarea" hidden="hidden"></textarea>';

    document.getElementById("caja_valor").appendChild(vCmp);
    document.getElementById("caja_valor").appendChild(vImp);
    document.getElementById("caja_valor").appendChild(vCnt);

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



function nuevoComponente()
  {
    let nuevoComp = document.createElement("div");
    nuevoComp.setAttribute("class","input-field col s4");
    nuevoComp.innerHTML='<input name="componente[]" type="text" class="componente"/> <label for="componente">Componente</label>';
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