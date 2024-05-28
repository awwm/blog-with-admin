<?php
// Include necessary files
require_once 'config/database.php';
require_once 'controllers/UserController.php';
require_once 'controllers/PostController.php';
require_once 'controllers/CommentController.php';
require_once 'helpers/AuthHelper.php';

// Create database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate controllers
$userController = new UserController();
$postController = new PostController();
$commentController = new CommentController();

// Get request method and endpoint
$request_method = $_SERVER['REQUEST_METHOD'];
$endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : '';

// Handle API requests based on request method and endpoint
switch ($request_method) {
    case 'POST':
        if ($endpoint == 'users') {
            // Create a new user
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($userController->create($data));
        } elseif ($endpoint == 'posts') {
            // Create a new post
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($postController->create($data));
        } elseif ($endpoint == 'comments') {
            // Create a new comment
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($commentController->create($data));
        } else {
            // Endpoint not found
            http_response_code(404);
            echo json_encode(array("error" => "Endpoint not found."));
        }
        break;
    
    // Handle other request methods (GET, PUT, DELETE) and endpoints similarly
    
    default:
        // Invalid request method
        http_response_code(405);
        echo json_encode(array("error" => "Invalid request method."));
        break;
}
?>