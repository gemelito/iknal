<?php

	class Friend
	{
		private $db;


    private $id;
		private $matricula;
    private $tipo;
    private $tutor_amigo;
    private $amistadanios;
    private $telefono;
    private $opinion;
    private $direccion;
    private $nombre;
    private $apellidop;
    private $apellidom;



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

    public function GetFriend(){
			$query = "SELECT * FROM amigo WHERE matricula_amigo = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			return $result;
		}

    public function Read(){
			$this->id = $this->db->ClearString($this->id);
			$query = "SELECT * FROM amigo WHERE matricula_amigo = '{$this->matricula}' AND Id_amigo = '{$this->id}' ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function Create()
		{
			if (!isset($_POST['tipo']) && !isset($_POST['tutor_amigo']) && !isset($_POST['amistadanios']) &&
				!isset($_POST['telefono']) && !isset($_POST['opinion']) && !isset($_POST['direccion']) &&
				!isset($_POST['nombre']) && !isset($_POST['apellidop']) && !isset($_POST['apellidom']) ) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['tipo']) && empty($_POST['tutor_amigo']) && empty($_POST['amistadanios']) &&
				empty($_POST['telefono']) && empty($_POST['opinion']) && empty($_POST['direccion']) &&
				empty($_POST['nombre']) && empty([$_POST['apellidop']]) && empty($_POST['apellidom'])) {
				$this->errors[] = "Se deben llenar todos los campos.";
			}elseif (!empty($_POST['tipo']) && !empty($_POST['tutor_amigo']) && !empty($_POST['amistadanios']) &&
				!empty($_POST['telefono']) && !empty($_POST['opinion']) && !empty($_POST['direccion']) &&
				!empty($_POST['nombre']) && !empty([$_POST['apellidop']]) && !empty($_POST['apellidom'])) {

        $this->tipo = $this->db->ClearString($_POST['tipo']);
				$this->tutor_amigo = $this->db->ClearString($_POST['tutor_amigo']);
				$this->amistadanios = $this->db->ClearString($_POST['amistadanios']);
				$this->telefono = $this->db->ClearString($_POST['telefono']);
				$this->opinion = $this->db->ClearString($_POST['opinion']);
				$this->direccion = $this->db->ClearString($_POST['direccion']);
				$this->nombre = $this->db->ClearString($_POST['nombre']);
        $this->apellidop = $this->db->ClearString($_POST['apellidop']);
        $this->apellidom = $this->db->ClearString($_POST['apellidom']);


				$query = "INSERT INTO amigo(tipodeamigo, matricula_amigo, tutor_amigo, amistadanios, telefono, opinion, direccion, nombre_amigo, apellidop_amigo, apellidom_amigo)
                  VALUES ('{$this->tipo}', '{$this->matricula}', '{$this->tutor_amigo}','{$this->amistadanios}','{$this->telefono}','{$this->opinion}','{$this->direccion}','{$this->nombre}','{$this->apellidop}','{$this->apellidom}') ";
				$result = $this->db->Query($query);
				if (!$result){
					$this->messages[] = "Los datos fueron guardados correctamente.";
				}else{
					$this->errors[] = "Los datos no fueron guardados correctamente.";
				}
			}
		}

		public function Update()
		{
      if (!isset($_POST['tipo']) && !isset($_POST['tutor_amigo']) && !isset($_POST['amistadanios']) &&
				!isset($_POST['telefono']) && !isset($_POST['opinion']) && !isset($_POST['direccion']) &&
				!isset($_POST['nombre']) && !isset($_POST['apellidop']) && !isset($_POST['apellidom']) ) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['tipo']) && empty($_POST['tutor_amigo']) && empty($_POST['amistadanios']) &&
				empty($_POST['telefono']) && empty($_POST['opinion']) && empty($_POST['direccion']) &&
				empty($_POST['nombre']) && empty([$_POST['apellidop']]) && empty($_POST['apellidom'])) {
				$this->errors[] = "Se deben llenar todos los campos.";
			}elseif (!empty($_POST['tipo']) && !empty($_POST['tutor_amigo']) && !empty($_POST['amistadanios']) &&
				!empty($_POST['telefono']) && !empty($_POST['opinion']) && !empty($_POST['direccion']) &&
				!empty($_POST['nombre']) && !empty([$_POST['apellidop']]) && !empty($_POST['apellidom'])) {

        $this->tipo = $this->db->ClearString($_POST['tipo']);
				$this->tutor_amigo = $this->db->ClearString($_POST['tutor_amigo']);
				$this->amistadanios = $this->db->ClearString($_POST['amistadanios']);
				$this->telefono = $this->db->ClearString($_POST['telefono']);
				$this->opinion = $this->db->ClearString($_POST['opinion']);
				$this->direccion = $this->db->ClearString($_POST['direccion']);
				$this->nombre = $this->db->ClearString($_POST['nombre']);
        $this->apellidop = $this->db->ClearString($_POST['apellidop']);
        $this->apellidom = $this->db->ClearString($_POST['apellidom']);


  			$query = "UPDATE amigo SET tipodeamigo='{$this->tipo}',tutor_amigo='{$this->tutor_amigo}',amistadanios='{$this->amistadanios}',telefono='{$this->telefono}',opinion='{$this->opinion}',
                  direccion='{$this->direccion}',nombre_amigo='{$this->nombre}',apellidop_amigo='{$this->apellidop}',apellidom_amigo='{$this->apellidom}' WHERE matricula_amigo = '{$this->matricula}' AND Id_amigo = '{$this->id}' ";
  			$result = $this->db->Query($query);
  			if (!$result){
  				$this->messages[] = "Los datos se han actualizado correctamente.";
  			}else{
  				$this->errors[] = "Los datos no fueron actualizados correctamente.";
  			}

      }

		}

		public function Delete()
		{
			$query = "DELETE FROM amigo WHERE matricula_amigo = '{$this->matricula}' AND Id_amigo = '{$this->id}' ";
			$result = $this->db->Query($query);
			if (!$result){
				$this->messages[] = "Se ha eliminado el proyecto.";
			}else{
				$this->errors[] = "No se puedo elimnar el proyecto.";
			}
		}



	}
?>
