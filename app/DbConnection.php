<?php
// require_once('operation.php');


class DbConnection {

	public $conn;

	public function __construct() {

		 $this->connect();
	}

	public function connect() {

		$this->conn = mysqli_connect("localhost","root","","leasonclonedb"); 

		return $this->conn;
	}

}