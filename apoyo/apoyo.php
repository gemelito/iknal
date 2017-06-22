<?php
include("../config/conexion.php");
 mysql_query("SET NAMES 'utf8'");
 include("../autentificacion.php");

$nombre_alumno=$_POST['nombre_alumno'];
$apellidop_alumno=$_POST['apellidop_alumno'];
$apellidom_alumno=$_POST['apellidom_alumno']; 
$id_prof=$_POST['id'];
$matricula=$_POST['matricula_apoyo'];  
$institucion=$_POST['institucion'];
$tipodeapoyo=$_POST['tipodeapoyo'];
$ultimavez=$_POST['fecha'];
$observaciones=$_POST['observaciones'];


$query="INSERT INTO apoyo(matricula_apoyo, institucion,tipodeapoyo, ultimavez, observaciones) VALUES('$matricula','$institucion','$tipodeapoyo','$ultimavez','$observaciones')";
$result=mysql_query($query,$link) or die(mysql_error());
if(mysql_affected_rows($link))
{ 
header ('Location: /iknal/apoyo/consultapoyo.php?matricula='.$_POST["matricula_apoyo"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]); 
}
else{
echo "Error introduciendo el Dato, intentelo nuevamente m&aacute;s tarde."; 
echo "<a href='../index.php'>Para regresar a la p&aacute;gina principal de clic aqui</a>"; 
}
?>

