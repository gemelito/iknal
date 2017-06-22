
<?php
mysql_query("SET NAMES 'utf8'");
include('../../config/conexion.php'); 
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

$localidad = $_POST['localidad'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];

    $query="INSERT INTO localidad (localidad, municipio_localidad, estado_localidad) VALUES ('$localidad','$municipio', '$estado')";  
    /* EN ESTA LÍNEA INSERTAMOS LOS DATOS QUE TRAEMOS DE MUNICIPIOS.PHP*/
    $result=mysql_query($query,$link) or die(mysql_error()); /*ESTA ES UNA COMPROBACIÓN PARA LA CONEXIÓN CON LA BASE DE DATOS */
    if(mysql_affected_rows($link)) 
    {  
        header("location:/iknal/admin/indexadmin.php");  
    } else{  
        echo "Error introduciendo el Dato, intentelo nuevamente m&aacute;s tarde."; 
        echo "<a href='../indexadmin.php'>Para regresar a la p&aacute;gina principal de clic aqui</a>";
    } /* Cierre del else */  
?>