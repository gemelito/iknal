<?php
	/**
	* Crear una clase con el nombre en iknal/panelalumnos/classes/Project.php
	* Agregar las propiedades de la table proyecto y encapsular	
	* Crear el constructor  
	* Crear el metodo Set
	* Hacer el Metodo Conexion y llamarlo desde el constructor
	* Crear un CRUD
	* Un metodo Create
	* Un metodo Read
	* Un metodo Update
	* Un metodo Delete
	*/

	class Project
	{
		private $db;

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
			$this->$atrribute = $content;
		}

		public function Create()
		{
			$query = "INSERT INTO proyecto(matricula ,verano_proyecto, lugar_proyecto,titulo_proyecto, areadesarrollo_proyecto, tipo_proyecto,estado_proyecto,director_proyecto,asesor1_proyecto,asesor2_proyecto, suplente_proyecto,modalidad_proyecto,equipo_proyecto) VALUES('{$this->matricula}','{$this->verano}','{$this->lugar}','{$this->titulo}','{$this->area}','{$this->tipo}','{$this->estado}','{$this->director}','{$this->asesor1}','{$this->asesor2}','{$this->suplente}','{$this->modalidad}','{$this->equipo}') ";
			$result = $this->db->Query($query);
			if ($result){
				$this->messages[] = "Se ha agregado el proyecto";
			}else{
				$this->errors[] = "No se puedo agregar el proyecto";
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
			$query = "UPDATE proyecto SET matricula='{$this->matricula}', verano_proyecto='{$this->verano}', lugar_proyecto='{$this->lugar}', titulo_proyecto='{$this->titulo}', areadesarrollo_proyecto='{$this->area}', tipo_proyecto='{$this->tipo}', estado_proyecto='{$this->estado}', director_proyecto='{$this->director}', asesor1_proyecto='{$this->asesor1}', asesor2_proyecto='{$this->asesor2}', suplente_proyecto='{$this->suplente}', modalidad_proyecto='{$this->modalidad}', equipo_proyecto='{$this->equipo}' WHERE  matricula='{$this->matricula}' ";
			$result = $this->db->Query($query);
			if ($result){
				$this->messages[] = "Se ha actulizado el proyecto";
			}else{
				$this->errors[] = "No se puedo actualizar el proyecto";
			}
		}

		public function Delete()
		{
			$query = "SELECT * FROM proyecto WHERE titulo_proyecto = '$this->titulo_proyecto' AND matricula = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			if ($result){
				$this->messages[] = "Se ha eliminado el proyecto";
			}else{
				$this->errors[] = "No se puedo elimnar el proyecto";
			}
		}

	}
?>