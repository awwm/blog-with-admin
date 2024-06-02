<?php

namespace Admin\Pages;

use Admin\Helpers\CurlHelper;
use Admin\Middleware\AuthMiddleware;

class EditPost {
    private $postId;
    private $apiUrl;
    private $editPostEndpoint;
    private $updatePostEndpoint;
    private $deletePostEndpoint;

    public function __construct($postId) {
        // Initialize and load environment variables if needed
        $this->postId = (int) $postId;
        $this->apiUrl = $_ENV['API_URL'];
        $this->editPostEndpoint = $_ENV['SINGLE_POST_ENDPOINT'];
        $this->updatePostEndpoint = $_ENV['UPDATE_POST_ENDPOINT'];
        $this->deletePostEndpoint = $_ENV['DELETE_POST_ENDPOINT'];
    }

    public function render() {
        // Check if user is logged in
        AuthMiddleware::checkAuth();

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete'])) {
                $this->handleDelete();
            } else {
                $this->handleFormSubmission();
            }
        } else {
            $this->displayEditForm();
        }
    }

    private function fetchPostData() {
        // Fetch post data from the backend
        $url = $this->apiUrl . str_replace('{post_id}', $this->postId, $this->editPostEndpoint);
        $response = CurlHelper::getRequest($url);
        return json_decode($response['response'], true);
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
            'post_id' => $this->postId,
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'featured_image' => $imagePath,
            'status' => $_POST['status']
        ];

        // Send cURL POST request to update the post
        $url = $this->apiUrl . str_replace('{post_id}', $this->postId, $this->updatePostEndpoint);
        $response = CurlHelper::putRequest($url, $postData);

        // Check the response status
        if ($response['httpCode'] === 200) {
            $post = $this->fetchPostData();
            echo '<div class="alert alert-success" role="alert">';
            echo '<span class="bi bi-check-circle"></span> Post updated successfully.';
            echo '</div>';
            $this->renderEditForm($post);
        } else {
            echo "Failed to update post.";
        }
    }

    private function handleDelete() {
        // Send cURL DELETE request to delete the post
        $url = $this->apiUrl . str_replace('{post_id}', $this->postId, $this->deletePostEndpoint);
        $response = CurlHelper::deleteRequest($url);

        // Check the response status
        if ($response['httpCode'] === 200) {
            header('Location: index.php?page=dashboard');
            exit();
        } else {
            echo "Failed to delete post.";
        }
    }

    private function displayEditForm() {
        // Fetch post data from the backend
        $url = $this->apiUrl . str_replace('{post_id}', $this->postId, $this->editPostEndpoint);
        $response = CurlHelper::getRequest($url);
        $post = json_decode($response['response'], true);

        if ($response['httpCode'] === 200 && !empty($post)) {
            $this->renderEditForm($post);
        } else {
            echo "Failed to fetch post data.";
        }
    }

    private function renderEditForm($post) {
        // Render the edit form HTML
        include __DIR__ . '/../views/editPostForm.php';
    }
}
