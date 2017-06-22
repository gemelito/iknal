<html lang="es">
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
		<title>Apoyo</title>
	</head>
<body>
	<?php
		include ('../headers.php');
	?>
<article></article>
	<section>
		<h1 align="center">Apoyo recibido para <?php echo $nombre;?></h1><br>
		<div id="amigoss">
			<?php	

			mysql_query("SET NAMES 'utf8'");		
			$result2 = mysql_query("SELECT * FROM apoyo where matricula_apoyo=$matricula", $link);
			if ($row = mysql_fetch_array($result2)){

				do{
			echo "<br>";
			$id_apoyo=$row["Id_apoyo"];
			echo "Institución: "; echo "<b>".$row["institucion"]."<br></b>";
			echo "Tipo de Apoyo: "; echo "<b>".$row["tipodeapoyo"]."<br></b>";
			echo "Ultima apoyo: "; echo "<b>".$row["ultimavez"]."<br></b>";
			echo "Observaciones: "; echo "<b>".$row["observaciones"]."<br></b>";
			echo "<div id='tablaboton'>";
			echo "<a id='botonotrom' href='apoyomodificar.php?id_apoyo=$id_apoyo&matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Modificar</a>";
			echo "</div>";
				}while($row = mysql_fetch_array($result2));
			echo "<div id='tablaboton'>";
			echo "<a id='botonregresar' href='../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>";
			echo "<a id='botonotro' href='formularioapoyo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Otro Apoyo</a>";
			echo "</div>";
			} else {
			echo "Aún no se ha agregado ningún dato, agregue el tipo de apoyo que tuviese el tutorado.";
			echo "<div id='tablaboton'>";
			echo"<a id='botonotro' href='formularioapoyo.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Apoyo </a>";
			echo "<a id='botonregresar' href='javascript:history.back()'>Regresar</a>";
			echo "</div>";
			}
		?>
		<br><br><br><br>
		</div>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>