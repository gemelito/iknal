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
			<link rel="shortcut icon" href="images/favicon.ico">
				<link rel="stylesheet" type="text/css" href="css/normalize.css">
					<link rel="stylesheet" type="text/css" href="css/estilo.css">
    			<meta charset="utf-8" />
			<title>Tutorados</title>
		</head>
	<body>
	<?php
		include ('header.php');
	?>
	<article></article>
	<section>
			<h1 align="center"> Lista de Tutorados</h1><br>
			<div id="tutorados">
			<?php
			$id_prof=$_GET['id_prof'];
			$numero=0;
			mysql_query("SET NAMES 'utf8'");
			header('Content-Type: text/html; charset=utf-8');
	        $query = mysql_query("SELECT * FROM alumno where id_tutor='$id_prof' && activo=1 order by nombre_alumno asc",$link);         
       		if ($row = mysql_fetch_array($query)){
                echo "\n";
                
            do {  
            	echo "<z><input id='fondo' name='matricula' readonly='readonly' size='10' value='".$row['matricula_alumno']."'>"; 
                echo "<input id='fondo' name='nombre' readonly='readonly' size='18' value='".$row['nombre_alumno']."'>";
                echo "<input id='fondo' name='apellidop' readonly='readonly' size='13' value=".$row["apellidop_alumno"].">";
                echo "<input id='fondo' name='apellidom' readonly='readonly' size='13' value=".$row["apellidom_alumno"]."></z><br>";             
                 $numero=$numero+1;

            } while ($row = mysql_fetch_array($query));              
                 
            } else {
                echo "¡ La base de datos está vacia !";}
             echo "<br />Total de Tutorados:  <b>".$numero."</b>";
?>
		</div>
	</section>
	<?php
		include ('footer.php');
	?>
</body>
</html>