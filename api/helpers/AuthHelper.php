<?php
class AuthHelper {
    // Start session
    public static function startSession() {
        session_start();
    }

    // Check if user is logged in
    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Log in user
    public static function login($user_id) {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Set user ID in session
        $_SESSION['user_id'] = $user_id;
    }

    // Log out user
    public static function logout() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Unset user ID from session
        unset($_SESSION['user_id']);

        // Destroy session
        session_destroy();
    }
}
?>