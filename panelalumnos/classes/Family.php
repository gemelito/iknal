<?php
	
	class Family
	{
		private $db;

		private $id;

		private $matricula;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $correo;
		private $telefono;
		private $profesion;
		private $nacimiento;
		private $parentesco;

		public $errors = array();
		public $messages = array();


		public function __construct()
		{
			$this->db = $this->Conexion();
		}

		public function Conexion(){
			return new Config();
		}

		public function Set($attribut, $content)
		{
			$this->$attribut = $content;
		}

		public function GetFamily(){
			$query = "SELECT parentesco.id_parentesco, parentesco.parentesco as kindred, familia.* FROM familia
				INNER JOIN parentesco ON parentesco.id_parentesco = familia.parentesco
			 	WHERE matricula_familia = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

		public function Read(){
			$this->id = $this->db->ClearString($this->id);
			$query = "SELECT parentesco.id_parentesco, parentesco.parentesco as kindred, familia.* FROM familia
				INNER JOIN parentesco ON parentesco.id_parentesco = familia.parentesco
			 	WHERE matricula_familia = '{$this->matricula}' AND Id_familia = '{$this->id}' ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function Create()
		{
			if (!isset($_POST['nombre']) && !isset($_POST['apellido_paterno']) && !isset($_POST['apellido_materno']) &&
				!isset($_POST['correo']) && !isset($_POST['telefono']) && !isset($_POST['profesion']) && 
				!isset($_POST['nacimiento']) && !isset($_POST['parentesco'])) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['nombre']) && empty($_POST['apellido_paterno']) && empty($_POST['apellido_materno']) &&
				empty($_POST['correo']) && empty($_POST['telefono']) && empty($_POST['profesion']) && 
				empty($_POST['nacimiento']) && empty($_POST['parentesco'])) {
				$this->errors[] = "Se deben llenar todos los campos";
			}else{

				$this->nombre = $this->db->ClearString($_POST['nombre']);
				$this->apellido_paterno = $this->db->ClearString($_POST['apellido_paterno']);
				$this->apellido_materno = $this->db->ClearString($_POST['apellido_materno']);
				$this->correo = $this->db->ClearString($_POST['correo']);
				$this->telefono = $this->db->ClearString($_POST['telefono']);
				$this->profesion = $this->db->ClearString($_POST['profesion']);
				$this->nacimiento = $this->db->ClearString($_POST['nacimiento']);
				$this->parentesco = $this->db->ClearString($_POST['parentesco']);

				$query = "INSERT INTO familia(matricula_familia, nombre, apellido_paterno, apellido_materno, correo, telefono, profesion, nacimiento, parentesco) VALUES ('{$this->matricula}', '{$this->nombre}', '{$this->apellido_paterno}', '{$this->apellido_materno}', '{$this->correo}', '{$this->telefono}', '{$this->profesion}', '{$this->nacimiento}', '{$this->parentesco}') ";
				$result = $this->db->Query($query);
				if (!$result) {
					$this->messages[] = "Los datos fueron guardados correctamente.";
				}else{
					$this->errors[] = "Los datos no fueron guardados correctamente.";
				}
				
			}

		}

		public function Update()
		{
			if (!isset($_POST['nombre']) && !isset($_POST['apellido_paterno']) && !isset($_POST['apellido_materno']) &&
				!isset($_POST['correo']) && !isset($_POST['telefono']) && !isset($_POST['profesion']) && 
				!isset($_POST['nacimiento']) && !isset($_POST['parentesco'])) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['nombre']) && empty($_POST['apellido_paterno']) && empty($_POST['apellido_materno']) &&
				empty($_POST['correo']) && empty($_POST['telefono']) && empty($_POST['profesion']) && 
				empty($_POST['nacimiento']) && empty($_POST['parentesco'])) {
				$this->errors[] = "Se deben llenar todos los campos";
			}else{

				$this->nombre = $this->db->ClearString($_POST['nombre']);
				$this->apellido_paterno = $this->db->ClearString($_POST['apellido_paterno']);
				$this->apellido_materno = $this->db->ClearString($_POST['apellido_materno']);
				$this->correo = $this->db->ClearString($_POST['correo']);
				$this->telefono = $this->db->ClearString($_POST['telefono']);
				$this->profesion = $this->db->ClearString($_POST['profesion']);
				$this->nacimiento = $this->db->ClearString($_POST['nacimiento']);
				$this->parentesco = $this->db->ClearString($_POST['parentesco']);

				$this->id = $this->db->ClearString($this->id);

				$query = "UPDATE familia SET nombre='{$this->nombre}',apellido_paterno='{$this->apellido_paterno}',apellido_materno='{$this->apellido_materno}',correo='{$this->correo}',telefono='{$this->telefono}',profesion='{$this->profesion}',nacimiento='{$this->nacimiento}',parentesco='{$this->parentesco}'
					WHERE matricula_familia = '{$this->matricula}' AND Id_familia = '{$this->id}' ";
				$result = $this->db->Query($query);
				if (!$result) {
					$this->messages[] = "Los datos fueron actualizados correctamente.";
				}else{
					$this->errors[] = "Los datos no fueron actualizados correctamente.";
				}				
			}
		}

		public function Delete(){
			$this->id = $this->db->ClearString($this->id);
			$query = "DELETE FROM familia WHERE matricula_familia = '{$this->matricula}' AND Id_familia = '{$this->id}' ";
			$result = $this->db->Query($query);
			if (!$result) {
				$this->messages[] = "Los datos fueron eliminados correctamente.";
			}else{
				$this->errors[] = "Los datos no fueron eliminados correctamente.";
			}
		}


	}
?>