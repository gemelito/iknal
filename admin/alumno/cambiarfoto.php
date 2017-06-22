<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Tutoría IKNAL</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <meta charset="utf-8" />
</head>
<body>
    <nav>
        
    </nav>
    <section>

<?php  
	include ('../../config/conexion.php');
//datos del arhivo 
$matricula=$_GET['matricula'];
$nombre_archivo = $_FILES["subirfoto"]["name"];
$tipo_archivo = $_FILES["subirfoto"]["type"]; 
$tamano_archivo = $_FILES["subirfoto"]["size"];  

//compruebo si las características del archivo son las que deseo  

if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && (    $tamano_archivo < 2000000))) 
{  
    echo "<h2>La extensión o el tamaño de los archivos no es correcta. </h2><br><br><table><tr><td><li><h3>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</h3></td></tr></table>"; 
?>
    <script language="javascript"> 
        setTimeout("url()",3000); 
        function url() 
        { 
        window.history.back(); 
        } 
    </script>            
<?php     
} 
else 
{  
    $nom_img= $matricula.".png"; 
    $directorio = '../../images/alumno'; 

    if (move_uploaded_file($_FILES['subirfoto']['tmp_name'],$directorio . "/" . $nom_img)) 
    {  
          
        //NOS CONECTAMOS A LA BASE DE DATOS 
            
        $query="UPDATE vinculacion.alumno SET foto='$nom_img' WHERE matricula_alumno = $matricula";  
		$result=mysql_query($query,$link) or die(mysql_error());
		if(mysql_affected_rows($link))
        
        {  
            echo "Imagen ingresada correctamente";  
           ?> <script language="javascript"> 
        setTimeout("url()",100); 
        function url() 
        { 		
        window.history.back(); 
        } 
    </script> <?php 
             
        } else  
        {  
        	?>
        	<script language="javascript"> 
        setTimeout("url()",100); 
        function url() 
        { 
        window.history.back(); 
        } 
    </script>  
    <?php
            echo "Error introduciendo la Imagen";  
            ?> <script language="javascript"> 
        setTimeout("url()",100); 
        function url() 
        { 		
        window.history.back(); 
        } 
    </script> <?php 
        } /* Cierre del else */  




    } 
    else 
    { 
        echo "error al subir la Imagen"; 
        ?> <script language="javascript"> 
        setTimeout("url()",100); 
        function url() 
        { 		
        window.history.back(); 
        } 
    </script> <?php 
    } 
} 

?>

   </section>
</body>
</html>