<?php
require_once 'empleado.entidad.php';
require_once 'empleado.model.php';

// Logica

$emple  = new Empleado();
$modelC = new EmpleadoModel();

if (isset($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'actualizar':
			//INFORMACION DEL EMPLEADO
			$emple->__SET('id_emple', $_REQUEST['id_emple']);
			$emple->__SET('cc_emple', $_REQUEST['cc_emple']);
			$emple->__SET('nom_emple', $_REQUEST['nom_emple']);
			$emple->__SET('fechan_emple', $_REQUEST['fechan_emple']);
			$emple->__SET('rh_emple', $_REQUEST['rh_emple']);
			$emple->__SET('riesgo_emple', $_REQUEST['riesgo_emple']);
			$emple->__SET('cargo_emple', $_REQUEST['cargo_emple']);
			$emple->__SET('celp_emple', $_REQUEST['celp_emple']);
			$emple->__SET('celc_emple', $_REQUEST['celc_emple']);
			$emple->__SET('fechain_emple', $_REQUEST['fechain_emple']);
			$emple->__SET('dira_emple', $_REQUEST['dira_emple']);
			$emple->__SET('barrio_emple', $_REQUEST['barrio_emple']);
			$emple->__SET('cd_emple', $_REQUEST['cd_emple']);
			$emple->__SET('nom_sos_emple', $_REQUEST['nom_sos_emple']);
			$emple->__SET('cel_sos_emple', $_REQUEST['cel_sos_emple']);
			$emple->__SET('par_sos_emple', $_REQUEST['par_sos_emple']);
			$emple->__SET('doc_emple', $_REQUEST['doc_emple']);

			$modelC->Actualizar($emple);
			header('Location: index.php');
			break;

		case 'registrar':
			//INFORMACION DEL EMPLEADO
			$emple->__SET('id_emple', $_REQUEST['id_emple']);
			$emple->__SET('cc_emple', $_REQUEST['cc_emple']);
			$emple->__SET('nom_emple', $_REQUEST['nom_emple']);
			$emple->__SET('fechan_emple', $_REQUEST['fechan_emple']);
			$emple->__SET('rh_emple', $_REQUEST['rh_emple']);
			$emple->__SET('riesgo_emple', $_REQUEST['riesgo_emple']);
			$emple->__SET('cargo_emple', $_REQUEST['cargo_emple']);
			$emple->__SET('celp_emple', $_REQUEST['celp_emple']);
			$emple->__SET('celc_emple', $_REQUEST['celc_emple']);
			$emple->__SET('fechain_emple', $_REQUEST['fechain_emple']);
			$emple->__SET('dira_emple', $_REQUEST['dira_emple']);
			$emple->__SET('barrio_emple', $_REQUEST['barrio_emple']);
			$emple->__SET('cd_emple', $_REQUEST['cd_emple']);
			$emple->__SET('nom_sos_emple', $_REQUEST['nom_sos_emple']);
			$emple->__SET('cel_sos_emple', $_REQUEST['cel_sos_emple']);
			$emple->__SET('par_sos_emple', $_REQUEST['par_sos_emple']);

			(isset($_REQUEST['doc_emple']) ? $emple->__SET('doc_emple', $_REQUEST['doc_emple']) : $emple->__SET('doc_emple', ''));

			$modelC->Registrar($emple);
			header('Location: index.php');
			var_dump($_REQUEST);
			break;

		case 'eliminar':
			$modelC->Eliminar($_REQUEST['id_emple']);
			header('Location: index.php');
			break;

		case 'editar':
			$emple = $modelC->Obtener($_REQUEST['id_emple']);
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="icon" href="../vendor/images/icon.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>EMPLEADOS</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Varela+Round'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<style type="text/css">
		input {
			text-transform: uppercase;

		}

		#lowercasetext {
			text-transform: lowercase;

		}

		#footer {
			position: fixed;
			left: 0px;
			bottom: 0px;
			height: 50px;
			width: 100%;
			background: silver;
		}
	</style>
</head>

