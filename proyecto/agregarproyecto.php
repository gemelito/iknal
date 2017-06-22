<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="shortcut icon" href="../images/pi.ico">
    <meta charset="utf-8" />
    <title>Agregar proyecto</title>
  
       <link href="../css/general.css" rel="stylesheet" type="text/css" />
       <link href="../css/m1.css" rel="stylesheet" type="text/css" />
</head>
<body></body>
</html>

<?php
include("../config/conexion.php");
 mysql_query("SET NAMES 'utf8'");

 $id_prof=$_POST['id'];
 $nombre_alumno=$_POST['nombre_alumno'];
 $apellidop_alumno=$_POST['apellidop_alumno'];
 $apellidom_alumno=$_POST['apellidom_alumno'];
$matricula=$_POST['matricula'];
$verano=$_POST['verano'];
$lugar=$_POST['lugar'];
$titulo=$_POST['titulo'];
$area=$_POST['area'];
$tipodeproyecto=$_POST['tipodeproyecto'];
$estadodelproyecto=$_POST['estadodelproyecto'];
$directordelproyecto=$_POST['directordelproyecto'];
$asesor1=$_POST['asesor1'];
$asesor2=$_POST['asesor2'];
$suplente=$_POST['suplente'];
$modalidadproyecto=$_POST['modalidadproyecto'];
$equipoproyecto=$_POST['equipoproyecto'];


$query="INSERT INTO proyecto(matricula ,verano_proyecto, lugar_proyecto,titulo_proyecto, areadesarrollo_proyecto, tipo_proyecto,estado_proyecto,director_proyecto,asesor1_proyecto,asesor2_proyecto, suplente_proyecto,modalidad_proyecto,equipo_proyecto) VALUES('$matricula','$verano','$lugar','$titulo','$area','$tipodeproyecto','$estadodelproyecto','$directordelproyecto','$asesor1','$asesor2','$suplente','$modalidadproyecto','$equipoproyecto')";
$result=mysql_query($query,$link) or die(mysql_error());
if(mysql_affected_rows($link))
{

header ('Location: /vinculacion/proyecto/mostrarproyecto.php?matricula='.$_POST["matricula_abuelo"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);   
}
else{
	echo "Error introduciendo el Dato"; 
}
?>