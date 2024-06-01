<?php
namespace Admin\Pages;

use Dotenv\Dotenv;
use Admin\Middleware\AuthMiddleware;

class LoginForm {
    public function __construct() {
        // Initialize and load environment variables
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    public function render() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $response = AuthMiddleware::login($username, $password);

            if ($response['success']) {
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                echo $response['message'];
            }
        }
        // HTML form for login
        ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php?page=signup">Signup</a></p>
    <?php
    }
}
?>