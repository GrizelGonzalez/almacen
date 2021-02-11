var precioRules = {
    ...commonRules,
    max: 9999,
    min: 0,
    number: true
  };

  var stockRules = {
    ...commonRules,
    max: 1000,
    min: 0,
    number: true
  };

  $("#form").validate({
    errorClass: 'text-danger',
    errorElement: 'small',
    rules: {
      nombre: commonRules,
      descripcion: commonRules,
      categoria: commonRules,
      precio: precioRules,
      stock: stockRules
    },
    messages: {
      nombre: "El campo nombre es requerido.",
      descripcion: "El campo descripción es requerido.",
      categoria: "El campo categoría es requerido.",
      precio: {
        required: "El campo precio es requerido.",
        max: "El campo precio no debe ser mayor a $9999.",
        min: "El campo precio no debe ser menor a $0.",
        number: "Por favor ingrese un valor válido."
      },
      stock: {
        required: "El campo stock es requerido.",
        max: "El campo stock no debe ser mayor a 1000 unidades.",
        min: "El campo stock no debe ser menor a 0 unidades.",
        number: "Por favor ingrese un valor válido."
      } 
    },
    highlight: highlight,
    unhighlight: unhighlight,
    submitHandler: submitHandler,
    invalidHandler: invalidHandler
  });