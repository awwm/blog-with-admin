<?php
require_once '../config/database.php';
require_once '../models/Post.php';

class PostController {
    // Database connection
    private $conn;
    private $post;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->post = new Post($this->conn);
    }

    // Create a new post
    public function create($data) {
        // Set post properties
        $this->post->title = $data['title'];
        $this->post->content = $data['content'];
        $this->post->author = $data['author'];

        // Create the post
        if ($this->post->create()) {
            return array("message" => "Post created successfully.");
        } else {
            return array("error" => "Post creation failed.");
        }
    }

    // Other CRUD operations can be implemented similarly
}
?>