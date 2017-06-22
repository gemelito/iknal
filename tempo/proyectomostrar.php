<?php
  include("config/conexion.php");
  mysql_query("SET NAMES 'utf8'");
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
    $nombre=$_GET['nombre'];
    $apellidop=$_GET['apellidop'];
    $apellidom=$_GET['apellidom'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Tutoría IKNAL</title>
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <meta charset="utf-8" />
</head>
<body>
  <?php
    include ('header.php');
  ?>
  <nav>
    
  </nav>
  <section>
    <h1><?php  echo "<a class='centro'><b>$nombre $apellidop $apellidom </b></a>"; ?></h1>
    <?php  
          $matri=$_GET["matricula"];
          $query = mysql_query("SELECT * FROM proyecto WHERE matricula='$matri'",$link);         
          if ($row = mysql_fetch_array($query)){
                echo "\n";                
          do {               

              echo "Verano: <input type='hidden' name='verano' readonly='readonly' value=".$row["verano_proyecto"]."><br/>";

                $lugar=$row["lugar_proyecto"];
                $query = "SELECT id_localidad, municipio_localidad ,estado_localidad FROM localidad WHERE $lugar=id_localidad ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<input id='fondo' name='municipio' readonly='readonly' size='10' value=".$cambio['municipio_localidad']."><br/>"; 

              echo "Titulo: <input id='fondo' name='titulo' readonly='readonly' size='10' value=".$row["titulo_proyecto"]."><br/>";
              echo "Área de desarrollo: <input id='fondo' name='area' readonly='readonly' size='10' value=".$row["areadesarrollo_proyecto"]."><br/>";
              echo "Tipo: <input id='fondo' name='tipo' readonly='readonly' size='10' value=".$row["tipo_proyecto"]."><br/>"; 

                $estado=$row["estado_proyecto"];
                $query= "SELECT id_estado_proyecto, estado_proyecto from estado_proyecto WHERE $estado=id_estado_proyecto ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Estado: <input id='fondo' name='estado' readonly='readonly' size='10' value=".$cambio["estado_proyecto"]."><br/>"; 

                $director=$row["director_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $director=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Director: <input id='fondo' name='Director' readonly='readonly' size='30' value=".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."><br/>"; 

                $asesor1=$row["asesor1_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $asesor1=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Asesor 1: <input id='fondo' name='asesor1' readonly='readonly' size='30' value=".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."><br/>"; 
                echo "Asesor 1:"; echo .$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."><br/>"; 

                $asesor2=$row["asesor2_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $asesor2=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Asesor 2: <input id='fondo' name='asesor2' readonly='readonly' size='30' value=".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."><br/>";

                $suplente=$row["suplente_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $suplente=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Suplente: <input id='fondo' name='suplente' readonly='readonly' size='30' value=".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."><br/>";

              echo "Modalidad: <input id='fondo' name='modalidad' readonly='readonly' size='10' value=".$row["modalidad_proyecto"]."><br/>";
               
              echo "Equipo: <input id='fondo' name='equipo' readonly='readonly' size='30' value=".$row["equipo_proyecto"].">";               
              
          } while ($row = mysql_fetch_array($query));             
                 
            echo"<a href='../proyecto/modificarproyecto.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom>Modificar Datos </a></div>";
          } else {
                echo "¡ La base de datos está vacia !";}
              echo "<br />Total de Asesorados:  <b>".$numero."</b>";
    ?>
  </section>
          
  <?php
    include ('footer.php');
  ?>
</body>
</html>