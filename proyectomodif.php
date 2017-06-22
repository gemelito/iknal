
	<?PHP  
    mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
    include("config/conexion.php"); 
    require_once("classes/Login.php");
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
        header("location:index.php");
    }
    $sesion=$_SESSION['user_name'];
        $query="SELECT Id_profes, user_name FROM users WHERE user_name = '$sesion' "; //CARGAMOS LOS DATOS PARA BUSCAR EL ID DE PROFE
        $resultado=mysql_query($query,$link);
        while ($lista=mysql_fetch_array($resultado)){
            $id_prof= $lista["Id_profes"]; 
        }


    	$matricula=$_POST['matricula'];
        $id_prof= $_POST['id']; 
        $nombre = $_POST['nombre'];  
        $apellidop = $_POST['apellidop'];
        $apellidom = $_POST['apellidom'];  
    	$verano=$_POST['verano'];
        $lugar=$_POST['lugar'];
        $titulo=$_POST['proyecto'];
        $area=$_POST['area'];
        $tipo=$_POST['tipoproyecto'];
        $estado=$_POST['estado'];
        $director=$_POST['director'];
        $asesor1=$_POST['asesor1'];
        $asesor2=$_POST['asesor2'];
        $suplente=$_POST['suplente'];
        $modalidad=$_POST['modalidad'];
        $equipo=$_POST['equipo'];

 
    
    $query="UPDATE vinculacion.proyecto SET matricula='$matricula', verano_proyecto='$verano', lugar_proyecto='$lugar', titulo_proyecto='$titulo', areadesarrollo_proyecto='$area', tipo_proyecto='$tipo', estado_proyecto='$estado', director_proyecto='$director', asesor1_proyecto='$asesor1', asesor2_proyecto='$asesor2', suplente_proyecto='$suplente', modalidad_proyecto='$modalidad', equipo_proyecto='$equipo'  where  matricula='$matricula'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
     if(mysql_affected_rows($link)) 
        {              
   ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos a Datos Generales');</script><?php
            header ('Location: /iknal/proyectomostrar.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/modificarproyecto.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);
        }   
       
	?>
