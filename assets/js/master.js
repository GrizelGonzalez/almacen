const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
})

function toast(icon, title) {
    Toast.fire({
        icon: icon,
        title: title
    })
}

function confirmDelete(url) {
    Swal.fire({
        title: '¿Esta seguro de eliminar el primer elemento de la lista?',
        text: "¡No podra deshacer esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si, eliminalo!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                window.location = url;
            };
        });
}