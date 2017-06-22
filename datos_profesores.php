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
	?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<link rel="shortcut icon" href="../images/favicon.ico">
				<link rel="stylesheet" type="text/css" href="css/normalize.css">
					<link rel="stylesheet" type="text/css" href="css/estilo.css">
    			<meta charset="utf-8" />
			<title>Datos Tutor</title>
		</head>
	<body>
	<?php
		include ('header.php');
	?>
	<article></article>
	<section>
			<h1 align="center"> Mis Datos</h1><br>
			<div id="datostutor">
			<?php
			$id_prof=$_POST['id_prof'];
			mysql_query("SET NAMES 'utf8'");
			header('Content-Type: text/html; charset=utf-8');	
			$result2 = mysql_query("SELECT * FROM profesor where id_profesor='$id_prof'" , $link);
			if ($row = mysql_fetch_array($result2)){

					echo "Nombre: "; echo "<b>".$row["nombre_profesor"]." ";
					echo $row["apellidop_profesor"]." ";
					echo $row["apellidom_profesor"]."<br>"."</b>";
					echo "Domicilio: "; echo "<b>".$row["domicilio_profesor"]." </b><br />";
					echo "Fecha de Nacimiento: "; echo "<b>".$row["fechanac_profesor"]."<br>"."</b>";
					
					echo "Grado:";
					$grado=$row["grado_profesor"];
	                $query = "SELECT id_gradoacademico, grado_academico FROM gradoacademico WHERE $grado = id_gradoacademico";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["grado_academico"].'<br>'.'</b>';

					echo "Perfil Académico: ";
					$perfil=$row["perfil_profesor"];
	                $query = "SELECT id_perfil_profesor, perfil_profesor FROM perfil_profesor WHERE $perfil = id_perfil_profesor";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["perfil_profesor"].'<br>'.'</b>';

					echo "Cargo: ";
					$cargo=$row["cargo_profesor"];
	                $query = "SELECT id_cargo_profesor, cargo_profesor FROM cargo_profesor WHERE $cargo = id_cargo_profesor";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["cargo_profesor"].'<br>'.'</b>';

					echo "Teléfono:"; echo "<b>".$row["telefono_profesor"]."<br>"."</b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correo_profesor"]."<br>"."</b>";
					echo "Ubicación: "; echo "<b>".$row["ubicacion_profesor"]."<br>"."</b>";
					echo "</tr> \n";			
				} else {
					echo "¡ La base de datos está vacia !";
				}
			
			?>
			</div>
		</section>
	<?php
		include ('footer.php');
	?>
</body>
</html>
