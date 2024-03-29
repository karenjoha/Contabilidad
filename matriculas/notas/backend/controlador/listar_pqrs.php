<?php
class controladorFacturas{

static public function ctrListarRegistros($item, $valor){
    $tabla1 = "calificaciones";

    $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, $item, $valor);

    return $respuesta;
}

}
