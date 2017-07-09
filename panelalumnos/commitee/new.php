
<?php
	require_once("../classes/Config.php");
	require_once("../classes/Resources.php");
	require_once("../classes/Permission.php");
	require_once("../classes/Student.php");

	$permission = new Permission();
	$permission->IsStudent();

	$student = new Student();
	$student->Set("user_name", $_SESSION['user_name']);
	$getinformation = $student->GetInformation();

	$student->Set("matricula", $getinformation->matricula_alumno);

	$showmanager = $student->ShowManager($getinformation->matricula_alumno);
	$showadviser_1 = $student->ShowAdviser_1($getinformation->matricula_alumno);
	$showadviser_2 = $student->ShowAdviser_2($getinformation->matricula_alumno);
	$showadviser_3 = $student->ShowAdviser_3($getinformation->matricula_alumno);
	$showalternate = $student->ShowAlternate($getinformation->matricula_alumno);

	$conexion = $student->Conexion();

	$resources = new Resources();
	$getdegrees = $resources->GetDegrees();
	$getmanager = $resources->GetTeacher();
	$getadviser_1 = $resources->GetTeacher();
	$getadviser_2 = $resources->GetTeacher();
	$getadviser_3 = $resources->GetTeacher();
	$getalternate = $resources->GetTeacher();
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../includes/head.php"); ?>
</head>
	<body>
		<?php include("../includes/header.php"); ?>
		<main>
			<div class="row">
				<div class="col l12 m12 s12">
					<form action="new.php" method="POST">
						<div class="card">
							<div class="card-content blue-grey-text text-darken-3">
								<span class="card-title center-align"><strong>Comité del proyecto</strong></span>
								<p class="center-align pink-text text-500">Llenar todos los cambios</p>

								<h6><strong>Director actual: <?php echo (!empty($showmanager->nombre_profesor)) ? $showmanager->nombre_profesor.' '.$showmanager->apellidop_profesor.' '.$showmanager->apellidom_profesor: 'No tienes director' ; ?></strong></h6>
								<div class="input-field">
									<select class="browser-default" required name="manager">
										<option value="" selected>Seleccione el director.</option>
										<?php while($manager = $conexion::RunArray($getmanager)){?>
										<option value="<?php echo $manager['id_profesor']?>"><?php echo $manager['nombre_profesor'],' ',$manager['apellidop_profesor'],' ',$manager['apellidom_profesor']; ?></option>
										<?php } ?>
									</select>
								</div>
								<br>

								<h6><strong>Asesor 1 actual: <?php echo (!empty($showadviser_1->nombre_profesor)) ? $showadviser_1->nombre_profesor.' '.$showadviser_1->apellidop_profesor.' '.$showadviser_1->apellidom_profesor : 'No tienes asesor 1' ; ?></strong></h6>
								<div class="input-field">
									<select class="browser-default" required name="adviser_1">
										<option value="" selected>Seleccione el director.</option>
										<?php while($adviser_1 = $conexion::RunArray($getadviser_1)){?>
										<option value="<?php echo $adviser_1['id_profesor']?>"><?php echo $adviser_1['nombre_profesor'],' ',$adviser_1['apellidop_profesor'],' ',$adviser_1['apellidom_profesor']; ?></option>
										<?php } ?>
									</select>
								</div>
								<br>

								<h6><strong>Asesor 2 actual: <?php echo (!empty($showadviser_2->nombre_profesor)) ? $showadviser_2->nombre_profesor.' '.$showadviser_2->apellidop_profesor.' '.$showadviser_2->apellidom_profesor: 'No tienes asesor 2' ; ?></strong></h6>
								<div class="input-field">
									<select class="browser-default" required name="adviser_2">
										<option value="" selected>Seleccione el director.</option>
										<?php while($adviser_2 = $conexion::RunArray($getadviser_2)){?>
										<option value="<?php echo $adviser_2['id_profesor']?>"><?php echo $adviser_2['nombre_profesor'],' ',$adviser_2['apellidop_profesor'],' ',$adviser_2['apellidom_profesor']; ?></option>
										<?php } ?>
									</select>
								</div>
								<br>

								<h6><strong>Asesor 3 actual: <?php echo (!empty($showadviser_3->nombre_profesor)) ? $showadviser_3->nombre_profesor.' '.$showadviser_3->apellidop_profesor.' '.$showadviser_3->apellidom_profesor: 'No tienes asesor 3' ; ?></strong></h6>
								<div class="input-field">
									<select class="browser-default" required name="adviser_3">
										<option value="" selected>Seleccione el director.</option>
										<?php while($adviser_3 = $conexion::RunArray($getadviser_3)){?>
										<option value="<?php echo $adviser_3['id_profesor']?>"><?php echo $adviser_3['nombre_profesor'],' ',$adviser_3['apellidop_profesor'],' ',$adviser_3['apellidom_profesor']; ?></option>
										<?php } ?>
									</select>
								</div>
								<br>

								<h6><strong>Suplente actual: <?php echo (!empty($showalternate->nombre_profesor)) ? $showalternate->nombre_profesor.' '.$showalternate->apellidop_profesor.' '.$showalternate->apellidom_profesor: 'No tienes suplente' ; ?></strong></h6>
								<div class="input-field">
									<select class="browser-default" required name="alternate">
										<option value="" selected>Seleccione el director.</option>
										<?php while($alternate = $conexion::RunArray($getalternate)){?>
										<option value="<?php echo $alternate['id_profesor']?>"><?php echo $alternate['nombre_profesor'],' ',$alternate['apellidop_profesor'],' ',$alternate['apellidom_profesor']; ?></option>
										<?php } ?>
									</select>
								</div>
								<br>
								<input type="hidden" name="matricula" id="Matricula" value="<?php echo $getinformation->matricula_alumno; ?>">
								<input type="hidden" name="last_name" id="Last_name" value="<?php echo $getinformation->apellidop_alumno; ?>">
								<input type="hidden" name="id" id="Id" value="<?php echo $getinformation->id_alumno; ?>">
							<div class="card-action" style="border-top: 0px !important;">
								<div class="row center-align">
									<div class="col l6 m6 s12"><button type="submit" name="enviar" value="commitee" class="waves-effect waves-light btn blue margin-bottom">Enviar</button></div>
									<div class="col l6 m6 s12"><button type="reset" class="waves-effect blue-grey-text text-darken-4 btn-flat">Cancelar</button></div>
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
