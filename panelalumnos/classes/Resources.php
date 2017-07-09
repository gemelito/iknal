<?php
	class Resources
	{
		private $db;

		public function __construct(){
			$this->db = $this->Conexion();

		}

		public function Conexion(){
			return new Config();
		}

		public function GetDegrees(){
			$query = "SELECT * FROM carrera";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetState()
		{
			$query = "SELECT * FROM estado_alumno";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetSemesters(){
			$query = "SELECT * FROM semestre";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetGenerations(){
			$query = "SELECT * FROM generacion";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetLocations(){
			$query = "SELECT * FROM localidad";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetTeacher(){
			$query = "SELECT * FROM profesor";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetKindreds()
		{
			$query = "SELECT * FROM parentesco";
			$result = $this->db->QueryReturn($query);
			return $result;
		}
	}


 ?>
