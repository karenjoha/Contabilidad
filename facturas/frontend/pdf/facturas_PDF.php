<?php

session_start();

require_once '../../backend/plantillas/pdf_facturas.php';
require_once __DIR__ . '\..\..\..\vendor\autoload.php';

$usuario = trim($_SESSION['usuario']);
$rol =$_SESSION['rol'];
if ($rol == 1 || $rol == 27 || $usuario == 'MANUELA MUÑOZ' ) {


date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, "spanish");

$newDate=date('d-m-Y');
$fecha =strftime("%d de %B de %Y", strtotime($newDate));



$mpdf = new \Mpdf\Mpdf([

    'mode' => 'utf-8',
    'margin_bottom' => 15,
    'debug' => true,

]);

$mpdf->SetTitle('FACTURAS');

$css = file_get_contents('../assets/css/facturas_pdf.css');
$mpdf->WriteHTML($css, 1);



$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->SetHTMLFooter('

<div align="right" style="font-size: 16px;">
    <b>{PAGENO}/{nbpg}</b>
</div>

');

$plantilla = getPlantilla();

$mpdf->WriteHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output("Inventario_elaborado_por_"."_dir_".".pdf", "I");
ob_clean();

} else {

    echo '<script language="javascript">alert(" ⛔  NO ESTÁS AUTORIZADO PARA REALIZAR ESTA ACCIÓN  ⛔");</script>';
    echo '<script language="javascript">location.assign("../");</script>';
}

?>

