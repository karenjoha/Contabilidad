<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/conexion.php';

class ModeloMatriculas {

public function mdlRegistro($tabla1, $tabla2, $tabla3, $datos) {
    try {
        // Inicia una transacción
        $conexion = Conexion::conectar();
        $conexion->beginTransaction();

        // Prepara la primera consulta para insertar datos del alumno
        $stmt1 = $conexion->prepare("INSERT INTO $tabla1 (fecha_registro, nombre_alum, primer_apellido, segundo_apellido, documento, tipo_documento, lugar_nacimiento, nacionalidad, direccion, barrio, estrato, comuna, celular, segundo_celular, email) VALUES (:fecha_registro, :nombre_alum, :primer_apellido, :segundo_apellido, :documento, :tipo_documento, :lugar_nacimiento, :nacionalidad, :direccion, :barrio, :estrato, :comuna, :celular, :segundo_celular, :email)");
        // Asocia los parámetros de la primera consulta
        $stmt1->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
        $stmt1->bindParam(":nombre_alum", $datos["nombre_alum"], PDO::PARAM_STR);
        $stmt1->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
        $stmt1->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
        $stmt1->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt1->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt1->bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
        $stmt1->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
        $stmt1->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt1->bindParam(":barrio", $datos["barrio"], PDO::PARAM_STR);
        $stmt1->bindParam(":estrato", $datos["estrato"], PDO::PARAM_STR);
        $stmt1->bindParam(":comuna", $datos["comuna"], PDO::PARAM_STR);
        $stmt1->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt1->bindParam(":segundo_celular", $datos["segundo_celular"], PDO::PARAM_STR);
        $stmt1->bindParam(":email", $datos["email"], PDO::PARAM_STR);

        // Ejecuta la primera consulta
        $stmt1->execute();

        // Obtiene el último ID insertado en la primera tabla (id_alumno)
        $id_alumno = $conexion->lastInsertId();

        // Prepara la segunda consulta para insertar datos del acudiente
        $stmt2 = $conexion->prepare("INSERT INTO $tabla2 (id_alumno, nombre_acudiente, celular_acudiente, parentesco, tipo_documento_acudiente, documento_acudiente) VALUES (:id_alumno, :nombre_acudiente, :celular_acudiente, :parentesco, :tipo_documento_acudiente, :documento_acudiente)");
        // Asocia los parámetros de la segunda consulta
        $stmt2->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt2->bindParam(':nombre_acudiente', $datos['nombre_acudiente'], PDO::PARAM_STR);
        $stmt2->bindParam(':celular_acudiente', $datos['celular_acudiente'], PDO::PARAM_STR);
        $stmt2->bindParam(':parentesco', $datos['parentesco'], PDO::PARAM_STR);
        $stmt2->bindParam(':tipo_documento_acudiente', $datos['tipo_documento_acudiente'], PDO::PARAM_STR);
        $stmt2->bindParam(':documento_acudiente', $datos['documento_acudiente'], PDO::PARAM_STR);
        // Ejecuta la segunda consulta
        $stmt2->execute();

        // Prepara la tercera consulta para insertar datos del registro académico
        $stmt3 = $conexion->prepare("INSERT INTO $tabla3 (id_alumno, grupo, jornada, periodo_lectivo, procedencia) VALUES (:id_alumno, :grupo, :jornada, :periodo_lectivo, :procedencia)");
        // Asocia los parámetros de la tercera consulta
        $stmt3->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt3->bindParam(':grupo', $datos['grupo'], PDO::PARAM_STR);
        $stmt3->bindParam(':jornada', $datos['jornada'], PDO::PARAM_STR);
        $stmt3->bindParam(':periodo_lectivo', $datos['periodo_lectivo'], PDO::PARAM_STR);
        $stmt3->bindParam(':procedencia', $datos['procedencia'], PDO::PARAM_STR);
        // Ejecuta la tercera consulta
        $stmt3->execute();

        // Confirma la transacción
        $conexion->commit();

        // Retorna el último ID insertado en la primera tabla
        return $id_alumno;
    } catch (PDOException $e) {
        // Si ocurre un error, revierte la transacción
        if ($conexion->inTransaction()) {
            $conexion->rollBack();
        }
        // Retorna el error
        return $e->getMessage();
    }
}


