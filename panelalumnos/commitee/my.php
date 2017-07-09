
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
	$resources = new Resources();
	$getdegrees = $resources->GetDegrees();

	$conexion = $student->Conexion();

	$showmanager = $student->ShowManager($getinformation->matricula_alumno);
	$showadviser_1 = $student->ShowAdviser_1($getinformation->matricula_alumno);
	$showadviser_2 = $student->ShowAdviser_2($getinformation->matricula_alumno);
	$showadviser_3 = $student->ShowAdviser_3($getinformation->matricula_alumno);
	$showalternate = $student->ShowAlternate($getinformation->matricula_alumno);

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
			<div  class="col l12 m13 s12">
				<div  class="">
					<div class="">
						<div class="row"><br>
							<div class="col l6 m6 s12">
								<?php
									if(!empty($showmanager->nombre_profesor)){ ?>
										<a href="new.php" class="waves-effect waves-green btn blue"><i class="material-icons left">mode_edit</i> comité</a>
								<?php }else{ ?>
									<a href="new.php" class="waves-effect waves-green btn blue"><i class="material-icons left">add</i> <span>comité</span></a>
								<?php } ?>
							</div>
						</div>
						<ul class="collapsible popout blue-grey-text text-darken-3" data-collapsible="accordion">
							<?php if (!empty($showmanager->nombre_profesor)){ ?>
								<li>
									<div class="collapsible-header"><i class="material-icons">person</i> Director</div>
									<div class="collapsible-body white">
										<div class="row no-margin">
											<div class="col l6 m6 s12">
												<span>
													Nombre: <?php echo $showmanager->nombre_profesor,' ',$showmanager->apellidop_profesor,' ', $showmanager->apellidom_profesor; ?>
												</span>											
											</div>
											<div class="col l6 m6 s12">
												<span>Telefono: <?php echo $showmanager->telefono_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Correo: <?php echo $showmanager->correo_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Ubicacion Uimqroo: <?php echo $showmanager->ubicacion_profesor; ?></span>									
											</div>
										</div>
									</div>
								</li>
							<?php } ?>
							<?php if (!empty($showadviser_1->nombre_profesor)){ ?>
								<li>
									<div class="collapsible-header"><i class="material-icons">person</i> Asesor 1</div>
									<div class="collapsible-body white">
										<div class="row no-margin">
											<div class="col l6 m6 s12">
												<span>
													Nombre: <?php echo $showadviser_1->nombre_profesor,' ',$showadviser_1->apellidop_profesor,' ', $showadviser_1->apellidom_profesor; ?>
												</span>											
											</div>
											<div class="col l6 m6 s12">
												<span>Telefono: <?php echo $showadviser_1->telefono_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Correo: <?php echo $showadviser_1->correo_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Ubicacion Uimqroo: <?php echo $showadviser_1->ubicacion_profesor; ?></span>									
											</div>
										</div>
									</div>
								</li>
							<?php } ?>
							<?php if (!empty($showadviser_2->nombre_profesor)){ ?>
								<li>
									<div class="collapsible-header"><i class="material-icons">person</i> Asesor 2</div>
									<div class="collapsible-body white">
										<div class="row no-margin">
											<div class="col l6 m6 s12">
												<span>
													Nombre: <?php echo $showadviser_2->nombre_profesor,' ',$showadviser_2->apellidop_profesor,' ', $showadviser_2->apellidom_profesor; ?>
												</span>											
											</div>
											<div class="col l6 m6 s12">
												<span>Telefono: <?php echo $showadviser_2->telefono_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Correo: <?php echo $showadviser_2->correo_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Ubicacion Uimqroo: <?php echo $showadviser_2->ubicacion_profesor; ?></span>									
											</div>
										</div>
									</div>
								</li>
							<?php } ?>
							<?php if (!empty($showadviser_3->nombre_profesor)){ ?>
								<li>
									<div class="collapsible-header"><i class="material-icons">person</i> Asesor 3</div>
									<div class="collapsible-body white">
										<div class="row no-margin">
											<div class="col l6 m6 s12">
												<span>
													Nombre: <?php echo $showadviser_3->nombre_profesor,' ',$showadviser_3->apellidop_profesor,' ', $showadviser_3->apellidom_profesor; ?>
												</span>											
											</div>
											<div class="col l6 m6 s12">
												<span>Telefono: <?php echo $showadviser_3->telefono_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Correo: <?php echo $showadviser_3->correo_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Ubicacion Uimqroo: <?php echo $showadviser_3->ubicacion_profesor; ?></span>									
											</div>
										</div>
									</div>
								</li>
							<?php } ?>
							<?php if (!empty($showalternate->nombre_profesor)){ ?>
								<li>
									<div class="collapsible-header"><i class="material-icons">person</i> Suplente</div>
									<div class="collapsible-body white">
										<div class="row no-margin">
											<div class="col l6 m6 s12">
												<span>
													Nombre: <?php echo $showalternate->nombre_profesor,' ',$showalternate->apellidop_profesor,' ', $showalternate->apellidom_profesor; ?>
												</span>											
											</div>
											<div class="col l6 m6 s12">
												<span>Telefono: <?php echo $showalternate->telefono_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Correo: <?php echo $showalternate->correo_profesor; ?></span>											
											</div>
											<div class="col l6 m6 s12 top-space">
												<span>Ubicacion Uimqroo: <?php echo $showalternate->ubicacion_profesor; ?></span>									
											</div>
										</div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include "../includes/footer.php"; ?>
</body>
</html>
