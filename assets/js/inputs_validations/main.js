// Función para validar solo números
export const validateOnlyNumbers = (event) => {
    const inputText = event.target.value;
    if (!inputText.match(/^\d+$/)) {
        event.target.value = inputText.slice(0, -1);
    }
};

// Función para validar solo letras y espacios
export const validateOnlyLetters = (event) => {
    const inputText = event.target.value;
    if (!inputText.match(/^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s]+$/u)) {
        event.target.value = inputText.slice(0, -1);
    }
};

// Función para validar letras, números y caracteres especiales
export const validateAllCharacters = (event) => {
    const inputText = event.target.value;
    if (!inputText.match(/^[a-zA-ZáéíóúÁÉÍÓÚ0-9\s#()\-_ñÑ]+$/u)) {
        event.target.value = inputText.slice(0, -1);
    }
};
