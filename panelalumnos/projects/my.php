<?php
	require_once("../classes/Config.php");
	require_once("../classes/Permission.php");
	require_once("../classes/Student.php");
	$permission = new Permission();
	$permission->IsStudent();

	$student = new Student();
	$student->Set("user_name", $_SESSION['user_name']);
	$getinformation = $student->GetInformation();
	$conexion = $student->Conexion();
	$getdegrees = $student->GetDegrees();
	$student->Set("enrollment", $getinformation->matricula_alumno);
	$myproject = $student->GetProject();
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
				<div class="card">
		            <div class="card-content grey-text text-darken-3">
		              	<div class="row">
		              		<div class="col l9 m8 s12">
		              			<span class="card-title text-400">Mi Proyecto</span>
		              		</div>
		              		<
		              	</div>
		              	<table class="table highlight centered responsive-table top-space">
							<thead>
								<tr>
									<th>#</th>
									<th>Proyecto</th>
									<th>Estatus del verano</th>
									<th>Verano</th>
									<th>Comunidad</th>
								</tr>
							</thead>
							<tbody>
								<?php while($project = $conexion::RunArray($myproject)){ ?>
									<tr>
										<th scope="row"><?php echo $project['id_proyecto']; ?></th>
										<td><?php echo $project['titulo_proyecto']; ?></td>
										<td><?php echo $project['estado_proyecto']; ?></td>
										<td><?php echo $project['verano_proyecto']; ?></td>
										<td><?php echo $project['municipio_localidad']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
		            </div>
		        </div>
			</div>
		</div>
	</main>
	<?php include "../includes/footer.php"; ?>
</body>
</html>