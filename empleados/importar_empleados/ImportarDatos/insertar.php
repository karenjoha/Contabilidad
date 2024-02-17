<?php
require_once '../../empleado.entidad.php';
require_once '../../empleado.model.php';

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'contabilidad');

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;
try {
	$pdo = new PDO($servidor, USUARIO, PASSWORD,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
	//echo "<script>alert('Los registros se han cargado exitosamente a la base de datos');</script>";
} catch (PDOException $e) {
	echo "<script>alert('error al conectar con la base de datos');</script>";
}

$d1  = $_POST['d1'];
$d2  = $_POST['d2'];
$d3  = $_POST['d3'];
$d4  = $_POST['d4'];
$d5  = $_POST['d5'];
$d6  = $_POST['d6'];
$d7  = $_POST['d7'];
$d8  = $_POST['d8'];
$d9  = $_POST['d9'];
$d10 = $_POST['d10'];
$d11 = $_POST['d11'];
$d12 = $_POST['d12'];
$d13 = $_POST['d13'];
$d14 = $_POST['d14'];
$d15 = $_POST['d15'];
$d16 = $_POST['d16'];


$fecha = "2020-03-11 00:00:00";

//echo $d1." - ".$d2." - ".$d3." - ".$d4;
//$pdo= new Empleado();
$sentencia = $pdo->prepare("INSERT INTO empleados
      (cc_emple,nom_emple,fechan_emple,rh_emple,riesgo_emple,cargo_emple,celp_emple,celc_emple,fechain_emple,dira_emple,barrio_emple,cd_emple,nom_sos_emple,cel_sos_emple,par_sos_emple,doc_emple)
VALUES(:cc_emple,:nom_emple,:fechan_emple,:rh_emple,:riesgo_emple,:cargo_emple,:celp_emple,:celc_emple,:fechain_emple,:dira_emple,:barrio_emple,:cd_emple,:nom_sos_emple,:cel_sos_emple,:par_sos_emple,:doc_emple)");

$sentencia->bindParam(':cc_emple', $d1);
$sentencia->bindParam(':nom_emple', $d2);
$sentencia->bindParam(':fechan_emple', $d3);
$sentencia->bindParam(':rh_emple', $d4);
$sentencia->bindParam(':riesgo_emple', $d5);
$sentencia->bindParam(':cargo_emple', $d6);
$sentencia->bindParam(':celp_emple', $d7);
$sentencia->bindParam(':celc_emple', $d8);
$sentencia->bindParam(':fechain_emple', $d9);
$sentencia->bindParam(':dira_emple', $d10);
$sentencia->bindParam(':barrio_emple', $d11);
$sentencia->bindParam(':cd_emple', $d12);
$sentencia->bindParam(':nom_sos_emple', $d13);
$sentencia->bindParam(':cel_sos_emple', $d14);
$sentencia->bindParam(':par_sos_emple', $d15);
$sentencia->bindParam(':doc_emple', $d16);

$sentencia->execute();