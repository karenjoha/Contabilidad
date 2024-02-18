<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/contabilidad/facturas/backend/conexion/conexion.php';

$conexion = Conexion::conectar();

class ModeloFacturas{
    static public function mdlRegistro($tabla1, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(fecha_registro, descripcion, num_factura, empleado_registra) VALUES(:fecha_registro, :descripcion, :num_factura, :empleado_registra)");

        $stmt->bindParam(':fecha_registro', $datos['fecha_registro'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':num_factura',         $datos['num_factura'], PDO::PARAM_STR);
        $stmt->bindParam(':empleado_registra', $datos['empleado_registra'], PDO::PARAM_STR);

        $stmt->execute() == true;

        $stmt = null;
    }

    static public function mdlListarRegistros($tabla1, $item, $valor){

        if($item == null && $item == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE facturas.id_factura ORDER BY id_factura DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE facturas.id_factura AND $item = :$item ORDER BY id_factura DESC");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        }
        $stmt = null;
    }

    static public function mdlActualizar($tabla1, $datos){

        $stmt1 = Conexion::conectar()->prepare("UPDATE $tabla1 SET id_factura=:id_factura, fecha_registro=:fecha_registro, descripcion=:descripcion, num_factura=:num_factura, empleado_registra=:empleado_registra WHERE id_factura=:id_factura");

        $stmt1->bindParam(':id_factura', $datos['id_factura'], PDO::PARAM_INT);
        $stmt1->bindParam(':fecha_registro', $datos['fecha_registro'], PDO::PARAM_STR);
        $stmt1->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt1->bindParam(':num_factura',         $datos['num_factura'], PDO::PARAM_STR);
        $stmt1->bindParam(':empleado_registra', $datos['empleado_registra'], PDO::PARAM_STR);
        $stmt1->execute() == true;
        $stmt1 = null;

    }

	static public function mdlEliminar($tabla1, $valor){

		//INFO PRINCIPAL
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE id_factura = :id_factura");

		$stmt->bindParam(':id_factura', $valor, PDO::PARAM_INT);

		try {
			$stmt->execute();
		} catch(PDOException $e) {
			echo "Error al eliminar el registro: " . $e->getMessage();
			// Puedes manejar el error de otra manera, como lanzando una excepción o registrándolo en un archivo de registro
		}

		$stmt = null;
	}

}