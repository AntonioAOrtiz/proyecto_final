<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/listados.css') }}">
    <title>iBanana - Editar Reparación</title>
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

                    <form action="{{ url('actualizar-reparacion') }}" method="post" class="col s12">
                    @csrf

                      <input hidden name="id" value="{{ $reparacion->id }}">

                      <div class="row">

                        <div class="col s12">
                            <blockquote class="m-0">
                                Datos de Cliente
                            </blockquote>
                        </div>

                        <div class="input-field col s6">
                          <input id="nombre" name="nombre" type="text" value="{{ $reparacion->nombre }}" required>
                          <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="dni" name="dni" value="{{ $reparacion->dni }}" type="text">
                            <label for="dni">DNI</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="movil" name="movil" value="{{ $reparacion->movil }}" type="text">
                            <label for="movil">Movil</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="email" name="email" value="{{ $reparacion->email }}" type="text">
                            <label for="email">Email</label>
                          </div>

                          <div class="input-field col s4">
                            <select name="estado">
                              <option {{ $reparacion->estado == 0 ? 'selected' : '' }}value="0">Pendiente</option>
                              <option {{ $reparacion->estado == 1 ? 'selected' : '' }} value="1">Reparado</option>
                              <option {{ $reparacion->estado == 2 ? 'selected' : '' }} value="2">Entregado</option>
                            </select>
                            <label>Estado</label>
                          </div>

                          <div class="col s12">
                            <blockquote class="m-0">
                                Datos de Producto
                            </blockquote>
                        </div>

                        <div class="input-field col s4">
                            <input id="producto" name="producto" value="{{ $reparacion->producto }}" type="text">
                            <label for="producto">Producto</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="marca" name="marca" value="{{ $reparacion->marca }}" type="text">
                          <label for="marca">Marca</label>
                        </div>

                        <div class="input-field col s4">
                            <input id="modelo" name="modelo" value="{{ $reparacion->modelo }}" type="text">
                            <label for="modelo">Modelo</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="nserie" name="nserie" value="{{ $reparacion->nserie }}" type="text">
                            <label for="nserie">N.Serie</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="pin" name="pin" value="{{ $reparacion->pin }}" type="text">
                            <label for="pin">PIN</label>
                          </div>

                          <div class="input-field col s4">
                            <input id="password" name="password" value="{{ $reparacion->contraseña }}" type="text">
                            <label for="password">Contraseña</label>
                          </div>

                          <div class="input-field col s12">
                            <textarea id="averia_report" name="averia_reportada" class="materialize-textarea">{{ $reparacion->averia_reportada }}</textarea>
                            <label for="averia_report">Avería reportada</label>
                          </div>
                          <div class="input-field col s4">
                            <input id="email" name="presupuesto" type="text" value="{{ $reparacion->presupuesto }}">
                            <label for="presupuesto">Presupuesto</label>
                          </div>

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
<!--Importe de JQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--JavaScript al final de body para optimizar la carga-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    

  </body>
</html>
