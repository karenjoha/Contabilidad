<?php
class controladorCalificaciones {

	static public function ctrListarRegistros($item, $valor) {
		$tabla1 = "calificaciones";

		$respuesta = ModeloCalificaciones::mdlListarRegistros($tabla1, $item, $valor);

		return $respuesta;
	}

}
