<?php
	require_once("../classes/Config.php");
	require_once("../classes/Resources.php");
	require_once("../classes/Permission.php");
	require_once("../classes/Student.php");
	require_once("../classes/Family.php");
	$permission = new Permission();
	$permission->IsStudent();

	$student = new Student();
	$student->Set("user_name", $_SESSION['user_name']);
	$getinformation = $student->GetInformation();

	$resources = new Resources();
	$getdegrees = $resources->GetDegrees();
	$getkindreds = $resources->GetKindreds();
	$conexion = $student->Conexion();

	$family = new Family();
	if (isset($_POST['enviar']) && !empty($_POST['enviar']) && $_POST['enviar'] == "family") {
		$family->Set("matricula", $getinformation->matricula_alumno);
		$family->Create();
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../includes/head.php"); ?>
</head>
<body>
	<?php include ("../includes/header.php"); ?>
	<main>
		<div class="row">
			<div class="col l12 m12 s12">
				<form action="new.php" method="POST">
					<div class="card">
						<div class="card-content blue-grey-text text-darken-3">
							<span class="card-title center-align"><strong>Datos del familiar</strong></span>
							<p class="center-align pink-text text-500">Llenar todos los cambios</p><br>
							<div class="row">
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate">
										<label>Nombre</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="apellido_paterno" class="validate">
										<label>Apellido paterno</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="apellido_materno" class="validate">
										<label>Apellido materno</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="correo" class="validate">
										<label>Correo</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="telefono" class="validate">
										<label>Telefono</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="profesion" class="validate">
										<label>Profesion</label>
									</div>
								</div>
								<div class="col l6 m6 s12 offset-l3 offset-m3 center-align">
									<label >Fecha nacimiento</label>
									<div class="input-field">
										<input type="date" name="nacimiento" class="validate">
									</div>
								</div>
								<div class="col s12 center-align top-medium margin-top-combox">
									<?php while($kindred = $conexion::RunArray($getkindreds)) {?>
										<input name="parentesco" type="radio" id="<?php echo $kindred['id_parentesco']; ?>" value="<?php echo $kindred['id_parentesco']; ?>" />
										<label for="<?php echo $kindred['id_parentesco']; ?>"><?php echo $kindred['parentesco']; ?></label>
									<?php } ?>
								</div>
							</div>
						<div class="card-action top-space" style="border-top: 0px !important;">
							<div class="row center-align">
								<div class="col l6 m6 s12"><button type="submit" name="enviar" value="family" class="waves-effect waves-light btn blue margin-bottom">Enviar</button></div>
								<div class="col l6 m6 s12"><button type="reset" name="cancelar" class="waves-effect blue-grey-text text-darken-4 btn-flat">Cancelar</button></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>
	<?php include "../includes/footer.php"; ?>
	<?php
		// show negative messages
		if ($family->errors) {
		  foreach ($family->errors as $error) { ?>
		    <script type="text/javascript">
		        $(document).ready(function(){
		          $('.tooltipped').tooltip({delay: 50});
		           Materialize.toast('<?php  echo $error;  ?>', 4000);
		        });
		    </script>
		<?php }
		}
		// show positive messages
		if ($family->messages) {
		   foreach ($family->messages as $message) { ?>
		     <script type="text/javascript">
		      $(document).ready(function(){
		        $('.tooltipped').tooltip({delay: 50});
		        Materialize.toast('<?php  echo $message;  ?>', 4000);
		      });
		    </script>
		<?php }
		}
		?>
</body>
</html>
