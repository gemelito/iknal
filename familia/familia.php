<?PHP
include("../config/conexion.php");
mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
include("../autentificacion.php");
$matricula=$_GET['matricula'];
$id_prof=$_GET['id_prof'];	
$nombre=$_GET['nombre'];
$apellidop=$_GET['apellidop'];
$apellidom=$_GET['apellidom'];
?>

<!DOCTYPE html>
	<html lang="es">
	<head>
		<link rel="shortcut icon" href="../images/favicon.ico">
			<link rel="stylesheet" type="text/css" href="../css/normalize.css">
				<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    		<meta charset="utf-8" />
		<title>Agregar información</title>
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
		<h1 > Información de la Familia</h1>
		<p id="arriba">Ingrese la información en cada campo y al finalizar de clic en la opción envíar</p>
		<form action="agregarfamilia.php?matricula=$matricula,id_prof=$id_prof" method="POST" enctype="multipart/form-data" > 
		
			<?php
			mysql_query("SET NAMES 'utf8'");
			$matricula=$_GET['matricula'];
			$id_prof=$_GET['id_prof'];	
			echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>';  
			echo '<input type="hidden" name="matricula_familia" readonly="readonly" value='.$matricula.'>'; 
			echo '<input type="hidden" name="nombre" readonly="readonly" value='.$nombre.'>';
			echo '<input type="hidden" name=apellidopaterno" readonly="readonly" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidomaterno" readonly="readonly" value='.$apellidom.'>';   
			?>
			<div id="amigoss">
			<table> 
			<tr>
			   <td>Nombre del Padre</td>
			   <td> <input type="text" name="nombrep" placeholder="Nombre" size="8" required="required"><input type="text" name="apellidop" placeholder="Apellido Paterno" size="13" required="required"><input type="text" name="apellidom" required="required"  placeholder="Apellido Materno" size="13"> </td>   
			</tr>
			<tr>
			   <td>Correo</td>
			   <td> <input type="text" name="correop" size="45"> </td> 
			</tr>
			<tr>
			   <td> Teléfono</td>
			   <td> <input type="tel" name="telefonop" pattern="[0-9]{10}" placeholder="10 dígitos"> </td>
			</tr>
			<tr>
			   <td>Profesion</td>
			   <td> <input type="text" name="profesion" size="45"> </td> 
			</tr>
			<tr>
			   <td>Año de Nacimiento</td>
			   <td> <input type="date" name="nacimientop" > </td> 
			</tr>
			<tr>
			   <td>Nombre de la Madre</td>
			   <td> <input type="text" name="nombrem"  required="required" placeholder="Nombre" size="8"><input type="text" name="apellidopp" required="required"  placeholder="Apellido Paterno" size="13"><input type="text"  required="required" name="apellidopm" placeholder="Apellido Materno" size="13"> </td>   
			</tr>
			<tr>
			   <td>Correo</td>
			   <td> <input type="text" name="correom" size="45"> </td> 
			</tr>
			<tr>
			   <td> Teléfono</td>
			   <td> <input type="tel" name="telefonom" pattern="[0-9]{10}" placeholder="10 dígitos"> </td>
			</tr>
			<tr>
			   <td>Profesion</td>
			   <td> <input type="text" name="profesionm" size="45"> </td> 
			</tr>
			<tr>
			   <td>Año de Nacimiento</td>
			   <td> <input type="date" name="nacimientom" > </td> 
			</tr>
			<tr>
			   <td>
			   	<div id="tablaboton">
			   <input id="botonotro"  align="center" TYPE=SUBMIT VALUE="Guardar" href="">  
			   <input id="botonregresar" align="center" TYPE="BUTTON" onclick="history.back()" VALUE="Regresar"></td>
			</div>	
			</tr>
			<tr>
			   <td>
			   <input  align="center" Type="button" Value="Agregar Hermano" onclick="mostrar()"></a><img src="../images/signo.png" width="25px" height="25px" style=cursor:pointer title="Introduzca información de los dos hermanos mayores"></td>
			</tr>
		</table>
		</div>
		<div id="oculto" style="display:none;">
		<table id="amigoss"> 
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
		<div id="oculto-otro" style="display:none;">	
		<table id="amigoss">
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
		</div>
		</table>
		</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
	<?php
		include ('../footer.php');
	?>
	</body>
</html>
	
			

  		