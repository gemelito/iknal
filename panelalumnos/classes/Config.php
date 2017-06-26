<?php
	class Config
	{
		private $date = array(
				"host" => "localhost",
				"user" => "root",
				"password" => "",
				"db" => "vinculacion2"
			);

		private $db;

		public function __construct()
		{
			$this->db = new mysqli($this->date['host'], $this->date['user'], $this->date['password'], $this->date['db']);
			#echo ($this->db) ? 'hay conexion' : 'no hay conexion'; 
		}

		public function QueryReturn($query){
			return $this->db->query($query);
		}

		public function RunArray($array)
		{
			return $this->db->mysqli_fecth_array($array);
		}
	}
?>