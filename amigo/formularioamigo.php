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
<!DOCTYPE HTML>
<html  lang="es">
	<head>
		<link rel="shortcut icon" href="../images/favicon.ico">
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
				<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    		<meta charset="utf-8" />
		<title>Amigo</title>
	<script type="text/javascript">
		function mostrar(){
		document.getElementById('ocultar').style.display='block';
		document.getElementById('ocultarAmigo').style.display='none';
		}
		function mostrarAmigo(){
		document.getElementById('ocultarAmigo').style.display='block';
		document.getElementById('ocultar').style.display='none';
		}
    </script>
	</head>
<body>
	<?php
		include ('../headers.php');
	?>
<article></article>
	<section>
	<h1 > Información del Amigo </h1>
	<p id="arriba">Ingrese la información en cada campo y al finalizar de clic en la opción envíar</p><br><br>
		<form action="agregaramigo.php" method="POST" enctype="multipart/form-data"> 
			<table id="amigoss">
				<tr>
				<td>¿Estudia en la UIMQROO?:    </td>
				<td><input align="center" Type="button" value="Si" onclick="mostrar()">
				<input align="center" Type="button" value="No" onclick="mostrarAmigo()"><br></td>
				</tr>
			</table>
			<div id="ocultar" style="display:none;">
			<table id="amigoss"> 
				<?php				
				echo '<input type="hidden" name="nombre_alumno" readonly="readonly" value='.$nombre.'>';
				echo '<input type="hidden" name="apellidop_alumno" readonly="readonly" value='.$apellidop.'>';
				echo '<input type="hidden" name="apellidom_alumno" readonly="readonly" value='.$apellidom.'>';			
				echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>';  
				echo '<input type="hidden" name="matricula_amigo" readonly="readonly" value='.$matricula.'>'; 	
				?>
				<tr><br><br>
					<td>Amigo: </td>				
					<td><select name="amigo" required="required">
					<option value=""></option>
					<?php
					$query="SELECT Id_alumno, matricula_alumno, nombre_alumno, apellidop_alumno , apellidom_alumno from alumno order by nombre_alumno asc";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["Id_alumno"]."'>".$lista["nombre_alumno"].' '.$lista["apellidop_alumno"].' '.$lista["apellidom_alumno"]."</option>";
					?>
					</select></td>
				</tr>
				<tr>
					<td>Años de Amistad: </td>				
					<td><input type="text" name="amistad" size="10"></td>
				</tr>
				<tr>
					<td>Breve descripción sobre su amigo: </td>
					<td><textarea rows="5" cols="36" name="opinion"></textarea></td>
				</tr>	
			</table>
			<div id="tablaboton">
			<input id="botonotro"  align="center" TYPE=SUBMIT VALUE="Guardar" href="">  
			<input id="botonregresar"  align="center" TYPE=RESET VALUE="Regresar" onclick="history.back()">
			</div>
			</div>
		</form>

		<div id="ocultarAmigo" style="display:none;">
		<form action="agregaramigo.php" method="POST" enctype="multipart/form-data"> 
			<table id="amigoss">
			<?php	
				echo '<input type="hidden" name="nombre_alumno" readonly="readonly" value='.$nombre.'>';
				echo '<input type="hidden" name="apellidop_alumno" readonly="readonly" value='.$apellidop.'>';
				echo '<input type="hidden" name="apellidom_alumno" readonly="readonly" value='.$apellidom.'>';			
				echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>';  
				echo '<input type="hidden" name="matricula_amigo" readonly="readonly" value='.$matricula.'>'; 	
				?>
				<tr><br><br>
					<td>Nombre</td>
					<td><input type="text" name="nombre_amigo" placeholder="Nombre" required="required"><input type="text" name="apellidop_amigo" placeholder="Apellido Paterno" required="required"><input type="text" name="apellidom_amigo" placeholder="Apellido Materno"></td>
				</tr>
				<tr>
					<td>Dirección</td>				
					<td><input type="text" name="direccion" size="39"></td>
				</tr>
				<tr>
					<td>Teléfono</td>				
					<td><input type="text" name="telefono" size="15"></td>
				</tr>
				<tr>
					<td>Años de Amistad</td>				
					<td><input type="text" name="amistad" size="10"></td>
				</tr>
				<tr>
					<td>Breve descripción sobre su amigo</td>
					<td><textarea rows="5" cols="36" name="opinion"></textarea></td>
				</tr>	
			</table>
			<div id="tablaboton">
			<input id="botonotro"  align="center" TYPE=SUBMIT VALUE="Guardar" href="">  
			<input id="botonregresar"  align="center" TYPE=RESET VALUE="Regresar" onclick="history.back()">	
			</div>
			</div>
		</form>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>