<?php

session_start();

require_once '../../log-validation.php';

$usuario = $_SESSION['usuario'];
$rol     = $_SESSION['rol'];

require_once '../backend/controladores/controlador.php';
require_once '../backend/modelos/archivo_model.php';
$datos           = controladorArchivos::ctrListarRegistros(null, null);
$eliminarArchivo = new controladorArchivos;

$eliminarArchivo->ctrEliminarRegistro();

?>

<?php
if ($_SESSION['rol'] == 1) {
	$permiso["archivos"]["access"] = true;
}
if ($_SESSION['rol'] == 20){
	$permiso["archivos"]["access"] = true;
}
if ($_SESSION['rol'] == 24){
	$permiso["archivos"]["access"] = true;
}


if (isset($permiso["archivos"]["access"]) && $permiso["archivos"]["access"] == true) {


	?>
	<!DOCTYPE HTML>
	<html lang="es">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="descripción" content="Archivos CONTABILIDADD ">
		<title>ARCHIVOS</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">


		<!-- Raleway Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap">

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
				<div class="btn btn-actions">
					<a href="../../" class="btn btn-danger btn-lg" style="margin-left:-19px;">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-circle" style="margin-top: 5px;" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
						</svg>
						Atrás</a>&nbsp;

					<a href="form_archivo/" class="btn btn-success btn-lg" style="background: #54a0de; border-color: #54a0de" ;>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" style="margin-top: 5px;" viewBox="0 0 16 16">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
						</svg>&nbsp;
						Crear Prestamo</a>

				</div>
			</div>


			<span id="rol-user" style="display: none;">
				<?php echo $rol ?>
			</span>
			<span id="name-user" style="display: none;">
				<?php echo $usuario ?>
			</span>

			<table class="table table-light table-striped" id="regTable">
				<thead>
					<tr>
						<td class="responsive-active"></td>
						<th>ID</th>
						<th class="responsive-hidden">FECHA PRESTAMO</th>
						<th>TIPO<br>PRESTAMO</th>
						<th class="responsive-hidden">DESCRIPCIÓN <br> PRESTAMO</th>
						<th>RESPONSABLE <br> PRESTAMO</th>
						<th class="responsive-hidden">FECHA DEVOLUCIÓN</th>
						<th class="responsive-hidden">RESPONSABLE <br>DEVOLUCIÓN</th>
						<th class="responsive-hidden">EDITAR</th>
						<th class="responsive-hidden">EXPORTAR</th>
						<?php if ($_SESSION['rol'] == 1) { ?>
							<th class="responsive-hidden">ELIMINAR</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($datos as $dato): ?>
						<tr>
							<!-- Botón Responsive-->
							<td class="responsive-active"><img src="assets/images/svg/plus-circle-fill.svg" alt="toggle button" /></td>

							<!-- ID -->
							<td>
								<?php echo $dato['id_archivosP'] ?>
							</td>

							<!--SEPARAR LA FECHA Y LA HORA DE LA BD PARA LA VISTA INDEX -->
							<?php
							$fechaVistaSeparada = explode(" ", $dato['fecha_prestamo']);
							$fechaVistaPrestamo = $fechaVistaSeparada[0]; ?>

							<!-- FECHA PRESTAMO -->
							<td class="responsive-hidden">
								<?php echo $fechaVistaPrestamo; ?>
							</td>

							<!-- TIPO PRESTAMO -->
							<td>
								<?php echo $dato['carpeta'] . ' ' . $dato['contrato'] . ' ' . $dato['cd'].' '.$dato['titulo_valor']; ?>
							</td>

							<!-- DESCRIPCION DEL PRESTAMO -->
							<td class="responsive-hidden">
								<?php echo $dato['descripcion']; ?>
							</td>

							<!-- RESPONSABLE ENTREGAR PRESTAMO -->
							<td>
								<?php echo $dato['responsable_entP']; ?>
							</td>

							<!-- SEPARAR LA FECHA Y LA HORA DE LA BD PARA LA VISTA INDEX -->
							<?php
							$fechaVseparada       = explode(" ", $dato['fecha_devolucion']);
							$fechaVistaDevolucion = $fechaVseparada[0]; ?>


							<!-- FECHA DEVOLUCION  -->
							<td class="responsive-hidden">
								<?php echo $fechaVistaDevolucion; ?>
							</td>


							<!-- RESPONSABLE ENTREGAR DEVOLUCION -->
							<td class="responsive-hidden">
								<?php echo $dato['responsable_entD']; ?>
							</td>


							<!-- Botón Editar -->
							<td class="responsive-hidden">
								<a class="btn btn-primary" href="form_archivo/index.php?id=<?php echo $dato['id_archivosP']; ?>">
									<img src="assets/images/svg/pen.svg" alt="pen icon" />&nbsp;EDITAR</a>
							</td>

							<!-- Botón Exportar -->
							<td class="responsive-hidden">
								<a class="btn btn-primary" target="_blank" href="pdf/archivoPDF.php?id=<?php echo $dato['id_archivosP']; ?>">
									<img src="assets/images/svg/box_arrow_up.svg" alt="arrow up icon" />&nbsp;EXPORTAR PDF
								</a>
							</td>


							<?php if ($_SESSION['rol'] == 1) { ?>
								<!-- Botón Eliminar -->
								<td class="responsive-hidden">
									<form method="POST" id="delete<?php echo $dato['id_archivosP']; ?>">
										<input type="hidden" value="<?php echo $dato['id_archivosP']; ?>" name="eliminarArchivo"> <!-- Tabla prestamo -->
										<input type="hidden" value="<?php echo $dato['id_archivosD']; ?>" name="eliminarArchivo2"> <!-- Tabla devoluciones -->
										<button type="button" class="btn btn-primary btnEliminar">&nbsp;ELIMINAR </button>
									</form>
								</td>
							</tr>
						<?php } ?>
					<?php endforeach; ?>
				</tbody>
			</table>

			<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top"><img src="assets/images/svg/arrow_up.svg" /></button>
		</div>
		<div style="height:40px;"></div>

		<!-- Dependencias -->

		<!-- JQuery -->
		<script src="../../vendor/jquery/jquery3.3.1.min.js"></script>

		<!-- DataTables -->
		<script src="../../vendor/DataTables/datatables.min.js"></script>
		<script src="../../vendor/DataTables/DataTables-1.11.4/js/dataTables.bootstrap5.min.js"></script>

		<!-- Bootstrap -->
		<script src="../../vendor/bootstrap/bootstrap-3.3.7/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<!-- SweetAlert -->
		<script src="../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

		<!-- Utilidades -->
		<script src="../../vendor/js/menu_usuario.js"></script>
		<script src="assets/js/archivos_index.js?v=0.5"></script>

	</body>

	</html>
<?php } else {

	echo '<script language="javascript">alert("NO ESTAS AUTORIZADO PARA INGRESAR A ESTE MODULO.");</script>';
	echo '<script language="javascript">location.assign("../../");</script>';
} ?>