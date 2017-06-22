<?php
 //corregir problemas de idioma
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'");
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
		<title>Tutoria</title>
</head>
<body>
	<?php
		include ('../headers.php');
	?>
<article></article>
	<section>
	<?php	
		$result2 = mysql_query("SELECT * FROM tutorias where matricula=$matricula order by id_tutoria DESC", $link);
		if ($row = mysql_fetch_array($result2)) {
			$cont=$row["contador"];
			echo "<table align='center'>";
			echo "<tr>";
			echo "<b><td width='0.08%'><p>Fecha</p></td></b> \n";
			echo "<b><td width='0.08%'><p>Motivo</p></td></b> \n";

			echo"</tr>";

			
			do{
	
			echo"<tr>";
			echo "<td>".$row["fecha_tutoria"]."<br></td> \n";
			echo "<td><b><textarea cols='30' rows='5' >".$row["asunto"]."</textarea></b></td>";
			
			$id_tutoria=$row["id_tutoria"];			
			
			
			}while($row = mysql_fetch_array($result2));
			echo"</table>";
			
			echo "Total de sesiones: "; echo "<b>".$cont."<br></b>";
			echo "<a  id='botonmodificar' href='javascript:history.back()'>Regresar</a>";	

		}else{
		echo "Aún no hay datos; Agregue información la Tutoria realizada.<br></b><br></b>";
		echo"<a href='registro_tutorias.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' id='botonagregar'>Agregar </a>";
		}
			
	
				

	?>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>