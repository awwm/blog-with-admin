<?php
namespace App\Controllers;

use App\Models\User;
use App\Helpers\AuthHelper;
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
            $token = AuthHelper::generateJWT(['username' => $username, 'email' => $email, 'role' => $role]);
            return ['success' => true, 'message' => 'User created successfully.', 'token' => $token];
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
            $token = AuthHelper::generateJWT(['username' => $userData['username'], 'email' => $userData['email'], 'role' => $userData['role']]);
            return ['success' => true, 'message' => 'Login successful.', 'token' => $token];
        } else {
            return ['success' => false, 'message' => 'Invalid username or password.'];
        }
    }
}
?>
