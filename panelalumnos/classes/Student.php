<?php

	class Student
	{
		private $db;

		private $id; 

		//Fields of the table alumno
		private $user_name;
		private $matricula;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $estado;
		private $carrera;
		private $generacion;
		private $semestre;
		//This repaet to the table alumno and proyecto
		private $localidad;
		private $correo;
		private $telefono;
		private $sexo;
		private $capacidad_diferente;
		private $fecha_nacimiento;
		private $foto;

		//Fields of the table users
		private $user_password_hash;
		private $user_level;
		private $id_alumno;

		//Field of the table proyecto
		private $director;
		private $asesor1;
		private $asesor2;
		private $asesor3;
		private $suplente;



		private $direccion = "../../images/alumno/";
		private $formatos = array("image/jpeg", "image/png", "image/gif", "image/jpg");

		public $errors = array();
		public $messages = array();

		public function __construct(){
			$this->db = $this->Conexion();

			if (isset($_POST['enviar']) && isset($_POST['student'])) {
				$this->Update();
			}

			if (isset($_POST['enviar']) && isset($_POST['any']) && isset($_POST['user_name']) &&
				$_POST['user_name'] == $_SESSION['user_name']) {
				$this->UpdateAccount();
			}

			if (isset($_POST['enviar']) && !empty($_POST['enviar'])) {
				$this->UpdateCommitee();
			}
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
			$query = "SELECT alumno.*, users.*, estado_alumno.*, localidad.*, carrera.*, semestre.*, generacion.*, proyecto.* FROM alumno
					INNER JOIN generacion ON generacion.Id_generacion = alumno.generacion_alumno
					INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
					INNER JOIN semestre ON semestre.Id_semestre = alumno.semestre_alumno
					INNER JOIN localidad ON localidad.id_localidad = alumno.originario_alumno
					INNER JOIN estado_alumno ON estado_alumno.Id_estado_alumno = alumno.estado_alumno
					INNER JOIN proyecto ON proyecto.matricula = alumno.matricula_alumno
					INNER JOIN users ON users.Id_alumn = alumno.id_alumno
					WHERE users.user_name = '{$this->user_name}'";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
			$this->db->CloseConexion();
		}

		public function ShowManager($matricula){
			$query = "SELECT proyecto.director_proyecto, profesor.* FROM proyecto
					INNER JOIN profesor ON profesor.id_profesor = proyecto.director_proyecto
					WHERE proyecto.matricula = $matricula ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function ShowAdviser_1($matricula){
			$query = "SELECT proyecto.asesor1_proyecto, profesor.* FROM proyecto
					INNER JOIN profesor ON profesor.id_profesor = proyecto.asesor1_proyecto
					WHERE proyecto.matricula = $matricula ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function ShowAdviser_2($matricula){
			$query = "SELECT proyecto.asesor2_proyecto, profesor.* FROM proyecto
					INNER JOIN profesor ON profesor.id_profesor = proyecto.asesor2_proyecto
					WHERE proyecto.matricula = $matricula ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function ShowAdviser_3($matricula){
			$query = "SELECT proyecto.asesor3_proyecto, profesor.* FROM proyecto
					INNER JOIN profesor ON profesor.id_profesor = proyecto.asesor3_proyecto
					WHERE proyecto.matricula = $matricula ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function ShowAlternate($matricula){
			$query = "SELECT proyecto.suplente_proyecto, profesor.* FROM proyecto
					INNER JOIN profesor ON profesor.id_profesor = proyecto.suplente_proyecto
					WHERE proyecto.matricula = $matricula ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
		}

		public function Update()
		{
			if (isset($_POST['matricula']) && isset($_POST['carrera']) && isset($_POST['nombre']) && 
				isset($_POST['apellido_paterno']) && isset($_POST['apellido_materno']) && 
				isset($_POST['estado']) && isset($_POST['generacion']) && isset($_POST['semestre']) &&
				isset($_POST['localidad']) && isset($_POST['correo']) && isset($_POST['telefono']) && 
				isset($_POST['sexo']) && isset($_POST['capacidad_diferente']) && isset($_POST['fecha_nacimiento']))
			{
				if (!empty($_POST['matricula']) && !empty($_POST['carrera']) && !empty($_POST['nombre']) && 
					!empty($_POST['apellido_paterno']) && !empty($_POST['apellido_materno']) && !empty($_POST['estado']) && 
					!empty($_POST['generacion']) && !empty($_POST['semestre']) && !empty($_POST['localidad']) && 
					!empty($_POST['correo']) && !empty($_POST['telefono']) && !empty($_POST['sexo']) && 
					!empty($_POST['capacidad_diferente']) && !empty($_POST['fecha_nacimiento']))
				{
					$this->matricula = $this->db->ClearString($_POST['matricula']);
					$this->nombre = $this->db->ClearString($_POST['nombre']);
					$this->apellido_paterno = $this->db->ClearString($_POST['apellido_paterno']);
					$this->apellido_materno = $this->db->ClearString($_POST['apellido_materno']);
					$this->estado = $this->db->ClearString($_POST['estado']);
					$this->localidad = $this->db->ClearString($_POST['localidad']);
					$this->semestre = $this->db->ClearString($_POST['semestre']);
					$this->generacion = $this->db->ClearString($_POST['generacion']);
					$this->carrera = $this->db->ClearString($_POST['carrera']);
					$this->correo = $this->db->ClearString($_POST['correo']);
					$this->telefono = $this->db->ClearString($_POST['telefono']);
					$this->capacidad_diferente = $this->db->ClearString($_POST['capacidad_diferente']);
					$this->sexo = $this->db->ClearString($_POST['sexo']);
					$this->fecha_nacimiento = $this->db->ClearString($_POST['fecha_nacimiento']);

					$query = "UPDATE alumno SET nombre_alumno='{$this->nombre}',apellidop_alumno='{$this->apellido_paterno}',apellidom_alumno='{$this->apellido_materno}'
							,estado_alumno= '{$this->estado}',originario_alumno= '{$this->localidad}',semestre_alumno= '{$this->semestre}',generacion_alumno='{$this->generacion}',
							carrera_alumno= '{$this->carrera}',correo_alumno= '{$this->correo}',telefono_alumno= '{$this->telefono}',capacidaddiferente_alumno= '{$this->capacidad_diferente}',
							sexo_alumno= '{$this->sexo}',fechanac_alumno= '{$this->fecha_nacimiento}' WHERE matricula_alumno ='{$this->matricula}' ";
					$result = $this->db->Query($query);
					if (!$result)
					{
						$this->messages[]= "Los datos fueron actualizados correctamente.";
						if (!empty($_FILES) && isset($_FILES['image']) && !empty($_FILES['image']['name']))
						{
							$this->LoadImage();
						}
					}else {
						$this->errors[] = "Los datos no fueron actualizados correctamente.";
					}
					
				}else{
					$this->errors[] = "Se deben llenar todos las campos.";
				}
			}else{
				$this->errors[] = "A ocurrido un error intente otra vez.isjf";
			}
			
		}

		public function UpdateCommitee()
		{
			if (!isset($_POST['manager']) && !isset($_POST['adviser_1']) && !isset($_POST['adviser_2']) && 
				!isset($_POST['adviser_3']) && !isset($_POST['alternate']) && !isset($_POST['matricula']) &&
				!isset($_POST['last_name']) && !isset($_POST['id']) ) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['manager']) && empty($_POST['adviser_1']) && empty($_POST['adviser_2']) && 
				empty($_POST['adviser_3']) && empty($_POST['alternate']) && empty($_POST['matricula']) &&
				empty($_POST['last_name']) && empty($_POST['id'])) {
				$this->errors[] = "Se deben llenar todos las campos.";
			}elseif (!empty($_POST['manager']) && !empty($_POST['adviser_1']) && !empty($_POST['adviser_2']) && 
				!empty($_POST['adviser_3']) && !empty($_POST['alternate']) && !empty($_POST['matricula']) &&
				!empty($_POST['last_name']) && !empty($_POST['id'])){
				
				$this->director = $this->db->ClearString($_POST['manager']);
				$this->asesor1 = $this->db->ClearString($_POST['adviser_1']);
				$this->asesor2 = $this->db->ClearString($_POST['adviser_2']);
				$this->asesor3 = $this->db->ClearString($_POST['adviser_3']);
				$this->suplente = $this->db->ClearString($_POST['alternate']);
				$this->matricula = $this->db->ClearString($_POST['matricula']);
				$this->nombre = $this->db->ClearString($_POST['last_name']);
				$this->id = $this->db->ClearString($_POST['id']);

				$query = "UPDATE proyecto SET director_proyecto = '{$this->director}', asesor1_proyecto = '{$this->asesor1}', 
						asesor2_proyecto = '{$this->asesor2}', asesor3_proyecto = '{$this->asesor3}', suplente_proyecto = '{$this->suplente}' 
						WHERE matricula = '$this->matricula' ";
				$result = $this->db->Query($query);
				if (!$result) {
					$this->messages[] = "Los datos fueron actualizados correctamente.";
				}else{
					$this->errors[] = "Los datos no fueron actualizados correctamente.";
				}
			}
		}

		public function UpdateAccount()
		{
			if (empty($_POST['password']) && empty($_POST['new_password']) && empty($_POST['new_password_confirmation']) &&
				empty($_POST['id_student']) && empty($_POST['user_name']) && empty($_POST['any'])) {
				$this->errors = "Se deben llenar todos los campos.";
			}elseif ($_POST['new_password'] !== $_POST['new_password_confirmation']) {
				$this->errors[] = "El nuevo password no es igual al password de confirmation.";
			}elseif (strlen($_POST['new_password']) < 6) {
				$this->errors[] = "El nuevo password debe contener minimo 6 caracteres.";
			}elseif (!empty($_POST['password']) && !empty($_POST['new_password']) && ($_POST['new_password'] === $_POST['new_password_confirmation'])) {

					$this->user_name = $this->db->ClearString($_SESSION['user_name']);

					$query = "SELECT user_id, user_name, user_email, user_password_hash, nivel FROM users WHERE user_name = '{$this->user_name}'";
					$result = $this->db->QueryReturn($query);
					if ($this->db->GetRowTotal($result) == 1) {
						$objects = $result->fetch_object();
						if (password_verify($_POST['password'], $objects->user_password_hash)) {
							$this->user_password_hash = $this->db->ClearString($_POST['new_password']);
							$this->user_level = $this->db->ClearString($_SESSION['user_level']);
							$this->id_alumno = $this->db->ClearString($_POST['id_student']);

							$this->user_password_hash = password_hash($this->user_password_hash, PASSWORD_DEFAULT);
							$query = "UPDATE users set user_password_hash = '{$this->user_password_hash}' WHERE user_name= '{$this->user_name}' AND nivel = '{$this->user_level}' ";
							$result = $this->db->Query($query);
							if (!$result) {
								
								$this->doLogout();
							}else{
								$this->errors[] = "La contraseña no fue actualizada correctamente.";
							}
						}else{
							$this->errors[] = "Intente otra vez.";
						}
					}else{
						$this->errors[] = "El usuario no existe.";
					}
			}else{
				$this->errors[] = "Error desconocido intent otra vez.";
			}
	        
		}

		public function LoadImage()
		{
			$query = "SELECT foto FROM alumno WHERE matricula_alumno = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			if (!empty($objects->foto))
			{
				if (in_array($_FILES['image']['type'], $this->formatos)){
					if (unlink($this->direccion.$objects->foto))
					{
						$this->foto = $_FILES['image']['name'];
						$subirImagen = move_uploaded_file($_FILES['image']['tmp_name'], $this->direccion.$this->foto);
						if ($subirImagen)
						{
							$query = "UPDATE alumno SET foto='{$this->foto}' WHERE matricula_alumno ='{$this->matricula}'";
							$result = $this->db->Query($query);
							if (!$result)
							{
								$this->messages[] = "La imagen fue guardo correctamente.";
							}else{
								$this->errors[] = "La imagen no fue guardado correctamente.";
							}
						}else{
							$this->errors[] = "La imagen no se pudo subir correctamente.";
						}
					}else{
						$this->errors[] = "Error al actualizar tu imagen";
					}
				}else{
					$this->errors[] = "A ocurrido un error intente otra vez.";
				}
			}else{
				if (in_array($_FILES['image']['type'], $this->formatos)){
					$this->foto = $_FILES['image']['name'];
					$subirImagen = move_uploaded_file($_FILES['image']['tmp_name'], $this->direccion.$this->foto);
					if ($subirImagen)
					{
						$query = "UPDATE alumno SET foto='{$this->foto}' WHERE matricula_alumno ='{$this->matricula}' ";
						$result = $this->db->Query($query);
						if (!$result) {
							$this->messages[] = "La imagen fue guardo correctamente.";
						}else{
							$this->errors[] = "La imagen no fue guardado correctamente.";
						}
					}else{
						$this->errors[] = "La imagen no se pudo subir correctamente.";
					}
				}else{
					$this->errors[] = "A ocurrido un error intente otra vez.";
				}
			}
		}

		public function doLogout()
	    {
	        $_SESSION = array();
	        session_destroy();

	     	header('location: ../../index.php?success');

	    }


	}
?>
