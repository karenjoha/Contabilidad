<?php
require 'usuarios/backend/modelos/usuario.model.php';
?>

<?php
session_start();


define('SITE_ROOT', realpath(dirname(__FILE__)));
$usuario = trim($_SESSION['usuario']);
$rol     = $_SESSION['rol'];

if (isset($_SESSION['logged']) === FALSE) {
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="es">
<title>GESTION ADMINISTRATIVA</title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="vendor/images/icon-home.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;800&display=swap">
    <link rel="stylesheet" href="vendor/semantic/semantic-2.4.0/semantic.min.css">
    <link rel="stylesheet" href="vendor/css/root/index/index.css">
    <link rel="stylesheet" href="vendor/css/menu_usuario.css">
    <link rel="stylesheet" href="vendor/css/preloader.css">
    <link rel="stylesheet" href="nav_responsive.css">
    <!-- BootStrap -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
    <link rel="stylesheet" href="modalFirmas/stylesMdl.css">
    <style>
        .item {
            padding: 5rem;
            background-color: #f0f0f0;
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 6%;
            height: 15%;
            margin: 2rem;
            border-radius: 1rem;
        }

        .item:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>

<body style="background-color: black;">
    <div>
        <?php require_once 'nav.php'; ?>
        <div>
            <?php if ($rol == 1 || $rol == 20 || $rol == 24) { ?>
                <div class="archivos">
                    <a class="item" href="calendario/frontend">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="27" height="27" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path d="M 90 66.551 c 0 1.446 -1.176 2.621 -2.621 2.621 h -1.512 V 38.681 c 0 -5.089 -4.141 -9.23 -9.23 -9.23 H 46.279 c -1.958 -0.569 -3.303 -2.343 -3.303 -4.407 c 0 -5.427 -4.415 -9.842 -9.842 -9.842 H 9.766 c 0.046 -2.286 1.912 -4.133 4.208 -4.133 h 28.918 c 2.325 0 4.216 1.891 4.216 4.217 c 0 4.801 3.27 8.897 7.951 9.962 c 0.205 0.046 0.414 0.07 0.624 0.07 h 30.711 c 1.989 0 3.606 1.617 3.606 3.605 V 66.551 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 76.637 35.076 H 45.926 c -0.21 0 -0.419 -0.024 -0.623 -0.07 c -4.682 -1.065 -7.951 -5.161 -7.951 -9.962 c 0 -2.325 -1.891 -4.217 -4.217 -4.217 H 4.217 C 1.891 20.827 0 22.719 0 25.044 v 51.265 c 0 1.446 1.176 2.621 2.621 2.621 h 74.999 c 1.446 0 2.621 -1.176 2.621 -2.621 V 38.681 C 80.242 36.693 78.625 35.076 76.637 35.076 z M 29.16 44.958 c 0 2.318 -1.886 4.203 -4.203 4.203 H 13.363 c -2.318 0 -4.203 -1.885 -4.203 -4.203 v -4.622 c 0 -2.318 1.885 -4.203 4.203 -4.203 h 11.594 c 2.318 0 4.203 1.886 4.203 4.203 V 44.958 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                        <div style="margin-bottom: 2px">Calendario</div>
                    </a>
                <?php } ?>
            </div>
            <?php if ($rol == 1 || $rol == 2 || $usuario == 'MANUELA MUÑOZ') { ?>
                <div class="facturas ">
                    <a class="item" href="facturas/frontend/">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="27" height="27" viewBox="0 0 256 256" xml:space="preserve">
                            <defs></defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path d="M 86.181 3.998 H 3.819 C 1.71 3.998 0 5.708 0 7.817 v 55.461 c 0 2.109 1.71 3.819 3.819 3.819 h 10.129 v 18.904 L 33.21 67.098 h 52.97 c 2.109 0 3.819 -1.71 3.819 -3.819 V 7.817 C 90 5.708 88.29 3.998 86.181 3.998 z M 45 57.998 c -3.504 0 -6.355 -2.851 -6.355 -6.355 c 0 -3.504 2.851 -6.354 6.355 -6.354 s 6.354 2.85 6.354 6.354 C 51.354 55.147 48.504 57.998 45 57.998 z M 51.354 36.582 c 0 3.504 -2.85 6.354 -6.354 6.354 s -6.355 -2.851 -6.355 -6.354 V 18.544 c 0 -2.128 1.732 -3.86 3.86 -3.86 h 4.99 c 2.128 0 3.859 1.732 3.859 3.86 V 36.582 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                        <div style="margin-bottom: 2px">Comprobantes</div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery3.3.1.min.js"></script>
    <script src="vendor/js/general.js"></script>
    <script src="vendor/sweet_alert/sweetalert2.all.min.js"></script>
    <!-- Utilidades -->
    <script src="modalFirmas/functionsMdl.js?v=1"></script>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery3.3.1.min.js"></script>
    <script src="vendor/sweet_alert/sweetalert2.all.min.js"></script>
    <script src="vendor/DataTables/datatables.min.js"></script>
    <script src="vendor/DataTables/DataTables-1.11.4/js/dataTables.bootstrap5.js"></script>
    <!-- Local Utilities -->
    <script src="vendor/js/menu_usuario.js"></script>
    <script src="vendor/js/general.js"></script>

    <!-- Bootstrap -->
    <script src="vendor/bootstrap/bootstrap-3.3.7/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>