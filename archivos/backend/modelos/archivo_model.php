<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/contabilidad/archivos/backend/conexion/conexion.php';

$conexion = Conexion::conectar();

class ModeloArchivos {
	static public function mdlRegistro($tabla1, $tabla2, $datos) {

		//INFO PRESTAMO DE CARPETAS, CONTRATOS, TITULO VALOR Y CDS
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(fecha_prestamo, carpeta, contrato, cd, titulo_valor, descripcion, responsable_recP, firma_recibe_prestamo, responsable_entP, firma_entrega_prestamo) VALUES(:fecha_prestamo, :carpeta, :contrato, :cd, :titulo_valor, :descripcion, :responsable_recP, :firma_recibe_prestamo, :responsable_entP, :firma_entrega_prestamo)");

		$stmt->bindParam(':fecha_prestamo', $datos['fecha_prestamo'], PDO::PARAM_STR);
		$stmt->bindParam(':carpeta', $datos['carpeta'], PDO::PARAM_STR);
		$stmt->bindParam(':contrato', $datos['contrato'], PDO::PARAM_STR);
		$stmt->bindParam(':cd', $datos['cd'], PDO::PARAM_STR);
		$stmt->bindParam(':titulo_valor', $datos['titulo_valor'], PDO::PARAM_STR);
		$stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
		$stmt->bindParam(':responsable_recP', $datos['responsable_recP'], PDO::PARAM_STR);
		$stmt->bindParam(':firma_recibe_prestamo', $datos['firma_recibe_prestamo'], PDO::PARAM_STR);
		$stmt->bindParam(':responsable_entP', $datos['responsable_entP'], PDO::PARAM_STR);
		$stmt->bindParam(':firma_entrega_prestamo', $datos['firma_entrega_prestamo'], PDO::PARAM_STR);



		//INFO DEVOLUCIONES DE CARPETAS, CONTRATOS, TITULO VALOR Y CDS
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(responsable_entD, firma_devuelve_prestamo, responsable_recD, firma_recibe_devolucion) VALUES(:responsable_entD, :firma_devuelve_prestamo, :responsable_recD, :firma_recibe_devolucion)");

		//  $stmt2->bindParam(':fecha_devolucion', $datos['fecha_devolucion'], PDO::PARAM_STR);
		$stmt2->bindParam(':responsable_entD', $datos['responsable_entD'], PDO::PARAM_STR);
		$stmt2->bindParam(':firma_devuelve_prestamo', $datos['firma_devuelve_prestamo'], PDO::PARAM_STR);
		$stmt2->bindParam(':responsable_recD', $datos['responsable_recD'], PDO::PARAM_STR);
		$stmt2->bindParam(':firma_recibe_devolucion', $datos['firma_recibe_devolucion'], PDO::PARAM_STR);


		if ($stmt->execute() == true) {
			$stmt2->execute() == true;
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt  = null;
		$stmt2 = null;

	}
	static public function mdlListarRegistros($tabla1, $tabla2, $item, $valor) {

		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 INNER JOIN $tabla2 WHERE $tabla1.id_archivosP = $tabla2.id_archivosD  ORDER BY id_archivosP DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 INNER JOIN $tabla2 WHERE $tabla1.id_archivosP = $tabla2.id_archivosD AND $item = :$item ORDER BY id_archivosP DESC");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch();
		}
		$stmt = null;

	}

	static public function mdlActualizar($tabla1, $tabla2, $datos) {

		// INFO PRESTAMOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla1 SET fecha_prestamo=:fecha_prestamo, carpeta=:carpeta, contrato=:contrato, cd=:cd, titulo_valor=:titulo_valor, descripcion=:descripcion, responsable_recP=:responsable_recP, firma_recibe_prestamo=:firma_recibe_prestamo, responsable_entP=:responsable_entP, firma_entrega_prestamo=:firma_entrega_prestamo WHERE id_archivosP = :id_archivosP");

		$stmt->bindParam(':fecha_prestamo', $datos['fecha_prestamo'], PDO::PARAM_STR);
		$stmt->bindParam(':carpeta', $datos['carpeta'], PDO::PARAM_STR);
		$stmt->bindParam(':contrato', $datos['contrato'], PDO::PARAM_STR);
		$stmt->bindParam(':cd', $datos['cd'], PDO::PARAM_STR);
		$stmt->bindParam(':titulo_valor', $datos['titulo_valor'], PDO::PARAM_STR);
		$stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
		$stmt->bindParam(':responsable_recP', $datos['responsable_recP'], PDO::PARAM_STR);
		$stmt->bindParam(':firma_recibe_prestamo', $datos['firma_recibe_prestamo'], PDO::PARAM_STR);
		$stmt->bindParam(':responsable_entP', $datos['responsable_entP'], PDO::PARAM_STR);
		$stmt->bindParam(':firma_entrega_prestamo', $datos['firma_entrega_prestamo'], PDO::PARAM_STR);
		$stmt->bindParam(':id_archivosP', $datos['id_archivosP'], PDO::PARAM_INT);

		// INFO DEVOLUCIONES
		$stmt2 = Conexion::conectar()->prepare("UPDATE $tabla2 SET fecha_devolucion=:fecha_devolucion, responsable_entD=:responsable_entD, firma_devuelve_prestamo=:firma_devuelve_prestamo, responsable_recD=:responsable_recD, firma_recibe_devolucion=:firma_recibe_devolucion WHERE id_archivosD = :id_archivosD");

		$stmt2->bindParam(':fecha_devolucion', $datos['fecha_devolucion'], PDO::PARAM_STR);
		$stmt2->bindParam(':responsable_entD', $datos['responsable_entD'], PDO::PARAM_STR);
		$stmt2->bindParam(':firma_devuelve_prestamo', $datos['firma_devuelve_prestamo'], PDO::PARAM_STR);
		$stmt2->bindParam(':responsable_recD', $datos['responsable_recD'], PDO::PARAM_STR);
		$stmt2->bindParam(':firma_recibe_devolucion', $datos['firma_recibe_devolucion'], PDO::PARAM_STR);
		$stmt2->bindParam(':id_archivosD', $datos['id_archivosD'], PDO::PARAM_INT);

		if ($stmt->execute() == true) {
			$stmt2->execute() == true;
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt  = null;
		$stmt2 = null;
	}

	static public function mdlEliminar($tabla1, $tabla2, $valor, $valor2) {

		//INFO PRESTAMOS
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE id_archivosP= :id_archivosP");


		$stmt->bindParam(':id_archivosP', $valor, PDO::PARAM_INT);


		//INFO DEVOLUCIONES
		$stmt2 = Conexion::conectar()->prepare("DELETE FROM $tabla2 WHERE id_archivosD = :id_archivosD");

		$stmt2->bindParam(':id_archivosD', $valor2, PDO::PARAM_INT);

		if ($stmt->execute() == true) {
			$stmt2->execute() == true;

		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt  = null;
		$stmt2 = null;
	}

}

?>