<?php
session_start();

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Admin\Pages\SignupForm;
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

// Determine which page to display based on URL
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'signup':
        $pageContent = new SignupForm();
        break;
    case 'login':
        $pageContent = new LoginForm();
        break;
    case 'dashboard':
        $pageContent = $loggedIn ? new DashboardContent() : new LoginForm();
        break;
    default:
        $pageContent = new LoginForm();
        break;
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>
<body>
    <?php $header->render($loggedIn, $username); ?>

    <?php if ($loggedIn): ?>
        <?php $navigation->render($loggedIn); ?>
    <?php endif; ?>

    <?php $content->render($pageContent); ?>

    <?php $footer->render(); ?>
</body>
</html>
