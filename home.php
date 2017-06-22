<?php
	include("config/conexion.php");
	mysql_query("SET NAMES 'utf8'");
	require_once("classes/Login.php");
	// crear objeto login
	// so this single line handles the entire login process. in consequence, you can simply ...
	//$login = new Login();

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
  	<link rel="stylesheet" href="slide/demo.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="../images/favicon.ico">
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
  		<link rel="stylesheet" href="slide/responsiveslides.css">
  		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  		<script src="slide/responsiveslides.min.js"></script>
  		<script>
	    // You can also use "$(window).load(function() {"
	    $(function () {

	      // Slideshow 3
	      $("#slider3").responsiveSlides({
	        manualControls: '#slider3-pager',
	        maxwidth: 840
	      });

	    });
	  	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>

	<article>
	</article>
	<section>
		<br><br><br>
		<div id="wrapper">
		    <!-- Slideshow 3 -->
		    <ul class="rslides" id="slider3">
		      <li><img src="slide/images/1.jpg" alt=""></li>
		      <li><img src="slide/images/2.jpg" alt=""></li>
		      <li><img src="slide/images/3.jpg" alt=""></li>
		      <li><img src="slide/images/4.jpg" alt=""></li>
		    </ul>

		    <!-- Slideshow 3 Pager 
		    <ul id="slider3-pager">
		      <li><img src="slide/images/1_thumb.jpg" alt=""></a></li>
		      <li><img src="slide/images/2_thumb.jpg" alt=""></a></li>
		      <li><img src="slide/images/3_thumb.jpg" alt=""></a></li>
		      <li><img src="slide/images/4_thumb.jpg" alt=""></a></li>
		    </ul>

		</div>-->

	</section>
	<?php
		include ('footer.php');
	?>
</body>
</html>