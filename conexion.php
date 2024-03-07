<?php

class Conexion{
    static public function conectar(){
        $envFile = __DIR__ . '/.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos($line, '=') !== false) {
                    list($key, $value) = explode('=', $line, 2);
                    $_ENV[$key] = $value;
                }
            }
        }

        $host = $_ENV['DB_HOST'] ?? '';
        $db = $_ENV['DB_DATABASE'] ?? '';
        $user = $_ENV['DB_USER'] ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';

        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $conn->exec("set names utf8");
        return $conn;
    }
}
