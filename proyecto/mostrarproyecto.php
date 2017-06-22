<?php
    include('../config/conexion.php');
    include('../autoidentificacion.php');
    mysql_query("SET NAMES 'utf8'");
    $matricula= $_GET['matricula'];
    $id_prof=$_GET['id_prof'];
    $nombre=$_GET['nombre'];
    $apellidop=$_GET['apellidop'];
    $apellidom=$_GET['apellidom'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
      <link rel="shortcut icon" href="../images/favicon.ico">
      <link rel="stylesheet" type="text/css" href="../css/normalize.css">
      <link rel="stylesheet" type="text/css" href="../css/estilo.css">
      <meta charset="utf-8" />
          <title>Modulo del Verano</title>
</head>
<body>
<?php
    include('../headers.php');
?>
    <section>

<?php    
        $matri=$_GET["matricula"]; 
        mysql_query("SET NAMES 'utf8'");    
        $result = mysql_query("SELECT * FROM proyecto WHERE matricula='$matri'",$link);  
       if ($row = mysql_fetch_array($result)){

                echo "<br><br>\n";
                echo "<table border='3' align='center'>\n";
                echo "<tr> \n";
                echo "<br><br>\n";
                
                echo "<b><td width='5%'>Verano</b></td> \n";
                echo "<td width='10%'><b>Lugar</b></td> \n";
                echo "<td width='14%'><b>Titulo</b></td> \n";
                echo "<td width='14%'><b>Area de Desarrollo</b></td> \n";
                echo "<td width='6%'><b>Tipo</b></td> \n";
                echo "<td width='8%'><b>Estado</b></td> \n";
                echo "<td width='10%'><b>Director</b></td> \n";
                echo "<td width='14%'><b>Asesor1</b></td> \n";
                echo "<td width='15%'><b>Asesor2</b></td> \n";
                echo "<td width='15%'><b>Suplente</b></td> \n";
                echo "<td width='15%'><b>Modalidad</b></td> \n";
                echo "<td width='15%'><b>Equipo</b></td> \n";
               
                echo "</tr> \n";
            do {
                echo "<tr> \n";
                
                echo "<td>".$row["verano_proyecto"]."</td> \n";
                $lugar=$row["lugar_proyecto"];
                $query = "SELECT id_localidad, municipio_localidad ,estado_localidad FROM localidad WHERE $lugar=id_localidad ";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<td>".$cambio["municipio_localidad"].",".$cambio["estado_localidad"]."</td>\n"; 

                echo "<td>".$row["titulo_proyecto"]."</td>\n";
                echo "<td>".$row["areadesarrollo_proyecto"]."</td>\n";
                echo "<td>".$row["tipo_proyecto"]."</td>\n";

              $estado=$row["estado_proyecto"];
              $query= "SELECT id_estado_proyecto, estado_proyecto from estado_proyecto WHERE $estado=id_estado_proyecto ";
              $resultado=mysql_query($query,$link);
              while ($cambio=mysql_fetch_array($resultado))
              echo "<td>".$cambio["estado_proyecto"]."</td>\n";

              $director=$row["director_proyecto"];
              $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $director=id_profesor ";
              $resultado=mysql_query($query,$link);
              while ($cambio=mysql_fetch_array($resultado))
              echo "<td>".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."</td>\n";


              $asesor1=$row["asesor1_proyecto"];
              $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $asesor1=id_profesor ";
              $resultado=mysql_query($query,$link);
              while ($cambio=mysql_fetch_array($resultado))
              echo "<td>".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."</td>\n";

              $asesor2=$row["asesor2_proyecto"];
              $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $asesor2=id_profesor ";
              $resultado=mysql_query($query,$link);
              while ($cambio=mysql_fetch_array($resultado))
              echo "<td>".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."</td>\n";

              $suplente=$row["suplente_proyecto"];
              $query= "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor WHERE $suplente=id_profesor ";
              $resultado=mysql_query($query,$link);
              while ($cambio=mysql_fetch_array($resultado))
              echo "<td>".$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"]."</td>\n";

              $modalidad=$row["modalidad_proyecto"];
              $query= "SELECT id_modalidad_proyecto, modalidad_proyecto where modalidad_proyecto where $modalidad=id_modalidad_proyecto";
              $resultado=mysql_query($query,$link);
              while ($cambio=mysql_fetch_array($resultado))
              echo "<td>".$cambio["modalidad_proyecto"]."</td>\n";

              echo "<td>".$row["equipo_proyecto"]."</td>\n";
               

        
            }while ($row = mysql_fetch_array($result));
                echo "</table>";

                 echo"<div id='botton'><a href='../proyecto/modificarproyecto.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Modificar Datos </a></div>";
            
        
            } else {
                echo "Agrege la información del verano de " .$nombre." ".$apellidop." ".$apellidom; 
              echo"<div id='botton'><a href='../proyecto/proyecto.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Agregar Datos </a></div>";
            }

?>

  </section>

</body>
<?php
    include("../footer.php");
?>

</html>