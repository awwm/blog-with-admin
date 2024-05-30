<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UserController;
use App\Database\Connection;

header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$input = json_decode(file_get_contents('php://input'), true);

$connection = new Connection();
$db = $connection->getConnection();
$userController = new UserController($db);

$response = [];

switch ($path) {
    case '/signup':
        if ($method === 'POST') {
            $response = $userController->signup($input);
        } else {
            $response = ['success' => false, 'message' => 'Invalid request method.'];
        }
        break;

    case '/login':
        if ($method === 'POST') {
            $response = $userController->login($input);
        } else {
            $response = ['success' => false, 'message' => 'Invalid request method.'];
        }
        break;

    default:
        $response = ['success' => false, 'message' => 'Endpoint not found.'];
        break;
}

echo json_encode($response);
?>
