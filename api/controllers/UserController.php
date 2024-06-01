<?php
namespace App\Controllers;

use App\Models\User;
use PDO;

class UserController {
    private $db;
    private $userModel;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function signup($request) {
        $username = $request['username'] ?? '';
        $email = $request['email'] ?? '';
        $password = $request['password'] ?? '';
        $role = $request['role'] ?? 'editor';

        if (empty($username) || empty($email) || empty($password)) {
            return ['success' => false, 'message' => 'All fields are required.'];
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $result = $this->userModel->createUser($username, $email, $hashedPassword, $role);

        if ($result) {
            return ['success' => true, 'message' => 'User created successfully.'];
        } else {
            return ['success' => false, 'message' => 'Failed to create user.'];
        }
    }

    public function login($request) {
        $username = $request['username'] ?? '';
        $password = $request['password'] ?? '';

        if (empty($username) || empty($password)) {
            return ['success' => false, 'message' => 'All fields are required.'];
        }

        $userData = $this->userModel->getUserByUsername($username);

        if ($userData && password_verify($password, $userData['password'])) {
            // Start session and set session variables
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            $_SESSION['role'] = $userData['role'];
            // Return user ID and username in the response
            return [
                'success' => true,
                'message' => 'Login successful.',
                'user_id' => $userData['id'],
                'username' => $userData['username']
            ];
        } else {
            return ['success' => false, 'message' => 'Invalid username or password.'];
        }
    }
}
?>
