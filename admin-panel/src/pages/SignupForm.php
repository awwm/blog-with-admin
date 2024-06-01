<?php
namespace Admin\Pages;

use Dotenv\Dotenv;
use Admin\Middleware\AuthMiddleware;

class SignupForm {
    public function __construct() {
        // Initialize and load environment variables
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    public function render() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            $response = AuthMiddleware::signup($username, $email, $password, $role);

            if ($response['success']) {
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                echo $response['message'];
            }
        }
        ?>
        <section>
            <h2>Sign Up</h2>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="editor">Editor</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="index.php?page=login">Log in</a></p>
        </section>
        <?php
    }
}
?>