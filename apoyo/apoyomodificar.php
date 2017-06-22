 <?php
mysql_query("SET NAMES 'utf8'");
include("../autentificacion.php");
?>
<!DOCTYPE HTML>
<html  lang="es">
	<head>
		<link rel="shortcut icon" href="../images/favicon.ico">
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
				<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    		<meta charset="utf-8" />
		<title>Modificar Información</title>
	</head>
<body>
	<?php
		include ('../headers.php');
	?>
<article></article>
	<section>
		<form name="modificarapoyo" action="modificacion.php" method="POST" enctype="multipart/form-data">
		<div id="amigoss">
		<?php
			include("../config/conexion.php");
			$id_apoyo= $_GET['id_apoyo'];
			$matricula= $_GET['matricula'];
			$id_prof=$_GET['id_prof'];
			$nombre=$_GET['nombre'];
			$apellidop=$_GET['apellidop'];
			$apellidom=$_GET['apellidom'];

	$result2 = mysql_query("SELECT * FROM apoyo  WHERE matricula_apoyo=$matricula && Id_apoyo=$id_apoyo ", $link);
			if ($row = mysql_fetch_array($result2)){

			echo "<br><br>\n";
			echo '<input type="hidden" name="id_apoyo" value='.$id_apoyo.'>'; 
			echo '<input type="hidden" name="id"  value='.$id_prof.'>'; 
			echo '<input type="hidden" name="nombre_alumno" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop_alumno"  value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom_alumno"  value='.$apellidom.'>'; 
			echo '<input type="hidden" name="matricula" size="9" value='.$matricula.'>'.'<br>';
			

			echo 'Nombre de la Institución: <input type="text" name="institucion" size="15" value="'.$row["institucion"].'">'.'<br><br>';
			echo 'Tipo de Apoyo: <input type="text" name="tipodeapoyo" size="10" value="'.$row["tipodeapoyo"].'">'.'<br><br>';
			echo 'Ultima vez:<input type="date" name="ultimavez" size="10" value='.$row["ultimavez"].'>'.'<br><br>';	
			echo "Observaciones <br /><textarea name='observaciones' rows='5' cols='40'>".$row["observaciones"]."</textarea>";

			} else {
						echo "¡ La base de datos está vacia !";
					}		
		?>
			</div>
			<div id="tablaboton">
			<input id='botonotro' name="grabar" type="submit" value="Actualizar" style="font-weight: bold">
			<input id='botonregresar' type="button" value='Cancelar' onClick='history.back()'>
			</div>
		</form>
		<br><br><br><br><br><br><br><br><br><br><br><br>
	</section>
		<?php
		include ('../footer.php');
	?>

</body>
</html>
