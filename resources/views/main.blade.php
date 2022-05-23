<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Bienvenido - iBanana</title>
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

    @media only screen and (min-width: 993px){
        .jc-bs3-container {
        width: 30%;
    }
    }

    * {
        margin:0px;
        padding:0px;
      }
      
      #header {
        margin:auto;
        width:500px;
        font-family:Arial, Helvetica, sans-serif;
      }
      
      ul, ol {
        list-style:none;
      }
      
      .nav > li {
        float:left;
      }
      
      .nav li a {
        background-color:#000;
        color:#fff;
        text-decoration:none;
        padding:10px 12px;
        display:block;
      }
      
      .nav li a:hover {
        background-color:#434343;
      }
      
      .nav li ul {
        display:none;
        position:absolute;
        min-width:140px;
      }
      
      .nav li:hover > ul {
        display:block;
      }
      
      .nav li ul li {
        position:relative;
      }
      
      .nav li ul li ul {
        right:-140px;
        top:0px;
      }
    </style>
  </head>
  <body>
    <div class="nav-wrapper white">
      <a href="{{ url('/') }}" class="brand-logo left"><img class="responsive-img maxheight64" src="{{ asset('ibanana_factura.png') }}"></a>

      <ul id="nav-mobile" class="right black">
        <ul class="nav">
          <li><a href="">Nuevo</a>
            <ul>
              <li><a href="{{ url('reparaciones') }}">Reparacion</a></li>
              <li><a href="{{ url('pedidos') }}">Pedido</a></li>
              <li><a href="{{ url('presupuestar') }}">Presupuesto</a></li>
            </ul>
          </li>
          <li><a href="{{ url('reparaciones') }}">Listados</a>
            <ul>
              <li><a href="{{ url('listado-de-clientes') }}">Reparaciones</a></li>
              <li><a href="{{ url('listado-de-pedidos') }}">Pedidos</a></li>
              <li><a href="{{ url('listado-de-presupuestos') }}">Presupuestos</a></li>
            </ul>
          </li>
        </ul>
      </ul>
    </div>

    <div>
      <img class="responsive-img maxheight500" src="{{ asset('fondo.jpg') }}">
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript">
      M.AutoInit();
    </script>
  </body>
</html>
