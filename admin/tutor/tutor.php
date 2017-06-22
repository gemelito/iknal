<?PHP  
    include('../../config/conexion.php'); 
    mysql_query("SET NAMES 'utf8'");
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

    $nombre=$_POST['nombre'];
    $apellidop=$_POST['apellidop'];
    $apellidom=$_POST['apellidom'];
    $nacimiento= $_POST['nacimiento'];
    $grado=$_POST['grado'];
    $perfilacademico=$_POST['perfilacademico'];
    $cargo=$_POST['cargo'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $estado=$_POST['estado'];
    $ubicacion=$_POST['ubicacion'];
   
    $query="INSERT INTO profesor (nombre_profesor, apellidop_profesor, apellidom_profesor, fechanac_profesor, grado_profesor, perfil_profesor, cargo_profesor, telefono_profesor, correo_profesor, estado_profesor, ubicacion_profesor) 
     VALUES ('$nombre', '$apellidop', '$apellidom', '$nacimiento', '$grado', '$perfilacademico', '$cargo', '$telefono', '$correo', '$estado', '$ubicacion')";  
    /* EN ESTA LÍNEA INSERTAMOS LOS DATOS QUE TRAEMOS DE AGREGAR.HTML A LA TABLA DE DE TUTORADO */
    $result=mysql_query($query,$link) or die(mysql_error()); /*ESTA ES UNA COMPROBACIÓN PARA LA CONEXIÓN CON LA BASE DE DATOS */
     if(mysql_affected_rows($link)){  
           ?><script type="text/javascript">alert('Información agregada correctamente..');</script><?php
           header('Location:/iknal/admin/tutor/formulariotutor.php');  
        } else{  
           ?><script type="text/javascript">alert('Error introduciendo datos..')</script><?php 
           header('Status: 301 Moved Permanently', false, 301);
           header('Location:/iknal/admin/tutor/formulariotutor.php');
    } /* Cierre del else */  
?>