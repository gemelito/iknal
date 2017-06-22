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
<html>
<head>
	<title>Sistema de Tutoría IKNAL</title>
		<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8" />
</head>
<body>
	<?php
		include ('header.php');
	?>
	<nav>
		
	</nav>
	<section>
		<h1>Directorio</h1>
		<?php  
	        $numero=0;
	        $query = mysql_query("SELECT * FROM profesor where estado_profesor=1 order by nombre_profesor asc",$link);         
       		if ($row = mysql_fetch_array($query)){
                echo "\n";
                
            do {     
            	$id_prof=$row["id_profesor"];          
               	echo "<form action='datos_profesores.php' method='POST' enctype='multipart/form-data'>  "; 
                echo "<input type='hidden' name='id_prof' readonly='readonly' value=".$row["id_profesor"].">";
          		echo "<z><input id='fondo' name='ubicacion' readonly='readonly' size='10' value=".$row["ubicacion_profesor"].">"; 
                echo "<input id='fondo' name='nombre' readonly='readonly' size='18' value='".$row['nombre_profesor']."'>";
                echo "<input id='fondo' name='apellidop' readonly='readonly' size='13' value='".$row['apellidop_profesor']."'>";
                echo "<input id='fondo' name='apellidom' readonly='readonly' size='13' value='".$row['apellidom_profesor']."'>";             
          	   	echo "<input id='botontutorado' type='submit' name='datos' value='Ver'>";
          	   	echo "<a href='tutorados_profesores.php?id_prof=$id_prof'><input id='botontutorado' type='button' name='tutorados' value='Tutorados'></a>";
          	   	echo "<a href='asesorados_profesores.php?id_prof=$id_prof'><input id='botontutorado' type='button' name='asesorados' value='Asesorados'></a>";
          	   	echo "</form></z>";
                 $numero=$numero+1;

            } while ($row = mysql_fetch_array($query));              
                 
            } else {
                echo "¡ La base de datos está vacia !";}
              echo "<br />Total de Personal:  <b>".$numero."</b>";
?>
	<br><br><br><br><br><br>
	</section>
	<?php
		include ('footer.php');
	?>
</body>
</html>