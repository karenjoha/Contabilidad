// Función que valida el formulario antes de enviarlo
function validarFormulario() {
    // Obtiene el input de archivo y el archivo seleccionado
    let archivoInput = document.getElementById("archivo");
    let archivo = archivoInput.files[0];

    // Obtiene la extensión del archivo
    let extension = archivo ? archivo.name.split('.').pop().toLowerCase() : "";

    // Verifica si se ha seleccionado un archivo
    if (!archivo) {
        alert("Carga un archivo para continuar.");
        return false;
    }

    // Verifica si la extensión es CSV
    if (extension !== 'csv') {
        alert("Solo se permiten archivos CSV.");
        return false;
    }

    return true;
}


    // Obtiene el botón de registro
    let registrarBoton = document.getElementById("registrarBoton");

    // Agrega un listener al botón para prevenir el envío del formulario si no pasa la validación
    registrarBoton.addEventListener("click", function(event) {
        if (!validarFormulario()) {
            event.preventDefault(); // Evita que el formulario se envíe si no pasa la validación
        }
    });

