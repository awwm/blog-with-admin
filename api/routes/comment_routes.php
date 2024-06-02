<?php
use App\Controllers\CommentController;

// Comment routes
$router->post('/create-comment', function ($request) use ($commentController) {
    return $commentController->createComment($request);
});

$router->get('/get-post-comments/{post_id}', function ($request, $post_id) use ($commentController) {
    return $commentController->getPostComments($post_id);
});
?>
