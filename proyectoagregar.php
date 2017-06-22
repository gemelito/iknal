
<?php
include("config/conexion.php");
 mysql_query("SET NAMES 'utf8'");
 require_once("classes/Login.php");
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
	    header("location:index.php");
	}
	$sesion=$_SESSION['user_name'];
		$query="SELECT Id_profes, user_name FROM users WHERE user_name = '$sesion' "; //CARGAMOS LOS DATOS PARA BUSCAR EL ID DE PROFE
      	$resultado=mysql_query($query,$link);
      	while ($lista=mysql_fetch_array($resultado)){
        	$id_prof= $lista["Id_profes"]; 
        }

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

header ('Location:proyectomostrar.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);   
}
else{
	echo "Error introduciendo el Dato"; 
}
?>