<?php
	include("../config/conexion.php");
	mysql_query("SET NAMES 'utf8'");
	include("../autentificacion.php");
$id_prof=$_GET['id_prof'];
$matricula=$_GET['matricula'];
$nombre=$_GET['nombre'];
$apellidop=$_GET['apellidop'];
$apellidom=$_GET['apellidom'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <meta charset="utf-8" />
	<title>Asesoria</title>
</head>
<body>
 <?php
    include ('../headers.php');
  ?>
<article></article>
<section>
<?php
echo "<h1>".$nombre." ".$apellidom." ".$apellidop."</h1>";
$c=1;
echo '<form name="tutoria" action="AgregarAsesoria.php" method="POST" enctype="multipart/form-data">';
echo '<input type="hidden" name="nombre_alumno" readonly="readonly" value='.$nombre.'>';
echo '<input type="hidden" name="apellidop_alumno" readonly="readonly" value='.$apellidop.'>';
echo '<input type="hidden" name="apellidom_alumno" readonly="readonly" value='.$apellidom.'>';			
echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>'; 
echo'Motivo de visita<textarea name="asunto" rows="5" cols="40"></textarea><br>'; 
	
echo'<input name="matricula" type="hidden" value='.$matricula.'>';
$query=mysql_query("SELECT * from tutorias where matricula=$matricula",$link);
if($conta=mysql_fetch_array($query)){
	do{
	$contar=$conta["contador"]+1;
	
	}while ($conta = mysql_fetch_array($query));
	echo '<input name="contador" type="hidden" value='.$contar.'>';

}else{
echo '<input name="contador" type="hidden" value='.$c.'>';
}

echo'<br><input id="actualizarcancelara"  align="center" TYPE=SUBMIT VALUE="GUARDAR">';  
echo '<input id="actualizarcancelara"  align="center" TYPE=RESET VALUE="REGRESAR" onclick="history.back()">';
echo'</form>';

?>
</section>
</body>
<?php
include('../footer.php');
?>
</html>

