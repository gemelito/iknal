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

		private $direccion = "../../images/alumno/";


		public $errors = array();
		public $messages = array();

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
			if (!empty($this->matricula) && !empty($this->carrera) && !empty($this->nombre) && !empty($this->apellido_paterno) &&
				!empty($this->apellido_materno) && !empty($this->estado) && !empty($this->generacion) && !empty($this->semestre) &&
				!empty($this->localidad) && !empty($this->correo) && !empty($this->telefono) && !empty($this->sexo) && !empty($this->capacidad_diferente) &&
				!empty($this->fecha_nacimiento))
			{
				$query = "UPDATE alumno SET nombre_alumno='{$this->nombre}',apellidop_alumno='{$this->apellido_paterno}',apellidom_alumno='{$this->apellido_materno}'
							,estado_alumno= '{$this->estado}',originario_alumno= '{$this->localidad}',semestre_alumno= '{$this->semestre}',generacion_alumno='{$this->generacion}',
							carrera_alumno= '{$this->carrera}',correo_alumno= '{$this->correo}',telefono_alumno= '{$this->telefono}',capacidaddiferente_alumno= '{$this->capacidad_diferente}',
							sexo_alumno= '{$this->sexo}',fechanac_alumno= '{$this->fecha_nacimiento}' WHERE matricula_alumno ='{$this->matricula}' ";
				$result = $this->db->Query($query);
					if (!$result)
					{
						$this->messages[]= "Los datos se han actualizado correctamente.";
						if (!empty($_FILES))
						{
							$this->LoadImage();
						}
					}else {
						$this->errors[] = "Los datos no fueron actualizado correctamente.";
					}
			}else{
				$this->errors[] = "Debes llenar todos los campos.";
			}
		}

		public function LoadImage()
		{
			$query = "SELECT foto FROM alumno WHERE matricula_alumno = '{$this->matricula}' ";
			$result = $this->db->QueryReturn($query);
			$objects = $result->fetch_object();
			if (!empty($objects->foto))
			{
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
							$this->messages[] = "La imagen se ha guardo correctamente.";
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
				$this->foto = $_FILES['image']['name'];
				$subirImagen = move_uploaded_file($_FILES['image']['tmp_name'], $this->direccion.$this->foto);
				if ($subirImagen)
				{
					$query = "UPDATE alumno SET foto='{$this->foto}' WHERE matricula_alumno ='{$this->matricula}' ";
					$result = $this->db->Query($query);
					if (!$result) {
						$this->messages[] = "La imagen se ha guardo correctamente.";
					}else{
						$this->errors[] = "La imagen no fue guardado correctamente.";
					}
				}else{
					$this->errors[] = "La imagen no se pudo subir correctamente.";
				}
			}
		}


	}
?>
