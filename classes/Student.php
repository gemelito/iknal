<?php

	class Student
	{
		private $db;

		public function __construct(){
			$this->db = $this->Conexion();
		}

		public function Conexion(){
			return new Config();
		}

		public function GET()
		{
			$query = "SELECT alumno.*, users.* FROM alumno
					INNER JOIN users ON users.Id_alumn = alumno.id_alumno
					WHERE users.user_name = '$this->user_name' ";
			$result = $this->db->QueryReturn();
			return $result;
			$this->db->CloseConexion();
		}

		public function GetDegrees()
		{
			$query = "SELECT * FROM carrera";
			$result = $this->db->QueryReturn($query);
			return $result;
		}
	}
?>