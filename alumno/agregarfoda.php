
	<?php
		include("../config/conexion.php");
 		mysql_query("SET NAMES 'utf8'");
 		include("../autentificacion.php");

$matricula=$_POST['matricula'];
$id_prof=$_POST['id_prof'];	
$nombre=$_POST['nombre'];
$apellidop=$_POST['apellidop'];
$apellidom=$_POST['apellidom'];
$fortalezas=$_POST['fortalezas'];
$oportunidades=$_POST['oportunidades'];
$debilidades=$_POST['debilidades'];
$amenazas=$_POST['amenazas'];





$query="INSERT INTO foda(matricula_foda,fortalezas,oportunidades,debilidades,amenazas) VALUES('$matricula', '$fortalezas', '$oportunidades', '$debilidades', '$amenazas')";
$result=mysql_query($query,$link) or die(mysql_error());
if(mysql_affected_rows($link))
{
	 header ('Location: /iknal/alumno/consultagral.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id_prof"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);   
}
else{
	header ('Location: /iknal/alumno/consultagral.php');
	echo "Error introduciendo el Dato"; 
}
?>