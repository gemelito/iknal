<?php  
    mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    include("../../config/conexion.php");
    require_once("../../classes/Login.php");

// crear objeto login
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    //include("views/logged_in.php");
   
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    header("location:../../index.php");
}

   
        $id_prof= $_POST['id']; 
        $matricula=$_POST['matricula'];  
        $nombre = $_POST['nombre'];  
        $apellidop = $_POST['apellidop'];
        $apellidom = $_POST['apellidom'];
        $estado = $_POST['estado'];
        $domicilio= $_POST['direc']; 
        $originario = $_POST['originario']; 
        $semestre = $_POST['semestre']; 
        $generacion=$_POST['generacion'];
        $carrera = $_POST['carrera']; 
        $asesor=$_POST['asesor'];
        $correo = $_POST['correo']; 
        $telefono= $_POST['telefono']; 
        $capacidad= $_POST['capacidad'];
        $sexo= $_POST['sexo'];
        $nacimiento= $_POST['nacimiento'];
 
    
    $query="UPDATE vinculacion.alumno SET matricula_alumno='$matricula', estado_alumno='$estado', direccion_alumno='$domicilio' ,originario_alumno='$originario', semestre_alumno='$semestre', generacion_alumno='$generacion', carrera_alumno='$carrera', id_asesor='$asesor', correo_alumno='$correo',telefono_alumno='$telefono', capacidaddiferente_alumno='$capacidad',sexo_alumno='$sexo', fechanac_alumno='$nacimiento' where  matricula_alumno='$matricula'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
     if(mysql_affected_rows($link)) 
        {              
   ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos a Datos Generales');</script><?php
            header ('Location: /iknal/admin/alumno/alumnomodif.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/admin/alumno/alumnomodif.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);
        }   
       
    ?>