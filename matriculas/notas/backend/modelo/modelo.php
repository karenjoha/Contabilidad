<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/conexion.php';

$conexion = Conexion::conectar();

class ModeloCalificaciones {
	static public function mdlRegistro($tabla1, $datos) {

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(materia, nota, id_alumno, trimestre) VALUES(:materia, :nota, :id_alumno, :trimestre)");
		$stmt->bindParam(':materia', $datos['materia'], PDO::PARAM_STR);
		$stmt->bindParam(':nota', $datos['nota'], PDO::PARAM_STR);
		$stmt->bindParam(':id_alumno', $datos['id_alumno'], PDO::PARAM_STR);
		$stmt->bindParam(':trimestre', $datos['trimestre'], PDO::PARAM_STR);

		$stmt->execute() == true;

		$stmt = null;
	}

	static public function mdlListarRegistros($tabla1, $item, $valor) {

		if ($item == null && $item == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE calificaciones.id_calificacion ORDER BY id_calificacion DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE calificaciones.id_calificacion AND $item = :$item ORDER BY id_calificacion DESC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		}
		$stmt = null;
	}

	static public function mdlActualizar($tabla1, $datos) {

		$stmt1 = Conexion::conectar()->prepare("UPDATE $tabla1 SET id_calificacion=:id_calificacion, materia=:materia, nota=:nota, id_alumno=:id_alumno, trimestre=:trimestre WHERE id_calificacion=:id_calificacion");

		$stmt1->bindParam(':id_calificacion', $datos['id_calificacion'], PDO::PARAM_INT);
		$stmt1->bindParam(':materia', $datos['materia'], PDO::PARAM_STR);
		$stmt1->bindParam(':nota', $datos['nota'], PDO::PARAM_STR);
		$stmt1->bindParam(':id_alumno', $datos['id_alumno'], PDO::PARAM_STR);
		$stmt1->bindParam(':trimestre', $datos['trimestre'], PDO::PARAM_STR);
		$stmt1->execute() == true;
		$stmt1 = null;

	}

	static public function mdlEliminar($tabla1, $valor) {

		//INFO PRINCIPAL
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE id_calificacion = :id_calificacion");

		$stmt->bindParam(':id_calificacion', $valor, PDO::PARAM_INT);

		try {
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error al eliminar el registro: " . $e->getMessage();
			// Puedes manejar el error de otra manera, como lanzando una excepción o registrándolo en un archivo de registro
		}

		$stmt = null;
	}

	static public function mdlObtenerCalificacionesPorTrimestre($tabla1, $id_alumno, $trimestre) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE id_alumno = :id_alumno AND trimestre = :trimestre");
		$stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
		$stmt->bindParam(':trimestre', $trimestre, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}


}