<?php
namespace App\Controllers;

use App\Models\Comment;
use PDO;

class CommentController {
    // Database connection
    private $db;
    private $commentModel;

    public function __construct($db) {
        $this->db = $db;
        $this->commentModel = new Comment($db);
    }

    // Create a new comment
    public function createComment($request) {
        // Set comment properties
        $post_id = $request['post_id'];
        $author = $request['author'];
        $content = $request['content'];

        // Create the comment
        if (empty($post_id) || empty($author)) {
            return ['success' => false, 'message' => 'All fields are required.'];
        }

        $result = $this->commentModel->createComment($post_id, $content,  $author);

        if ($result) {
            return ['success' => true, 'message' => 'Comment created successfully.'];
        } else {
            return ['success' => false, 'message' => 'Comment creation failed.'];
        }
    }

    // Other CRUD operations can be implemented similarly
}
?>