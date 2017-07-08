<?php
require_once("../classes/Config.php");
require_once("../classes/Resources.php");
require_once("../classes/Permission.php");
require_once("../classes/Student.php");
require_once("../classes/Project.php");

$permission = new Permission();
$permission->IsStudent();

$student = new Student();
$student->Set("user_name", $_SESSION['user_name']);
$getinformation = $student->GetInformation();
$permission->Set("matricula", $getinformation->matricula_alumno);
$permission->CanCreateProject();
$resources = new Resources();
$getdegrees = $resources->GetDegrees();

$conexion = $student->Conexion();


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../includes/head.php");
    // show negative messages
    if ($project->errors) {
      foreach ($project->errors as $error) { ?>
        <script type="text/javascript">
            $(document).ready(function(){
              $('.tooltipped').tooltip({delay: 50});
               Materialize.toast('<?php  echo $error;  ?>', 4000);
            });
        </script>
    <?php }
    }
    // show positive messages
    if ($project->messages) {
       foreach ($project->messages as $message) { ?>
         <script type="text/javascript">
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
            Materialize.toast('<?php  echo $message;  ?>', 4000);
          });
        </script>
    <?php }
    }
  ?>
</head>
<body>
	<?php include ("../includes/header.php"); ?>
	<main>
    <div class="row">
			<div class="col l12 m12 s12">
				<form>
					<div class="card">
						<div class="card-content blue-grey-text text-darken-3">
							<span class="card-title center-align"><strong>Datos del proyecto</strong></span>
              <p class="center-align pink-text text-500">Llenar todos los cambios</p>
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
							      <option value="">Sexo</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							    </select>
							</div>
							<br>
							<label class="top-space-medium font-normal">Fecha de nacimiento</label>
							<div class="input-field top-space-medium">
								<input type="date" class="validate text-lighten-2">
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
								<div class="col l6 m6 s12"><a class="waves-effect waves-light btn blue margin-bottom">Enviar</a></div>
								<div class="col l6 m6 s12"><a class="waves-effect blue-grey-text text-darken-4 btn-flat">Cancelar</a></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>
	<?php include "../includes/footer.php"; ?>
</body>
</html>
