//BO+oton de ajustes
$('.botonF1').on('click', function () {
	$('.btns').toggleClass('animacionVer');

});


//Ocultar toggle
function ocultar_inputs() {
	$('#firma1').slideUp();
	$('#firma2').slideUp();
	$('#firma3').slideUp();
	$('#firma4').slideUp();
}

//Ocultar toggle al cargar el documento
$(document).ready(ocultar_inputs);

//Mostrar toggle firma entrega prestamo
$('#toggle-firma1').click(function (e) {
	e.preventDefault();     //prevenir nuevos clicks
	$('#firma1').slideToggle();
	//Anclaje
	setTimeout(function () {
		$(location).attr('href', '#firma-1');
	}, 300);
});


//Mostrar toggle firma recibe prestamo
$('#toggle-firma2').click(function (e) {
	e.preventDefault();     //prevenir nuevos clicks
	$('#firma2').slideToggle();
	//Anclaje
	setTimeout(function () {
		$(location).attr('href', '#firma-2');
	}, 300);
});

//Mostrar toggle firma entrega devolucion
$('#toggle-firma3').click(function (e) {
	e.preventDefault();     //prevenir nuevos clicks
	$('#firma3').slideToggle();
	//Anclaje
	setTimeout(function () {
		$(location).attr('href', '#firma-3');
	}, 300);
});


//Mostrar toggle firma recibe devolucion
$('#toggle-firma4').click(function (e) {
	e.preventDefault();     //prevenir nuevos clicks
	$('#firma4').slideToggle();
	//Anclaje
	setTimeout(function () {
		$(location).attr('href', '#firma4');
	}, 300);
});


let form_archivos = document.getElementById('form_archivos');
let botonF2 = document.getElementById('botonF2');
let botonF3 = document.getElementById('botonF3');

//Volver al index
botonF3.addEventListener('click', function (e) {
	e.preventDefault();
	window.location.href = '../index.php';
});

// Campos obligatorios
let canv = document.getElementById('draw-dataUrl');
let canv1 = document.getElementById('draw-dataUrl1');
let responsable_recP = document.getElementById('responsable_recP');
let fecha_prestamo = document.getElementById('fecha_prestamo');
let carpeta = document.getElementById('carpeta');
let contrato = document.getElementById('contrato');
let cd = document.getElementById('cd');
let titValor = document.getElementById('titulo_valor');
let descripcion = document.getElementById('descripcion');

carpeta.addEventListener('click', function () {
	console.log(carpeta.value);
});

//Enviar formulario
botonF2.addEventListener('click', function (e) {
	e.preventDefault();

	//Cambiar inputs y textarea a mayúscula
	let upperChanger = Array.from(document.querySelectorAll("input[type='text']"));
	upperChanger.forEach(cambio => {
		cambio.value = cambio.value.toUpperCase();
	});
	let upperChangerText = Array.from(document.querySelectorAll("textarea"));
	upperChangerText.forEach(cambio => {
		cambio.value = cambio.value.toUpperCase();
	});


	// CONDICIONAL PARA ENVIAR FORMULARIO PRESTAMOS

	if (fecha_prestamo.value != '' && fecha_devolucion.value == '') {
		if (carpeta.checked == '' && contrato.checked == '' && cd.checked == '' && titValor.checked == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>TIPO PRESTAMO</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				},
			});
		}
		else if (descripcion.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>DESCRIPCIÓN</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				},
			});
		}
		else if (canv.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>FIRMA QUIEN ENTREGA</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				},
			});
		}
		else if (responsable_recP.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>RESPONSABLE DE RECIBIR</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				},
			});
		}
		else if (canv1.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>FIRMA QUIEN RECIBE</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				},
			});
		}
		else {
			form_archivos.submit();
		}
	}
});

let fecha_devolucion = document.getElementById('fecha_devolucion');
let botonF1 = document.getElementById('botonF1');
let responsable_entD = document.getElementById('responsable_entD');
let draw_dataUrl2 = document.getElementById('draw-dataUrl2');
let responsable_recD = document.getElementById('responsable_recD');
let draw_dataUrl3 = document.getElementById('draw-dataUrl3')

botonF2.addEventListener('click', function (e) {
	e.preventDefault();

	// CONDICIONAL PARA ENVIAR FORMULARIO DEVOLUCIONES

	if (fecha_devolucion.value != '') {
		if (carpeta.checked == '' && contrato.checked == '' && cd.checked == ''&& titValor.checked == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>TIPO PRESTAMO</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});
		}
		else if (descripcion.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>DESCCRIPCIÓN</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});
		}
		else if (canv.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>FIRMA QUIEN ENTREGA</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});

		}
		else if (canv1.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>FIRMA QUIEN RECIBE</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});

		}
		else if (responsable_recP.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>RESPONSABLE DE RECIBIR</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});

		}
		else if (responsable_entD.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>RESPONSABLE DE ENTREGAR</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});
		}
		else if (draw_dataUrl2.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>FIRMA QUIEN ENTREGA</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});
		}
		else if (responsable_recD.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>RESPONSABLE DE RECIBIR</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});
		}
		else if (draw_dataUrl3.value == '') {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				html: 'Recuerda que debes diligenciar el campo: <span style="color:black;"><b>FIRMA QUIEN RECIBE</b></span> para continuar.',
				confirmButtonText: 'Continuar',
				confirmButtonColor: '#e68633b8',
				allowOutsideClick: false,
				customClass: {
					htmlContainer: 'container-class',
					icon: 'icon-warning',
					title: 'title-warning',
					confirmButton: 'confirm-button',
				}
			});
		}
		else {
			form_archivos.submit();
		}
	}
});


