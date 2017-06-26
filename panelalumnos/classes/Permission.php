<?php

	class Permission
	{
		private $db;

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
	}
?>