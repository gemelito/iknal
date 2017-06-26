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
	$projects = $student->ShowProjects();
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
		              			<span class="card-title text-400">Resultado de la busqueda</span>
		              			<span class="text-300">Total de resultados encontrados 65</span>
		              		</div>
		              		<div class="col l3 m4 s12">
		              			<form>
							        <div class="input-field">
							          <input id="search" type="search" class="blue-grey darken-4" required>
							          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
							          
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
										<th scope="row">1</th>
										<td>Iknal</td>
										<td>Alicia</td>
										<td>Finalizado</td>
										<td>4</td>
										<td>José María Morelos</td>
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