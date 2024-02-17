<?php
session_start();
// TRAER FECHA
date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, "spanish");
$fecha = date('d-m-Y H:i');

//  Separamos la fecha y la hora de Fecha Prestamo
$fechaLocalSeparada = explode(" ", $fecha);
$fechaCrearP        = $fechaLocalSeparada[0];

// USUARIO, CEDULA E IP
$usuario = $_SESSION['usuario'];
$docUser = $_SESSION['cc'];
$ipUser  = $_SERVER['REMOTE_ADDR'];

?>

<?php
require_once '../../backend/controladores/controlador.php';
require_once '../../backend/modelos/archivo_model.php';

// CONDICIONAL PARA ACTUALIZAR SI EXISTE UN ID EN LA URL
if (isset($_GET["id"])) {
	$item  = "id_archivosP";
	$valor = $_GET["id"];

	$listar     = controladorArchivos::ctrListarRegistros($item, $valor);
	$actualizar = new controladorArchivos();
	$actualizar->ctrActualizarRegistro();


	// Separar la fecha y la hora de la BD Fecha Prestamo
	$fechaBdSeparada = explode(" ", $listar['fecha_prestamo']);
	$fechaEditarP    = $fechaBdSeparada[0];

	// Separar la fecha y la hora local al momento de editar fecha devoluciones
	$fechaSeparadaD = explode(" ", $fecha);
	$fechaEditarD   = $fechaSeparadaD[0];


} else {
	//Metodo estatico, permite reutilizar los datos
	$registro = controladorArchivos::ctrRegistro();

}

//Metodo no estatico, no permite reutilizar los datos, las acciones se hacen desde el controlador
// $registro2 = new controladorRecibimientos;
// $registro2 -> ctrRegistro();

