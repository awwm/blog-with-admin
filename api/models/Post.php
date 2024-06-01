<?php
namespace App\Models;

use PDO;

class Post {
    // Database connection and table name
    private $conn;
    private $table = "posts";

    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create post
    public function create() {
        // Insert query
        $query = "INSERT INTO " . $this->table_name . " (title, content, author) VALUES (:title, :content, :author)";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->title = htmlspecialchars(strip_tags($title));
        $this->content = htmlspecialchars(strip_tags($content));
        $this->author = htmlspecialchars(strip_tags($author));

        // Bind parameters
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":author", $author);

        // Execute query
        return $stmt->execute();
    }

    // Other CRUD methods can be implemented similarly
}
?>