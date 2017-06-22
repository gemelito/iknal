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
	<link rel="shortcut icon" href="images/favicon.ico">
	<title>Sistema de Tutoría IKNAL</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="ajax1.js"></script>
	<meta charset="utf-8" /> 

</head>
<body>
	<?php
		include ('header.php'); //Header hecho solo para ROOT
	?>
	<nav></nav>
	<section>
		<h1>Tutorados</h1>
		<h4 align="right" style="margin-right: 75px">
		Buscar <input type="text" id="busca" name="bus"  placeholder="Buscar en todo"onkeyup="buscar()" required />
		</h4>
		<div id="tutorados">
		<?php  
	        $numero=0;
	        $query = mysql_query("SELECT * FROM alumno where id_tutor='$id_prof' && activo=1 order by nombre_alumno asc",$link);         
       		if ($row = mysql_fetch_array($query)){
                echo "\n";
                
            do {   
            	
            	$matricula=$row["matricula_alumno"];           
               	echo "<form action='tutoradomenu.php' method='GET' enctype='multipart/form-data'>  "; 
                echo "<input type='hidden' name='id_prof' readonly='readonly' value='".$row['id_tutor']."'>";
          		echo "<z><input id='fondo' name='matricula' readonly='readonly' size='10' value='$matricula'>"; 
                echo "<input id='fondo' name='nombre' readonly='readonly' size='18' value='".$row['nombre_alumno']."'>";
                echo "<input id='fondo' name='apellidop' readonly='readonly' size='13' value=".$row["apellidop_alumno"].">";
                echo "<input id='fondo' name='apellidom' readonly='readonly' size='13' value=".$row["apellidom_alumno"].">";  
                $estado= $row["estado_alumno"];
                if ($estado == 0){
                	echo "<input id='fondo' name='estado' readonly='readonly' size='13' value='Presencial'>"; 
                }else{
                	echo "<input id='fondo' name='estado' readonly='readonly' size='13' value='No Presencial'>"; 
                }  

          	   	echo "<input id='botontutorado' type='submit' name='consultar' value='Consultar'/></form>"."</z>";
          	   	//echo "<a href='alumno/alumno_baja.php?id_prof=$id_prof&matricula=$matricula&cambio=0'><input type='button' value='Solicitar baja'></a><br>";
                 $numero=$numero+1;

            } while ($row = mysql_fetch_array($query));              
                 
            } else {
                echo " Aún no cuenta con tutorados";}
             echo "<br />Total de Tutorados:  <b>".$numero."</b>";
             echo "<p style='color:red'>* Para alguna aclaración contacte a comite de Tutorías tutorias@uimqroo.edu.mx</p>";



?>
		</div>
	</section>
	<?php
		include ('footer.php');
	?>
</body>
</html>