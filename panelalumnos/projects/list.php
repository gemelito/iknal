<?php
	require_once("../classes/Config.php");
	require_once("../classes/Permission.php");
	require_once("../classes/Student.php");
	$permission = new Permission();
	$permission->IsStudent();

	$student = new Student();
	$getdegrees = $student->GetDegrees();
	$conexion = $student->Conexion();
	$student->Set("degree", $_GET['degree']);
	if(isset($_GET['search'])):
		$student->Set("titulo_proyecto", $_GET['search']);
		$projects = $student->SearchProjects();
	else:
		$projects = $student->ShowProjects();
	endif
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
		              			<span class="card-title text-400">Proyectos</span>
		              			<span class="text-300">Total proyectos: <?php echo $conexion::GetRowTotal($projects);?></span>
		              		</div>
		              		<div class="col l3 m4 s12">
		              			<form action="list.php" method="GET">
							        <div class="input-field">
							          <input id="search" type="search" name="search" class="blue-grey darken-4" required>
							          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
							          <input type="hidden" name="degree" value="<?php echo $_GET['degree']; ?>">
							        </div>
							    </form>
		              		</div>
		              	</div>
		              	<table class="table highlight centered responsive-table top-space">
							<thead>
								<tr>
									<th>#</th>
									<th>Proyecto</th>
									<th>Alumno</th>
									<th>Estatus del verano</th>
									<th>Verano</th>
									<th>Comunidad</th>
								</tr>
							</thead>
							<tbody>
								<?php while($project = $conexion::RunArray($projects)){ ?>
									<tr>
										<th scope="row"><?php echo $project['id_proyecto']; ?></th>
										<td><?php echo $project['titulo_proyecto']; ?></td>
										<td><?php echo $project['nombre_alumno']; $project['apellidop_alumno']; ?></td>
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