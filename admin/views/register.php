<!-- errors & messages --->
<?php

// show negative messages
if ($registration->errors) {
    foreach ($registration->errors as $error) {
        echo $error;    
    }
}

// show positive messages
if ($registration->messages) {
    foreach ($registration->messages as $message) {
        echo $message;
    }
}

?>
<!-- errors & messages --->

<!-- register form -->
<?PHP
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
// include the configs / constants for the database connection
require_once("../config/db.php");

// load the login class
require_once("../classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:  VALIDACIÓN PARA QUE SOLO ADMINISTRADOR PUEDA CREAR CUENTAS
/*if ($_SESSION['user_name'] == 'admin') {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    //include("views/logged_in.php");
    
    echo '<div id="login">';
    echo "Sesión iniciada ";
    echo $_SESSION['user_name'];

    echo '</div>';
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    header("location: index.php");
}
*/
?>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<body>
<br> <br> <br> 
<h1>Registro de Tutores</h1>
<div class="page-container">
<img src="images/logoik23.gif"  style="position: absolute; top:140px; left: 560px;">
<form method="post" action="register.php" name="registerform">     
    
    <!-- the user name input field uses a HTML5 pattern check -->
    <label for="login_input_username"></label>
    <input id="login_input_username" placeholder="Nuevo Usuario" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br />
    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email"></label>    
    <input id="login_input_email" placeholder="Correo del Tutor" class="login_input" type="email" name="user_email" required />        
    <br />
    <label for="login_input_password_new"></label>
    <input id="login_input_password_new" placeholder="Contraseña (min. 6 caracteres)" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  
    <br />
    <label for="login_input_password_repeat"></label>
    <input id="login_input_password_repeat" placeholder="Repetir contraseña" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
    <br/><br><br>
    <label class="label1">Profesor Asignado ==></label>
   <select class="label2" name="profesor">
                    <option value=""></option>
                    <?php
                        $query="SELECT id_profesores, nombre, apellidopaterno from profesores";
                        $resultado=mysql_query($query,$link);
                        while ($lista=mysql_fetch_array($resultado))
                            echo "<option value='".$lista["id_profesores"]."'>".$lista["nombre"]." ".$lista["apellidopaterno"]."</option>";
                    ?>
                </select>
	<div id="amigos">
    	<input align="center" TYPE=SUBMIT VALUE="ENVIAR" ><input align="center" TYPE=RESET VALUE="BORRAR DATOS">
   	</div>
</form>
<br />
<br />
<!-- backlink -->
<a href="index.php" class="ri1 "style="position: relative; top: -25px; left: 370px;">Regresar a página principal</a>

</body>
</html>