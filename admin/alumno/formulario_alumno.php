<?php 
include("../../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
require_once("../../classes/Login.php");

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
    header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<title>Agregar Alumno</title>	
</head>
<body>
	<?php
		include ('../headeradmin2.php'); //Header hecho solo para archivo en carpetas
	?>
<section>	
	<h1> Información del Alumno </h1>
	<div id="amigoss">
	<p>Ingrese la información en cada campo y al finalizar de clic en la opción envíar</p>
	<form action="agregar_alumno.php" method="POST" enctype="multipart/form-data"> 
		<table> 
			<tr>
				<td>Matricula</td>
				<td><input type="text" name="matricula"  placeholder="10 dígitos" required="required" size="10"></td>
			</tr> 
			<tr>
				<td>Nombre</td>
				<td> <input type="text" name="nombre" required="required" placeholder="Nombre" size="8"><input type="text" name="apellidop" required="required" placeholder="Apellido Paterno" size="13"><input type="text" name="apellidom" required="required" placeholder="Apellido Materno" size="13"> </td>   
			</tr>
			<tr>
				<td>Estado del Alumno</td>
				<td><select name="estado">
					<option value=""></option>
				<?php 
					$query="SELECT Id_estado_alumno, estado from estado_alumno";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["Id_estado_alumno"]."'>".$lista["estado"]."</option>";
				 ?>
				 </select></td>
			</tr>
			<tr>
			<td>Originario</td>
				<td><select name="originario">
				<option value=""></option>
				<?php
					$query="SELECT id_localidad, localidad from localidad";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["id_localidad"]."'>".$lista["localidad"]."</option>";
				?>
				</select></td>
			</tr>
			<tr>
			<td>Semestre</td>
				<td><select name="semestre">
				<option></option>
				<?php
					$query="SELECT Id_semestre, semestres from semestre";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["Id_semestre"]."'>".$lista["semestres"]."</option>";
				?>
				</select></td>
			</tr>
			<tr>
			<td>Generación</td>
				<td><select name="generacion">
				<option value=""></option>
				<?php
					$query="SELECT id_generacion, generacion from generacion";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["id_generacion"]."'>".$lista["generacion"]."</option>";
				?>
				</select></td>
			</tr>
			<tr>
			<td>Carrera</td>
				<td><select name="carrera">
				<option value=""></option>
				<?php
					$query="SELECT id_carrera, carrera from carrera";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["id_carrera"]."'>".$lista["carrera"]."</option>";
				?>
				</select></td>
			</tr>
			<tr>
				<td>Correo</td>
				<td><input type="text" name="correo" size="25"></td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td><input type="text" name="telefono" size="10"></td>
			</tr>
			<tr>
				<td>Capacidad diferente</td>
				<td><input type="text" name="capacidad" size="10"></td>
			</tr>
			<tr>
				<td>Sexo</td>
				<td><select name="sexo">
				<option value=""></option>
				<option value="F">F</option>
				<option value="M">M</option>
				</select></td>
			</tr>
			<tr>
				<td>Fecha de Nacimiento</td>
				<td><input type="date" name="fechanac" size="10"></td>
			</tr>
			<tr>
				<td> status</td>	
				<td><select name="status">
				<option value=""></option>
				<option value="1"> activo</option>
				<option value="0">Baja</option>
				</select></td>
			</tr>
		</table><br>
		<input  id="botonAdmin" align="center" TYPE=SUBMIT VALUE="Guardar">  
			</form>
	<a  href="../indexadmin.php" ><input id="botonAdminRegresar" type="button" value="Regresar"></a>
</section>
<?php
    include ('../../footer.php');
  ?>
</body>			
</html>