<?php
class controladorFacturas{

    static public function ctrRegistro(){
        if(isset($_POST['fecha_registro'])){

            // Obtener el número de factura del formulario
            $num_factura = $_POST["num_factura"];

            // Verificar si ya existe una factura con el mismo número
            $existe_factura = self::verificarNumeroFactura($num_factura);

            if($existe_factura) {
                echo '<script type="text/javascript">alert("Ya existe una factura con este número.");</script>';
                return; // Salir del método si ya existe una factura con ese número
            }

            // Si no existe, proceder con el registro

            //TABLAS DE LA BASE DE DATOS
            $tabla1 = "facturas";

            //DATOS
            $datos = array(
                "fecha_registro" => $_POST["fecha_registro"],
                "num_factura" => $_POST["num_factura"],
                "descripcion" => $_POST["descripcion"],
                "empleado_registra" => $_POST["empleado_registra"],
                "documento" => $_POST["documento"],

            );

            $respuesta = ModeloFacturas::mdlRegistro($tabla1, $datos);

            echo'<script type="text/javascript">alert("Registro creado");</script>';

            return $respuesta;
        }
    }

    static private function verificarNumeroFactura($num_factura) {
        // Verificar si existe una factura con el mismo número en la base de datos
        $tabla1 = "facturas";
        $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, "num_factura", $num_factura);

        // Si el resultado no está vacío, significa que ya existe una factura con ese número
        if(!empty($respuesta)) {
            return true;
        } else {
            return false;
        }
    }

    static public function ctrListarRegistros($item, $valor){
        $tabla1 = "facturas";

        $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, $item, $valor);

        return $respuesta;
    }

    public function ctrActualizarRegistro() {
        if(isset($_POST['fecha_registro'])){
            //TABLAS DE LA BASE DE DATOS
            $tabla1 = "facturas";

            //DATOS
            $datos = array(
                "id_factura" => $_POST["id_factura"],
                "num_factura" => $_POST["num_factura"],
                "fecha_registro" => $_POST["fecha_registro"],
                "descripcion" => $_POST["descripcion"],
                "empleado_registra" => $_POST["empleado_registra"],
                "documento" => $_POST["documento"],

            );

            $respuesta = ModeloFacturas::mdlActualizar($tabla1,$datos);
            echo'<script type="text/javascript">alert("Registro Actualizado");</script>';
            return $respuesta;
        }
    }

    public function ctrEliminarRegistro(){
        if(isset($_POST['eliminarFacturas'])){
            //TABLAS DE LA BASE DE DATOS
            $tabla1 = "facturas";

            $valor = $_POST['eliminarFacturas'];

            $respuesta = ModeloFacturas::mdlEliminar($tabla1, $valor);

            echo'<script type="text/javascript">alert("Registro Eliminado");</script>';

            return $respuesta;

        }
    }
}
?>
