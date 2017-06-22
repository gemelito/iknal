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
	
	require('configuracion.php');
	mysql_query("SET NAMES 'utf8'");
		include('header.html');

	?>
<section><br><br>
		<h1>Emite un comunicado</h1>
	
	<?php

require('funciones.php');

$id = $_GET["id"];
$citar = $_GET["citar"];
$row = array("id" => $id);
if($citar==1)
{
	require('configuracion.php');
	mysql_query('SET NAMES "utf8"');
	$sql = "SELECT titulo, mensaje, identificador AS id FROM foro WHERE id='$id'";
	$rs = mysql_query($sql, $con);
	if(mysql_num_rows($rs)==1) $row = mysql_fetch_assoc($rs);
	mysql_query("SET NAMES 'utf8'");
	$row["titulo"] = "Re: ".$row["titulo"];
	$row["mensaje"] = "[citar]".$row["mensaje"]."[/citar]";
	if($row["id"]==0) $row["id"]=$id;
}else{
	require('configuracion.php');
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT titulo, mensaje, identificador AS id FROM foro WHERE id='$id'";
	$rs = mysql_query($sql, $con);
	if(mysql_num_rows($rs)==1) $row = mysql_fetch_assoc($rs);
	$row["titulo"] = "";
	$row["mensaje"] = "";
	if($row["id"]==0) $row["id"]=$id;
}
$template = implode("", file('formulario.html'));

mostrarTemplate($template, $row);

?>
</section>

</body>
<footer>
	<?php
		include('footer.html');
	?>
</footer>
</html>