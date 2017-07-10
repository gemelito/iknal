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

	$family = new Family();
	$family->Set("matricula", $getinformation->matricula_alumno);
	$getfamily = $family->GetFamily();
	$conexion = $student->Conexion();

	if (isset($_GET['delete']) && is_string($_GET['number'])) {
		$family->Set("matricula", $getinformation->matricula_alumno);
		$family->Set("id", $_GET['number']);
		$family->Delete();

		$family->Set("matricula", $getinformation->matricula_alumno);
		$getfamily = $family->GetFamily();

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
			<div  class="col l12 m13 s12">
				<div  class="">
					<div class="">
						<div class="row"><br>
							<div class="col l6 m6 s12">
								<a href="new.php" class="waves-effect waves-green btn blue"><i class="material-icons left">add</i> <span>familia</span></a>
							</div>
						</div>
						<ul class="collapsible popout blue-grey-text text-darken-3" data-collapsible="accordion">
							<?php if (!empty($getfamily)){ ?>
								<?php while ($familia = $conexion::RunArray($getfamily)){ ?>
									<li>
										<div class="collapsible-header"><i class="material-icons">person</i> <?php echo $familia['kindred']; ?></div>
										<div class="collapsible-body white">
											<div class="row no-margin">
												<div class="col l6 m6 s12">
													<span>
														Nombre: <?php echo $familia['nombre'],' ',$familia['apellido_paterno'],' ',$familia['apellido_materno']; ?>
													</span>											
												</div>
												<div class="col l6 m6 s12">
													<span>Telefono: <?php echo  $familia['telefono']; ?></span>											
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Correo: <?php echo  $familia['correo']; ?></span>											
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Profesion: <?php echo $familia['profesion']; ?></span>			
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Fecha de nacimiento: <?php echo  $familia['nacimiento']; ?></span>			
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>
														<a href="edit.php?edit=<?php echo $familia['nombre']?>&number=<?php echo $familia['Id_familia']; ?>&last_name=<?php echo $familia['apellido_materno'];?>&first_name=last_name=<?php echo $familia['apellido_paterno'];?>&date=<?php echo $familia['nacimiento'];?>" class="waves-effect waves-green btn blue"><i class="material-icons">mode_edit</i></a>
														<a href="my.php?delete=<?php echo $familia['nombre']?>&number=<?php echo $familia['Id_familia']; ?>&last_name=<?php echo $familia['apellido_materno'];?>&first_name=last_name=<?php echo $familia['apellido_paterno'];?>&date=<?php echo $familia['nacimiento'];?>" class="waves-effect waves-green btn blue"><i class="material-icons">delete</i></a>
													</span>			
												</div>
											</div>
										</div>
									</li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
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
