// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_ofertas = document.getElementById(
  "formulario_nuevo_ofertas"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_ofertas input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_ofertas select"
);

const expresiones_nuevo = {
  sel_producto_nuevo_ofertas: /^\d{1,5}$/, // 1 a 5 digitos.
  sel_presentacion_nuevo_ofertas: /^\d{1,5}$/, // 1 a 5 digitos.
  num_descuento_nuevo_ofertas: /^((100(\.0{1,2})?)|(\d{1,2}(\.\d{1,2})?))$/,
  sel_estado_nuevo_ofertas: /^\d{1,3}$/, // 1 a 5 digitos.
  date_fechaInicio_ofertas: /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/, //Formato de fecha
  date_fechaFin_ofertas: /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/, //Formato de fecha
};

const campos_nuevo = {
  sel_producto_nuevo_ofertas: false,
  sel_presentacion_nuevo_ofertas: false,
  num_descuento_nuevo_ofertas: false,
  sel_estado_nuevo_ofertas: false,
  date_fechaInicio_ofertas: false,
  date_fechaFin_ofertas: false,
};

const validarFormulario_nuevo_ofertas = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "sel_producto_nuevo_ofertas":
      var valor =
        sel_producto_nuevo_ofertas.options[sel_producto_nuevo_ofertas.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_producto_nuevo_ofertas,
        e.target,
        e.target.name
      );
      break;
    case "sel_presentacion_nuevo_ofertas":
      var valor =
        sel_presentacion_nuevo_ofertas.options[sel_presentacion_nuevo_ofertas.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_presentacion_nuevo_ofertas,
        e.target,
        e.target.name
      );
      break;
    case "num_descuento_nuevo_ofertas":
      validarCampoInput_nuevo(
        expresiones_nuevo.num_descuento_nuevo_ofertas,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_ofertas":
      var valor =
        sel_estado_nuevo_ofertas.options[sel_estado_nuevo_ofertas.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_ofertas,
        e.target,
        e.target.name
      );
      break;
    case "date_fechaInicio_ofertas":
      validarCampoInput_nuevo(expresiones_nuevo.date_fechaInicio_ofertas, e.target, e.target.name);
      break;
    case "date_fechaFin_ofertas":
      validarCampoInput_nuevo(expresiones_nuevo.date_fechaFin_ofertas, e.target, e.target.name);
      break;
  }
};

const validarCampoInput_nuevo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-incorrecto");
    document.getElementById(`grupo__${campo}`);
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.add("icon-ok-squared");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.remove("icon-cancel-circled2");
    document
      .querySelector(`#error__${campo} .formulario__input-error-abajo`)
      .classList.remove("formulario__input-error-abajo-activo");
    campos_nuevo[campo] = true;
  } else {
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-incorrecto");
    document.getElementById(`grupo__${campo}`);
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.add("icon-cancel-circled2");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.remove("icon-ok-squared");
    document
      .querySelector(`#error__${campo} .formulario__input-error-abajo`)
      .classList.add("formulario__input-error-abajo-activo");
    campos_nuevo[campo] = false;
  }
};
const validarCampoSelect_nuevo = (expresion, select, campo) => {
  if (expresion.test(select.value)) {
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-incorrecto");
    document.getElementById(`grupo__${campo}`);
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.add("icon-ok-squared");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.remove("icon-cancel-circled2");
    document
      .querySelector(`#error__${campo} .formulario__input-error-abajo`)
      .classList.remove("formulario__input-error-abajo-activo");
    campos_nuevo[campo] = true;
  } else {
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-incorrecto");
    document.getElementById(`grupo__${campo}`);
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-correcto");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.add("icon-cancel-circled2");
    document
      .querySelector(`#grupo__${campo} span`)
      .classList.remove("icon-ok-squared");
    document
      .querySelector(`#error__${campo} .formulario__input-error-abajo`)
      .classList.add("formulario__input-error-abajo-activo");
    campos_nuevo[campo] = false;
  }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS SELECTS EN EL FORMULARIO
inputs_nuevo.forEach((input) => {
  input.addEventListener("keyup", validarFormulario_nuevo_ofertas);
  input.addEventListener("blur", validarFormulario_nuevo_ofertas);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_ofertas);
  select.addEventListener("blur", validarFormulario_nuevo_ofertas);
});

