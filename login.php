<?php

// Lee el archivo .env y carga las variables de entorno
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[$key]        = $value;
        }
    }
}

// Iniciamos Sesion ( si la cookie se comparte)
session_start();

// Destruimos la sesion
session_destroy();

// La volvemos a iniciar en limpio
session_start();

require_once 'log.php';

/*_________________________________________
  <?php if($_SESSION['rol']==1) { ?>ADMINISTRADOR<?php } ?>
 <?php if($_SESSION['rol']==2) { ?>CONTRATOS<?php } ?>
  <?php if($_SESSION['rol']==3) { ?>ASESOR<?php } ?>*/

try {
    $conexionPdo = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    $conexionPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die($e->getMessage());
}

//   $conexionPdo = null;

?>

<?php

if (isset($_REQUEST['iniciar'])) {
    $usuario  = $_REQUEST['usuario'];
    $password = $_REQUEST['contrasena'];

    $sql = $conexionPdo->prepare("SELECT id, usuario, nombres, apellidos, contrasena, rol, doc_identidad FROM usuarios WHERE usuario='$usuario' AND rol != 0");
    $sql->execute();
    $login = $sql->fetch(PDO::FETCH_ASSOC);


    if (!$login || $login['rol'] === '0') {
        $mensaje = 'El Nombre de usuario que has introducido no existe.';
    }
    if (!isset($mensaje) && !password_verify($password, $login['contrasena'])) {
        $mensaje = 'La Contraseña que has Introducido es Incorrecta.';
    }
    if (isset($mensaje)) {
        echo "<script language='javascript'>alert('$mensaje');</script>";
        echo '<script language="javascript">location.assign("./");</script>';
        die;
    }
    $_SESSION['logged']     = "Logged";
    $_SESSION['usuario']    = $login['usuario'];
    $_SESSION['nombres']    = $login['nombres'];
    $_SESSION['apellidos']  = $login['apellidos'];
    $_SESSION['contrasena'] = $login['contrasena'];
    $_SESSION['id']         = $login['id'];
    $_SESSION['rol']        = $login['rol'];
    $_SESSION['cc']         = $login['doc_identidad'];

    $log = new Log_Visita();
    $log->__SET('id_log', '');
    $log->__SET('usuario', $login['usuario']);
    $log->__SET('fecha_ingreso', '');
    $log->__SET('fecha_salida', '');

    $modelL = new LogModel();
    $modelL->Registrar($log);
    echo '<script language="javascript">location.assign("./");</script>';
    return;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="vendor/images/icon-home.png" type="image/png">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Iniciar Sesión</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap-3.3.2/bootstrap3.3.2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="vendor/animate/animate.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="vendor/css/root/login/css/util.css">
    <link rel="stylesheet" href="vendor/css/root/login/css/main.css?v=2">
    <link rel="stylesheet" href="vendor/css/preloader.css?n=1">


</head>

<body style="background-color:black">
    <div>
        <div style="background-color:black">
            <div>
                <form id="login-form" method="post" class="login100-form validate-form">
                    <div class="login100-form-avatar">
                        <img src="vendor/images/icon-home.jpg" alt="gestionadministrativa">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Ingresa
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Ingrese su Usuario">
                        <input class="input100" type="text" name="usuario" placeholder="Usuario">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Ingrese su Clave">
                        <input class="input100" type="password" name="contrasena" placeholder="Contraseña">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" name="iniciar" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery3.3.1.min.js"></script>
    <script src="vendor/js/general.js"></script>
    <script src="vendor/js/root/login/js/main.js?v=1"></script>


</body>


</html>