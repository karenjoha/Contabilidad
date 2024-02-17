
// Función para guardar en localStorage
export function saveToLocalStorage(e) {
	// Verificar si el elemento es de un tipo que queremos almacenar en el 'localStorage'
	const type = e.target.type;
	if (
		type === 'text' ||
		type === 'number' ||
		type === 'select-one' ||
		type === 'date' ||
		type === 'radio' ||
		e.target.nodeName.toLowerCase() === 'textarea'
	) {
		// Almacenar el valor del elemento en el 'localStorage'
		localStorage.setItem(e.target.name, e.target.value);
	}
}

// Función para recuperar del localStorage
export function retrieveLocalStorage() {
	const form = document.querySelector('form');

	// Iterar sobre los elementos del formulario
	Array.from(form.elements).forEach(function (element) {
		const elementType = element.nodeName.toLowerCase();
		const storedValue = localStorage.getItem(element.name);

		// Si hay un valor almacenado, asignarlo al elemento correspondiente
		if (storedValue !== null) {
			if (elementType === 'input') {
				if (element.type === 'radio') {
					element.checked = element.value === storedValue;
				} else {
					element.value = storedValue;
				}
			} else if (elementType === 'select' || elementType === 'textarea') {
				element.value = storedValue;
			}
		}
	});
}
