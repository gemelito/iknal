
<?PHP
mysql_query("SET NAMES 'utf8'");
include("../config/conexion.php");
include("../autentificacion.php");
				$matricula=$_GET['matricula'];
				$id_prof=$_GET['id_prof'];	
				$nombre=$_GET['nombre'];
				$apellidop=$_GET['apellidop'];
				$apellidom=$_GET['apellidom'];	
?>
<!DOCTYPE html>
<html>
<head>

	<title>Foda</title>
		<link rel="stylesheet" type="text/css" href="../css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<meta charset="utf-8" />
</head>
<body>
	<?php
		include('../headers.php');
	?>
		<section>
			<form action="actualizarfoda.php" method="POST" enctype="multipart/form-data"> 

			<h1 align="center"> F. O. D. A.</h1>	
			
			<?php				
				echo '<input type="hidden" name="nombre" readonly="readonly" value='.$nombre.'>';
				echo '<input type="hidden" name="apellidop" readonly="readonly" value='.$apellidop.'>';
				echo '<input type="hidden" name="apellidom" readonly="readonly" value='.$apellidom.'>';			
				echo '<input type="hidden" name="id_prof" readonly="readonly" value='.$id_prof.'>';  
				echo '<input type="hidden" name="matricula" readonly="readonly" value='.$matricula.'>'; 	
			
			mysql_query("SET NAMES 'utf8'");    
        		$query = mysql_query("SELECT * FROM foda where matricula_foda=$matricula",$link);  
        		if ($row = mysql_fetch_array($query)){




	echo "<table align='center' border='2'>";
	echo "<tr>";
	echo "<th> Fortalezas </th>";
	echo "<th> Oportunidades </th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><textarea name='fortalezas' rows='10' cols='50'>".$row['fortalezas']."</textarea></td>";
	echo "<td><textarea name='oportunidades' rows='10' cols='50'>".$row['oportunidades']."</textarea></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th> Debilidades </th>";
	echo "<th> Amenazas </th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><textarea name='debilidades' rows='10' cols='50'>".$row['debilidades']."</textarea></td>";
	echo "<td><textarea name='amenazas' rows='10' cols='50'>".$row['amenazas']."</textarea></td>";
	echo "</tr>";

	echo "</table>";
		
	
		

}else{

	echo "no hay datos";
}

			echo "<div id='tablaboton'>";
			echo "<input id='botonfoda' name='grabar' type='submit' value='Actualizar' style='font-weight: bold'>";
			echo "<a  href='consultagral.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom' style='text-decoration: none;'><input id='botonregresar' type='button' value='Regresar'></a>";
			 echo"</form>";
			 echo "</div>";
			?>
		</section>
</body>
	<footer>
		<?php
		include("../footer.php");
		?>
	</footer>
</html>

