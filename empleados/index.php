<?php
require_once 'empleado.entidad.php';
require_once 'empleado.model.php';

// Logica

$emple  = new Empleado();
$modelC = new EmpleadoModel();

if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'actualizar':
			//INFORMACION DEL EMPLEADO
			$emple->__SET('id_emple', $_REQUEST['id_emple']);
			$emple->__SET('cc_emple', $_REQUEST['cc_emple']);
			$emple->__SET('nom_emple', $_REQUEST['nom_emple']);
			$emple->__SET('fechan_emple', $_REQUEST['fechan_emple']);
			$emple->__SET('rh_emple', $_REQUEST['rh_emple']);
			$emple->__SET('riesgo_emple', $_REQUEST['riesgo_emple']);
			$emple->__SET('cargo_emple', $_REQUEST['cargo_emple']);
			$emple->__SET('celp_emple', $_REQUEST['celp_emple']);
			$emple->__SET('celc_emple', $_REQUEST['celc_emple']);
			$emple->__SET('fechain_emple', $_REQUEST['fechain_emple']);
			$emple->__SET('dira_emple', $_REQUEST['dira_emple']);
			$emple->__SET('barrio_emple', $_REQUEST['barrio_emple']);
			$emple->__SET('cd_emple', $_REQUEST['cd_emple']);
			$emple->__SET('nom_sos_emple', $_REQUEST['nom_sos_emple']);
			$emple->__SET('cel_sos_emple', $_REQUEST['cel_sos_emple']);
			$emple->__SET('par_sos_emple', $_REQUEST['par_sos_emple']);
			$emple->__SET('doc_emple', $_REQUEST['doc_emple']);

			$modelC->Actualizar($emple);
			header('Location: index.php');
			break;

		case 'registrar':
			//INFORMACION DEL EMPLEADO
			$emple->__SET('id_emple', $_REQUEST['id_emple']);
			$emple->__SET('cc_emple', $_REQUEST['cc_emple']);
			$emple->__SET('nom_emple', $_REQUEST['nom_emple']);
			$emple->__SET('fechan_emple', $_REQUEST['fechan_emple']);
			$emple->__SET('rh_emple', $_REQUEST['rh_emple']);
			$emple->__SET('riesgo_emple', $_REQUEST['riesgo_emple']);
			$emple->__SET('cargo_emple', $_REQUEST['cargo_emple']);
			$emple->__SET('celp_emple', $_REQUEST['celp_emple']);
			$emple->__SET('celc_emple', $_REQUEST['celc_emple']);
			$emple->__SET('fechain_emple', $_REQUEST['fechain_emple']);
			$emple->__SET('dira_emple', $_REQUEST['dira_emple']);
			$emple->__SET('barrio_emple', $_REQUEST['barrio_emple']);
			$emple->__SET('cd_emple', $_REQUEST['cd_emple']);
			$emple->__SET('nom_sos_emple', $_REQUEST['nom_sos_emple']);
			$emple->__SET('cel_sos_emple', $_REQUEST['cel_sos_emple']);
			$emple->__SET('par_sos_emple', $_REQUEST['par_sos_emple']);
			$emple->__SET('doc_emple', $_REQUEST['doc_emple']);

			$modelC->Registrar($emple);
			header('Location: index.php');
			break;

		case 'eliminar':
			$modelC->Eliminar($_REQUEST['id_emple']);
			header('Location: index.php');
			break;

		case 'editar':
			$emple = $modelC->Obtener($_REQUEST['id_emple']);
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>EMPLEADOS</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Varela+Round'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.5.0/pure-min.css">

	<!-- Font Raleway -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap">

	<!-- Necesarios -->
	<link rel="stylesheet" href="../vendor/css/menu_usuario.css">
	<link rel="stylesheet" href="../vendor/css/preloader.css?n=1">
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

	<?php require('../nav.php'); ?>

	<div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar No</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			</div>
		</div>
	</div>

	</div><br><br>

	<table>
		<tr>
			<td>
				<a href="../" class="btn btn-danger btn-lg">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
					</svg>
					&nbsp;Atrás
				</a>&nbsp;
			</td>
			<td><span></span><a class="btn btn-primary btn-lg" href="empleado_form.php">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
						<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
					</svg>
					&nbsp;Nuevo Empleado</a>&nbsp;
			</td>
			<?php if ($_SESSION['rol'] == 1) { ?>
				<td><span></span><a class="btn btn-info btn-lg" href="import_arch_index.php"><i class="glyphicon glyphicon-floppy-save" style="color:#FFFFFF;" aria-hidden="true"></i>&nbsp;Importar Empleados</a>&nbsp;
				</td>
			<?php } ?>

		</tr>
	</table>

	<form action="index.php" method="POST">
		<div align="right" class="ui search">
			<div class="ui icon input ">
				<input class="prompt" type="text" placeholder="Buscar Empleado" autocapitalize="none" aria-label="Buscar" autocomplete="off" autocorrect="off" name="buscar" id="buscar">
				<!--<input type="submit" value="Buscar">-->

				<i class="search icon"></i>
			</div>
		</div>
	</form>

	<table class="ui striped grey table" id="mytable" class="tablesorter">
		<thead>
			<tr>
				<th>ID</th>
				<th>Fecha de Nacimiento</th>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Tipo de Sangre</th>
				<th>Riesgo</th>
				<th>Cargo</th>
				<th>Celular Personal</th>
				<th>Celular Empresarial</th>
				<th>Fecha de ingreso</th>
				<th>Dirección</th>
				<th>Barrio</th>
				<th>Ciudad</th>
				<th>Acciones</th>
				<th></th>

			</tr>
		</thead>
		<tbody>

			<?php while ($row = $sql_query->fetch(PDO::FETCH_OBJ)) { ?>

				<tr>
					<td>
						<?= $row->id_emple; ?>
					</td>
					<td>
						<?= $row->fechan_emple; ?>
					</td>
					<td>
						<?= $row->cc_emple; ?>
					</td>
					<td>
						<?= $row->nom_emple; ?>
					</td>
					<td>
						<?= $row->rh_emple; ?>
					</td>
					<td>
						<?= $row->riesgo_emple; ?>
					</td>
					<td>
						<?= $row->cargo_emple; ?>
					</td>
					<td>
						<?= $row->celp_emple; ?>
					</td>
					<td>
						<?= $row->celc_emple; ?>
					</td>
					<td>
						<?= $row->fechain_emple; ?>
					</td>
					<td>
						<?= $row->dira_emple; ?>
					</td>
					<td>
						<?= $row->barrio_emple; ?>
					</td>
					<td>
						<?= $row->cd_emple; ?>
					</td>
					<!--BOTON EDITAR-->
					<td><a class="btn btn-primary" href="empleado_form.php?action=editar&id_emple=<?= $row->id_emple ?>"><i class="glyphicon glyphicon-pencil" style="color:#000000;" aria-hidden="true"></i></a>&nbsp;
					</td>
					<!--BOTON ELIMINAR-->
					<td>
						<?php if ($_SESSION['rol'] == 1) { ?>
							<a class="btn btn-danger" href="?action=eliminar&id_emple=<?= $row->id_emple ?>"><i class="glyphicon glyphicon-trash" style="color:#000000;"></i></a>
						<?php } ?>
					</td>

				</tr>

			<?php } ?>

		</tbody>

	</table>

	<!-- Jquery JS-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Local Utilities -->
	<script src="../vendor/js/menu_usuario.js"></script>
	<script src="../vendor/js/general.js"></script>

</body>



</html>