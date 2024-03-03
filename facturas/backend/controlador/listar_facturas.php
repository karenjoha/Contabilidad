<?php
class controladorFacturas{

static public function ctrListarRegistros($item, $valor){
    $tabla1 = "facturas";

    $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, $item, $valor);

    return $respuesta;
}

}
