<?php
namespace Admin\Middleware;

use Admin\Helpers\CurlHelper;

class AuthMiddleware {
    public static function checkAuth() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
            header('Location: index.php?page=login');
            exit();
        }
    }

    public static function login($username, $password) {
        $apiUrl = $_ENV['API_URL'];
        $loginEndpoint = $_ENV['LOGIN_ENDPOINT'];
        $url = $apiUrl . $loginEndpoint;

        try {
            $result = CurlHelper::postRequest($url, [
                'username' => $username,
                'password' => $password
            ]);

            $response = json_decode($result['response'], true);
            if ($result['httpCode'] >= 400) {
                throw new \Exception('HTTP error: ' . $result['httpCode']);
            }

            if ($response && $response['success']) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['user_id'] = $response['user_id'];
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_role'] = $response['user_role'];

                return ['success' => true];
            } else {
                throw new \Exception("Login failed: " . ($response['message'] ?? 'Invalid credentials'));
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    public static function signup($username, $email, $password, $role) {
        $apiUrl = $_ENV['API_URL'];
        $signupEndpoint = $_ENV['SIGNUP_ENDPOINT'];
        $url = $apiUrl . $signupEndpoint;

        try {
            $result = CurlHelper::postRequest($url, [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ]);

            $response = json_decode($result['response'], true);
            if ($result['httpCode'] >= 400) {
                throw new \Exception('HTTP error: ' . $result['httpCode']);
            }

            if ($response && $response['success']) {
                return ['success' => true];
            } else {
                throw new \Exception("Signup failed: " . ($response ?? 'Unknown error'));
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
?>
