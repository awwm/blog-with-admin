<?php
namespace App\Models;

use PDO;

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
    public function createComment($post_id, $author, $content) {
        // Insert query
        $query = "INSERT INTO " . $this->table_name . " (post_id, author, content) VALUES (:post_id, :author, :content)";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->author = strip_tags($author ?? ''); // Ensure $author is not null
        $this->content = strip_tags($content ?? ''); // Ensure $content is not null
        $this->post_id = strip_tags($post_id ?? ''); // Ensure $post_id is not null

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

    // Get Post All Comment
    public function getPostComments($post_id) {
        // Select query by post ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE post_id = :post_id";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $sanitized_post_id = (int)($post_id ?? 0); // Ensure $post_id is an integer
        $stmt->bindParam(":post_id", $sanitized_post_id, PDO::PARAM_INT);

        // Execute query
        $stmt->execute();

        // Fetch all post comments
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    }

    // Other CRUD methods can be implemented similarly
}
?>