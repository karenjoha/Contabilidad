//////////////////
// FIRMA INQUILINO
/////////////////
const $canvas = document.querySelector("#canvas"),
	// $btnDescargar = document.querySelector("#btnDescargar"),
	$btnLimpiar = document.querySelector("#btnLimpiar"),
	$btnGuardarFirma = document.querySelector("#btnGuardarFirma");
const contexto = $canvas.getContext("2d");
const COLOR_PINCEL = "black";
const COLOR_FONDO = "white";
const GROSOR = 2;
let xAnterior = 0, yAnterior = 0, xActual = 0, yActual = 0;
const obtenerXReal = (clientX) => clientX - $canvas.getBoundingClientRect().left;
const obtenerYReal = (clientY) => clientY - $canvas.getBoundingClientRect().top;
let haComenzadoDibujo = false; // Bandera que indica si el usuario está presionando el botón del mouse sin soltarlo


const limpiarCanvas = () => {
	// Colocar color blanco en fondo de canvas
	contexto.fillStyle = COLOR_FONDO;
	contexto.fillRect(0, 0, $canvas.width, $canvas.height);
};

limpiarCanvas();
$btnLimpiar.onclick = limpiarCanvas;

// Escuchar clic del botón para descargar el canvas
// $btnDescargar.onclick = () => {
//     const enlace = document.createElement('a');
//     // El título
//     enlace.download = "firma.jpeg";
//     // Convertir la imagen a Base64 y ponerlo en el enlace
//     enlace.href = $canvas.toDataURL('image/jpeg', 1.0);
//     // Hacer click en él
//     enlace.click();
// };

window.obtenerImagen = () => {
	return $canvas.toDataURL('image/jpeg', 1.0);
};


$btnGuardarFirma.onclick = () => {
	let firma_inquilino = document.getElementById('firma_inquilino');
	firma_inquilino.value = $canvas.toDataURL('image/jpeg', 1.0);

	Swal.fire({
		title: 'Firma Inquilino Almacenada',
		html: '<b>Puedes continuar.</b>',
		icon: 'info',
		confirmButtonText: 'Entendido',
		confirmButtonColor: '#3FC3EE',
		customClass: {
			title: 'alertTitle',
			confirmButton: 'btn-sign',
		},
		allowEscapeKey: false,
		allowOutsideClick: false,
	});
};



/////////////////////
//PINTAR EN EL CANVAS DESDE EL PC
/////////////////////


// Lo demás tiene que ver con pintar sobre el canvas en los eventos del mouse
$canvas.addEventListener("mousedown", evento => {
	// En este evento solo se ha iniciado el clic, así que dibujamos un punto
	xAnterior = xActual;
	yAnterior = yActual;
	xActual = obtenerXReal(evento.clientX);
	yActual = obtenerYReal(evento.clientY);
	contexto.beginPath();
	contexto.fillStyle = COLOR_PINCEL;
	contexto.fillRect(xActual, yActual, GROSOR, GROSOR);
	contexto.closePath();
	// Y establecemos la bandera
	haComenzadoDibujo = true;
});



$canvas.addEventListener("mousemove", (evento) => {
	if (!haComenzadoDibujo) {
		return;
	}
	// El mouse se está moviendo y el usuario está presionando el botón, así que dibujamos todo

	xAnterior = xActual;
	yAnterior = yActual;
	xActual = obtenerXReal(evento.clientX);
	yActual = obtenerYReal(evento.clientY);
	contexto.beginPath();
	contexto.moveTo(xAnterior, yAnterior);
	contexto.lineTo(xActual, yActual);
	contexto.strokeStyle = COLOR_PINCEL;
	contexto.lineWidth = GROSOR;
	contexto.stroke();
	contexto.closePath();
});
["mouseup", "mouseout"].forEach(nombreDeEvento => {
	$canvas.addEventListener(nombreDeEvento, () => {
		haComenzadoDibujo = false;
	});
});



/////////////////////
//MOVIL//
//PINTAR EN EL CANVAS
//MOVIL//
/////////////////////


// Lo demás tiene que ver con pintar sobre el canvas en los eventos del mouse
$canvas.addEventListener("touchstart", evento => {
	// En este evento solo se ha iniciado el clic, así que dibujamos un punto
	xAnterior = xActual;
	yAnterior = yActual;
	xActual = obtenerXReal(evento.touches[0].clientX);
	yActual = obtenerYReal(evento.touches[0].clientY);
	contexto.beginPath();
	contexto.fillStyle = COLOR_PINCEL;
	contexto.fillRect(xActual, yActual, GROSOR, GROSOR);
	contexto.closePath();
	// Y establecemos la bandera
	haComenzadoDibujo = true;
});


$canvas.addEventListener("touchmove", (evento) => {
	if (!haComenzadoDibujo) {
		return;
	}
	// El mouse se está moviendo y el usuario está presionando el botón, así que dibujamos todo

	xAnterior = xActual;
	yAnterior = yActual;
	xActual = obtenerXReal(evento.targetTouches[0].clientX);
	yActual = obtenerYReal(evento.targetTouches[0].clientY);
	contexto.beginPath();
	contexto.moveTo(xAnterior, yAnterior);
	contexto.lineTo(xActual, yActual);
	contexto.strokeStyle = COLOR_PINCEL;
	contexto.lineWidth = GROSOR;
	contexto.stroke();
	contexto.closePath();
});
["mouseup", "mouseout"].forEach(nombreDeEvento => {
	$canvas.addEventListener(nombreDeEvento, () => {
		haComenzadoDibujo = false;
	});
});

///////////////////
//FIRMA PROPIETARIO
//////////////////

