<?php
class Post {
    // Database connection and table name
    private $conn;
    private $table_name = "posts";

    // Object properties
    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;

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
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));

        // Bind parameters
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":author", $this->author);

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