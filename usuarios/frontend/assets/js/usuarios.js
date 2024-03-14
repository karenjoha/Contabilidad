// Obtener referencia al input y a la imagen

const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
	$imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
	// Los archivos seleccionados, pueden ser muchos o uno
	const archivos = $seleccionArchivos.files;
	// Si no hay archivos salimos de la función y quitamos la imagen
	if (!archivos || !archivos.length) {
		$imagenPrevisualizacion.src = "";
		return;
	}
	// Ahora tomamos el primer archivo, el cual vamos a previsualizar
	const primerArchivo = archivos[0];
	// Lo convertimos a un objeto de tipo objectURL
	const objectURL = URL.createObjectURL(primerArchivo);
	// Y a la fuente de la imagen le ponemos el objectURL
	$imagenPrevisualizacion.src = objectURL;
});

//Buttons New & Change User Data
var id_usuario = getQueryVariable('id');

//Obtener #ID de URL
function getQueryVariable(variable) {
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		if (pair[0] == variable) {
			return pair[1];
		}
	}
	return false;
}
// Con el ID hacemos validación para mostrar form
$(window).on('load', () => {
	const valores = window.location.search;
	if (id_usuario > 0) {
		$('.contenedor-forms').addClass('contenedor-forms-active')
		window.scrollTo(0, document.body.scrollHeight);
	} else if (valores.includes('registrar')) {
		window.history.replaceState({}, document.title, "/" + "gestionadministrativa/usuarios/index.php");
		$('.contenedor-forms').addClass('contenedor-forms-active')
		window.scrollTo(0, document.body.scrollHeight);
	}
})

//Nuevo Usuario
$('#add_new_user').on('click', function () {
	if (id_usuario > 0) {
		window.history.replaceState({}, document.title, "/" + "gestionadministrativa/usuarios/frontend/index.php?registrar");
		document.location.reload(true)
	} else {
		$('.contenedor-forms').addClass('contenedor-forms-active')
		window.scrollTo(0, document.body.scrollHeight);
	}
})

// Boton backToTop
$('#btn-back-to-top').on('click', () => {
	contenedor = $('.contenedor-forms')
	window.scrollTo(0, 0);
	contenedor.removeClass('contenedor-forms-active')


})

// Password Class
password = $('#contrasena')
password_confirm = $('#password_confirm')

password.on('blur', password_checker)
password_confirm.on('blur', password_checker)

function password_checker() {

	if (password.val() == password_confirm.val()) {

		password.addClass('right')
		password_confirm.addClass('right')

		password.removeClass('error')
		password_confirm.removeClass('error')

	} else {
		password.addClass('error')
		password_confirm.addClass('error')

		password.removeClass('right')
		password_confirm.removeClass('right')
	}
}


