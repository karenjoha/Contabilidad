<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/contabilidad/matriculas/backend/modelo/modelo.php";
class controladorMatriculas {
	public function ctrRegistro() {
		$modeloMatriculas = new ModeloMatriculas();

		if (isset($_POST["fecha_registro"])) {
			//TABLAS DE LA BASE DE DATOS
			$tabla1 = "datos_alumno";
			$tabla2 = "datos_acudiente";
			$tabla3 = "ficha_medica";
			//DATOS
			$datos = [
				//DATOS ALUMNO
                "fecha_registro" => $_POST["fecha_registro"],
                "nombre_alum" => $_POST["nombre_alumno"],
                "primer_apellido" => $_POST["primer_apellido"],
                "segundo_apellido" => $_POST["segundo_apellido"],
                "tipo_documento" => $_POST["tipo_documento"],
                "documento" => $_POST["documento"],
				//DATOS ACUDIENTE
                "nombre_acudiente" => $_POST["nombre_acudiente"],
                "celular_acudiente" => $_POST["celular_acudiente"],
                "parentesco" => $_POST["parentesco"],
                "tipo_documento_acudiente" => $_POST["tipo_documento_acudiente"],
                "documento_acudiente" => $_POST["documento_acudiente"],
				//FICHA MEDICA
                "grupo" => $_POST["grupo"],
                "jornada" => $_POST["jornada"],
                "periodo_lectivo" => $_POST["periodo_lectivo"],
                "procedencia" => $_POST["procedencia"],
			];
			$respuesta = $modeloMatriculas->mdlRegistro(
				$tabla1,
				$tabla2,
				$tabla3,
				$datos,
			);
			echo '<script type="text/javascript">alert("Registro Creado"); window.location.href="../";</script>';
		}
	}
	public function ctrListarRegistros($item, $valor) {
		$modeloMatriculas = new ModeloMatriculas();
		$tabla1 = "datos_alumno";
		$tabla2 = "datos_acudiente";
		$tabla3 = "ficha_medica";
		$respuesta = $modeloMatriculas->mdlListarRegistros(
			$tabla1,
			$tabla2,
			$tabla3,
			$item,
			$valor,
		);
		return $respuesta;
	}
	public function ctrActualizarRegistro() {
		$modeloMatriculas = new ModeloMatriculas();

		if (isset($_GET["id"]) && isset($_POST["fecha_registro"])) {
			//TABLAS DE LA BASE DE DATOS
			$tabla1 = "datos_alumno";
			$tabla2 = "datos_acudiente";
			$tabla3 = "ficha_medica";
			//DATOS
			$datos = [
				//DATOS ALUMNO
                "fecha_registro" => $_POST["fecha_registro"],
                "nombre_alum" => $_POST["nombre_alumno"],
                "primer_apellido" => $_POST["primer_apellido"],
                "segundo_apellido" => $_POST["segundo_apellido"],
                "tipo_documento" => $_POST["tipo_documento"],
                "documento" => $_POST["documento"],
				//DATOS ACUDIENTE
                "nombre_acudiente" => $_POST["nombre_acudiente"],
                "celular_acudiente" => $_POST["celular_acudiente"],
                "parentesco" => $_POST["parentesco"],
                "tipo_documento_acudiente" => $_POST["tipo_documento_acudiente"],
                "documento_acudiente" => $_POST["documento_acudiente"],
				//FICHA MEDICA
                "grupo" => $_POST["grupo"],
                "jornada" => $_POST["jornada"],
                "periodo_lectivo" => $_POST["periodo_lectivo"],
                "procedencia" => $_POST["procedencia"],
			];
			$respuesta = $modeloMatriculas->mdlActualizar(
				$tabla1,
				$tabla2,
				$tabla3,
				$datos,
			);
			echo '<script type="text/javascript">alert("Registro Actualizado"); window.location.href="../";</script>';
			return $respuesta;
		}
	}
	public function ctrEliminarRegistro() {
		$modeloMatriculas = new ModeloMatriculas();

		if (isset($_POST["eliminarMatricula"])) {
			//TABLAS DE LA BASE DE DATOS
			$tabla1 = "datos_alumno";
			$tabla2 = "datos_acudiente";
			$tabla3 = "ficha_medica";
			$valor = $_POST["eliminarMatricula"];
			$valor2 = $_POST["eliminarMatricula2"];
			$valor3 = $_POST["eliminarMatricula3"];

			$respuesta = $modeloMatriculas->mdlEliminar(
				$tabla1,
				$tabla2,
				$tabla3,
				$valor,
				$valor2,
				$valor3,
			);
			echo '<script type="text/javascript">alert("Registro Eliminado"); window.location.href="index.php";</script>';
			return $respuesta;
		}
	}
}