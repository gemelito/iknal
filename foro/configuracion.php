<?php

$bd_host = "localhost";
$bd_usuario = "usrRamon";
$bd_password = "amanecer";
$bd_base = "vinculacion";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);
mysql_query("SET NAMES 'utf8'");
?>