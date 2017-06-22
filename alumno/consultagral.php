<?php
	include("../config/conexion.php");
	mysql_query("SET NAMES 'utf8'"); 
	include("../autentificacion.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tutorado</title>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<meta charset="utf-8" />
</head>
<body>
<?php
	include('../headers.php');
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

				echo "<div id=tablaboton>";
				echo "<a id='botonmodificar' href='alumnomodif.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Modificar</a><br>";
				echo "<a id='botonregresar' href='../tutoradomenu.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Regresar</a>";
				
				$query = "SELECT * FROM foda WHERE $matricula = matricula_foda";
                $foda=mysql_query($query,$link);
                if ($comparacion=mysql_fetch_array($foda)){
					
				echo "<a id='botonfoda' href='consultfoda.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Ver Foda</a>";
				}else{
				echo "<a id='botonfoda' href='foda.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom'>Foda</a>";
					
				}
			} else {
				echo "¡ No existen datos !";
			}
			echo "</div>";
		?>
		</div>
		<figure>
		<div>
				<?php
				


					$query = "SELECT matricula_alumno, foto FROM alumno WHERE matricula_alumno = $matricula";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado)){
	                	if ($lista['foto'] == 0){
	                		echo "<img src='../images/alumno/".$lista['foto'].".png' ><br>";
	                	}else{
	      			
	                		echo "<img src='../images/alumno/".$lista['foto']."' width='260' height='260'><br>";	                		
	                	}
	                }
	            ?>
				</div>	
			</figure>
	</section>
</body>
	<footer>
		<?php
		include("../footer.php");
		?>
	</footer>

</html>