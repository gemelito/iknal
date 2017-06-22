<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/favicon.ico">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8" /> 
</head>
<body>
<div id="tutorados">

<?php

include("config/conexion.php");
mysql_query("SET NAMES 'utf8'");

$palabra=$_POST['q'];
$id_prof=$_GET['id_prof'];
 

$sql="SELECT id_tutor, matricula_alumno,nombre_alumno, apellidop_alumno,apellidom_alumno from alumno where nombre_alumno LIKE '%".$palabra."%'";
$res=mysql_query($sql);

if(mysql_num_rows($res)==0){

echo '<br>';
echo "No se encontraron resultados con el termino ".'<b>'.$palabra.'<b>'.".";

}else{


while($fila=mysql_fetch_array($res)){	
echo "<form  action='ConsultaAlumno.php' method='GET' enctype='multipart/form-data'>  "; 
echo "<input  type='hidden' name='id_prof' readonly='readonly' value=".$fila["id_tutor"].">";
echo "<z><input id='fondo' name='matricula' readonly='readonly' size='10' value=".$fila["matricula_alumno"].">";
echo "<input id='fondo' name='nombre' readonly='readonly' size='15' value='".$fila["nombre_alumno"]."'>";
echo "<input id='fondo' name='apellidop' readonly='readonly' size='10' value=".$fila["apellidop_alumno"].">";
echo "<input id='fondo' name='apellidom' readonly='readonly' size='10' value=".$fila["apellidom_alumno"].">";
          
echo "<input id='botontutorado' type='submit' name='consultar' value='Consultar'></form><br></z>";
}
}
?>
</div>
</section>
</body>
</html>
