<?php
    include dirname(__DIR__) . DIRECTORY_SEPARATOR . "config/config.php";

    class Database {
        private $db_host = DB_HOST;
        private $db_name = DB_NAME;
        private $db_user = DB_USER;
        private $db_password = DB_PASSWORD;

        public $conn;

        public function getConnection()
        {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                echo "Connection error: {$exception->getMessage()}";
            }

            return $this->conn;
        }
    }
?>