// if ($_SESSION['rol'] == 1  or $_SESSION['rol'] == 7 or $_SESSION['rol'] == 15 or $_SESSION['rol'] == 16) {
	if ($_SESSION['rol'] == 1) {
		$permiso["archivos"]["form"]["access"] = true;
	}
	if ($_SESSION['rol'] == 20){
		$permiso["archivos"]["form"]["access"] = true;
	}
	if ($_SESSION['rol'] == 24){
		$permiso["archivos"]["form"]["access"] = true;
	}


	if (isset($permiso["archivos"]["form"]["access"]) && $permiso["archivos"]["form"]["access"] == true) {
	?>

	<!DOCTYPE html>
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
		<link rel="stylesheet" href="../assets/css/archivos.css?v=0.3">
		<link rel="stylesheet" href="../assets/css/firma.css">

		<title>Archivos</title>
	</head>


	<body>
		<div class="container">
			<!-- HEADER TAB BUTTONS -->
			<div class="nav btn-group mb-2 mt-5">
				<a class="btn btn-primary active" aria-current="page" href="#form1" data-bs-toggle="tab">PRESTAMOS</a>

				<a <?php if (!isset($_GET['id'])) {
					echo 'style="display:none;"';
				} ?> class="btn btn-primary" href="#form2" data-bs-toggle="tab">DEVOLUCIONES</a>
			</div>


			<!-- FORMULARIO -->
			<form id="form_archivos" method="POST" action="#" >

				<!-- ID Oculto -->
				<?php if (isset($_GET['id'])) { ?>
					<!-- Obtenemos los id y los imprimimos ocultos en la vista para actualizar las respectivas tablas desde el modelo -->
					<input type="hidden" id="id_archivosP" name="id_archivosP" value="<?php echo $listar['id_archivosP'] ?>">
					<input type="hidden" id="id_archivosD" name="id_archivosD" value="<?php echo $listar['id_archivosD'] ?>">
				<?php } ?>

				<!-- CONTENIDO TABS -->
				<div class="tab-content">

					<!-- INFORMACIÓN PRESTAMOS DE CARPETAS, TÍTULO VALOR Y CDS -->
					<div class="tab-pane active" id="form1">
						<div class="row form-control header-table" >
							<div class="col">
								<h6>FORMATO PRESTAMOS CARPETAS, CONTRATOS, TÍTULO VALOR Y CDS</h6>
							</div>
						</div>

						<div  class="row form-control tab-item">
							<div class="col">

								<div class="mb-3">
									<label for="fecha_prestamo" class="form-label">FECHA PRESTAMO</label>

									<!-- Este input muestra solo la fecha pero no envía el valor a la base de datos -->
									<input type="text" class="form-control-plaintext" id="fecha_prestamo"  style="font-family: sans-serif !important; font-weight: 600;" value="<?php if (isset($_GET["id"])) {
										echo $fechaEditarP;
									} else {
										echo $fechaCrearP;
									} ?>" readonly>

									<!-- Este input oculto, envía el valor a la base de datos -->
									<input type="hidden" name="fecha_prestamo" value="<?php if (isset($_GET["id"])) {
										echo $listar['fecha_prestamo'];
									} else {
										echo $fecha;
									} ?>">

								</div>

								<div class="row">
									<label class="form-label mb-2">TIPO PRESTAMO</label>
								</div>

								<!-- SELECT PRESTAMO -->
								<div class="row mb-2 content">
									<div>
										<div class="radios-group" style="display: flex; flex-direction: column;">
											<input type="hidden" id="carpetaHd" name="carpeta">
											<input id="carpeta" type="checkbox" name="carpeta" value="CARPETA" <?php if (isset($_GET['id']) && $listar['carpeta'] == 'CARPETA') {
												echo ' checked';
											} ?>/>
											<label for="carpeta">CARPETA</label>

											<input type="hidden" id="contratoHd" name="contrato">
											<input id="contrato" type="checkbox" name="contrato" value="CONTRATO" <?php if (isset($_GET['id']) && $listar['contrato'] == 'CONTRATO') {
												echo ' checked';
											} ?>/>
											<label for="contrato">CONTRATO</label>

											<input type="hidden" id="cdHd" name="cd">
											<input id="cd" type="checkbox" name="cd" value="CD" <?php if (isset($_GET['id']) && $listar['cd'] == 'CD') {
												echo ' checked';
											} ?>/>
											<label for="cd">CD</label>

                      <input type="hidden" id="titulo_valorHd" name="titulo_valor">
                      <input id="titulo_valor" type="checkbox" name="titulo_valor" value="TÍTULO VALOR" <?php if(isset($_GET['id']) && $listar['titulo_valor'] == 'TÍTULO VALOR'){
                        echo ' checked';
                      }?>/>
                      <label for="titulo_valor">TÍTULO VALOR</label>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label for="descripcion">DESCRIPCIÓN PRESTAMO</label>
									<input name="descripcion" type="text" class="form-control" id="descripcion"  value="<?php if (isset($_GET["id"])) {
										echo $listar['descripcion'];
									} ?>" >
								</div>

								<div class="row">
									<div class="mb-3">
										<label for="responsable_entP" class="form-label">RESPONSABLE DE ENTREGAR</label>
										<input name="responsable_entP" type="text" class="form-control" id="responsable_entP"  value="<?php if (isset($_GET["id"])) {
											echo $listar["responsable_entP"];
										} else {
											echo $usuario;
										} ?>" readonly>
									</div>
								</div>

								 <!-- FIRMA DE QUIEN ENTREGA -->
								<div class="row">
									<label class="form-label">FIRMA QUIEN ENTREGA</label>
									<a name="firma-1"></a>
									<div>
										<button type="button" id="toggle-firma1" class="btn btn-primary mostrar-campos mb-2">FIRMAR</button>
									</div>
									<div id="firma1">
										<div class="tab-pane" id="form1">
											<div id="formulario1" class="row form-control tab-item">
												<div class="col" style="display: flex; flex-direction: column;">
												<div class="row" style="text-align: center;">
												<label class="form-label mb-2"></label>
												</div>
												<div style="<?php if (isset($listar['firma_entrega_prestamo']) && $listar['firma_entrega_prestamo'] != '') {
													echo 'display:none;';
												} ?>">
												<div class="row">
													<div class="col-md-12">
													<canvas class="canv" id="draw-canvas" width=auto height=auto aria-label="No tienes un buen navegador."></canvas>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<button class="btn btn-primary" type="button" id="draw-submitBtn" style="margin-top: 15px;"> Guardar Firma</button>
														<button class="btn btn-primary" type="button" id="draw-clearBtn" style="margin-top: 15px;">Limpiar Firma</button>
														<input type="hidden" id="color">
														<input type="hidden" id="puntero" min="1" default="1" max="1" width="10%">
													</div>
												</div>
												</div>

												<div>
													<input type="hidden" id="draw-dataUrl" class="form-control" name="firma_entrega_prestamo" <?php if (isset($listar['firma_entrega_prestamo'])) {
														echo 'value="' . $listar['firma_entrega_prestamo'] . '"';
													} ?>></input>                               <!--   <input type="hidden" name="firma_inquilino" id="firma_inquilino" value="< ?php if(isset($_GET["id"])){ echo $listar['firma_inquilino']; }?>">  -->

													<!-- <input type="hidden" name="fecha_firma" id="fecha_firma" value=""> -->

													<!-- <input type="hidden" name="ipUser" id="ipUser" value="< ?php if(isset($listar['firma_recibe_prestamo'])){ echo $ipUser;} ?>"> -->
												</div>
												<?php if (isset($listar['firma_entrega_prestamo']) && $listar['firma_entrega_prestamo'] != '') { ?>

													 <!-- < ?php if(isset($listar['firma_inquilino'])){ ?> -->
													<img style="height: 150px; width: 200px; margin: 0 auto; border-radius: 5px;" id="draw-image" src=<?php echo $listar['firma_entrega_prestamo']; ?> alt="firma_entrega_prestamo">
													<!-- < ?php } ?> -->
												<?php } ?>
												</div>
												<br/>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="mb-3">
										<label for="responsable_recP" class="form-label">RESPONSABLE DE RECIBIR</label>
										<input name="responsable_recP" type="text" class="form-control" id="responsable_recP" value="<?php if (isset($_GET['id'])) {
											echo $listar['responsable_recP'];
										} ?>">
									</div>
								</div>
								<!-- FIRMA DE QUIEN RECIBE -->
								<div class="row">
									<label class="form-label">FIRMA QUIEN RECIBE</label>
									<a name="firma-2"></a>
									<div>
										<button type="button" id="toggle-firma2" class="btn btn-primary mostrar-campos mb-2">FIRMAR</button>
									</div>

									<div id="firma2">
										<div class="tab-pane" id="form1">
											<div id="formulario1" class="row form-control tab-item">
												<div class="col" style="display: flex; flex-direction: column;">
												<div class="row" style="text-align: center;">
												<label class="form-label mb-2"></label>
												</div>
												<div style="<?php if (isset($listar['firma_recibe_prestamo']) && $listar['firma_recibe_prestamo'] != '') {
													echo 'display:none;';
												} ?>">
												<div class="row">
													<div class="col-md-12 cont">
														<canvas class="canv" id="draw-canvas1" width=auto height=auto aria-label="No tienes un buen navegador.">
														</canvas>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<button class="btn btn-primary" type="button" id="draw-submitBtn1" style="margin-top: 15px;"> Guardar Firma</button>
														<button class="btn btn-primary" type="button" id="draw-clearBtn1" style="margin-top: 15px;">Limpiar Firma</button>
														<input type="hidden" id="color">
														<input type="hidden" id="puntero" min="1" default="1" max="1" width="10%">
													</div>
												</div>
												</div>

												<div class="cont">
													<input type="hidden" id="draw-dataUrl1" class="form-control" name="firma_recibe_prestamo" <?php if (isset($listar['firma_recibe_prestamo'])) {
														echo 'value="' . $listar['firma_recibe_prestamo'] . '"';
													} ?>></input>                               <!--   <input type="hidden" name="firma_inquilino" id="firma_inquilino" value="< ?php if(isset($_GET["id"])){ echo $listar['firma_inquilino']; }?>">  -->

													<!-- <input type="hidden" name="fecha_firma" id="fecha_firma" value=""> -->

													<!-- <input type="hidden" name="ipUser" id="ipUser" value="< ?php if(isset($listar['firma_entrega_prestamo'])){ echo $ipUser;} ?>"> -->
												</div>
												<?php if (isset($listar['firma_recibe_prestamo']) && $listar['firma_recibe_prestamo'] != '') { ?>
													<!-- < ?php if(isset($listar['firma_inquilino'])){ ?> -->
													<img style="height: 150px; width: 200px; margin: 0 auto; border-radius: 5px;" id="draw-image" src=<?php echo $listar['firma_recibe_prestamo']; ?> alt="firma_recibe_prestamo">
													<!-- < ?php } ?> -->
												<?php } ?>
												</div>
												<br/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					  <!-- INFORMACION DEVOLUCIONES -->
					<div class="tab-pane" id="form2">
						<div class="row form-control header-table">
							<div class="col">
								<h6>FORMATO DEVOLUCIONES CARPETAS, CONTRATOS Y CDS</h6>
							</div>
						</div>
						<div id="formulario2" class="row form-control tab-item">
							<div class="col">
								<div class="row mb-2" >
									<div class="mb-3">
									<label for="fecha_devolucion" class="form-label">FECHA DEVOLUCIÓN</label>

									<!-- Este input muestra solo la fecha pero no envía el valor a la base de datos -->
									<input type="text" class="form-control-plaintext" id="fecha_devolucion"  style="font-family: sans-serif !important; font-weight: 600;" value="<?php if (isset($_GET['id'])) {
										echo $fechaEditarD;
									} ?>"  readonly>

									<!-- Este input oculto, envía el valor a la base de datos -->
									<input type="hidden" name="fecha_devolucion" value="<?php if (isset($_GET["id"])) {
										if ($listar['fecha_devolucion'] == '') {
											echo $fecha;
										}
									} ?>">
									</div>

									<div class="row">
									<div class="mb-3">
										<label for="responsable_entD" class="form-label">RESPONSABLE DE ENTREGAR</label>
										<input id="responsable_entD" name="responsable_entD" type="text" class="form-control"  value="<?php if (isset($_GET["id"])) {
											echo $listar['responsable_entD'];
										} ?>">
									</div>
									</div>

									<!-- FIRMA DE QUIEN ENTREGA -->
									<div class="row">
										<label class="form-label">FIRMA QUIEN ENTREGA</label>
										<a name="firma-3"></a>
										<div>
										<button type="button" id="toggle-firma3" class="btn btn-primary mostrar-campos mb-2">FIRMAR</button>
										</div>
										<div id="firma3">
											<div class="tab-pane" id="form2">
												<div id="formulario2" class="row form-control tab-item">
													<div class="col" style="display: flex; flex-direction: column;">
													<div class="row" style="text-align: center;">
													<label class="form-label mb-2"></label>
													</div>
													<div style="<?php if (isset($listar['firma_devuelve_prestamo']) && $listar['firma_devuelve_prestamo'] != '') {
														echo 'display:none;';
													} ?>">
													<div class="row">
														<div class="col-md-12">
															<canvas class="canv" id="draw-canvas2" width=auto  height=auto aria-label="No tienes un buen navegador.">
															</canvas>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<button class="signbtn btn btn-primary" type="button" id="draw-submitBtn2" style="margin-top: 15px;"> Guardar Firma</button>
															<button class="signbtn btn btn-primary" type="button" id="draw-clearBtn2" style="margin-top: 15px;">Limpiar Firma</button>

															<input type="hidden" id="color">
															<!-- <label>Tamaño Puntero</label> -->
															<input type="hidden" id="puntero" min="1" default="1" max="1" width="10%">
														</div>
													</div>
													</div>

													<div>
													<input type="hidden" id="draw-dataUrl2" class="form-control" name="firma_devuelve_prestamo" <?php if (isset($listar['firma_devuelve_prestamo'])) {
														echo 'value="' . $listar['firma_devuelve_prestamo'] . '"';
													} ?>></input>                               <!--   <input type="hidden" name="firma_inquilino" id="firma_inquilino" value="< ?php if(isset($_GET["id"])){ echo $listar['firma_inquilino']; }?>">  -->

													<!-- <input type="hidden" name="fecha_firma" id="fecha_firma" value=""> -->

													<!-- <input type="hidden" name="ipUser" id="ipUser" value="< ?php if(isset($listar['firma_devuelve_prestamo'])){ echo $ipUser;} ?>"> -->
													</div>
													<?php if (isset($listar['firma_devuelve_prestamo']) && $listar['firma_devuelve_prestamo'] != '') { ?>
														<!-- < ?php if(isset($listar['firma_inquilino'])){ ?> -->
														<img style="height: 150px; width: 200px; margin: 0 auto; border-radius: 5px;" id="draw-image" src=<?php echo $listar['firma_devuelve_prestamo']; ?> alt="firma_devuelve_prestamo">
														<!-- < ?php } ?> -->
													<?php } ?>
													</div>
													<br/>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="mb-3">
											<label for="responsable_recD" class="form-label">RESPONSABLE DE RECIBIR</label>
											<input id="responsable_recD" name="responsable_recD" type="text" class="form-control" value="<?php if (isset($_GET["id"])) {
												echo $listar['responsable_recD'];
											} ?>">
										</div>
									</div>
									<!-- FIRMA DE QUIEN RECIBE -->
									<div class="row">
										<label class="form-label">FIRMA QUIEN RECIBE</label>
										<a name="firma-4"></a>

										<div>
											<button type="button" id="toggle-firma4" class="btn btn-primary mostrar-campos mb-2">FIRMAR</button>
										</div>
										<div id="firma4">
											<div class="tab-pane" id="form2">
												<div id="formulario2" class="row form-control tab-item">
													<div class="col" style="display: flex; flex-direction: column;">
													<div class="row" style="text-align: center;">
													<label class="form-label mb-2"></label>
													</div>
													<div style="<?php if (isset($listar['firma_recibe_devolucion']) && $listar['firma_recibe_devolucion'] != '') {
														echo 'display:none;';
													} ?>">
													<div class="row">
														<div class="col-md-12">
															<canvas class="canv" id="draw-canvas3" width=auto height=auto aria-label="No tienes un buen navegador.">
															</canvas>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<button class="signbtn btn btn-primary" type="button" id="draw-submitBtn3" style="margin-top: 15px;"> Guardar Firma</button>
															<button class="signbtn btn btn-primary" type="button" id="draw-clearBtn3" style="margin-top: 15px;">Limpiar Firma</button>
															<input type="hidden" id="color">
															<!-- <label>Tamaño Puntero</label> -->
															<input type="hidden" id="puntero" min="1" default="1" max="1" width="10%">
														</div>
													</div>
													</div>

													<div>
														<input type="hidden" id="draw-dataUrl3" class="form-control" name="firma_recibe_devolucion" <?php if (isset($listar['firma_recibe_devolucion'])) {
															echo 'value="' . $listar['firma_recibe_devolucion'] . '"';
														} ?>></input>                               <!--   <input type="hidden" name="firma_inquilino" id="firma_inquilino" value="< ?php if(isset($_GET["id"])){ echo $listar['firma_inquilino']; }?>">  -->
														<!-- <input type="hidden" name="fecha_firma" id="fecha_firma" value=""> -->
														<!-- <input type="hidden" name="ipUser" id="ipUser" value="< ?php if(isset($listar['firma_recibe_devolucion'])){ echo $ipUser;} ?>"> -->
													</div>
													<?php if (isset($listar['firma_recibe_devolucion']) && $listar['firma_recibe_devolucion'] != '') { ?>
														<!-- < ?php if(isset($listar['firma_inquilino'])){ ?> -->
														<img style="height: 150px; width: 200px; margin: 0 auto; border-radius: 5px;" id="draw-image" src=<?php echo $listar['firma_recibe_devolucion']; ?> alt="firma_recibe_devolucion">
														<!-- < ?php } ?> -->
													<?php } ?>
													</div>
													<br/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="contenedor">
				<button class="botonF1" id="botonF1" >
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

				<button id="botonF3" class="btns botonF3" >
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
		 <script src="../assets/js/archivos_form.js?v=0.2" ></script>
		<!-- <script src="../assets/js/firmasPDF.js"></script> -->
		<script src="../assets/js/firma.js?v=3"></script>
		<!-- SweetAlert -->
		<script src="../../../vendor/sweet_alert/sweetalert2.all.min.js"></script>

	</body>
	</html>
<?php } else {

	echo '<script language="javascript">alert("NO ESTAS AUTORIZADO PARA INGRESAR A ESTE MODULO.");</script>';
	echo '<script language="javascript">location.assign("../");</script>';
} ?>