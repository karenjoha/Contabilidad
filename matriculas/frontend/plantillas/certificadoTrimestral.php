<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header("Location: http://lmzt.online/gestionadministrativa/login.php");
    exit();
}

require_once "../../backend/controlador/controlador.php";
require_once "../../backend/selectObjects.php";

require_once "../../notas/backend/controlador/controlador.php";

$controlador_matriculas = new controladorMatriculas();
$controlador_facturas   = new controladorCalificaciones();



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
// Obtener las calificaciones del alumno para el trimestre dado
$calificaciones = $controlador_facturas->ctrObtenerCalificacionesPorTrimestre($id_alumno, $_GET["trimestre"]);

switch ($_GET["trimestre"]) {
    case 1:
        $trimestre = "Primer";
        break;
    case 2:
        $trimestre = "Segundo";
        break;
    case 3:
        $trimestre = "Tercer";
        break;
    default:
        $trimestre = "Desconocido";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Certificado Trimestral</title>
    <link rel="stylesheet" href="../assets/css/certificados.css">
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            /* Espacio inferior entre la tabla y otros elementos */
        }

        /* Estilos para las celdas de encabezado */
        th {
            background-color: #b1f5b6;
            /* Color de fondo */
            padding: 8px;
            text-align: left;
            /* Alineación del texto */
            border-bottom: 1px solid #ddd;
            /* Borde inferior */
        }

        /* Estilos para las celdas de datos */
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            /* Borde inferior */
        }

        /* Estilos para filas alternas (opcional) */
        tr:nth-child(even) {
            background-color: #b1f5b6;
            /* Color de fondo */
        }

        body {
            font-size: 15px;
            text-align: justify;
        }

        .titulo {
            text-align: center;
        }
    </style>

</head>

<body>
    <img class="head_image" src="../../../vendor/images/certificados/fondo_certificado_head.jpg" alt="">
    <div style="font-family: Arial, sans-serif; margin: 0; padding: 20px;">
        <p><strong>GI230410484614</strong></p>
        <br>
        <p class="titulo">EL RECTOR DE LA INSTITUCIÓN DE EDUCACION PARA EL TRABAJO Y DESARROLLO HUMANO</p>
        <br>
        <p class="titulo"><strong>CERTIFICA QUE:</strong></p>
        <p>
            <?php echo $nombre_alumno; ?>, identificado(a) con documento de identidad CC Nº
            <?php echo $documento ?>, se encuentra matriculado(a) en el programa Técnico Laboral en
            <?php echo $grupo ?>, en el cual ha cursado y aprobado, el
            <?php echo $trimestre ?> trimestre:
        </p>
        <!-- Parte de la tabla para mostrar las calificaciones -->
        <table>
            <thead>
                <tr>
                    <th>MÓDULOS / TRIMESTRE</th>
                    <th>VALORACION</th>
                    <th>DURACIÓN EN HORAS</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Verificar si hay calificaciones
                if ($calificaciones) {
                    // Iterar sobre las calificaciones y mostrarlas en la tabla
                    foreach ($calificaciones as $calificacion) {
                        echo "<tr>";
                        echo "<td>" . $calificacion['materia'] . "</td>";
                        echo "<td>" . $calificacion['nota'] . "</td>";
                        echo "<td>48</td>";
                        echo "</tr>";
                    }
                } else {
                    // Si no hay calificaciones, mostrar un mensaje en la tabla
                    echo "<tr><td colspan='3'>No hay calificaciones para este trimestre.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <p>Para constancia se firma el presente certificado trimestral de Educación Laboral, en la ciudad de Medellín a los días (
            <?php echo strftime('%e') ?>) del mes de de
            <?php echo $meses[strftime('%B')] ?>.
        </p>
        <br>
        <p><strong>Cordialmente,</strong></p>
        <img class="firma" src="../../../vendor/images/certificados/firma_rector.png" alt="">
        <p><br><br><br></p>
        <p><strong>Beckembauer Ortega G.</strong><br>Rector</p>


    </div>
    <img class="pie_image" src="../../../vendor/images/certificados/fondo_certificado_pie.jpg" alt="">

</body>

</html>