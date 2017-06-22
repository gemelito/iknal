
<?PHP
mysql_query("SET NAMES 'utf8'");
include("../config/conexion.php");
include("../autentificacion.php");
				$matricula=$_GET['matricula'];
				$id_prof=$_GET['id_prof'];	
				$nombre=$_GET['nombre'];
				$apellidop=$_GET['apellidop'];
				$apellidom=$_GET['apellidom'];	
?>
<!DOCTYPE html>
<html>
<head>

	<title>Foda</title>
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<meta charset="utf-8" />
</head>
<body>
	<?php
		include('../headers.php');
	?>
		<section>
			<form action="agregarfoda.php" method="POST" enctype="multipart/form-data"> 

			<h1 align="center"> F. O. D. A.</h1>	
			<table align="center">
			<?php				
				echo '<input type="hidden" name="nombre_alumno" readonly="readonly" value='.$nombre.'>';
				echo '<input type="hidden" name="apellidop_alumno" readonly="readonly" value='.$apellidop.'>';
				echo '<input type="hidden" name="apellidom_alumno" readonly="readonly" value='.$apellidom.'>';			
				echo '<input type="hidden" name="id_prof" readonly="readonly" value='.$id_prof.'>';  
				echo '<input type="hidden" name="matricula" readonly="readonly" value='.$matricula.'>'; 	
			?>
			<br><br>
	<tr>
	<td>Fortalezas</td>
	<td><textarea  rows="10" cols="50" name="fortalezas" required="required"></textarea></td>
	<td>Oportunidades</td>
	<td><textarea rows="10" cols="50" name="oportunidades"></textarea></td>
	</tr>
	<tr>
	<td>Debilidades</td>
	<td><textarea rows="10" cols="50" name="debilidades"></textarea></td>
	<td>Amenazas</td>
	<td><textarea rows="10" cols="50" name="amenazas"></textarea></td>
	</tr>
	
			</table>
				<div id="tablaboton">
				<input id="botonotro" align="center" TYPE=SUBMIT VALUE="Guardar">
				<input id="botonregresar" align="center" type=submit  value="Regresar" onclick="history.back()">
			 </div>
			</form>
		</section>
</body>
	<footer>
		<?php
		include("../footer.php");
		?>
	</footer>
</html>