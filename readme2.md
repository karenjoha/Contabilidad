<?php

// Iniciamos Sesion ( si la cookie se comparte)
session_start();

// Destruimos la sesion
session_destroy();

// La volvemos a iniciar en limpio
session_start();
require_once 'log.php';

try {
	$conexionPdo = new PDO('mysql:host=localhost;dbname=contabilidad', 'root', '');
	$conexionPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	die($e->getMessage());
}

?>

<?php

if (isset($_REQUEST['iniciar'])) {
	$usuario  = $_REQUEST['usuario'];

	$sql = $conexionPdo->prepare("SELECT id, usuario, nombres, apellidos, contrasena, rol, doc_identidad FROM usuarios WHERE usuario='$usuario' AND rol != 0");
	$sql->execute();
	$login = $sql->fetch(PDO::FETCH_ASSOC);

	if (!$login || $login['rol'] === '0') {
		$mensaje = 'El Nombre de usuario que has introducido no existe.';
	}
	if (isset($mensaje)) {
		echo "<script language='javascript'>alert('$mensaje');</script>";
		echo '<script language="javascript">location.assign("./");</script>';
		die;
	}
	$_SESSION['logged']        = "Logged";
	$_SESSION['usuario']       = $login['usuario'];
	$_SESSION['nombres']       = $login['nombres'];
	$_SESSION['apellidos']     = $login['apellidos'];
	$_SESSION['contrasena']    = $login['contrasena'];
	$_SESSION['id']            = $login['id'];
	$_SESSION['rol']           = $login['rol'];
	$_SESSION['cc']            = $login['doc_identidad'];

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

<body>
	<div class="loader_container">
		<div class="loader">
			<div class="one"></div>
			<div class="two"></div>
			<div class="three"></div>
			<div class="four"></div>
			<div class="five"></div>
			<div class="six"></div>
			<div class="seven"></div>
			<div class="eight"></div>
		</div>
	</div>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('vendor/images/background-login.jpg');">
			<div class="wrap-login100 p-b-30">
				<form id="login-form" method="post" class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="vendor/images/icon-home.jpg" alt="contabilidad">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Portada Inmobiliaria
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Ingrese su Usuario">
						<input class="input100" type="text" name="usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
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

codigo para cuando la contraseña falla
