<?php
// Define la ruta al archivo .env
$dotenv_path = __DIR__ . '/../../.env';

// Lee el archivo .env y parsea las variables de entorno
$dotenv = file_get_contents($dotenv_path);
$dotenv_lines = explode("\n", $dotenv);
$env_vars = [];

foreach ($dotenv_lines as $line) {
    $line = trim($line);
    if ($line !== '' && strpos($line, '=') !== false && strpos($line, '#') !== 0) {
        list($name, $value) = explode('=', $line, 2);
        $env_vars[$name] = $value;
    }
}

// Obtén las variables de entorno necesarias para la conexión a la base de datos
$usuario  = $env_vars['DB_USER'] ?? '';
$password = $env_vars['DB_PASSWORD'] ?? '';
$servidor = $env_vars['DB_HOST'] ?? '';
$basededatos = $env_vars['DB_DATABASE'] ?? '';

// Realiza la conexión a la base de datos
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>
