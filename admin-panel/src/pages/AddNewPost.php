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
        include __DIR__ . '/../views/addNewPost.php';
    }
}
?>