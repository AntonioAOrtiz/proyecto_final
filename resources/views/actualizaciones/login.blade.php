<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<style>

html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
    background: #1976d2;
}

#login-page {
   width: 500px;
}

.card {
/*      position: absolute;
     left: 50%;
     top: 50%;
     -moz-transform: translate(-50%, -50%)
     -webkit-transform: translate(-50%, -50%)
     -ms-transform: translate(-50%, -50%)
     -o-transform: translate(-50%, -50%)
     transform: translate(-50%, -50%); */
}

    </style>

  </head>

  <body>

    <body ng-app="mainModule" ng-controller="mainController">
        <div id="login-page" class="row">
            <div class="col s12 z-depth-6 card-panel">
              <form class="login-form" action="comprobar-usuario">
                <div class="row">
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">mail_outline</i>
                    <input class="validate" name="usuario" id="email" type="text">
                    <label for="email" data-error="wrong" data-success="right">Usuario</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" name="password" type="password">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light col s12 blue darken-4" type="submit">Login</button>
                  </div>
                </div>

              </form>
            </div>
          </div> </body>




    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript">

          M.AutoInit();

          $( document ).ready(function() {

            });

    </script>

  </body>
</html>