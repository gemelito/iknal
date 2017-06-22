<?php
include("config/conexion.php");
mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
// load the login class
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
?>
<!DOCTYPE HTML>
  <HTML lang="es">
    <head>
      <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
          <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta charset="utf-8" />
      <title>Iknal</title>
    </head overflow-x:hidden;>
	<body>
  <?php
  include ('header.php');
  ?>
  <section>
  <h1>Formatos</h1>
     <?php
      echo "<div id='contenedorformato'>";
      echo "<div id='menuformato'>";

      echo "<ul class='ca-menuformato'>";
      echo    "<li>
                <a href='pdfs/Formato de Baja Temporal Estudiante.pdf' >
                    <span class='ca-iconformato' >Formato de Baja Temporal (Estudiante)</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

       echo "<li><a href='pdfs/Formato de Fortalesas y debilidades.pdf' >
            <span class='ca-iconformato' >Formato de Fortalesas y Debilidades</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

       echo "<li><a href='pdfs/Formato- SOLICITUD-CAMBIO-DE-TURNO.pdf' >
            <span class='ca-iconformato' >Formato de Solicitud de Cambio de Turno</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

      echo "<li><a href='pdfs/Formato-altas-baja-materias.pdf' >
            <span class='ca-iconformato' >Formato de Altas y Bajas de Materias</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

      echo "<li><a href='pdfs/Formato-ejemplo-aceptacion-servicio-becario2.pdf' >
            <span class='ca-iconformato' >Formato de Aceptacion de Servicio Becario</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";
      echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";

      echo "<li><a href='pdfs/Formato-ejemplo-justificacion-ausencia-profesor.pdf'>
            <span class='ca-iconformato' >Formato de Justificación Ausencia Profesor</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

      echo "<li><a href='pdf/index.php'>
            <span class='ca-iconformato' >Formato de Justificación Inasistecia Alumno</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

      echo "<li><a href='pdfs/Formato-ejemplo-llenado-formatos-beca-ayuda.pdf'>
              <span class='ca-iconformato'>Formato de Ejemplo de llenado de Beca Manutención</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

       echo "<li><a href='pdfs/Formato-SOLICITUD-CAMBIO-DE-CARRERA.pdf' >
            <span class='ca-iconformato' >Formato de Solicitud de Cambio de Carrera</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

       echo "<li><a href='pdfs/PREINS-01-formato-de-reinscripcion.pdf' >
            <span class='ca-iconformato' >Formato de Re-inscripción</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";
       echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";

       echo "<li><a href='pdfs/PREINS-01-formato-de-reinscripcion-ejemplo.pdf' >
            <span class='ca-iconformato' >Formato de Ejemplo de Re-Inscripción</span>
                    <div class='ca-contentformato'>
                    </div>  
      </a></li>";

      echo "</ul>";
      echo "<br>"."<br>"."<br>"."<br>";

     
      echo "</body>";
      ?>
      
  </section>
  <?php
    include ('footer.php');
  ?>

  </body>
</html>