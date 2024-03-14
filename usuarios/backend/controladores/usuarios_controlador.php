<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/usuarios/shared/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/usuarios/backend/entidad/usuario.entidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/usuarios/backend/modelos/usuario.model.php';

$user   = new Usuario();
$modelC = new UsuarioModel();


// Verificar si la acción proporcionada es 'validarDoc' y si se ha enviado una solicitud POST con un campo 'doc_identidad' en el cuerpo.
if (isset($_GET['action']) && $_GET['action'] == 'validarDoc') {
    // Obtener los datos JSON del cuerpo de la solicitud y decodificarlos como un arreglo asociativo.
    $json        = file_get_contents('php://input');
    $jsonDecoded = json_decode($json, true);

    // Establecer el tipo de contenido de la respuesta como JSON.
    header('Content-Type: application/json');

    // Verificar si se proporcionó el campo 'doc_identidad' en la solicitud POST.
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($jsonDecoded["doc_identidad"])) {
        // Obtener el número de documento del arreglo decodificado.
        $doc_identidad = $jsonDecoded["doc_identidad"];

        // El método Consultar() debe devolver true si el documento no está duplicado, o false si ya está registrado.
        $verificar_doc = $modelC->consultarDoc($doc_identidad);

        // Devolver respuesta si el documento es válido (no está duplicado).
        echo json_encode(!$verificar_doc);
    } else {
        // Si no se proporcionó el campo 'doc_identidad' en la solicitud, devolver false como respuesta.
        echo json_encode(false);
    }
    // Finalizar la ejecución del script después de enviar la respuesta.
    return;
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':

            //INFORMACION DEL USUARIO
            $user->__SET('id', $_REQUEST['id']);
            $user->__SET('doc_identidad', $_REQUEST['doc_identidad']);
            $user->__SET('usuario', $_REQUEST['usuario']);
            $user->__SET('email', $_REQUEST['email']);
            $user->__SET('nombres', $_REQUEST['nombres']);
            $user->__SET('apellidos', $_REQUEST['apellidos']);

            $id_usuario = $_REQUEST['id'];


            $conexion = new DB();

            $sql_fast = $conexion->connect()->query("SELECT contrasena, firma FROM usuario WHERE id = '$id_usuario'");
            while ($checker = $sql_fast->fetch(PDO::FETCH_ASSOC)) {
                $pass_db  = $checker['contrasena'];
                $firma_db = $checker['firma'];
            }

            if ($_REQUEST['contrasena'] == $pass_db) {

                $user->__SET('contrasena', $_REQUEST['contrasena']);

            } else {

                $encriptar = $_REQUEST['contrasena'];
                $user->__SET('contrasena', password_hash($encriptar, PASSWORD_BCRYPT, ["cost" => '11']));

            }

            $user->__SET('rol', $_REQUEST['rol']);


            if ($_REQUEST['usuario'] != '' && $_REQUEST['contrasena'] != '') {

                if (isset($_FILES['firma']['name'])) {

                    $nombre_imagen = $_REQUEST['usuario'] . ' ' . $_FILES['firma']['name'];
                    $tipo_imagen   = $_FILES['firma']['type'];
                    $size_imagen   = $_FILES['firma']['size'];

                    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpg") {

                        $user->__SET('firma', $nombre_imagen);

                        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/vendor/uploads/firmas empleados/';
                        move_uploaded_file($_FILES['firma']['tmp_name'], $carpeta_destino . $nombre_imagen);



                    } else {

                        $user->__SET('firma', $firma_db);
                    }
                }

                $modelC->Actualizar($user);

                header("Location: index.php");
                die();

            }


            break;

        case 'registrar':
            //INFORMACION DEL USUARIO

            $user->__SET('doc_identidad', $_REQUEST['doc_identidad']);
            $user->__SET('nombres', $_REQUEST['nombres']);
            $user->__SET('apellidos', $_REQUEST['apellidos']);
            $user->__SET('email', $_REQUEST['email']);
            $user->__SET('usuario', $_REQUEST['usuario']);

            $encriptar = $_REQUEST['contrasena'];
            $user->__SET('contrasena', password_hash($encriptar, PASSWORD_BCRYPT, ["cost" => '11']));

            $user->__SET('rol', $_REQUEST['rol']);

            $user->__SET('firma', '');

            if ($_REQUEST['usuario'] != '' && $_REQUEST['contrasena'] != '') {


                $img_checker = false;

                if (isset($_FILES['firma']['name'])) {

                    $nombre_imagen = $_REQUEST['usuario'] . ' ' . $_FILES['firma']['name'];
                    $tipo_imagen   = $_FILES['firma']['type'];
                    $size_imagen   = $_FILES['firma']['size'];

                    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpg") {

                        $user->__SET('firma', $nombre_imagen);

                        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/gestionadministrativa/vendor/uploads/firmas empleados/';



                        move_uploaded_file($_FILES['firma']['tmp_name'], $carpeta_destino . $nombre_imagen);
                    } else {

                        $img_checker = true;
                    }
                }

                $modelC->Registrar($user);
                header("Location: index.php");
                die();
            }

            break;

        case 'eliminar':
            $modelC->Eliminar($_REQUEST['id']);

            header("Location: index.php");
            die();


            break;

        case 'editar':
            $user = $modelC->Obtener($_REQUEST['id']);
            break;

        case 'historial':
            $user = $modelC->historial($_REQUEST['id']);
            break;
    }
}
