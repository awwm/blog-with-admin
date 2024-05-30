<?php
namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthHelper {
    private static $secretKey = 'your_secret_key';
    private static $algorithm = 'HS256';

    public static function generateJWT($data) {
        $payload = [
            'iss' => 'http://localhost:8082',
            'aud' => 'http://localhost:8082',
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + (60 * 60), // Token expires in 1 hour
            'data' => $data
        ];
        return JWT::encode($payload, self::$secretKey, self::$algorithm);
    }

    public static function validateJWT($jwt) {
        try {
            $decoded = JWT::decode($jwt, new Key(self::$secretKey, self::$algorithm));
            return (array) $decoded->data;
        } catch (\Exception $e) {
            return null;
        }
    }
}
?>
