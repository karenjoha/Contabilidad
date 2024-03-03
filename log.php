<?php


class Log_Visita {
    //DATOS DEL USUARIO
    private $id_log;
    private $usuario;
    private $fecha_ingreso;
    private $fecha_salida;

    public function __GET($k) {
        return $this->$k;
    }
    public function __SET($k, $v) {
        return $this->$k = $v;
    }
}

class Log_Visita_Detalle {
    //DATOS DEL USUARIO
    private $id_log_visita_detalles;
    private $id_log_visita;
    private $vista_visitada;
    private $accion;
    private $fecha_visita;

    public function __GET($k) {
        return $this->$k;
    }
    public function __SET($k, $v) {
        return $this->$k = $v;
    }
}

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $contrasena = $_SESSION['contrasena'];
}

class LogModel {
    private $pdo;

    public function __CONSTRUCT() {
        try {

            $this->pdo = new PDO('mysql:host=localhost;dbname=u155011905_contabilidad', 'u155011905_lmzt', '0w1A~Fuyz=H');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT log_visitas.*,usuarios.doc_identidad
			AS documento,
			usuarios.nombres, usuarios.apellidos FROM log_visitas
			INNER JOIN usuarios ON log_visitas.usuario = usuarios.usuario
			ORDER BY log_visitas.id_log DESC");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $log = new Log_Visita();

                //INFORMACION DE LOG_VISITA
                $log->__SET('id_log', $r->id_log);
                $log->__SET('usuario', $r->usuario);
                $log->__SET('fecha_ingreso', $r->fecha_ingreso);
                $log->__SET('fecha_salida', $r->fecha_salida);

                $result[] = $log;
            }

            return $log;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_emple) {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM empleados WHERE id_emple = ?");

            $stm->execute(array($id_emple));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Log_Visita $data) {
        try {
            $sql = "UPDATE log_visitas SET fecha_salida= NOW()
			WHERE id_log=?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        //INFORMACION DEL LOG
                        $data->__GET('id_log')
                    )
                );

        } catch (Exception $e) {
            echo "EL LOG HA SIDO ACTUALIZADO CON EXITO";
            die($e->getMessage());
        }
    }

    public function Registrar(Log_Visita $data) {
        try {
            $sql = "INSERT INTO log_visitas (usuario, fecha_ingreso)
			VALUES (?, NOW())";

            $this->pdo->prepare($sql)
                ->execute(
                    array(

                        //INFORMACION DEL EMPLEADO
                        $data->__GET('usuario'),
                    )
                );
            $stm = $this->pdo->prepare("SELECT LAST_INSERT_ID() AS id_log_visitas;");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $_SESSION['id_log_visitas'] = $r->id_log_visitas;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function Registrar_LogDetalle(Log_Visita_Detalle $data) {
        try {

            $sql = "INSERT INTO
			log_visita_detalles (id_log_visita,
			vista_visitada, accion, numero_contrato, fecha_visita)
			VALUES (?, ?, ?, ?, NOW())";

            $this->pdo->prepare($sql)
                ->execute(
                    array(

                        //INFORMACION DEL EMPLEADO
                        $data->__GET('id_log_visita'),
                        $data->__GET('vista_visitada'),
                        $data->__GET('accion'),
                        $data->__GET('numero_contrato'),
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

}

//

// if (!isset($_POST['buscar'])){

// $_POST['buscar'] = "";

// $buscar = $_POST['buscar'];

// }

// $buscar = $_POST['buscar'];

// $SQL_READ = "SELECT log_visitas.*,usuarios.doc_identidad AS documento,
// usuarios.nombres, usuarios.apellidos,
// log_visita_detalles.vista_visitada AS vista_visitada,
// log_visita_detalles.accion, log_visita_detalles.numero_contrato
// FROM log_visitas
// INNER JOIN usuarios ON log_visitas.usuario = usuarios.usuario
// INNER JOIN log_visita_detalles ON log_visitas.id_log = log_visita_detalles.id_log_visita
// ORDER BY log_visitas.id_log DESC";

// $sql_query_log = mysqli_query($conexion,$SQL_READ);

?>