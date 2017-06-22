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
			<title>Modificar Información</title>
		<script type="text/javascript">
		function mostrar(){
		document.getElementById('oculto').style.display='block';
		}
		function mostrarOtro(){
		document.getElementById('oculto-otro').style.display='block';
		}
    	</script>
		</head>
	<body>
	<?php
		include ('../headers.php');
	?>
	<article></article>
	<section>
		<form name="modificarfamilia" action="modificar.php" method="POST" enctype="multipart/form-data">
		<h1 align="center">Información del Familia</h1>
		<div id="amigoss">  
		<?php
		$matricula= $_GET['matricula'];
		$id_prof=$_GET['id_prof'];
		$nombre=$_GET['nombre'];
		$apellidop=$_GET['apellidop'];
		$apellidom=$_GET['apellidom'];	

		$result2 = mysql_query("SELECT * FROM familia WHERE matricula_familia='$matricula'", $link);
		if ($row = mysql_fetch_array($result2)){
		do {
			echo '<b><p>  ==Datos del Padre== </p>';
			echo '<input type="hidden" name="id_tutor" value='.$id_prof.'>'; 
			echo '<input type="hidden" name="id" value='.$id_prof.'>'; 
			echo '<input type="hidden" name="nombre_alumno" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop_alumno" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom_alumno" value='.$apellidom.'>';
			echo '<input type="hidden" name="matricula" size="9" value='.$row["matricula_familia"].'><br>';
			
		if ($row["nombreh"]=="") {
			//padre
			echo 'Nombre del Padre <input type="text" name="nombrep" size="15" value="'.$row["nombrep"].'"><input type="text" name="apellidop" size="16" value="'.$row["apellidop"].'"><input type="text" name="apellidom" size="15" value="'.$row["apellidom"].'"><br>';
			echo 'Correo <input type="text" name="correop" size="30" value="'.$row["correop"].'"><br>';
			echo 'Teléfono <input type="text" name="telefonop" size="15" value='.$row["telefonop"].'><br>';
			echo 'Profesión <input type="text" name="profesionp" size="10" value="'.$row["profesion"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientop" size="10" value='.$row["nacimientop"].'><br><br>';
			
			//madre
			echo '<b><p> ==Datos de la Madre== </p><b>';
			echo 'Nombre de la Madre <input type="text" name="nombrem" size="15" value="'.$row["nombrem"].'"><input type="text" name="apellidopm" size="16" value="'.$row["apellidopp"].'"><input type="text" name="apellidomm" size="15" value="'.$row["apellidopm"].'"><br>';
			echo 'Correo <input type="text" name="correom" size="30" value="'.$row["correom"].'"><br>';
			echo 'Teléfono <input type="text" name="telefonom" size="15" value='.$row["telefonom"].'><br>';
			echo 'Profesión <input type="text" name="profesionm" size="10" value="'.$row["profesionm"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientom" size="10" value='.$row["nacimientom"].'><br><br>';
			echo'<input align="center" Type="button" Value="Agregar Hermano" onclick="mostrar()">';
			echo'<div id="oculto" style="display:none;">
			<table id="formulario"><br>
			<tr>
				   <td>Hermano 1</td>
				   <td> <input type="text" name="nombreh" placeholder="Nombre" size="8"><input type="text" name="apellidoph" placeholder="Apellido Paterno" size="13"><input type="text" name="apellidomh"  placeholder="Apellido Materno" size="13"> </td>   
				</tr>
				<tr>
				   <td>Correo</td>
				   <td> <input type="text" name="correoh" size="45"> </td> 
				</tr>
				<tr>
				   <td> Teléfono</td>
				   <td> <input type="tel" name="telefonoh" pattern="[0-9]{10}" placeholder="10 dígitos"> </td>
				</tr>
				<tr>
				   <td>Profesion</td>
				   <td> <input type="text" name="profesionh" size="45"> </td> 
				</tr>
				<tr>
				   <td>Año de Nacimiento</td>
				   <td> <input type="date" name="nacimientoh"></td> 
				</tr>
				<tr><td><br></td></tr>
				<tr>
				<tr>
				   <td><input align="center" Type="button" Value="Agregar Hermano" onclick="mostrarOtro()"></td>
				</tr>
			</table>
			</div>
			<br><br>
			<div id="oculto-otro" style="display:none;">
			<table>
				   <td>Hermano 2</td>
				   <td> <input type="text" name="nombrehh" placeholder="Nombre" size="8"><input type="text" name="apellidophh" placeholder="Apellido Paterno" size="13"><input type="text" name="apellidomhh" placeholder="Apellido Materno" size="13"> </td>   
				</tr>
				<tr>
				   <td>Correo</td>
			 	   <td> <input type="text" name="correohh" size="45"> </td> 
				</tr>
				<tr>
				   <td> Teléfono</td>
				   <td> <input type="tel" name="telefonohh" pattern="[0-9]{10}" placeholder="10 dígitos"> </td>
				</tr>
				<tr>
				   <td>Profesion</td>
				   <td> <input type="text" name="profesionhh" size="45"> </td> 
				</tr>
				<tr>
				   <td>Año de Nacimiento</td>
				   <td> <input type="date" name="nacimientohh" > </td> 
				</tr>
				</table>
			</div>';


		}elseif ($row["nombrehh"]=="") {
			//padre
			echo 'Nombre del Padre <input type="text" name="nombrep" size="15" value="'.$row["nombrep"].'"><input type="text" name="apellidop" size="16" value="'.$row["apellidop"].'"><input type="text" name="apellidom" size="15" value="'.$row["apellidom"].'"><br>';
			echo 'Correo <input type="text" name="correop" size="30" value="'.$row["correop"].'"><br>';
			echo 'Teléfono <input type="text" name="telefonop" size="15" value='.$row["telefonop"].'><br>';
			echo 'Profesión <input type="text" name="profesionp" size="10" value="'.$row["profesion"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientop" size="10" value='.$row["nacimientop"].'><br><br>';
			
			//madre
			echo '<b><p> ==Datos de la Madre== </p><b>';
			echo 'Nombre de la Madre <input type="text" name="nombrem" size="15" value="'.$row["nombrem"].'"><input type="text" name="apellidopm" size="16" value="'.$row["apellidopp"].'"><input type="text" name="apellidomm" size="15" value="'.$row["apellidopm"].'"><br>';
			echo 'Correo <input type="text" name="correom" size="30" value="'.$row["correom"].'"><br>';
			echo 'Teléfono <input type="text" name="telefonom" size="15" value='.$row["telefonom"].'><br>';
			echo 'Profesión <input type="text" name="profesionm" size="10" value="'.$row["profesionm"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientom" size="10" value='.$row["nacimientom"].'><br><br>';

			//herman@1
			echo '<b><p>  ==Datos del Hermano== </p><b>';
			echo 'Nombre <input type="text"  name="nombreh" size="15" value="'.$row["nombreh"].'"><input type="text" name="apellidoph" size="16" value="'.$row["apellidoph"].'"><input type="text" name="apellidomh" size="15" value="'.$row["apellidomh"].'"><br>';
			echo 'Correo <input type="text" name="correoh" size="30" value="'.$row["correoh"].'"></td><br>';
			echo 'Teléfono <input type="text" name="telefonoh" size="15" value='.$row["telefonoh"].'><br>';
			echo 'Profesión <input type="text" name="profesionh" size="10" value="'.$row["profesionh"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientoh" size="10" value='.$row["nacimientoh"].'><br>';
			//herman@2
			echo '<input align="center" Type="button" Value="Agregar Hermano" onclick="mostrarOtro()">';
			echo'<div id="oculto-otro" style="display:none;">	
			<table>
				   <td>Hermano 2</td>
				   <td> <input type="text" name="nombrehh" placeholder="Nombre" size="8"><input type="text" name="apellidophh" placeholder="Apellido Paterno" size="13"><input type="text" name="apellidomhh" placeholder="Apellido Materno" size="13"> </td>   
				</tr>
				<tr>
				   <td>Correo</td>
			 	   <td> <input type="text" name="correohh" size="45"> </td> 
				</tr>
				<tr>
				   <td> Teléfono</td>
				   <td> <input type="tel" name="telefonohh" pattern="[0-9]{10}" placeholder="10 dígitos"> </td>
				</tr>
				<tr>
				   <td>Profesion</td>
				   <td> <input type="text" name="profesionhh" size="45"> </td> 
				</tr>
				<tr>
				   <td>Año de Nacimiento</td>
				   <td> <input type="date" name="nacimientohh" > </td> 
				</tr>
			</table>
			</div>';

		}else{
			//padre
			echo 'Nombre del Padre <input type="text" name="nombrep" size="15" value="'.$row["nombrep"].'"><input type="text" name="apellidop" size="16" value="'.$row["apellidop"].'"> <input type="text" name="apellidom" size="15" value="'.$row["apellidom"].'"><br>';
			echo 'Correo <input type="text" name="correop" size="30" value="'.$row["correop"].'"><br>';
			echo 'Teléfono <input type="text" name="telefonop" size="15" value='.$row["telefonop"].'><br>';
			echo 'Profesión <input type="text" name="profesionp" size="10" value="'.$row["profesion"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientop" size="10" value='.$row["nacimientop"].'><br><br>';
			
			//madre
			echo '<b><p> ==Datos de la Madre== </p><b>';
			echo 'Nombre de la Madre <input type="text" name="nombrem" size="15" value="'.$row["nombrem"].'"><input type="text" name="apellidopm" size="16" value="'.$row["apellidopp"].'"><input type="text" name="apellidomm" size="15" value="'.$row["apellidopm"].'"><br>';
			echo 'Correo <input type="text" name="correom" size="30" value="'.$row["correom"].'"><br>';
			echo 'Teléfono <input type="text" name="telefonom" size="15" value='.$row["telefonom"].'><br>';
			echo 'Profesión <input type="text" name="profesionm" size="10" value="'.$row["profesionm"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientom" size="10" value='.$row["nacimientom"].'><br><br>';

			//herman@1
			echo '<b><p>  ==Datos de los Hermanos== </p><b>';
			echo 'Nombre <input type="text" name="nombreh" size="15" value="'.$row["nombreh"].'"><input type="text" name="apellidoph" size="16" value="'.$row["apellidoph"].'"><input type="text" name="apellidomh" size="15" value="'.$row["apellidomh"].'"><br>';
			echo 'Correo <input type="text" name="correoh" size="30" value="'.$row["correoh"].'"></td><br>';
			echo 'Teléfono <input type="text" name="telefonoh" size="15" value='.$row["telefonoh"].'><br>';
			echo 'Profesión <input type="text" name="profesionh" size="10" value="'.$row["profesionh"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientoh" size="10" value='.$row["nacimientoh"].'><br><br>';

			//herman@2
			echo 'Nombre <input type="text" name="nombrehh" size="15" value="'.$row["nombrehh"].'"><input type="text" name="apellidophh" size="16" value="'.$row["apellidophh"].'"><input type="text" name="apellidomhh" size="15" value="'.$row["apellidomhh"].'"><br>';
			echo 'Correo <input type="text" name="correohh" size="30" value="'.$row["correohh"].'"></td><br>';
			echo 'Teléfono <input type="text" name="telefonohh" size="15" value='.$row["telefonohh"].'><br>';
			echo 'Profesión <input type="text" name="profesionhh" size="10" value="'.$row["profesionhh"].'"><br>';
			echo 'Nacimiento <input type="date" name="nacimientohh" size="10" value='.$row["nacimientohh"].'><br>';

		}
		} while ($row = mysql_fetch_array($result2));
		
		} else {
			echo "¡ La base de datos está vacia !";
		}		

		echo '<input class="ri1" name="grabar" type="submit" value="Actualizar" style="font-weight: bold">';
		echo '<a href="consultafamili.php?matricula=$matricula&id_prof=$id_prof&nombre=$nombre&apellidop=$apellidop&apellidom=$apellidom><input class="ri1" type="button" value="Cancelar"></a>';
		?>
		<br><br><br><br>
		</form>
	</section>
	<?php
		include ('../footer.php');
	?>
	</body>
</html>