<?php

	class Student
	{
		private $db;

		private $titulo_proyecto;
		private $user_name;
		private $matricula;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $estado;
		private $carrera;
		private $generacion;
		private $semestre;
		private $localidad;
		private $correo;
		private $telefono;
		private $sexo;
		private $capacidad_diferente;
		private $fecha_nacimiento;
		private $foto;

		private $user_password_hash;
		private $user_level;
		private $id_alumno;

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
			$query = "SELECT alumno.*, users.*, estado_alumno.*, localidad.*, carrera.*, semestre.*, generacion.* FROM alumno
								INNER JOIN generacion ON generacion.Id_generacion = alumno.generacion_alumno
								INNER JOIN carrera ON carrera.Id_carrera = alumno.carrera_alumno
								INNER JOIN semestre ON semestre.Id_semestre = alumno.semestre_alumno
								INNER JOIN localidad ON localidad.id_localidad = alumno.originario_alumno
								INNER JOIN estado_alumno ON estado_alumno.Id_estado_alumno = alumno.estado_alumno
								INNER JOIN users ON users.Id_alumn = alumno.id_alumno
								WHERE users.user_name = '{$this->user_name}'";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			return $objects;
			$this->db->CloseConexion();
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
