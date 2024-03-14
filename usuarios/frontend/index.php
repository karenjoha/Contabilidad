<?php
session_start();
require '../../log-validation.php';

$usuario = $_SESSION['usuario'];
$rol     = $_SESSION['rol'];

$roles = [
    "0" => "Desactivado",
    "1" => "Administrador",
    "2" => "Cartera",
];

asort($roles);

require_once '../backend/controladores/usuarios_controlador.php';

if ($rol != 1) {
    echo '<script>alert("No tiene permisos para acceder a esta página")</script>';
    header('Location: /gestionadministrativa/');
} else {

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Usuarios</title>
        <!--meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../../vendor/images/icon-home.png" type="image/png">

        <!-- Main CSS-->
        <link href="assets/css/users_form.css?v=1.1.1" rel="stylesheet" media="all">
        <link href="assets/css/index_user.css?v=1.1.2" rel="stylesheet" media="all">

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- Font Raleway -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap">

        <!-- Necesarios -->
        <link rel="stylesheet" href="../../vendor/css/menu_usuario.css">
        <link rel="stylesheet" href="../../vendor/css/preloader.css?n=1">

        <!-- Animate CSS + DataTables CSS -->
        <link rel="stylesheet" href="../../vendor/DataTables/datatables.min.css" />
        <link rel="stylesheet" href="../../vendor/animate/animate4.1.1.css" />


    </head>

    <body>
        <?php require('../../nav.php'); ?>

        <div class="table_header">
            <a name="" id="" class="btn btn-danger" href="../../" role="button"><i class="bi bi-arrow-left-circle"></i>&#32;ATRÁS</a>
            <button type="button" name="" id="add_new_user" class="btn btn-primary" role="button"><i class="bi bi-person-plus-fill"></i>&#32;NUEVO USUARIO</button>
        </div>
        <div class="tabla-containe">
            <table class="table table-dark table-striped table-hover" id="usuarios_data">
                <thead>
                    <tr>
                        <td class="responsive-active"></td>
                        <th scope="col" class="responsive-hidden">ID</th>
                        <th scope="col">ROL</th>
                        <th scope="col">DOCUMENTO</th>
                        <th scope="col" class="responsive-hidden">EMAIL</th>
                        <th scope="col">USUARIO</th>
                        <th class="responsive-hidden" scope="col">EDITAR</th>
                        <th class="responsive-hidden" scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modelC->Listar() as $r): ?>
                        <tr class="table-light">
                            <td class="responsive-active">
                                <img class="toggle-btn" data-id="<?php echo $r->__GET('id'); ?>" src="assets/images/plus-circle-fill.svg" alt="toggle button" />
                            </td>
                            <td class="responsive-hidden">
                                <?php echo $r->__GET('id'); ?>
                            </td>
                            <td>
                                <?php echo $r->__GET('rol'); ?>
                            </td>
                            <td>
                                <?php echo $r->__GET('doc_identidad'); ?>
                            </td>
                            <td class="responsive-hidden">
                                <?php echo $r->__GET('email'); ?>
                            </td>
                            <td>
                                <?php echo $r->__GET('usuario'); ?>
                            </td>

                            <td class="responsive-hidden" class="text-center">
                                <a class="btn btn-dark" href="?action=editar&id=<?php echo $r->__GET('id'); ?>">
                                    <i class="bi bi-pen"></i>&nbsp;EDITAR</a>
                            </td>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                                <td class="responsive-hidden text-center">
                                    <button class="btn btn-danger btn-eliminar " type="button">
                                        <i class="bi bi-trash"></i>&nbsp;ELIMINAR
                                    </button>
                                </td>
                            <?php } ?>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="contenedor-forms animate__animated animate__backInDown">
            <div class="row1">
                <div class="col-lg-6 mb-4 flex-grow-1">
                    <div class="testbox">
                        <h1>
                            <?php echo $user->id > 0 ? 'MODIFICAR' : 'REGISTRAR'; ?>
                        </h1>
                        <form action="?action=<?php echo $user->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" id="user_form" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $user->__GET('id'); ?>" />
                            <hr>
                            <div class="form-group">
                                <label for="rol" class="label-rol">ROL</label>
                                <select class="form-control" name="rol" id="rol" value="<?php echo $user->__GET('rol'); ?>">
                                    <option value="<?php echo $user->__GET('rol'); ?>">
                                        <?php echo $user->__GET('rol'); ?>
                                    </option>
                                    <?php
                                    foreach ($roles as $key => $values):
                                        echo "<option value='" . $key . "'>" . $key . " - " . $values . "</option>";
                                    endforeach
                                    ?>
                                </select>
                            </div>

                            <hr>
                            <!-- CAMPO 1 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" aria-label="Usuario" value="<?php echo $user->__GET('usuario'); ?>" autocomplete="off">
                            </div>

                            <!-- CAMPO 3 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user->__GET('email'); ?>" autocomplete="off" aria-label="Contraseña" />
                            </div>

                            <!-- CAMPO 4 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                <input type="text" class="form-control" name="doc_identidad" id="doc_identidad" placeholder="Número Documento" value="<?php echo $user->__GET('doc_identidad'); ?>" autocomplete="off" />
                            </div>

                            <!-- CAMPO 5 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" value="<?php echo $user->__GET('nombres'); ?>" autocomplete="off" />
                            </div>

                            <!-- CAMPO 6 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $user->__GET('apellidos'); ?>" autocomplete="off" />
                            </div>

                            <!-- CAMPO 7 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-shield-fill"></i></span>
                                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" value="<?php echo $user->__GET('contrasena'); ?>" autocomplete="off" />
                                <span class="input-group-text input-group-password" id="password_reveal"><i class="bi bi-eye-fill"></i></span>
                            </div>

                            <!-- CAMPO 8 -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-shield-fill-check"></i></i></span>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirmar Contraseña" value="<?php echo $user->__GET('contrasena'); ?>" autocomplete="off" />
                                <span class="input-group-text input-group-password" id="password_confirm_reveal"><i class="bi bi-eye-fill"></i></span>
                            </div>
                        </form>
                        <div class="">
                            <div class=" testbox" style="display:none">

                                <div class="testbox_second_container">

                                    <div class="mb-3">
                                        <label for="seleccionArchivos" class="form-label"> Cargar Firma</label>
                                        <input type="file" class="form-control" name="firma" id="seleccionArchivos" aria-describedby="firma" size="20" accept=".jpg, .jpeg">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="register-btn">
                            <button type="submit" class="button" form="user_form">ENVIAR</button>
                        </div <div class="text-center">
                        <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top"><i class="bi bi-arrow-up"></i><br><small>CERRAR</small></button>
                    </div>
                </div>
            </div>
        </div>

        </div>

        </div>

        <!-- Jquery JS-->
        <script src="../../vendor/jquery/jquery3.3.1.min.js"></script>
        <script src="../../vendor/sweet_alert/sweetalert2.all.min.js"></script>
        <script src="../../vendor/DataTables/datatables.min.js"></script>
        <script src="../../vendor/DataTables/DataTables-1.11.4/js/dataTables.bootstrap5.js"></script>
        <!-- Local Utilities -->
        <script src="../../vendor/js/menu_usuario.js"></script>
        <script src="../../vendor/js/general.js"></script>
        <script src="assets/js/usuarios-table.js"></script>
        <script src="assets/js/usuarios.js?v=1.1"></script>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script type="module" src="assets/js/usuarios_index.js?v=3.5"></script>
    </body>

    </html>

<?php } ?>