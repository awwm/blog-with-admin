<?php
require_once __DIR__ . '/vendor/autoload.php';

use Admin\Config\Database;
use Admin\Controllers\UserController;

// Get the database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the UserController
$userController = new UserController($db);

// Get the request method and data
$method = $_SERVER['REQUEST_METHOD'];
$request = json_decode(file_get_contents('php://input'), true);

// Determine the endpoint and call the appropriate controller method
$endpoint = $_GET['endpoint'] ?? '';

switch ($endpoint) {
    case 'signup':
        if ($method == 'POST') {
            $response = $userController->signup($request);
        }
        break;
    case 'login':
        if ($method == 'POST') {
            $response = $userController->login($request);
        }
        break;
    default:
        $response = ['success' => false, 'message' => 'Invalid endpoint.'];
        break;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
