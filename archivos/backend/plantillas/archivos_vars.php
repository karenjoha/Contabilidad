<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/contabilidad/archivos/backend/controladores/controlador.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/contabilidad/archivos/backend/modelos/archivo_model.php";


if (isset($_GET['id'])) {
	$item   = "id_archivosP";
	$valor  = $_GET["id"];
	$listar = controladorArchivos::ctrListarRegistros($item, $valor);

	////////////////
	//LISTA DE DATOS
	////////////////

	if ($listar['firma_entrega_prestamo'] != '') {
		$f_entrega_prestamo = 'src="' . $listar['firma_entrega_prestamo'] . '"';
	} else {
		$f_entrega_prestamo = '';
	}

	if ($listar['firma_recibe_prestamo'] != '') {
		$f_recibe_prestamo = 'src="' . $listar['firma_recibe_prestamo'] . '"';
		$margin            = "margin-top: -100px;";

	} else {
		$f_recibe_prestamo = '';
		$margin            = "margin-top: -70px;";
	}

	if ($listar['firma_recibe_devolucion'] != '') {
		$f_recibeD = 'src="' . $listar['firma_recibe_devolucion'] . '"';
		$margin1   = "margin-top: -100";

	} else {
		$f_recibeD = '';
		$margin1   = "margin-top: -70";


	}

	if ($listar['firma_devuelve_prestamo'] != '') {
		$f_devuelve_prestamo = 'src="' . $listar['firma_devuelve_prestamo'] . '"';
	} else {
		$f_devuelve_prestamo = '';
	}


	//DATOS PRESTAMOS
	$separar_fechaP = explode(' ', $listar['fecha_prestamo']);
	$fechaP         = $separar_fechaP[0];
	$carp           = $listar['carpeta'];
	$cont           = $listar['contrato'];
	$cd             = $listar['cd'];
  $titValor       = $listar ['titulo_valor'];
	$desc           = $listar['descripcion'];
	$resp_recP      = $listar['responsable_recP'];
	$resp_entP      = $listar['responsable_entP'];


	//DATOS DEVOLUCIÓN
	$serapar_fechaD = explode(' ', $listar['fecha_devolucion']);
	$fechaD         = $serapar_fechaD[0];
	$res_entD       = $listar['responsable_entD'];
	$res_recibeD    = $listar['responsable_recD'];
}
?>