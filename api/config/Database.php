<?php
    class Database {
        // private $host = 'sql202.ezyro.com';
        // private $db_name = 'ezyro_24616801_caap_lingayen_airport';
        // private $username = 'ezyro_24616801';
        // private $password = 'g1wbeaq8tmuxd';
        private $host = 'localhost';
        private $db_name = 'caap_lingayen_airport';
        private $username = 'root';
        private $password = '';
        private $conn;

        public function connect() {
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $err){
                echo 'Connection Error: ' . $err->getMessage();
            }

            return $this->conn;
        }
    }
    