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
$resources = new Resources();
$getdegrees = $resources->GetDegrees();

$conexion = $student->Conexion();

$project = new Project();
$project->Set("matricula", $getinformation->matricula_alumno);
$getproject = $project->GetProject();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php
		include("../includes/head.php");
		if (isset($_GET['error'])) { ?>
		  <script type="text/javascript">
		   $(document).ready(function(){
		     $('.tooltipped').tooltip({delay: 50});
		     Materialize.toast('No se puede crear el proyecto', 4000);
		   });
		 </script>
		<?php }
	?>
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
		      		<?php
								if($conexion->GetRowTotal($getproject) > 0){ ?>
									<a href="edit.php" class="waves-effect waves-green btn blue"><i class="material-icons left">mode_edit</i>proyecto</a>
							<?php }else{ ?>
									<a href="new.php" class="waves-effect waves-green btn blue"><i class="material-icons left">add</i> <span>proyecto</span></a>
							<?php } ?>
		        </div>
		        <table class="table highlight centered responsive-table top-space">
							<thead>
								<tr>
									<th>Proyecto</th>
									<th>Director</th>
									<th>Area de desarrollo</th>
									<th>Tipo</th>
									<th>Equipo de trabajo</th>
									<th>Verano</th>
									<th>Comunidad</th>
								</tr>
							</thead>
							<tbody>
								<?php while($project = $conexion::RunArray($getproject)){ ?>
									<tr>
										<td><?php echo $project['titulo_proyecto']; ?></td>
										<td><?php echo (!empty($project['nombre_profesor'])) ? $project['nombre_profesor'].' '.$project['apellidop_profesor'].' '.$project['apellidom_profesor'] : 'Llenar comite' ; ?></td>
										<td><?php echo $project['areadesarrollo_proyecto']; ?></td>
										<td><?php echo (!empty($project['tipo_proyecto'])) ? $project['tipo_proyecto'] : 'Ninguno' ; ?></td>
										<td><?php echo (!empty($project['equipo_proyecto'])) ? $project['equipo_proyecto'] : 'Ninguno' ; ?></td>
										<td><?php echo $project['verano_proyecto']; ?></td>
										<td><?php echo $project['localidad'],' ',$project['municipio_localidad'],' ',$project['estado_localidad']; ?></td>

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
