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
setlocale(LC_TIME, 'es_CO.UTF-8');
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

<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carta</title>
	<!-- Aquí van tus estilos CSS -->
	<style>
		body {
			font-size: 15px;
			text-align: justify;
		}

		.head_image {
			max-width: 100%;
			margin: -35;
		}

		.pie_image {
			max-width: 100%;
			margin: -10;
			position: absolute;
			z-index: -1;
		}

		.firma {
			width: 11rem;
			position: absolute;
			margin-top: -2rem;
			z-index: -1;
		}
	</style>
</head>

<body>
	<img class="head_image" src="../../../vendor/images/certificados/fondo_certificado_head.jpg" alt="">
	<div style="font-family: Arial, sans-serif; margin: 0; padding: 20px;">
		<p>Medellín,
			<?php echo str_replace(array_keys($meses), array_values($meses), strftime('%d de %B de %Y')); ?>
		</p>
		<p>Señores ECAT S.A.S<br>
			NIT 901487997-6<br>
			Medellín - Antioquia</p>
		<p><strong>Cordial Saludo:</strong></p>
		<p>ITELME “Instituto Técnico Laboral de Medellín”, Institución de Educación para el Trabajo y el Desarrollo Humano, de propiedad de Global System International SAS con Nit.900.733.974-9, ubicado en la Calle 16 Sur No. 48B-04, con Licencia de Funcionamiento No.10140 de 2011 - No.008176 de 2015 - No. 202250030794 de 2022 y No. 202350083762, expedida por la Secretaria de Educación de Medellín Distrito Especial de Ciencia, Tecnología e Innovación, en cumplimiento de la Ley General de Educación 115 de 1994, Decreto 1075 de 2015 y demás concordantes por el Ministerio de Educación Nacional.</p>
		<p>Formamos Técnicos competentes en los siguientes programas <strong>TÉCNICOS LABORALES POR COMPETENCIA EN</strong>: Auxiliar Contable y Financiero, Auxiliar Administrativo, Secretaria(o) Ejecutiva(o), Auxiliar en Mercadeo y Ventas, Auxiliar de Comercio Exterior, Asistente de Cocina Internacional, Recepción Hotelera, Auxiliar en Investigación judicial y Criminalística y Auxiliar de Educación a la Primera Infancia y Auxiliar en Mecánica Dental, “Educación para el Trabajo y el Desarrollo Humano”.</p>
		<p>Nuestros estudiantes deben realizar una práctica empresarial, las cuales tienen como objetivo complementar su aprendizaje en lo que compete al área de aplicación de los conceptos teóricos en la práctica, por lo tanto, solicitamos su colaboración permitiendo presentar prácticas empresariales en su empresa a la estudiante: <strong>
				<?php echo $nombre_alumno; ?>
			</strong> identificada con documento de identidad No.
			<?php echo $documento; ?> Estudiante del programa Técnico Laboral en <strong>
				<?php echo $grupo ?>
			</strong> con una duración mínima de 360 horas.
		</p>
		<p>Quedamos atentos a cualquier información adicional.</p>
		<p><strong>Atentamente,</strong></p>
		<img class="firma" src="../../../vendor/images/certificados/firma.png" alt="">
		<p><br><br><br></p>
		<p><strong>ADRIANA MARÍA ZAPATA MARTINEZ</strong>
			<br> Secretaria Académica
		</p>
	</div>
	<img class="pie_image" src="../../../vendor/images/certificados/fondo_certificado_pie.jpg" alt="">
</body>

</html>