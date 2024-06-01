<?php
use App\Controllers\UserController;

// Assume $db is already available here from the parent script
$userController = new UserController($db);

// Define user routes
$router->post('/login', function ($request) use ($userController) {
    return $userController->login($request);
});

$router->post('/signup', function ($request) use ($userController) {
    return $userController->signup($request);
});
?>
