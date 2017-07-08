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
$conexion = $student->Conexion();

$resources = new Resources();
$getdegrees = $resources->GetDegrees();
$getlocations = $resources->GetLocations();

$project = new Project();

if(isset($_POST['enviar'])){
  $project->Set("titulo", $_POST['titulo']);
  $project->Set("tipo", $_POST['tipo']);
  $project->Set("area", $_POST['area']);
  $project->Set("estado", $_POST['estado']);
  $project->Set("verano", $_POST['verano']);
  $project->Set("localidad", $_POST['localidad']);
  $project->Set("equipo", $_POST['equipo']);
  $project->Set("matricula", $getinformation->matricula_alumno);
  $project->Update();
}

$project->Set("matricula", $getinformation->matricula_alumno);
$getproject = $project->GetEdit();




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
				<form action="edit.php" method="POST">
					<div class="card">
						<div class="card-content blue-grey-text text-darken-3">
							<span class="card-title center-align"><strong>Datos del proyecto</strong></span>
              <p class="center-align pink-text text-500">Llenar todos los cambios</p><br>
							<div class="row">
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="titulo" class="validate" value="<?php echo $getproject->titulo_proyecto; ?>">
										<label>Titulo</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="tipo" class="validate" value="<?php echo $getproject->tipo_proyecto; ?>">
										<label>Tipo de proyecto</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="area" class="validate" value="<?php echo $getproject->areadesarrollo_proyecto; ?>">
										<label>Area de desarrollo</label>
									</div>
								</div>
                <div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="estado" class="validate" value="<?php echo $getproject->estado_proyecto; ?>">
										<label>estado del proyecto</label>
									</div>
								</div>
                <div class="col l4 m6 s12">
									<div class="input-field">
										<input type="number" name="verano" class="validate" value="<?php echo $getproject->verano_proyecto;?>">
										<label>Verano</label>
									</div>
								</div>
                <div class="col l4 m6 s12">
                  <div class="input-field">
                    <select class="browser-default" name="localidad" >
                      <option value="" selected>Seleccione el origen.</option>
                      <?php while($localidad = $conexion::RunArray($getlocations)){?>
                        <option value="<?php echo $localidad['id_localidad']?>"><?php echo $localidad['localidad'],', ',$localidad['municipio_localidad'],', ',$localidad['estado_localidad']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <br>
                </div>
                <div class="input-field col s12">
                  <textarea id="textarea1" class="materialize-textarea" name="equipo" placeholder="<?php echo $getproject->equipo_proyecto; ?>"></textarea>
                  <label for="textarea1">Equipo de proyecto</label>
                </div>
							</div>
						<div class="card-action" style="border-top: 0px !important;">
							<div class="row center-align">
								<div class="col l6 m6 s12"><button type="submit" name="enviar" class="waves-effect waves-light btn blue margin-bottom">Enviar</button></div>
								<div class="col l6 m6 s12"><button type="reset" name="cancelar" class="waves-effect blue-grey-text text-darken-4 btn-flat">Cancelar</button></div>
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
