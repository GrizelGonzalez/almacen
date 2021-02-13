var nameRules = {
    ...commonRules,
    lettersonly: true
};

$("#form").validate({
  errorClass: 'text-danger',
  errorElement: 'small',
  rules:{
      nombre: nameRules
  },
  messages:{
      nombre: {
        required: "El campo nombre es requerido.",
        lettersonly: "Este campo solo permite letras."
      } 
  },
  highlight: highlight,
  unhighlight: unhighlight,
  submitHandler: submitHandler,
  invalidHandler: invalidHandler
});