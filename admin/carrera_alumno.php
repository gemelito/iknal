<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Asignación de Tutores</title>
  <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="stylesheet" type="text/css" href="../css/estilo.css">
 <link rel="stylesheet" type="text/css" href="../css/tabla.css">  
</head>
<body>
<?php
        include ('headeradmin.php'); //Header hecho solo para ROOT
?>

<section>
<div id="table">
  <?php
    include("autentificacion.php");
    include("../config/conexion.php");
    mysql_query("SET NAMES 'utf8'");
    echo "<class='table'>";
    echo"<h1>Asignacion de Tutores</h1>";
    $Id_carrera=$_GET['Id_carrera'];

    $query1 = mysql_query("SELECT * FROM alumno where carrera_alumno='$Id_carrera' order by nombre_alumno asc ",$link); 
    if ($row = mysql_fetch_array($query1)){
      echo "<table border='0' align='center'>\n";
      echo "<tr> \n";
      echo "<b><td width='10%'>Nombre</td></b> \n";
      echo "<b><td width='10%'>Semestre</td></b> \n";
      echo "<b><td width='5%'>Estado</td></b> \n";
      echo "<b><td width='10%'>Tutor</td></b> \n";
      echo "</tr> \n";
    do {
      echo "<tr> \n";
      $id_alumno=$row['id_alumno'];
      echo "<td id='fondo'>".$row["nombre_alumno"]." ".$row["apellidop_alumno"]." ".$row["apellidom_alumno"]."</td>\n";

      $semestre=$row["semestre_alumno"];
      $query = "SELECT Id_semestre, semestres FROM semestre WHERE $semestre = Id_semestre";
      $resultado=mysql_query($query,$link);
    while ($cambio=mysql_fetch_array($resultado))
      echo "<td id='fondo'>".$cambio["semestres"]."</td>\n";

      echo "<td id='fondo'>";
      if ($row["activo"]==1) {
         echo "Activo";
      }else{
         echo "De Baja";
      }
      echo "</td>";

      echo'<td id="fondo"><form action="actualizar_alumno.php" method="POST" enctype="multipart/form-data">';
      echo '<input type="hidden" name="id_alumno" readonly="readonly" value='.$id_alumno.'>'; 
      echo '<input type="hidden" name="id_carrera" readonly="readonly" value='.$Id_carrera.'>';
      echo ' <select id="fondo" name="tutor">';
        $prof=$row["id_tutor"];
        $query = "SELECT id_profesor, nombre_profesor,apellidop_profesor,apellidom_profesor FROM profesor  WHERE $prof = id_profesor";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $profesor=$cambio["nombre_profesor"]." ".$cambio['apellidop_profesor']." ".$cambio['apellidom_profesor'];
      echo "<option value='".$prof."'>".$profesor."</option>";

        $query = "SELECT id_profesor, nombre_profesor,apellidop_profesor, apellidom_profesor FROM profesor order by nombre_profesor asc";
        $resultado=mysql_query($query,$link);
        while ($lista=mysql_fetch_array($resultado))
      echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
      echo "</select>";
   
      echo "<input TYPE=SUBMIT VALUE='Guardar'></td>";
      echo "</form></tr>";

    } while ($row=mysql_fetch_array($query1));
      
        echo "</table> \n <br><br>";                 
    } else {
        echo "¡ La base de datos está vacia !";}

  ?> 
  </div>

</section>
</body>
</html>