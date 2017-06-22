<?php
	include("config/conexion.php");
	mysql_query("SET NAMES 'utf8'"); 
	include("autentificacion.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tutorado</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8" />
</head>
<body>
<?php
	include('header.php');
?>

	<section>
	<br><h1 align="center">Información del Alumno</h1><br>
	<div id="alumnno">

		<?php
			$matricula= $_GET['matricula'];
			$id_prof=$_GET['id_prof'];
			$nombre=$_GET['nombre'];
			$apellidop=$_GET['apellidop'];
			$apellidom=$_GET['apellidom'];		
			
		$result2 = mysql_query("SELECT * FROM alumno where matricula_alumno=$matricula", $link);
		if ($row = mysql_fetch_array($result2)){
		
	
				echo "Matrícula: "; echo "<b>".$row["matricula_alumno"]."<br>"."</b>";

				echo "Nombre: "; echo "<b>".$row["nombre_alumno"]." ";
				echo $row["apellidop_alumno"]." ";
				echo $row["apellidom_alumno"]."<br>"."</b>";

				echo "Estado: ";
				$estado=$row["estado_alumno"];
                $query = "SELECT Id_estado_alumno, estado FROM estado_alumno WHERE $estado = Id_estado_alumno";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<b>".$cambio["estado"].'<br>'."</b>";

            	echo "Dirección: "; echo "<b>".$row["direccion_alumno"]."<br></b>";
            	
            	echo "Lugar de Origen: ";
				$originario=$row["originario_alumno"];
                $query = "SELECT id_localidad, localidad,municipio_localidad,estado_localidad FROM localidad WHERE $originario = id_localidad";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<b>".$cambio["localidad"].', '.$cambio["municipio_localidad"].'<br>'."</b>";
            	
				echo "Semestre: ";
				$semestre=$row["semestre_alumno"];
                $query = "SELECT Id_semestre, semestres FROM semestre WHERE $semestre = Id_semestre";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<b>".$cambio["semestres"].'<br>'.'</b>';

				echo "Generación: ";
				$generacion=$row["generacion_alumno"];
                $query = "SELECT Id_generacion, generacion FROM generacion WHERE $generacion = Id_generacion";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<b>".$cambio["generacion"].'<br>'.'</b>';

            	echo "Carrera: ";
				$carrera=$row["carrera_alumno"];
                $query = "SELECT Id_carrera, carrera FROM carrera WHERE $carrera = Id_carrera";
                $resultado=mysql_query($query,$link);
                while ($cambio=mysql_fetch_array($resultado))
                echo "<b>".$cambio["carrera"].'<br>'.'</b>';

                $row["id_asesor"];         
            
				echo "Correo Electrónico: "; echo "<b>".$row["correo_alumno"]."<br>"."</b>";
				echo "Teléfono: "; echo "<b>".$row["telefono_alumno"]."<br>"."</b>";
				echo "Capacidad Diferente: "; echo "<b>".$row["capacidaddiferente_alumno"]."<br>"."</b>";
				echo "Sexo:  "; echo "<b>".$row["sexo_alumno"]."<br>"."</b>";
				echo "Fecha de Nacimiento: "; echo "<b>".$row["fechanac_alumno"]."<br>"."</b>";
				
				if( $row["activo"]==1)
				{
					$status="Activo";
				}else
				{
					$status="Baja";
				}

				echo "Status: "; echo "<b>".$status."<br>"."</b>";

			echo "<form action='ModificaTutorAsesor.php' method='POST' enctype='multipart/form-data'>";
			echo ' <input type="hidden"  name="matricula" size="9" value='.$row["matricula_alumno"].'>';
         	echo 'Tutor: <select name="tutor">';
			$tutor=$row["id_tutor"];
			$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $tutor = id_profesor";
       	 	$resultado=mysql_query($query,$link);
      		while ($cambio=mysql_fetch_array($resultado))
       	 	$tutor_name=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       		echo "<option value='".$tutor."'>".$tutor_name."</option>";
			$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		
			$resultado=mysql_query($query,$link);		
			while ($lista=mysql_fetch_array($resultado))
			echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
			echo "</select>".'<br>';


         	echo 'Asesor Académico: <select name="asesor">';
			$asesor=$row["id_asesor"];
			$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $asesor = id_profesor";
       	 	$resultado=mysql_query($query,$link);
      		while ($cambio=mysql_fetch_array($resultado))
       	 	$asesor_name=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       		echo "<option value='".$asesor."'>".$asesor_name."</option>";
			$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		
			$resultado=mysql_query($query,$link);		
			while ($lista=mysql_fetch_array($resultado))
			echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
			echo "</select>".'<br>';

			echo"<div id='tablaboton'>
			  <input id='botonotro' name='grabar' type='submit' value='Actualizar' style='font-weight: bold'>
			</div>";

            echo "</form>";


			} else {
				echo "¡ No existen datos !";
			}
		?>
		</div>
		<figure>
				<?php
					$query = "SELECT matricula_alumno, foto FROM alumno WHERE matricula_alumno = $matricula";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado)){
	                	if ($lista['foto'] == 0){
	                		echo "<img src='images/alumno/".$lista['foto'].".png' height='300'><br>";
	                	}else{
	                		echo "<img src='images/alumno/".$lista['foto']."' height='300'><br>";	                		
	                	}
	                }
	            ?>
					
			</figure>
	</section>
</body>
	<footer>
		<?php
		include("footer.php");
		?>
	</footer>

</html>