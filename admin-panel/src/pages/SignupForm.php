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
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-xl-6 col-lg-8 col-12">
                <div class="card p-4 shadow-lg">
                    <h2 class="text-center">Sign Up</h2>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="role" required>
                                <option value="editor">Editor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <p class="mt-3 text-center">Already have an account? <a href="index.php?page=login">Log in</a></p>
                </div>
            </div>
        </div>
        <?php
    }
}
?>