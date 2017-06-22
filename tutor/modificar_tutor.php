	<?php
	include("../config/conexion.php");
	mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
	include("../autentificacion.php");
	?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<link rel="shortcut icon" href="../images/favicon.ico">
				<link rel="stylesheet" type="text/css" href="../css/normalize.css">
					<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    			<meta charset="utf-8" />
			<title>Sistema Iknal</title>

			 	<!--[if lt IE 9]>
				<script type="text/javascript">
				   document.createElement("nav");
				   document.createElement("header");
				   document.createElement("footer");
				   document.createElement("section");
				   document.createElement("article");
				   document.createElement("aside");
				   document.createElement("hgroup");
				</script>
				<![endif]-->
		</head>
	<body>
	<?php
		include ('../headers.php');
	?>
	<article></article>
	<section>
			<form name="modificar" action="modificar.php?id_prof=$id_prof" method="POST" enctype="multipart/form-data">
				<h1 align="center">Información del Tutor</h1>	
				<div id="datostutor">
		<?php		
			header('Content-Type:text/html; charset=utf-8');
			
			$id_prof=$_GET['id_prof'];						
			$result2 = mysql_query("SELECT * FROM profesor where id_profesor='$id_prof'" , $link);
			if ($row = mysql_fetch_array($result2)){
				
			
			echo '<input type="hidden" name="id_prof" value='.$id_prof.'>';
			echo 'Nombre<input type="text" name="nombre" value="'.$row["nombre_profesor"].'">';
			echo '<input type="text"  size="10" name="apellidop" value='.$row["apellidop_profesor"].'>'; 
			echo '<input type="text"  size="10" name="apellidom" value='.$row["apellidom_profesor"].'><br>';
			echo 'Dirección<input type="text" name="direccion" value="'.$row["domicilio_profesor"].'"><br/>';
			echo 'Fecha de Nacimiento<input type="date"  name="fecha" placeholder="AAAA-MM-DD" value='.$row["fechanac_profesor"].'><br>'; 
		
			echo ' Grado <select name="grado">';
				$grado=$row["grado_profesor"];
				$query = "SELECT id_gradoacademico, grado_academico FROM gradoacademico WHERE $grado = id_gradoacademico";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                $gradoprofesor=$cambio["grado_academico"];
				echo "<option value='".$grado."'>".$gradoprofesor."</option>";
				$query="SELECT id_gradoacademico, grado_academico from gradoacademico";
				$resultado=mysql_query($query,$link);
				while ($lista=mysql_fetch_array($resultado))
				echo "<option value='".$lista["id_gradoacademico"]."'>".$lista["grado_academico"]."</option>";
				echo "</select><br>";


				echo ' Programa Educativo <select name="programaeducativo">';
				$programa=$row["programa_profesor"];
				$query = "SELECT Id_carrera, carrera FROM carrera WHERE $programa = Id_carrera";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                $programaprofesor=$cambio["carrera"];
				echo "<option value='".$programa."'>".$programaprofesor."</option>";
				$query="SELECT Id_carrera, carrera from carrera";
				$resultado=mysql_query($query,$link);
				while ($lista=mysql_fetch_array($resultado))
				echo "<option value='".$lista["Id_carrera"]."'>".$lista["carrera"]."</option>";
				echo "</select><br>";


			echo ' Perfil Académico <select name="perfil">';
				$perfil=$row["perfil_profesor"];
                $query = "SELECT id_perfil_profesor, perfil_profesor FROM perfil_profesor WHERE $perfil = id_perfil_profesor";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                $perfil_profesor=$cambio["perfil_profesor"];
                echo "<option value='".$perfil."'>".$perfil_profesor."</option>";
				$query="SELECT id_perfil_profesor, perfil_profesor from perfil_profesor";
				$resultado=mysql_query($query,$link);
				while ($lista=mysql_fetch_array($resultado))
				echo "<option value='".$lista["id_perfil_profesor"]."'>".$lista["perfil_profesor"]."</option>";
				echo "</select><br>";

			echo ' Cargo <select name="cargo">';
			    $cargo=$row["cargo_profesor"];
                $query = "SELECT id_cargo_profesor, cargo_profesor FROM cargo_profesor WHERE $cargo = id_cargo_profesor";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                $cargoprof=$cambio["cargo_profesor"];
                echo "<option value='".$cargo."'>".$cargoprof."</option>";
				$query="SELECT id_cargo_profesor, cargo_profesor from cargo_profesor";
				$resultado=mysql_query($query,$link);
				while ($lista=mysql_fetch_array($resultado))
				echo "<option value='".$lista["id_cargo_profesor"]."'>".$lista["cargo_profesor"]."</option>";
				echo "</select><br>";
			
			echo 'Teléfono<input type="tel" name="telefono" size="10" value='.$row["telefono_profesor"].'><br>'; 
			echo 'Correo Electrónico<input type="text" size="35" name="correo" value='.$row["correo_profesor"].'><br>'; 
			echo 'Ubicación<input type="text" name="ubicacion" value='.$row["ubicacion_profesor"].'><br>'; 
			} else {
				echo "¡ La base de datos está vacia !";}
		?>
		<br/>
		 <div id="tablaboton">
			  <input id="botonotro" name="grabar" type="submit" value="Actualizar" style="font-weight: bold">
			  <input id="botonregresar" type="button" value='Cancelar' onClick='history.back()'>
		</div>
			</form>
			<figure>
					<form name="actualizar" action="cambiarfoto.php?id_prof=<?php echo $id_prof; ?>" method="POST" enctype="multipart/form-data">
						
						<?php
					$query = "SELECT id_profesor, foto FROM profesor WHERE id_profesor = $id_prof";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado)){
	                	if ($lista['foto'] == 0){
	                		echo "<img src='../images/profesor/".$lista['foto'].".png' width='260' height='260'><br>";
	                	}else{
	                		echo "<img src='../images/profesor/".$lista['foto']."' width='260' height='260'><br>";	                		
	                	}
	                }
	            ?>
						
	<input name="subirfoto" type="file">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000"></td><br />
						<input	type="submit" value="Cambiar"/>
					</form>
			</figure>
	</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>
	

			
				









