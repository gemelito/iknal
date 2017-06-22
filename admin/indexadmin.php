<?Php
    include("../config/conexion.php");
    mysql_query("SET NAMES 'utf8'"); 
    include("../autentificacion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/estilo.css">

    <link rel="stylesheet" href="../css/normalize1.css">
    <title>Administrador</title>
</head>
<body>
<?php
include('headeradmin.php');
?>
<section>
<h1 > <a><b>Bienvenido Administrador</b></a></h1>
<div id='cssmenu'>
  <ul>  
    <br><div><li ><a href="busqueda_profesor.php">Lista de Profesores</a></li></div><br>
    <br><div><li ><a href="">Registros</a>
        <ul>
            <li><a href="../register.php">Registro de Usuario (TUTOR) </a></li>
            <li ><a href="alumno/formulario_alumno.php">Registro de Alumno</a></li>
            <li ><a href="localidad/municipios.php">Registro de Comunidad</a></li>
            <li ><a href="tutor/formulariotutor.php">Registro de Profesor</a></li>
        </ul></li></div><br>
    <br><div><li ><a href="">Asignación de tutor por Carrera</a>
        <ul>
            <li ><a href="carrera_alumno.php?Id_carrera=8"> Lic. Lengua y Cultura</a></li>
                    
            <li ><a href="carrera_alumno.php?Id_carrera=6"> Lic. Turismo Alternativo</a></li>
            <li ><a href="carrera_alumno.php?Id_carrera=7"> Lic. Salud Comunitaria</a></li>
            <li ><a href="carrera_alumno.php?Id_carrera=5"> Lic. Gestión Municipal</a></li>
            <li ><a href="carrera_alumno.php?Id_carrera=3"> Ing. en Sistemas de producción agroecologicos</a></li>
            <li ><a href="carrera_alumno.php?Id_carrera=1"> Ing. TIC </a></li>
            <li ><a href="carrera_alumno.php?Id_carrera=2"> Ing. Desarrollo empresarial</a></li>
            <li ><a href="carrera_alumno.php?Id_carrera=4"> Lic. Gestión y desarrollo de las artes</a></li>

        </ul> </li></div>
  </ul> 
</div>
</section>
<br><br>
<?php
        include ('../footer.php');
    ?>
</body>
</html>