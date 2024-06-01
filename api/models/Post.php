<?php

namespace App\Models;

use PDO;

class Post
{
    // Database connection and table name
    private $conn;
    private $table = "posts";

    // Object properties
    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;

    // Constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create post
    public function createPost($title, $content, $author)
    {
        // Insert query
        $query = "INSERT INTO " . $this->table . " (title, content, author) VALUES (:title, :content, :author)";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":author", $author);

        // Execute query
        return $stmt->execute();
    }

    // Retrieve all posts
    public function getAllPosts()
    {
        // Select all query
        $query = "SELECT * FROM " . $this->table;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        // Fetch all posts
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    // Retrieve posts by user ID
    public function getUserPosts($userId)
    {
        // Select query by user ID
        $query = "SELECT * FROM " . $this->table . " WHERE author = :userId";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(":userId", $userId);

        // Execute query
        $stmt->execute();

        // Fetch all User posts
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    // Retrieve posts by author name
    public function getPostsByAuthor($authorName)
    {
        // Select query by author name
        $query = "SELECT * FROM " . $this->table . " WHERE author = :authorName";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(":authorName", $authorName);

        // Execute query
        $stmt->execute();

        // Fetch all User posts
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    // Retrieve single post by post ID
    public function getSinglePost($postId)
    {
        // Select query by post ID
        $query = "SELECT * FROM " . $this->table . " WHERE id = :postId";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(":postId", $postId);

        // Execute query
        $stmt->execute();

        // Fetch all User posts
        $posts = $stmt->fetch(PDO::FETCH_ASSOC);

        return $posts;
    }

    // Update post
    public function updatePost($postId, $title, $content, $status)
    {
        // Update query
        $query = "UPDATE " . $this->table . " SET title = :title, content = :content, status = :status WHERE id = :postId";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":postId", $postId);

        // Execute query
        return $stmt->execute();
    }

    // Delete post
    public function deletePost($postId)
    {
        // Delete query
        $query = "DELETE FROM " . $this->table . " WHERE id = :postId";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(":postId", $postId);

        // Execute query
        return $stmt->execute();
    }
}
?>