// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_banner = document.getElementById(
  "formulario_nuevo_banner"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_banner input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_banner select"
);

const expresiones_nuevo = {
  sel_producto_nuevo_banner: /^\d{1,5}$/, // 1 a 5 digitos.
  sel_presentacion_nuevo_banner: /^\d{1,5}$/, // 1 a 5 digitos.
  sel_estado_nuevo_banner: /^\d{1,3}$/, // 1 a 3 digitos.
  sel_imgDeportiva_nuevo_banner: /^\d{1,5}$/, // 1 a 5 digitos.
};

const campos_nuevo = {
  sel_producto_nuevo_banner: false,
  sel_presentacion_nuevo_banner: false,
  sel_estado_nuevo_banner: false,
  sel_imgDeportiva_nuevo_banner: false,
};

const validarFormulario_nuevo_banner = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "sel_producto_nuevo_banner":
      var valor =
        sel_producto_nuevo_banner.options[sel_producto_nuevo_banner.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_producto_nuevo_banner,
        e.target,
        e.target.name
      );
      break;
    case "sel_presentacion_nuevo_banner":
      var valor =
        sel_presentacion_nuevo_banner.options[sel_presentacion_nuevo_banner.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_presentacion_nuevo_banner,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_banner":
      var valor =
        sel_estado_nuevo_banner.options[sel_estado_nuevo_banner.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_banner,
        e.target,
        e.target.name
      );
      break;
    case "sel_imgDeportiva_nuevo_banner":
      var valor =
        sel_imgDeportiva_nuevo_banner.options[sel_imgDeportiva_nuevo_banner.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_imgDeportiva_nuevo_banner,
        e.target,
        e.target.name
      );
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
  input.addEventListener("keyup", validarFormulario_nuevo_banner);
  input.addEventListener("blur", validarFormulario_nuevo_banner);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_banner);
  select.addEventListener("blur", validarFormulario_nuevo_banner);
});

var sel_producto_nuevo_banner = document.getElementById(
  "sel_producto_nuevo_banner"
);
var sel_presentacion_nuevo_banner = document.getElementById(
  "sel_presentacion_nuevo_banner"
);
var sel_estado_nuevo_banner = document.getElementById(
  "sel_estado_nuevo_banner"
);
var sel_imgDeportiva_nuevo_banner = document.getElementById(
  "sel_imgDeportiva_nuevo_banner"
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
function activarMsgCorrecto_nuevo_banner(campo) {
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
    sel_producto_nuevo_banner.value != "" &&
    sel_producto_nuevo_banner.value != null
  ) {
    campos_nuevo["sel_producto_nuevo_banner"] = true;
  } else {
    activarMsgErrors("sel_producto_nuevo_banner");
  }
  if (
    sel_presentacion_nuevo_banner.value != "" &&
    sel_presentacion_nuevo_banner.value != null
  ) {
    campos_nuevo["sel_presentacion_nuevo_banner"] = true;
  } else {
    activarMsgErrors("sel_presentacion_nuevo_banner");
  }
  if (
    sel_estado_nuevo_banner.value != "" &&
    sel_estado_nuevo_banner.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_banner"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_banner");
  }
  if (
    sel_imgDeportiva_nuevo_banner.value != "" &&
    sel_imgDeportiva_nuevo_banner.value != null
  ) {
    campos_nuevo["sel_imgDeportiva_nuevo_banner"] = true;
  } else {
    activarMsgErrors("sel_imgDeportiva_nuevo_banner");
  }
}

formulario_nuevo_banner.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_nuevo.sel_producto_nuevo_banner &&
    campos_nuevo.sel_presentacion_nuevo_banner &&
    campos_nuevo.sel_estado_nuevo_banner &&
    campos_nuevo.sel_imgDeportiva_nuevo_banner
  ) {
    formulario_nuevo_banner.submit();
  } 
});
