<?php

class DB {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        // Especifica la ruta al archivo .env
        $dotenv_path = __DIR__ . '/../../.env';

        // Carga las variables de entorno desde el archivo .env
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

        // Asigna los valores de las variables de entorno a las propiedades de la clase
        $this->host = $env_vars['DB_HOST'] ?? '';
        $this->db = $env_vars['DB_DATABASE'] ?? '';
        $this->user = $env_vars['DB_USER'] ?? '';
        $this->password = $env_vars['DB_PASSWORD'] ?? '';
        $this->charset = 'utf8mb4';
    }

    function connect(){

        try {

            $connection = "mysql:host=".$this->host.";dbname=" . $this->db . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $pdo = new PDO($connection,$this->user,$this->password);

            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}

?>
