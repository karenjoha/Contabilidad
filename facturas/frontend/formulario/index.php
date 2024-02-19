<?php

session_start();

if (isset($_SESSION['logged']) === FALSE) {
	header("Location: http://10.1.1.8/contabilidad/login.php");
}

require_once "../../backend/controlador/controlador.php";
require_once "../../backend/modelo/modelo.php";

date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, "spanish");
//  Separamos la fecha y la hora
$fecha              = date('d-m-Y H:i');
$fechaLocalSeparada = explode(" ", $fecha);
$fechaA             = $fechaLocalSeparada[0];
$fechaL             = explode("-", $fechaA);
$fecha_registro     = $fechaL[0] . '/' . $fechaL[1] . '/' . $fechaL[2];

if (isset($_SESSION['logged']) === FALSE) {
	header("Location: http://10.1.1.8/contabilidad/login.php");
}

$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

//Editar REGISTROS
if (isset($_GET["id"])) {
	$item  = "id_factura";
	$valor = $_GET["id"];

	$listar     = controladorFacturas::ctrListarRegistros($item, $valor);
	$actualizar = new controladorFacturas();
	$actualizar->ctrActualizarRegistro();

	// FECHA SEPARADA CUANDO EXISTE ID
	$separar       = explode(" ", $listar['fecha_registro']);
	$mostrar_fecha = $separar[0];

	// Listar fecha al crear
	if (count($separar) == 2) {
		$fecha_r       = explode('-', $separar[0]);
		$mostrar_fecha = $fecha_r[0] . '/' . $fecha_r[1] . '/' . $fecha_r[2];
	}
	// Listar fecha importada
	else {
		$mostrar_fecha = $separar[0] . '/' . $separar[1] . '/' . $separar[2];
	}
} else {
	//Metodo estatico, permite reutilizar los datos
	$registro = controladorFacturas::ctrRegistro();
}
if ($rol == 1 || $rol == 27 || $usuario == 'MANUELA MUÑOZ') { ?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<title>FACTURAS</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS v5.0.2 -->
		<link rel="stylesheet" href="../../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
		<!-- Font Raleway -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;800&display=swap">
		<!-- Librerías Locales -->
		<link rel="stylesheet" href="../assets/css/form_facturas.css">
		<link rel="stylesheet" href="../../../vendor/css/preloader.css?n=1">
		<!-- Select 2 -->
		<link rel="stylesheet" href="../../../vendor/select2/select2.min.css">
		<link rel="stylesheet" href="../../../vendor/select2/select2-bootstrap-5-theme.min.css">
		<style>
			select>option {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<form id="form_facturas" method="POST">
			<!-- ID REGISTRO -->
			<?php if (isset($_GET['id'])) { ?>
				<!-- Obtenemos los id y los imprimimos ocultos en la vista para actualizar las respectivas tablas desde el modelo -->
				<input type="hidden" name="id_factura" value="<?php echo $listar['id_factura'] ?>">
			<?php } ?>
			<!-- USUARIO CREADOR -->
			<input type="hidden" name="usu_cambio" value="<?php echo $usuario ?>">
			<table class="table table-light">
				<thead>
					<tr>
						<th colspan="2">
							<div style="text-align: center;">
								<span class="titulo-terminacion-contratos">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">
										<defs>
										</defs>
										<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
											<path d="M 58.359 89.942 H 18.034 c -3.948 0 -7.16 -3.212 -7.16 -7.16 V 7.102 c 0 -3.948 3.212 -7.16 7.16 -7.16 H 71.85 c 3.948 0 7.16 3.212 7.16 7.16 V 70.83 c 0 1.104 -0.896 2 -2 2 s -2 -0.896 -2 -2 V 7.102 c 0 -1.742 -1.418 -3.16 -3.16 -3.16 H 18.034 c -1.742 0 -3.16 1.417 -3.16 3.16 v 75.68 c 0 1.742 1.417 3.16 3.16 3.16 h 40.325 c 1.104 0 2 0.896 2 2 S 59.464 89.942 58.359 89.942 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 65.145 40.383 H 24.74 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 40.404 c 1.104 0 2 0.896 2 2 S 66.249 40.383 65.145 40.383 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 29.962 52.044 H 24.74 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 5.222 c 1.104 0 2 0.896 2 2 S 31.067 52.044 29.962 52.044 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 38.923 63.705 H 24.74 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 14.183 c 1.104 0 2 0.896 2 2 S 40.028 63.705 38.923 63.705 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 65.145 28.722 H 50.149 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 14.995 c 1.104 0 2 0.896 2 2 S 66.249 28.722 65.145 28.722 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 65.145 17.79 H 24.74 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 40.404 c 1.104 0 2 0.896 2 2 S 66.249 17.79 65.145 17.79 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 70.625 89.939 c -1.419 0 -2.838 -0.54 -3.919 -1.619 L 52.335 73.947 c -1.032 -1.031 -1.802 -2.313 -2.227 -3.707 l -2.304 -7.534 c -0.354 -1.161 -0.04 -2.414 0.817 -3.271 c 0.857 -0.855 2.108 -1.167 3.268 -0.813 l 7.536 2.303 c 1.394 0.426 2.675 1.195 3.705 2.226 l 14.371 14.372 c 1.047 1.046 1.624 2.438 1.624 3.918 s -0.577 2.872 -1.624 3.919 l -2.959 2.959 C 73.463 89.399 72.044 89.939 70.625 89.939 z M 52.031 62.849 l 1.903 6.224 c 0.234 0.77 0.659 1.478 1.229 2.047 l 14.371 14.372 c 0.601 0.599 1.578 0.603 2.181 0 l 2.959 -2.96 c 0.292 -0.292 0.452 -0.679 0.452 -1.09 s -0.16 -0.798 -0.452 -1.089 L 60.303 65.979 c -0.568 -0.568 -1.276 -0.993 -2.046 -1.229 L 52.031 62.849 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 65.134 85.918 c -0.512 0 -1.023 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 l 7.968 -7.968 c 0.781 -0.781 2.047 -0.781 2.828 0 s 0.781 2.047 0 2.828 l -7.968 7.968 C 66.157 85.723 65.646 85.918 65.134 85.918 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 53.087 73.702 c -0.512 0 -1.023 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 l 7.825 -7.825 c 0.781 -0.781 2.047 -0.781 2.828 0 s 0.781 2.047 0 2.828 l -7.825 7.825 C 54.11 73.507 53.599 73.702 53.087 73.702 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 40.712 28.722 H 24.74 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 15.972 c 1.104 0 2 0.896 2 2 S 41.817 28.722 40.712 28.722 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
											<path d="M 65.145 52.044 H 39.399 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 25.745 c 1.104 0 2 0.896 2 2 S 66.249 52.044 65.145 52.044 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
										</g>
									</svg>
									FORMULARIO FACTURAS
								</span>
							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="1">
							<div class="mb-3">
								<label for="radico" class="form-label">NÚMERO RADICADO</label>
								<input id="radicado" readonly type="text" class="form-control" autocomplete="off" value=" <?php echo isset($_GET['id_factura']) ? $_GET['id_factura'] : ''; ?>">
							</div>
						</td>
						<td colspan="1">
							<div class="mb-3">
								<label for="fecha_registro" class="form-label">FECHA DE REGISTRO</label>
								<input type='text' class="form-control date-input" readonly value="<?php if (isset($_GET['id'])) {
									echo $mostrar_fecha;
								} else {
									echo $fecha_registro;
								} ?>" style="text-align: center;" />
								<input type="hidden" name="fecha_registro" value="<?php if (isset($_GET['id'])) {
									echo $listar['fecha_registro'];
								} else {
									echo $fecha;
								} ?>" />
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="1">
							<div class="mb-3">
								<label for="num_factura" class="form-label">NÚMERO DE FACTURA</label>
								<input type="text" class="form-control" autocomplete="off" <?php if (isset($listar['num_factura']) && $listar['num_factura'] != '') {
									echo 'readonly';
								} ?> name="num_factura" id="num_factura" aria-describedby="helpId" placeholder="" value="<?php if (isset($_GET['id'])) {
									  echo $listar['num_factura'];
								  } ?>">
							</div>
						</td>
						<td colspan="1">
							<div class="mb-3">
								<label for="empleado_registra" class="form-label">ASESOR QUIEN REGISTRA</label>
								<select class="form-select" name="empleado_registra" id="empleado_registra" type="text">
									<option value="<?php echo isset($listar['empleado_registra']) ? $listar['empleado_registra'] : ''; ?>" selected>
										<?php echo isset($listar['empleado_registra']) ? $listar['empleado_registra'] : ''; ?>
									</option>
									<option value="MIGUEL ZAPATA">MIGUEL ZAPATA</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="mb-3" style="display: flex; flex-direction: column; align-items: center; ">
								<label for="descripcion" class="form-label">DESCRIPCION</label>
								<textarea style="max-width: 500px;" class="form-control" name="descripcion" id="descripcion" rows="3" value="<?php if (isset($_GET['id'])) {
									echo $listar['descripcion'];
								} ?>"><?php if (isset($_GET['id'])) {echo $listar['descripcion'];} ?></textarea>
							</div>
						</td>
					</tr>
				<tfoot class="table-buttons">
					<tr>
						<td colspan="6">
							<div>
								<a href="../index.php" class="btn btn-primary">Volver</a>
								<button id="btn_enviar" type="submit" class="btn btn-success">Enviar</button>
							</div>
						</td>
					</tr>
				</tfoot>
				</tbody>
			</table>
		</form>
		<!-- Preloader -->
		<script src="../../../vendor/jquery/jquery-3.6.0.min.js"></script>
		<script src="../../../vendor/js/general.js"></script>
		<!-- Select 2 -->
		<script src="../../../vendor/select2/select2.min.js"></script>
		<script src="../assets/js/form_facturas.js?v=2"></script>
		<script src="../../../vendor/sweet_alert/sweetalert2.all.min.js"></script>
	</body>
	</html>
<?php } else {
	echo '<script language="javascript">alert("NO ESTAS AUTORIZADO PARA INGRESAR A ESTE MODULO.");</script>';
	echo '<script language="javascript">location.assign("../");</script>';
} ?>