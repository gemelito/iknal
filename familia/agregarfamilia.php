<?PHP  
    mysql_query("SET NAMES 'utf8'");
    include('../config/conexion.php');  
    include("../autentificacion.php");

    $id_prof=$_POST['id'];
    $matricula=$_POST['matricula_familia'];
    $nombre=$_POST['nombre'];
    $apellidopaterno=$_POST['apellidopaterno'];
    $apellidomaterno=$_POST['apellidomaterno'];

    $nombrep = $_POST['nombrep'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $correop = $_POST['correop'];
    $telefonop = $_POST['telefonop'];
    $profesion = $_POST['profesion'];
    $nacimientop = $_POST['nacimientop'];
    
    $nombrem = $_POST['nombrem'];
    $apellidopp = $_POST['apellidopp'];
    $apellidopm = $_POST['apellidopm'];
    $correom = $_POST['correom'];
    $telefonom = $_POST['telefonom'];
    $profesionm = $_POST['profesionm'];
    $nacimientom = $_POST['nacimientom'];
    
    $nombreh = $_POST['nombreh'];
    $apellidoph = $_POST['apellidoph'];
    $apellidomh = $_POST['apellidomh'];
    $correoh = $_POST['correoh'];
    $telefonoh = $_POST['telefonoh'];
    $profesionh = $_POST['profesionh'];
    $nacimientoh = $_POST['nacimientoh'];

    $nombrehh = $_POST['nombrehh'];
    $apellidophh = $_POST['apellidophh'];
    $apellidomhh = $_POST['apellidomhh'];
    $correohh = $_POST['correohh'];
    $telefonohh = $_POST['telefonohh'];
    $profesionhh = $_POST['profesionhh'];
    $nacimientohh = $_POST['nacimientohh'];

     $query="INSERT INTO familia (matricula_familia, nombrep, apellidop, apellidom, correop, telefonop, profesion, nacimientop, nombrem, apellidopp, apellidopm, correom, telefonom, profesionm, nacimientom, nombreh, apellidoph, apellidomh, correoh, telefonoh, profesionh, nacimientoh, nombrehh, apellidophh, apellidomhh, correohh, telefonohh, profesionhh, nacimientohh) VALUES ('$matricula','$nombrep','$apellidop','$apellidom','$correop','$telefonop','$profesion','$nacimientop','$nombrem','$apellidopp','$apellidopm','$correom','$telefonom','$profesionm','$nacimientom','$nombreh','$apellidoph','$apellidomh','$correoh','$telefonoh','$profesionh','$nacimientoh','$nombrehh','$apellidophh','$apellidomhh','$correohh','$telefonohh','$profesionhh','$nacimientohh')";  
    /* EN ESTA LÍNEA INSERTAMOS LOS DATOS QUE TRAEMOS DE AGREGAR.HTML A LA TABLA DE DE TUTORADO */
    $result=mysql_query($query,$link) or die(mysql_error()); /*ESTA ES UNA COMPROBACIÓN PARA LA CONEXIÓN CON LA BASE DE DATOS */
     if(mysql_affected_rows($link)) 
        {  
        header ('Location: /iknal/familia/consultafamili.php?matricula='.$_POST["matricula_familia"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidopaterno"].'&apellidom='.$_POST["apellidomaterno"]);  
             
        } else  
        {  
        header('Status: 301 Moved Permanently', false, 301);
        header('Location:/iknal/familia/familia.php');
        echo "Error introduciendo el Dato";  
    } /* Cierre del else */  
?>