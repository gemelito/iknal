<?php
	include("config/conexion.php");
	mysql_query("SET NAMES 'utf8'"); 
	require_once("classes/Login.php");
	include("autentificacion.php");
	?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<link rel="shortcut icon" href="images/favicon.ico">
				<link rel="stylesheet" type="text/css" href="css/normalize.css">
					<link rel="stylesheet" type="text/css" href="css/estilo.css">
    			<meta charset="utf-8" />

    	</head>
<body>
	<?php
		include ('header.php');
	?>
	
	<section>

			<br><br><h1 align="center">Cambio de contraseña</h1><br><br>
	<div>

		<form method="POST" action="cambias_pass.php" enctype="multipart/form-data">
	

			Contraseña Anterior:<input type="password"  size="25" name="pass_anterior" required><br>

			Nueva Contraseña: 	<input type="password" size="25" name="pass_nueva" required><br><br>

			<input type="submit" value="enviar">
			<input type="submit" value="cancelar">


		</form>
	</div>

	</section>



	<?php
		include ('footer.php');
	?>

</body>
</html>

