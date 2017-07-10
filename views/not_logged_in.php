<!-- login form box -->
<html lang="es">
    <head> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="theme-color" content="#7cb342">
        <link rel="stylesheet" type="text/css" href="css/materialize.css">
        <link rel="stylesheet" type="text/css" href="css/icons.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/common.css">
    </head>
<body class="light-green darken-1">
    <br> <br> <br>
    <section>
        <div class="row">
            <div class="col l4 m5 s12 offset-l4 offset-m3">
                 <div class="center-align">
                    <img src="images/logo.png" style="width: 200px;">
                </div>
                <div class="card" style="border-radius: 10px;">
                    <div class="card-content blue-grey-text text-darken-3">
                        <span class="card-title center-align">Sistema de tutoría IKNAL</span>
                       
                        <form method="post" action="index.php" name="loginform">      
                            <!--label for="login_input_username"></label>
                            <input id="login_input_username" placeholder="Usuario" class="login_input" type="text" name="user_name" maxlength="15" required />
                           
                            <label for="login_input_password"></label>
                            <input id="login_input_password" placeholder="Contraseña" class="login_input" type="password" name="user_password" autocomplete="off" required maxlength="15"/>
                            <br />
                            <br />
                            <input type="submit"  name="login" value="Accesar" />
                            <!--<a href="../index.php"><input type="button" value="Regresar" class="enviar"> </a></p>-->
                            <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons tiny prefix">account_circle</i>
                                  <input id="icon_prefix" type="text" class="validate" type="text" name="user_name" maxlength="15" required>
                                  <label for="icon_prefix">Usuario</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons tiny prefix">lock</i>
                                  <input id="icon_password" class="validate" type="password" name="user_password" autocomplete="off" required maxlength="15">
                                  <label for="icon_password">Contraseña</label>
                                </div>
                            </div>

                            <div class="input-field center-align">
                                <button type="submit"  name="login"  class="waves-effect waves-light btn light-green darken-1">Accesar</button>
                            </div>
                        </form>



                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        Materialize.updateTextFields();
      });
    </script>
    <?php
        // show negative messages
        if ($login->errors) {
          foreach ($login->errors as $error) { ?>
            <script type="text/javascript">
                $(document).ready(function(){
                  $('.tooltipped').tooltip({delay: 50});
                   Materialize.toast('<?php  echo $error;  ?>', 5000);
                });
            </script>
        <?php }
        }
        // show positive messages
        if ($login->messages) {
           foreach ($login->messages as $message) { ?>
             <script type="text/javascript">
              $(document).ready(function(){
                $('.tooltipped').tooltip({delay: 50});
                Materialize.toast('<?php  echo $message;  ?>', 5000);
              });
            </script>
        <?php }
        }
    ?>

</body>
<!--<a href="register.php">Register new account</a>-->