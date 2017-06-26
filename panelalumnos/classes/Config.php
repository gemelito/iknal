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
			$this->db->character_set_name();
            $this->db->set_charset('utf8');
		}

		public function QueryReturn($query){
			return $this->db->query($query);
		}

		public function RunArray($array)
		{
			return mysqli_fetch_array($array);
		}

	}
?>