<?php
date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, 'es_VE.UTF-8', 'esp');
session_start();

require_once '../../log-validation.php';

$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

require_once "../backend/controlador/controlador.php";
require_once "../backend/modelo/modelo.php";
$listar       = controladorFacturas::ctrListarRegistros(null, null);
$eliminarFacturas = new controladorFacturas;
$eliminarFacturas->ctrEliminarRegistro();
?>

<?php
if ($rol == 1 || $rol == 27 || $usuario == 'MANUELA MUÑOZ') { ?>

	<!DOCTYPE HTML>
	<html lang="es">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="descripción" content="Terminacion de contratos contabilidad">
		<title>FACTURAS</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-3.3.6/css/bootstrap.css">

		<!-- Raleway Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap">
		<link rel="stylesheet" href="assets/css/facturas.css?n=1.1">

		<!-- Utilidades -->
		<link rel="stylesheet" href="../../vendor/css/menu_usuario.css">
		<link rel="stylesheet" href="../../vendor/css/preloader.css?n=1">

		<style>
			.modal-backdrop.show {
				width: 100%;
				height: 100%;

			}

			.modal-dialog {
				display: flex;
				width: 100%;
				height: 100%;
				align-content: center;
				justify-content: center;
				align-items: center;
			}

			.hover {
				color: #198754 !important;
			}
		</style>
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



		<div class="inv_index">

			<?php require '../../nav.php'; ?>

			<div class="btn btn-actions">
				<a href="../../" class="btn btn-danger btn-lg" <?php if ($_SESSION['rol'] == 27) {
					echo 'style="display: none;"';
				} ?>>
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
					</svg>
					Atrás</a>&nbsp;
				<a href="formulario/index.php" class="btn btn-success btn-lg" style="background: #54a0de; border-color: #54a0de" ;>
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
						<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
					</svg>&nbsp;
					registrar FACTURAS</a>
				<!-- Condición para ocultar el botón de importar. -->
				<?php $condicion = $rol != 1 ? 'style= "display:none;"' : ''; ?>
				<div <?php echo $condicion; ?>>
					<a href="../backend/importar/index_importar.php" class="btn btn-success btn-lg" style=" margin-left: 5px;background-color: #4183C4; border-color: #4183C4;">
						<span style="margin-top: 1px;">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">
								<defs>
								</defs>
								<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(45.02412451361867 45.024124513618645) scale(1.83 1.83)">
									<path d="M 77.474 17.28 L 61.526 1.332 C 60.668 0.473 59.525 0 58.311 0 H 15.742 c -2.508 0 -4.548 2.04 -4.548 4.548 v 80.904 c 0 2.508 2.04 4.548 4.548 4.548 h 58.516 c 2.508 0 4.549 -2.04 4.549 -4.548 V 20.496 C 78.807 19.281 78.333 18.138 77.474 17.28 z M 61.073 5.121 l 12.611 12.612 H 62.35 c -0.704 0 -1.276 -0.573 -1.276 -1.277 V 5.121 z M 15.742 3 h 42.332 v 13.456 c 0 2.358 1.918 4.277 4.276 4.277 h 13.457 v 33.2 H 14.194 V 4.548 C 14.194 3.694 14.888 3 15.742 3 z M 74.258 87 H 15.742 c -0.854 0 -1.548 -0.694 -1.548 -1.548 V 56.934 h 61.613 v 28.519 C 75.807 86.306 75.112 87 74.258 87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									<path d="M 33.635 82.312 h -5.947 c -2.391 0 -4.336 -1.945 -4.336 -4.336 v -10.93 c 0 -2.391 1.945 -4.336 4.336 -4.336 h 5.947 c 0.829 0 1.5 0.672 1.5 1.5 s -0.671 1.5 -1.5 1.5 h -5.947 c -0.737 0 -1.336 0.6 -1.336 1.336 v 10.93 c 0 0.736 0.599 1.336 1.336 1.336 h 5.947 c 0.829 0 1.5 0.672 1.5 1.5 S 34.464 82.312 33.635 82.312 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									<path d="M 46.959 82.312 h -6.334 c -0.829 0 -1.5 -0.672 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 6.334 c 0.522 0 0.948 -0.426 0.948 -0.948 v -3.404 c 0 -0.522 -0.426 -0.948 -0.948 -0.948 h -3.885 c -2.177 0 -3.949 -1.771 -3.949 -3.948 v -3.403 c 0 -2.178 1.771 -3.949 3.949 -3.949 h 4.312 c 0.828 0 1.5 0.672 1.5 1.5 s -0.672 1.5 -1.5 1.5 h -4.312 c -0.523 0 -0.949 0.426 -0.949 0.949 v 3.403 c 0 0.522 0.426 0.948 0.949 0.948 h 3.885 c 2.177 0 3.948 1.771 3.948 3.948 v 3.404 C 50.907 80.54 49.136 82.312 46.959 82.312 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
									<path d="M 65.63 62.759 c -0.787 -0.269 -1.637 0.152 -1.902 0.938 L 59.486 76.18 l -4.24 -12.484 c -0.267 -0.785 -1.117 -1.206 -1.902 -0.938 c -0.784 0.266 -1.204 1.118 -0.938 1.902 l 5.66 16.664 c 0.005 0.016 0.017 0.027 0.022 0.042 c 0.049 0.131 0.112 0.256 0.195 0.369 c 0.003 0.004 0.005 0.01 0.008 0.014 c 0.081 0.107 0.183 0.199 0.292 0.282 c 0.025 0.019 0.049 0.038 0.076 0.055 c 0.106 0.07 0.218 0.132 0.344 0.175 c 0.004 0.001 0.009 0.001 0.013 0.002 c 0.15 0.05 0.308 0.078 0.469 0.078 s 0.319 -0.028 0.469 -0.078 c 0.004 -0.001 0.009 -0.001 0.013 -0.002 c 0.126 -0.043 0.239 -0.105 0.345 -0.176 c 0.025 -0.017 0.049 -0.035 0.073 -0.053 c 0.11 -0.083 0.212 -0.176 0.294 -0.284 c 0.002 -0.003 0.004 -0.007 0.006 -0.01 c 0.085 -0.114 0.147 -0.24 0.197 -0.373 c 0.006 -0.015 0.017 -0.026 0.022 -0.042 l 5.661 -16.664 C 66.834 63.877 66.414 63.025 65.63 62.759 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
								</g>
							</svg>
							Importar
						</span>
					</a>
				</div>
			</div>
			<br>

		</div>
		<span id="rol-user" style="display: none;">
			<?php echo $rol; ?>
		</span>

		<table class="table table-light table-striped" id="terminacion_contratos_table" width="100%" height="100%">

			<thead>
				<tr>
					<td class="responsive-active"></td>
					<th>ID</th>
					<th class="responsive-hidden">FECHA REGISTRO</th>
					<th class="responsive-hidden">NÚMERO DE <br> CONTRATO </th>
					<th class="responsive-hidden">NOMBRES</th>
					<th>NÚMERO <br> DOCUMENTO</th>
					<th class="responsive-hidden">MENSAJE</th>
					<th class="responsive-hidden">ÁREA ENCARGADA</th>
					<th>ESTADO</th>
					<th class="responsive-hidden" class="text-center">ACCIONES</th>
					<?php if ($_SESSION['rol'] == 1) { ?>
						<th class="responsive-hidden" class="text-center">ELIMINAR</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($listar as $dato): ?>

					<?php
					if ($dato['estado'] == 'DENEGADO') {
						$estado = '<span class="st-passed">' . $dato['estado'] . '</span>';
					} elseif ($dato['estado'] == 'GESTIÓN') {
						$estado = '<span class="st-pending">' . $dato['estado'] . '</span>';
					} elseif ($dato['estado'] == 'GESTIONADO') {
						$estado = '<span class="st-denied">' . $dato['estado'] . '</span>';
					} elseif ($dato['estado'] == 'EN PROCESO') {
						$estado = '<span class="st-progress">' . $dato['estado'] . '</span>';
					} else {
						$estado = '<span>' . $dato['estado'] . '</span>';
					}
					?>

					<tr>
						<!-- Botón Responsive-->
						<td class="responsive-active"><img src="assets/images/svg/plus-circle-fill.svg" alt="toggle button" /> </td>

						<!-- ID -->
						<td>
							<?php echo $dato['id_factura']; ?>
						</td>

						<!-- FECHA DE REGISTRO -->
						<!-- Seperar fecha con '/' -->
						<?php
						$fechaR = $dato['fecha_registro'];
						$fechaV = explode(' ', $fechaR);

						// Listar fecha al crear
						if (count($fechaV) == 2) {
							$fecha_r = explode('-', $fechaV[0]);
							$fecha   = $fecha_r[0] . '/' . $fecha_r[1] . '/' . $fecha_r[2];
						}
						// Listar fecha importada
						else {
							$fecha = $fechaV[0] . '/' . $fechaV[1] . '/' . $fechaV[2];
						}
						?>

						<td class="responsive-hidden">
							<?php echo $fecha; ?>
						</td>
						<!-- Número de contrato -->
						<td class="responsive-hidden">
							<?php echo $dato['contractNumber']; ?>
						</td>


						<!-- NOMBRES -->
						<td class="responsive-hidden" class="center">
							<div title="<?php echo $dato['nombres_apellidos']; ?>" class="truncate-text">
								<?php echo $dato['nombres_apellidos']; ?>
							</div>
						</td>

						<!-- IDENTIFICACION -->
						<td>
							<?php echo $dato['identificacion']; ?>
						</td>

						<!-- MENSAJE -->
						<td class="responsive-hidden" class="center">
							<div title="<?php echo $dato['mensaje']; ?>" class="truncate-text">
								<?php echo $dato['mensaje']; ?>
							</div>
						</td>

						<td class="responsive-hidden">
							<?php echo $dato['area_enc'] ?>
						</td>
						<!-- ESTADO -->
						<td>
							<?php echo $estado; ?>
						</td>
						<!-- BOTÓN ACCIONES -->
						<td class="responsive-hidden">
							<li class="dropdown" style="list-style: none;">
								<a class="btn btn-primary" data-toggle="dropdown" href="#">ACCIONES</a>
								<ul class="dropdown-menu">
									<?php if ($rol != 25) { ?>
										<li>
											<a href="formulario/index.php?id=<?php echo $dato['id_factura']; ?>">Gestionar</a>
										</li>
									<?php } ?>

									<li>
										<a target="_blank" href="pdf/factura_PDF.php?id=<?php echo $dato['id_factura']; ?>">Exportar PDF</a>
									</li>
								</ul>
							</li>
						</td>
						<!-- BOTÓN ELIMINAR -->
						<?php if ($rol == 1) { ?>
							<td class="responsive-hidden">
								<form method="POST" id="delete<?php echo $dato['id_factura']; ?>">
									<input type="hidden" value="<?php echo $dato['id_factura']; ?>" name="eliminarFacturas" id="btnDelete">
									<button type="button" class="btn btn-primary btnEliminar">&nbsp;ELIMINAR</button>
								</form>
							</td>
						<?php } ?>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>


		<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top"><img src="assets/images/svg/arrow_up.svg" /></button>
		</div>
		<div style="height:40px;"></div>

		<!-- Dependencias -->

		<!-- JQuery -->
		<script src="../../vendor/jquery/jquery-3.6.0.min.js"></script>

		<!-- DataTables -->
		<script src="../../vendor/DataTables/datatables.min.js?v=1"></script>

		<script src="../../vendor/DataTables/datatables.min.js"></script>
		<script src="../../vendor/DataTables/DataTables-1.11.4/js/dataTables.bootstrap5.min.js"></script>

		<!-- Bootstrap -->
		<script src="../../vendor/bootstrap/bootstrap-3.3.7/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- SweetAlert -->
		<script src="../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

		<!-- Utilidades -->
		<script src="../../vendor/js/menu_usuario.js"></script>
		<script src="assets/js/index_factura.js?v=1.6"></script>
	</body>

	</html>
<?php } else {
	echo '<script language="javascript">alert(" ⛔  NO ESTÁS AUTORIZADO PARA INGRESAR A ESTE MODULO ⛔");</script>';
	echo '<script language="javascript">location.assign("../../");</script>';
} ?>