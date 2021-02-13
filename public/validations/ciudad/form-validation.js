$("#form").validate({
    errorClass: 'text-danger',
    errorElement: 'small',
    rules:{
        nombre: commonRules
    },
    messages:{
        nombre: "El campo nombre es requerido."
    },
    highlight: highlight,
  unhighlight: unhighlight,
  submitHandler: submitHandler,
  invalidHandler: invalidHandler
});