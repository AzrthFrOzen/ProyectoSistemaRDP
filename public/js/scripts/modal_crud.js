window.addEventListener('DOMContentLoaded', () => {
    $('a[is-modal="true"]').on('click', function (e) {
        e.preventDefault();

        $('#contentModal').load(this.href, function () {
            $('#modalGenerico').modal({ keyboard: true }, 'show');
            crud();
        });

        return false;
    });
});

function crud() {
    const form = document.querySelector('#myForm');
    configValidator(form);

    form.addEventListener('submit', (event) => {

        event.preventDefault();
        const formdata = new FormData(form);
        console.log(formdata);

        //VALIDACIÓN DE DATOS
        const errors = validate(form, constraints)

        //console.log(errors);
        if (!errors) {
            //RECUPERACIÓN DE DATOS DE FormData
            const url = form.action;
            console.log(form.action);
            fetch(url, { method: 'POST', body: formdata })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: '¡Bien!',
                            text: data.message,
                            icon: 'success',
                            showConfirmButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar !',
                            timer: 2000
                        }).then(() => {
                            location.href = data.redirection;
                        });
                    }
                    else {
                        new Error('Error al guardar el producto')
                    }
                })
                .catch(error => new Error(error))
        }
        else {
            showErrors(form, errors || {})
        }
    });
}

function remove(e) {
    const action = e.getAttribute('my-action');
    const name = e.getAttribute('my-name');

    Swal.fire({
        title: 'Eliminar',
        text: "¿Estas seguro que deseas eliminar el producto: " + name + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(action)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: data.message,
                            icon: 'success',
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar !',
                            timer: 2000
                        }).then(() => {
                            location.href = data.redirection;
                        })
                    }
                    else {
                        alert('Algo salió mal.')
                    }
                })
        }
    })
}