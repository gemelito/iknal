<?php

	class Project
	{
		private $db;

		private $degree;

		private $matricula;
	    private $id_prof;
	    private $nombre;
	    private $apellidop;
	    private $apellidom;
	    private $verano;
	    private $lugar;
	    private $titulo;
	    private $area;
	    private $tipo;
	    private $estado;
	    private $director;
	    private $asesor1;
	  	private $asesor2;
	    private $suplente;
	    private $modalidad;
	    private $equipo;

		public $errors = array();
		public $messages = array();

		public function __construct()
		{
			$this->db = $this->Conexion();
		}

		public function Conexion(){
			return new Config();
		}

		public function Set($attribute, $content)
		{
			$this->$attribute = $content;
		}

		public function Create()
		{
			if (!isset($_POST['titulo']) && !isset($_POST['tipo']) && !isset($_POST['area']) &&
				!isset($_POST['estado']) && !isset($_POST['verano']) && !isset($_POST['localidad']) &&
				!isset($_POST['equipo'])) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['titulo']) && empty($_POST['tipo']) && empty($_POST['area']) &&
				empty($_POST['estado']) && empty($_POST['verano']) && empty($_POST['localidad']) &&
				empty($_POST['equipo'])) {
				$this->errors[] = "Se deben llenar todos los campos.";
			}elseif (!empty($_POST['titulo']) && !empty($_POST['tipo']) && !empty($_POST['area']) &&
				!empty($_POST['estado']) && !empty($_POST['verano']) && !empty($_POST['localidad']) &&
				!empty($_POST['equipo'])) {

				$this->verano = $this->db->ClearString($_POST['verano']);
				$this->lugar = $this->db->ClearString($_POST['localidad']);
				$this->titulo = $this->db->ClearString($_POST['titulo']);
				$this->area = $this->db->ClearString($_POST['area']);
				$this->tipo = $this->db->ClearString($_POST['tipo']);
				$this->estado = $this->db->ClearString($_POST['estado']);
				$this->equipo = $this->db->ClearString($_POST['equipo']);

				$query = "INSERT INTO proyecto(matricula ,verano_proyecto, lugar_proyecto,titulo_proyecto, areadesarrollo_proyecto, tipo_proyecto,estado_proyecto,equipo_proyecto)
									VALUES('{$this->matricula}','{$this->verano}','{$this->lugar}','{$this->titulo}','{$this->area}','{$this->tipo}','{$this->estado}','{$this->equipo}') ";
				$result = $this->db->Query($query);
				if (!$result){
					$this->messages[] = "Los datos fueron guardados correctamente.";
				}else{
					$this->errors[] = "Los datos no fueron guardados correctamente.";
				}
			}
		}

		public function Read()
		{
			$query = "SELECT * FROM proyecto WHERE titulo_proyecto = '{$this->titulo}' ";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function Update()
		{
			$query = "UPDATE proyecto SET matricula='{$this->matricula}', verano_proyecto='{$this->verano}', lugar_proyecto='{$this->lugar}', titulo_proyecto='{$this->titulo}', areadesarrollo_proyecto='{$this->area}', tipo_proyecto='{$this->tipo}', estado_proyecto='{$this->estado}', equipo_proyecto='{$this->equipo}' WHERE  matricula='{$this->matricula}' ";
			$result = $this->db->Query($query);
			if (!$result){
				$this->messages[] = "Los datos se han actualizado correctamente.";
			}else{
				$this->errors[] = "Los datos no fueron actualizados correctamente.";
			}
		}

		public function Delete()
		{
			$query = "SELECT * FROM proyecto WHERE titulo_proyecto = '$this->titulo_proyecto' AND matricula = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			if ($result){
				$this->messages[] = "Se ha eliminado el proyecto.";
			}else{
				$this->errors[] = "No se puedo elimnar el proyecto.";
			}
		}

		public function GetProject()
		{
			$query = "SELECT proyecto.*, profesor.*, localidad.* FROM proyecto
							INNER JOIN profesor ON profesor.id_profesor = proyecto.director_proyecto
							INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
							WHERE matricula = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function GetEdit(){
			$query = "SELECT * FROM proyecto WHERE matricula = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function GetProjects()
		{
			$query = "SELECT proyecto.*, carrera.*, alumno.*, localidad.*, estado_proyecto.* FROM proyecto
					INNER JOIN estado_proyecto ON estado_proyecto.id_estado_proyecto = proyecto.estado_proyecto
					INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
					WHERE carrera.carrera = '{$this->degree}' ";
			$result = $this->db->QueryReturn($query);
			if ($result) {
				return $result;
			}
		}

		public function SearchProjects()
		{
			$query = "SELECT proyecto.*, carrera.*, alumno.*, localidad.*, estado_proyecto.* FROM proyecto
					INNER JOIN estado_proyecto ON estado_proyecto.id_estado_proyecto = proyecto.estado_proyecto
					INNER JOIN alumno ON alumno.matricula_alumno = proyecto.matricula
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN localidad ON localidad.id_localidad = proyecto.lugar_proyecto
					WHERE carrera.carrera = '{$this->degree}' AND proyecto.titulo_proyecto LIKE '%".$this->titulo."%' ";
			$result = $this->db->QueryReturn($query);
			if ($result) {
				return $result;
			}
		}

	}
?>
