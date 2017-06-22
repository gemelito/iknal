<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="../images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    	<meta charset="utf-8" />
	<title>Formato Justificación</title>
</head>
<body>
	<?php
		include ('../headers.php');
	?>
<section>
		<h1 align="center">Formato de Justificación</h1>
<div id="amigoss">
<?php
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'");

$dia=date("d");
$mes=date("m");
$año=date("Y");


	echo" <form action='crearPDF.php' method='post'>";
		echo"<label>Escribir matricula:<input type='text' name='matricula'></label><br>";
	    //echo"<select name='matricula'>";
		//echo"<option value=''></option>";
		//	$query="SELECT matricula_alumno from alumno";
		//	$resultado=mysql_query($query,$link);
		//	while ($lista=mysql_fetch_array($resultado))
		//	echo "<option value='".$lista["matricula_alumno"]."'>".$lista["matricula_alumno"]."</option>";
					
	//echo"</select><br><br>";
	echo "Motivo<textarea name='motivo' rows='3' cols='25'></textarea><br><br>";
	echo "Fecha de Ausencia<input type='text' size='30' name='fecha_ausencia' placeholder='ejemplo: dia/mes/a&ntilde;o al dia/mes/a&ntilde;o'>";
	echo"<br><br><input type='submit' value='Crear PDF'>";

	//setlocale(LC_ALL,"es_ES");
	//echo strftime("%A %d de %B del %Y");
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$fechahoy=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
	echo "<input name='fechahoy' type='hidden' value='".$fechahoy."'>";
	echo"</form>";
?>
</div>
</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>