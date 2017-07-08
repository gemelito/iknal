<?php
	require_once ('../classes/Config.php');
	require_once('../classes/Resources.php');
	require_once('../classes/Permission.php');
	require_once("../classes/Student.php");
	require_once('../classes/Project.php');

	$permission = new Permission();
	$permission->IsStudent();

	$resources = new Resources();
	$getdegrees = $resources->GetDegrees();
	$getdegrees2 = $resources->GetDegrees();
  $getStates = $resources->GetState();
  $getSemesters = $resources->GetSemesters();
  $getGenerations = $resources->GetGenerations();
  $getLocations = $resources->GetLocations();

	$student = new Student();

	if (isset($_POST['enviar'])) {
		$student->Set("matricula", $_POST['matricula']);
		$student->Set("nombre", $_POST['nombre']);
		$student->Set("apellido_paterno", $_POST['apellido_paterno']);
		$student->Set("apellido_materno", $_POST['apellido_materno']);
		$student->Set("estado", $_POST['estado']);
		$student->Set("localidad", $_POST['localidad']);
		$student->Set("carrera", $_POST['carrera']);
		$student->Set("generacion", $_POST['generacion']);
		$student->Set("semestre", $_POST['semestre']);
		$student->Set("correo", $_POST['correo']);
		$student->Set("telefono", $_POST['telefono']);
		$student->Set("capacidad_diferente", $_POST['capacidad_diferente']);
		$student->Set("sexo", $_POST['sexo']);
		$student->Set("fecha_nacimiento", $_POST['fecha_nacimiento']);
		$student->Update();
	}

	$student->Set('user_name', $_SESSION['user_name']);
	$getinformation = $student->GetInformation();
	$conexion = $student->Conexion();


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include('../includes/head.php'); ?>
</head>
<body>
	<?php include("../includes/header.php"); ?>
