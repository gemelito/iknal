<?PHP
include("../../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
require_once("../../classes/Login.php");

// crear objeto login
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    //include("views/logged_in.php");
   
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Agregar Comunidad</title>
</head>
<body>
<?php
        include ('../headeradmin2.php'); //Header hecho solo para archivo en carpetas
?>
<section>
    <h1 > Información de la Comunidad </h1>
    <p >Ingrese la información correspondiente en cada campo y al finalizar de clic en la opción enviar</p>
    <div id="amigoss">
        <form action="agregar_comunidad.php" method="POST" enctype="multipart/form-data"> 
        <table> 
            <tr>
                <td>Localidad</td>
                <td><input type="text" name="localidad" size="45" required="required"></td> 
            </tr>
            <tr>
                <td>Municipio</td>
                <td> <input type="text" name="municipio" required="required" size="45"> </td> 
            </tr>
            <tr>
                <td>Estado</td>
                <td> <input type="text" name="estado" required="required"  size="45"> </td> 
            </tr>
        </table><br>
            <input id='botonAdmin'  align="center" TYPE=Submit VALUE="Guardar">  
            </form>
        <a href="../indexadmin.php" ><input type="button" id="botonAdminRegresar" value="Regresar"></a>    
</section>
<?php
        include ('../../footer.php');
?>
</body>
</html>
