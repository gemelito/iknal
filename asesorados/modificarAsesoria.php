<?php
 //corregir problemas de idioma
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
include("../autentificacion.php");

$id_tutoria=$_POST["id_tutoria"];
$matricula=$_POST['matricula'];
$asunto=$_POST['asunto'];
$id_prof=$_POST['id_prof'];
$nombre=$_POST['nombre_alumno'];
$apellidop=$_POST['apellidop_alumno'];
$apellidom=$_POST['apellidom_alumno'];
    
    $query="UPDATE vinculacion.tutorias SET asunto='$asunto' where  matricula='$matricula' && id_tutoria='$id_tutoria'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
     if(mysql_affected_rows($link)) 
        {              
   ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos');</script><?php
            header ('Location: /iknal/alumno/consulta_tutorias.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/alumno/consulta_tutorias.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);
        }   
       
	?>
