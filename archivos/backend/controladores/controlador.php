<?php

class controladorArchivos {

	static public function ctrRegistro() {
		if (isset($_POST['responsable_entP'])) {
			//TABLAS DE LA BASE DE DATOS
			$tabla1 = "info_prestamos";
			$tabla2 = "info_devoluciones";

			//    //DATOS
			$datos     = array(
				//INFORMACION PRESTAMO CARPETAS, CONTRATOS Y CDS
				"fecha_prestamo" => $_POST["fecha_prestamo"],
				"carpeta" => $_POST["carpeta"],
				"contrato" => $_POST["contrato"],
				"cd" => $_POST["cd"],
        "titulo_valor" => $_POST["titulo_valor"],
				"descripcion" => $_POST["descripcion"],
				"responsable_recP" => $_POST["responsable_recP"],
				"firma_recibe_prestamo" => $_POST["firma_recibe_prestamo"],
				"responsable_entP" => $_POST["responsable_entP"],
				"firma_entrega_prestamo" => $_POST["firma_entrega_prestamo"],


				//INFORMACION DEVOLUCIONES CARPETAS, CONTRATOS Y CDS
				"fecha_devolucion" => $_POST["fecha_devolucion"],
				"responsable_entD" => $_POST["responsable_entD"],
				"firma_devuelve_prestamo" => $_POST["firma_devuelve_prestamo"],
				"responsable_recD" => $_POST["responsable_recD"],
				"firma_recibe_devolucion" => $_POST["firma_recibe_devolucion"],


			);
			$respuesta = ModeloArchivos::mdlRegistro($tabla1, $tabla2, $datos);
			echo '<script type="text/javascript">alert("Registro Creado"); window.location.href="../../frontend/index.php";</script>';

			return $respuesta;
		}
	}

	static public function ctrListarRegistros($item, $valor) {
		$tabla1    = "info_prestamos";
		$tabla2    = "info_devoluciones";
		$respuesta = ModeloArchivos::mdlListarRegistros($tabla1, $tabla2, $item, $valor);
		return $respuesta;
	}

	public function ctrActualizarRegistro() {
		if (isset($_GET['id']) && isset($_POST['responsable_recP'])) {
			//TABLAS DE LA BASE DE DATOS
			$tabla1 = "info_prestamos";
			$tabla2 = "info_devoluciones";

			//DATOS
			$datos     = array(
				//INFORMACION PRESTAMO CARPETAS, CONTRATOS Y CDS
				"fecha_prestamo" => $_POST["fecha_prestamo"],
				"carpeta" => $_POST["carpeta"],
				"contrato" => $_POST["contrato"],
				"cd" => $_POST["cd"],
        "titulo_valor" => $_POST["titulo_valor"],
				"descripcion" => $_POST["descripcion"],
				"responsable_recP" => $_POST["responsable_recP"],
				"firma_recibe_prestamo" => $_POST["firma_recibe_prestamo"],
				"responsable_entP" => $_POST["responsable_entP"],
				"firma_entrega_prestamo" => $_POST["firma_entrega_prestamo"],
				"id_archivosP" => $_POST["id_archivosP"],


				//INFORMACION DEVOLUCIONES CARPETAS, CONTRATOS Y CDS
				"fecha_devolucion" => $_POST["fecha_devolucion"],
				"responsable_entD" => $_POST["responsable_entD"],
				"firma_devuelve_prestamo" => $_POST["firma_devuelve_prestamo"],
				"responsable_recD" => $_POST["responsable_recD"],
				"firma_recibe_devolucion" => $_POST["firma_recibe_devolucion"],
				"id_archivosD" => $_POST["id_archivosD"],
			);
			$respuesta = ModeloArchivos::mdlActualizar($tabla1, $tabla2, $datos);
			echo '<script type="text/javascript">alert("Registro Actualizado"); window.location.href="../";</script>';

			return $respuesta;
		}
	}
	public function ctrEliminarRegistro() {
		if (isset($_POST['eliminarArchivo'])) {
			//TABLAS DE LA BASE DE DATOS
			$tabla1 = "info_prestamos";
			$tabla2 = "info_devoluciones";
			$valor  = $_POST['eliminarArchivo'];
			$valor2 = $_POST['eliminarArchivo2'];


			$respuesta = ModeloArchivos::mdlEliminar($tabla1, $tabla2, $valor, $valor2);
			echo '<script type="text/javascript">alert("Archivo Eliminado"); window.location.href="index.php";</script>';
			return $respuesta;

		}
	}
}
