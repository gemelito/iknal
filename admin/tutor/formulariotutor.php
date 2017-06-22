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
<!DOCTYPE HTML>
<html  lang="es">
	<head>
	<link rel="shortcut icon" href="../images/favicon.ico">
	    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <meta charset="utf-8" />
	<title>Datos Tutor</title>
	</head>
<body>
	<?php
		include ('../headeradmin2.php'); //Header hecho solo para ROOT
	?>
<section>
	<section>
		<h1> Información del Tutor </h1>
		<p>Ingrese la información en cada campo y al finalizar de clic en la opción envíar</p>
		<form action="tutor.php" method="POST" enctype="multipart/form-data">
		<div id="amigoss">
			<table> 
				<tr>
					<td>Nombre</td>
					<td> <input type="text" name="nombre" placeholder="Nombre" size="8" required="required"><input type="text" name="apellidop" placeholder="Apellido Paterno" size="13" required="required"><input type="text" name="apellidom" placeholder="Apellido Materno" size="13"> </td>   
				</tr>
				<tr>
					<td>Fecha de Nacimiento</td>				
					<td><input type="date" name="nacimiento"  size="45" ></td>
				</tr>
				<tr>
					<td>Grado</td>				
					<td><select name="grado">
					<option value="0"></option>
					<?php
               		 $query = "SELECT id_gradoacademico, grado_academico FROM gradoacademico";
               		 $resultado=mysql_query($query,$link);
		             while ($lista=mysql_fetch_array($resultado))
		             echo "<option value='".$lista["id_gradoacademico"]."'>".$lista["grado_academico"]."</option>";
	         		 ?>
				 	</select></td>
				
				</tr>

				<tr>
					<td>Perfil Academico</td>			
					<td><select name="perfilacademico">
					<option value="0"></option>
					<?php
					$query="SELECT id_perfil_profesor, perfil_profesor from perfil_profesor";
					$resultado=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["id_perfil_profesor"]."'>".$lista["perfil_profesor"]."</option>";
					?>
					</select></td>
				</tr>
				<tr>
					<td>Cargo</td>				
					<td><select name="cargo">
					<option value="0"></option>
					<?php
					$query="SELECT id_cargo_profesor, cargo_profesor from cargo_profesor";
					$otro=mysql_query($query,$link);
					while ($lista=mysql_fetch_array($otro))
					echo "<option value='".$lista["id_cargo_profesor"]."'>".$lista["cargo_profesor"]."</option>";
					?>
					</select></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td> <input type="text" name="telefono" pattern="[0-9]{10}" placeholder="10 dígitos" size="45"> </td> 
				</tr>
				<tr>
					<td>Correo</td>
					<td> <input type="text" name="correo"  size="45"> </td> 
				</tr>
				<tr>
					<td>Status</td>				
					<td><select name="estado">
					<option value="1"></option>
					<option value="1">Activo</option>
					<option value="0">Inactivo</option>
					</select></td>
				</tr>
				<tr>
					<td>Ubicación</td>
					<td> <input type="text" name="ubicacion"  size="15"></td>
				</tr>

			</table><br>
			<input id="botonAdmin" align="center" TYPE=SUBMIT VALUE="Guardar">  
		</form>
		</div>
		<a href="../indexadmin.php" ><input type="button" value="Regresar" id="botonAdminRegresar"></a>
	</section>
	<?php
		include ('../../footer.php'); //Header hecho solo para ROOT
	?>
</body>
</html>

