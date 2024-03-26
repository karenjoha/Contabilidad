// Añadir a General ->
$(window).on("load", function () {
	// Animate loader off screen
	$(".loader").fadeOut("slow")
	$(".loader_container").fadeOut("slow")
})

// Implementación de seguridad para los filtros avanzados
let input_text = document.querySelectorAll('input[type="text"]')

input_text.forEach(function (e) {
	e.addEventListener("input", function () {
		e.value = e.value.replace(/[^\w\sñÑ]/gi, "")
	})
})

//-Back To Top-//
//Get the button
let mybutto = document.getElementById("btn-back-to-top")

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
	scrollFunction()
}

function scrollFunction() {
	if (
		document.body.scrollTop > 20 ||
		document.documentElement.scrollTop > 20
	) {
		mybutto.style.display = "flex"
	} else {
		mybutto.style.display = "none"
	}
}
// When the user clicks on the button, scroll to the top of the document
mybutto.addEventListener("click", backToTop)

function backToTop() {
	document.body.scrollTop = 0
	document.documentElement.scrollTop = 0
}

// Datatable CONFIG
$(document).ready(function () {
	var table = $("#regTable").DataTable({
		language: {
			decimal: ",",
			thousands: ".",
			info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			infoEmpty:
				"Mostrando registros del 0 al 0 de un total de 0 registros",
			infoPostFix: "",
			infoFiltered: "(filtrado de un total de _MAX_ registros)",
			loadingRecords: "Cargando...",
			lengthMenu: "Mostrar _MENU_ registros",
			paginate: {
				first: "Primero",
				last: "Último",
				next: "Siguiente",
				previous: "Anterior",
			},
			processing: "Procesando...",
			search: "Buscar:",
			searchPlaceholder: "Término de búsqueda",
			zeroRecords: "No se encontraron resultados",
			emptyTable: "Ningún dato disponible en esta tabla",
			aria: {
				sortAscending:
					": Activar para ordenar la columna de manera ascendente",
				sortDescending:
					": Activar para ordenar la columna de manera descendente",
			},
			select: {
				rows: {
					_: "%d filas seleccionadas",
					0: "clic fila para seleccionar",
					1: "una fila seleccionada",
				},
			},
		},
		responsive: true,
		ordering: false,
		lengthMenu: [
			[50, 25, 100, -1],
			[50, 25, 100, "All"],
		],
		dom: '<"top">t',
	})

	$("#regTable tbody").on("click", "tr td:first-child", function () {
		var tr = $(this).closest("tr")
		var row = table.row(tr)

		if (row.child.isShown()) {
			// This row is already open - close it
			row.child.hide()
			tr.removeClass("shown")

			$(this).children()[0].src = "assets/images/svg/plus-circle-fill.svg"
		} else {
			// Open this row
			row.child(format(row.data())).show()
			tr.addClass("shown")

			$(this).children()[0].src =
				"assets/images/svg/slash-circle-fill.svg"
		}
	})
	// Responsive Table
	function format(data) {
		if (data != null || data != undefined) {
			return `
        <div class="responsive-box">
            <div>FECHA CREACIÓN:</div>
            <div>${data[3]}</div>
            <div>${data[7]}</div>
            <div>${data[8]}</div>
        </div>`
		}
	}
})


//Filtrar Columnas a Usuarios
 function FiltrarColumnas() {
 	// const usuarioName = document.getElementById('name-user').textContent
 	const usuarioName = document.querySelector('#nav-gestionadministrativa div div span').textContent
 	const usuarioROL = document.getElementById('rol-user').textContent
 	parseInt(usuarioROL);

 	if (usuarioROL == 1 || usuarioROL == 3 || usuarioName.trim() == 'MANUELA MUÑOZ') {

 	} else {

 		const columnas = Array.from(document.querySelectorAll('tbody tr'));
		columnas.forEach(item => {
 			const usuariosTD = item.children[2].textContent
			if (usuarioName != usuariosTD) {
 				item.style.display = "none";
 			}
 		});
 	};
 }

$(window).on("load", FiltrarColumnas)

// ALERTA BOTÓN ELIMINAR
// Seleccionar todos los elementos con la clase "btnEliminar"
var eliminar = document.getElementsByClassName("btnEliminar");

// Recorrer todos los elementos y agregar un event listener para el clic
Array.from(eliminar).forEach(function (elemento) {
	elemento.addEventListener("click", function () {
		// Seleciona la tabla para coordinar la id del registro en base a elló
		let tableColumns = $(this).parent().parent().prevAll()
		let idRegistro = tableColumns[7].textContent.trim();
		var formDelete = document.getElementById("delete" + idRegistro);
		// Mostrar la alerta de confirmación
		Swal.fire({
			title: "¿Estás seguro?",
			text: `¿Deseas eliminar el registro N°${idRegistro}?"`,
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Sí",
			cancelButtonText: "No",
			reverseButtons: true,
			customClass: {
				popup: 'letra-grande',
			}
		}).then((result) => {
			// Si el usuario hizo clic en "Sí"
			if (result.isConfirmed) {
				// Deshabilitar el botón de eliminar para evitar envíos múltiples
				elemento.disabled = true;

				// Enviar el formulario
				formDelete.submit();
				die();

				// Recargar la página después de 1.2 segundos
				// setTimeout(function () {
				// 	location.reload();
				// }, 1200);
			}
		});
	});
});