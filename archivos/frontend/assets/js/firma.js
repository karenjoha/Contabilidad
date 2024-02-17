/*
		El siguiente codigo en JS Contiene mucho codigo
		de las siguietes 3 fuentes:
		https://stipaltamar.github.io/dibujoCanvas/
		https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
		http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
*/

////////////////////////////////////////////////////////////////////
///////////////////FIRMA QUIEN RECIBE PRESTAMO//////////////////////
////////////////////////////////////////////////////////////////////

const $canvas = document.querySelector("#draw-canvas"),
	$clearBtn = document.getElementById("draw-clearBtn");
const COLOR_FONDO1 = "white";
(function () { // Comenzamos una funcion auto-ejecutable

	// Obtenenemos un intervalo regular(Tiempo) en la pantalla
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimaitonFrame ||
			function (callback) {
				window.setTimeout(callback, 1000 / 60);
				// Retrasa la ejecucion de la funcion para mejorar la experiencia
			};
	})();

	// Traemos el canvas mediante el id del elemento html
	var canvas = document.getElementById("draw-canvas");
	var ctx = canvas.getContext("2d");

	//Darle color al fondo de la firma
	/* ctx.setFillColor = "white";  */

	// Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
	var drawText = document.getElementById("draw-dataUrl");
	var drawImage = document.getElementById("draw-image");
	var submitBtn = document.getElementById("draw-submitBtn");

	/* 	clearBtn.addEventListener("click", function (e) {
			// Definimos que pasa cuando el boton draw-clearBtn es pulsado
			clearCanvas();
			drawImage.setAttribute("src", "");
		}, false); */

	const limpiarCanvas1 = () => {
		// Colocar color blanco en fondo de canvas
		ctx.fillStyle = COLOR_FONDO1;
		ctx.fillRect(0, 0, $canvas.width, $canvas.height);
	};

	limpiarCanvas1();
	$clearBtn.onclick = limpiarCanvas1;


	// Definimos que pasa cuando el boton draw-submitBtn es pulsado
	submitBtn.addEventListener("click", function (e) {
		//console.log('prueba');
		var dataUrl = canvas.toDataURL('image/jpeg', 1.0);
		Swal.fire({
			title: 'Firma Almacenada',
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
		drawText.value = dataUrl;
		drawImage.setAttribute("src", dataUrl);
	}, false);

	/* function Color_Fondo(){
	   let Color = document.getElementById('draw-image');
	   Color.style.backgroundColor = "white";
	} */


	// Activamos MouseEvent para nuestra pagina
	var drawing = false;
	var mousePos = { x: 0, y: 0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		/*
		  Mas alla de solo llamar a una funcion, usamos function (e){...}
		  para mas versatilidad cuando ocurre un evento
		*/
		var tint = document.getElementById("color");
		var punta = document.getElementById("puntero");
		//console.log(e);
		drawing = true;
		lastPos = getMousePos(canvas, e);
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
	}, false);

	// Activamos touchEvent para nuestra pagina
	canvas.addEventListener("touchstart", function (e) {
		mousePos = getTouchPos(canvas, e);
		console.log(mousePos);
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchend", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchleave", function (e) {
		// Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);

	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		console.log(touchEvent);
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			var tint = document.getElementById("color");
			var punta = document.getElementById("puntero");
			ctx.strokeStyle = tint.value;
			ctx.beginPath();
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			//console.log(punta.value);
			ctx.lineWidth = punta.value;
			ctx.stroke();
			ctx.closePath();
			lastPos = mousePos;
		}
	}

	function clearCanvas() {
		canvas.width = canvas.width;
	}

	// Allow for animation
	(function drawLoop() {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();

})();

/* $btnDescargar.onclick = () => {
	const enlace = document.createElement('a');
	// Se define el título
	enlace.download = "firma.jpeg";
	// Convertir la imagen a Base64 y ponerlo en el enlace
	enlace.href = $canvas.toDataURL('image/jpeg', 1.0);
	// Hacer click en él
	enlace.click();
}; */


//Se guarda la imagen
/* $btnGuardarFirma.onclick = () => {
	let firma_inquilino = document.getElementById('firma_inquilino');
	firma_inquilino.value = $canvas.toDataURL('image/jpeg', 1.0);
	alert('Firma Almacenada');
}; */


/* window.obtenerImagen = () => {
	return $canvas.toDataURL('image/jpeg', 1.0);
}; */








/////////////////////////////////////////////////////////////////////////
////////////////FIRMA QUIEN ENTREGA PRESTAMO/////////////////////////////
/////////////////////////////////////////////////////////////////////////


const $canvas1 = document.querySelector("#draw-canvas1"),
	$clearBtn1 = document.getElementById("draw-clearBtn1");
const COLOR_FONDO2 = "white";


(function () { // Comenzamos una funcion auto-ejecutable

	// Obtenenemos un intervalo regular(Tiempo) en la pamtalla
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimaitonFrame ||
			function (callback) {
				window.setTimeout(callback, 1000 / 60);
				// Retrasa la ejecucion de la funcion para mejorar la experiencia de ususario
			};
	})();

	// Traemos el canvas mediante el id del elemento html
	var canvas = document.getElementById("draw-canvas1");
	var ctx = canvas.getContext("2d");


	// Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
	var drawText = document.getElementById("draw-dataUrl1");
	var drawImage = document.getElementById("draw-image1");
	/* var clearBtn = document.getElementById("draw-clearBtn1"); */
	var submitBtn = document.getElementById("draw-submitBtn1");
	/* 	clearBtn.addEventListener("click", function (e) {
			// Definimos que pasa cuando el boton draw-clearBtn es pulsado
			clearCanvas();
			drawImage.setAttribute("src", "");
		}, false); */

	const limpiarCanvas2 = () => {
		// Colocar color blanco en fondo de canvas
		ctx.fillStyle = COLOR_FONDO2;
		ctx.fillRect(0, 0, $canvas1.width, $canvas1.height);
	};

	limpiarCanvas2();
	$clearBtn1.onclick = limpiarCanvas2;

	// Definimos que pasa cuando el boton draw-submitBtn es pulsado
	submitBtn.addEventListener("click", function (e) {
		//console.log('prueba');
		var dataUrl = canvas.toDataURL('image/jpeg', 1.0);
		Swal.fire({
			title: 'Firma Almacenada',
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

		drawText.value = dataUrl;
		drawImage.setAttribute("src", dataUrl);
	}, false);


	// Activamos MouseEvent para nuestra pagina
	var drawing = false;
	var mousePos = { x: 0, y: 0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		/*
		  Mas alla de solo llamar a una funcion, usamos function (e){...}
		  para mas versatilidad cuando ocurre un evento
		*/
		var tint = document.getElementById("color");
		var punta = document.getElementById("puntero");
		//console.log(e);
		drawing = true;
		lastPos = getMousePos(canvas, e);
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
	}, false);

	// Activamos touchEvent para nuestra pagina
	canvas.addEventListener("touchstart", function (e) {
		mousePos = getTouchPos(canvas, e);
		console.log(mousePos);
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchend", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchleave", function (e) {
		// Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);

	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		console.log(touchEvent);
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			var tint = document.getElementById("color");
			var punta = document.getElementById("puntero");
			ctx.strokeStyle = tint.value;
			ctx.beginPath();
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			//console.log(punta.value);
			ctx.lineWidth = punta.value;
			ctx.stroke();
			ctx.closePath();
			lastPos = mousePos;
		}
	}

	function clearCanvas() {
		canvas.width = canvas.width;
	}

	// Allow for animation
	(function drawLoop() {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();

})();

/* $btnGuardarFirma1.onclick = () => {
	let firma_propietario = document.getElementById('firma_propietario');
	firma_propietario.value = $canvas1.toDataURL('image/jpeg', 1.0);
	alert('Firma Almacenada');
};
 */
/* window.obtenerImagen1 = () => {
	return $canvas1.toDataURL('image/jpeg', 1.0);
}; */





///////////////////////////////////////////////////////////////////////////////////
//////////////////////////FRIMA QUIEN ENTREGA DEVOLUCIONES/////////////////////////
///////////////////////////////////////////////////////////////////////////////////

const $canvas2 = document.querySelector("#draw-canvas2"),
	$clearBtn2 = document.getElementById("draw-clearBtn2");
const COLOR_FONDO3 = "white";


(function () { // Comenzamos una funcion auto-ejecutable

	// Obtenenemos un intervalo regular(Tiempo) en la pamtalla
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimaitonFrame ||
			function (callback) {
				window.setTimeout(callback, 1000 / 60);
				// Retrasa la ejecucion de la funcion para mejorar la experiencia de ususario
			};
	})();
	// Traemos el canvas mediante el id del elemento html
	var canvas = document.getElementById("draw-canvas2");
	var ctx = canvas.getContext("2d");


	// Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
	var drawText = document.getElementById("draw-dataUrl2");
	var drawImage = document.getElementById("draw-image2");
	/* var clearBtn = document.getElementById("draw-clearBtn1"); */
	var submitBtn = document.getElementById("draw-submitBtn2");
	/* 	clearBtn.addEventListener("click", function (e) {
			// Definimos que pasa cuando el boton draw-clearBtn es pulsado
			clearCanvas();
			drawImage.setAttribute("src", "");
		}, false); */

	const limpiarCanvas2 = () => {
		// Colocar color blanco en fondo de canvas
		ctx.fillStyle = COLOR_FONDO2;
		ctx.fillRect(0, 0, $canvas2.width, $canvas2.height);
	};

	limpiarCanvas2();
	$clearBtn2.onclick = limpiarCanvas2;

	// Definimos que pasa cuando el boton draw-submitBtn es pulsado
	submitBtn.addEventListener("click", function (e) {
		//console.log('prueba');
		var dataUrl = canvas.toDataURL('image/jpeg', 1.0);
		Swal.fire({
			title: 'Firma Almacenada',
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

		drawText.value = dataUrl;
		drawImage.setAttribute("src", dataUrl);
	}, false);


	// Activamos MouseEvent para nuestra pagina
	var drawing = false;
	var mousePos = { x: 0, y: 0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		/*
		  Mas alla de solo llamar a una funcion, usamos function (e){...}
		  para mas versatilidad cuando ocurre un evento
		*/
		var tint = document.getElementById("color");
		var punta = document.getElementById("puntero");
		//console.log(e);
		drawing = true;
		lastPos = getMousePos(canvas, e);
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
	}, false);

	// Activamos touchEvent para nuestra pagina
	canvas.addEventListener("touchstart", function (e) {
		mousePos = getTouchPos(canvas, e);
		console.log(mousePos);
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchend", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchleave", function (e) {
		// Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);

	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		console.log(touchEvent);
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			var tint = document.getElementById("color");
			var punta = document.getElementById("puntero");
			ctx.strokeStyle = tint.value;
			ctx.beginPath();
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			//console.log(punta.value);
			ctx.lineWidth = punta.value;
			ctx.stroke();
			ctx.closePath();
			lastPos = mousePos;
		}
	}

	function clearCanvas() {
		canvas.width = canvas.width;
	}

	// Allow for animation
	(function drawLoop() {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();

})();






///////////////////////////////////////////////////////////////////////////////////
//////////////////////////FRIMA QUIEN RECIBE DEVOLUCIONES//////////////////////////
///////////////////////////////////////////////////////////////////////////////////

const $canvas3 = document.querySelector("#draw-canvas3"),
	$clearBtn3 = document.getElementById("draw-clearBtn3");
const COLOR_FONDO4 = "white";


(function () { // Comenzamos una funcion auto-ejecutable

	// Obtenenemos un intervalo regular(Tiempo) en la pamtalla
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimaitonFrame ||
			function (callback) {
				window.setTimeout(callback, 1000 / 60);
				// Retrasa la ejecucion de la funcion para mejorar la experiencia de ususario
			};
	})();
	// Traemos el canvas mediante el id del elemento html
	var canvas = document.getElementById("draw-canvas3");
	var ctx = canvas.getContext("2d");


	// Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
	var drawText = document.getElementById("draw-dataUrl3");
	var drawImage = document.getElementById("draw-image3");
	/* var clearBtn = document.getElementById("draw-clearBtn1"); */
	var submitBtn = document.getElementById("draw-submitBtn3");
	/* 	clearBtn.addEventListener("click", function (e) {
			// Definimos que pasa cuando el boton draw-clearBtn es pulsado
			clearCanvas();
			drawImage.setAttribute("src", "");
		}, false); */

	const limpiarCanvas3 = () => {
		// Colocar color blanco en fondo de canvas
		ctx.fillStyle = COLOR_FONDO3;
		ctx.fillRect(0, 0, $canvas3.width, $canvas3.height);
	};

	limpiarCanvas3();
	$clearBtn3.onclick = limpiarCanvas3;

	// Definimos que pasa cuando el boton draw-submitBtn es pulsado
	submitBtn.addEventListener("click", function (e) {
		//console.log('prueba');
		var dataUrl = canvas.toDataURL('image/jpeg', 1.0);
		Swal.fire({
			title: 'Firma Almacenada',
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

		drawText.value = dataUrl;
		drawImage.setAttribute("src", dataUrl);
	}, false);


	// Activamos MouseEvent para nuestra pagina
	var drawing = false;
	var mousePos = { x: 0, y: 0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		/*
		  Mas alla de solo llamar a una funcion, usamos function (e){...}
		  para mas versatilidad cuando ocurre un evento
		*/
		var tint = document.getElementById("color");
		var punta = document.getElementById("puntero");
		//console.log(e);
		drawing = true;
		lastPos = getMousePos(canvas, e);
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
	}, false);

	// Activamos touchEvent para nuestra pagina
	canvas.addEventListener("touchstart", function (e) {
		mousePos = getTouchPos(canvas, e);
		console.log(mousePos);
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchend", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchleave", function (e) {
		// Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		e.preventDefault(); // Prevent scrolling when touching the canvas
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);

	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		console.log(touchEvent);
		/*
		  Devuelve el tamaño de un elemento y su posición relativa respecto
		  a la ventana de visualización (viewport).
		*/
		return {
			x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			var tint = document.getElementById("color");
			var punta = document.getElementById("puntero");
			ctx.strokeStyle = tint.value;
			ctx.beginPath();
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			//console.log(punta.value);
			ctx.lineWidth = punta.value;
			ctx.stroke();
			ctx.closePath();
			lastPos = mousePos;
		}
	}

	function clearCanvas() {
		canvas.width = canvas.width;
	}

	// Allow for animation
	(function drawLoop() {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();

})();
