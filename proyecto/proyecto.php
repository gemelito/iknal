<?php
		include("../config/conexion.php");
		mysql_query("SET NAMES 'utf8'");
		include("../autentificacion.php");
	?>

<!DOCTYPE html>
<html lang"es">
<head>
	<link rel="shortcut icon" href="images/favicon.ico">
     <link rel="stylesheet" type="text/css" href="../css/normalize.css">
     <link rel="stylesheet" type="text/css" href="../css/estilo.css">
     <meta charset="utf-8" />
		<title>Verano</title>
</head>
<body>
	<?php
		include('../headers.php');
	?>

	<section>
		<form action="agregarproyecto.php" method="POST" enctype="multipart/form-data"> 
		<h1>intoduzca los datos correspondientes</h1>
		
		<table> 
		<?php
			$matricula=$_GET['matricula'];	
			echo '<input type="hidden" name="matricula" readonly="readonly" value='.$matricula.'>'; 
		?> 

			<tr>
				<td>Verano</td>
				<td><select name="verano">
				<option Value="0"></option>
				<option Value="1">I</option>
				<option Value="2">II</option>
				<option Value="3">III</option>
				<option Value="4">IV</option>
			</tr> 
			<tr>
				<td>Localidad</td>
				<td><select name="lugar">
				<option value="0"></option>
				<?php
				$query=" SELECT id_localidad, localidad, estado_localidad from localidad";
			$resultado=mysql_query($query,$link);
			while ($lista=mysql_fetch_array($resultado))
			echo "<option value='".$lista["id_localidad"]."'>".$lista["localidad"].",".$lista["estado_localidad"]."</option>";
			?>
			</select></td>  
			</tr>
			<tr>
				<td>Titulo del proyecto </td>
				<td><input type="text" name="titulo"  size="20"></td>
			</tr>
			<tr>
				<td>Area de desarrollo</td>
				<td><select name="area">
				<option Value="académica">Académica</option>
				<option Value="público">Sector público</option>
				<option Value="privado">Iniciativa privada</option>
				<option Value="organización">Organización de Sociedad Civil</option>
				</select></td>
			</tr>
			<tr>
				<td>Tipo de proyecto </td>
				<td><select name="tipo">
				<option Value="desarrollo">Proyecto de Desarrollo Comunitario</option>
				<option Value="investigacion">Proyecto de investigación</option>
				<option Value="inversion">Proyecto de inversión</option>
				</select></td>
			</tr>
			<tr>
				<td>Estado del proyecto</td>
				<td><select name="estadodelproyecto">
				<option value="0"></option>
				<?php
				$query=" SELECT id_estado_proyecto, estado_proyecto from estado_proyecto";
				$resultado=mysql_query($query,$link);
				while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["id_estado_proyecto"]."'>".$lista["estado_proyecto"]."</option>";
				?>
				</select></td>
			</tr>
			<tr>
				<td>Director del proyecto<td>
				 <select name="directordelproyecto">
				 <?php
			    $query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor order by nombre_profesor asc ";
                $resultado=mysql_query($query,$link);
                while ($lista=mysql_fetch_array($resultado))
                echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidom_profesor"]." ".$lista["apellidom_profesor"]."</option>";
            	?>
				</select>
			</tr>
			<tr>
				<td>Lector 1 <td>
				 <select name="asesor1">
				 <?php
			    $query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor order by nombre_profesor asc ";
                $resultado=mysql_query($query,$link);
                while ($lista=mysql_fetch_array($resultado))
                echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidom_profesor"]." ".$lista["apellidom_profesor"]."</option>";
            	?>
				</select>
			</tr>
			<tr>
				<td>Lector 2<td>
				 <select name="asesor2">
				 <?php
			    $query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor order by nombre_profesor asc ";
                $resultado=mysql_query($query,$link);
                while ($lista=mysql_fetch_array($resultado))
                echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidom_profesor"]." ".$lista["apellidom_profesor"]."</option>";
            	?>
				</select>
			</tr>
			<tr>
				<td> Suplente del proyecto</td>
				<td><select name="suplente">
				 <?php
			    $query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor order by nombre_profesor asc ";
                $resultado=mysql_query($query,$link);
                while ($lista=mysql_fetch_array($resultado))
                echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidom_profesor"]." ".$lista["apellidom_profesor"]."</option>";
            	?>
				</select>
			</tr>
			<tr>
				<td>Modalidad del proyecto</td>
				<td><select name="modalidadproyecto">
				<option value="0"></option>
				<?php
				$query=" SELECT id_modalidad_proyecto, modalidad_proyecto from modalidad_proyecto";
				$resultado=mysql_query($query,$link);
				while ($lista=mysql_fetch_array($resultado))
					echo "<option value='".$lista["id_modalidad_proyecto"]."'>".$lista["modalidad_proyecto"]."</option>";
				?>
				</select></td>
			</tr> 
			<tr>
				<td>Equipo proyecto</td>				
				<td><input type="text" name="equipoproyecto"  required="required" size="21"></td>
			</tr>
			</table>
			<br>
			<input class="ri1" align="center" TYPE=SUBMIT VALUE="ENVIAR" href="">  
			<input  class="ri1" align="center" TYPE=RESET VALUE="BORAR DATOS">
			</form>
			</section>



</body>
	<?php
		include('../footer.php');
	?>
</html>


	
