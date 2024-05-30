<?php
session_start();

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Admin\Pages\LoginForm;
use Admin\Pages\DashboardContent;

// Instantiate classes
$header = new \Admin\Components\Header();
$footer = new \Admin\Components\Footer();
$navigation = new \Admin\Components\Navigation();
$content = new \Admin\Views\Content();

// Check login status
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Determine which content to render based on login status
if ($loggedIn) {
    $contentInstance = new DashboardContent(); // Instantiate DashboardContent class
} else {
    $contentInstance = new LoginForm(); // Instantiate LoginForm class
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="src/assets/css/styles.css">
    <!-- Include any other necessary CSS files -->
</head>
<body>
    <?php $header->render($loggedIn, $username); ?>

    <?php if ($loggedIn): ?>
        <?php $navigation->render($loggedIn); ?>
    <?php endif; ?>

    <?php $content->render($contentInstance); ?>

    <?php $footer->render(); ?>
</body>
</html>
