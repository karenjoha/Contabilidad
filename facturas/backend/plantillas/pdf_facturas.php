<?php

function getplantilla() {
	require_once "varsPDF.php";
	require_once "icons_pdf.php";
	////////////////////////////////                ////////////////////////////////
	//////////////////////////////// INICIO /////////////////termCttos_vars///////////////
	////////////////////////////////              ////////////////////////////////

	$inicio = '
  <!DOCTYPE html>
    <head>
      <meta charset="utf-8">
    </head>
    <body>
      <header>
        <img style="height: 100px;" src="../../../vendor/images/icon-home.jpg"/>
        <div style="margin-top: 20px; margin-left:130px; font-weight: bold; font-size: 20px;">PETICIONES - QUEJAS - RECLAMOS - SUGERENCIAS</div>
      </header>
    <div style="height:50px;"></div>';

	////////////////////////////////                ////////////////////////////////
	//////////////////////////////// INFORMACION PRINCIPAL ////////////////////////////////
	////////////////////////////////              ////////////////////////////////

	$principal = '
  <table class="table  table-bordered">
      <tbody>
      <tr>
        <td colspan="4" class="title" style="text-align:center; "><b>' . $calendar_icon . 'FECHA DE REGISTRO</b><br><span>' . $fecha . '</span></td>
      </tr>
      <thead>
        <tr>
          <th colspan="4" class="title" style="text-align: center;">INFORMACIÓN GENERAL</th>
        </tr>
      </thead>

      <tr>
        <td colspan="1" class="info_ppal" style="text-align:center; font-weight: bold;">' . $area_enc_ico . 'ÁREA ENCARGADA</td>
        <td colspan="1"><span>' . $area_enc . '</span></td>
		<th class="info_ppal" style="text-align:center;">' . $numeroContrato . 'NÚMERO DE CONTRATO</th><td class="text-uppercase"><span>' . $contractNumber . '</span></td>
      </tr>

      <tr>
        <th class="info_ppal" style="text-align:center;">' . $estado_ . 'ESTADO</th><td class="text-uppercase"><span>' . $estado . '</span></td>
        <th class="info_ppal" style="text-align:center;">' . $doc . 'DOCUMENTO</th><td><span>' . $tipo_doc . '<br>' . $identificacion . '</span></td>
      </tr>

      <tr>
        <th class="info_ppal" style="text-align:center;">' . $nom . 'NOMBRES Y APELLIDOS</th><td><span>' . $nombres_apellidos . '</span></td>
        <th class="info_ppal" style="text-align:center;" style="text-align:center; ">' . $correo . 'CORREO</th><td><span>' . $email . '</span></td>
      </tr>

      <tr>
        <th class="info_ppal" style="text-align:center;">' . $telefono . 'TELÉFONO/CELULAR</th><td><span>' . $tel . '</span></td>
        <th class="info_ppal" style="text-align:center;" style="text-align:center; ">' . $gdpr_ . 'ACEPTO TERMINOS Y CONDICIONES</th><td><span>' . $gdpr . '</span></td>
      </tr>

      <tr>
        <td colspan="1" class="info_ppal" style="text-align:center; font-weight: bold;">' . $mensaje_ . 'MENSAJE</td>
        <td colspan="3"><span>' . $mensaje . '</span></td>
      </tr>

        <tr>
          <td colspan="1" class="info_ppal text-uppercase" style="text-align:center; font-weight: bold;">' . $observ . 'OBSERVACIONES</td>
          <td colspan="3"><span>' . $obs . '</span></td>
        </tr>
      </tbody>
  </table>';


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
    $principal
  $final";

	return $plantilla;
}
