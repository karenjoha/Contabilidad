let btn_enviar = document.getElementById('btn_enviar');
let num_factura = document.getElementById('num_factura');
let documento = document.getElementById('documento');
let banco = document.getElementById('banco');
let form_facturas = document.getElementById('form_facturas');
let descripcion = document.getElementById('descripcion');
let empleado_registra = document.getElementById('empleado_registra');

btn_enviar.addEventListener('click', function(e) {
    e.preventDefault();

    let upperChanger = Array.from(document.querySelectorAll("input[type='text'], textarea"));
    upperChanger.forEach(item => {
        item.value = item.value.toUpperCase();
    });

    if (num_factura.value === '') {
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

        // ENVÍO DEL FORMULARIO
        setTimeout(() => {
            form_facturas.submit();
        }, 1000);
    }
});
