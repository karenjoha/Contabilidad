/**
 * toggleCampos - Función para gestionar la limpieza de campos de entrada condicionalmente.
 *
 * @param {Array} blocks - Un array de objetos que representa bloques de elementos de formulario.
 * @param {string} blocks[].country_element - El ID del elemento de país.
 * @param {string} blocks[].department_element - El ID del elemento de departamento.
 * @param {string} blocks[].municipality_element - El ID del elemento de municipio.
 * @returns {void}
 */
export function toggleCampos(blocks) {
	blocks.forEach(function (blockItem) {
	  // Obtener referencias a los elementos del formulario
	  const country_element = document.getElementById(blockItem.country_element);
	  const department_element = document.getElementById(blockItem.department_element);
	  const municipality_element = document.getElementById(blockItem.municipality_element);

	  /**
	   * Función para manejar el cambio en el campo de país.
	   * Limpia los campos de departamento y municipio si el país tiene un valor.
	   */
	  function handleCountryChange() {
		if (country_element.value !== "") {
		  department_element.value = "";
		  municipality_element.value = "";
		}
	  }

	  /**
	   * Función para manejar el cambio en el campo de departamento.
	   * Limpia el campo del país si los campos de departamento y municipio tienen valores.
	   */
	  function handleDepartmentChange() {
		if (department_element.value !== "" && municipality_element.value !== "") {
		  country_element.value = "";
		}
	  }

	  /**
	   * Función para manejar el cambio en el campo de municipio.
	   * Limpia el campo del país si los campos de departamento y municipio tienen valores.
	   */
	  function handleMunicipalityChange() {
		if (department_element.value !== "" && municipality_element.value !== "") {
		  country_element.value = "";
		}
	  }

	  // Agregar oyentes de eventos para los cambios en los campos
	  country_element.addEventListener('change', handleCountryChange);
	  department_element.addEventListener('change', handleDepartmentChange);
	  municipality_element.addEventListener('change', handleMunicipalityChange);

	  // Agregar eventos adicionales para manejar limpiezas independientes
	  department_element.addEventListener('change', function () {
		if (country_element.value !== "") {
		  country_element.value = "";
		}
	  });

	  municipality_element.addEventListener('change', function () {
		if (country_element.value !== "") {
		  country_element.value = "";
		}
	  });
	});
  }
