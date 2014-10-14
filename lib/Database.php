<?php
	class Database {
		// Properties:
		private $dbname;
		private $password;
		private $username;
		private $host;
		private $error;

		private $stmt;
		private $con;

		// Methods:
		public function __construct($host, $dbname, $user, $pass) {
			try {
				$this->host = $host;
				$this->dbname = $dbname;
				$this->username = $user;
				$this->password = $pass;

				$this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
				$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				return $this->error;
			}
		}

		public function query($query) {
			$this->stmt = $this->con->prepare($query);
		}

		public function getAll() {
			$this->stmt->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// Getters & Setters:
		
	}