<?php

require('configuracion.php');
mysql_query("SET NAMES 'utf8'");
require('funciones.php');
include('header.html');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Foro - Iknal</title>
			<link rel="shortcut icon" href="../images/favicon.ico">
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
			<link rel="stylesheet" type="text/css" href="../css/estilo.css">
			<meta charset="utf-8">
</head>
<body>
	<section><br><br>
		<br><br>
	<?php
			$color=0;
/* Pedimos todos los temas iniciales (identificador==0)
* y los ordenamos por ult_respuesta */
$sql = "SELECT id, autor, titulo, fecha, respuestas, ult_respuesta ";
$sql.= "FROM foro WHERE identificador=0 ORDER BY ult_respuesta DESC";
$resultado = mysql_query($sql, $con);
if(mysql_num_rows($resultado)>0)
{
	// Leemos el contenido de la plantilla de temas
	$template = implode("", file("temas.html"));
	include('titulos.html');
	while($row = mysql_fetch_assoc($resultado))
	{
		$color=($color==""?"#00BFA5":"");
		$row["color"] = $color;
		mostrarTemplate($template, $row);
		echo "<br />";
	}
}else{
	
	
	while($row = mysql_fetch_assoc($resultado))
	{
		$color=($color==""?"#FFFFFF":"");
		$row["color"] = $color;
		mostrarTemplate($template, $row);
	}

}
echo "<br />";

?>
</section>


</body>
<?php
		include('footer.html');
?>
</html>
