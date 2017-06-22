<?php
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
include("../autentificacion.php");

$id_tutor=$_GET['id_prof'];
$matricula=$_GET['matricula'];
$cambiar=$_GET['cambio'];

$query="UPDATE vinculacion.alumno SET matricula_alumno='$matricula', id_tutor='$cambiar' where  matricula_alumno='$matricula'";  
$resultado=mysql_query($query,$link) or die(mysql_error());          
if(mysql_affected_rows($link)) 
        {             
           header ('Location: /iknal/tutorados.php');
            
        } else{  
           header('Status: 301 Moved Permanently', false, 301);
           header('Location: /iknal/index.php');
        }   

?>

