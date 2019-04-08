<?php
	class Database {
		private $host;
		private $user;
		private $pass;
		private $database;
		public $conn;
		private $port;


		function __construct($host, $user, $pass, $database, $port){
			$this->host = $host;
			$this->user = $user;
			$this->pass = $pass;
			$this->database = $database;
			$this->port = $port;


			$this->conn = pg_connect("host=".$host." port=".$port." dbname=".$database." user=".$user." password=".$pass) or die("Gagal");

			if (!$this->conn) {
				return false;
			}
			else{
				return true;
			}
		}

		
	}
?>