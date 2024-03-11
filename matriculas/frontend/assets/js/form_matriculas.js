let btn_enviar = document.getElementById('btn_enviar');
let nombre_alum = document.getElementById('nombre_alum');
let documento = document.getElementById('documento');
let primer_apellido = document.getElementById('primer_apellido');
let form_matriculas = document.getElementById('form_matriculas');
let segundo_apellido = document.getElementById('segundo_apellido');
let tipo_documento = document.getElementById('tipo_documento');

btn_enviar.addEventListener('click', function(e) {
    e.preventDefault();

    let upperChanger = Array.from(document.querySelectorAll("input[type='text'], textarea"));
    upperChanger.forEach(item => {
        item.value = item.value.toUpperCase();
    });

    if (nombre_alum.value === '') {
        Swal.fire({
            title: 'Ups...',
            icon: 'warning',
            html: '<span style="color:gray;">Debes diligenciar el campo <b>NÚMERO DE FACTURA</b> para continuar.</span>',
            confirmButtonText: 'Entendido',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            customClass: {
                confirmButton: 'confirm-btn',
            }
        });
    }

    // Aquí puedes agregar más validaciones según tus requisitos

    else {
        // DESHABILITAR BOTÓN
        btn_enviar.setAttribute('disabled', 'disabled');
die();
        // ENVÍO DEL FORMULARIO
        setTimeout(() => {
            form_matriculas.submit();
        }, 1000);
    }
});
