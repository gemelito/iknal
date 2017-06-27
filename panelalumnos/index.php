<?php
	require_once("classes/Config.php");
	require_once("classes/Permission.php");
	require_once("classes/Student.php");
	require_once("classes/Project.php");
	$permission = new Permission();
	$permission->IsStudent();
	$student = new Student();
	$student->Set("user_name", $_SESSION['user_name']);
	$getinformation = $student->GetInformation();
	$getdegrees = $student->GetDegrees();
	$conexion = $student->Conexion();

	$project = new Project();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Panel Alumno</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/icons.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</head>
<body>
	<?php echo $getinformation->nombre_alumno; ?>
	<?php include "header.php"; ?>
	<main>
		<?php include "cards.php"; ?>
	</main>
	<?php include "footer.php"; ?>
</body>
</html>