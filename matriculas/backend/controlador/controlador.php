<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/gestionadministrativa/matriculas/backend/modelo/modelo.php";
class controladorMatriculas {

	public function ctrRegistro() {
		$modeloMatriculas = new ModeloMatriculas();

		if (isset($_POST["fecha_registro"])) {
			$datos = [

				//DATOS ALUMNO
				"fecha_registro" => isset($_POST["fecha_registro"]) ? $_POST["fecha_registro"] : "",
				"nombre_alum" => isset($_POST["nombre_alum"]) ? $_POST["nombre_alum"] : "",
				"primer_apellido" => isset($_POST["primer_apellido"]) ? $_POST["primer_apellido"] : "",
				"segundo_apellido" => isset($_POST["segundo_apellido"]) ? $_POST["segundo_apellido"] : "",
				"documento" => isset($_POST["documento"]) ? $_POST["documento"] : "",
				"tipo_documento" => isset($_POST["tipo_documento"]) ? $_POST["tipo_documento"] : "",
				"fecha_nacimiento" => isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "",
				"sexo" => isset($_POST["sexo"]) ? $_POST["sexo"] : "",
				"lugar_nacimiento" => isset($_POST["lugar_nacimiento"]) ? $_POST["lugar_nacimiento"] : "",
				"nacionalidad" => isset($_POST["nacionalidad"]) ? $_POST["nacionalidad"] : "",
				"direccion" => isset($_POST["direccion"]) ? $_POST["direccion"] : "",
				"barrio" => isset($_POST["barrio"]) ? $_POST["barrio"] : "",
				"celular" => isset($_POST["celular"]) ? $_POST["celular"] : "",
				"segundo_celular" => isset($_POST["segundo_celular"]) ? $_POST["segundo_celular"] : "",
				"estrato" => isset($_POST["estrato"]) ? $_POST["estrato"] : "",
				"comuna" => isset($_POST["comuna"]) ? $_POST["comuna"] : "",
				"email" => isset($_POST["email"]) ? $_POST["email"] : "",

				//DATOS ACUDIENTE
				"nombre_acudiente" => isset($_POST["nombre_acudiente"]) ? $_POST["nombre_acudiente"] : "",
				"celular_acudiente" => isset($_POST["celular_acudiente"]) ? $_POST["celular_acudiente"] : "",
				"parentesco" => isset($_POST["parentesco"]) ? $_POST["parentesco"] : "",
				"tipo_documento_acudiente" => isset($_POST["tipo_documento_acudiente"]) ? $_POST["tipo_documento_acudiente"] : "",
				"documento_acudiente" => isset($_POST["documento_acudiente"]) ? $_POST["documento_acudiente"] : "",

				// FICHA DE REGISTRO
				"grupo" => isset($_POST["grupo"]) ? $_POST["grupo"] : "",
				"jornada" => isset($_POST["jornada"]) ? $_POST["jornada"] : "",
				"periodo_lectivo" => isset($_POST["periodo_lectivo"]) ? $_POST["periodo_lectivo"] : "",
				"procedencia" => isset($_POST["procedencia"]) ? $_POST["procedencia"] : "",
			];
			$respuesta = $modeloMatriculas->mdlRegistro(
				"datos_alumno",
				"datos_acudiente",
				"registro_academico",
				$datos,
			);
			if ($respuesta !== false) {
				echo '<script type="text/javascript">alert("Registro Creado"); window.location.href="../";</script>';
				die();
			} else {
				echo '<script type="text/javascript">alert("Error al crear el registro");</script>';
				die();
			}
		}
	}
	public function ctrListarRegistros($item, $valor) {
		$modeloMatriculas = new ModeloMatriculas();
		$tabla1           = "datos_alumno";
		$tabla2           = "datos_acudiente";
		$tabla3           = "registro_academico";
		$respuesta        = $modeloMatriculas->mdlListarRegistros(
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
			$tabla3 = "registro_academico";
			//DATOS
			$datos     = [
				//DATOS ALUMNO
				"id_alumno" => $_POST["id_alumno"],
				"fecha_registro" => $_POST["fecha_registro"],
				"nombre_alum" => $_POST["nombre_alum"],
				"primer_apellido" => $_POST["primer_apellido"],
				"segundo_apellido" => $_POST["segundo_apellido"],
				"tipo_documento" => $_POST["tipo_documento"],
				"fecha_nacimiento"=> $_POST["fecha_nacimiento"],
				"sexo"=> $_POST["sexo"],
				"documento" => $_POST["documento"],
				"lugar_nacimiento" => $_POST["lugar_nacimiento"],
				"nacionalidad" => $_POST["nacionalidad"],
				"direccion" => $_POST["direccion"],
				"barrio" => $_POST["barrio"],
				"estrato" => $_POST["estrato"],
				"comuna" => $_POST["comuna"],
				"celular" => $_POST["celular"],
				"segundo_celular"=> $_POST["segundo_celular"],
				"email" => $_POST["email"],

				//DATOS ACUDIENTE
				"id_acudiente" => $_POST["id_acudiente"],
/* 				"id_alumno" => $_POST["id_alumno"],
 */				"nombre_acudiente" => $_POST["nombre_acudiente"],
				"celular_acudiente" => $_POST["celular_acudiente"],
				"parentesco" => $_POST["parentesco"],
				"tipo_documento_acudiente" => $_POST["tipo_documento_acudiente"],
				"documento_acudiente" => $_POST["documento_acudiente"],

				//REGISTRO ACADEMICO
				"id_registro_academico" => $_POST["id_registro_academico"],
/* 				"id_alumno" => $_POST["id_alumno"],
 */
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
			$tabla3 = "registro_academico";
			$valor  = $_POST["eliminarMatricula"];
        $valor2 = isset($_POST["eliminarMatricula2"]) ? $_POST["eliminarMatricula2"] : null;
        $valor3 = isset($_POST["eliminarMatricula3"]) ? $_POST["eliminarMatricula3"] : null;


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