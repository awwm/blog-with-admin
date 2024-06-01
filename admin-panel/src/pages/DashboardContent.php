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
        $postsEndpoint = $_ENV['POSTS_ENDPOINT']; // Adjust the endpoint according to your API
        $url = $apiUrl . $postsEndpoint;
        $userRole = $_SESSION['user_role'] ?? 'editor';

        if ($userRole === 'editor') {
            // Fetch only the editor's posts
            $userId = $_SESSION['user_id'] ?? '';
            $url = $apiUrl . $postsEndpoint . '?user_id=' . $userId;
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
        ?>
        <table id="postsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <?php if ($userRole === 'admin'): ?>
                        <th>Author</th>
                    <?php endif; ?>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($posts['success']) && $posts['success'] === true) : ?>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <?php if ($userRole === 'admin'): ?>
                                <td><?php echo $post['author']; ?></td>
                            <?php endif; ?>
                            <td><?php echo $post['date_posted']; ?></td>
                            <td><a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <script src="src/assets/js/dashboard.js"></script>
        <?php
    }
}
