<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <title>iBanana - Listado de reparaciones</title>
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

    .v0{
        display: none;
    }

    .dropdown-menu{
        margin-right: 35px;
      }

    nav .nav-wrapper ul li ul li a{
      font-size: 14px;
      color: white;
    }

    @media only screen and (min-width: 993px){
        .jc-bs3-container {
        width: 30%;
    }
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
        <div class="col s4">
          <a href="{{ url('ver-todas-reparaciones') }}" class="waves-effect waves-light btn"><i class="material-icons left">remove_red_eye</i> Ver todas</a>
        </div>
      </div>

        <div class="row mt-2">
            <div class="col s12">
                <div class="row">

                    <table class="clientes display compact">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Días</th>
                              <th>Estado</th>
                              <th>Cliente</th>
                              <th>Teléfono</th>
                              <th>Producto</th>
                              <th>OPCIONES</th>
                              <th class="v0">código</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($clientes as $cli)

                            @php
                                $fecha1= new DateTime($cli->created_at);
                                $fecha2= new DateTime("now");
                                $diff = $fecha1->diff($fecha2);
                            @endphp

                            <tr>
                                <td class="center-align">{{ $cli->id }}</td>
                                <td class="center-align">{{ $diff->days }} días</td>
                                <td class="center-align">
                                  @switch($cli->estado)
                                  @case(0)
                                      Pendiente
                                      @break
                                  @case(1)
                                      Reparado
                                      @break
                                      @case(2)
                                      Entregado
                                      @break
                                  @default
                                      Estado raro
                              @endswitch
                                </td>
                                <td class="center-align">{{ $cli->nombre }}</td>
                                <td class="center-align">{{ $cli->movil }}</td>
                                <td class="center-align">{{ $cli->producto }}</td>
                                <td class="center-align">
                                    <a href="{{ url('documento/' . $cli->id )}}" class="waves-effect waves-light btn teal darken-2"><i class="material-icons">remove_red_eye</i>
                                    </a>
                                    <a href="{{ url('editar-reparacion/' . $cli->id )}}" class="waves-effect waves-light btn green darken-2"><i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{ url('eliminar/' . $cli->id )}}" class="waves-effect waves-light btn red darken-2"><i class="material-icons">close</i>
                                    </a>
                                </td>
                                <td class="v0">{{ $cli->clave_codigo_barras }}</td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>

                  </div>
            </div>
          </div>
      </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">

M.AutoInit();

$(document).ready(function() {
    $('.clientes').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.2/i18n/es_es.json'
        }
    });

        @if(strlen($mensaje) > 0)
        $.alert({
        title: 'Parte de reparación creado!',
        content: 'El número de orden es {{ $mensaje }}' ,
        });
        @endif

} );

</script>
<script>
      M.AutoInit();

      $('.dropdown-trigger').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        hover: true,
        belowOrigin: true,
        alignment: 'left'
      });
    </script>
  </body>
</html>
