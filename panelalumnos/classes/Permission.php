<?php

	class Permission
	{
		private $db;

		private $matricula;
		public $errors = array();
		public $messages = array();

		public function __construct()
		{
			session_start();
			isset($_SESSION['user_name']) ? '' : header('location: ../index.php');
		}

		public function Set($field, $content)
		{
			$this->$field = $content;
		}

		public function IsAdmin()
		{
			($_SESSION['user_level'] == 1) ? '' : header('localtion: ../index.php');
		}

		public function IsTeacher()
		{
			($_SESSION['user_level'] == 2) ? '' : header('localtion: ../index.php');
		}

		public function IsStudent()
		{
			($_SESSION['user_level'] == 3) ? '' : header('localtion: ../index.php');
		}

		public function CanCreateProject()
		{
			$query = "SELECT proyecto.*, carrera.*, alumno.*, localidad.* FROM proyecto
					INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
					WHERE proyecto.matricula = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			$this->errors[] = (!$result) ? 'No puedes crear otro project' : '';
		}
	}
?>
