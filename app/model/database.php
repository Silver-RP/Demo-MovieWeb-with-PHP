<?php
    class Database
    {
        public $conn;
        private $stmt;
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "php_phim";
        //PDO
        public function __construct()
        {
            try {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        public function query($sql, $params = []) {
            try {
                $this->stmt = $this->conn->prepare($sql);
                $this->stmt->execute($params);
                return $this->stmt;
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
                return false;
            }
        }
        public function prepare($sql){
            return $this->conn->prepare($sql);
        }
        public function getAll($sql, $params = null){
            $stm = $this->query($sql, $params);
            return  $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOne($sql, $params = []) {
            $stmt = $this->query($sql, $params);
            if ($stmt) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return null;
        }
        public function execute($sql){
            $this->stmt = $this->conn->prepare($sql);
            return $this->stmt->execute();
        }
        function insert($sql, $params){
            $this->query($sql, $params);
            return $this->conn->lastInsertId();
        }
        function delete($sql, $params){
            return $this->query($sql, $params);
        }
        function update($sql, $params){
            $this->stmt = $this->conn->prepare($sql);
            return $this->query($sql, $params);
        }
    }

?>