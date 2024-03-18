$(".botonF1").on("click", function () {
	$(".btns").toggleClass("animacionVer")
})
// $('.contenedor').mouseleave(function(){
//   $('.btns').toggleClass('animacionVer');
// })

/* //Colocar signo $ y puntos de miles a input prorroga
function formatoMoneda(numero) {
	return new Intl.NumberFormat("es-CO", {
		style: "currency",
		currency: "COP",
		minimumFractionDigits: 0,
	}).format(numero)
}

// Si los input numbers son vacios al cargar la página se coloca 0
$(window).on("load", function () {
	let ceroStart = Array.from(document.querySelectorAll(".input-number"))
	ceroStart.forEach((element) => {
		if (element.value == "") {
			element.value = "0"
		}
	})
}) */

// Obtener todos los elementos con la clase clickable-checkbox
const clickableCheckboxes = document.querySelectorAll(".list-group-item")

clickableCheckboxes.forEach((checkbox) => {
	const checkboxInput = checkbox.querySelector('input[type="checkbox"]')

	checkboxInput.addEventListener("click", (event) => {
		event.stopPropagation()
	})

	const checkboxLabel = checkbox.querySelector("label")

	checkboxLabel.addEventListener("click", (event) => {
		event.preventDefault()
		checkboxInput.checked = !checkboxInput.checked
		event.stopPropagation()
	})

	checkbox.addEventListener("click", () => {
		checkboxInput.checked = !checkboxInput.checked
	})
})

//PLUS AND MINUS
$(".button").on("click", function () {
	var $button = $(this)
	var oldValue = $button.parent().find("input").val()

	if ($button.text() == "+" && oldValue < 15) {
		var newVal = parseFloat(oldValue) + 1
	} else {
		if (oldValue > 0 && $button.text() == "-") {
			var newVal = parseFloat(oldValue) - 1
		} else {
			newVal = 0
		}
	}
	$button.parent().find("input").val(newVal)
})

//Limitar input type number
function MaxLenghtCheck(object) {
	if (object.value.length > 2) {
		//Se crea un nuevo array donde se listan los indices del 0 - 2
		object.value = object.value.slice(0, 2)
	}
	//Evitar valores mayores que 15
	if (object.value > 15) {
		object.value = 0
		alert("El valor máximo es 15")
	}
}

//formatear input type number a solo numeros
$(".input-number").keyup(function () {
	this.value = this.value.replace(/[^0-9]/g, "")
})

//Ocultar toggle
function ocultar_inputs() {
	$("#faltantes-inputs").slideUp()
	$("#llaves-inputs").slideUp()
	$("#locks-inputs").slideUp()
}

//Ocultar toggle al cargar el documento
$(document).ready(ocultar_inputs)

//Mostrar toggle daños_faltantes
$("#toggle-input-faltantes").click(function (e) {
	e.preventDefault() //prevenir nuevos clicks
	$("#faltantes-inputs").slideToggle()
	//Anclaje
	setTimeout(function () {
		$(location).attr("href", "#final-group2")
	}, 300)
})

let form_matricula = document.getElementById("form_matricula")
let botonF2 = document.getElementById("botonF2")
let botonF3 = document.getElementById("botonF3")
//Volver al index
botonF3.addEventListener("click", function (e) {
	e.preventDefault()
	window.location.href = "../index.php"
})

//Enviar formulario
botonF2.addEventListener("click", function (e) {
	e.preventDefault()

	//Cambiar inputs y textarea a mayúscula
	let upperChanger = Array.from(
		document.querySelectorAll("input[type='text']"),
	)
	upperChanger.forEach((cambio) => {
		cambio.value = cambio.value.toUpperCase()
	})
	let upperChangerText = Array.from(document.querySelectorAll("textarea"))
	upperChangerText.forEach((cambio) => {
		cambio.value = cambio.value.toUpperCase()
	})

	// Campos obligatorios
	let documento = document.getElementById("documento")
	let nombre_alum = document.getElementById("nombre_alum")
	let primer_apellido = document.getElementById("primer_apellido")
	let segundo_apellido = document.getElementById("segundo_apellido")
	let celular = document.getElementById("celular")

	if (documento.value == "") {
		Swal.fire({
			icon: "warning",
			title: "Oops...",
			html: 'Debes diligenciar el campo: <span style="color:black;"><b>Documento</b></span> para continuar.',
			confirmButtonText: "Continuar",
			confirmButtonColor: "#e68633b8",
			allowOutsideClick: false,
			customClass: {
				htmlContainer: "container-class",
				icon: "icon-warning",
				title: "title-warning",
				confirmButton: "confirm-button",
			},
		}).then(() => {
			$(".btns").toggleClass("animacionVer")
		})
	} else if (nombre_alum.value != "" && primer_apellido.value == "") {
		Swal.fire({
			icon: "warning",
			title: "Oops...",
			html: 'Debes diligenciar los campos: <span style="color:black;"><b>Nombre del alumno</b></span> para continuar.',
			confirmButtonText: "Continuar",
			confirmButtonColor: "#e68633b8",
			allowOutsideClick: false,
			customClass: {
				htmlContainer: "container-class",
				icon: "icon-warning",
				title: "title-warning",
				confirmButton: "confirm-button",
			},
		}).then(() => {
			$(".btns").toggleClass("animacionVer")
		})
	} else if (primer_apellido.value != "" && celular.value == "") {
		Swal.fire({
			icon: "warning",
			title: "Oops...",
			html: 'Debes diligenciar los campos: <span style="color:black;"><b>Apellido del Alumno</b></span> para continuar.',
			confirmButtonText: "Continuar",
			confirmButtonColor: "#e68633b8",
			allowOutsideClick: false,
			customClass: {
				htmlContainer: "container-class",
				icon: "icon-warning",
				title: "title-warning",
				confirmButton: "confirm-button",
			},
		}).then(() => {
			$(".btns").toggleClass("animacionVer")
		})
	} else {
		botonF2.disabled = true

		if ((botonF2.disabled = true)) {
			form_matricula.submit()
		var_dump(form_matricula);
		} else {
			botonF2.disabled = false
		}
	}
	// form_matriculas.submit();
})
function mostrarSiguientePestana() {
    // Obtener el índice de la pestaña activa
    var indiceActual = $(".nav .btn.active").index();
    var cantidadPestanas = $(".nav .btn").length;

    // Cambiar a la siguiente pestaña
    $(".nav .btn").eq(indiceActual + 1).tab("show");

    // Verificar si la pestaña actual es la última
    if (indiceActual + 1 === cantidadPestanas - 1) {
        $("#botonContinuar").text("Guardar");
    }
}



$(document).ready(function() {
    // Ocultar el botón Anterior en la primera pestaña
    if ($(".nav .btn:first-child").hasClass("active")) {
        $("#botonAnterior").hide();
    }
});

function mostrarPestanaAnterior() {
    // Obtener el índice de la pestaña activa
    var indiceActual = $(".nav .btn.active").index();

    // Cambiar a la pestaña anterior si no estamos en la primera
    if (indiceActual > 0) {
        $(".nav .btn").eq(indiceActual - 1).tab("show");
    }

    // Mostrar el botón "Anterior" si no estamos en la primera pestaña
    if (indiceActual !== 0) {
        $("#botonAnterior").show();
    } else {
        $("#botonAnterior").hide();
    }
}
