<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/gestionadministrativa/matriculas/notas/backend/modelo/modelo.php";

class controladorFacturas{

    static public function ctrRegistro(){
        if(isset($_POST['fecha_registro'])){

            // // Obtener el número de factura del formulario
            // $num_factura = $_POST["num_factura"];

            // // Verificar si ya existe una factura con el mismo número
            // $existe_factura = self::verificarNumeroFactura($num_factura);

            // if($existe_factura) {
            //     echo '<script type="text/javascript">alert("Ya existe una factura con este número.");</script>';
            //     return; // Salir del método si ya existe una factura con ese número
            // }

            // Si no existe, proceder con el registro

            //TABLAS DE LA BASE DE DATOS
            $tabla1 = "calificaciones";

            //DATOS
            $datos = array(
                "fecha_registro" => $_POST["fecha_registro"],
                "materia" => $_POST["materia"],
                "nota" => $_POST["nota"],
                "id_alumno" => $_POST["id_alumno"],
                "trimestre" => $_POST["trimestre"],

            );

            $respuesta = ModeloFacturas::mdlRegistro($tabla1, $datos);

            echo'<script type="text/javascript">alert("Registro creado"); window.location.href="../";</script>';

            return $respuesta;
        }
    }

    // static private function verificarNumeroFactura($num_factura) {
    //     // Verificar si existe una factura con el mismo número en la base de datos
    //     $tabla1 = "calificaciones";
    //     $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, "num_factura", $num_factura);

    //     // Si el resultado no está vacío, significa que ya existe una factura con ese número
    //     if(!empty($respuesta)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    static public function ctrListarRegistros($item, $valor){
        $tabla1 = "calificaciones";

        $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, $item, $valor);

        return $respuesta;
    }

    public function ctrActualizarRegistro() {
        if(isset($_POST['fecha_registro'])){
            //TABLAS DE LA BASE DE DATOS
            $tabla1 = "calificaciones";

            //DATOS
            $datos = array(
                "id_calificacion" => $_POST["id_calificacion"],
                "materia" => $_POST["materia"],
                "fecha_registro" => $_POST["fecha_registro"],
                "nota" => $_POST["nota"],
                "id_alumno" => $_POST["id_alumno"],
                "trimestre" => $_POST["trimestre"],


            );

            $respuesta = ModeloFacturas::mdlActualizar($tabla1,$datos);
            echo'<script type="text/javascript">alert("Registro Actualizado"); window.location.href="../";</script>';

            return $respuesta;
        }
    }

    public function ctrEliminarRegistro(){
        if(isset($_POST['eliminarCalificacion'])){
            //TABLAS DE LA BASE DE DATOS
            $tabla1 = "calificaciones";

            $valor = $_POST['eliminarCalificacion'];

            $respuesta = ModeloFacturas::mdlEliminar($tabla1, $valor);

            echo'<script type="text/javascript">alert("Registro Eliminado");</script>';

            return $respuesta;

        }
    }

	static public function ctrObtenerCalificacionesPorTrimestre($id_alumno, $trimestre){
		$tabla1 = "calificaciones";

		$respuesta = ModeloFacturas::mdlObtenerCalificacionesPorTrimestre($tabla1, $id_alumno, $trimestre);

		return $respuesta;
	}

}