<main>
	<div class="row">
			<div class="col l12 m12 s12">
				<form action="my.php" method="POST" enctype="multipart/form-data">
					<div class="card">
						<div class="card-content blue-grey-text text-darken-3">
							<span class="card-title center-align"><strong>Datos Personales</strong></span>
							<div class="input-field top-space-medium">
							<input type="text" readonly name="matricula" class="validate " value="<?php echo $getinformation->matricula_alumno;?>">
							<label for="icon_prefix">Matricula</label>
							</div>
							<div class="row">
								<div class="col l4 m4 s12">
								<div class= "input-field">
								<input type="text" name="nombre" class="validate " value="<?php echo $getinformation->nombre_alumno;?>" >
								<label>Nombre</label>
								</div>
							</div>
							<div class="col l4 m4 s12">
								<div class= "input-field">
								<input type="text" name="apellido_paterno" class="validate " value="<?php echo $getinformation->apellidop_alumno;?>" >
								<label>Apellido Paterno</label>
								</div>
							</div>
							<div class="col l4 m4 s12">
								<div class= "input-field">
								<input type="text" name="apellido_materno" class="validate " value="<?php echo $getinformation->apellidom_alumno;?>"  >
								<label>Apellido Materno</label>
								</div>
							</div>
							</div>
							<h6><strong></strong> Estado actual del Alumno: <?php echo $getinformation->estado;?></strong></h6>
							<div class="input-field">
							<!--<label class="control-label">Seleccionar estado</label>-->
                <select class="browser-default " name="estado" >
                  <option value="" selected>Seleccione el estado.</option>
                  <?php while($state = $conexion::RunArray($getStates)){?>
                    <option value="<?php echo $state['Id_estado_alumno']?>"><?php echo $state['estado'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <br>
              <h6><strong></strong> Lugar de Origen: <?php echo $getinformation->localidad,', ',$getinformation->municipio_localidad,', ',$getinformation->estado_localidad;?></strong></h6>
              <div class="input-field">
                  <select class="browser-default" name="localidad" >
                    <option value="" selected>Seleccione el origen.</option>
                    <?php while($localidad = $conexion::RunArray($getLocations)){?>
                      <option value="<?php echo $localidad['id_localidad']?>"><?php echo $localidad['localidad'],', ',$localidad['municipio_localidad'],', ',$localidad['estado_localidad']; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <br>
              <h6><strong></strong> Semestre actual: <?php echo $getinformation->semestres;?></strong></h6>
              <div class="input-field">
                <select class="browser-default" name="semestre">
                  <option value="" selected>Seleccione el semestre.</option>
                  <?php while($semester = $conexion::RunArray($getSemesters)){?>
                    <option value="<?php echo $semester['Id_semestre']?>"><?php echo $semester['semestres'] ?></option>
                  <?php } ?>
               </select>
              </div>
              <br>
              <h6><strong></strong> Generacion actual: <?php echo $getinformation->generacion;?></strong></h6>
              <div class="input-field">
                <select class="browser-default" name="generacion">
                  <option value="" selected>Seleccione la generacion.</option>
                  <?php while($generation = $conexion::RunArray($getGenerations)){?>
                    <option value="<?php echo $generation['Id_generacion']?>"><?php echo $generation['generacion'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <br>
              <h6><strong></strong> Carrera actual: <?php echo $getinformation->carrera;?></strong></h6>
              <div class="input-field">
                <select class="browser-default" name="carrera">
                  <option value="" selected>Seleccione la carrera.</option>
                  <?php while($degree = $conexion::RunArray($getdegrees2)){?>
                  	<option value="<?php echo $degree['Id_carrera']?>"><?php echo $degree['carrera'] ?></option>
                  <?php } ?>
               </select>
             </div>
              <br>
              <div class="input-field top-space-medium">
                <input type="text" name="correo" class="validate " value="<?php echo $getinformation->correo_alumno;?>">
							  <label for="icon_prefix">Correo</label>
							</div>
              <br>
              <div class="input-field top-space-medium">
							  <input type="text" name="telefono" class="validate " value="<?php echo $getinformation->telefono_alumno;?>">
							  <label for="icon_prefix">Telefono</label>
							</div>
							<div class="input-field top-space-medium">
							  <input type="text" name="capacidad_diferente" class="validate " value="<?php echo $getinformation->capacidaddiferente_alumno;?>">
							  <label for="icon_prefix">Capacidad Diferente</label>
							</div>
							<br>
							<h6><strong></strong> Sexo: <?php echo ($getinformation->sexo_alumno == 'M')? 'Hombre':'Mujer';?></strong></h6>
							<div class="input-field">
                  <select class="browser-default" name="sexo">
                    <option value="" selected>Seleccione el sexo.</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                  </select>
              </div>
              <br>
              <div class="input-field top-space-medium">Fecha de nacimiento: <?php echo $getinformation->fechanac_alumno;?>
							<div class="input-field top-space-medium">
							  <input type="date" name="fecha_nacimiento" class="validate" >
							</div>
						<div class="input-field">
              <select class="browser-default">
                <option value="" selected>Seleccione el estatus.</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
            </div>

            <div class="file-field input-field">
              <div class="btn">
                <span><i class="material-icons">image</i></span>
                <input type="file" name="image">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" >
              </div>
            </div>

						<div class="card-action" style="border-top: 0px !important;">
							<div class="row center-align">
								<div class="col l6 m6 s12"><button name="enviar" type="submit" class="waves-effect waves-light btn blue margin-bottom">Enviar</button></div>
								<div class="col l6 m6 s12"><button type="reset" class="waves-effect waves-orange btn-flat">Cancelar</button></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col l12 m12 s12">
				<form>
					<div class="card  pink darken-4">
						<div class="card-content grey-text text-lighten-2">
							<span class="card-title center-align"><strong>Modificación de contraseña</strong></span>

							<div class="row">
								<div class="col l4 m4 s12">
								<div class= "input-field">
								<input type="text" name="nombre" class="validate"  >
								<label>Contraseña anterior</label>
								</div>
							</div>
							<div class="col l4 m4 s12">
								<div class= "input-field">
								<input type="text" name="nombre" class="validate"  >
								<label>Nueva contraseña</label>
								</div>
							</div>
							<div class="col l4 m4 s12">
								<div class= "input-field">
								<input type="text" name="nombre" class="validate"  >
								<label>Confirmar contraseña</label>
								</div>
							</div>
							</div>


						<div class="card-action" style="border-top: 0px !important;">
							<div class="row center-align">
								<div class="col l6 m6 s12"><a class="waves-effect waves-light btn orange margin-bottom">Enviar</a></div>
								<div class="col l6 m6 s12"><a class="waves-effect waves-orange btn-flat">Cancelar</a></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

<main>
<?php include "../includes/footer.php"; ?>
</body>
</html>
