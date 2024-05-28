<?php
class User {
    // Database connection and table name
    private $conn;
    private $table_name = "users";

    // Object properties
    public $id;
    public $username;
    public $password;
    public $role;
    public $created_at;

    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create user
    public function create() {
        // Insert query
        $query = "INSERT INTO " . $this->table_name . " (username, password, role) VALUES (:username, :password, :role)";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->role = htmlspecialchars(strip_tags($this->role));

        // Bind parameters
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Other CRUD methods can be implemented similarly
}
?>