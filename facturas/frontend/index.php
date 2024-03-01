<?php
date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, 'es_VE.UTF-8', 'esp');
session_start();

require_once '../../log-validation.php';

$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

require_once "../backend/controlador/controlador.php";
require_once "../backend/modelo/modelo.php";
$listar           = controladorFacturas::ctrListarRegistros(null, null);
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

			</div>
			<br>

		</div>
		<span id="rol-user" style="display: none;">
			<?php echo $rol; ?>
		</span>

		<table class="table table-light table-striped" id="terminacion_contratos_table" width="100%" height="100%">

			<thead>
				<tr>
					<th>ID</th>
					<th class="responsive-hidden">FECHA REGISTRO</th>
					<th class="responsive-hidden">NÚMERO DE <br> FACTURA </th>
					<th class="responsive-hidden">DOCUMENTO</th>
					<th class="responsive-hidden">DESCRIPCION</th>
					<th class="responsive-hidden">EMPLEADO QUE REGISTRO</th>
					<th class="responsive-hidden" class="text-center">ACCIONES</th>
					<?php if ($_SESSION['rol'] == 1) { ?>
						<th class="responsive-hidden" class="text-center">ELIMINAR</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($listar as $dato): ?>

					<tr>

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
						<td class="responsive-hidden">
							<?php echo $dato['num_factura']; ?>
						</td>
						<td class="responsive-hidden">
							<?php echo $dato['documento']; ?>
						</td>
						<td class="responsive-hidden">
							<?php echo $dato['descripcion'] ?>
						</td>
						<td class="responsive-hidden">
							<?php echo $dato['empleado_registra'] ?>
						</td>
						<!-- BOTÓN ACCIONES -->
						<td class="responsive-hidden">
							<li class="dropdown" style="list-style: none;">
								<?php if ($rol != 25) { ?>
									<a class="btn btn-primary" href="formulario/index.php?id=<?php echo $dato['id_factura']; ?>">Gestionar</a>
								<?php } ?>
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