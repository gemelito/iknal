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

$matricula= $_GET['matricula'];
$id_prof=$_GET['id_prof'];
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
    <div id="datostutor1">
    <?php  
     $matricula= $_GET['matricula'];
     
       
          $query = mysql_query("SELECT * FROM proyecto WHERE matricula='$matricula'",$link);         
          if ($row = mysql_fetch_array($query)){
                echo "\n";                
          do {                

            echo "Verano: <input name='verano' readonly='readonly' size='10' value='".$row['verano_proyecto']."'><br/>";
              
                $lugar=$row["lugar_proyecto"];
                $query = "SELECT id_localidad, localidad , estado_localidad FROM localidad WHERE $lugar=id_localidad ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo 'Lugar: <input name="municipio" readonly="readonly" size="30" value="'.$cambio["localidad"].'"><br/>'; 

              echo "Titulo: <input name='titulo' size='40' readonly='readonly' value='".$row['titulo_proyecto']."'><br/>";
              echo "Área de desarrollo: <input  name='area' readonly='readonly' size='30' value='".$row["areadesarrollo_proyecto"]."'><br/>";
              echo "Tipo: <input  name='tipo' readonly='readonly' size='30' value='".$row["tipo_proyecto"]."'><br/>"; 

                $estado=$row["estado_proyecto"];
                $query= "SELECT id_estado_proyecto, estado_proyecto from estado_proyecto WHERE $estado=id_estado_proyecto ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Estado: <input  name='estado' readonly='readonly' size='10' value=".$cambio["estado_proyecto"]."><br/>"; 

                $director=$row["director_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $director=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Director: <input name='Director' readonly='readonly' size='30' value='".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."'><br/>"; 

                $asesor1=$row["asesor1_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $asesor1=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Asesor 1: <input  name='asesor1' readonly='readonly' size='30' value='".$cambio['nombre_profesor']." ".$cambio['apellidop_profesor']." ".$cambio['apellidom_profesor']."'><br/>"; 

                $asesor2=$row["asesor2_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $asesor2=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Asesor 2: <input name='asesor2' readonly='readonly' size='30' value='".$cambio['nombre_profesor']." ".$cambio['apellidop_profesor']." ".$cambio['apellidom_profesor']."'><br/>";

                $suplente=$row["suplente_proyecto"];
                $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $suplente=id_profesor ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                  echo "Suplente: <input name='suplente' readonly='readonly' size='30' value='".$cambio['nombre_profesor']." ".$cambio['apellidop_profesor']." ".$cambio['apellidom_profesor']."'><br/>";

                $modalidad=$row["modalidad_proyecto"];
                $query= "SELECT id_modalidad_proyecto, modalidad_proyecto from modalidad_proyecto WHERE $modalidad=id_modalidad_proyecto ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
              echo "Modalidad: <input name='modalidad' readonly='readonly' size='10' value='".$cambio['modalidad_proyecto']."'><br/>"; 

              echo "Equipo: <input name='equipo' readonly='readonly' size='50' value='".$row['equipo_proyecto']."'><br/>";  
              echo "<div id='tablaboton'>";
              echo"<a href='modificarproyecto.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' id='botonmodificar' >Modificar Datos </a>";             
          } while ($row = mysql_fetch_array($query));              
                 
            
          } else {
              echo "<div id='tablaboton'>";
              echo"<a id='botonregresar' href='proyecto.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Agregar Datos </a>";
              echo "<a id='botonotro' href='asesorados.php'>Regresar</a>";
              }
    ?>
      </div>
     </div>
     <figure>
     <div>
        <?php
          $query = "SELECT matricula_alumno, foto FROM alumno WHERE matricula_alumno = $matricula";
                  $resultado=mysql_query($query,$link);
                  while ($lista=mysql_fetch_array($resultado)){
                    if ($lista['foto'] == 0){
                      echo "<img src='images/alumno/".$lista['foto'].".png' width='260' height='260'><br>";
                    }else{
                      echo "<img src='images/alumno/".$lista['foto']."' width='260' height='260'><br>";                      
                    }
                  }
              ?>
          </div>
      </figure>
  </section>
          
  <?php
    include ('footer.php');
  ?>
</body>
</html>