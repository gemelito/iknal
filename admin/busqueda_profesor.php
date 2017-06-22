<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <meta charset="utf-8"/>
    <title>Lista de Profesores</title>
</head>
<body>
	<?php
		include ('headeradmin.php'); //Header hecho solo para ROOT
	?>
	<nav>
		
	</nav>
<section>
<h1> Lista de Profesores </h1>
  <div>
    <?php  
      include("../config/conexion.php");  
      include("autentificacion.php"); 
      mysql_query("SET NAMES 'utf8'");   
      $query = mysql_query("SELECT * FROM profesor where estado_profesor=1 order by nombre_profesor asc",$link);       
    if ($row = mysql_fetch_array($query)){           
    do {
               
      echo "<form action='busqueda_alumno.php' method='GET' enctype='multipart/form-data'>  "; 
      echo "<input  type='hidden' name='id_prof' readonly='readonly' size='10' value=".$row["id_profesor"].">";
      echo "<z><input id='fondo' name='nombre' readonly='readonly' size='10' value=".$row["nombre_profesor"].">";
      echo "<input id='fondo' name='apellidop'  readonly='readonly' size='10' value=".$row["apellidop_profesor"].">";
      echo "<input id='fondo'  name='apellidom'  readonly='readonly' size='10' value=".$row["apellidom_profesor"].">";
      echo "<input class='classname' id='botontutorado' data-color='mint' data-style='expand-right' type='submit' name='consultar' value='Consultar'></form><br>"."</z>";
    
    } while ($row = mysql_fetch_array($query));                     
    
    } else {
      echo "¡La base de datos está vacia!";}
    ?>
  <br><br><br><br><br>
  </div>
</section>
<?php
		include ('../footer.php');
	?>
</body>
</html>
