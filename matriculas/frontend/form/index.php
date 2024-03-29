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

if ($rol == 1 || $rol == 3){
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
	<link rel="stylesheet" href="../assets/css/form_matriculas.css?v=1">

	<title>Matricula</title>
</head>

<body>
	<div class="container">
		<a href="../index.php" class="btn btn-danger" style="margin-top:20px;">Volver</a>


		<!-- HEADER TAB BUTTONS -->
		<div class="nav btn-group mb-2 mt-5" <?php if (!isset($_GET["id"]))
			echo 'style="display: none;"'; ?>>
			<a class="btn btn-primary active" aria-current="page" href="#form" data-bs-toggle="tab">INFORMACION PRINCIPAL</a>
			<a class="btn btn-primary" href="#form1" data-bs-toggle="tab">REGISTRO ACADEMICO</a>
			<a class="btn btn-primary" href="#form2" data-bs-toggle="tab">ACUDIENTE</a>
		</div>

		<!-- FORMULARIO -->
		<form id="form_matricula" method="POST" action="" enctype="multipart/form-data">

			<!-- ID Oculto -->
			<?php if (isset($_GET["id"])) { ?>
				<!-- Obtenemos los id y los imprimimos ocultos en la vista para actualizar las respectivas tablas desde el modelo -->
				<input type="hidden" name="id_alumno" value="<?php echo $listar["id_alumno"]; ?>">
				<input type="hidden" name="id_registro_academico" value="<?php echo $listar["id_registro_academico"]; ?>">
				<input type="hidden" name="id_acudiente" value="<?php echo $listar["id_acudiente"]; ?>">
			<?php } ?>

			<!-- informacion principal -->
			<div class="tab-content">
				<div class="tab-pane active" id="form">

					<div class="mb-3" style="display:none">
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

					<div class="row">
						<div class="col-md-6">
							<label for="nombre_alum" class="form-label">Nombres</label>
							<input name="nombre_alum" type="text" class="form-control" id="nombre_alum" value="<?php if (isset($_GET["id"])) {
								echo $listar["nombre_alum"];
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="primer_apellido" class="form-label">Primer Apellido</label>
							<input name="primer_apellido" type="text" class="form-control" id="primer_apellido" value="<?php if (isset($_GET["id"])) {
								echo $listar["primer_apellido"];
							} ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="segundo_apellido" class="form-label">Segundo Apellido</label>
							<input name="segundo_apellido" type="text" class="form-control" id="segundo_apellido" value="<?php if (isset($_GET["id"])) {
								echo $listar["segundo_apellido"];
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="tipo_documento" class="form-label">Tipo de Identificación</label>
							<select name="tipo_documento" class="form-select" id="tipo_documento" required>
								<option value="<?php echo isset($listar['tipo_documento']) ? $listar['tipo_documento'] : ''; ?>" selected>
									<?php echo isset($listar['tipo_documento']) ? $listar['tipo_documento'] : ''; ?>
								</option>
								<?php foreach ($tipo_doc as $tipo_docs): ?>
									<option value="<?= $tipo_docs ?>">
										<?= $tipo_docs ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="documento" class="form-label">Número de Identificación</label>
							<input name="documento" type="text" class="form-control" id="documento" value="<?php if (isset($_GET["id"]))
								echo $listar["documento"]; ?>" required>
						</div>
						<div class="col-md-6">
							<label for="fecha_nacimiento" class="form-label">Fecha de Naciemiento</label>
							<input name="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" value="<?php if (isset($_GET["id"]))
								echo $listar["fecha_nacimiento"]; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="sexo" class="form-label">Sexo</label>
							<select name="sexo" class="form-select" id="sexo" required>
								<option value="<?php echo isset($listar['sexo']) ? $listar['sexo'] : ''; ?>" selected>
									<?php echo isset($listar['sexo']) ? $listar['sexo'] : ''; ?>
								</option>
								<?php foreach ($sexo as $sexo): ?>
									<option value="<?= $sexo ?>">
										<?= $sexo ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="lugar_nacimiento" class="form-label">Lugar Nacimiento</label>
							<input name="lugar_nacimiento" type="text" class="form-control" id="lugar_nacimiento" value="<?php if (isset($_GET["id"])) {
								echo $listar["lugar_nacimiento"];
							} else {
								echo "";
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="nacionalidad" class="form-label">Nacionalidad</label>
							<input name="nacionalidad" type="text" class="form-control" id="nacionalidad" value="<?php if (isset($_GET["id"])) {
								echo $listar["nacionalidad"];
							} else {
								echo "";
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="rh" class="form-label">Tipo de Sangre</label>
							<select name="rh" class="form-select" id="rh" required>
								<option value="<?php echo isset($listar['rh']) ? $listar['rh'] : ''; ?>" selected>
									<?php echo isset($listar['rh']) ? $listar['rh'] : ''; ?>
								</option>
								<?php foreach ($rh as $rh): ?>
									<option value="<?= $rh ?>">
										<?= $rh ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="direccion" class="form-label">Direccion</label>
							<input type="tel" name="direccion" type="text" class="form-control" id="direccion" value="<?php if (isset($_GET["id"])) {
								echo $listar["direccion"];
							} else {
								echo "";
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="ciudad" class="form-label">Ciudad o Municipio</label>
							<input type="tel" name="ciudad" type="text" class="form-control" id="ciudad" value="<?php if (isset($_GET["id"])) {
								echo $listar["ciudad"];
							} else {
								echo "";
							} ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="barrio" class="form-label">Barrio</label>
							<input name="barrio" type="text" class="form-control" id="barrio" value="<?php if (isset($_GET["id"])) {
								echo $listar["barrio"];
							} ?>" required>
						</div>

						<div class="col-md-6">
							<label for="comuna" class="form-label">Comuna</label>
							<input name="comuna" type="text" class="form-control" id="comuna" value="<?php if (isset($_GET["id"])) {
								echo $listar["comuna"];
							} ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="estrato" class="form-label">Estrato</label>
							<select name="estrato" class="form-select" id="estrarto" required>
								<option value="<?php echo isset($listar['estrato']) ? $listar['estrato'] : ''; ?>" selected>
									<?php echo isset($listar['estrato']) ? $listar['estrato'] : ''; ?>
								</option>
								<?php foreach ($estrato as $estratos): ?>
									<option value="<?= $estratos ?>">
										<?= $estratos ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="celular" class="form-label">Numero #1</label>
							<input name="celular" type="text" class="form-control" id="celular" value="<?php if (isset($_GET["id"])) {
								echo $listar["celular"];
							} ?>" required>
						</div>
					</div>
					<div class="row">

						<div class="col-md-6">
							<label for="segundo_celular" class="form-label">Numero #2</label>
							<input name="segundo_celular" type="text" class="form-control" id="segundo_celular" value="<?php if (isset($_GET["id"])) {
								echo $listar["segundo_celular"];
							} ?>">
						</div>
						<div class="col-md-6">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" class="form-control" id="email" value="<?php if (isset($_GET["id"])) {
								echo $listar["email"];
							} ?>" required>
						</div>

					</div>
					<div class="mb-3">
						<label for="file" class="form-label">FOTO DEL ALUMNO</label>
						<input name="file" type="file" accept="image/*" class="form-control" id="file" onchange="previewImage(event)">
						<?php
						// Verifica si estás en modo de actualización y si hay una imagen asociada al registro
						if (isset($_GET["id"]) && isset($listar["file"]) && !empty($listar["file"])) {
							// Muestra la vista previa de la imagen asociada
							echo '<img id="preview" src="' . $listar["file"] . '" alt="Vista previa de la imagen" style="max-width: 100px; max-height: 100px;">';
						} else {
							// Muestra un espacio para la vista previa de la imagen
							echo '<img id="preview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100px; max-height: 100px;">';
						}
						?>
					</div>
				</div>
				<!-- registro Academico -->
				<div class="tab-pane" id="form1">

					<div class="row">
						<div class="col-md-6">
							<label for="grupo" class="form-label">Grupo</label>
							<select type="select" name="grupo" type="text" class="form-control" id="grupo" value="<?php if (isset($_GET["id"])) {
								echo $listar["grupo"];
							} ?>" required>
								<option value="<?php echo isset($listar['grupo']) ? $listar['grupo'] : ''; ?>" selected>
									<?php echo isset($listar['grupo']) ? $listar['grupo'] : ''; ?>
								</option>
								<?php foreach ($grupos as $grupos): ?>
									<option value="<?= $grupos ?>">
										<?= $grupos ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="jornada" class="form-label">Jornada</label>
							<select type="select" name="jornada" type="text" class="form-control" id="jornada" value="<?php if (
								isset($_GET["id"])
							) {
								echo $listar["jornada"];
							} ?>" required>
								<option value="<?php echo isset($listar['jornada']) ? $listar['jornada'] : ''; ?>" selected>
									<?php echo isset($listar['jornada']) ? $listar['jornada'] : ''; ?>
								</option>
								<?php foreach ($jornada as $jornada): ?>
									<option value="<?= $jornada ?>">
										<?= $jornada ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="periodo_lectivo" class="form-label">Periodo Electivo</label>
							<select type="select" name="periodo_lectivo" type="text" class="form-control" id="periodo_lectivo" value="<?php if (
								isset($_GET["id"])
							) {
								echo $listar["periodo_lectivo"];
							} ?>" required>
								<option value="<?php echo isset($listar['periodo_lectivo']) ? $listar['periodo_lectivo'] : ''; ?>" selected>
									<?php echo isset($listar['periodo_lectivo']) ? $listar['periodo_lectivo'] : ''; ?>
								</option>
								<?php foreach ($periodo_lectivo as $periodo_lectivo): ?>
									<option value="<?= $periodo_lectivo ?>">
										<?= $periodo_lectivo ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="procedencia" class="form-label">Procedencia</label>
							<input type="tel" name="procedencia" type="text" class="form-control" id="procedencia" value="<?php if (isset($_GET["id"])) {
								echo $listar["procedencia"];
							} ?>" required>
						</div>
					</div>
				</div>
				<!-- acudiente -->
				<div class="tab-pane" id="form2">
					<div class="row">
						<div class="col-md-6">
							<label for="nombre_acudiente" class="form-label">Nombre Acudiente</label>
							<input type="text" name="nombre_acudiente" type="text" class="form-control" id="nombre_acudiente" value="<?php if (isset($_GET["id"])) {
								echo $listar["nombre_acudiente"];
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="celular_acudiente" class="form-label">Celular</label>
							<input type="tel" name="celular_acudiente" type="text" class="form-control" id="celular_acudiente" value="<?php if (isset($_GET["id"])) {
								echo $listar["celular_acudiente"];
							} ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="parentesco" class="form-label">Parentesco</label>
							<input type="text" name="parentesco" type="text" class="form-control" id="parentesco" value="<?php if (isset($_GET["id"])) {
								echo $listar["parentesco"];
							} ?>" required>
						</div>
						<div class="col-md-6">
							<label for="tipo_documento_acudiente" class="form-label">Tipo de Identificación</label>
							<select name="tipo_documento_acudiente" class="form-select" id="tipo_documento_acudiente" required>
								<option value="<?php echo isset($listar['tipo_documento_acudiente']) ? $listar['tipo_documento_acudiente'] : ''; ?>" selected>
									<?php echo isset($listar['tipo_documento_acudiente']) ? $listar['tipo_documento_acudiente'] : ''; ?>
								</option>
								<?php foreach ($tipo_doc as $tipo_docs): ?>
									<option value="<?= $tipo_docs ?>">
										<?= $tipo_docs ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="mb-3">
						<label for="documento_acudiente" class="form-label">Número de Identificación</label>
						<input name="documento_acudiente" type="text" class="form-control" id="documento_acudiente" value="<?php if (isset($_GET["id"]))
							echo $listar["documento"]; ?>" required>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<button id="botonAnterior" class="btn botones" onclick="mostrarPestanaAnterior()">
						< Regresar</button>
							<button id="botonContinuar" class="btn botones" onclick="mostrarSiguientePestana()">Continuar ></button>
							<!-- 										<button id="botonF2" type="submit" class="btn btn-primary">
						<?php if (isset($_GET['id'])) {
							echo "ACTUALIZAR REGISTRO";
						} else {
							echo "REGISTRAR FACTURA";
						} ?>
					</button> -->
				</div>

		</form>
	</div>

	<script src="../../../vendor/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
	<script src="../../../vendor/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
	<script src="../../../vendor/jquery/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/matriculas.js?v=3.4"></script>

	<!-- SweetAlert -->
	<script src="../../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

</body>

</html>
<?php
} else {
	header("Location: ../index.php");
}
?>