var sel_producto_nuevo_ofertas = document.getElementById(
  "sel_producto_nuevo_ofertas"
);
var sel_presentacion_nuevo_ofertas = document.getElementById(
  "sel_presentacion_nuevo_ofertas"
);
var num_descuento_nuevo_ofertas = document.getElementById(
  "num_descuento_nuevo_ofertas"
);
var sel_estado_nuevo_ofertas = document.getElementById(
  "sel_estado_nuevo_ofertas"
);
var date_fechaInicio_ofertas = document.getElementById(
  "date_fechaInicio_ofertas"
);
var date_fechaFin_ofertas = document.getElementById(
  "date_fechaFin_ofertas"
);

function activarMsgErrors(campo) {
  document
    .getElementById(`grupo__${campo}`)
    .classList.add("formulario__grupo-incorrecto");
  document.getElementById(`grupo__${campo}`);
  document
    .getElementById(`grupo__${campo}`)
    .classList.remove("formulario__grupo-correcto");
  document
    .querySelector(`#grupo__${campo} span`)
    .classList.add("icon-cancel-circled2");
  document
    .querySelector(`#grupo__${campo} span`)
    .classList.remove("icon-ok-squared");
  document
    .querySelector(`#error__${campo} .formulario__input-error-abajo`)
    .classList.add("formulario__input-error-abajo-activo");
}

// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - NUEVA 
// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - NUEVA 
function activarMsgCorrecto_nuevo_ofertas(campo) {
  document
    .getElementById(`grupo__${campo}`)
    .classList.remove("formulario__grupo-incorrecto");
  document.getElementById(`grupo__${campo}`);
  document
    .getElementById(`grupo__${campo}`)
    .classList.add("formulario__grupo-correcto");
  document
    .querySelector(`#grupo__${campo} span`)
    .classList.add("icon-ok-squared");
  document
    .querySelector(`#grupo__${campo} span`)
    .classList.remove("icon-cancel-circled2");
  document
    .querySelector(`#error__${campo} .formulario__input-error-abajo`)
    .classList.remove("formulario__input-error-abajo-activo");
}

function revalidacion() {
  if (
    sel_producto_nuevo_ofertas.value != "" &&
    sel_producto_nuevo_ofertas.value != null
  ) {
    campos_nuevo["sel_producto_nuevo_ofertas"] = true;
  } else {
    activarMsgErrors("sel_producto_nuevo_ofertas");
  }
  if (
    sel_presentacion_nuevo_ofertas.value != "" &&
    sel_presentacion_nuevo_ofertas.value != null
  ) {
    campos_nuevo["sel_presentacion_nuevo_ofertas"] = true;
  } else {
    activarMsgErrors("sel_presentacion_nuevo_ofertas");
  }
  if (
    num_descuento_nuevo_ofertas.value != "" &&
    num_descuento_nuevo_ofertas.value != null
  ) {
    campos_nuevo["num_descuento_nuevo_ofertas"] = true;
  } else {
    activarMsgErrors("num_descuento_nuevo_ofertas");
  }
  if (
    sel_estado_nuevo_ofertas.value != "" &&
    sel_estado_nuevo_ofertas.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_ofertas"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_ofertas");
  }
  if (
    date_fechaInicio_ofertas.value != "" &&
    date_fechaInicio_ofertas.value != null
  ) {
    campos_nuevo["date_fechaInicio_ofertas"] = true;
  } else {
    activarMsgErrors("date_fechaInicio_ofertas");
  }
  if (
    date_fechaFin_ofertas.value != "" &&
    date_fechaFin_ofertas.value != null
  ) {
    campos_nuevo["date_fechaFin_ofertas"] = true;
  } else {
    activarMsgErrors("date_fechaFin_ofertas");
  }  
}

formulario_nuevo_ofertas.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_nuevo.sel_producto_nuevo_ofertas &&
    campos_nuevo.sel_presentacion_nuevo_ofertas &&
    campos_nuevo.num_descuento_nuevo_ofertas &&
    campos_nuevo.sel_estado_nuevo_ofertas &&
    campos_nuevo.date_fechaInicio_ofertas &&
    campos_nuevo.date_fechaFin_ofertas
  ) {
    formulario_nuevo_ofertas.submit();
  }
});
