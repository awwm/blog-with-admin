<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Start output buffering
ob_start();

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Admin\Middleware\AuthMiddleware;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Components
use Admin\Components\Header;
use Admin\Components\Footer;
use Admin\Components\Navigation;

// Template
use Admin\Views\Content;

//Pages
use Admin\Pages\SignupForm;
use Admin\Pages\LoginForm;
use Admin\Pages\DashboardContent;
use Admin\Pages\EditPost;
use Admin\Pages\AddNewPost;

// Instantiate classes
$header = new Header();
$footer = new Footer();
$navigation = new Navigation();
$content = new Content();

// Determine the page to load
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

// Check if the current page requires authentication
$publicPages = ['login', 'signup', 'signout'];

if (!in_array($page, $publicPages)) {
    AuthMiddleware::checkAuth();
}

switch ($page) {
    case 'signup':
        $pageContent = new SignupForm();
        break;
    case 'login':
        $pageContent = new LoginForm();
        break;
    case 'dashboard':
        $pageContent = new DashboardContent();
        break;
    case 'editpost':
        // Check if the 'id' parameter is set in the URL
        if (isset($_GET['id'])) {
            // Extract the 'id' from the URL parameters
            $postId = $_GET['id'];
            // Create an instance of the EditPost class and pass the postId to its constructor
            $pageContent = new EditPost($postId);
        } else {
            // Handle the case where 'id' parameter is missing
            echo "Error: Missing 'id' parameter.";
            exit();
        }
        break;
    case 'signout':
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    case 'addnewpost':
        $pageContent = new AddNewPost();
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/styles.css">
    <!-- Tiny MCe -->
    <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
</head>
<body>
    <?php $header->render(isset($_SESSION['user_id']), $_SESSION['username'] ?? null); ?>

    <?php if (isset($_SESSION['user_id'])): ?>
        <?php // $navigation->render(true); ?>
    <?php endif; ?>

    <?php $content->render($pageContent); ?>

    <?php $footer->render(); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// End output buffering and flush output
ob_end_flush();
?>
