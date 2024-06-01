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

use Admin\Pages\SignupForm;
use Admin\Pages\LoginForm;
use Admin\Pages\DashboardContent;
use Admin\Components\Header;
use Admin\Components\Footer;
use Admin\Components\Navigation;
use Admin\Views\Content;

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
    case 'signout':
        session_destroy();
        header('Location: index.php?page=login');
        exit;
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body>
    <?php $header->render(isset($_SESSION['user_id']), $_SESSION['user_id'] ?? null); ?>

    <?php if (isset($_SESSION['user_id'])): ?>
        <?php $navigation->render(true); ?>
    <?php endif; ?>

    <?php $content->render($pageContent); ?>

    <?php $footer->render(); ?>
</body>
</html>
<?php
// End output buffering and flush output
ob_end_flush();
?>
