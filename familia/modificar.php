<?PHP  
    mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    include("../config/conexion.php"); 
    include("../autentificacion.php");
    //alumno
    $id_prof=$_POST['id_tutor'];
    $nombre_alumno=$_POST['nombre_alumno'];
    $apellidop_alumno=$_POST['apellidop_alumno'];
    $apellidom_alumno=$_POST['apellidom_alumno'];  
    $matricula=$_POST['matricula'];
    //padre  
    $nombrep = $_POST['nombrep'];  
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom']; 
    $correop = $_POST['correop']; 
    $telefonop= $_POST['telefonop']; 
    $profesionp= $_POST['profesionp'];
    $nacimientop= $_POST['nacimientop'];
    //madre
    $nombrem = $_POST['nombrem'];  
    $apellidopm = $_POST['apellidopm'];
    $apellidomm = $_POST['apellidomm']; 
    $correom = $_POST['correom']; 
    $telefonom= $_POST['telefonom']; 
    $profesionm= $_POST['profesionm'];
    $nacimientom= $_POST['nacimientom'];
    //hermano1
    $nombreh = $_POST['nombreh'];  
    $apellidoph = $_POST['apellidoph'];
    $apellidomh = $_POST['apellidomh']; 
    $correoh = $_POST['correoh']; 
    $telefonoh= $_POST['telefonoh']; 
    $profesionh= $_POST['profesionh'];
    $nacimientoh= $_POST['nacimientoh'];
    //hermano2
    $nombrehh = $_POST['nombrehh'];  
    $apellidophh = $_POST['apellidophh'];
    $apellidomhh = $_POST['apellidomhh']; 
    $correohh = $_POST['correohh']; 
    $telefonohh= $_POST['telefonohh']; 
    $profesionhh= $_POST['profesionhh'];
    $nacimientohh= $_POST['nacimientohh'];
    
    $query="UPDATE vinculacion.familia SET matricula_familia='$matricula', nombrep='$nombrep', apellidop='$apellidop', apellidom='$apellidom',correop='$correop', telefonop='$telefonop', profesion='$profesionp', nacimientop='$nacimientop', nombrem='$nombrem', apellidopp='$apellidopm', apellidopm='$apellidomm',correom='$correom', telefonom='$telefonom', profesionm='$profesionm', nacimientom='$nacimientom', nombreh='$nombreh', apellidoph='$apellidoph', apellidomh='$apellidomh',correoh='$correoh', telefonoh='$telefonoh', profesionh='$profesionh', nacimientoh='$nacimientoh', nombrehh='$nombrehh', apellidophh='$apellidophh', apellidomhh='$apellidomhh',correohh='$correohh', telefonohh='$telefonohh', profesionhh='$profesionhh', nacimientohh='$nacimientohh' where  matricula_familia='$matricula'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
       if(mysql_affected_rows($link)) 
        {   

            ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos a Datos Generales');</script><?php
            header ('Location: /iknal/familia/consultafamili.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id_tutor"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/familia/consultafamili.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id_tutor"].'&nombre='.$_POST["nombre_alumno"].'&apellidop='.$_POST["apellidop_alumno"].'&apellidom='.$_POST["apellidom_alumno"]);     
        } /* Cierre del else */ 
       
?>
