<!DOCTYPE html>
<html>
  <head>
    <!--Importe Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Importe materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>iBanana - Editar Factura</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <style type="text/css">
    .maxheight64{
        max-height: 52px;
        padding-left: 0.4em;
        padding-top: 0.4em;
    }

    .mt-2{
        margin-top: 1em;
    }

    .m-0{
        margin: 0;
    }

    .dropdown-menu{
        margin-right: 35px;
      }

    nav .nav-wrapper ul li ul li a{
      font-size: 14px;
      color: white;
    }

    </style>

  </head>

  <body>
  <nav>
        <div class="nav-wrapper white">
          <a href="{{ url('/') }}" class="brand-logo left"><img class="responsive-img maxheight64" src="{{ asset('ibanana_factura.png') }}"></a>
          <ul class="right hide-on-med-and-down black">
              <li class="dropdown-menu"><a class="dropdown-trigger" data-beloworigin="true" href="#!"  data-activates="dropdown2" data-target="dropdown2">Listados</a>
                <ul id="dropdown2" class="dropdown-content black">
                  <li><a class="dropdown-item" href="{{ url('listado-de-clientes') }}">Reparaciones</a></li>
                  <li class="divider"></li>
                  <li><a class="dropdown-item" href="{{ url('listado-de-pedidos') }}">Pedidos</a></li>
                  <li class="divider"></li>
                  <li><a class="dropdown-item" href="{{ url('listado-de-presupuestos') }}">Presupuestos</a></li>
                  <li class="divider"></li>
                  <li><a class="dropdown-item" href="{{ url('listado-de-facturas') }}">Facturas</a></li>
                </ul>
            </li>
          </ul>
          <ul class="right hide-on-med-and-down black">
              <li class="dropdown-menu"><a class="dropdown-trigger" href="#!" data-target="dropdown1">Nuevo</a>
                <ul id="dropdown1" class="dropdown-content black">
                    <li><a class="dropdown-item" href="{{ url('reparaciones') }}">Reparación</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ url('pedidos') }}">Pedido</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ url('presupuestar') }}">Presupuesto</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ url('facturas') }}">Factura</a></li> 
                </ul>
            </li>
          </ul>
        </div>
    </nav>
      
    <div class="container">

        <div class="row mt-2">
            <div class="col s12">
                <div class="row">

                    <form action="{{ url('actualizar-factura') }}" method="post" class="col s12">
                    @csrf

                      <input hidden name="id" value="{{ $facturas->id }}">

                      <div class="row">

                        <div class="col s12">
                            <blockquote class="m-0">
                                Datos de Cliente
                            </blockquote>
                        </div>

                        <div class="input-field col s6">
                          <input id="nombre" name="nombre" type="text" value="{{ $facturas->nombre }}" required>
                          <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="dni" name="dni" value="{{ $facturas->dni }}" type="text" required>
                            <label for="dni">DNI</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="movil" name="movil" value="{{ $facturas->movil }}" type="text">
                            <label for="movil">Móvil</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="email" name="email" value="{{ $facturas->email }}" type="text">
                            <label for="email">Email</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="direccion" name="direccion" value="{{ $facturas->direccion }}" type="text">
                            <label for="direccion">Dirección</label>
                          </div>



                          <div class="col s12">
                            <blockquote class="m-0">
                                Datos de Producto
                            </blockquote>
                        </div>

                        <div class="input-field col s4">
                            <input id="producto" name="producto" value="{{ $facturas->producto }}" type="text">
                            <label for="producto">Producto</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="marca" name="marca" value="{{ $facturas->marca }}" type="text">
                          <label for="marca">Marca</label>
                        </div>

                        <div class="input-field col s4">
                            <input id="modelo" name="modelo" value="{{ $facturas->modelo }}" type="text">
                            <label for="modelo">Modelo</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="nserie" name="nserie" value="{{ $facturas->nserie }}" type="text">
                            <label for="nserie">N.Serie</label>
                          </div>

                          <div class="input-field col s12">
                            <textarea id="averia_report" name="averia_reportada" class="materialize-textarea">{{ $facturas->averia_reportada }}</textarea>
                            <label for="averia_report">Avería reportada</label>
                          </div>

                          <?php
                            $componentes = $facturas->componente;
                            $importes = $facturas->importe;
                            $cantidades = $facturas->cantidad;

                            if(strpos($componentes,"/") == true){
                              $array_componentes = explode("/", $componentes);
                            }

                            if(strpos($importes,"/") == true){
                              $array_importes = explode("/", $importes);
                            }
                  
                            if(strpos($cantidades,"/") == true){
                              $array_cantidades = explode("/", $cantidades);
                            }
                
                          ?>

                          @php 
                            $contador_componente = 0;
                            $contador_importe = 0;
                            $contador_cantidad = 0;
                          @endphp
                          
                        @foreach($array_componentes as $componente)
                          <div class="input-field col s4">
                            <input id="componente" name="componente" type="text" value="{{ $componente }}" class="componente" required>
                            <label for="componente">Componente</label>
                          </div>
                          @foreach($array_importes as $importe)
                            @if($contador_importe == $contador_componente)
                              <div class="input-field col s4">
                                <input id="importe" name="importe" type="text"  value="{{ $importe }}" class="importe" required>
                                <label for="importe">Importe</label>
                              </div>
                            @endif  
                            @php($contador_importe++)
                          @endforeach
                          @foreach($array_cantidades as $cantidad)
                            @if($contador_cantidad == $contador_componente)
                              <div class="input-field col s4">
                                <input id="cantidad" name="cantidad" type="text" value="{{ $cantidad }}" class="cantidad" required>
                                <label for="cantidad">Cantidad</label>
                              </div>
                            @endif
                            @php($contador_cantidad++)
                          @endforeach
                          @php($contador_componente++)
                          @php($contador_importe = 0)
                          @php($contador_cantidad = 0)
                        @endforeach

                          <div id="lst_comp"></div>

                          <div class="input-field col s4">
                            <button type="button" id="boton" onClick="nuevoComponente()">Nuevo Componente</button>
                          </div>

                          <div class="input-field col s4">
                          <button type="button" value="Capturar" onclick="GuardarVal()">Guardar Componentes</button>
                          </div>

                          <div id="caja_valor"></div>

                          <div class="input-field col s12 right-align">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                        <i class="material-icons right">send</i>
                    </button>
                          </div>

                      </div>

                    </form>
                  </div>
            </div>
          </div>
      </div>
      <footer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#000000" fill-opacity="1" d="M0,192L40,176C80,160,160,128,240,144C320,160,400,224,480,234.7C560,245,640,203,720,181.3C800,160,880,160,960,149.3C1040,139,1120,117,1200,112C1280,107,1360,117,1400,122.7L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
      </footer>
    <!--JavaScript al final del body para optimizar la carga-->
    <!--Importe de JQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/componentes.js') }}"></script>                       
  
  </body>
</html>
