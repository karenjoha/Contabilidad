<?php

session_start();
// require '../../log-validation.php';
require_once '../../backend/plantillas/archivoPlantilla.php';
require_once __DIR__ . '\..\..\..\vendor\autoload.php';
if ($_SESSION['rol'] == 1) {
	$permiso["archivos"]["pdf"]["access"] = true;
}
if ($_SESSION['rol'] == 20){
	$permiso["archivos"]["pdf"]["access"] = true;
}
if ($_SESSION['rol'] == 24){
	$permiso["archivos"]["pdf"]["access"] = true;
}


if (isset($permiso["archivos"]["pdf"]["access"]) && $permiso["archivos"]["pdf"]["access"] == true) {


	date_default_timezone_set('America/Bogota');
	setlocale(LC_TIME, "spanish");

	$newDate = date('d-m-Y');
	$fecha   = strftime("%d de %B de %Y", strtotime($newDate));

	$usuario = ($_SESSION['usuario']);

	// $data = get_info();
// $id_inv_info = $data['id'];
// $usuario_creacion_inv = $data['usuario'];
// $dir_inm = $data['dir_inm'];

	$mpdf = new \Mpdf\Mpdf([

		'mode' => 'utf-8',
		'margin_bottom' => 15,
		'debug' => true,

	]);

	$mpdf->SetTitle('ARCHIVOS');

	$css = file_get_contents('../assets/css/archivos_pdf.css');
	$mpdf->WriteHTML($css, 1);



	$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);

	$mpdf->SetHTMLFooter('

<div align="right" style="font-size: 16px;">
    <b>{PAGENO}/{nbpg}</b>
</div>

');

	$plantilla = getPlantilla();

	$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);


	$mpdf->Output("Inventario_elaborado_por_" . "_dir_" . ".pdf", "I");
	ob_clean();

} else {

	echo '<script language="javascript">alert(" ⛔  NO ESTÁS AUTORIZADO PARA REALIZAR ESTA ACCIÓN  ⛔");</script>';
	echo '<script language="javascript">location.assign("../");</script>';
}

?>