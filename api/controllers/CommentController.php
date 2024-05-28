<?php
require_once '../config/database.php';
require_once '../models/Comment.php';

class CommentController {
    // Database connection
    private $conn;
    private $comment;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->comment = new Comment($this->conn);
    }

    // Create a new comment
    public function create($data) {
        // Set comment properties
        $this->comment->post_id = $data['post_id'];
        $this->comment->author = $data['author'];
        $this->comment->content = $data['content'];

        // Create the comment
        if ($this->comment->create()) {
            return array("message" => "Comment created successfully.");
        } else {
            return array("error" => "Comment creation failed.");
        }
    }

    // Other CRUD operations can be implemented similarly
}
?>