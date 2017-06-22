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
	<h4>Solo podrá visualizar las ultimas 5 sesiones que ha tenido con su tutorado. </h4>
	<?php	
		$result2 = mysql_query("SELECT * FROM tutorias where matricula=$matricula order by id_tutoria DESC LIMIT 5 ", $link);
		if ($row = mysql_fetch_array($result2)) {
			$cont=$row["contador"];
			echo "<table align='center'>";
			echo "<tr>";
			echo "<b><td width='0.08%'><p>Fecha</p></td></b> \n";
			echo "<td width='0.08%></td> \n";
			echo "<b><td width='0.08%'><p>Motivo</p></td></b> \n";
			echo "<td></td>\n";

			echo"</tr>";

			
			do{

			$id_tutoria=$row["id_tutoria"];

			echo "<form action='modificar_tutoria.php' method='POST'>";
			echo '<input type="hidden" name="nombre_alumno" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop_alumno" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom_alumno" value='.$apellidom.'>';	
			echo '<input type="hidden" name="matricula" value='.$matricula.'>'; 		
			echo '<input type="hidden" name="id_prof" value='.$id_prof.'>'; 
			echo '<input type="hidden" name="id_tutoria" value='.$id_tutoria.'>'; 
			echo"<tr>";
			echo "<td>".$row["fecha_tutoria"]."<br></td> \n";
			echo "<td>       </td> \n";
			echo "<td><b><textarea name='asunto' cols='30' rows='5' >".$row["asunto"]."</textarea></b></td>";
			
			

			echo'<td><input TYPE=SUBMIT VALUE="Modificar" title="sobreescriba los datos del cuadro de texto y luego de clic en este boton"></td></tr>';
			echo"</form>";

			}while($row = mysql_fetch_array($result2));
			echo"</table>";
			
			echo "Total de sesiones: "; echo "<b>".$cont."<br></b>";
			echo "<a id='botonmodificar' href='registro_tutorias.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Agregar Sesión</a><br>";
			echo "<a id='botonmodificar' href='total_sesiones.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' title='De clic para ver todas las sesiones de tutorias que ha tenido el alumno'>Todas las Sesiones</a><br>";
			echo "<a  id='botonmodificar' href='javascript:history.back()'>Regresar</a>";	

		}else{
		echo "Aún no hay datos; Agregue información la Tutoria realizada.<br></b><br></b>";
		echo "<div id='tablaboton'>";
		echo"<a href='registro_tutorias.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' id='botonotro'>Agregar </a>";
		echo "<a  id='botonregresar' href='javascript:history.back()'>Regresar</a>";	
		echo "</ div>";
		}
			
	
				

	?>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>