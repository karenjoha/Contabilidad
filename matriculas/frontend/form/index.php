<?php

session_start();

if (isset($_SESSION['logged']) === FALSE) {
	header("Location: http://lmzt.online/gestionadministrativa/login.php");
}

require_once "../../backend/controlador/controlador.php";
require_once "../../backend/modelo/modelo.php";
require_once "../../backend/selectObjects.php";
$controlador_matriculas = new controladorMatriculas();

date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, "spanish");
//  Separamos la fecha y la hora
$fecha              = date('d-m-Y H:i');
$fechaLocalSeparada = explode(" ", $fecha);
$fechaA             = $fechaLocalSeparada[0];
$fechaL             = explode("-", $fechaA);
$fecha_registro     = $fechaL[0] . '/' . $fechaL[1] . '/' . $fechaL[2];

if (isset($_SESSION['logged']) === FALSE) {
	header("Location: http://lmzt.online/gestionadministrativa/login.php");
}

$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

//Editar REGISTROS
if (isset($_GET["id"])) {
	$item  = "id_alumno";
	$valor = $_GET["id"];

	$listar     = $controlador_matriculas->ctrListarRegistros($item, $valor);
	$actualizar = new controladorMatriculas();
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
	$registro = $controlador_matriculas->ctrRegistro();
}
?>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../vendor/bootstrap/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
	<title>Matricula</title>
</head>