// Captura el evento de envío del formulario
$('#user_form').on('submit', async (event) => {
	// Evita el envío del formulario para manejarlo con JavaScript
	event.preventDefault();

	// Función para verificar si las contraseñas coinciden y no están vacías
	function password_verify() {
		return $('#contrasena').val() == $('#password_confirm').val() && $('#contrasena').val() !== '';
	}

	// Llamado y validación de datos del formulario

	// Verifica la validez y coincidencia de las contraseñas
	const validation = password_verify();

	// Elemento jQuery que representa el campo de usuario en el formulario
	const usuario = $('#usuario');

	// Elemento jQuery que representa el campo de rol en el formulario
	const rol = $('#rol');

	// Verifica si el campo de documento de identidad cumple con el formato esperado (de 8 a 12 dígitos)
	const doc = /^\d{8,12}$/.test($('#doc_identidad').val());

	// Elemento HTML que representa el campo de documento de identidad
	let doc1 = document.getElementById("doc_identidad");

	// Valor predeterminado del campo de documento de identidad antes de cualquier modificación
	let doc_identidad_fijo = doc1.defaultValue;

	// Valor actual del campo de documento de identidad después de posibles modificaciones
	let doc_identidad_current = doc1.value;

	// Elemento jQuery que representa la existencia del campo de identificación en el formulario (actualizar o crear)
	const exist_id = $('#exist_id');


	// Función para mostrar mensajes de error segun sea el caso
	const showError = (message) => {
		Swal.fire({
			icon: 'error',
			title: 'Datos Incorrectos',
			html: message
		});
	};

	// Función para mostrar mensaje de éxito y enviar el formulario después de un retraso
	const showSuccess = () => {
		Swal.fire({
			icon: 'success',
			title: 'Cambios Agregados Correctamente',
			text: 'Serás redireccionado en un momento',
			showConfirmButton: false,
			timerProgressBar: true,
			timer: 2000
		});

		// Espera 2 segundos y luego envía el formulario
		setTimeout(() => {
			$('#user_form').off('submit').submit();
		}, 2000);
	};

	// Validación de campos y presentación de mensajes de error si es necesario
	if (!validation || usuario.val() === '' || rol.val() === '' || !doc) {
		// Agrega la clase de error a los campos incorrectos
		$('#contrasena, #password_confirm, #usuario, #rol, #doc_identidad').addClass('error');
		// Muestra un mensaje de error
		showError('Confirma que los campos <strong>rol</strong>, <strong>usuario</strong>, <strong>documento</strong> y <strong>contraseña</strong> estén completos y correctamente diligenciados, sin caracteres especiales.</strong>');
		// Sale de la función para evitar continuar con el proceso
		return;
	}

	// Pregunta al usuario si está seguro de enviar el formulario confirmResult
	const confirm_result = await Swal.fire({
		icon: 'question',
		title: '¿Estás seguro?',
		text: '¿Deseas continuar con la operación?',
		showCancelButton: true,
		confirmButtonText: 'Si, continuar',
		cancelButtonText: 'Cancelar'
	});

	// exist_id /** actualizar || crear */
	// cedula_old !== cedula_new

	// Si el usuario confirma
	if (confirm_result.isConfirmed) {
		// Realiza una solicitud para validar el número de documento
		const response = await fetch("/gestionadministrativa/usuarios/backend/controladores/usuarios_controlador.php?action=validarDoc", {
			method: "POST",
			body: JSON.stringify({ doc_identidad: $('#doc_identidad').val() }),
			headers: {
				'Content-Type': 'application/json'
			}
		});
		// Si la solicitud no es exitosa, muestra un mensaje de error y sale de la función
		if (!response.ok) {
			showError('Ocurrió un error al procesar la solicitud. Por favor, intenta nuevamente más tarde.');
			return;
		}

		// Lee la respuesta de la solicitud como JSON
		const existed_user = await response.json();

		// caso registrar
		if (!exist_id != '') {
			// Si el número de documento ya está registrado, muestra un mensaje de error, de lo contrario, muestra un mensaje de éxito y envía el formulario
			if (existed_user) {
				showError('El número de documento ingresado ya está registrado. Por favor, verifica e ingresa uno nuevo.');
				return;
			}
			showSuccess();
			return;
		}
		// caso actualizar
		if (doc_identidad_fijo != doc_identidad_current) {
			// Si son diferentes comprueba si existe el doc identidad en la base de datos
			if (existed_user) {
				showError('El número de documento ingresado ya está registrado. Por favor, verifica e ingresa uno nuevo.');
				return;
			}
			showSuccess();
			return;
		}
		// Si son iguales actualiza el registro sin consultar doc identidad en la db
		showSuccess();
		return;

		// si no son diferentes actualiza normal


	}
});


const togglePassword = document.getElementById('password_reveal');
const togglePasswordConfirm = document.getElementById('password_confirm_reveal');

const _password = document.getElementById('contrasena');
const _password_confirm = document.getElementById('password_confirm');

togglePassword.addEventListener("click", function () {
	// toggle the type attribute
	const type = _password.getAttribute("type") === "password" ? "text" : "password";
	_password.setAttribute("type", type);
	// toggle the eye icon
	togglePassword.querySelector('i').classList.toggle('bi-eye-fill')
	togglePassword.querySelector('i').classList.toggle('bi-eye-slash-fill')
});

togglePasswordConfirm.addEventListener("click", function () {
	// toggle the type attribute
	const type = _password_confirm.getAttribute("type") === "password" ? "text" : "password";
	_password_confirm.setAttribute("type", type);
	// toggle the eye icon
	togglePasswordConfirm.querySelector('i').classList.toggle('bi-eye-fill')
	togglePasswordConfirm.querySelector('i').classList.toggle('bi-eye-slash-fill')

});


// Borrar Usuario
$('.tabla-containe').on('click', '.btn-eliminar', function () {
    let idRegistro = $(this).closest('tr').find('td:eq(1)').text().trim();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Atención',
        text: `Estás seguro que deseas eliminar el registro #${idRegistro} ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, Eliminar!',
        cancelButtonText: 'No, Cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            swalWithBootstrapButtons.fire(
                'Eliminado!',
                'Redireccionando...',
                'success',
                Swal.showLoading()
            );

            setTimeout(() => {
                window.location.href = `../frontend/index.php?action=eliminar&id=${idRegistro};`;
            }, 1200);

        } else {
            swalWithBootstrapButtons.fire(
                'Abortado',
                'El proceso se ha interrumpido, eliminación no ejecutada.',
                'error'
            );
        }

    });
});



