<?php
session_start();
require_once 'log.php';
$usuario = $_SESSION['usuario'];

$log = new Log_Visita();
$usuario = $_SESSION['usuario'];
$log->__SET('id_log', $_SESSION['id_log_visitas']);
$log->__SET('usuario', $_SESSION['usuario']);
$log->__SET('fecha_ingreso', '');
$log->__SET('fecha_salida', '');

$modelL = new LogModel();
$modelL->Actualizar($log);
unset($_SESSION['logged']);
session_destroy();
header("Location: index.php");
?>