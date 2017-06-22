
<?php
	include("config/conexion.php");
	include("autentificacion.php");
	mysql_query("SET NAMES 'utf8'"); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Actualización de la información</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8" />
</head>
<body>	
	<?php
		include ('header.php');
	?>
<article></article>
<section>	
	
	<form name="modificarproyecto" action="proyectomodif.php" method="POST" enctype="multipart/form-data">
<div id="amigoss">
<?php
		$matricula=$_GET['matricula'];
		$id_prof=$_GET['id_prof'];
		$nombre=$_GET['nombre'];
		$apellidop=$_GET['apellidop'];
		$apellidom=$_GET['apellidom'];	

		echo "<h1><a class='centro'><b>$nombre $apellidop $apellidom </b></a></h1>";

		$result2 = mysql_query("SELECT * FROM proyecto  WHERE '$matricula'=matricula", $link);
	if ($row = mysql_fetch_array($result2)){

	echo "<br><br>";
			echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>'; 
			echo '<input type="hidden" name="nombre" readonly="readonly" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop" readonly="readonly" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom" readonly="readonly" value='.$apellidom.'>';
			echo '<input  type="hidden" readonly="readonly"  name="matricula" size="9" value='.$row["matricula"].'>'.'<br>';
	echo ' Verano <select name="verano"><option value='.$row["verano_proyecto"].'>'.$row["verano_proyecto"].'<option Value="I">I</option>
				<option Value="II">II</option>
				<option Value="III">III</option>
				<option Value="IV">IV</option></select> <br>';

	echo ' Lugar  <select name="lugar">';
			$lugar=$row["lugar_proyecto"];
		$query = "SELECT id_localidad, localidad,municipio_localidad,estado_localidad FROM localidad WHERE $lugar = id_localidad";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $lugarverano=$cambio["localidad"].",".$cambio["estado_localidad"];
        echo "<option value='".$lugar."'>".$lugarverano."</option>";
		$query="SELECT id_localidad, localidad,estado_localidad from localidad";
		$resultado=mysql_query($query,$link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_localidad"]."'>".$lista["localidad"].",".$lista["estado_localidad"]."</option>";
		echo "</select>".'<br>';

		echo ' Titulo del Proyecto <input  type="text"   name="proyecto" size="40" value="'.$row["titulo_proyecto"].'">'.'<br>';
		echo ' Area de Desarrollo <select name="area"> <option value="'.$row["areadesarrollo_proyecto"].'">'.$row["areadesarrollo_proyecto"].'</option><option Value="Académica">Académica</option>
				<option Value="Sector Público">Sector público</option>
				<option Value="Iniciativa Privada">Iniciativa privada</option>
				<option Value="Organización de Sociedad Civil">Organización de Sociedad Civil</option>
				</select><br>';

				
		echo ' Tipo de proyecto <select name="tipoproyecto"> <option value="'.$row["tipo_proyecto"].'">'.$row["tipo_proyecto"].'</option><option Value="Proyecto de Desarrollo">Proyecto de Desarrollo</option>
				<option Value="Proyecto de investigación">Proyecto de investigación</option>
				<option Value="Proyecto de inversión">Proyecto de inversión</option>
				</select><br>';

		echo 'Estado del Proyecto <select name="estado">';
					$estadoproyecto=$row['estado_proyecto'];
		$query="SELECT id_estado_proyecto, estado_proyecto from estado_proyecto where $estadoproyecto= id_estado_proyecto";
		$resultado=mysql_query($query, $link);
		while ($cambio=mysql_fetch_array($resultado))
			$estado=$cambio["estado_proyecto"];
		echo "<option value='".$estadoproyecto."'>".$estado."</opcion>";
		$query="SELECT id_estado_proyecto, estado_proyecto from estado_proyecto";
		$resultado=mysql_query($query, $link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_estado_proyecto"]."'>".$lista["estado_proyecto"]."</option>";
		echo "</select>".'<br>';

		echo 'Director del Proyecto <select name="director">';
			    $director=$row["director_proyecto"];
		$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $director = id_profesor";
        $resultado=mysql_query($query,$link);
      	while ($cambio=mysql_fetch_array($resultado))
        $director_proyecto=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       	echo "<option value='".$director."'>".$director_proyecto."</option>";
		$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		
		$resultado=mysql_query($query,$link);		
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
		echo "</select>".'<br>';

		echo 'Asesor  <select name="asesor1">';
			    $asesor1 =$row["director_proyecto"];
		$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $asesor1 = id_profesor";
        $resultado=mysql_query($query,$link);
      	while ($cambio=mysql_fetch_array($resultado))
        $asesor1_proyecto=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       	echo "<option value='".$asesor1."'>".$asesor1_proyecto."</option>";
		$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		
		$resultado=mysql_query($query,$link);		
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
		echo "</select>".'<br>';

		echo 'Asesor 2 <select name="asesor2">';
			    $asesor2 =$row["director_proyecto"];
		$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $asesor2 = id_profesor";
        $resultado=mysql_query($query,$link);
      	while ($cambio=mysql_fetch_array($resultado))
        $asesor2_proyecto=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       	echo "<option value='".$asesor2."'>".$asesor2_proyecto."</option>";
		$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		
		$resultado=mysql_query($query,$link);		
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
		echo "</select>".'<br>';


		echo 'Suplente <select name="suplente">';
			    $suplente =$row["suplente_proyecto"];
		$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $suplente = id_profesor";
        $resultado=mysql_query($query,$link);
      	while ($cambio=mysql_fetch_array($resultado))
        $suplente_proyecto=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       	echo "<option value='".$suplente."'>".$suplente_proyecto."</option>";
		$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		
		$resultado=mysql_query($query,$link);		
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
		echo "</select>".'<br>';


		echo 'Modalidad del Proyecto <select name="modalidad">';
			$modalidadproyecto=$row['modalidad_proyecto'];
		$query="SELECT id_modalidad_proyecto, modalidad_proyecto from modalidad_proyecto where $modalidadproyecto= id_modalidad_proyecto";
		$resultado=mysql_query($query, $link);
		while ($cambio=mysql_fetch_array($resultado))
			$modalidad_proyecto=$cambio["modalidad_proyecto"];
		echo "<option value='".$modalidadproyecto."'>".$modalidad_proyecto."</opcion>";
		$query="SELECT * from modalidad_proyecto";
		$resultado=mysql_query($query, $link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_modalidad_proyecto"]."'>".$lista["modalidad_proyecto"]."</option>";
		echo "</select>".'<br>';

		echo ' Equipo  proyecto <input  type="text"   name="equipo" size="60" value="'.$row["equipo_proyecto"].'">'.'<br>';

		} else {
	echo "¡ La base de datos está vacia !";
	}
		
	
		echo"<br>";
		echo "<div id='tablaboton'>";
		echo'<input id="botonotro" name="grabar" type="submit" value="Actualizar" style="font-weight: bold">';
		echo "<a href='proyectomostrar.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'><input id='botonregresar' type='button' value='Cancelar'></a>";
		echo "</div>";
		?>
	</form>
</div>
<!-- MOSTRAR Y MODIFICAR IMAGEN DE ALUMNO -->
<figure>
					<form name="actualizar" action="cambiarfoto.php?matricula=<?php echo $matricula; ?>" method="POST" enctype="multipart/form-data">
						
						<?php
					$query = "SELECT matricula_alumno, foto FROM alumno WHERE matricula_alumno = $matricula";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado)){
	                	if ($lista['foto'] == 0){
	                		echo "<img src='images/alumno/".$lista['foto'].".png' width='260' height='260'><br>";
	                	}else{
	                		echo "<img src='images/alumno/".$lista['foto']."' width='260' height='260'><br>";	                		
	                	}
	                }
	            ?>
						
	<input name="subirfoto" type="file">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000"></td><br />
						<input	type="submit" value="Cambiar"/><br />
						

					</form>
			</figure>

</section>

</body>
<?php
	include ('footer.php');
?>
</html>













		