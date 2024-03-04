	<!DOCTYPE HTML>
	<html lang="es">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="descripción" content="Recibimientos CRINMO ">
		<title>RECIBIMIENTOS</title>

		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-5.0.2/bootstrap.min.css"> -->
		<link rel="stylesheet" href="../../vendor/bootstrap/bootstrap-3.3.6/css/bootstrap.css">

        <!-- Raleway Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap">

		<!-- Utilidades -->
		<link rel="stylesheet" href="../actaLlaves/frontend/assets/css/stylesForm.css">
		<link rel="stylesheet" href="../actaLlaves/frontend/assets/css/styles_index.css">
		<link rel="stylesheet" href="../../vendor/css/menu_usuario.css">
		<link rel="stylesheet" href="../../vendor/css/preloader.css?n=1">
		<link rel="stylesheet" href="../../inventarios/frontend/assets/css/inventarios_index.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<style>
			.modal-backdrop.show {
				width: 100%;
				height: 100%;

			}

			.modal-dialog {
				display: flex;
				width: 100%;
				height: 100%;
				align-content: center;
				justify-content: center;
				align-items: center;
			}

            .div-select {
                padding: inherit;
            }

            .order-select {
                width: 12em;
            }

			.btn  {
				font-size: 1.5rem !important;
			}

		</style>
	</head>

	<body>

		<div class="inv_index">


			<div class="btn btn-actions container">
				<a href="../../" class="btn btn-danger btn-lg">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="margin-top: 2px;" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
					</svg>
					Atrás</a>&nbsp;

				<?php if ($rol != 19) { ?>
					<a href="form_recibimientos/" class="btn btn-success btn-lg" style="margin-top: 2px; background: #54a0de; border-color: #54a0de">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
						</svg>&nbsp;
						Crear Recibimiento</a>
				<?php } ?>


				<?php if (isset($permissions["recibimientos"]["entregas"]["access"])) { ?>
					<a href="../rec_simi/frontend" class="btn btn-success btn-lg" style="margin-top: 2px; background: #54a0de; border-color: #54a0de; margin-left: 1%; margin-right: 1%;">
						Entregas</a>
				<?php } ?>

				<div class="item">
						<a href="../actaLlaves/frontend/index.php" class="btn btn-success btn-lg" style="background: rgb(156, 164, 185); border-color: rgb(156, 164, 185); margin-left: 1%;" ;>
						Acta Llaves</a>
				</div>
			</div>
		</div>


			<div class="row">
				<div class="col-12 grid-margin">
					<div class="card">
						<div class="card-body">
							<form id="form_filtro" name="form_filtro" method="GET" action="index.php">
								<div class="col-12 row filtroAvanzado">
									<div>
										<label class="form-label">Id Recibimiento</label>
										<input autocomplete="off" type="number" id="id" name="id" class="form-control buscarInput" value="<?php echo htmlspecialchars(
          	$_GET["id"],
          ); ?>">
									</div>
									<div>
										<label class="form-label">Nombre Arrendatario</label>
										<input autocomplete="off" type="text" id="nombre" name="nombre" class="form-control buscarInput" value="<?php echo htmlspecialchars(
          	$_GET["nombre"],
          ); ?>">
									</div>
                                    <div>
										<label class="form-label">Nombre Creador</label>
										<input autocomplete="off" type="text" id="nombre_creador" name="nombre_creador" class="form-control buscarInput" value="<?php echo htmlspecialchars(
          	$_GET["nombre_creador"],
          ); ?>">
									</div>
									<div>
										<label class="form-label">Dirección Recibimiento</label>
										<input autocomplete="off" type="text" class="form-control buscarInput" id="direccion" name="direccion" value="<?php echo htmlspecialchars(
          	$_GET["direccion"],
          ); ?>">
									</div>
                                    <div class="col-md-2 mb-4 div-select">
                                        <label class="form-label" for="order_by">Ordenar por fecha:</label>
                                        <select class="form-select form-control order-select" name="order_by" id="order_by">
                                            <option value="<?php echo htmlspecialchars(
                                            	$_GET["order_by"],
                                            ); ?>"><?php echo htmlspecialchars(
	$_GET["order_by"],
); ?></option>
                                            <option value="MÁS RECIENTE">MÁS RECIENTE</option>
                                            <option value="MÁS ANTIGUO">MÁS ANTIGUO</option>
                                        </select>
                                    </div>
								</div>
								<div class="col-1 buscarBtn">
									<a href="../frontend/"><input type="button" class="btn btn-primary" value="Ver todos los registros"></a>
									<input type="submit" class="btn btn-primary" value="Buscar">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		<span id="rol-user" style="display: none;"><?php echo $rol; ?></span>
		<span id="name-user" style="display: none;"><?php echo $usuario; ?></span>


		<table class="table table-light table-striped" id="regTable">
			<thead>
				<tr>
					<td class="responsive-active"></td>
					<th>ID</th>
					<th>CREADOR &nbsp;</th>
					<th class="responsive-hidden">FECHA CREACIÓN</th>
					<th>DIRECCIÓN / URBANIZACIÓN</th>
					<th class="responsive-hidden">ARRENDATARIO</th>
					<th class="responsive-hidden">CENTRO COSTOS</th>
					<?php if ($rol != 19) { ?>
						<th class="responsive-hidden">EDITAR</th>
					<?php } ?>
					<th class="responsive-hidden">EXPORTAR</th>

					<?php if (isset($permissions["recibimientos"]["action"]["eliminar"])) { ?>
					<th class="responsive-hidden">ELIMINAR</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<!-- < ?php
				// Función para organizar la fecha de creación de manera descendente
				// Utilizamos el método usort() para ordenar el array, utilizamos el array para pasar la fecha como parametro en la función
					usort($results->data, function ($a,$b) {
						// Convertimos las fechas en enteros para poder compararlas
						// Fecha anterior
						$fecha1 = strtotime($a["fecha_recibimiento"]);
						// Fecha siguiente
						$fecha2 = strtotime($b["fecha_recibimiento"]);
						// Retornamos las fechas ordenadas de manera descendente
						return $fecha2 > $fecha1;
					});
				?> -->

				<?php if (!is_array($results->data)) {
    	echo '<section class="SummaryDb"> No hay coincidencias, vuelve a intentar. </section>';
    } else {
    	 ?>
                    <section class="SummaryDb"><i class=" mdi mdi-file-document"></i>
                        <span> Mostrando
                            <?php echo count($results->data); ?> Resultados de
                            <?php echo $allResults; ?> encontrados
                        </span>
                    </section>
                    <?php foreach ($results->data as $dato): ?>
					<tr>
						<!-- Botón Responsive-->
						<td class="responsive-active"><img src="assets/images/svg/plus-circle-fill.svg" alt="toggle button" /></td>

						<!-- ID -->
						<td><?php echo $dato["id_recibimientos"]; ?></td>

						<!-- Creador -->
						<td><?php echo $dato["responsable_recibimiento"]; ?></td>

						<!-- Fecha Creación -->
						<td class="responsive-hidden"><?php echo $dato["fecha_recibimiento"]; ?></td>

						<!-- Dirección / Urbanización -->
						<td><?php echo $dato["dir_inm"]; ?></td>

						<!-- Arrendatario -->
						<td class="responsive-hidden"><?php echo $dato["nom_arrendatario"]; ?></td>

						<!-- Centro Costos -->
						<td class="responsive-hidden"><?php echo $dato["centro_cost"]; ?></td>

						<!-- Botón Editar -->
						<?php if ($rol != 19) { ?>
							<td class="responsive-hidden">
								<a class="btn btn-primary" href="form_recibimientos/index.php?id=<?php echo $dato[
        	"id_recibimientos"
        ]; ?>">
									<img src="assets/images/svg/pen.svg" alt="pen icon" />&nbsp;EDITAR</a>
							</td>
						<?php } ?>

						<!-- Botón Exportar -->
						<td class="responsive-hidden">
							<li class="dropdown" style="list-style: none;">
								<a class="btn btn-primary" data-toggle="dropdown" href="#">
									<img src="assets/images/svg/box_arrow_up.svg" alt="arrow up icon" />&nbsp;EXPORTAR PDF
								</a>
								<ul class="dropdown-menu">
									<li>
										<?php if ($dato["nom_arrendatario"] != "") { ?>
											<a href="pdf/recInqPDF.php?id=<?php echo $dato[
           	"id_recibimientos"
           ]; ?>" target="_blank">Inquilino</a>
										<?php } ?>
									</li>
									<li>
										<?php if ($dato["nom_propietario"] != "") { ?>
											<a href="pdf/recPropPDF.php?id=<?php echo $dato[
           	"id_recibimientos"
           ]; ?>" target="_blank">Propietario</a>
										<?php } ?>
									</li>
								</ul>
							</li>
						</td>

						<!-- Botón Eliminar -->
						<?php if (isset($permissions["recibimientos"]["action"]["eliminar"])) { ?>
						<td class="responsive-hidden">
							<form method="POST" id="delete<?php echo $dato["id_recibimientos"]; ?>">
								<input type="hidden" value="<?php echo $dato[
        	"id_recibimientos"
        ]; ?>" name="eliminarRecibimiento">
								<input type="hidden" value="<?php echo $dato[
        	"id_inquilino"
        ]; ?>" name="eliminarRecibimiento2">
								<input type="hidden" value="<?php echo $dato[
        	"id_info_adicional"
        ]; ?>" name="eliminarRecibimiento3">
								<button id="btnEliminar" type="button" class="btn btn-primary btnEliminar" >&nbsp;ELIMINAR </button>
							</form>
						</td>
						<?php } ?>
					</tr>
                    <?php endforeach;
    } ?>
			</tbody>
		</table>
        <?php if ($results->data) { ?>
					<footer class="d-flex justify-content-center pagFooter">
						<?php echo $Paginator->createLinks(
      	"pagination-container",
      	$params_paginator,
      ); ?>
					</footer>
			<?php } ?>
		<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top"><img src="assets/images/svg/arrow_up.svg" /></button>
		</div>
		<div style="height:40px;"></div>

		<!-- Dependencias -->

		<!-- JQuery -->
		<script src="../../vendor/jquery/jquery3.3.1.min.js"></script>

		<!-- DataTables -->
		<script src="../../vendor/DataTables/datatables.min.js"></script>
		<script src="../../vendor/DataTables/DataTables-1.11.4/js/dataTables.bootstrap5.min.js"></script>

		<!-- Bootstrap -->
		<script src="../../vendor/bootstrap/bootstrap-3.3.7/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<!-- SweetAlert -->
		<script src="../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

		<!-- Utilidades -->
		<script src="../../vendor/js/menu_usuario.js"></script>
    <script src="assets/js/recibimientos_index.js?v=5.7"></script>

	</body>

	</html>