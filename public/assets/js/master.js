/*common sweet alert code*/
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


/*common validation code*/

var trim = function(value) {
    return $.trim(value);
};

var commonRules = {
    required: true,
    normalizer: trim
};

var highlight = function(element) {
    $(element)
      .closest('.form-group')
      .addClass('has-danger');
};

var unhighlight = function(element) {
    $(element)
      .closest('.form-group')
      .removeClass('has-danger')
      .addClass('has-success');
};

var submitHandler = function(form) {
    $(form).submit();
};

var invalidHandler = function() {
    toast('error', 'Ingrese la información correctamente.');
};

