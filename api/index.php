<?php
// Include the Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';
require_once('cors.php');

use App\Config\Database;
use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\CommentController;
use App\Router;

// Start session
session_start();

// Get the database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the controllers
$userController = new UserController($db);
$postController = new PostController($db);
$commentController = new CommentController($db);

// Create a router instance
$router = new Router();

// Include route files
include_once __DIR__ . '/routes/user_routes.php';
include_once __DIR__ . '/routes/post_routes.php';
include_once __DIR__ . '/routes/comment_routes.php';

// Get request method and URI
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
$requestData = json_decode(file_get_contents('php://input'), true);
$response = $router->route($method, $uri, $requestData);

// Set the response headers
header('Content-Type: application/json');

// Output the response
echo json_encode($response);
?>
