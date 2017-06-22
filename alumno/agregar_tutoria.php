<?php

include("../config/conexion.php");
include("../autentificacion.php");

$id_prof=$_POST['id'];
$nombre_alumno=$_POST['nombre_alumno'];
$apellidop_alumno=$_POST['apellidop_alumno'];
$apellidom_alumno=$_POST['apellidom_alumno'];
$matricula=$_POST["matricula"];
$motivo=$_POST["asunto"];
$contador=$_POST["contador"];
$fecha=date('Y-m-d');

$query="INSERT INTO tutorias(matricula,asunto,contador,fecha_tutoria ) VALUES('$matricula','$motivo','$contador','$fecha' )";
$result=mysql_query($query,$link) or die(mysql_error());
if(mysql_affected_rows($link))
{
	 header ('Location: /iknal/alumno/consulta_tutorias.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);   
}
else{
echo "Error introduciendo los datos, intentelo nuevamente m&aacute;s tarde."; 
echo "<a href='index.php'>Para regresar a la p&aacute;gina principal de clic aqui</a>";
}


?>