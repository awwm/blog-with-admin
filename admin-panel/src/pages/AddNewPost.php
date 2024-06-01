<?php

namespace Admin\Pages;

use Admin\Helpers\CurlHelper;
use Admin\Middleware\AuthMiddleware;

class AddNewPost {
    private $apiUrl;
    private $createPostEndpoint;

    public function __construct() {
        // Initialize and load environment variables if needed
        $this->apiUrl = $_ENV['API_URL'];
        $this->createPostEndpoint = $_ENV['CREATE_POST_ENDPOINT'];
    }

    public function render() {
        // Check if user is logged in
        AuthMiddleware::checkAuth();

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleFormSubmission();
        } else {
            $this->renderCreateForm();
        }
    }

    private function handleFormSubmission() {
        // Prepare data for the cURL POST request
        $postData = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'status' => $_POST['status'],
            'author' => $_SESSION['user_id'] // Assuming the user ID is stored in the session
        ];

        // Send cURL POST request to create the post
        $url = $this->apiUrl . $this->createPostEndpoint;
        $response = CurlHelper::postRequest($url, $postData);

        // Check the response status
        if ($response['httpCode'] === 201) { // 201 Created
            header('Location: index.php?page=dashboard');
            exit();
        } else {
            echo "Failed to create post.";
        }
    }

    private function renderCreateForm() {
        // Render the create form HTML
        ?>
        <form method="POST" action="">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content" required></textarea><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select><br>

            <input type="submit" value="Create Post">
        </form>
        <?php
    }
}
?>