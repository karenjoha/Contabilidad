<?php
$usuario  = "u155011905_lmzt";
$password = "0w1A~Fuyz=H";
$servidor = "https://auth-db884.hstgr.io/";
$basededatos = "u155011905_contabilidad";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>

