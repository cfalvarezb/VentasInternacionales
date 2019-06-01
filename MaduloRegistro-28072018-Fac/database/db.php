<?php

/**
* 
*/
class Database
{
	private $con;
	
	public function connect(){
		include_once("config.php");
		$this->con = new Mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if ($this->con) {
			return $this->con;
		}
		return "DATABASE_CONNECTION_FAIL";
	}
}

//$db = new Database();
//$db->connect();

?>