<?php
require_once '../config/database.php';
require_once '../models/User.php';

class UserController {
    // Database connection
    private $conn;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->user = new User($this->conn);
    }

    // Create a new user
    public function create($data) {
        // Set user properties
        $this->user->username = $data['username'];
        $this->user->password = $data['password'];
        $this->user->role = $data['role'];

        // Create the user
        if ($this->user->create()) {
            return array("message" => "User created successfully.");
        } else {
            return array("error" => "User creation failed.");
        }
    }

    // Other CRUD operations can be implemented similarly
}
?>