    private function verificarRegistroExistente($tabla, $idRecibimiento) {
        $sql  = "SELECT 1 FROM $tabla WHERE id_recibimiento = $idRecibimiento LIMIT 1";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function mdlListarRegistros(
        $tabla1,
        $tabla2,
        $tabla3,
        $item,
        $valor,
    ) {
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1
			INNER JOIN $tabla2 ON $tabla1.id_alumno = $tabla2.id_alumno
			INNER JOIN $tabla3 ON $tabla1.id_alumno = $tabla3.id_alumno
			ORDER BY $tabla1.id_alumno DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1
			INNER JOIN $tabla2 ON $tabla1.id_alumno = $tabla2.id_alumno
			INNER JOIN $tabla3 ON $tabla1.id_alumno = $tabla3.id_alumno
			WHERE $tabla1.$item = :$item"); // Aquí se califica la columna id_alumno
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }
        $stmt = null;
    }
public function mdlActualizar($tabla1, $tabla2, $tabla3, $datos) {
    try {
        // Inicia una transacción
        $conexion = Conexion::conectar();
        $conexion->beginTransaction();

        //INFO PRINCIPAL
        $stmt = $conexion->prepare(
            "UPDATE $tabla1 SET fecha_registro=:fecha_registro, nombre_alum=:nombre_alum, primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido, documento=:documento, tipo_documento=:tipo_documento, fecha_nacimiento=:fecha_nacimiento, sexo=:sexo, lugar_nacimiento=:lugar_nacimiento, nacionalidad=:nacionalidad, barrio=:barrio, direccion=:direccion, estrato=:estrato, comuna=:comuna, celular=:celular, segundo_celular=:segundo_celular, email=:email WHERE id_alumno = :id_alumno"
        );

        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_alum", $datos["nombre_alum"], PDO::PARAM_STR);
        $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
        $stmt->bindParam(":barrio", $datos["barrio"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":estrato", $datos["estrato"], PDO::PARAM_STR);
        $stmt->bindParam(":comuna", $datos["comuna"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":segundo_celular", $datos["segundo_celular"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id_alumno", $datos["id_alumno"], PDO::PARAM_INT);

        $stmt->execute();

        // Verificar si se actualizaron filas en tabla1
        echo "Filas actualizadas en tabla1: " . $stmt->rowCount() . "<br>";

        if ($stmt->rowCount() <= 0) {
            throw new Exception("No se pudo actualizar el registro principal");
        }

        //INQUILINO
        $stmt2 = $conexion->prepare(
            "UPDATE $tabla2 SET nombre_acudiente=:nombre_acudiente, celular_acudiente=:celular_acudiente, parentesco=:parentesco, tipo_documento_acudiente=:tipo_documento_acudiente, documento_acudiente=:documento_acudiente WHERE id_acudiente = :id_acudiente"
        );

        $stmt2->bindParam(":nombre_acudiente", $datos["nombre_acudiente"], PDO::PARAM_STR);
        $stmt2->bindParam(":celular_acudiente", $datos["celular_acudiente"], PDO::PARAM_STR);
        $stmt2->bindParam(":parentesco", $datos["parentesco"], PDO::PARAM_STR);
        $stmt2->bindParam(":tipo_documento_acudiente", $datos["tipo_documento_acudiente"], PDO::PARAM_STR);
        $stmt2->bindParam(":documento_acudiente", $datos["documento_acudiente"], PDO::PARAM_STR);
        $stmt2->bindParam(":id_acudiente", $datos["id_acudiente"], PDO::PARAM_INT);

        $stmt2->execute();

        // Verificar si se actualizaron filas en tabla2
        echo "Filas actualizadas en tabla2: " . $stmt2->rowCount() . "<br>";

        if ($stmt2->rowCount() <= 0) {
            throw new Exception("No se pudo actualizar el registro del acudiente");
        }

        //FICHA MEDICA
        $stmt3 = $conexion->prepare(
            "UPDATE $tabla3 SET grupo=:grupo, jornada=:jornada, periodo_lectivo=:periodo_lectivo, procedencia=:procedencia WHERE id_registro_academico = :id_registro_academico"
        );

        $stmt3->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
        $stmt3->bindParam(":jornada", $datos["jornada"], PDO::PARAM_STR);
        $stmt3->bindParam(":periodo_lectivo", $datos["periodo_lectivo"], PDO::PARAM_STR);
        $stmt3->bindParam(":procedencia", $datos["procedencia"], PDO::PARAM_STR);
        $stmt3->bindParam(":id_registro_academico", $datos["id_registro_academico"], PDO::PARAM_INT);

        $stmt3->execute();

        // Verificar si se actualizaron filas en tabla3
        echo "Filas actualizadas en tabla3: " . $stmt3->rowCount() . "<br>";

        if ($stmt3->rowCount() <= 0) {
            throw new Exception("No se pudo actualizar el registro académico");
        }

        // Confirma la transacción
        $conexion->commit();

        return true;
    } catch (PDOException $e) {
        // Si ocurre un error, revierte la transacción
        if ($conexion->inTransaction()) {
            $conexion->rollBack();
        }
        // Retorna el error
        return $e->getMessage();
    }
}

    public function mdlEliminar(
        $tabla1,
        $tabla2,
        $tabla3,
        $valor,
        $valor2,
        $valor3,
    ) {
        //INFO PRINCIPAL
        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM $tabla1 WHERE id_alumno= :id_alumno",
        );
        $stmt->bindParam(":id_alumno", $valor, PDO::PARAM_INT);

        // //INQUILINO
        $stmt2 = Conexion::conectar()->prepare(
            "DELETE FROM $tabla2 WHERE id_acudiente = :id_acudiente",
        );
        $stmt2->bindParam(":id_acudiente", $valor2, PDO::PARAM_INT);

        //INFO ADICIONAL
        $stmt3 = Conexion::conectar()->prepare(
            "DELETE FROM $tabla3 WHERE id_registro_academico = :id_registro_academico",
        );
        $stmt3->bindParam(":id_registro_academico", $valor3, PDO::PARAM_INT);
        // RESET AUTO_INCREMENT
        // $stmt4 = Conexion::conectar()->prepare("CALL resetear_ids()");

        if ($stmt->execute() == true) {
            $stmt2->execute() == true;
            $stmt3->execute() == true;
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt  = null;
        $stmt2 = null;
        $stmt3 = null;
    }
}