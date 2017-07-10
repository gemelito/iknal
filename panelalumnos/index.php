<?php
	require_once("classes/Config.php");
	require_once("classes/Resources.php");
	require_once("classes/Permission.php");
	require_once("classes/Student.php");
	require_once("classes/Project.php");
	$permission = new Permission();
	$permission->IsStudent();

	$resources = new Resources();
	$getdegrees = $resources->GetDegrees();
	$student = new Student();
	$student->Set("user_name", $_SESSION['user_name']);
	$getinformation = $student->GetInformation();
	$conexion = $student->Conexion();

	$project = new Project();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Panel Alumno</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#7cb342">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/icons.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
</head>
<body>
	<?php include "header.php"; ?>
	<main>
		<?php include "formatos.php"; ?>
	</main>
	<?php include "footer.php"; ?>
</body>
</html>
