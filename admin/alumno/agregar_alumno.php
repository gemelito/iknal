<?php
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

$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$apellidop=$_POST['apellidop'];
$apellidom=$_POST['apellidom'];
$estado=$_POST['estado'];
$originario=$_POST['originario'];
$semestre=$_POST['semestre'];
$generacion=$_POST['generacion'];
$carrera=$_POST['carrera'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$capacidad=$_POST['capacidad'];
$sexo=$_POST['sexo'];
$fechanac=$_POST['fechanac'];
$status=$_POST['status'];

$query="INSERT INTO alumno (matricula_alumno, nombre_alumno,apellidop_alumno, apellidom_alumno, estado_alumno,originario_alumno,semestre_alumno,generacion_alumno,carrera_alumno,correo_alumno, telefono_alumno,capacidaddiferente_alumno,sexo_alumno,fechanac_alumno,activo) VALUES ('$matricula','$nombre','$apellidop','$apellidom','$estado','$originario','$semestre','$generacion','$carrera','$correo','$telefono','$capacidad','$sexo','$fechanac','$status')";
$result=mysql_query($query,$link) or die("<a href='../indexadmin.php'>");

if(mysql_affected_rows($link))
{
  header ('Location: /iknal/admin/indexadmin.php');   
}
else{
  echo "Error introduciendo el Dato, intentelo nuevamente m&aacute;s tarde."; 
  echo "<a href='../indexadmin.php'>Para regresar a la p&aacute;gina principal de clic aqui</a>";
}
?>

