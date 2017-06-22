<?php  
    mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    include("../config/conexion.php"); 
    include("../autentificacion.php");

    $id_apoyo=$_POST['id_apoyo'];
    $id_prof=$_POST['id'];
    $nombre_alumno=$_POST['nombre_alumno'];
    $apellidop_alumno=$_POST['apellidop_alumno'];
    $apellidom_alumno=$_POST['apellidom_alumno']; 
    $matricula=$_POST['matricula'];

    $institucion = $_POST['institucion'];  
    $tipodeapoyo = $_POST['tipodeapoyo'];
    $ultimavez= $_POST['ultimavez'];   
    $observaciones = $_POST['observaciones'];

    
    
    $query="UPDATE vinculacion.apoyo SET institucion='$institucion', tipodeapoyo='$tipodeapoyo', ultimavez='$ultimavez', observaciones='$observaciones'  where  matricula_apoyo='$matricula' && Id_apoyo='$id_apoyo'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
    if(mysql_affected_rows($link)) 
        {   

             ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos a Datos Generales');</script><?php
            header ('Location: /iknal/apoyo/consultapoyo.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/apoyo/consultapoyo.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);
        } /* Cierre del else */    
       
?>
