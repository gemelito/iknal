<?PHP  
    mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    include("../config/conexion.php"); 
    include("../autentificacion.php");
    
    $id_prof=$_POST['id'];
    $nombre_alumno=$_POST['nombre'];
    $apellidop_alumno=$_POST['apellidop'];
    $apellidom_alumno=$_POST['apellidom']; 
    
    $matricula=$_POST['matricula'];  
    $amigo = $_POST['amigo'];  
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $amistad = $_POST['amistad'];
    $opinion = $_POST['opinion'];
    $nombre_amigo = $_POST['nombre_amigo'];
    $apellidop_amigo = $_POST['apellidop_amigo'];
    $apellidom_amigo = $_POST['apellidom_amigo'];
   
    
    
    $query="UPDATE vinculacion.amigo SET matricula_amigo='$matricula', tutor_amigo='$amigo', direccion='$direccion',telefono='$telefono',amistadanios='$amistad', opinion='$opinion',nombre_amigo='$nombre_amigo',apellidop_amigo='$apellidop_amigo',apellidom_amigo='$apellidom_amigo' where  matricula_amigo='$matricula'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
     if(mysql_affected_rows($link)) 
        {   

            ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos a Datos Generales');</script><?php
            header ('Location: /iknal/amigo/consulta_amigo.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/amigo/consulta_amigo.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);
        } /* Cierre del else */  
       
?>
