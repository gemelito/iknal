<?php
	require_once("../classes/Config.php");
	require_once("../classes/Resources.php");
	require_once("../classes/Permission.php");
	require_once("../classes/Student.php");
	require_once("../classes/Friend.php");
	$permission = new Permission();
	$permission->IsStudent();

	$student = new Student();
	$student->Set("user_name", $_SESSION['user_name']);
	$getinformation = $student->GetInformation();

	$resources = new Resources();
	$getdegrees = $resources->GetDegrees();
	$conexion = $student->Conexion();

	$friend = new Friend();
	if (isset($_GET['edit']) && isset($_GET['number']) && is_string($_GET['edit']) && is_string($_GET['number'])) {
		$friend->Set("matricula", $getinformation->matricula_alumno);
		$friend->Set("nombre", $_GET['edit']);
		$friend->Set("id", $_GET['number']);
		$showfriend = $friend->Read();
	}

	if (isset($_POST['enviar']) && !empty($_POST['enviar']) && $_POST['enviar'] == "friend"
		&& isset($_POST['mode']) && !empty($_POST['mode']) && $_POST['mode'] == 'edit') {
		$friend->Set("id", $_GET['number']);
		$friend->Set("matricula", $getinformation->matricula_alumno);
		$friend->Update();
		$friend->Set("matricula", $getinformation->matricula_alumno);
		$friend->Set("nombre", $_GET['edit']);
		$friend->Set("id", $_GET['number']);
		$showfriend = $friend->Read();
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
				<form action="edit.php?edit=<?php echo $showfriend->nombre_amigo; ?>&number=<?php echo $showfriend->Id_amigo; ?>" method="POST">
					<div class="card">
						<div class="card-content blue-grey-text text-darken-3">
							<span class="card-title center-align"><strong>Datos del Amigo</strong></span>
							<p class="center-align pink-text text-500">Llenar todos los cambios</p><br>
							<div class="row">
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="nombre" class="validate" value="<?php echo (!empty($showfriend->nombre_amigo)) ? $showfriend->nombre_amigo : 'No tiene nombre' ; ?>" required>
										<label>Nombre</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="apellidop" class="validate" value="<?php echo (!empty($showfriend->apellidop_amigo)) ? $showfriend->apellidop_amigo : 'No tiene apellido paterno' ; ?>" required>
										<label>Apellido paterno</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="apellidom" class="validate" value="<?php echo (!empty($showfriend->apellidom_amigo)) ? $showfriend->apellidom_amigo : 'No tiene apellido materno' ; ?>" required>
										<label>Apellido materno</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="tipo" class="validate" value="<?php echo (!empty($showfriend->tipodeamigo)) ? $showfriend->tipodeamigo : 'No tiene tipo' ; ?>" required>
										<label>Tipo amigo</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="text" name="tutor_amigo" class="validate" value="<?php echo (!empty($showfriend->tutor_amigo)) ? $showfriend->tutor_amigo : 'No tiene tutor' ; ?>" required>
										<label>Tutor amigo</label>
									</div>
								</div>
								<div class="col l4 m6 s12">
									<div class="input-field">
										<input type="number" name="amistadanios" class="validate" value="<?php echo (!empty($showfriend->amistadanios)) ? $showfriend->amistadanios : 'No tiene años' ; ?>" required>
										<label>Años de amistad</label>
									</div>
								</div>
								<div class="col l6 m6 s12">
									<div class="input-field">
										<input type="text" name="telefono" class="validate" value="<?php echo (!empty($showfriend->telefono)) ? $showfriend->telefono : 'No tiene nombre' ; ?>" required>
										<label>Telefono</label>
									</div>
								</div>
								<div class="col l6 m6 s12">
									<div class="input-field">
										<input type="text" name="direccion" class="validate" value="<?php echo (!empty($showfriend->direccion)) ? $showfriend->direccion : 'No tiene direccion' ; ?>" required>
										<label>Dirección</label>
									</div>
								</div>
								<div class="col l12 m12 s12">
									<div class="input-field">
											<textarea id="textarea1" name="opinion" class="materialize-textarea" rows="5" placeholder="<?php echo (!empty($showfriend->opinion)) ? $showfriend->opinion : 'No tiene opinion' ; ?>" required></textarea>
										<label>Opinion</label>
									</div>
								</div>
							</div>
							<input type="hidden" name="mode" value="edit">
						<div class="card-action top-space" style="border-top: 0px !important;">
							<div class="row center-align">
								<div class="col l6 m6 s12"><button type="submit" name="enviar" value="friend" class="waves-effect waves-light btn blue margin-bottom">Enviar</button></div>
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
		if ($friend->errors) {
		  foreach ($friend->errors as $error) { ?>
		    <script type="text/javascript">
		        $(document).ready(function(){
		          $('.tooltipped').tooltip({delay: 50});
		           Materialize.toast('<?php  echo $error;  ?>', 4000);
		        });
		    </script>
		<?php }
		}
		// show positive messages
		if ($friend->messages) {
		   foreach ($friend->messages as $message) { ?>
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