const $canvas1 = document.querySelector("#canvas1"),
	// $btnDescargar1 = document.querySelector("#btnDescargar1"),
	$btnLimpiar1 = document.querySelector("#btnLimpiar1"),
	$btnGuardarFirma1 = document.querySelector("#btnGuardarFirma1");
const contexto1 = $canvas1.getContext("2d");
const COLOR_PINCEL1 = "black";
const COLOR_FONDO1 = "white";
const GROSOR1 = 2;
let xAnterior1 = 0, yAnterior1 = 0, xActual1 = 0, yActual1 = 0;
const obtenerXReal1 = (clientX) => clientX - $canvas1.getBoundingClientRect().left;
const obtenerYReal1 = (clientY) => clientY - $canvas1.getBoundingClientRect().top;
let haComenzadoDibujo1 = false; // Bandera que indica si el usuario está presionando el botón del mouse sin soltarlo


const limpiarCanvas1 = () => {
	// Colocar color blanco en fondo de canvas
	contexto1.fillStyle = COLOR_FONDO1;
	contexto1.fillRect(0, 0, $canvas1.width, $canvas1.height);
};

limpiarCanvas1();
$btnLimpiar1.onclick = limpiarCanvas1;

// Escuchar clic del botón para descargar el canvas
// $btnDescargar1.onclick = () => {
//     const enlace1 = document.createElement('a');
//     // El título
//     enlace1.download = "firma.jpeg";
//     // Convertir la imagen a Base64 y ponerlo en el enlace
//     enlace1.href = $canvas1.toDataURL('image/jpeg', 1.0);
//     // Hacer click en él
//     enlace1.click();
// };

window.obtenerImagen1 = () => {
	return $canvas1.toDataURL('image/jpeg', 1.0);
};


$btnGuardarFirma1.onclick = () => {
	let firma_propietario = document.getElementById('firma_propietario');
	firma_propietario.value = $canvas1.toDataURL('image/jpeg', 1.0);

	Swal.fire({
		title: 'Firma Propietario Almacenada',
		html: '<b>Puedes continuar.</b>',
		icon: 'info',
		confirmButtonText: 'Entendido',
		confirmButtonColor: '#3FC3EE',
		customClass: {
			title: 'alertTitle',
			confirmButton: 'btn-sign',
		},
		allowEscapeKey: false,
		allowOutsideClick: false,
	});
};



/////////////////////
//PINTAR EN EL CANVAS DESDE EL PC
/////////////////////


// Lo demás tiene que ver con pintar sobre el canvas en los eventos del mouse
$canvas1.addEventListener("mousedown", evento => {
	// En este evento solo se ha iniciado el clic, así que dibujamos un punto
	xAnterior1 = xActual1;
	yAnterior1 = yActual1;
	xActual1 = obtenerXReal1(evento.clientX);
	yActual1 = obtenerYReal1(evento.clientY);
	contexto1.beginPath();
	contexto1.fillStyle = COLOR_PINCEL1;
	contexto1.fillRect(xActual1, yActual1, GROSOR1, GROSOR1);
	contexto1.closePath();
	// Y establecemos la bandera
	haComenzadoDibujo1 = true;
});



$canvas1.addEventListener("mousemove", (evento) => {
	if (!haComenzadoDibujo1) {
		return;
	}
	// El mouse se está moviendo y el usuario está presionando el botón, así que dibujamos todo

	xAnterior1 = xActual1;
	yAnterior1 = yActual1;
	xActual1 = obtenerXReal1(evento.clientX);
	yActual1 = obtenerYReal1(evento.clientY);
	contexto1.beginPath();
	contexto1.moveTo(xAnterior1, yAnterior1);
	contexto1.lineTo(xActual1, yActual1);
	contexto1.strokeStyle = COLOR_PINCEL1;
	contexto1.lineWidth = GROSOR1;
	contexto1.stroke();
	contexto1.closePath();
});
["mouseup", "mouseout"].forEach(nombreDeEvento => {
	$canvas1.addEventListener(nombreDeEvento, () => {
		haComenzadoDibujo1 = false;
	});
});



/////////////////////
//MOVIL//
//PINTAR EN EL CANVAS
//MOVIL//
/////////////////////


// Lo demás tiene que ver con pintar sobre el canvas en los eventos del mouse
$canvas1.addEventListener("touchstart", evento => {
	// En este evento solo se ha iniciado el clic, así que dibujamos un punto
	xAnterior1 = xActual1;
	yAnterior1 = yActual1;
	xActual1 = obtenerXReal1(evento.touches[0].clientX);
	yActual1 = obtenerYReal1(evento.touches[0].clientY);
	contexto1.beginPath();
	contexto1.fillStyle = COLOR_PINCEL1;
	contexto1.fillRect(xActual1, yActual1, GROSOR1, GROSOR1);
	contexto1.closePath();
	// Y establecemos la bandera
	haComenzadoDibujo1 = true;
});


$canvas1.addEventListener("touchmove", (evento) => {
	if (!haComenzadoDibujo1) {
		return;
	}
	// El mouse se está moviendo y el usuario está presionando el botón, así que dibujamos todo

	xAnterior1 = xActual1;
	yAnterior1 = yActual1;
	xActual1 = obtenerXReal1(evento.targetTouches[0].clientX);
	yActual1 = obtenerYReal1(evento.targetTouches[0].clientY);
	contexto1.beginPath();
	contexto1.moveTo(xAnterior1, yAnterior1);
	contexto1.lineTo(xActual1, yActual1);
	contexto1.strokeStyle = COLOR_PINCEL1;
	contexto1.lineWidth = GROSOR1;
	contexto1.stroke();
	contexto1.closePath();
});
["mouseup", "mouseout"].forEach(nombreDeEvento => {
	$canvas1.addEventListener(nombreDeEvento, () => {
		haComenzadoDibujo1 = false;
	});
});

