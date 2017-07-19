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

	$friend = new Friend();
	$friend->Set("matricula", $getinformation->matricula_alumno);
	$getfriend = $friend->GetFriend();
	$conexion = $student->Conexion();

	if (isset($_GET['delete']) && is_string($_GET['number'])) {
		$friend->Set("matricula", $getinformation->matricula_alumno);
		$friend->Set("id", $_GET['number']);
		$friend->Delete();

		$friend->Set("matricula", $getinformation->matricula_alumno);
		$getfriend = $friend->GetFriend();

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
								<a href="new.php" class="waves-effect waves-green btn blue"><i class="material-icons left">add</i> <span>Amigo</span></a>
							</div>
						</div>
						<ul class="collapsible popout blue-grey-text text-darken-3" data-collapsible="accordion">
							<?php if (!empty($getfriend)){ ?>
								<?php while ($friends = $conexion::RunArray($getfriend)){ ?>
									<li>
										<div class="collapsible-header"><i class="material-icons">person</i> <?php echo $friends['nombre_amigo']; ?></div>
										<div class="collapsible-body white">
											<div class="row no-margin">
												<div class="col l6 m6 s12">
													<span>
														Nombre: <?php echo $friends['nombre_amigo'],' ',$friends['apellidop_amigo'],' ',$friends['apellidom_amigo']; ?>
													</span>
												</div>
												<div class="col l6 m6 s12">
													<span>Telefono: <?php echo  $friends['telefono']; ?></span>
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Tipo amigo: <?php echo  $friends['tipodeamigo']; ?></span>
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Años de amistad: <?php echo  $friends['amistadanios']; ?></span>
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Dirección: <?php echo $friends['direccion']; ?></span>
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>Opinion: <?php echo  $friends['opinion']; ?></span>
												</div>
												<div class="col l6 m6 s12 top-space">
													<span>
														<a href="edit.php?edit=<?php echo $friends['nombre_amigo']?>&number=<?php echo $friends['Id_amigo']; ?>&last_name=<?php echo $friends['apellidom_amigo'];?>&first_name=last_name=<?php echo $friends['apellidop_amigo'];?>" class="waves-effect waves-green btn blue"><i class="material-icons">mode_edit</i></a>
														<a href="my.php?delete=<?php echo $friends['nombre_amigo']?>&number=<?php echo $friends['Id_amigo']; ?>&last_name=<?php echo $friends['apellidom_amigo'];?>&first_name=last_name=<?php echo $friends['apellidop_amigo'];?>" class="waves-effect waves-green btn blue"><i class="material-icons">delete</i></a>
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
