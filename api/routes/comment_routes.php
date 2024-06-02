<?php
use App\Controllers\CommentController;

// Assume $db is already available here from the parent script
$commentController = new CommentController($db);

// Comment routes
$router->post('/create-comment', function ($request) use ($commentController) {
    return $commentController->createComment($request);
});
?>
