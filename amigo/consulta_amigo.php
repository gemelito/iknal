<?php
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
include("../autentificacion.php");

$matricula=$_GET['matricula'];
$id_prof=$_GET['id_prof'];
$nombre=$_GET['nombre'];
$apellidop=$_GET['apellidop'];
$apellidom=$_GET['apellidom'];
?>
<!DOCTYPE HTML>
<html  lang="es">
	<head>
		<link rel="shortcut icon" href="../images/favicon.ico">
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
				<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    		<meta charset="utf-8" />
		<title>Amigo</title>
</head>
<body>
	<?php
		include ('../headers.php');
	?>
<article></article>
	<section>
	<h1 align="center">Amigo Tutor de <?php echo $nombre; ?></h1><br>
	<div id="amigoss">
		<?php	
		$result2 = mysql_query("SELECT * FROM amigo where matricula_amigo=$matricula", $link);
		if ($row = mysql_fetch_array($result2)){
			if ($row["nombre_amigo"]=="") {
				echo "Matricula del Amigo: ";
				$matricula_amigo=$row["tutor_amigo"];
                $query = "SELECT id_alumno, matricula_alumno FROM alumno WHERE $matricula_amigo = id_alumno";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<b>".$cambio["matricula_alumno"].'<br>'.'</b>';

            	echo "Amigo: ";
				$amigo=$row["tutor_amigo"];
                $query = "SELECT id_alumno, nombre_alumno ,apellidop_alumno, apellidom_alumno,direccion_alumno,telefono_alumno FROM alumno WHERE $amigo = id_alumno";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado)){
             	echo "<b>".$cambio["nombre_alumno"].' '.$cambio["apellidop_alumno"].' '.$cambio["apellidom_alumno"].'<br>'.'</b>';
				$direccion_amigo=$cambio["direccion_alumno"];
             	$telefono_amigo=$cambio["telefono_alumno"];
             }
				echo "Dirección: "; echo "<b> $direccion_amigo<br></b>";
				echo "Teléfono: "; echo "<b>$telefono_amigo<br>"."</b>";
				echo "Años de amistad: "; echo "<b>".$row["amistadanios"]."<br></b>";
				echo "Opinión: "; echo "<b>".$row["opinion"]."<br><br></b>";
				echo "<div id='tablaboton'>";
				echo "<a   id='botonotro'href='modificar_amigo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Modificar</a>";
				echo "<a id='botonregresar' href='../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>";
				echo "</div>";
			}else{
				echo "Nombre: "; echo "<b>".$row["nombre_amigo"]." ".$row["apellidop_amigo"]." ".$row["apellidom_amigo"]."<br></b>";
				echo "Dirección: "; echo "<b>".$row["direccion"]."<br></b>";
				echo "Teléfono: "; echo "<b>".$row["telefono"]."<br>"."</b>";
				echo "Años de amistad: "; echo "<b>".$row["amistadanios"]."<br></b>";
				echo "Opinión: "; echo "<b>".$row["opinion"]."<br><br></b>";
				echo "<div id='tablaboton'>";
				echo "<a   id='botonotro' href='modificar_amigo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Modificar </a>";
				echo '<a id="botonregresar" href="../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom">Regresar</a>';

			}
				
			} else {

				echo "Aún no hay datos; Agregue información sobre el amigo del Tutorado."."<br></b><br></b>";
				echo "<div id='tablaboton'>";
				echo"<a id='botonotro' href='formularioamigo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >Agregar amigo </a>";
				echo "<a id='botonregresar' href='../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>";
				echo "</div>";
			}
		?>
	</div>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>