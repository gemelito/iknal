<?PHP
include("../config/conexion.php");
include("../autentificacion.php");
mysql_query("SET NAMES 'utf8'");			
?>
<!DOCTYPE HTML>
<html  lang="es">
	<head>
		<link rel="shortcut icon" href="../images/favicon.ico">
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
				<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    		<meta charset="utf-8" />
		<title>Datos Tutor</title>
	</head>
<body>
	<?php
		include ('../headers.php');
	?>
<article></article>
	<section>
		<h1> Apoyo Recibido</h1>
		<p id="arriba">Ingrese la información en cada campo y al finalizar de clic en la opción enviar</p>
		<form action="apoyo.php?matricula=$matricula,id_prof=$id_prof" method="POST" enctype="multipart/form-data">
		<table id="datostutor"> 

			<?php
			$matricula=$_GET['matricula'];
			$id_prof=$_GET['id_prof'];	
			$nombre=$_GET['nombre'];
			$apellidop=$_GET['apellidop'];
			$apellidom=$_GET['apellidom'];

			echo '<input type="hidden" name="nombre_alumno" readonly="readonly" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop_alumno" readonly="readonly" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom_alumno" readonly="readonly" value='.$apellidom.'>';
			echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>';  
			echo '<input type="hidden" name="matricula_apoyo" readonly="readonly" value='.$matricula.'>'; 		
			?>	
			<tr>
				<td>Nombre de la institución:</td>
				<td>  <input type="text" name="institucion" placeholder="Nombre" size="45" required="required"> </td>   
			</tr>
			<tr>
				<td>Tipo de apoyo</td>				
				<td><input type="text" name="tipodeapoyo" required="required"  placeholder="Beca,alimentación, etc." size="45"></td>
			</tr> 
			<tr>
				<td>Ultima vez</td>
				<td> <input type="date" name="fecha"  step="1"> </td> 
			</tr>
			<tr>
				<td>Observaciones</td>
				<td><textarea name="observaciones" rows="5" cols="36" ></textarea></td>
			</tr>
		</table>
		<div id="tablaboton">
		<input id='botonotro' align="center" TYPE=SUBMIT VALUE="Guardar" >
		<input id='botonregresar'  align="center" TYPE="button" onClick='history.back()' VALUE="Regresar">
		</div>
		</form><br><br><br><br><br><br>

	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>