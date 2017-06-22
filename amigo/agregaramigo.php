<?php
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
include("../autentificacion.php");

$id_prof=$_POST['id'];
$nombre_alumno=$_POST['nombre_alumno'];
$apellidop_alumno=$_POST['apellidop_alumno'];
$apellidom_alumno=$_POST['apellidom_alumno']; 
$matricula=$_POST['matricula_amigo']; 
$tutor_amigo=$_POST['amigo'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$amistad=$_POST['amistad'];
$opinion=$_POST['opinion'];
$nombre_amigo=$_POST['nombre_amigo'];
$apellidop_amigo=$_POST['apellidop_amigo'];
$apellidom_amigo=$_POST['apellidom_amigo'];

$query="INSERT INTO amigo(matricula_amigo, tutor_amigo,direccion,telefono,amistadanios,opinion,nombre_amigo,apellidop_amigo,apellidom_amigo) VALUES('$matricula', '$tutor_amigo', '$direccion', '$telefono', '$amistad', '$opinion', '$nombre_amigo', '$apellidop_amigo','$apellidom_amigo')";
$result=mysql_query($query,$link) or die(mysql_error());
if(mysql_affected_rows($link))
{
	 header ('Location: /iknal/amigo/consulta_amigo.php?matricula='.$_POST["matricula_amigo"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);   
}
else{
	header ('Location: /iknal/amigo/consulta_amigo.php');
	echo "Error introduciendo el Dato"; 
}
?>

