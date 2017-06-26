<?php

	class Student
	{
		private $db;

		private $degree;

		public function __construct(){
			$this->db = $this->Conexion();
		}

		public function Conexion(){
			return new Config();
		}

		public function Set($field, $content)
		{
			$this->$field = $content;
		}

		public function GetDegrees()
		{
			$query = "SELECT * FROM carrera";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function ShowProjects()
		{
			$query = "SELECT proyecto.*, alumno.*, localidad.*, carrera.* FROM proyecto
				INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
				INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
				WHERE carrera.carrera = '{$this->degree}' ";
			$result = $this->db->QueryReturn($query);
			return $result;
		}
	}
?>





