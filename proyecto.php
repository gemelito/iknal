<?php
include("config/conexion.php");
mysql_query("SET NAMES 'utf8'");
require_once("classes/Login.php");
	// crear objeto login
	// so this single line handles the entire login process. in consequence, you can simply ...
	$login = new Login();

	// ... ask if we are logged in here:
	if ($login->isUserLoggedIn() == true) {
	    // the user is logged in. you can do whatever you want here.
	    // for demonstration purposes, we simply show the "you are logged in" view.
	    //include("views/logged_in.php");
	   
	} else {
	    // the user is not logged in. you can do whatever you want here.
	    // for demonstration purposes, we simply show the "you are not logged in" view.
	    header("location:index.php");
	}
	$sesion=$_SESSION['user_name'];
		$query="SELECT Id_profes, user_name FROM users WHERE user_name = '$sesion' "; //CARGAMOS LOS DATOS PARA BUSCAR EL ID DE PROFE
      	$resultado=mysql_query($query,$link);
      	while ($lista=mysql_fetch_array($resultado)){
        	$id_prof= $lista["Id_profes"]; 
        }

?>
<html>
	<head>
		<link rel="shortcut icon" href="images/favicon.ico">
		<title>Proyectos</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/normalize1.css">
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
	</head>
<body>
<?php
	include('header.php');
	$nombre=$_GET['nombre'];
    $apellidop=$_GET['apellidop'];
    $apellidom=$_GET['apellidom'];
?>
<section>
	<h1><?php  echo "<b>$nombre $apellidop $apellidom </b>"; ?></h1>
	<form action="proyectoagregar.php" method="POST" enctype="multipart/form-data"> 
		
		<table id="datostutor1"> 
	
		<?php
		
			$matricula=$_GET['matricula'];
			$id_prof=$_GET['id_prof'];	
			
			echo '<input type="hidden" name="nombre_alumno" readonly="readonly" value='.$nombre.'>';
			echo '<input type="hidden" name="apellidop_alumno" readonly="readonly" value='.$apellidop.'>';
			echo '<input type="hidden" name="apellidom_alumno" readonly="readonly" value='.$apellidom.'>';
			echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>';  
			echo '<input type="hidden" name="matricula" readonly="readonly" value='.$matricula.'>'; 		
			
		?> 
				

			<tr>
				<td>Verano</td>
				<td><select name="verano">
				<option Value="0"></option>
				<option Value="I">I</option>
				<option Value="II">II</option>
				<option Value="III">III</option>
				<option Value="IV">IV</option>
			</tr> 
			<tr>
				<td>Localidad</td>
				<td><select name="lugar">
				<option value="0"></option>
				<?php
				$query=" SELECT id_localidad, localidad, estado_localidad from localidad ORDER BY localidad asc";
			$resultado=mysql_query($query,$link);
			while ($lista=mysql_fetch_array($resultado))
			echo "<option value='".$lista["id_localidad"]."'>".$lista["localidad"].",".$lista["estado_localidad"]."</option>";
			?>
			</select></td>  
			</tr>
			<tr>
				<td>	Titulo del proyecto </td>
				<td><input type="text" name="titulo" equired="required" size="20"></td>
			</tr>
			<tr>				
				<td>Area de desarrollo</td>
				<td><select name="area">
				<option Value="Académica">Académica</option>
				<option Value="Sector Público">Sector público</option>
				<option Value="Iniciativa Privada">Iniciativa privada</option>
				<option Value="Organización de Sociedad Civil">Organización de Sociedad Civil</option>
				</select></td>
			</tr>
			<tr>
				<td>Tipo de proyecto </td>
				<td><select name="tipo">
				<option Value="Proyecto de Desarrollo">Proyecto de Desarrollo</option>
				<option Value="Proyecto de investigación">Proyecto de investigación</option>
				<option Value="Proyecto de inversión">Proyecto de inversión</option>
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
				 <option value="0"></option>
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
				 <option value="0"></option>
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
				<option value="0"></option>
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
				<td><input type="text" name="equipoproyecto" size="21"></td>
			</tr>
			</table>
			<br>
			<div id="tablaboton">
			<input id="botonotrom" align="center" TYPE=SUBMIT VALUE="ENVIAR" href="">  
			<input id="botonotro" align="center" TYPE=RESET VALUE="BORAR DATOS">
			<input id="botonregresar" type="button" href="javascript:history.back()" value="Regresar" onclick='history.back()'>
			
			</form>

			</div>
</section>
</body>

</html>