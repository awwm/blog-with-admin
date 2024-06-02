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
        // Check if a file was uploaded
        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
            // Define upload directory
            $uploadDir = __DIR__ . '/../../uploads/';

            // Generate a unique filename
            $fileName = uniqid('image_') . '_' . time() . '.' . pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);

            // Upload the file to the server
            $uploadPath = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $uploadPath)) {
                // File uploaded successfully, save the file path in the database
                $imagePath = '/uploads/' . $fileName;
                // Include database saving logic here
            } else {
                echo "Failed to upload image.";
                return;
            }
        }

        // Prepare data for the cURL POST request
        $postData = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'featured_image' => $imagePath,
            'status' => $_POST['status'],
            'author' => $_SESSION['user_id'] // Assuming the user ID is stored in the session
        ];

        // Send cURL POST request to create the post
        $url = $this->apiUrl . $this->createPostEndpoint;
        $response = CurlHelper::postRequest($url, $postData);

        // Decode the JSON response
        $data = json_decode($response['response'], true);

        // Check the response status
        if ($data['success'] == true) { // Created
            header('Location: index.php?page=dashboard&message=OK');
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