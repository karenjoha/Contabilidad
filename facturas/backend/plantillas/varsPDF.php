<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/contabilidad/facturas/backend/controlador/facturas.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/contabilidad/facturas/backend/modelo/modelo.php";

if(isset($_GET['id'])){
    $item = "id_factura";
    $valor = $_GET["id"];
    $listar = controladorFacturas::ctrListarRegistros($item, $valor);

    ////////////////
    //LISTA DE DATOS
    ////////////////

    $fechaR = $listar['fecha_registro'];
    $fechaV = explode(' ', $fechaR);

    // Listar fecha al crear
    if(count($fechaV) == 2){
        $fecha_r = explode('-', $fechaV[0]);
        $fecha =  $fecha_r[0].'/'.$fecha_r[1].'/'.$fecha_r[2];
    }
    // Listar fecha importada
    else{
        $fecha = $fechaV[0].'/'.$fechaV[1].'/'.$fechaV[2];
    }

    $num_factura = $listar['num_factura'];
    $descripcion = $listar['descripcion'];
    $empleado_registra = $listar['empleado_registra'];
}

