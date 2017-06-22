<?PHP  
    mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    include("../config/conexion.php"); 
    header('Content-Type: text/html; charset=utf-8');
    include("../autentificacion.php");
   
    $id_profesor=$_POST['id_prof'];
    $nombre=$_POST['nombre'];
    $dom=$_POST['direccion'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];  
    $fecha = $_POST['fecha'];  
    $grado = $_POST['grado']; 
    $perfil = $_POST['perfil']; 
    $cargo=$_POST['cargo'];
    $programa=$_POST['programaeducativo'];
    $telefono = $_POST['telefono']; 
    $correo = $_POST['correo']; 
    $ubicacion= $_POST['ubicacion'];

    
    
    
    $query="UPDATE vinculacion.profesor SET nombre_profesor='$nombre',domicilio_profesor='$dom', fechanac_profesor='$fecha', grado_profesor='$grado', perfil_profesor='$perfil', cargo_profesor='$cargo', telefono_profesor='$telefono', correo_profesor='$correo', ubicacion_profesor='$ubicacion', programa_profesor='$programa' where  id_profesor='$id_profesor'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
    if(mysql_affected_rows($link)){              
    ?><script type="text/javascript">alert('Actualizado sus datos.. un momento porfavor');</script><?php
            header ('Location: /iknal/tutor/datos_tutor.php?id_prof='.$_POST["id_prof"]);  
            
        } else{  
            ?><script language="javascript">alert('Existe un error, verifica');</script><?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/tutor/datos_tutor.php?id_prof='.$_POST["id_prof"]);
        } /* Cierre del else */   
       
?>
