<?php

function getplantilla() {
	require_once "archivoPDF_icons.php";
	require_once "archivos_vars.php";

	////////////////////////////////                ////////////////////////////////
	//////////////////////////////// INICIO ////////////////////////////////
	////////////////////////////////              ////////////////////////////////

	$inicio = '
  <!DOCTYPE html>
    <head>
      <meta charset="utf-8">
    </head>
    <body>
      <header>
        <img style="height: 100px;" src="../../../vendor/images/Logo_Nitt.jpg"/>
        <div style="margin-top: -60px; margin-left:420px; font-weight: bold; font-size: 20px;">&emsp;&emsp;REGISTRO ARCHIVOS</div>
      </header>
    <div style="height:50px;"></div>';

	////////////////////////////////                ////////////////////////////////
	//////////////////////////////// INFORMACION PRINCIPAL ////////////////////////////////
	////////////////////////////////              ////////////////////////////////

	$info_prestamos = '
  <table class="table  table-bordered">
      <tbody>

        <thead>
          <tr>
            <th colspan="5" class="title" style="text-align: center;">DATOS PRESTAMO</th>
          </tr>
        </thead>

        <tr>

          <th class="info_ppal" style="text-align:center;">' . $calendar_icon . 'Fecha prestamo</th><td colspan="4" class="text-uppercase"><span>' . $fechaP . '</span></td>
        </tr>

        <tr>
          <th class="info_ppal" style="text-align:center;">' . $tipo_P . 'Tipo prestamo</th><td colspan=""  class="text-uppercase"><span>' . $carp . '</span></td>
          <td colspan=""  class="text-uppercase"><span>' . $cont . '</span></td><td colspan=""  class="text-uppercase"><span>' . $cd . '</span></td><td colspan=""  class="text-uppercase"><span>'.$titValor.'</span></td>
        </tr>

        <tr>
          <th class="info_ppal" style="text-align:center;">' . $desc_p . 'Descripción prestamo</th><td colspan="4"  class="text-uppercase"><span>' . $desc . '</span></td>
        </tr>

        <tr>
          <th class="info_ppal" style="text-align:center;">' . $usu_icon . 'Responsable entregar</th><td colspan="4"  class="text-uppercase"><span>' . $resp_entP . '</span></td>

        </tr>

        <tr>

          <th class="info_ppal" style="text-align:center;">' . $usu_icon . 'Responsable recibir</th><td colspan="4"  class="text-uppercase"><span>' . $resp_recP . '</span></td>

        </tr>

      </tbody>
  </table>';

	$info_prestamos .= '
  <div class="signArrTitle">FIRMA QUIEN ENTREGA</div>
  <img class="signArrValue" ' . $f_entrega_prestamo . '>
  <div class="lineSignArr"></div>

  <div class="signArrTitle2" style="' . $margin . '">FIRMA QUIEN RECIBE</div>
  <img class="signArrValue2" ' . $f_recibe_prestamo . '>
  <div class="lineSignArr2"> </div>
  <br>
  <br>
  ';


	$info_devoluciones = '
  <table class="table  table-bordered">
    <tbody>
      <thead>
        <tr>
          <th colspan="4" class="title" style="text-align: center;">DATOS DEVOLUCIÓN</th>
        </tr>
      </thead>

      <tr>
        <th class="info_ppal" style="text-align:center;">' . $calendar_icon . 'Fecha devolución</th><td colspan="3"  class="text-uppercase"><span>' . $fechaD . '</span></td>
      </tr>

      <tr>
        <th class="info_ppal" style="text-align:center;">' . $usu_icon . 'Responsable entregar</th><td colspan="3"  class="text-uppercase"><span>' . $res_entD . '</span></td>
      </tr>

      <tr>
        <th class="info_ppal" style="text-align:center;">' . $usu_icon . 'Responsable recibir</th><td colspan="3"  class="text-uppercase"><span>' . $res_recibeD . '</span></td>
      </tr>

    </tbody>
  </table>';


	$info_devoluciones .= '
  <div class="signArrTitle">FIRMA QUIEN ENTREGA</div>
  <img class="signArrValue" ' . $f_devuelve_prestamo . '>
  <div class="lineSignArr"></div>


  <div class="signArrTitle2" style="' . $margin1 . '">FIRMA QUIEN RECIBE</div>
  <img class="signArrValue2" ' . $f_recibeD . '>
  <div class="lineSignArr2"></div>
  ';




	////////////////////////////////                ////////////////////////////////
	//////////////////////////////// FINAL ////////////////////////////////
	////////////////////////////////              ////////////////////////////////

	$final = '

  </body>
</html>';

	////////////////////////////////                ////////////////////////////////
	//////////////////////////////// TABLAS ////////////////////////////////
	////////////////////////////////              ////////////////////////////////

	$plantilla = "
  $inicio
    $info_prestamos
    $info_devoluciones
  $final";

	return $plantilla;
}