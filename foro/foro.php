<!DOCTYPE html>
<html>
	<head>
		<title>Foro - Iknal</title>
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
			<link rel="stylesheet" type="text/css" href="../css/estilo.css">
			<meta charset="utf-8" />
	</head>
<body>
		<?php

			require('header.html');
		?>
<section><br><br>

<?php

require('configuracion.php');
mysql_query("SET NAMES 'utf8'");
require('funciones.php');
$id = $_GET["id"];
$color=0;

if(empty($id)) Header("Location: index.php");
mysql_query("SET NAMES 'utf8'");
$sql = "SELECT id, autor, titulo, mensaje, ";
$sql.= "DATE_FORMAT(fecha, '%d/%m/%Y %H:%i:%s') AS enviado FROM foro ";
$sql.= "WHERE id='$id' OR identificador='$id' ORDER BY fecha ASC";
$rs = mysql_query($sql, $con);

if(mysql_num_rows($rs)>0)
{
	
	include('titulos_post.html');
	$template = implode("", file('post.html'));
	while($row = mysql_fetch_assoc($rs))
	{	
		mysql_query("SET NAMES 'utf8'");
		$color=($color==""?"#00BFA5":"");
		$row["color"] = $color;
		//manipulamos el mensaje
		$row["mensaje"] = nl2br($row["mensaje"]);
		$row["mensaje"] = parsearTags($row["mensaje"]);
		mostrarTemplate($template, $row);
		echo "<br />";
		
	}
}
?>
</section>
	</body>
		<footer>
		<?php
			include('footer.html');
		?>
		</footer>
</html>
	