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
				<div class="terminacion_contratos" style="display: flex; flex-direction: right;">
					<?php if ($rol == 1 or $rol == 21 or $rol == 22 or $usuario == 'VERONICA VELEZ' or $usuario == "CATHERINE DIAZ") { ?>
						<a class="item" href="terminacion_contratos/frontend/">
							<svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="22" height="22" viewBox="0 0 256 256" xml:space="preserve">
								<desc>Created with Fabric.js 1.7.22</desc>
								<defs>
								</defs>
								<g transform="translate(128 128) scale(0.72 0.72)">
									<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
										<path d="M 52.421 0 h -37.56 c -1.662 0 -3.01 1.347 -3.01 3.01 V 86.99 c 0 1.662 1.347 3.01 3.01 3.01 h 60.278 c 1.662 0 3.009 -1.347 3.009 -3.01 V 20.98 H 52.421 V 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<polygon points="55.93,0 55.93,17.47 78.15,17.47 " style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) " />
									</g>
								</g>
							</svg>
							<div style="margin-bottom: 2px;">Terminación Contratos</div>
						</a>
					<?php } ?>

				</div>

				<div class="sagrilaft">
					<?php if ($rol == 1 or $rol == 6 or $usuario == 'VERONICA VELEZ' or $usuario == 'SOL GOMEZ' or $usuario == 'JUAN GONZALEZ' or $usuario == 'ISABEL MONSALVE') { ?>
						<a class="item" href="sagrilaft/frontend/index.php">
							<svg style="margin-bottom: 5px; margin-top: 6px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
								<path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z" />
								<path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z" />
								<path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z" />
							</svg>
							<div style="margin-bottom: 2px;">Sagrilaft </div>
						</a>
					<?php } ?>
				</div>

				<div class="gestion_humana">
					<?php if ($rol == 1) { ?>
						<a class="item" href="gestion_humana/">
							<svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="28" height="28" viewBox="0 0 256 256" xml:space="preserve">
								<desc>Created with Fabric.js 1.7.22</desc>
								<defs>
								</defs>
								<g transform="translate(128 128) scale(0.72 0.72)">
									<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
										<path d="M 62.993 75.484 H 27.007 c -0.904 0 -1.636 -0.733 -1.636 -1.636 V 57.642 c 0 -6.762 5.481 -12.243 12.243 -12.243 h 14.772 c 6.762 0 12.243 5.481 12.243 12.243 v 16.206 C 64.629 74.751 63.897 75.484 62.993 75.484 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 45.531 40.146 h -1.062 c -5.737 0 -10.388 -4.651 -10.388 -10.388 v -4.853 c 0 -5.737 4.651 -10.388 10.388 -10.388 h 1.062 c 5.737 0 10.388 4.651 10.388 10.388 v 4.853 C 55.919 35.495 51.268 40.146 45.531 40.146 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 74.555 35.243 h -0.859 c -4.64 0 -8.401 -3.761 -8.401 -8.401 v -3.925 c 0 -4.64 3.761 -8.401 8.401 -8.401 h 0.859 c 4.64 0 8.401 3.761 8.401 8.401 v 3.925 C 82.956 31.482 79.195 35.243 74.555 35.243 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 15.445 35.243 h 0.859 c 4.64 0 8.401 -3.761 8.401 -8.401 v -3.925 c 0 -4.64 -3.761 -8.401 -8.401 -8.401 h -0.859 c -4.64 0 -8.401 3.761 -8.401 8.401 v 3.925 C 7.044 31.482 10.805 35.243 15.445 35.243 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 62.993 75.484 H 27.007 c -0.904 0 -1.636 -0.733 -1.636 -1.636 V 57.642 c 0 -6.762 5.481 -12.243 12.243 -12.243 h 14.772 c 6.762 0 12.243 5.481 12.243 12.243 v 16.206 C 64.629 74.751 63.897 75.484 62.993 75.484 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 80.099 39.291 h -0.695 H 68.152 h -0.695 c -2.785 0 -5.297 1.154 -7.095 3.006 c -0.525 0.541 -0.342 1.439 0.325 1.79 c 4.671 2.457 7.859 7.352 7.859 12.996 v 4.902 c 0 0.904 0.733 1.636 1.636 1.636 h 0.9 h 5.391 h 11.89 c 0.904 0 1.636 -0.733 1.636 -1.636 V 49.192 C 90 43.724 85.567 39.291 80.099 39.291 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 21.453 57.083 c 0 -5.645 3.188 -10.539 7.859 -12.996 c 0.667 -0.351 0.85 -1.249 0.325 -1.79 c -1.798 -1.852 -4.31 -3.006 -7.095 -3.006 h -0.695 H 10.596 H 9.901 C 4.433 39.291 0 43.724 0 49.192 v 12.793 c 0 0.904 0.733 1.636 1.636 1.636 h 11.89 h 5.391 h 0.9 c 0.904 0 1.636 -0.733 1.636 -1.636 V 57.083 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									</g>
								</g>
							</svg>
							<div style="margin-bottom: 2px;">Gestión Humana</div>
						</a>
					<?php } ?>
				</div>

				<div class="digitalizaciones">
					<?php if ($rol == 1) { ?>
						<a class="item" href="gestion_humana/">
							<svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="28" height="28" viewBox="0 0 256 256" xml:space="preserve">
								<desc>Created with Fabric.js 1.7.22</desc>
								<defs>
								</defs>
								<g transform="translate(128 128) scale(0.72 0.72)">
									<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
										<path d="M 77.474 17.28 L 61.526 1.332 C 60.668 0.473 59.525 0 58.311 0 H 15.742 c -2.508 0 -4.548 2.04 -4.548 4.548 v 80.904 c 0 2.508 2.04 4.548 4.548 4.548 h 58.516 c 2.508 0 4.549 -2.04 4.549 -4.548 V 20.496 C 78.807 19.281 78.333 18.138 77.474 17.28 z M 61.073 5.121 l 12.611 12.612 H 62.35 c -0.704 0 -1.276 -0.573 -1.276 -1.277 V 5.121 z M 74.258 87 H 15.742 c -0.854 0 -1.548 -0.694 -1.548 -1.548 V 4.548 C 14.194 3.694 14.888 3 15.742 3 h 42.332 v 13.456 c 0 2.358 1.918 4.277 4.276 4.277 h 13.457 v 64.719 C 75.807 86.306 75.112 87 74.258 87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 26.806 75.278 c -1.29 0 -2.11 -0.732 -2.473 -1.15 l -0.14 -0.162 l -0.089 -0.193 c -0.854 -1.853 -1.232 -4.745 1.809 -8.01 c 2.483 -2.666 6.624 -4.957 11.318 -6.697 c 1.585 -2.964 3.067 -6.128 4.265 -9.157 c -2.997 -4.992 -4.234 -10.248 -2.971 -13.719 c 0.709 -1.948 2.179 -3.174 4.14 -3.452 l 0.211 -0.015 c 2.147 0 3.689 1.282 4.232 3.516 c 0.729 3.003 -0.306 7.954 -2.271 13.335 c 0.745 1.108 1.601 2.216 2.567 3.293 c 0.912 1.101 1.842 2.1 2.771 2.999 c 5.057 -0.67 9.654 -0.562 12.521 0.52 c 3.231 1.219 3.771 3.396 3.804 4.586 l 0.001 0.03 c 0.016 1.91 -0.942 3.359 -2.63 3.976 c -3.511 1.286 -9.379 -1.229 -14.678 -5.943 c -3.251 0.526 -6.669 1.374 -9.849 2.472 c -3.526 6.359 -7.529 11.694 -10.478 13.216 C 28.081 75.126 27.395 75.278 26.806 75.278 z M 26.714 72.252 c 0.112 0.046 0.321 0.038 0.776 -0.197 c 1.955 -1.009 4.643 -4.384 7.299 -8.718 c -2.787 1.308 -5.143 2.82 -6.681 4.471 C 26.094 69.97 26.427 71.524 26.714 72.252 z M 53.291 58.535 c 4.155 3.122 7.893 4.232 9.55 3.624 c 0.321 -0.117 0.662 -0.31 0.659 -1.119 c -0.01 -0.333 -0.063 -1.169 -1.864 -1.849 C 59.685 58.454 56.703 58.272 53.291 58.535 z M 43.53 52.896 c -0.677 1.611 -1.421 3.235 -2.208 4.829 c 1.733 -0.499 3.498 -0.924 5.243 -1.266 c -0.488 -0.526 -0.967 -1.072 -1.432 -1.634 C 44.57 54.198 44.035 53.553 43.53 52.896 z M 42.982 35.724 c -0.531 0.094 -1.232 0.375 -1.639 1.492 c -0.705 1.937 -0.214 5.265 1.519 8.907 c 1.234 -3.82 1.822 -7.146 1.329 -9.176 C 43.936 35.892 43.479 35.739 42.982 35.724 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									</g>
								</g>
							</svg>
							<div style="margin-bottom: 2px;">Digitalizaciones</div>
						</a>
					<?php } ?>
				</div>

				<div class="empleados">
					<?php if ($rol == 1 or $rol == 5) { ?>
						<a class="item" href="empleados/">
							<svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
								<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
							</svg>
							<div style="margin-bottom: 2px;">Empleados</div>
						</a>
					<?php } ?>
				</div>


				<div class="dispositivos">
					<?php if ($rol == 1 or $rol == 9) { ?>

						<a class="item" href="dispositivos/">
							<svg style="margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="28" height="28" viewBox="0 0 256 256" xml:space="preserve">
								<desc>Created with Fabric.js 1.7.22</desc>
								<defs>
								</defs>
								<g transform="translate(128 128) scale(0.72 0.72)">
									<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
										<path d="M 53.485 61.861 c -0.373 -0.902 -1.075 -1.603 -1.976 -1.976 c -1.789 -0.741 -1.928 -2.396 -1.928 -2.886 c 0 -0.489 0.139 -2.144 1.929 -2.886 c 1.86 -0.771 2.746 -2.912 1.975 -4.77 l -2.378 -5.741 c -0.373 -0.901 -1.075 -1.603 -1.976 -1.976 c -0.9 -0.373 -1.893 -0.373 -2.795 0 c -1.788 0.74 -3.057 -0.331 -3.404 -0.677 c -0.346 -0.346 -1.418 -1.615 -0.677 -3.403 c 0.771 -1.859 -0.116 -4 -1.976 -4.771 l -5.741 -2.378 c -0.45 -0.186 -0.923 -0.279 -1.397 -0.279 c -0.473 0 -0.947 0.093 -1.397 0.28 c -0.901 0.373 -1.603 1.075 -1.976 1.976 c -0.741 1.789 -2.396 1.928 -2.886 1.928 c 0 0 0 0 0 0 c -0.489 0 -2.144 -0.139 -2.886 -1.929 c -0.771 -1.859 -2.912 -2.743 -4.77 -1.975 l -5.743 2.378 c -1.859 0.771 -2.745 2.911 -1.975 4.771 c 0.741 1.789 -0.331 3.057 -0.677 3.403 c -0.346 0.346 -1.612 1.419 -3.404 0.677 c -1.86 -0.768 -3.999 0.117 -4.771 1.977 l -2.378 5.741 c -0.769 1.859 0.117 4 1.975 4.77 l 0.002 0.001 c 1.789 0.741 1.927 2.396 1.927 2.885 c 0.001 0.49 -0.139 2.145 -1.927 2.886 c -0.901 0.373 -1.603 1.075 -1.976 1.976 c -0.373 0.901 -0.373 1.893 0 2.795 l 2.378 5.742 c 0.771 1.858 2.909 2.747 4.771 1.975 c 1.79 -0.742 3.057 0.331 3.403 0.677 c 0.347 0.346 1.418 1.615 0.677 3.404 c -0.373 0.901 -0.373 1.893 0.001 2.794 c 0.373 0.901 1.075 1.603 1.976 1.976 l 5.741 2.378 c 1.859 0.769 3.999 -0.117 4.771 -1.977 c 0.741 -1.788 2.396 -1.927 2.885 -1.927 c 0.49 0 2.145 0.139 2.886 1.927 c 0.373 0.901 1.075 1.603 1.976 1.977 c 0.901 0.374 1.893 0.373 2.795 0 l 5.74 -2.378 c 0.901 -0.373 1.603 -1.075 1.977 -1.976 c 0.374 -0.901 0.373 -1.894 0 -2.795 c -0.741 -1.789 0.331 -3.057 0.677 -3.403 c 0.346 -0.347 1.613 -1.419 3.403 -0.677 c 0.901 0.373 1.894 0.373 2.795 0 c 0.902 -0.373 1.603 -1.075 1.976 -1.976 l 2.378 -5.74 C 53.859 63.755 53.859 62.762 53.485 61.861 z M 26.883 67.94 c -6.033 0 -10.941 -4.908 -10.941 -10.941 c 0 -6.033 4.908 -10.941 10.941 -10.941 s 10.941 4.908 10.941 10.941 C 37.823 63.032 32.915 67.94 26.883 67.94 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 86.665 28.45 c -0.263 -0.634 -0.756 -1.128 -1.39 -1.39 c -1.258 -0.521 -1.356 -1.686 -1.356 -2.03 c 0 -0.344 0.098 -1.508 1.357 -2.03 c 1.308 -0.543 1.931 -2.048 1.39 -3.356 l -1.673 -4.039 c -0.262 -0.634 -0.756 -1.128 -1.39 -1.39 c -0.633 -0.262 -1.331 -0.263 -1.966 0 c -1.258 0.52 -2.151 -0.233 -2.394 -0.476 c -0.243 -0.243 -0.997 -1.136 -0.476 -2.394 c 0.542 -1.308 -0.081 -2.814 -1.39 -3.357 l -4.039 -1.673 c -0.317 -0.131 -0.65 -0.197 -0.983 -0.197 s -0.666 0.066 -0.983 0.197 c -0.634 0.263 -1.128 0.756 -1.39 1.39 c -0.521 1.259 -1.686 1.356 -2.03 1.356 c 0 0 0 0 0 0 c -0.344 0 -1.508 -0.098 -2.03 -1.357 c -0.543 -1.307 -2.048 -1.93 -3.356 -1.389 l -4.04 1.673 c -1.307 0.543 -1.931 2.048 -1.389 3.356 c 0.521 1.258 -0.233 2.151 -0.476 2.394 c -0.244 0.244 -1.134 0.998 -2.395 0.476 c -1.309 -0.54 -2.813 0.083 -3.356 1.391 l -1.673 4.039 c -0.541 1.308 0.082 2.814 1.39 3.356 l 0.001 0 c 1.258 0.521 1.356 1.685 1.356 2.03 c 0 0.345 -0.098 1.509 -1.356 2.03 c -0.634 0.262 -1.128 0.756 -1.39 1.39 c -0.263 0.634 -0.263 1.332 0 1.966 l 1.673 4.039 c 0.543 1.307 2.046 1.932 3.357 1.389 c 1.259 -0.522 2.151 0.233 2.394 0.476 c 0.244 0.244 0.998 1.136 0.476 2.395 c -0.262 0.634 -0.262 1.332 0 1.966 c 0.263 0.634 0.756 1.128 1.39 1.39 l 4.039 1.673 c 1.307 0.541 2.813 -0.082 3.356 -1.391 c 0.521 -1.258 1.685 -1.356 2.03 -1.356 c 0.345 0 1.509 0.098 2.03 1.356 c 0.262 0.634 0.756 1.128 1.39 1.391 c 0.634 0.263 1.332 0.263 1.966 0 l 4.038 -1.673 c 0.634 -0.262 1.128 -0.756 1.391 -1.39 c 0.263 -0.634 0.263 -1.332 0 -1.966 c -0.521 -1.258 0.233 -2.151 0.476 -2.394 c 0.243 -0.244 1.135 -0.998 2.394 -0.476 c 0.634 0.262 1.332 0.262 1.966 0 c 0.634 -0.263 1.128 -0.756 1.39 -1.39 l 1.673 -4.038 C 86.927 29.782 86.927 29.084 86.665 28.45 z M 67.95 32.726 c -4.244 0 -7.697 -3.453 -7.697 -7.697 c 0 -4.244 3.453 -7.696 7.697 -7.696 c 4.244 0 7.696 3.453 7.696 7.696 C 75.646 29.274 72.194 32.726 67.95 32.726 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										<path d="M 89.845 68.159 c -0.206 -0.499 -0.595 -0.886 -1.093 -1.093 c -0.989 -0.41 -1.066 -1.325 -1.066 -1.596 c 0 -0.271 0.077 -1.185 1.066 -1.595 c 1.028 -0.426 1.518 -1.61 1.092 -2.637 l -1.315 -3.174 c -0.206 -0.498 -0.594 -0.886 -1.093 -1.093 c -0.498 -0.206 -1.047 -0.206 -1.545 0 c -0.989 0.409 -1.69 -0.183 -1.882 -0.374 c -0.191 -0.191 -0.784 -0.893 -0.374 -1.882 c 0.426 -1.028 -0.064 -2.211 -1.093 -2.638 l -3.174 -1.315 c -0.249 -0.103 -0.511 -0.155 -0.772 -0.155 c -0.262 0 -0.523 0.052 -0.773 0.155 c -0.498 0.206 -0.887 0.594 -1.093 1.092 c -0.41 0.989 -1.325 1.066 -1.595 1.066 c 0 0 0 0 0 0 c -0.271 0 -1.185 -0.077 -1.595 -1.067 c -0.426 -1.028 -1.61 -1.517 -2.637 -1.092 l -3.175 1.315 c -1.028 0.426 -1.518 1.609 -1.092 2.638 c 0.41 0.989 -0.183 1.69 -0.374 1.882 c -0.192 0.192 -0.892 0.785 -1.882 0.374 c -1.029 -0.424 -2.211 0.065 -2.638 1.093 l -1.315 3.174 c -0.425 1.028 0.064 2.211 1.092 2.637 l 0.001 0 c 0.989 0.41 1.066 1.324 1.066 1.595 c 0 0.271 -0.077 1.186 -1.066 1.595 c -0.498 0.206 -0.886 0.594 -1.093 1.093 c -0.206 0.498 -0.206 1.047 0 1.545 l 1.315 3.175 c 0.426 1.027 1.608 1.519 2.638 1.092 c 0.99 -0.41 1.69 0.183 1.881 0.374 c 0.192 0.191 0.784 0.893 0.374 1.882 c -0.206 0.498 -0.206 1.047 0 1.545 c 0.206 0.498 0.594 0.886 1.092 1.093 l 3.174 1.315 c 1.028 0.425 2.211 -0.065 2.638 -1.093 c 0.41 -0.989 1.325 -1.066 1.595 -1.066 c 0.271 0 1.186 0.077 1.595 1.066 c 0.206 0.498 0.594 0.886 1.093 1.093 c 0.498 0.207 1.047 0.206 1.545 0 l 3.174 -1.315 c 0.498 -0.206 0.887 -0.594 1.093 -1.093 c 0.207 -0.498 0.206 -1.047 0 -1.545 c -0.41 -0.989 0.183 -1.69 0.374 -1.882 c 0.191 -0.192 0.892 -0.785 1.881 -0.374 c 0.498 0.206 1.047 0.206 1.545 0 c 0.498 -0.206 0.886 -0.595 1.093 -1.093 l 1.315 -3.174 C 90.052 69.206 90.052 68.657 89.845 68.159 z M 75.137 71.52 c -3.335 0 -6.049 -2.714 -6.049 -6.049 c 0 -3.335 2.714 -6.049 6.049 -6.049 s 6.049 2.714 6.049 6.049 C 81.186 68.806 78.472 71.52 75.137 71.52 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									</g>
								</g>
							</svg>
							<div style="margin-bottom: 2px">Dispositivos</div>
						</a>

					<?php } ?>
				</div>

				<div class="captaciones">
					<?php if ($rol == 1 || $rol == 2 || $rol == 4 || $rol == 7 || $rol == 10 || $rol == 11 || $rol == 14 || $rol == 13) { ?>
						<a class="item" href="inmuebles/frontend/">
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
								<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
							</svg>
							<div style="margin-bottom: 2px">Captaciones</div>
						</a>

					<?php } ?>
				</div>

				<div class="recibimientos">
					<?php if ($rol == 1 || $rol == 7 || $rol == 15 || $rol == 16 || $rol == 19 || $usuario == 'EDISSON MONTOYA' || $usuario == 'CATHERINE DIAZ') { ?>
						<a class="item" href="recibimientos/frontend/">
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
								<path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
							</svg>
							<div style="margin-bottom: 2px">Recibimientos</div>
						</a>
					<?php } ?>
				</div>

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

				<div class="estudio_credito">
					<?php if ($rol == 1) { ?>
						<a class="item" href="estudio_credito/frontend/">
							<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" viewBox="0 0 625 625" xml:space="preserve">
								<g>
									<g id="Layer_1_32_">
										<g>
											<path d="M59.925,165.595l456.45-117.3l-3.825-17.85C507.45,8.771,484.5-3.979,462.825,1.12l-377.4,96.9
									C63.75,103.12,51,126.07,56.1,147.745L59.925,165.595z" />
											<path d="M545.7,322.42c21.675-5.1,34.425-28.05,29.324-49.725l-36.975-145.35l-318.75,81.6h215.475
									c43.351,0,79.051,35.7,79.051,79.05v43.351L545.7,322.42z" />
											<path d="M474.3,287.995c0-22.95-17.85-40.8-40.8-40.8H43.35c-22.95,0-40.8,17.85-40.8,40.8v249.9c0,22.95,17.85,40.8,40.8,40.8
									H433.5c22.95,0,40.8-17.85,40.8-40.8V287.995z M47.175,317.32c0-10.2,8.925-19.125,19.125-19.125h216.75
									c10.2,0,19.125,8.925,19.125,19.125s-8.925,19.125-19.125,19.125H66.3C56.1,336.445,47.175,327.521,47.175,317.32z
									M293.25,541.721c-35.7,0-65.025-29.325-65.025-65.025s29.325-63.75,65.025-63.75s65.024,29.325,65.024,65.025
									C358.274,513.67,328.95,541.721,293.25,541.721z M433.5,477.971c0,35.699-29.325,65.024-65.025,65.024
									c-3.825,0-8.925,0-12.75-1.274c16.575-16.575,25.5-38.25,25.5-63.75s-10.2-47.176-25.5-63.75c3.825-1.275,7.65-1.275,12.75-1.275
									C405.45,412.945,433.5,442.271,433.5,477.971z" />
										</g>
									</g>
								</g>
							</svg>
							<div style="margin-bottom: 2px">Estudio de Crédito</div>
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
				<div class="servicios_publicos">
					<?php if ($rol == 1 || $usuario == "CATHERINE DIAZ") { ?>
						<a class="item" href="servicios_publicos/">
							<svg width="27" height="27" viewBox="0 0 17 16" xmlns="http://www.w3.org/2000/svg">
								<path fill="#000000" fill-rule="evenodd" d="M14.289.023L6.925 0L2.984 8H8l-4.334 7.916L14.924 4.941H10.35z" />
							</svg>
							<br>
							<div style="margin-bottom: 2px">Servicios Públicos</div>
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