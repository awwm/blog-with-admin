<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host = 'mysql';
    private $db_name = 'blog';
    private $username = 'user';
    private $password = 'password';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo json_encode(array("error" => "Database connection error: " . $e->getMessage()));
            exit();
        }

        return $this->conn;
    }
}
?>