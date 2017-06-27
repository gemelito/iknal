<?php
	require_once("../classes/Config.php");
	require_once("../classes/Permission.php");
	require_once("../classes/Student.php");
	$permission = new Permission();
	$permission->IsStudent();
	$persmission->CanCreateProject();

	$student = new Student();
	$getdegrees = $student->GetDegrees();
	$conexion = $student->Conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../includes/head.php"); ?>
</head>
<body>
	<?php include("../includes/header.php"); ?>
	<main>
		<div class="row">
			<div class="col l12 m12 s12">
				<form>
					<div class="card blue-grey darken-3">
						<div class="card-content grey-text text-lighten-2">
							<span class="card-title center-align"><strong>Datos personales</strong></span>
							<div class="input-field top-space-medium">
								<input type="text" class="validate">
								<label>Matricula</label>
							</div>
							<div class="row">
								<div class="col l4 m4 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
										<label>Nombre</label>
									</div>
								</div>
								<div class="col l4 m4 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
										<label>Apellido paterno</label>
									</div>
								</div>
								<div class="col l4 m4 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
										<label>Apellido materno</label>
									</div>
								</div>
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Estado del alumno</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Originario</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Semestre</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Generacion</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Carrera</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							</div>
							<div class="input-field top-space-medium">
								<input type="text" class="validate">
								<label>Telefono</label>
							</div>
							<div class="input-field top-space-medium">
								<input type="text" class="validate">
								<label>Capacidad diferente</label>
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Sexo</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							    </select>
							</div>
							<br>
							<label class="top-space-medium">Fecha de nacimiento</label>
							<div class="input-field top-space-medium">
								<input type="date" class="validate text-lighten-2" style="color: white !important;">
							</div>
							<div class="input-field">
							    <select class="browser-default">
							      <option value="">Estatus</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							    </select>
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
		<div class="row">
			<div class="col l12 m12 s12">
				<form>
					<div class="card blue-grey darken-3">
						<div class="card-content grey-text text-lighten-2">
							<span class="card-title center-align"><strong>Modificación de contraseña</strong></span>
							<div class="row">
								<div class="col l4 m4 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
										<label>Contraseña anterior</label>
									</div>
								</div>
								<div class="col l4 m4 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
										<label>Nueva contraseña</label>
									</div>
								</div>
								<div class="col l4 m4 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
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
	</main>
	<?php include ("../includes/footer.php"); ?>
</body>
</html>
