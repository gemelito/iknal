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
$id_prof=$_GET['id_prof'];
$matricula=$_GET['matricula'];
$nombre=$_GET['nombre'];
$apellidop=$_GET['apellidop'];
$apellidom=$_GET['apellidom'];
?>
<!DOCTYPE HTML>
  <HTML lang="es">
    <head>
      <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <meta charset="utf-8" />
      <title>Iknal</title>
    </head>
	<body>
  <?php
    include ('header.php');
  ?>
  <article></article>
  <section>
    
      <?php
      echo "<br>"."<br>"."<br>";
      echo "<a class='centro'><b>Tutorado: $nombre $apellidop $apellidom </b></a>";
      echo "<div id='contenedor'>";
      echo "<div id='menu'>";

      echo "<ul class='ch-grid'>";
      echo    "<li>
              <span class='ca-icon' >TUTORADO (a)</span> 
              <div class='ch-item ch-img-1'>       
                <div class='ch-info'>
                    <h3></h3>
                    <p><a href='alumno/consultagral.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >VER Información</a><p></p>
                  </div>  
                </div>
          </li>  
      </li>";

      echo "<li>
      <span class='ca-icon' >ASESOR (a)</span> 
              <div class='ch-item ch-img-2'>        
                <div class='ch-info'>
                    <h3></h3>
                    <p><a href='asesor/datos_asesor.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >VER Información</a></p></p>
                  </div>  
                </div>
        </li>";

      echo "<li>
            <span class='ca-icon' >APOYO (s)</span> 
            <div class='ch-item ch-img-3'>        
                <div class='ch-info'>
                    <h3></h3>
                    <p><a href='apoyo/consultapoyo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >VER Información</a></p></p>
                  </div>  
                </div>
        </li>";

      echo "<li>
         <span class='ca-icon' >FAMILIA</span> 
            <div class='ch-item ch-img-4'>        
                <div class='ch-info'>
                    <h3></h3>
                    <p><a href='familia/consultafamili.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >VER Información</a></p></p>
                  </div>  
                </div>
       </li>";

      echo "<li>
          <span class='ca-icon' >AMIGO (s)</span> 
            <div class='ch-item ch-img-5'>        
                <div class='ch-info'>
                    <h3></h3>
                    <p><a href='amigo/consulta_amigo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >VER Información</a></p></p>
                  </div>  
                </div>
        </li>";

      echo "</ul>";
      echo "<br>"."<br>"."<br>"."<br>";

      echo "<a id='botontutoria' href='alumno/consulta_tutorias.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'><b color='black'> Tutorias</b></a>";

      echo "</body>";
      ?>
      
  </section>
  <?php
    include ('footer.php');
  ?>

  </body>
</html>