<body>
	<div class="container">
		<!-- HEADER TAB BUTTONS -->
		<div class="nav btn-group mb-2 mt-5">
			<a class="btn btn-primary active" aria-current="page" href="#form" data-bs-toggle="tab">INFORMACION PRINCIPAL</a>

			<a class="btn btn-primary" href="#form1" data-bs-toggle="tab">FICHA MEDICA</a>

			<a class="btn btn-primary" href="#form2" data-bs-toggle="tab">ACUDIENTE</a>

		</div>
		<!-- FORMULARIO -->
		<form id="form_matricula" method="POST" action="">

			<!-- ID Oculto -->
			<?php if (isset($_GET["id"])) { ?>
				<!-- Obtenemos los id y los imprimimos ocultos en la vista para actualizar las respectivas tablas desde el modelo -->
				<input type="hidden" name="id_alumno" value="<?php echo $listar["id_alumno"]; ?>">
				<input type="hidden" name="id_ficha_medica" value="<?php echo $listar["id_ficha_medica"]; ?>">
				<input type="hidden" name="id_acudiente" value="<?php echo $listar["id_acudiente"]; ?>">
			<?php } ?>

			<!-- informacion principal -->
			<div class="tab-content">
				<div class="tab-pane active" id="form">
					<div class="row form-control header-table">
						<div class="col">
							<h6>Informacion principal del alumno</h6>
						</div>
					</div>
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

					<div class="mb-3">
						<label for="nombre_alum" class="form-label">Nombres</label>
						<input name="nombre_alum" type="text" class="form-control" id="nombre_alum" value="<?php if (isset($_GET["id"])) {
							echo $listar["nombre_alum"];
						} ?>">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="primer_apellido" class="form-label">Primer Apellido</label>
								<input name="primer_apellido" type="text" class="form-control" id="primer_apellido" value="<?php if (isset($_GET["id"])) {
									echo $listar["primer_apellido"];
								} ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="segundo_apellido" class="form-label">Segundo Apellido</label>
								<input name="segundo_apellido" type="text" class="form-control" id="segundo_apellido" value="<?php if (isset($_GET["id"])) {
									echo $listar["segundo_apellido"];
								} ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="tipo_documento" class="form-label">Tipo de Identificación</label>
								<select name="tipo_documento" class="form-select" id="tipo_documento">
									<option value=""></option>
									<?php foreach ($tipo_doc as $tipo_doc): ?>
										<option value="<?= $tipo_doc ?>">
											<?= $tipo_doc ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="documento" class="form-label">Número de Identificación</label>
								<input name="documento" type="text" class="form-control" id="documento" value="<?php if (isset($_GET["id"]))
									echo $listar["documento"]; ?>">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="fecha_nacimiento" class="form-label">Fecha de Naciemiento</label>
						<input name="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" value="<?php if (isset($_GET["id"])) {
							echo $listar["fecha_nacimiento"];
						} ?>">
					</div>
					<div class="mb-3">
						<label for="sexo" class="form-label">Sexo</label>
						<div>
							<input type="radio" id="hombre" name="sexo" value="hombre" <?php if (isset($_GET["id"]) && $listar["sexo"] === "hombre")
								echo "checked"; ?>>
							<label for="hombre">Masculino</label>
						</div>
						<div>
							<input type="radio" id="mujer" name="sexo" value="mujer" <?php if (isset($_GET["id"]) && $listar["sexo"] === "mujer")
								echo "checked"; ?>>
							<label for="mujer">Femenino</label>
						</div>
					</div>
					<div class="mb-3">
						<label for="lugar_nacimiento" class="form-label">Lugar</label>
						<input name="lugar_nacimiento" type="text" class="form-control" id="lugar_nacimiento" value="<?php if (isset($_GET["id"])) {
							echo $listar["lugar_nacimiento"];
						} else {
							echo "";
						} ?>">
					</div>
					<div class="mb-3">
						<label for="nacionalidad" class="form-label">Nacionalidad</label>
						<input name="nacionalidad" type="text" class="form-control" id="nacionalidad" value="<?php if (isset($_GET["id"])) {
							echo $listar["nacionalidad"];
						} else {
							echo "";
						} ?>">
					</div>
					<div class="mb-3">
						<label for="direccion" class="form-label">Direccion</label>
						<input type="tel" name="direccion" type="text" class="form-control" id="direccion" value="<?php if (isset($_GET["id"])) {
							echo $listar["direccion"];
						} else {
							echo "";
						} ?>">
					</div>
					<div class="mb-3">
						<label for="barrio" class="form-label">Barrio</label>
						<input name="barrio" type="text" class="form-control" id="barrio" value="<?php if (isset($_GET["id"])) {
							echo $listar["barrio"];
						} ?>">
					</div>
					<div class="mb-3">
						<label for="estrato" class="form-label">Estrato</label>
						<input name="estrato" type="text" class="form-control" id="estrato" value="<?php if (isset($_GET["id"])) {
							echo $listar["estrato"];
						} ?>">
					</div>
					<div class="mb-3">
						<label for="comuna" class="form-label">Comuna</label>
						<input name="comuna" type="text" class="form-control" id="comuna" value="<?php if (isset($_GET["id"])) {
							echo $listar["comuna"];
						} ?>">
					</div>
					<div class="mb-3">
						<label for="celular" class="form-label">Numero #1</label>
						<input name="celular" type="text" class="form-control" id="celular" value="<?php if (isset($_GET["id"])) {
							echo $listar["celular"];
						} ?>">
					</div>
					<div class="mb-3">
						<label for="segundo_celular" class="form-label">Numero #2</label>
						<input name="segundo_celular" type="text" class="form-control" id="segundo_celular" value="<?php if (isset($_GET["id"])) {
							echo $listar["segundo_celular"];
						} ?>">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" name="email" class="form-control" id="email" value="<?php if (isset($_GET["id"])) {
							echo $listar["email"];
						} ?>">
					</div>
				</div>
				<!-- ficha medica -->
				<div class="tab-pane" id="form1">
					<div class="row form-control header-table">
						<div class="col">
							<h6>Ficha medica</h6>
						</div>
					</div>
					<div class="mb-3">
						<label for="grupo" class="form-label">Grupo</label>
						<select type="select" name="grupo" type="text" class="form-control" id="grupo" value="<?php if (isset($_GET["id"])) {
							echo $listar["grupo"];
						} ?>">
							<option value=""></option>
							<?php foreach ($grupos as $grupos): ?>
								<option value="<?= $grupos ?>">
									<?= $grupos ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="jornada" class="form-label">Jornada</label>
						<select type="select" name="jornada" type="text" class="form-control" id="jornada" value="<?php if (
							isset($_GET["id"])
						) {
							echo $listar["jornada"];
						} ?>">
							<option value=""></option>
							<?php foreach ($jornada as $jornada): ?>
								<option value="<?= $jornada ?>">
									<?= $jornada ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="periodo_lectivo" class="form-label">Periodo Electivo</label>
						<select type="select" name="periodo_lectivo" type="text" class="form-control" id="periodo_lectivo" value="<?php if (
							isset($_GET["id"])
						) {
							echo $listar["periodo_lectivo"];
						} ?>">
							<option value=""></option>
							<?php foreach ($periodo_lectivo as $periodo_lectivo): ?>
								<option value="<?= $periodo_lectivo ?>">
									<?= $periodo_lectivo ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="procedencia" class="form-label">Procedencia</label>
						<input type="tel" name="procedencia" type="text" class="form-control" id="procedencia" value="<?php if (isset($_GET["id"])) {
							echo $listar["procedencia"];
						} ?>">
					</div>
				</div>

				<!-- acudiente -->
				<div class="tab-pane" id="form2">
					<div class="row form-control header-table">
						<div class="col">
							<h6>Acudiente</h6>
						</div>
					</div>
					<div class="col container-firmas">
						<div class="mb-3">
							<label for="nombre_acudiente" class="form-label">Nombre</label>
							<input type="text" name="nombre_acudiente" type="text" class="form-control" id="nombre_acudiente" value="<?php if (isset($_GET["id"])) {
								echo $listar["nombre_acudiente"];
							} ?>">
						</div>
						<div class="mb-3">
							<label for="celular_acudiente" class="form-label">Celular</label>
							<input type="tel" name="celular_acudiente" type="text" class="form-control" id="celular_acudiente" value="<?php if (isset($_GET["id"])) {
								echo $listar["celular_acudiente"];
							} ?>">
						</div>
						<div class="mb-3">
							<label for="parentesco" class="form-label">Parentesco</label>
							<input type="text" name="parentesco" type="text" class="form-control" id="parentesco" value="<?php if (isset($_GET["id"])) {
								echo $listar["parentesco"];
							} ?>">
						</div>
						<div class="mb-3">
							<label for="tipo_documento" class="form-label">Tipo de Identificación</label>
							<select name="tipo_documento" class="form-select" id="tipo_documento">
								<option value=""></option>
								<?php foreach ($tipo_doc as $tipo_doc): ?>
									<option value="<?= $tipo_doc ?>">
										<?= $tipo_doc ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="documento" class="form-label">Número de Identificación</label>
							<input name="documento" type="text" class="form-control" id="documento" value="<?php if (isset($_GET["id"]))
								echo $listar["documento"]; ?>">
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<a href="../index.php" class="btn btn-danger">Volver</a>
					<button id="botonF2" type="submit" class="btn btn-primary">
						<?php if (isset($_GET['id'])) {
							echo "ACTUALIZAR REGISTRO";
						} else {
							echo "REGISTRAR FACTURA";
						} ?>
					</button>
				</div>

		</form>
		<div class="contenedor">
			<button class="botonF1" id="botonF1">
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
						<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
						<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
					</svg>
				</span>
			</button>
			<button id="botonF3" class="btns botonF3">

				<div style="font-size: 10px; font-weight:600;">Atrás</div>
			</button>
		</div>

	</div>
	<script src="../../../vendor/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
	<script src="../../../vendor/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
	<script src="../../../vendor/jquery/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/matriculas.js?v=3.2"></script>

	<!-- SweetAlert -->
	<script src="../../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

</body>

</html>