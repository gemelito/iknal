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
		<h1>Asesorados</h1>
		<?php  
	        $numero=0;
	        $query = mysql_query("SELECT * FROM alumno where id_asesor='$id_prof' && estado_alumno<3 order by nombre_alumno asc",$link);         
       		if ($row = mysql_fetch_array($query)){
                echo "\n";
                
            do {               
               	echo "<form action='proyectomostrar.php' method='GET' enctype='multipart/form-data'>  "; 
                echo "<input type='hidden' name='id_prof' readonly='readonly' value=".$row["id_tutor"].">";
          		echo "<z><input id='fondo' name='matricula' readonly='readonly' size='10' value=".$row["matricula_alumno"].">"; 
                echo "<input id='fondo' name='nombre' readonly='readonly' size='18' value='".$row['nombre_alumno']."'>";
                echo "<input id='fondo' name='apellidop' readonly='readonly' size='13' value='".$row['apellidop_alumno']."'>";
                echo "<input id='fondo' name='apellidom' readonly='readonly' size='13' value='".$row['apellidom_alumno']."'>";   
         		echo "<input id='fondo' name='semestre' readonly='readonly' size='13' value='".$row['semestre_alumno']."'>";  
         		//$carrera=$row["carrera_alumno"];
                //$consulta = "SELECT Id_carrera, nomenclatura FROM carrera WHERE $carrera = Id_carrera";
                //$resultado=mysql_query($consulta,$link);
                //while ($cambio=mysql_fetch_array($resultado))
                //echo "<input id='fondo' name='nomenclatura' readonly='readonly' value='".$cambio["nomenclatura"]."'>"; 
          	   	echo "<input id='botontutorado' type='submit' name='consultar' value='Consultar'></form>"."</z>";
                //echo "<a href='#?id_prof=$id_prof&matricula=$matricula><input type='button' value='Ingresar Tutoria'></a><br>";
                 $numero=$numero+1;

            } while ($row = mysql_fetch_array($query));              
                 
            } else {
                echo "¡ La base de datos está vacia !";}
              echo "<br />Total de Asesorados:  <b>".$numero."</b>";
?>
	</section>
	<?php
		include ('footer.php');
	?>
</body>
</html>