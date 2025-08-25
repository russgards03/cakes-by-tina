<?php
class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "Geneselma3";
    private $dbname = "cbtina";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Database Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>