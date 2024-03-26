<?php
session_start();

if (!isset ($_SESSION['logged'])) {
	header("Location: http://lmzt.online/gestionadministrativa/login.php");
	exit();
}

require_once "../../backend/controlador/controlador.php";
require_once "../../backend/selectObjects.php";

$controlador_matriculas = new controladorMatriculas();

// Verificar si se proporcionó un ID de alumno
if (isset ($_GET["id"])) {
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

// Configurar idioma local y zona horaria
setlocale(LC_TIME, 'es_ES.UTF-8'); // Ajusta el locale a español
date_default_timezone_set('America/Bogota');

// Array de nombres de los meses en español
$meses = [
	'January' => 'enero',
	'February' => 'febrero',
	'March' => 'marzo',
	'April' => 'abril',
	'May' => 'mayo',
	'June' => 'junio',
	'July' => 'julio',
	'August' => 'agosto',
	'September' => 'septiembre',
	'October' => 'octubre',
	'November' => 'noviembre',
	'December' => 'diciembre',
];

// Extraer los datos necesarios del alumno
$nombre_alumno  = $alumno['nombre_alum'] ?? '';
$tipo_documento = $alumno['tipo_documento'] ?? '';
$documento      = $alumno['documento'] ?? '';
$grupo          = $alumno["grupo"] ?? '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Certificado Trimestral</title>
	<link rel="stylesheet" href="../assets/css/certificados.css">

</head>

<body>
	<img class="head_image" src="fondo_certificado_head.jpg" alt="">
	<div style="font-family: Arial, sans-serif; margin: 0; padding: 20px;">
		<p><strong>GI230410484614</strong></p>
		<br>
		<p>EL RECTOR DE LA INSTITUCIÓN DE EDUCACION PARA EL TRABAJO Y DESARROLLO HUMANO</p>
		<br>
		<p><strong>CERTIFICA QUE:</strong></p>
		<p>
			<?php echo $nombre_alumno; ?>, identificado(a) con documento de identidad CC Nº
			<?php echo $documento ?>, se encuentra matriculado(a) en el programa Técnico Laboral en
			<?php echo $grupo ?>, en el cual ha cursado y aprobado, el <!--  --> primer <!--  --> trimestre:
		</p>
		<table>
			<thead>
				<tr>
					<th>MÓDULOS</th>
					<th>VALORACION</th>
					<th>DURACIÓN EN HORAS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>VALORACION</td>
					<td>48</td>
				</tr>
				<tr>
					<td>48</td>
					<td></td>
				</tr>
				<tr>
					<td>48</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<p>Para constancia se firma el presente certificado trimestral de Educación Laboral, en la ciudad de Medellín a los días (<?php echo strftime('%e') ?>) del mes de de <?php echo $meses[strftime('%B')] ?>.</p>
		<br>
		<p><strong>Cordialmente,</strong></p>
		<img class="firma" src="firma_rector.png" alt="">
		<p><br><br><br></p>
		<p><strong>Beckembauer Ortega G.</strong><br>Rector</p>


	</div>
	<img class="pie_image" src="fondo_certificado_pie.jpg" alt="">

</body>

</html>