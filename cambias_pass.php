
<!DOCTYPE html>
<html>
<head>
<head>
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
    	<meta charset="utf-8" />
		<title>Cambio de contraseña </title>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<?php
	include ('footer.php');
	?>

	<section>
<?php
	include("conexion.php");
	mysql_query("SET NAMES 'utf8'"); 
	require_once("classes/Login.php");
	include("autentificacion.php");

	echo $sesion=$_SESSION['user_name'];
	$pass_antigua=$_POST['pass_anterior'];
	$pass_nueva=$_POST['pass_nueva'];
	echo $nuevo=password_hash($pass_nueva, PASSWORD_DEFAULT);

$query="UPDATE vinculacion.users SET  user_password_hash='$nuevo' where user_name='$sesion'";  
    $result=mysql_query($query,$link) or die(mysql_error());

 if(mysql_affected_rows($link)) 
        {              
   ?>
  		 <meta http-equiv="content-type" content="charset=utf-8">
   			<script language="javascript">
   			alert('Es necesario cerrar sesión para usar la nueva contraseña.');
   			document.location=('index.php?logout');
   			</script>
   <?php 
        } else {
        ?>
        <meta http-equiv="content-type" content="charset=utf-8">
        	<script language="javascript">
        	alert('Surgio un error al intentar cambiar la contraseña...');
			document.location=('cambiar_contrasena.php');
        	</script>
        	<?php

        }
        ?>
	</section>
</body>
	
</html>

	