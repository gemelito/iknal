
	<?PHP  
    	mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    	include("config/conexion.php"); 
    	include("autentificacion.php");

    	$matricula=$_POST['matricula'];  
    	$asesor=$_POST['asesor'];
        $tutor=$_POST['tutor'];
 
 
    
    $query="UPDATE vinculacion.alumno SET  id_asesor='$asesor', id_tutor='$tutor' where  matricula_alumno='$matricula'";  
    $result=mysql_query($query,$link) or die(mysql_error('error'));          
     if(mysql_affected_rows($link)) 
        {              
   ?><script language="javascript">alert('Actualizado correctamente');</script><?php
            header ('Location: /iknal/ConsultaAlumno.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["tutor"]);    
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/ConsultaAlumno.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["tutor"]);
        }   
       
	?>