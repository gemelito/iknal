<?php

	class Student
	{
		private $db;

		private $degree;
		private $user_name;
		private $name;
		private $enrollment;
		private $titulo_proyecto;

		public function __construct(){
			$this->db = $this->Conexion();
		}

		public function Conexion(){
			return new Config();
		}

		public function Set($attribut, $content)
		{
			$this->$attribut = $content;
		}

		public function GetInformation()
		{
			$query = "SELECT alumno.*, users.* FROM alumno
					INNER JOIN users ON users.Id_alumn = alumno.id_alumno
					WHERE users.user_name = '{$this->user_name}' ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
			$this->db->CloseConexion();
		}

		#public function GetFamily(){
		#	$query = ""
		#}

		public function GetProject(){
			$query = "SELECT proyecto.*, carrera.*, alumno.*, localidad.* FROM proyecto
					INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
					WHERE proyecto.matricula = '{$this->enrollment}' ";
			$result = $this->db->QueryReturn($query);
			return $result;
			$this->db->CloseConexion();
		}

		public function GetDegrees()
		{
			$query = "SELECT * FROM carrera";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function ShowProjects()
		{
			$query = "SELECT proyecto.*, carrera.*, alumno.*, localidad.* FROM proyecto
					INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
					WHERE carrera.carrera = '{$this->degree}'";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function SearchProjects()
		{
			$query = "SELECT proyecto.*, carrera.*, alumno.*, localidad.* FROM proyecto
					INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
					WHERE carrera.carrera = '{$this->degree}' AND proyecto.titulo_proyecto LIKE '%".$this->titulo_proyecto."%' ";
			$result = $this->db->QueryReturn($query);
			return $result;
		}
	}
?>
