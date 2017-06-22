
<?php
include("autentificacion.php");
$Id_carrera=$_POST['id_carrera'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<?php
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=carrera_alumno.php?Id_carrera=$Id_carrera'/>";
    ?>
</head>
<body>
<article></article>
<section>
<?php
	include("../config/conexion.php");
	mysql_query("SET NAMES 'utf8'");
	$Id_carrera=$_POST['id_carrera'];
	$tutor=$_POST['tutor'];
	$id_alumno=$_POST['id_alumno'];

	$query="UPDATE vinculacion.alumno SET id_tutor='$tutor' where id_alumno='$id_alumno'";
	$result=mysql_query($query,$link) or die(mysql_error());
	if(mysql_affected_rows($link))
	{
			?> <script type='text/javascript'>alert('Asignado Correctamente..')</script><?php
	}
	else{
		?><script type='text/javascript'>alert('Problema al asignar..')</script><?php
	}

?>	
</section>
</body>
</html>
