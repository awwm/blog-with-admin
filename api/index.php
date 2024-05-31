<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Database;
use App\Controllers\UserController;

// Set CORS headers
$allowed_origins = [
    'http://localhost:8080',
    'http://localhost:8081'
];

if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
}

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }
    exit(0);
}

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
