<?php
require 'usuarios/backend/modelos/usuario.model.php';
?>

<?php
session_start();

require_once 'usuarios/backend/controladores/usuarios_controlador.php';

define('SITE_ROOT', realpath(dirname(__FILE__)));
$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

if (isset($_SESSION['logged']) === FALSE) {
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<title>SGC</title>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="vendor/images/icon-home.png" type="image/png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;800&display=swap">
	<link rel="stylesheet" href="vendor/semantic/semantic-2.4.0/semantic.min.css">
	<link rel="stylesheet" href="vendor/css/root/index/index.css?v=1.5">
	<link rel="stylesheet" href="vendor/css/menu_usuario.css">
	<link rel="stylesheet" href="vendor/css/preloader.css?n=1">
	<link rel="stylesheet" href="nav_responsive.css?v=1.1">
	<!-- BootStrap -->
	<link rel="stylesheet" href="vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
	<link rel="stylesheet" href="modalFirmas/stylesMdl.css?v=1.1">

</head>

<body>
	<div>
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

		<?php require 'nav.php'; ?>
		<div class="landing-image"></div>
		<div class="index_menu">

			<div class="ui compact vertical labeled icon menu">

				<div class="mantenimientos">
					<?php if ($rol == 1 || $rol == 17 || $rol == 18 || $usuario == 'EDISSON MONTOYA' || $usuario == 'CATHERINE DIAZ') { ?>
						<a class="item" href="mantenimientos/frontend/">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="28" height="28" viewBox="0 0 256 256" xml:space="preserve">
								<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
									<path d="M 89.161 11.093 c -0.109 -0.329 -0.381 -0.578 -0.719 -0.658 c -0.334 -0.078 -0.692 0.02 -0.937 0.266 l -7.189 7.189 c -1.096 1.096 -2.553 1.7 -4.104 1.7 c -1.55 0 -3.007 -0.603 -4.104 -1.699 c -2.262 -2.263 -2.262 -5.944 0 -8.207 l 7.189 -7.189 c 0.245 -0.245 0.346 -0.6 0.266 -0.937 c -0.079 -0.337 -0.329 -0.609 -0.658 -0.719 c -5.863 -1.945 -12.216 -0.449 -16.57 3.906 c -4.463 4.462 -5.916 11.049 -3.792 16.948 L 21.693 58.544 c -5.897 -2.124 -12.485 -0.67 -16.948 3.792 C 0.39 66.691 -1.107 73.04 0.838 78.906 c 0.109 0.329 0.381 0.579 0.719 0.658 c 0.335 0.081 0.692 -0.021 0.937 -0.266 l 7.189 -7.189 c 2.261 -2.263 5.943 -2.263 8.207 0 c 1.096 1.096 1.699 2.553 1.699 4.104 s -0.603 3.007 -1.7 4.104 l -7.189 7.189 c -0.245 0.245 -0.346 0.599 -0.266 0.937 c 0.08 0.338 0.329 0.609 0.658 0.719 c 1.7 0.563 3.44 0.839 5.16 0.839 c 4.218 0 8.317 -1.652 11.41 -4.745 c 4.463 -4.463 5.917 -11.049 3.793 -16.948 l 36.851 -36.851 c 5.9 2.123 12.485 0.671 16.948 -3.793 C 89.611 23.309 91.107 16.959 89.161 11.093 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									<path d="M 72.088 57.275 c -0.177 -0.177 -0.413 -0.28 -0.662 -0.292 c -3.462 -0.155 -7.078 -1.876 -9.923 -4.721 c -1.742 -1.743 -3.065 -3.782 -3.863 -5.897 L 46.517 57.488 c 2.115 0.799 4.154 2.121 5.897 3.863 c 2.845 2.846 4.565 6.462 4.721 9.923 c 0.012 0.249 0.115 0.485 0.292 0.662 l 14.876 14.876 c 2.021 2.021 4.676 3.031 7.33 3.031 c 2.655 0 5.311 -1.01 7.331 -3.031 c 4.041 -4.042 4.041 -10.619 0 -14.661 L 72.088 57.275 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									<path d="M 5.351 14.171 c 0.123 0.219 0.324 0.384 0.563 0.462 l 5.82 1.89 l 23.869 23.869 l 4.638 -4.638 L 16.372 11.885 l -1.891 -5.82 c -0.078 -0.239 -0.243 -0.44 -0.462 -0.563 L 4.714 0.279 c -0.391 -0.219 -0.88 -0.151 -1.196 0.165 L 0.293 3.668 c -0.317 0.317 -0.384 0.806 -0.165 1.196 L 5.351 14.171 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
								</g>
							</svg>
							<div style="margin-bottom: 2px; margin-left: -6px;">Mantenimientos</div>
						</a>
					<?php } ?>
				</div>

				<div class="archivos">
					<?php if ($rol == 1 || $rol == 20 || $rol == 24) { ?>
						<a class="item" href="archivos/frontend/">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="27" height="27" viewBox="0 0 256 256" xml:space="preserve">
								<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
									<path d="M 90 66.551 c 0 1.446 -1.176 2.621 -2.621 2.621 h -1.512 V 38.681 c 0 -5.089 -4.141 -9.23 -9.23 -9.23 H 46.279 c -1.958 -0.569 -3.303 -2.343 -3.303 -4.407 c 0 -5.427 -4.415 -9.842 -9.842 -9.842 H 9.766 c 0.046 -2.286 1.912 -4.133 4.208 -4.133 h 28.918 c 2.325 0 4.216 1.891 4.216 4.217 c 0 4.801 3.27 8.897 7.951 9.962 c 0.205 0.046 0.414 0.07 0.624 0.07 h 30.711 c 1.989 0 3.606 1.617 3.606 3.605 V 66.551 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									<path d="M 76.637 35.076 H 45.926 c -0.21 0 -0.419 -0.024 -0.623 -0.07 c -4.682 -1.065 -7.951 -5.161 -7.951 -9.962 c 0 -2.325 -1.891 -4.217 -4.217 -4.217 H 4.217 C 1.891 20.827 0 22.719 0 25.044 v 51.265 c 0 1.446 1.176 2.621 2.621 2.621 h 74.999 c 1.446 0 2.621 -1.176 2.621 -2.621 V 38.681 C 80.242 36.693 78.625 35.076 76.637 35.076 z M 29.16 44.958 c 0 2.318 -1.886 4.203 -4.203 4.203 H 13.363 c -2.318 0 -4.203 -1.885 -4.203 -4.203 v -4.622 c 0 -2.318 1.885 -4.203 4.203 -4.203 h 11.594 c 2.318 0 4.203 1.886 4.203 4.203 V 44.958 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
								</g>
							</svg>
							<div style="margin-bottom: 2px">Archivos</div>
						</a>
					<?php } ?>
				</div>
				<div class="facturas">
					<?php if ($rol == 1 || $usuario == 'MANUELA MUÑOZ') { ?>
						<a class="item" href="facturas/frontend/">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="27" height="27" viewBox="0 0 256 256" xml:space="preserve">
								<defs></defs>
								<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
									<path d="M 86.181 3.998 H 3.819 C 1.71 3.998 0 5.708 0 7.817 v 55.461 c 0 2.109 1.71 3.819 3.819 3.819 h 10.129 v 18.904 L 33.21 67.098 h 52.97 c 2.109 0 3.819 -1.71 3.819 -3.819 V 7.817 C 90 5.708 88.29 3.998 86.181 3.998 z M 45 57.998 c -3.504 0 -6.355 -2.851 -6.355 -6.355 c 0 -3.504 2.851 -6.354 6.355 -6.354 s 6.354 2.85 6.354 6.354 C 51.354 55.147 48.504 57.998 45 57.998 z M 51.354 36.582 c 0 3.504 -2.85 6.354 -6.354 6.354 s -6.355 -2.851 -6.355 -6.354 V 18.544 c 0 -2.128 1.732 -3.86 3.86 -3.86 h 4.99 c 2.128 0 3.859 1.732 3.859 3.86 V 36.582 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
								</g>
							</svg>
							<br>
							<div style="margin-bottom: 2px">FACTURAS</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery3.3.1.min.js"></script>
	<script src="vendor/js/general.js"></script>
	<script src="vendor/sweet_alert/sweetalert2.all.min.js"></script>
	<!-- Utilidades -->
	<script src="modalFirmas/functionsMdl.js?v=1"></script>

	<!-- Jquery JS-->
	<script src="vendor/jquery/jquery3.3.1.min.js"></script>
	<script src="vendor/sweet_alert/sweetalert2.all.min.js"></script>
	<script src="vendor/DataTables/datatables.min.js"></script>
	<script src="vendor/DataTables/DataTables-1.11.4/js/dataTables.bootstrap5.js"></script>
	<!-- Local Utilities -->
	<script src="vendor/js/menu_usuario.js"></script>
	<script src="vendor/js/general.js"></script>

	<!-- Bootstrap -->
	<script src="vendor/bootstrap/bootstrap-3.3.7/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>