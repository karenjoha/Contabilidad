<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../vendor/bootstrap/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/recibimientos.css?v=1.5">
    <link rel="stylesheet" href="../assets/css/firma.css">
    <title>Matricula</title>
</head>
<body>
    <div class="container">
        <!-- HEADER TAB BUTTONS -->
        <div class="nav btn-group mb-2 mt-5">
			<a class="btn btn-primary active" aria-current="page" href="#form" data-bs-toggle="tab" style="display: none;">Checklist</a>

            <a class="btn btn-primary" href="#form1" data-bs-toggle="tab">Ficha Personal</a>

            <a class="btn btn-primary" href="#form2" data-bs-toggle="tab">Ficha Medica</a>

            <a class="btn btn-primary" href="#form3" data-bs-toggle="tab">Padre</a>

            <a class="btn btn-primary" href="#form4" data-bs-toggle="tab">Madre</a>

            <a class="btn btn-primary" href="#form5" data-bs-toggle="tab">Acudiente</a>

            <a class="btn btn-primary" href="#form6" data-bs-toggle="tab">Otros</a>


        </div>
        <!-- FORMULARIO -->
        <form id="form_recibimientos" method="POST" action="" >

            <!-- ID Oculto -->
            <?php if (isset($_GET["id"])) { ?>
            <!-- Obtenemos los id y los imprimimos ocultos en la vista para actualizar las respectivas tablas desde el modelo -->
            <input type="hidden" name="id_recibimientos" value="<?php echo $listar[
            	"id_recibimientos"
            ]; ?>">
            <input type="hidden" name="id_inquilino" value="<?php echo $listar[
            	"id_inquilino"
            ]; ?>">
            <input type="hidden" name="id_info_adicional" value="<?php echo $listar[
            	"id_info_adicional"
            ]; ?>">
            <?php } ?>

            <!-- CONTENIDO TABS -->
            <div class="tab-content" >
				<div class="tab-pane active" id="form" style="display: none;">
					<div class="row form-control header-table">
                        <div class="col">
                            <h6>Checklist Recibimiento</h6>
                        </div>
                    </div>

					<div class="row tab-item d-flex justify-content-center align-items-center pb-0">
						<div class="card-body p-4">
							<ul class="list-group rounded-0">
								<li class="list-group-item d-flex align-items-center">
								<input class="form-check-input me-3" name="check_1" type="checkbox" id="check_1" <?= isset(
        	$_GET["id"],
        ) &&
        isset($listar["check_1"]) &&
        $listar["check_1"] == "1"
        	? "checked"
        	: "" ?> />
									<label for="check_1">Factura de servicios públicos con su respectivo comprobante de pago.</label>
								</li>
								<li class="list-group-item d-flex align-items-center">
									<input class="form-check-input me-3" name="check_2" type="checkbox" id="check_2" <?= isset(
         	$_GET["id"],
         ) &&
         isset($listar["check_2"]) &&
         $listar["check_2"] == "1"
         	? "checked"
         	: "" ?> />
									<label for="check_2">Certificado de multa administración (Aplica solo para inmuebles con administración de copropiedad).</label>
								</li>
								<li class="list-group-item d-flex align-items-center">
									<input class="form-check-input me-3" name="check_3" type="checkbox" id="check_3" <?= isset(
         	$_GET["id"],
         ) &&
         isset($listar["check_3"]) &&
         $listar["check_3"] == "1"
         	? "checked"
         	: "" ?> />
									<label for="check_3">Radicado de traslado o cancelación de servicios de telecomunicaciones.</label>
								</li>
								<li class="list-group-item d-flex align-items-center">
									<input class="form-check-input me-3" name="check_4" type="checkbox" id="check_4" <?= isset(
         	$_GET["id"],
         ) &&
         isset($listar["check_4"]) &&
         $listar["check_4"] == "1"
         	? "checked"
         	: "" ?> />
									<label for="check_4">Formato de los datos de notificación diligenciado.</label>
								</li>
								<li class="list-group-item d-flex align-items-center">
									<input class="form-check-input me-3" name="check_5" type="checkbox" id="check_5" <?= isset(
         	$_GET["id"],
         ) &&
         isset($listar["check_5"]) &&
         $listar["check_5"] == "1"
         	? "checked"
         	: "" ?> />
									<label for="check_5">Comprobante del pago de cupón (prorratas, días proporcionales, multas).</label>
								</li>
							</ul>
						</div>
					</div>
				</div>

                <!-- INFORMACIÓN PRINCIPAL -->
                <div class="tab-pane" id="form1">
                    <div class="row form-control header-table">
                        <div class="col">
                            <h6>Información del Alumno.</h6>
                        </div>
                    </div>
                    <div  class="row form-control tab-item">
                            <div class="mb-3">
                                <label for="dir_inm" class="form-label">Nombres</label>
                                <input name="dir_inm" type="text" class="form-control" id="dir_inm" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["dir_inm"];
                                } ?>" >
                            </div>

							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label for="apellido1" class="form-label">Primer Apellido</label>
										<input name="apellido1" type="text" class="form-control" id="apellido1" value="<?php if (isset($_GET["id"])) { echo $listar["apellido"]; } ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="apellido2" class="form-label">Segundo Apellido</label>
										<input name="apellido2" type="text" class="form-control" id="apellido2" value="<?php if (isset($_GET["id"])) { echo $listar["apellido"]; } ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label for="identificacion_tipo" class="form-label">Tipo de Identificación</label>
										<select name="identificacion_tipo" class="form-select" id="identificacion_tipo">
											<option value="CC" <?php if (isset($_GET["id"]) && $listar["nom_propietario"] === "CC") echo "selected"; ?>>Cédula de Ciudadanía</option>
											<!-- Otras opciones de tipo de identificación aquí -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="identificacion_numero" class="form-label">Número de Identificación</label>
										<input name="identificacion_numero" type="text" class="form-control" id="identificacion_numero" value="<?php if (isset($_GET["id"])) echo $listar["nom_propietario"]; ?>">
									</div>
								</div>
							</div>

                            <div class="mb-3">
                                <label for="nom_arrendatario" class="form-label">Fecha de Naciemiento</label>
                                <input name="nom_arrendatario" type="date" class="form-control" id="nom_arrendatario" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["nom_arrendatario"];
                                } ?>">
                            </div>
							<div class="mb-3">
								<label for="sexo" class="form-label">Sexo</label>
								<div>
									<input type="radio" id="hombre" name="sexo" value="hombre" <?php if (isset($_GET["id"]) && $listar["sexo"] === "hombre") echo "checked"; ?>>
									<label for="hombre">Masculino</label>
								</div>
								<div>
									<input type="radio" id="mujer" name="sexo" value="mujer" <?php if (isset($_GET["id"]) && $listar["sexo"] === "mujer") echo "checked"; ?>>
									<label for="mujer">Femenino</label>
								</div>
							</div>
                            <div class="mb-3">
                                <label for="cc_arrendatario" class="form-label">Lugar</label>
                                <input name="cc_arrendatario" type="text" class="form-control" id="cc_arrendatario" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["cc_arrendatario"];
                                } else {
                                	echo "";
                                } ?>">
                            </div>

                            <div class="mb-3">
                                <label for="responsable_recibimiento" class="form-label">Nacionalidad</label>
                                <input name="responsable_recibimiento" type="text" class="form-control" id="responsable_recibimiento" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["responsable_recibimiento"];
                                } else {
                                	echo $usuario;
                                } ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="responsable_doc" class="form-label">Direccion</label>
                                <input type="tel" name="responsable_doc" type="text" class="form-control" id="responsable_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["responsable_doc"];
                                } else {
                                	echo $docUser;
                                } ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="quien_entrega" class="form-label">Barrio</label>
                                <input name="quien_entrega" type="text" class="form-control" id="quien_entrega" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quien_entrega"];
                                } ?>">
                            </div>
							<div class="mb-3">
                                <label for="quien_entrega" class="form-label">Estrato</label>
                                <input name="quien_entrega" type="text" class="form-control" id="quien_entrega" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quien_entrega"];
                                } ?>">
                            </div>
							<div class="mb-3">
                                <label for="quien_entrega" class="form-label">Comuna</label>
                                <input name="quien_entrega" type="text" class="form-control" id="quien_entrega" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quien_entrega"];
                                } ?>">
                            </div>

							<div class="mb-3">
                                <label for="quien_entrega" class="form-label">Numero #1</label>
                                <input name="quien_entrega" type="text" class="form-control" id="quien_entrega" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quien_entrega"];
                                } ?>">
                            </div>
							<div class="mb-3">
                                <label for="quien_entrega" class="form-label">Numero #2</label>
                                <input name="quien_entrega" type="text" class="form-control" id="quien_entrega" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quien_entrega"];
                                } ?>">
                            </div>

                            <div class="mb-3">
                                <label for="quienEntrega_doc" class="form-label">Email</label>
                                <input type="tel" name="quienEntrega_doc" type="email" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
                            </div>
                        </div>
						<div>
							<label for="">Ficha Medica</label>
						    <div class="mb-3">
                                <label for="quienEntrega_doc" class="form-label">Grupo</label>
                                <select type="select" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
									<option value="MERCADEO Y VENTAS">MERCADEO Y VENTAS</option>
								</select>
                            </div>
						    <div class="mb-3">
                                <label for="quienEntrega_doc" class="form-label">Jornada</label>
                                <select type="select" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
									<option value="DIURNA">DIURNA</option>
								</select>
                            </div>
						    <div class="mb-3">
                                <label for="quienEntrega_doc" class="form-label">Periodo Electivo</label>
                                <select type="select" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
									<option value="01/01/2024">01/01/2024</option>
								</select>
                            </div>
                            <div class="mb-3">
                                <label for="quienEntrega_doc" class="form-label">Procedencia</label>
                                <input type="tel" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
                            </div>
						</div>
                    </div>
                </div>

                <!-- INQUILINO -->
                <div class="tab-pane" id="form2" style="display: none;">
                    <div class="row form-control header-table">
                        <div class="col">
                            <h6>Ficha Medica</h6>
                        </div>
                    </div>
                    <div id="formulario2" class="row form-control tab-item">
                        <div class="col">
                            <div class=" row">
                                <label class="form-label mb-2">EL INQUILINO DIO AVISO</label>
                            </div>
                            <div class="row mb-2" >
                                <div>
                                    <div class="radios-group">
                                        <input id="res_aviso" type="hidden" name ="res_aviso"></input>
                                        <input id="res_aviso_si" type="radio" name="res_aviso" value="SI" <?php if (
                                        	isset($_GET["id"]) &&
                                        	$listar["res_aviso"] == "SI"
                                        ) {
                                        	echo " checked";
                                        } ?>/>
                                        <label for="res_aviso_si">SI</label>
                                        <input id="res_aviso_no" type="radio" name="res_aviso" value="NO" <?php if (
                                        	isset($_GET["id"]) &&
                                        	$listar["res_aviso"] == "NO"
                                        ) {
                                        	echo " checked";
                                        } ?>/>
                                        <label for="res_aviso_no">NO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="razon_aviso" class="form-label">RAZÓN POR LA QUE NO CONTINUA</label>
                                <textarea name="razon_aviso" type="text" class="form-control" id="razon_aviso"><?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["razon_aviso"];
                                } ?></textarea>
                            </div>
                            <div class=" row">
                                <label class="form-label mb-2">PRORRATA DE SERVICIOS PÚBLICOS</label>
                            </div>
                            <div class="row mb-2" >
                                <div>
                                    <div class="radios-group">
                                        <input type="hidden" name ="res_publico"></input>
                                        <input type="radio" name="res_publico" id="res_publico_si" value="SI" <?php if (
                                        	isset($_GET["id"]) &&
                                        	$listar["res_publico"] == "SI"
                                        ) {
                                        	echo " checked";
                                        } ?>/>
                                        <label for="res_publico_si">SI</label>
                                        <input type="radio" name="res_publico" id="res_publico_no" value="NO" <?php if (
                                        	isset($_GET["id"]) &&
                                        	$listar["res_publico"] == "NO"
                                        ) {
                                        	echo " checked";
                                        } ?>/>
                                        <label for="res_publico_no">NO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="valor_prorrata" class="form-label">VALOR PRORRATA</label>
                                    <input id="prorroga" name="valor_prorrata" type="text" class="form-control"  inputmode="tel" value="<?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["valor_prorrata"];
                                    } ?>">
                                </div>
                            </div>

                            <div class="row">
                                <label class="form-label">DAÑOS Y FALTANTES ATRIBUIBLES A LOS ARRENDATARIOS</label>
                                <a name="final-group2"></a>
                                <div>
                                    <button type="button" id="toggle-input-faltantes" class="btn btn-primary mostrar-campos mb-2">Mostrar Campos</button>
                                </div>
                                <div id="faltantes-inputs">
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >1.</span>
                                        <input type="text" name="faltante1" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante1"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >2.</span>
                                        <input type="text" name="faltante2" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante2"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >3.</span>
                                        <input type="text" name="faltante3" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante3"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >4.</span>
                                        <input type="text" name="faltante4" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante4"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >5.</span>
                                        <input type="text" name="faltante5" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante5"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >6.</span>
                                        <input type="text" name="faltante6" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante6"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >7.</span>
                                        <input type="text" name="faltante7" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante7"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >8.</span>
                                        <input type="text" name="faltante8" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante8"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >9.</span>
                                        <input type="text" name="faltante9" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante9"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >10.</span>
                                        <input type="text" name="faltante10" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante10"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >11.</span>
                                        <input type="text" name="faltante11" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante11"];
                                        } ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text mb-2" >12.</span>
                                        <input type="text" name="faltante12" class="form-control mb-2" maxlength="155" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["faltante12"];
                                        } ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- INFORMACIÓN ADICIONAL -->
                <div class="tab-pane panel-3" id="form3" style="display: none;">
                    <div class="row form-control header-table">
                        <div class="col">
                            <h6>Información Adicional</h6>
                        </div>
                    </div>
                    <div class="row form-control tab-item">
                        <div class="col">
                                <div class="buttons-container mb-2">
                                    <div class="row">
                                        <label class="form-label label-mcampos mb-2">LLAVES RECIBIDAS</label>
                                        <a name="llaves-group"></a>
                                        <div>
                                            <button type="button" id="toggle-input-llaves" class="btn btn-primary mostrar-campos mb-2"> Mostrar Campos</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="form-label label-mcampos mb-2">CANDADOS RECIBIDOS</label>
                                        <a name="locks-group"></a>
                                        <div>
                                            <button type="button" id="toggle-input-locks" class="btn btn-primary mostrar-campos mb-2"> Mostrar Campos</button>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div id="llaves-inputs" class="llaves-container">
                                    <div class="total-llaves mb-2">
                                        <label class="form-label">PUERTA PRINCIPAL</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="door_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar["door_number"];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>
                                    <div class="total-llaves mb-2">
                                        <label class="form-label">ALCOBAS</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="room_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar["room_number"];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>
                                    <div class="total-llaves mb-2">
                                        <label class="form-label">REJAS</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="grid_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar["grid_number"];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>
                                    <div class="total-llaves mb-2">
                                        <label class="form-label">CUARTO ÚTIL</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="usefulroom_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar[
                                            		"usefulroom_number"
                                            	];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>
                                    <div class="total-llaves  mb-2">
                                        <label class="form-label">SENCILLAS</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="simple_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar["simple_number"];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>

                                    <div class="total-llaves mb-2">
                                        <label class="form-label">SEGURIDAD</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="security_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar["security_number"];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>

                                    <div class="total-llaves other-keys mb-3">
                                        <label class="form-label">OTRAS</label>
                                        <div class="group-number">
                                            <button type="button" class="dec button minus">-</button>
                                            <input name="others_number" type="number" class="form-control input-number" min="0" max="15" oninput="MaxLenghtCheck(this)" value="<?php if (
                                            	isset($_GET["id"])
                                            ) {
                                            	echo $listar["others_number"];
                                            } ?>">
                                            <button type="button" class="inc button plus">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="locks-inputs">
                                    <div class="group-lock mb-1">
                                        <label class="form-label lock-label">CANDADO #1</label>
                                    </div>
                                    <div class="group-lock mb-2">
                                        <label  class="form-label">MARCA</label>
                                        <input name="lock_1_mc" type="text" class="form-control" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["lock_1_mc"];
                                        } ?>">
                                    </div>
                                    <div class="group-lock mb-3">
                                        <label class="form-label">ESTADO</label>
                                            <select name="lock_1_es" class="form-select">
                                                <option value="<?php if (
                                                	isset($_GET["id"])
                                                ) {
                                                	echo $listar["lock_1_es"];
                                                } ?>" selected><?php if (
	isset($_GET["id"])
) {
	echo $listar["lock_1_es"];
} ?></option>
                                                <option value="" disabled>OPCIONES</option>
                                                <option value="NUEVO">NUEVO</option>
                                                <option value="BUENO">BUENO</option>
                                                <option value="REGULAR">REGULAR</option>
                                                <option value="MALO">MALO</option>
                                            </select>
                                    </div>
                                    <div class="group-lock mb-1">
                                        <label class="form-label lock-label">CANDADO #2</label>
                                    </div>
                                    <div class="group-lock mb-2">
                                        <label  class="form-label">MARCA</label>
                                        <input name="lock_2_mc" type="text" class="form-control"  value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["lock_2_mc"];
                                        } ?>">
                                    </div>
                                    <div class="group-lock mb-3">
                                        <label class="form-label">ESTADO</label>
                                            <select name="lock_2_es" class="form-select">
                                                <option value="<?php if (
                                                	isset($_GET["id"])
                                                ) {
                                                	echo $listar["lock_2_es"];
                                                } ?>" selected><?php if (
	isset($_GET["id"])
) {
	echo $listar["lock_2_es"];
} ?></option>
                                                <option value="" disabled>OPCIONES</option>
                                                <option value="NUEVO">NUEVO</option>
                                                <option value="BUENO">BUENO</option>
                                                <option value="REGULAR">REGULAR</option>
                                                <option value="MALO">MALO</option>
                                            </select>
                                    </div>
                                    <div class="group-lock mb-1">
                                        <label class="form-label lock-label">CANDADO #3</label>
                                    </div>
                                    <div class="group-lock mb-2">
                                        <label  class="form-label">MARCA</label>
                                        <input name="lock_3_mc" type="text" class="form-control" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["lock_3_mc"];
                                        } ?>">
                                    </div>
                                    <div class="group-lock mb-3">
                                        <label class="form-label">ESTADO</label>
                                            <select name="lock_3_es" class="form-select">
                                                <option value="<?php if (
                                                	isset($_GET["id"])
                                                ) {
                                                	echo $listar["lock_3_es"];
                                                } ?>" selected><?php if (
	isset($_GET["id"])
) {
	echo $listar["lock_3_es"];
} ?></option>
                                                <option value="" disabled>OPCIONES</option>
                                                <option value="NUEVO">NUEVO</option>
                                                <option value="BUENO">BUENO</option>
                                                <option value="REGULAR">REGULAR</option>
                                                <option value="MALO">MALO</option>
                                            </select>
                                    </div>
                                    <div class="group-lock mb-1">
                                        <label class="form-label lock-label">CANDADO #4</label>
                                    </div>
                                    <div class="group-lock mb-2">
                                        <label  class="form-label">MARCA</label>
                                        <input name="lock_4_mc" type="text" class="form-control" value="<?php if (
                                        	isset($_GET["id"])
                                        ) {
                                        	echo $listar["lock_4_mc"];
                                        } ?>">
                                    </div>
                                    <div class="group-lock mb-3">
                                        <label class="form-label">ESTADO</label>
                                            <select name="lock_4_es" class="form-select">
                                                <option value="<?php if (
                                                	isset($_GET["id"])
                                                ) {
                                                	echo $listar["lock_4_es"];
                                                } ?>" selected ><?php if (
	isset($_GET["id"])
) {
	echo $listar["lock_4_es"];
} ?></option>
                                                <option value="" disabled>OPCIONES</option>
                                                <option value="NUEVO">NUEVO</option>
                                                <option value="BUENO">BUENO</option>
                                                <option value="REGULAR">REGULAR</option>
                                                <option value="MALO">MALO</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="container-label-pintura row">
                                <label class="form-label mb-2">EL INMUEBLE REQUIERE PINTURA</label>
                            </div>
                            <div class="container-rads row mb-2">
                                <div class="semi-paint-container">
                                    <label class="form-label label-header">GENERAL</label>
                                    <input type="hidden" name="gen_res">
                                    <div class="paint-group">
                                        <input type="radio" name="gen_res" id="gen_si" value="SI" checked/>
                                        <label for="gen_si" >SI</label>
                                        <!-- <input type="radio" name="gen_res" id="gen_no" value="NO"/>
                                        <label for="gen_no">NO</label> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin:auto">
                                <div class="obs-adic">
                                    <label class="form-label"> OBSERVACIONES PROPIETARIO</label>
                                    <textarea name="obs_adic" class="form-control" rows="4"><?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["obs_adic"];
                                    } ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- INFORMACIÓN SIMI -->
                 <div class="tab-pane tab-item" id="form4" style="display: none;">
                    <div class="row form-control header-table">
                        <div class="col">
                            <h6>Simi</h6>
                        </div>
                    </div>
                    <div  class="row form-control tab-item tab-item-simi">
                        <div class="col">
                            <!-- CAMPOS SIMI -->
                            <div class="mb-3">
                                <label for="fecha_noti" class="form-label">FECHA DE NOTIFICACIÓN</label>
                                <input name="fecha_noti" type="text" class="form-control-plaintext" id="fecha_noti"  style="font-family: sans-serif !important; font-weight: 600;" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["fecha_noti"];
                                } else {
                                	echo "";
                                } ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="concepto_noti" class="form-label">CONCEPTO NOTIFICACIÓN</label>
                                <input name="concepto_noti" type="text" class="form-control-plaintext" id="concepto_noti" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["concepto_noti"];
                                } ?>" readonly>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="cod_ctto" class="form-label">CÓDIGO DE CONTRATO</label>
                                    <input name="cod_ctto" type="number" class="form-control-plaintext" id="cod_ctto" value="<?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["cod_ctto"];
                                    } else {
                                    	echo "";
                                    } ?>" readonly>
                                </div>
                            </div>


                            <div class="row">
                                <div class="mb-3">
                                    <label for="ini_ctto" class="form-label">INICIO CONTRATO</label>
                                    <input name="ini_ctto" type="text" class="form-control-plaintext" id="ini_ctto" value="<?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["ini_ctto"];
                                    } else {
                                    	echo "";
                                    } ?>" readonly>
                                </div>
                            </div>


                            <div class="row">
                                <div class="mb-3">
                                    <label for="fin_ctto" class="form-label">FIN CONTRATO</label>
                                    <input name="fin_ctto" type="text" class="form-control-plaintext" id="fin_ctto" value="<?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["fin_ctto"];
                                    } else {
                                    	echo "";
                                    } ?>" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="centro_cost" class="form-label">CENTRO DE COSTOS</label>
                                <input name="centro_cost" type="text" class="form-control-plaintext" id="centro_cost" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["centro_cost"];
                                } else {
                                	echo "";
                                } ?>" readonly>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="valor_canon" class="form-label">VALOR CANON</label>
                                    <input name="valor_canon" type="text" class="form-control-plaintext" id="valor_canon" value="<?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["valor_canon"];
                                    } else {
                                    	echo "";
                                    } ?>" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="valor_admin" class="form-label">VALOR ADMINISTRACIÓN</label>
                                    <input name="valor_admin" type="text" class="form-control-plaintext" id="valor_admin" value="<?php if (
                                    	isset($_GET["id"])
                                    ) {
                                    	echo $listar["valor_admin"];
                                    } else {
                                    	echo "";
                                    } ?>" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="barrio" class="form-label">BARRIO</label>
                                <input name="barrio" type="text" class="form-control-plaintext" id="barrio" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["barrio"];
                                } ?>" readonly>
                            </div>




                        </div>
                    </div>
                </div>

                <!-- FIRMA INQUILINO -->
                <div class="tab-pane" id="form5" >
                    <div id="formulario4" class="row form-control tab-item">
                        <div class="col container-firmas">
                            <div class="mb-3">
                                <label for="quienEntrega_doc" class="form-label">Nombre</label>
                                <input type="tel" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
                            </div>
                        </div>
	                   <div class="mb-3">
							<label for="quienEntrega_doc" class="form-label">Celular</label>
                                <input type="tel" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
						</div>
			           <div class="mb-3">
							<label for="quienEntrega_doc" class="form-label">Parentezco</label>
                                <input type="tel" name="quienEntrega_doc" type="text" class="form-control" id="quienEntrega_doc" value="<?php if (
                                	isset($_GET["id"])
                                ) {
                                	echo $listar["quienEntrega_doc"];
                                } ?>">
						</div>
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label for="identificacion_tipo" class="form-label">Tipo de Identificación</label>
										<select name="identificacion_tipo" class="form-select" id="identificacion_tipo">
											<option value="CC" <?php if (isset($_GET["id"]) && $listar["nom_propietario"] === "CC") echo "selected"; ?>>Cédula de Ciudadanía</option>
											<!-- Otras opciones de tipo de identificación aquí -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="identificacion_numero" class="form-label">Número de Identificación</label>
										<input name="identificacion_numero" type="text" class="form-control" id="identificacion_numero" value="<?php if (isset($_GET["id"])) echo $listar["nom_propietario"]; ?>">
									</div>
								</div>
							</div>
                        <br/>
                    </div>
                </div>

            <!-- FIRMA PROPIETARIO -->
                <div class="tab-pane" id="form6" style="display: none;">
                    <div id="formulario5" class="row form-control tab-item">
                        <div class="col container-firmas">

                                <div class="row" style="text-align: center;">
                                    <label class="form-label mb-2">FIRMA DEL PROPIETARIO QUE RECIBE</label>
                                </div>

                            <div style="<?php if (
                            	isset($listar["firma_propietario"]) &&
                            	$listar["firma_propietario"] != ""
                            ) {
                            	echo "display:none;";
                            } ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <canvas id="draw-canvas1" width=auto height=auto aria-label="No tienes un buen navegador.">
                                            </canvas>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">

                                            <button class="btn btn-primary" type="button" id="draw-submitBtn1" style="margin-top: 15px;">Guardar Firma</button>
                                            <button class="btn btn-primary" type="button" id="draw-clearBtn1" style="margin-top: 15px;">Limpiar Firma</button>

                                            <!--  <label>Color</label>-->
                                            <input type="hidden" id="color">
                                            <!-- <label>Tamaño Puntero</label> -->
                                            <input type="hidden" id="puntero" min="1" default="1" max="1" width="10%">
                                        </div>
                                    </div>
                            </div>

                                <?php if (
                                	isset($listar["firma_propietario"]) &&
                                	$listar["firma_propietario"] != ""
                                ) { ?>
                                    <img style="height: 150px; width: 300px; margin: 0 auto; border-radius: 5px;" id="draw-image1" src=<?php echo $listar[
                                    	"firma_propietario"
                                    ]; ?> alt="firma propietario">
                                <?php } ?>

                                <br/>
                        <div>

                            <input type="hidden" id="draw-dataUrl1" class="form-control" name="firma_propietario" <?php if (
                            	isset($listar["firma_propietario"])
                            ) {
                            	echo 'value="' .
                            		$listar["firma_propietario"] .
                            		'"';
                            } ?>></input>

                            <input type="hidden" name="fecha_firma" id="fecha_firma1" value="">

                            <input type="hidden" name="ipUser" id="ipUser1"  value="<?php if (
                            	isset($listar["firma_propietario"])
                            ) {
                            	echo $ipUser;
                            } ?>">
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="contenedor">
            <button class="botonF1" id="botonF1">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                </span>
            </button>

            <button id="botonF2" class="btns botonF2">
            <span>
            <svg class="svg-icon" viewBox="0 0 20 20" width="30" height="30" fill="white">
                <path d="M17.064,4.656l-2.05-2.035C14.936,2.544,14.831,2.5,14.721,2.5H3.854c-0.229,0-0.417,0.188-0.417,0.417v14.167c0,0.229,0.188,0.417,0.417,0.417h12.917c0.229,0,0.416-0.188,0.416-0.417V4.952C17.188,4.84,17.144,4.733,17.064,4.656M6.354,3.333h7.917V10H6.354V3.333z M16.354,16.667H4.271V3.333h1.25v7.083c0,0.229,0.188,0.417,0.417,0.417h8.75c0.229,0,0.416-0.188,0.416-0.417V3.886l1.25,1.239V16.667z M13.402,4.688v3.958c0,0.229-0.186,0.417-0.417,0.417c-0.229,0-0.417-0.188-0.417-0.417V4.688c0-0.229,0.188-0.417,0.417-0.417C13.217,4.271,13.402,4.458,13.402,4.688"></path>
            </svg>
            </span>
            <div style="font-size: 10px; font-weight:600;">Guardar</div>
            </button>

            <button id="botonF3" class="btns botonF3">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                <desc>Created with Fabric.js 1.7.22</desc>
                <defs>
                </defs>
                <g transform="translate(128 128) scale(0.72 0.72)" >
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
                    <path d="M 0.439 35.5 l 29.228 -19.767 c 0.308 -0.208 0.704 -0.229 1.029 -0.055 c 0.327 0.173 0.531 0.513 0.531 0.883 v 7.987 c 12.038 0.262 26.306 5.201 37.501 13.023 C 82.446 47.155 90 59.894 90 73.438 c 0 0.471 -0.329 0.878 -0.79 0.978 c -0.07 0.016 -0.141 0.022 -0.211 0.022 c -0.386 0 -0.747 -0.225 -0.911 -0.588 c -7.823 -17.312 -26.952 -26.183 -56.861 -26.376 v 8.62 c 0 0.37 -0.204 0.71 -0.531 0.883 c -0.325 0.173 -0.722 0.153 -1.029 -0.055 L 0.439 37.157 C 0.165 36.971 0 36.661 0 36.329 S 0.165 35.686 0.439 35.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: white; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
                </g>
                </svg>
            </span>
            <div style="font-size: 10px; font-weight:600;">Atrás</div>
            </button>
        </div>
        <div style="height: 20px;"></div>
    </div>
    <script src="../../../vendor/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
    <script src="../../../vendor/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="../../../vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/recibimientos.js?v=3.1" ></script>
    <script src="../assets/js/firma.js?v=1"></script>
    <!-- SweetAlert -->
    <script src="../../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

</body>
</html>