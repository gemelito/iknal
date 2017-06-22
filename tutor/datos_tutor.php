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
			<title>Datos Tutor</title>
		</head>
	<body>
	<?php
		include ('../headers.php');
	?>
	<article>
		<?php
			$sesion= $_SESSION['user_name'];
  			$query="SELECT Id_profes, user_name FROM users WHERE user_name = '$sesion' "; //CARGAMOS LOS DATOS PARA BUSCAR EL ID DE PROFE
      		$resultado=mysql_query($query,$link);
     	 	while ($lista=mysql_fetch_array($resultado)){
        		$id_prof= $lista["Id_profes"]; 
            }            
        ?>
	</article>
	<section>
			<h1 align="center"> Mis Datos</h1><br>
			<div id="datostutor">
			<?php	
			mysql_query("SET NAMES 'utf8'");
			header('Content-Type: text/html; charset=utf-8');	
			$result2 = mysql_query("SELECT * FROM profesor where id_profesor='$id_prof'" , $link);
			if ($row = mysql_fetch_array($result2)){

					echo "Nombre: "; echo "<b>".$row["nombre_profesor"]." ";
					echo $row["apellidop_profesor"]." ";
					echo $row["apellidom_profesor"]."<br>"."</b>";
					echo "Domicilio: "; echo "<b>".$row["domicilio_profesor"]." </b><br />";
					echo "Fecha de Nacimiento: "; echo "<b>".$row["fechanac_profesor"]."<br>"."</b>";
					
					echo "Grado:";
					$grado=$row["grado_profesor"];
	                $query = "SELECT id_gradoacademico, grado_academico FROM gradoacademico WHERE $grado = id_gradoacademico";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["grado_academico"].'<br>'.'</b>';

	            	echo "Programa Educativo: ";
					$programa=$row["programa_profesor"];
	                $query = "SELECT Id_carrera, carrera FROM carrera WHERE $programa = Id_carrera";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["carrera"].'<br>'.'</b>';
	            




					echo "Perfil Académico: ";
					$perfil=$row["perfil_profesor"];
	                $query = "SELECT id_perfil_profesor, perfil_profesor FROM perfil_profesor WHERE $perfil = id_perfil_profesor";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["perfil_profesor"].'<br>'.'</b>';

					echo "Cargo: ";
					$cargo=$row["cargo_profesor"];
	                $query = "SELECT id_cargo_profesor, cargo_profesor FROM cargo_profesor WHERE $cargo = id_cargo_profesor";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado))
	                echo "<b>".$lista["cargo_profesor"].'<br>'.'</b>';

					echo "Teléfono:"; echo "<b>".$row["telefono_profesor"]."<br>"."</b>";
					echo "Correo Electrónico:"; echo "<b>".$row["correo_profesor"]."<br>"."</b>";
					echo "Ubicación: "; echo "<b>".$row["ubicacion_profesor"]."<br>"."</b>";
					echo "Fecha ingreso:"; echo "<b>".$row["fecha_ingreso"]."<br>"."</b>";
					echo "<div id='tablaboton'>";
					echo "<a id='botonmodificar' href='modificar_tutor.php?id_prof=$id_prof'>Modificar Datos</a>";
				
					echo "</tr> \n";
					echo "</div>";			
				} else {
					echo "¡ La base de datos está vacia !";
				}
			
			?>
			</div>
			<figure>
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
					
			</figure>
		</section>
	<?php
		include ('../footer.php');
	?>
</body>
</html>

	
