<?php

	class Permission
	{
		private $db;

		public $errors = array();
		public $messages = array();

		public function __construct()
		{
			session_start();
			$this->db = $this->Conexion();
		}

		public function Conexion(){
			return new Config();
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
			$_SESSION['user_level'] == 3 ? '' : header('localtion: ../index.php');
		}
	}
?>