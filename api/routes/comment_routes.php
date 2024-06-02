<?php
use App\Controllers\CommentController;

// Comment routes
$router->post('/create-comment', function ($request) use ($commentController) {
    return $commentController->createComment($request);
});
?>
