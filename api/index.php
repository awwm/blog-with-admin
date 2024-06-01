<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Database;
use App\Controllers\UserController;

// Start session
session_start();

// Get the database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the UserController
$userController = new UserController($db);

// Get the request method and data
$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : null;
$request = json_decode(file_get_contents('php://input'), true);

// Check if the action parameter is set
if(isset($action)) {
    switch ($action) {
        case 'login':
            if ($method === 'POST') {
                $response = $userController->login($request);
            } else {
                $response = ['success' => false, 'message' => 'Invalid method for login'];
            }
            break;
        case 'signup':
            if ($method === 'POST') {
                $response = $userController->signup($request);
            } else {
                $response = ['success' => false, 'message' => 'Invalid method for signup'];
            }
            break;
        default:
            $response = ['success' => false, 'message' => 'Invalid action'];
            break;
    }
} else {
    $response = ['success' => false, 'message' => 'No action specified'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
