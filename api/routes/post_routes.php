<?php
use App\Controllers\PostController;

// Post routes
$router->get('/posts', function () use ($postController) {
    return $postController->getAllPosts();
});

$router->get('/posts/user/{user_id}', function ($request, $user_id) use ($postController) {
    return $postController->getUserPosts($user_id);
});

$router->get('/posts/author/{author_name}', function ($request, $author_name) use ($postController) {
    return $postController->getPostsByAuthor($author_name);
});

$router->post('/create-post', function ($request) use ($postController) {
    return $postController->createPost($request);
});

$router->get('/get-post/{post_id}', function ($request, $post_id) use ($postController) {
    return $postController->getSinglePost($post_id);
});

$router->put('/update-post/{post_id}', function ($request, $post_id) use ($postController) {
    return $postController->updatePost($post_id, $request);
});

$router->delete('/delete-post/{post_id}', function ($request, $post_id) use ($postController) {
    return $postController->deletePost($post_id);
});
?>
