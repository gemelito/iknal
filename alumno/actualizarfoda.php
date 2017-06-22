
	<?php
		include("../config/conexion.php");
 		mysql_query("SET NAMES 'utf8'");
 		include("../autentificacion.php");

$matricula=$_POST['matricula'];
$id_prof=$_POST['id_prof'];	
$nombre=$_POST['nombre'];
$apellidop=$_POST['apellidop'];
$apellidom=$_POST['apellidom'];
$fortalezas=$_POST['fortalezas'];
$oportunidades=$_POST['oportunidades'];
$debilidades=$_POST['debilidades'];
$amenazas=$_POST['amenazas'];





   $query="UPDATE vinculacion.foda SET matricula_foda='$matricula', fortalezas='$fortalezas', oportunidades='$oportunidades', debilidades='$debilidades', amenazas='$amenazas'  where  matricula_foda='$matricula'";  
    $result=mysql_query($query,$link) or die(mysql_error());          
     if(mysql_affected_rows($link)) 
        {              
   ?><script language="javascript">alert('Actualizado correctamente... en breve te direccionaremos a Datos Generales');</script><?php
            header ('Location: /iknal/alumno/consultfoda.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id_prof"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);     
            
        } else  
        {  
            ?><script language="javascript">alert('Existe un error, verifica');</script>"<?php
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: /iknal/alumno/consultagral.php?matricula='.$_POST["matricula"].'&id_prof='.$_POST["id_prof"].'&nombre='.$_POST["nombre"].'&apellidop='.$_POST["apellidop"].'&apellidom='.$_POST["apellidom"]);
        }   
       
	?>