<body>


	<i class="fa fa-user fa-2x" aria-hidden="true"></i><label id="show_info-empleado" style="background:silver; font-size:20px; margin-left:12px;">EMPLEADO</label>

	<div class="">
		<div>
			<form action="?action=<?php echo $emple->id_emple > 0 ? 'actualizar' : 'registrar'; ?>" method="post" id="FrmindexSystem" style="margin-bottom:30px;" enctype="multipart/form-data">
				<input type="hidden" name="id_emple" value="<?php echo $emple->__GET('id_emple'); ?>" />
				<div>
					<table class="ui blue table">
						<thead>
							<th><i class="fa fa-user fa-2x" aria-hidden="true"></i></th>
						</thead>
				</div>
				<tr>
					<th style="text-align:left;">Cedula</th>
					<td>
						<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" id="cc_emple" name="cc_emple" placeholder="1010101010" value="<?php echo $emple->__GET('cc_emple'); ?>" style="width:100%;" /></div>
					</td>
					<th style="text-align:left;">Nombre</th>
					<td>
						<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" id="nom_emple" name="nom_emple" placeholder="NOMBRE" value="<?php echo $emple->__GET('nom_emple'); ?>" required style="width:100%;" /></div>
					</td>
					<th style="text-align:left;">Fecha de Nacimiento</th>
					<td>
						<div class="ui input"><input type="date" onkeyup="javascript:this.value=this.value.toUpperCase();" id="fechan_emple" name="fechan_emple" placeholder="" value="<?php echo $emple->__GET('fechan_emple'); ?>" style="width:100%;" /></div>
					</td>
				</tr>
				<tr>

					<th style="text-align:left;">Celular Personal</th>
					<td>
						<div class="ui input"><input type="text" name="celp_emple" placeholder="CELULAR" value="<?php echo $emple->__GET('celp_emple'); ?>" style="width:100%;" /></div>
					</td>

					<th style="text-align:left;">Celular Empresarial</th>
					<td>
						<div class="ui input"><input type="text" name="celc_emple" placeholder="CELULAR" value="<?php echo $emple->__GET('celc_emple'); ?>" style="width:100%;" /></div>
					</td>

					<th style="text-align:left;">Riesgo</th>
					<td>
						<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="riesgo_emple" placeholder="RIESGO" value="<?php echo $emple->__GET('riesgo_emple'); ?>" style="width:100%;" /></div>
					</td>

				</tr>
				<tr>

					<th style="text-align:left;">Tipo de Sangre</th>
					<td>
						<div class="ui input"><select required type="text" class="form-control" id="rh_emple" name="rh_emple" value="<?php echo $emple->__GET('rh_emple'); ?>" style="width:100%;" required="required">
								<option value="<?php echo $emple->__GET('rh_emple'); ?>"><?php echo $emple->__GET('rh_emple'); ?></option>
								<option name="rh_emple" value="A+">A+</option>
								<option name="rh_emple" value="O+">O+</option>
								<option name="rh_emple" value="B+">B+</option>
								<option name="rh_emple" value="AB+">AB+</option>
								<option name="rh_emple" value="A-">A-</option>
								<option name="rh_emple" value="O-">O-</option>
								<option name="rh_emple" value="B-">B-</option>
								<option name="rh_emple" value="AB-">AB-</option>

							</select></div>
					</td>

					<th style="text-align:left;">Cargo</th>
					<td>
						<div class="ui input"><select required type="text" class="form-control" id="cargo_emple" name="cargo_emple" value="<?php echo $emple->__GET('cargo_emple'); ?>" style="width:100%;" required="required">
								<option value="<?php echo $emple->__GET('cargo_emple'); ?>"><?php echo $emple->__GET('cargo_emple'); ?></option>
								<option name="cargo_emple" value="Administradora General">Administradora General</option>
								<option name="cargo_emple" value="Administrador de Sede">Administrador de Sede</option>
								<option name="cargo_emple" value="Auxiliar de Administraciones">Auxiliar de Administraciones</option>
								<option name="cargo_emple" value="Auxiliar de Juridico">Auxiliar de Juridico</option>
								<option name="cargo_emple" value="Auxiliar de Mantenimientos">Auxiliar de Mantenimientos</option>
								<option name="cargo_emple" value="Auxiliar de Talento Humano">Auxiliar de Talento Humano</option>
								<option name="cargo_emple" value="Auxiliar de Servicios Publicos">Auxiliar de Servicios Publicos</option>
								<option name="cargo_emple" value="Asesor de Arrendamientos">Asesor de Arrendamientos</option>
								<option name="cargo_emple" value="Asesor Interno de Arrendamientos">Asesor Interno de Arrendamientos</option>
								<option name="cargo_emple" value="Asesor Externo de Arrendamientos">Asesor Externo de Arrendamientos</option>
								<option name="cargo_emple" value="Asesor de Ventas">Asesor de Ventas</option>
								<option name="cargo_emple" value="Asesor Interno de Ventas">Asesor Interno de Ventas</option>
								<option name="cargo_emple" value="Asesor Externo de Ventas">Asesor Externo de Ventas</option>
								<option name="cargo_emple" value="Asesor de Recibimientos e Inventarios">Asesor de Recibimientos e Inventarios</option>
								<option name="cargo_emple" value="Coordinador de Sede">Coordinador de Sede</option>
								<option name="cargo_emple" value="Coordinador de Arrendamientos">Coordinador de Arrendamientos</option>
								<option name="cargo_emple" value="Coordinador de Mantenimientos">Coordinador de Mantenimientos</option>
								<option name="cargo_emple" value="Coordinador de Recibimientos">Coordinador de Recibimientos</option>
								<option name="cargo_emple" value="Direcctor de Juridico">Direcctor de Juridico</option>
								<option name="cargo_emple" value="Direcctor de Arrendamientos">Direcctor de Arrendamientos</option>
								<option name="cargo_emple" value="Director de Ventas">Director de Ventas</option>
								<option name="cargo_emple" value="Director de TICS">Director de TICS</option>
								<option name="cargo_emple" value="Practicante">Practicante</option>
								<option name="cargo_emple" value="Seguridad y Salud en el Trabajo">Seguridad y Salud en el Trabajo</option>
							</select></div>
					</td>

					<th style="text-align:left;">Fecha de Ingreso</th>
					<td>
						<div class="ui input"><input type="date" onkeyup="javascript:this.value=this.value.toUpperCase();" name="fechain_emple" value="<?php echo $emple->__GET('fechain_emple'); ?>" style="width:100%;" /></div>
					</td>
				</tr>
				<tr>
					<th style="text-align:left;">Dirección</th>
					<td>
						<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="dira_emple" placeholder="" value="<?php echo $emple->__GET('dira_emple'); ?>" style="width:100%;" /></div>
					</td>
					<th style="text-align:left;">Barrio</th>
					<td>
						<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="barrio_emple" placeholder="" value="<?php echo $emple->__GET('barrio_emple'); ?>" style="width:100%;" /></div>
					</td>
					<th style="text-align:left;">Ciudad</th>
					<td>
						<div class="ui input"><select required type="text" class="form-control" id="cd_emple" name="cd_emple" value="<?php echo $emple->__GET('cd_emple'); ?>" style="width:100%;" required="required">
								<option value="<?php echo $emple->__GET('cd_emple'); ?>"><?php echo $emple->__GET('cd_emple'); ?></option>
								<option name="cd_emple" value="BARBOSA">BARBOSA</option>
								<option name="cd_emple" value="BELLO">BELLO</option>
								<option name="cd_emple" value="CALDAS">CALDAS</option>
								<option name="cd_emple" value="COPACABANA">COPACABANA</option>
								<option name="cd_emple" value="ENVIGADO">ENVIGADO</option>
								<option name="cd_emple" value="GIRARDOTA">GIRARDOTA</option>
								<option name="cd_emple" value="ITAGÜI">ITAGÜI</option>
								<option name="cd_emple" value="LA ESTRELLA">LA ESTRELLA</option>
								<option name="cd_emple" value="MEDELLÍN">MEDELLÍN</option>
								<option name="cd_emple" value="SABANETA">SABANETA</option>
							</select></div>
					</td>
				</tr>
				</table>

				<i class="fa fa-users fa-2x" aria-hidden="true"></i> <label id="show_info-pariente" style="background:silver; font-size:20px; margin-left:5px;">PARIENTE</label> <br>
				<div id="info-pariente" style="display:none;">

					<table class="ui yellow table">
						<tr>
							<th style="text-align:left;">Nombre</th>
							<td>
								<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="nom_sos_emple" placeholder="" value="<?php echo $emple->__GET('nom_sos_emple'); ?>" style="width:100%;" /></div>
							</td>
							<th style="text-align:left;">Celular</th>
							<td>
								<div class="ui input"><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="cel_sos_emple" placeholder="" value="<?php echo $emple->__GET('cel_sos_emple'); ?>" style="width:100%;" /></div>
							</td>
							<th style="text-align:left;">Parentesco</th>
							<td>
								<div class="ui input"><select required type="text" class="form-control" id="par_sos_emple" name="par_sos_emple" value="<?php echo $emple->__GET('par_sos_emple'); ?>" style="width:100%;" required="required">
										<option value="<?php echo $emple->__GET('par_sos_emple'); ?>"><?php echo $emple->__GET('par_sos_emple'); ?></option>
										<option name="par_sos_emple" value="ABUELO(A)">ABUELO(A)</option>
										<option name="par_sos_emple" value="PADRE">PADRE</option>
										<option name="par_sos_emple" value="MADRE">MADRE</option>
										<option name="par_sos_emple" value="ESPOSO(A)">ESPOSO(A)</option>
										<option name="par_sos_emple" value="PAREJA">PAREJA</option>
										<option name="par_sos_emple" value="TÍO(A)">TÍO(A)</option>
										<option name="par_sos_emple" value="SUEGRO(A)">SUEGRO(A)</option>
										<option name="par_sos_emple" value="CUÑADO(A)">CUÑADO(A)</option>
										<option name="par_sos_emple" value="HERMANO(A)">HERMANO(A)</option>
										<option name="par_sos_emple" value="HIJO(A)">HIJO(A)</option>
										<option name="par_sos_emple" value="PRIMO(A)">PRIMO(A)</option>
										<option name="par_sos_emple" value="AMIGO(A)">AMIGO(A)</option>
									</select></div>
							</td>
						</tr>
					</table>

				</div>

				<?php if ($_SESSION['rol'] == 1) { ?>
					<i class="fa fa-archive fa-2x" aria-hidden="true"></i> <label id="show_info-anexos" style="background:silver; font-size:20px; margin-left:5px;">ANEXOS</label> <br>
					<div id="info-anexos" style="display:none;">
						<form method="post" action="?action=<?php echo $emple->cc_emple > 0 ? 'actualizar' : 'registrar'; ?>" enctype="multipart/form-data">
							<input type="file" name="doc_emple" id="doc_emple" multiple="">
						</form>

						<?php


						foreach ($_FILES['doc_emple']['tmp_name'] as $key => $tmp_name) {

							if ($_FILES['doc_emple']['name'][$key]) {

								$cc_emple  = $_POST['cc_emple'];
								$doc_emple = $_FILES['doc_emple']['name'][$key];
								$temporal  = $_FILES['doc_emple']['tmp_name'][$key];

								$directorio = "importar_empleados";

								if (!file_exists($directorio)) {
									mkdir($directorio, 0777);
								}

								$dir  = opendir($directorio);
								$ruta = $directorio . '/' . $cc_emple;

								if (move_uploaded_file($temporal, $ruta)) {
									echo " El archivo $filename se ha almacenado correctamente.";
								} else {
									echo "Ha ocurrido un error";
								}

								closedir($dir);
							}
						}



						?>

					</div>

			</div>

		<?php } ?>

		<br><br>

		<div id="footer" align="center">
			<a href="../" class="btn btn-danger btn-lg">
				<span class="glyphicon glyphicon-arrow-left"></span> Atrás
			</a>
			<a href="javascript:;" onclick="document.getElementById('FrmindexSystem').submit()" class="btn btn-primary btn-lg">
				<span class="glyphicon glyphicon-floppy-saved"></span> Grabar Empleado
			</a>


		</div>

		<i class="far fa-trash-alt"></i>

		</form>

	</div>

	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function () {

			$("#show_info-empleado").click(function () {
				$("#info-empleado").toggle();

			});
			$("#show_info-pariente").click(function () {

				$("#info-pariente").toggle();
			});
			$("#show_info-anexos").click(function () {

				$("#info-anexos").toggle();
			});

		});
	</script>
</body>


</html>