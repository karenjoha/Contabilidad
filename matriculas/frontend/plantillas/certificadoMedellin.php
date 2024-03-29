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
$fecha_registro          = $alumno["fecha_registro"] ?? '';

// Convertir la fecha de registro al formato deseado
$fecha_registro_formateada = strftime('%e') . ' de ' . $meses[strftime('%B')] . ' de ' . strftime('%Y');
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Constancia</title>
	<link rel="stylesheet" href="../assets/css/certificados.css">

</head>

<body>
	<img class="head_image" src="../../../vendor/images/certificados/fondo_certificado_head.jpg" alt="">
	<div style="font-family: Arial, sans-serif; margin: 0; padding: 20px;">
		<p><strong>HACE CONSTAR</strong></p>
		<p>Que, <strong>
				<?php echo $nombre_alumno; ?>
			</strong> identificado con Cédula de Ciudadanía No.
			<?php echo $documento ?>, se encuentra cursando el programa Técnico Laboral en <strong>
				<?php echo $grupo ?>
			</strong>, los días sábados, en el horario diurno de 7:00 am a 3:00 pm.
		</p>
		<p>Fecha de inicio del proceso académico, <?php echo $fecha_registro_formateada; ?>.</p>
		<p>Se expide a solicitud del interesado, a los <?php echo strftime('%e') ?> días del mes de <?php echo $meses[strftime('%B')] ?> de <?php echo strftime('%Y') ?>.</p>
		<br>
		<p><strong>Atentamente,</strong></p>
		<img class="firma" src="../../../vendor/images/certificados/firma.png" alt="">
		<p><br><br><br></p>
		<p><strong>ADRIANA MARIA ZAPATA MARTINEZ</strong><br>Admisiones y Registro<br>EME/245034</p>
	</div>
	<img class="pie_image" src="../../../vendor/images/certificados/fondo_certificado_pie.jpg" alt="">
</body>

</html>
