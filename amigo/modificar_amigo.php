<?php
mysql_query("SET NAMES 'utf8'");
include("../autentificacion.php");
$matricula= $_GET['matricula'];
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
	<form action="modificar.php" method="POST" enctype="multipart/form-data"> 
		
	<h1 align="center">Información del Amigo</h1><br>
	<div id="datoamigom">
	<?php
	include("../config/conexion.php");
 	mysql_query("SET NAMES 'utf8'");

	$matricula= $_GET['matricula'];
	$id_prof=$_GET['id_prof'];
	$nombre=$_GET['nombre'];
	$apellidop=$_GET['apellidop'];
	$apellidom=$_GET['apellidom'];
					
	$result2 = mysql_query("SELECT * FROM amigo  WHERE matricula_amigo='$matricula'", $link);
	if ($row = mysql_fetch_array($result2)){;
	

	do {
			echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>'; 
			echo '<input type="hidden" name="nombre" readonly="readonly" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop" readonly="readonly" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom" readonly="readonly" value='.$apellidom.'>';
			
			echo '<input type="hidden" name="matricula" value='.$row["matricula_amigo"].'>'.'<br>';

			if ($row["nombre_amigo"]=="") {
				echo ' Amigo <select name="amigo">';
			         $amigo_tutor=$row["tutor_amigo"];
                $query = "SELECT Id_alumno, nombre_alumno, apellidop_alumno, apellidom_alumno,direccion_alumno,telefono_alumno FROM alumno WHERE $amigo_tutor = Id_alumno";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado)){
                	$nombre_amigo=$cambio["nombre_alumno"].' '.$cambio['apellidop_alumno'].' '.$cambio["apellidom_alumno"];
                    echo "<option value='".$amigo_tutor."'>" .$nombre_amigo."</option>";
					$direccion_amigo=$cambio["direccion_alumno"];
             		$telefono_amigo=$cambio["telefono_alumno"];
						}
						$query="SELECT Id_alumno, nombre_alumno, apellidop_alumno, apellidom_alumno from alumno";
						$resultado=mysql_query($query,$link);
						while ($lista=mysql_fetch_array($resultado))
							echo "<option value='".$lista["Id_alumno"]."'>".$lista["nombre_alumno"].' '.$lista["apellidop_alumno"].' '.$lista["apellidom_alumno"]."</option>";
						echo "</select>".'<br>';
			echo "Dirección: <input type='text' name='direccion' size='35' value='".$direccion_amigo."'><br>";
			echo "Teléfono: <input type='text' name='telefono' size='15' value=".$telefono_amigo."><br>";
			echo "Años de Amistad: <input type='text' name='amistad' size='9' value=".$row['amistadanios']."><br>";
			echo "Opinión sobre el tutorado <br><textarea name='opinion' rows='5' cols='40'>".$row["opinion"]."</textarea>";

			}else{
			echo "Nombre: <input type='text' name='nombre_amigo' size='9' value=".$row['nombre_amigo']."><input type='text' name='apellidop_amigo' size='9' value=".$row['apellidop_amigo']."><input type='text' name='apellidom_amigo' size='9' value=".$row['apellidom_amigo']."><br>";
			echo "Dirección: <input type='text' name='direccion' size='35' value='".$row['direccion']."''><br>";
			echo "Teléfono: <input type='text' name='telefono' size='15' value=".$row['telefono']."><br>";
			echo "Años de Amistad: <input type='text' name='amistad' size='9' value=".$row['amistadanios']."><br>";
			echo "Opinión sobre el tutorado <br><textarea name='opinion' rows='5' cols='40'>".$row["opinion"]."</textarea>";

			}
			
			} while ($row = mysql_fetch_array($result2));
			
			} else {
						echo "¡ La base de datos está vacía !";
					}		
				
				echo"<br>";
				echo "<div id='tablaboton'>";
				echo"<input id='botonotro' name='grabar' type='submit' value='Actualizar' style='font-weight: bold'>";
				echo "<a href='consulta_amigo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'><input id='botonregresar' type='button' value='Regresar'></a>";
			    echo "</div>";
	?>
	</div>
	</form>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>
