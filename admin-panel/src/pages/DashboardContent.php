<?php
namespace Admin\Pages;

use Admin\Helpers\CurlHelper;
use Admin\Middleware\AuthMiddleware;

class DashboardContent {
    public function __construct() {
        // Initialize and load environment variables if needed
    }

    public function render() {
        // Check if user is logged in
        AuthMiddleware::checkAuth();

        // Fetch posts data from the backend
        $apiUrl = $_ENV['API_URL'];
        $postsEndpoint = $_ENV['POSTS_ENDPOINT'];
        $userPostsEndpoint = $_ENV['USER_POSTS_ENDPOINT'];
        $url = $apiUrl . $postsEndpoint;
        $userRole = $_SESSION['user_role'];

        if ($userRole === 'editor') {
            // Fetch only the editor's posts
            $userId = $_SESSION['user_id'] ?? '';
            $url = $apiUrl . str_replace('{user_id}', $userId, $userPostsEndpoint);
        } else {
            // Fetch all posts with author information
            $url = $apiUrl . $postsEndpoint;
        }

        $response = CurlHelper::getRequest($url);
        $posts = json_decode($response['response'], true);

        if ($response['httpCode'] === 200 && !empty($posts)) {
            // Display the fetched posts data in a sortable table
            $this->renderSortableTable($posts, $userRole);
        } else {
            echo "Failed to fetch posts data.";
        }
    }

    private function renderSortableTable($posts, $userRole) {
        // Render the sortable table HTML
        include __DIR__ . '/../views/dashboardTable.php';
    }
}
