<?php
class Comment {
    // Database connection and table name
    private $conn;
    private $table_name = "comments";

    // Object properties
    public $id;
    public $post_id;
    public $author;
    public $content;
    public $created_at;

    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create comment
    public function create() {
        // Insert query
        $query = "INSERT INTO " . $this->table_name . " (post_id, author, content) VALUES (:post_id, :author, :content)";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->post_id = htmlspecialchars(strip_tags($this->post_id));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->content = htmlspecialchars(strip_tags($this->content));

        // Bind parameters
        $stmt->bindParam(":post_id", $this->post_id);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":content", $this->content);

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