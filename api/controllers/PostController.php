<?php

namespace App\Controllers;

use App\Models\Post;
use PDO;

class PostController
{
    private $db;
    private $postModel;

    public function __construct($db)
    {
        $this->db = $db;
        $this->postModel = new Post($db);
    }

    public function getAllPosts()
    {
        return $this->postModel->getAllPosts();
    }

    public function getUserPosts($userId)
    {
        return $this->postModel->getUserPosts($userId);
    }

    public function getPostsByAuthor($authorName)
    {
        return $this->postModel->getPostsByAuthor($authorName);
    }

    public function createPost($request)
    {
        $title = $request['title'] ?? '';
        $content = $request['content'] ?? '';
        $author = $request['author'] ?? '';

        if (empty($title) || empty($content) || empty($author)) {
            return ['success' => false, 'message' => 'All fields are required.'];
        }

        $result = $this->postModel->createPost($title, $content, $author);

        if ($result) {
            return ['success' => true, 'message' => 'Post created successfully.'];
        } else {
            return ['success' => false, 'message' => 'Post creation failed.'];
        }
    }

    public function getSinglePost($postId)
    {
        return $this->postModel->getSinglePost($postId);
    }

    public function updatePost($postId, $request)
    {
        $title = $request['title'] ?? '';
        $content = $request['content'] ?? '';
        $status = $request['status'] ?? '';

        if (empty($title) || empty($content)) {
            return ['success' => false, 'message' => 'Title and content are required.'];
        }

        $result = $this->postModel->updatePost($postId, $title, $content, $status);

        if ($result) {
            return ['success' => true, 'message' => 'Post updated successfully.'];
        } else {
            return ['success' => false, 'message' => 'Failed to update post.'];
        }
    }

    public function deletePost($postId)
    {
        $result = $this->postModel->deletePost($postId);

        if ($result) {
            return ['success' => true, 'message' => 'Post deleted successfully.'];
        } else {
            return ['success' => false, 'message' => 'Failed to delete post.'];
        }
    }
}
?>