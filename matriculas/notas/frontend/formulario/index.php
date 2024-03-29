<?php

session_start();

if (isset($_SESSION['logged']) === FALSE) {
    header("Location: http://10.1.1.8/gestionadministrativa/login.php");
}

require_once "../../backend/controlador/controlador.php";
require_once "../../backend/modelo/modelo.php";
require_once "../../../backend/selectObjects.php";

date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, "spanish");
//  Separamos la fecha y la hora
$fecha              = date('d-m-Y H:i');
$fechaLocalSeparada = explode(" ", $fecha);
$fechaA             = $fechaLocalSeparada[0];
$fechaL             = explode("-", $fechaA);
$fecha_registro     = $fechaL[0] . '/' . $fechaL[1] . '/' . $fechaL[2];

if (isset($_SESSION['logged']) === FALSE) {
    header("Location: http://10.1.1.8/gestionadministrativa/login.php");
}

$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

//Editar REGISTROS
if (isset($_GET["id_calificacion"])) {
    $item  = "id_calificacion";
    $valor = $_GET["id_calificacion"];

    $listar     = controladorCalificaciones::ctrListarRegistros($item, $valor);
    $actualizar = new controladorCalificaciones();
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
    $registro = controladorCalificaciones::ctrRegistro();
}

// Aquí establecemos el usuario que inició sesión como el empleado que registra
$empleado_registra = $usuario;

if ($rol == 1 || $rol == 2 || $usuario == 'MANUELA MUÑOZ') { ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>NOTAS</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../../../../vendor/images/icon-home.png" type="image/png">

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="../../../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
        <!-- Font Raleway -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;800&display=swap">
        <!-- Librerías Locales -->
        <link rel="stylesheet" href="../assets/css/form_facturas.css">
        <link rel="stylesheet" href="../../../../vendor/css/preloader.css?n=1">
        <!-- Select 2 -->
        <link rel="stylesheet" href="../../../../vendor/select2/select2.min.css">
        <link rel="stylesheet" href="../../../../vendor/select2/select2-bootstrap-5-theme.min.css">
        <style>
            select>option {
                text-align: center;
            }

            body {
                padding-top: 50px;
                padding-bottom: 50px;
                margin: 5rem;
            }

            .form-group {
                margin-bottom: 20px;
                /* Espacio entre los elementos del formulario */
            }

            /* Alinear los botones en el centro */
            .btn-center {
                text-align: center;
            }

            .button {
                margin: 3rem;
            }
        </style>
    </head>

    <body>
        <form id="form_facturas" method="POST">
            <!-- ID REGISTRO -->
            <?php if (isset($_GET['id_calificacion'])) { ?>
                <!-- Obtenemos los id y los imprimimos ocultos en la vista para actualizar las respectivas tablas desde el modelo -->
                <input type="hidden" name="id_calificacion" value="<?php echo $listar['id_calificacion'] ?>">
            <?php } ?>
            <!-- USUARIO CREADOR -->
            <input type="hidden" name="usu_cambio" value="<?php echo $usuario ?>">
            <input type="hidden" name="empleado_registra" value="<?php echo $empleado_registra ?>">
            <table class="table table-light">
                <tbody>

                    <div class="mb-3" style="display: none">
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
                            <label for="materia" class="form-label">MATERIA</label>
                            <input name="materia" type="text" class="form-control" id="materia" value="<?php echo isset($listar["materia"]) ? $listar["materia"] : ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="trimestre" class="form-label">TRIMESTRE</label>
                            <select name="trimestre" class="form-select" id="trimestre" required>
                                <option value="<?php echo isset($listar['trimestre']) ? $listar['trimestre'] : ''; ?>" selected>
                                    <?php echo isset($listar['trimestre']) ? $listar['trimestre'] : ''; ?>
                                </option>
                                <?php foreach ($trimestres as $trimestress): ?>
                                    <option value="<?= $trimestress ?>">
                                        <?= $trimestress ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nota" class="form-label">NOTA</label>
                            <input name="nota" type="text" class="form-control" id="nota" value="<?php echo isset($listar["nota"]) ? $listar["nota"] : ''; ?>" required>
                        </div>
                        <?php if (isset($_GET['id_calificacion'])) { ?>
                            <div class="col-md-6">
                                <label for="id_alumno" class="form-label">ALUMNO</label>
                                <input readonly name="id_alumno" type="text" class="form-control" id="id_alumno" value="<?php echo isset($listar["id_alumno"]) ? $listar["id_alumno"] : ''; ?>">
                            </div>
                        <?php } else { ?>
                            <div class="col-md-6">
                                <label for="id_alumno" class="form-label">ALUMNO</label>
                                <input readonly name="id_alumno" type="text" class="form-control" id="id_alumno" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : ''; ?>">
                            </div>
                        <?php } ?>

                    </div>
                    <tr>
                        <td colspan="2">

                            <div class="d-flex justify-content-center">
                                <a href="../index.php" class="btn btn-danger button">VER NOTAS</a>
                                <button type="submit" class="btn btn-primary button">
                                    <?php if (isset($_GET['id_calificacion'])) {
                                        echo "ACTUALIZAR REGISTRO";
                                    } else {
                                        echo "REGISTRAR CALIFICACIÒN";
                                    } ?>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>

    </html>
    <?php
} else {
    header("Location: ../index.php");
}
?>