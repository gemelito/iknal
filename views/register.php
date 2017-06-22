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
include("config/conexion.php");
mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");

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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<?php
include('admin/headeradmin3.php');
?> 
<section>
<h1>Registro de Tutores</h1>
<div id="amigoss">
<form method="post" action="register.php" name="registerform"> 
<table>
    <tr>
        <!-- the user name input field uses a HTML5 pattern check -->
        <td><label for="login_input_username">Usuario</label></td>
        <td><input id="login_input_username" placeholder="Nuevo Usuario" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br /></td>
    </tr>
    <tr>
        <!-- the email input field uses a HTML5 email type check -->
        <td><label for="login_input_email">Correo Electronico</label> </td>
        <td><input id="login_input_email" placeholder="Correo del Tutor" class="login_input" type="email" name="user_email" required />        
    <br /></td>
    </tr>
    <tr>
        <td><label for="login_input_password_new">Contraseña</label></td>
        <td><input id="login_input_password_new" placeholder="Contraseña (min.6 caracteres)" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  
    <br /></td>
    </tr>
    <tr>
        <td><label for="login_input_password_repeat">Repetir Contraseña</label></td>
        <td><input id="login_input_password_repeat" placeholder="Repetir contraseña" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
    </td>
    </tr>
    <tr>
        <td><label class="label1">Profesor Asignado ==></label></td>
        <td><select class="label2" name="profesor">
            <option value=""></option>
                <?php
                    $query="SELECT id_profesor, nombre_profesor, apellidop_profesor from profesor";
                    $resultado=mysql_query($query,$link);
                    while ($lista=mysql_fetch_array($resultado))
                    echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]."</option>";
                ?>
            </select><br><br></td>
    </tr>
</table>    
<button id="botonAdmin" type="submit"  name="register" value="Registrar" >Registar</button>
</form>
<a href="index.php"><input id="botonAdminRegresar" type="button" value="Regresar"></a>
</section>
<br><br>
<?php
        include ('footer.php');
    ?>
</body>
</html>