<?php
session_start();

if (!isset($_SESSION['logged'])) {
	header("Location: http://lmzt.online/gestionadministrativa/login.php");
	exit();
}
// Configurar idioma local y zona horaria
setlocale(LC_TIME, 'es_CO.UTF-8');
date_default_timezone_set('America/Bogota');

// Array de nombres de los meses en español


require_once "../../backend/controlador/controlador.php";
require_once "../../backend/selectObjects.php";

$controlador_matriculas = new controladorMatriculas();

// Verificar si se proporcionó un ID de alumno
if (isset($_GET["id"])) {
	$id_alumno = $_GET["id"];

	// Obtener información del alumno
	$alumno = $controlador_matriculas->ctrListarRegistros("id_alumno", $id_alumno);
	if (!$alumno) {
		// Redireccionar si no se encuentra el alumno
		header("Location: http://lmzt.online/gestionadministrativa/error.php");
		exit();
	}
} else {
	// Redireccionar si no se proporcionó un ID
	header("Location: http://lmzt.online/gestionadministrativa/error.php");
	exit();
}

// Extraer los datos necesarios del alumno
$nombre_alumno    = $alumno['nombre_alum'] ?? '';
$tipo_documento   = $alumno['tipo_documento'] ?? '';
$documento        = $alumno['documento'] ?? '';
$grupo            = $alumno["grupo"] ?? '';
$celular          = $alumno["celular"] ?? '';
$ciudad           = $alumno["ciudad"] ?? '';
$rh               = $alumno["rh"] ?? '';
$file             = $alumno["file"] ?? '';
$fecha_nacimiento = $alumno["fecha_nacimiento"] ?? '';

$fecha_nacimiento_timestamp = strtotime($fecha_nacimiento);
$hoy_timestamp              = time(); // Esto obtiene la fecha actual en formato Unix timestamp

$edad_timestamp = $hoy_timestamp - $fecha_nacimiento_timestamp;

// Convertir la diferencia de tiempo en años
$edad = floor($edad_timestamp / (365 * 24 * 60 * 60)); // 365 días, 24 horas, 60 minutos, 60 segundos

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carnet</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 20px;
		}

		.container {
			position: relative;
			margin-left: 3rem;
			width: 80%;
		}

		img {
			width: 100%;
			display: block;
		}

		.imagenes {
			width: 35rem;
			height: auto;
		}

		.alumno {
			font-size: 11px;
			display: block;
			max-width: 17rem;
			position: absolute;
			top: 7rem;
			left: 19rem;
		}

		.grupo_alumno {
			font-size: 16px;
			width: 15rem;
			position: absolute;
			left: 20rem;
			text-align: center;
			margin-top: -8rem;
		}

		.valides {
			position: absolute;
			top: 12rem;
			left: 2rem;
			font-size: 13px;
		}

		.datos {
			position: absolute;
			top: 5rem;
			left: 2rem;
			width: 20rem;
			font-size: 11px;
		}

		table {
			border-collapse: collapse;
		}

		td,
		th {
			padding: 5px;
		}

		td:nth-child(2) {
			font-weight: bold;
		}

		td+td {
			padding-left: 20px;
		}

		.image_alum {
			width: 7rem;
			height: 9rem;
			position: absolute;
			z-index: 1;
			margin-top: 8rem;
			border: 0.5rem solid #1495D1;
			margin-left: 7rem;
		}

	</style>
</head>

<body class="backgraound">
	<img class="image_alum" src="<?php echo $file ?>" alt="Vista previa de la imagen">

	<div class="container">
		<img class="imagenes" src="../../../vendor/images/certificados/fondo.png" alt="">
		<div class="alumno">
			<h2>
				<?php echo $nombre_alumno; ?>
			</h2>
			<p>ID CC
				<?php echo $documento; ?>
			</p>
		</div>
		<div class="grupo_alumno">
			<p>
				<?php echo $grupo ?>
			</p>
		</div>
	</div>
	<br>
	<div class="container">
		<img class="imagenes" src="../../../vendor/images/certificados/fondoatras.png" alt="">
		<div class="valides">
			<p>Valido por 1 año a partir de su expedición </p>
		</div>
		<div class="datos">
			<table>
				<tbody>
					<tr>
						<td>Tipo de Sangre</td>
						<td>
							<?php echo $rh ?>
						</td>
					</tr>
					<tr>
						<td>No. de Contacto</td>
						<td>
							<?php echo $celular ?>
						</td>
					</tr>
					<tr>
						<td>Ciudad o Municipio</td>
						<td>
							<?php echo $ciudad ?>
						</td>
					</tr>
					<tr>
						<td>Edad</td>
						<td>
							<?php echo $edad ?>
						</td>
					</tr>
					<tr>
						<td>Expedido</td>
						<td>
							<?php echo date('d/m/Y'); ?>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</body>

</html>