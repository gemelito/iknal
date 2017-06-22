<?php
	include("../config/conexion.php");
	mysql_query("SET NAMES 'utf8'"); 
	require_once("../classes/Login.php");
	include("../autentificacion.php");
	?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<link rel="shortcut icon" href="../images/favicon.ico">
				<link rel="stylesheet" type="text/css" href="../css/normalize.css">
					<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    			<meta charset="utf-8" />
			<title>Datos de la Familia</title>
		</head>
	<body>
	<?php
		include ('../headers.php');
	?>
	<article></article>
	<section>
		
			<h1 align="center">Información de la Familia</h1><br>
			<div id="amigoss">
			<?php	
			$matricula=$_GET['matricula'];
			$id_prof=$_GET['id_prof'];
			$nombre=$_GET['nombre'];
			$apellidop=$_GET['apellidop'];
			$apellidom=$_GET['apellidom'];
			
			$result2 = mysql_query("SELECT * FROM familia where matricula_familia=$matricula", $link);
			if ($row = mysql_fetch_array($result2)){
				if ($row["nombreh"]=="") {
					echo "===Información del Padre===<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientop"]."<br></b>";
					echo "Nombre: "; echo "<b>".$row["nombrep"]." ";
					echo $row["apellidop"]." ";
					echo $row["apellidom"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correop"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonop"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesion"]."<br></b><br>";
					echo"===Información Madre==="."<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientom"]."<br></b>";
					echo "Nombre:"; echo "<b>".$row["nombrem"]." ";
					echo $row["apellidopp"]." ";
					echo $row["apellidopm"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correom"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonom"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesionm"]."<br></b><br>";
					echo "<div id='tablaboton'>";
					echo "<a id='botonotro' href='familia_modificar.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Modificar</a>";
					echo "<a id='botoncancelar' href='../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>";
					echo "</div>";
				}elseif ($row["nombrehh"]=="") {
					echo "===Información del Padre===<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientop"]."<br></b>";
					echo "Nombre: "; echo "<b>".$row["nombrep"]." ";
					echo $row["apellidop"]." ";
					echo $row["apellidom"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correop"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonop"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesion"]."<br></b><br>";
					echo"===Información Madre==="."<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientom"]."<br></b>";
					echo "Nombre:"; echo "<b>".$row["nombrem"]." ";
					echo $row["apellidopp"]." ";
					echo $row["apellidopm"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correom"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonom"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesionm"]."<br></b><br>";
					echo "===Información del Hermano==="."<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientoh"]."<br></b>";
					echo "Nombre:"; echo "<b>".$row["nombreh"]." ";
					echo $row["apellidoph"]." ";
					echo $row["apellidomh"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correoh"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonoh"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesionh"]." "."</b>";
					echo "<div id='tablaboton'>";
					echo "<a id='botonotro' href='familia_modificar.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >Modificar</a>";
					echo "<a id='botoncancelar' href='../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>"."<br><br><br>";
					echo "</div>";
				}else{
					echo "===Información del Padre===<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientop"]."<br></b>";
					echo "Nombre: "; echo "<b>".$row["nombrep"]." ";
					echo $row["apellidop"]." ";
					echo $row["apellidom"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correop"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonop"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesion"]."<br></b><br>";
					echo"===Información Madre==="."<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientom"]."<br></b>";
					echo "Nombre:"; echo "<b>".$row["nombrem"]." ";
					echo $row["apellidopp"]." ";
					echo $row["apellidopm"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correom"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonom"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesionm"]."<br></b><br>";
					echo "===Información Hermanos==="."<br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientoh"]."<br></b>";
					echo "Nombre:"; echo "<b>".$row["nombreh"]." ";
					echo $row["apellidoph"]." ";
					echo $row["apellidomh"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correoh"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonoh"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesionh"]." "."</b><br><br>";
					echo "Fecha de Nacimiento:"; echo "<b>".$row["nacimientohh"]."<br></b>";
					echo "Nombre:"; echo "<b>".$row["nombrehh"]." ";
					echo $row["apellidophh"]." ";
					echo $row["apellidomhh"]."<br></b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correohh"]."<br></b>";
					echo "Teléfono:"; echo "<b>".$row["telefonohh"]."<br></b>";
					echo "Profesión:"; echo "<b>".$row["profesionhh"]." "."</b>";
					echo "<div id='tablaboton'>";
					echo "<a id='botonotro' href='familia_modificar.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' >Modificar</a>";
					echo "<a id='botoncancelar' href=''../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>"."<br><br><br>";
					echo "</div>";
	

			}
				
				
			} else {
				echo "Aún no se ha agregado ningún dato, agregue a su familia.";
				echo "<div id='tablaboton'>";
				echo"<br><br><a id='botonotro' href='familia.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Agregar Familia </a>";
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