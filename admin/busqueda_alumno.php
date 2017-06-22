<?php
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
include("autentificacion.php");

$nombre_prof=$_GET['nombre'];
$apellidop_prof=$_GET['apellidop'];
$apellidom_prof=$_GET['apellidom'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <meta charset="utf-8" />
  <title>Sistema Iknal</title>
</head>
<body>
<?php
    include ('headeradmin.php'); //Header hecho solo para ROOT
?>
<section>
  <h1> Lista de Tutorados: <?php echo $_GET['nombre']." ".$_GET['apellidop']." ".$_GET['apellidom'] ?> </h1>
<div>
  <?php  
    include("../config/conexion.php");   
    mysql_query("SET NAMES 'utf8'"); 
    $id_prof=$_GET["id_prof"];   
    $numero=0;
    $query = mysql_query("SELECT * FROM alumno where $id_prof=id_tutor && activo=1 order by nombre_alumno asc",$link); 
        
      if ($row = mysql_fetch_array($query)){
                echo "\n";
                
      do {
          echo "<form action='alumno/alumnomodif.php' method='GET' enctype='multipart/form-data'>";
          echo "<input  type='hidden' name='id_prof' readonly='readonly' value=".$row["id_tutor"].">";
          echo "<z><input id='fondo' name='matricula'  readonly='readonly' size='10' value=".$row["matricula_alumno"].">"; 
          echo "<input name='nombre' id='fondo' readonly='readonly' size='10' value=".$row["nombre_alumno"].">";
          echo "<input name='apellidop' id='fondo' readonly='readonly' size='10' value=".$row["apellidop_alumno"].">";
          echo "<input name='apellidom' id='fondo' readonly='readonly' size='10' value=".$row["apellidom_alumno"].">";
          echo "<input id='botontutorado' data-color='mint' data-style='expand-right' type='submit' name='modificar' value='Modificar'></form></z>"; 
                
           $numero=$numero+1;
                
        } while ($row = mysql_fetch_array($query));
                
                 
        } else {
                echo " No se cuenta con Tutorados";}


  ?>
</div>
<?php
 echo "<h1>Total de Tutorados: ".$numero."<h1>"; 
 echo "<a href='busqueda_profesor.php'><button>Regresar</button></a>";
?>
 <br><br><br><br><br>
</section>
<?php
    include ('../footer.php');
  ?>
</body>
</html>