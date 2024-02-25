
<?php
    class controladorFacturas{

        static public function ctrRegistro(){
            if(isset($_POST['fecha_registro'])){

                //TABLAS DE LA BASE DE DATOS
               $tabla1 = "facturas";

               //DATOS
               $datos = array(
                                "fecha_registro" => $_POST["fecha_registro"],
                                "num_factura" => $_POST["num_factura"],
                                "descripcion" => $_POST["descripcion"],
                                "empleado_registra" => $_POST["empleado_registra"],

                            );

                $respuesta = ModeloFacturas::mdlRegistro($tabla1, $datos);

                    echo'<script type="text/javascript">alert("Registro creado"); window.location.href="../../frontend/index.php";</script>';

                return $respuesta;
            }
        }

        static public function ctrListarRegistros($item, $valor){
            $tabla1 = "facturas";

            $respuesta = ModeloFacturas::mdlListarRegistros($tabla1, $item, $valor);

            return $respuesta;
        }

        public function ctrActualizarRegistro() {
            if(isset($_POST['fecha_registro'])){
            // if(isset($_POST['dire_residencia'])){

                //TABLAS DE LA BASE DE DATOS
               $tabla1 = "facturas";

               //DATOS
               $datos = array(
                               "id_factura" => $_POST["id_factura"],
                               "num_factura" => $_POST["num_factura"],
                                "fecha_registro" => $_POST["fecha_registro"],
                                "descripcion" => $_POST["descripcion"],
                                "empleado_registra" => $_POST["empleado_registra"],

                            );

                $respuesta = ModeloFacturas::mdlActualizar($tabla1,$datos);
                    echo'<script type="text/javascript">alert("Registro Actualizado"); window.location.href="../../frontend/index.php";</script>';
                return $respuesta;
            }
        }

        public function ctrEliminarRegistro(){
            if(isset($_POST['eliminarFacturas'])){
                //TABLAS DE LA BASE DE DATOS
                $tabla1 = "facturas";

                $valor = $_POST['eliminarFacturas'];

                $respuesta = ModeloFacturas::mdlEliminar($tabla1, $valor);

                    echo'<script type="text/javascript">alert("Registro Eliminado"); window.location.href="index.php";</script>';

                return $respuesta;

            }
        }
    }


