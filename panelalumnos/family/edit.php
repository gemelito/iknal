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
	if (isset($_GET['edit']) && isset($_GET['number']) && is_string($_GET['edit']) && is_string($_GET['number'])) {
		$family->Set("matricula", $getinformation->matricula_alumno);
		$family->Set("nombre", $_GET['edit']);
		$family->Set("id", $_GET['number']);
		$showfamily = $family->Read();
	}

	if (isset($_POST['enviar']) && !empty($_POST['enviar']) && $_POST['enviar'] == "family"
		&& isset($_POST['mode']) && !empty($_POST['mode']) && $_POST['mode'] == 'edit') {
		$family->Set("id", $_GET['number']);
		$family->Set("matricula", $getinformation->matricula_alumno);
		$family->Update();
		$family->Set("matricula", $getinformation->matricula_alumno);
		$family->Set("nombre", $_GET['edit']);
		$family->Set("id", $_GET['number']);
		$showfamily = $family->Read();
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
				<form action="edit.php?edit=<?php echo $showfamily->nombre; ?>&number=<?php echo $showfamily->Id_familia; ?>" method="POST">
					<div class="card">
						<div class="card-content blue-grey-text text-darken-3">
							<span class="card-title center-align"><strong>Datos del familiar</strong></span>
							<p class="center-align pink-text text-500">Llenar todos los cambios</p><br>
							<div class="row">
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate" value="<?php echo (!empty($showfamily->nombre)) ? $showfamily->nombre : 'No tiene nombre' ; ?>">
										<label>Nombre</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="apellido_paterno" class="validate" value="<?php echo (!empty($showfamily->apellido_paterno)) ? $showfamily->apellido_paterno : 'No tiene apellido paterno' ; ?>">
										<label>Apellido paterno</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="apellido_materno" class="validate" value="<?php echo (!empty($showfamily->apellido_materno)) ? $showfamily->apellido_materno : 'No tiene apellido materno' ; ?>">
										<label>Apellido materno</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="correo" class="validate" value="<?php echo (!empty($showfamily->correo)) ? $showfamily->correo : 'No tiene correo' ; ?>">
										<label>Correo</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="telefono" class="validate" value="<?php echo (!empty($showfamily->telefono)) ? $showfamily->telefono : 'No tiene telefono' ; ?>">
										<label>Telefono</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="profesion" class="validate" value="<?php echo (!empty($showfamily->profesion)) ? $showfamily->profesion : 'No tiene profesion' ; ?>">
										<label>Profesion</label>
									</div>
								</div>
								<div class="col l6 m6 s12 offset-l3 offset-m3 center-align">
									<label class="font-normal"><strong>Fecha de nacimiento: <?php echo (!empty($showfamily->nacimiento)) ? $showfamily->nacimiento : 'No tiene fecha de nacimiento' ; ?></strong></label>
									<div class="input-field">
										<input type="date" name="nacimiento" class="validate">
									</div>
								</div>
								<div class="col s12 center-align top-medium">
									<label class="font-normal"><strong>Parentesco actual: <?php echo (!empty($showfamily->kindred)) ? $showfamily->kindred : 'No tiene parentesco' ; ?></strong></label><br><br>
									<?php while($kindred = $conexion::RunArray($getkindreds)) {?>
										<input name="parentesco" type="radio" id="<?php echo $kindred['id_parentesco']; ?>" value="<?php echo $kindred['id_parentesco']; ?>" />
										<label for="<?php echo $kindred['id_parentesco']; ?>"><?php echo $kindred['parentesco']; ?></label>
									<?php } ?>
								</div>
							</div>
							<input type="hidden" name="mode" value="edit">
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
