<?php
include("../../config/conexion.php");
mysql_query("SET NAMES 'utf8'"); //corregir problemas de idioma
require_once("../../classes/Login.php");

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
    header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualización de la información</title>
	<link rel="stylesheet" type="text/css" href="../../css/normalize.css">
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<meta charset="utf-8" />
</head>
<body>	
	<?php
		include ('../headeradmin2.php'); //Header hecho solo para archivo en carpetas
	?>
<article></article>
<section>	
	<h1 align="center">Modificar Información</h1><br>

	<form name="modificaralumno" action="modificar.php" method="POST" enctype="multipart/form-data">
<div id="datostutor1">
<?php
		$matricula=$_GET['matricula'];
		$id_prof=$_GET['id_prof'];
		$nombre=$_GET['nombre'];
		$apellidop=$_GET['apellidop'];
		$apellidom=$_GET['apellidom'];	

	$result2 = mysql_query("SELECT * FROM alumno  WHERE '$matricula'=matricula_alumno", $link);
	if ($row = mysql_fetch_array($result2)){
		
			
		echo '<input type="hidden" name="id" readonly="readonly" value='.$id_prof.'>'; 
		echo ' Matricula <input type="text"   name="matricula" size="9" value='.$row["matricula_alumno"].'>'.'<br>';
			
		echo ' Nombre <input type="text"  size="10" name="nombre" value="'.$row["nombre_alumno"].'">';
		echo ' <input type="text"   name="apellidop"  size="10" value="'.$row["apellidop_alumno"].'">';
		echo ' <input type="text"   name="apellidom"  size="10" value="'.$row["apellidom_alumno"].'">'.'<br>';
		
		echo ' Estado <select name="estado">';
				$estado=$row["estado_alumno"];
		$query = "SELECT Id_estado_alumno, estado FROM estado_alumno WHERE $estado = Id_estado_alumno";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $estadoalumno=$cambio["estado"];
		echo "<option value='".$estado."'>".$estadoalumno."</option>";
		$query="SELECT Id_estado_alumno, estado from estado_alumno";
		$resultado=mysql_query($query,$link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["Id_estado_alumno"]."'>".$lista["estado"]."</option>";
		echo "</select>".'<br>';

		echo 'Direccion: <input type="text"   name="direc"  size="25" value="'.$row["direccion_alumno"].'">'.'<br>';

		echo ' Lugar de Origen <select name="originario">';
					$originario=$row["originario_alumno"];
		$query = "SELECT id_localidad, localidad,municipio_localidad,estado_localidad FROM localidad WHERE $originario = id_localidad";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $lugar=$cambio["localidad"].",".$cambio["estado_localidad"];
        echo "<option value='".$originario."'>".$lugar."</option>";
		$query="SELECT id_localidad, localidad,estado_localidad from localidad";
		$resultado=mysql_query($query,$link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_localidad"]."'>".$lista["localidad"].",".$lista["estado_localidad"]."</option>";
		echo "</select>".'<br>';

		echo ' Semestre<select name="semestre">';
			    $semestre=$row["semestre_alumno"];
        $query = "SELECT Id_semestre, semestres FROM semestre WHERE $semestre = Id_semestre";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $semestrealumno=$cambio["semestres"];
         echo "<option value='".$semestre."'>".$semestrealumno."</option>";
		$query="SELECT Id_semestre, semestres from semestre";
		$resultado=mysql_query($query,$link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["Id_semestre"]."'>".$lista["semestres"]."</option>";
		echo "</select>".'<br>';

		echo 'Generación<select name="generacion">';
			$generacion=$row["generacion_alumno"];
        $query = "SELECT Id_generacion, generacion FROM generacion WHERE $generacion = Id_generacion";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $generacionalumno=$cambio["generacion"];
        echo "<option value='".$generacion."'>".$generacionalumno."</option>";
		$query="SELECT id_generacion, generacion from generacion";
		$resultado=mysql_query($query,$link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_generacion"]."'>".$lista["generacion"]."</option>";
		echo "</select>".'<br>';


		echo 'Carrera<select name="carrera">';
			$carrera=$row["carrera_alumno"];
        $query = "SELECT Id_carrera, carrera FROM carrera WHERE $carrera = Id_carrera";
        $resultado=mysql_query($query,$link);
        while ($cambio=mysql_fetch_array($resultado))
        $carreras=$cambio["carrera"];
        echo "<option value='".$carrera."'>".$carreras."</option>";
		$query="SELECT id_carrera, carrera from carrera";
		$resultado=mysql_query($query,$link);
		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_carrera"]."'>".$lista["carrera"]."</option>";
		echo "</select>".'<br>';

		echo 'Asesor Académico<select name="asesor">';
			    $asesor=$row["id_asesor"];
		$query = "SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor FROM profesor WHERE $asesor = id_profesor";
        $resultado=mysql_query($query,$link);
      	while ($cambio=mysql_fetch_array($resultado))
        $asesor_name=$cambio["nombre_profesor"]." ".$cambio["apellidop_profesor"]." ".$cambio["apellidom_profesor"];
       	echo "<option value='".$asesor."'>".$asesor_name."</option>";
		$query="SELECT id_profesor, nombre_profesor, apellidop_profesor, apellidom_profesor from profesor";		$resultado=mysql_query($query,$link);		while ($lista=mysql_fetch_array($resultado))
		echo "<option value='".$lista["id_profesor"]."'>".$lista["nombre_profesor"]." ".$lista["apellidop_profesor"]." ".$lista["apellidom_profesor"]."</option>";
		echo "</select>".'<br>';
					
		echo ' Correo <input type="text" name="correo" size="30" value="'.$row["correo_alumno"].'">'.'<br>';
				

		echo 'Teléfono <input type="text" name="telefono" size="15" value='.$row["telefono_alumno"].'>'.'<br>';

		echo 'Capacidad Diferente<input type="text" name="capacidad" size="5" value='.$row["capacidaddiferente_alumno"].'>'.'<br>'; 
				

		echo 'Sexo <select name="sexo"><option value="'.$row["sexo_alumno"].'">'.$row["sexo_alumno"].'</option><option value="F">F</option><option value="M">M</option></select><br />';

		echo 'Fecha de nacimiento <input type="date"  name="nacimiento" size="15" value='.$row["fechanac_alumno"].'> '.'<br>';

		$estado=$row['activo'];
		if ($estado == 1){
			echo 'Alumno <b><select name="estado"><option value="'.$row["activo"].'">Activo</option><option value="1">Activo</option><option value="0">Inactivo</option> de la Universidad</select><br />';
		}else{
			echo 'Estado <select name="estado"><option value="'.$row["activo"].'">Inactivo</option><option value="1">Activo</option><option value="0"><p style="color:red">Inactivo</p></option></select><br />';
		}
				
	} else {
	echo "¡ La base de datos está vacia !";
	}
		
	?>
		<br>
		<div id="tablaboton">
		<input id="botonotro"  name="grabar" type="submit" value="Actualizar" style="font-weight: bold">
		<input id="botonregresar" type="button" value='Cancelar' onClick='history.back()'>
		</div>
	</form>
</div>

<figure Id=img>
<div id="foto"> 
					<form name="actualizar" action="cambiarfoto.php?matricula=<?php echo $matricula; ?>" method="POST" enctype="multipart/form-data">
						
					<?php
					$query = "SELECT matricula_alumno, foto FROM alumno WHERE matricula_alumno = $matricula";
	                $resultado=mysql_query($query,$link);
	                while ($lista=mysql_fetch_array($resultado)){
	                	if ($lista['foto'] == 0){
	                		echo "<img src='../../images/alumno/".$lista['foto'].".png' width='240' height='260' position='left'><br>";
	                	}else{ 
	                		echo "<img src='../../images/alumno/".$lista['foto']."' width='240' height='260' position='left'><br>";	                		
	                	}
	                }
	            	?>
						
						<input name="subirfoto" type="file">
						<input type="hidden" name="MAX_FILE_SIZE" value="100000"></td><br />
						<input	type="submit" value="Cambiar"/><br /><br />
						
					</form>
</div>
</figure>

</section>

</body>
<?php
	include ('../../footer.php');
?>
</html>

