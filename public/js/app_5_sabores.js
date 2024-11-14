// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_sabor = document.getElementById(
  "formulario_nuevo_sabor"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_sabor input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_sabor select"
);

const expresiones_nuevo = {
  txt_nombre_nuevo_sabor: /^[ A-Za-z0-9_@./#&+-\sáéíóúñ]*$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_nuevo_sabor: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo = {
  txt_nombre_nuevo_sabor: false,
  sel_estado_nuevo_sabor: false,
};

const validarFormulario_nuevo_sabor = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_nuevo_sabor":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_nombre_nuevo_sabor,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_sabor":
      var valor =
        sel_estado_nuevo_sabor.options[sel_estado_nuevo_sabor.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_sabor,
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
  input.addEventListener("keyup", validarFormulario_nuevo_sabor);
  input.addEventListener("blur", validarFormulario_nuevo_sabor);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_sabor);
  select.addEventListener("blur", validarFormulario_nuevo_sabor);
});

var txt_nombre_nuevo_sabor = document.getElementById(
  "txt_nombre_nuevo_sabor"
);
var sel_estado_nuevo_sabor = document.getElementById(
  "sel_estado_nuevo_sabor"
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

function revalidacion() {
  if (
    txt_nombre_nuevo_sabor.value != "" &&
    txt_nombre_nuevo_sabor.value != null
  ) {
    campos_nuevo["txt_nombre_nuevo_sabor"] = true;
  } else {
    activarMsgErrors("txt_nombre_nuevo_sabor");
  }
  if (
    sel_estado_nuevo_sabor.value != "" &&
    sel_estado_nuevo_sabor.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_sabor"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_sabor");
  }
}

formulario_nuevo_sabor.addEventListener("submit", (e) => {
  revalidacion();
  if (
    campos_nuevo.txt_nombre_nuevo_sabor &&
    campos_nuevo.sel_estado_nuevo_sabor
  ) {
    formulario_nuevo_sabor.submit();
  } else {
    // alert(campos_nuevo.txt_nombre_nuevo_sabor + " " +
    // campos_nuevo.sel_estado_nuevo_sabor );
  }
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR

const formulario_editar_sabor = document.getElementById(
  "formulario_editar_sabor"
);
const inputs_editar = document.querySelectorAll(
  "#formulario_editar_sabor input"
);
const selects_editar = document.querySelectorAll(
  "#formulario_editar_sabor select"
);

const expresiones_editar = {
  txt_nombre_editar_sabor: /^[ A-Za-z0-9_@./#&+-\sáéíóúñ]{1,4}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_editar_sabor: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_editar = {
  txt_nombre_editar_sabor: false,
  sel_estado_editar_sabor: false,
};

const validarFormulario_editar_sabor = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_editar_sabor":
      validarCampoInput_editar(
        expresiones_editar.txt_nombre_editar_sabor,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_editar_sabor":
      var valor =
        sel_estado_editar_sabor.options[sel_estado_editar_sabor.selectedIndex]
          .value;
      validarCampoSelect_editar(
        expresiones_editar.sel_estado_editar_sabor,
        e.target,
        e.target.name
      );
      break;
  }
};

const validarCampoInput_editar = (expresion, input, campo) => {
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
    campos_editar[campo] = true;
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
    campos_editar[campo] = false;
  }
};
const validarCampoSelect_editar = (expresion, select, campo) => {
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
    campos_editar[campo] = true;
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
    campos_editar[campo] = false;
  }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS SELECTS EN EL FORMULARIO
inputs_editar.forEach((input) => {
  input.addEventListener("keyup", validarFormulario_editar_sabor);
  input.addEventListener("blur", validarFormulario_editar_sabor);
});
selects_editar.forEach((select) => {
  select.addEventListener("change", validarFormulario_editar_sabor);
  select.addEventListener("blur", validarFormulario_editar_sabor);
});

var txt_nombre_editar_sabor = document.getElementById(
  "txt_nombre_editar_sabor"
);
var sel_estado_editar_sabor = document.getElementById(
  "sel_estado_editar_sabor"
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

function revalidacion() {
  if (
    txt_nombre_editar_sabor.value != "" &&
    txt_nombre_editar_sabor.value != null
  ) {
    campos_editar["txt_nombre_editar_sabor"] = true;
  } else {
    activarMsgErrors("txt_nombre_editar_sabor");
  }
  if (
    sel_estado_editar_sabor.value != "" &&
    sel_estado_editar_sabor.value != null
  ) {
    campos_editar["sel_estado_editar_sabor"] = true;
  } else {
    activarMsgErrors("sel_estado_editar_sabor");
  }
}

formulario_editar_sabor.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_editar.txt_nombre_editar_sabor &&
    campos_editar.sel_estado_editar_sabor
  ) {
    formulario_editar_sabor.submit();
  } else {
    // alert(campos_editar.txt_nombre_editar_sabor + " " +
    // campos_editar.sel_estado_editar_sabor );
  }
});

// TODO MODALES SABORES
// TODO MODALES SABORES
// TODO MODALES SABORES

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR

// var abrir_editar_sabor = document.querySelector(
//   ".btn_abrir_modal_editar_sabor"
// );
var cerrar_editar_sabor = document.querySelector(".btn_cerrar_editar_sabor");
var contenedor_modal_editar_sabor = document.querySelector(
  ".contenedor_modal_editar_sabor"
);
var modal_editar_sabor = document.querySelector(".modal_editar_sabor");

function abrir_editar_sabor(Sabo_id, Sabo_nombre, Sabo_estado_id){
  $('#txt_sabo_id_editar').val(Sabo_id);
  $('#txt_nombre_editar_sabor').val(Sabo_nombre);
  $("#sel_estado_editar_sabor option")
  .removeAttr("selected")
  .filter("[value=" +Sabo_estado_id+ "]")
  .attr("selected", true);
  bodyScroll_editar_sabor();
  contenedor_modal_editar_sabor.classList.add("activar_bg_editar_sabor");
  modal_editar_sabor.classList.toggle("cerrar_modal_editar_sabor");
}

cerrar_editar_sabor.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_editar_sabor();
  modal_editar_sabor.classList.toggle("cerrar_modal_editar_sabor");
  setTimeout(function () {
    contenedor_modal_editar_sabor.classList.remove("activar_bg_editar_sabor");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_editar_sabor) {
    bodyScroll_editar_sabor();
    modal_editar_sabor.classList.toggle("cerrar_modal_editar_sabor");
    setTimeout(function () {
      contenedor_modal_editar_sabor.classList.remove("activar_bg_editar_sabor");
    }, 800);
  }
});

function bodyScroll_editar_sabor() {
  document.body.classList.toggle("no-scroll_editar_sabor");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

// var abrir_modal_eliminar_sabor = document.querySelector(
//   ".btn_abrir_modal_eliminar_sabor"
// );
var cerrar_modal_eliminar_sabor = document.querySelector(
  ".btn_cerrar_modal_eliminar_sabor"
);
var contenedor_modal_eliminar_sabor = document.querySelector(
  ".contenedor_modal_eliminar_sabor"
);
var modal_eliminar_sabor = document.querySelector(".modal_eliminar_sabor");

function abrir_modal_eliminar_sabor(Sabo_id, Sabo_nombre){
  $('#txt_sabo_id_eliminar').val(Sabo_id);
  $('#text_Sabor_Nombre').text(Sabo_nombre);
  bodyScroll_eliminar_sabor();
  contenedor_modal_eliminar_sabor.classList.add("activar_bg_eliminar_sabor");
  modal_eliminar_sabor.classList.toggle("cerrar_modal_eliminar_sabor");
}

cerrar_modal_eliminar_sabor.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_sabor();
  modal_eliminar_sabor.classList.toggle("cerrar_modal_eliminar_sabor");
  setTimeout(function () {
    contenedor_modal_eliminar_sabor.classList.remove(
      "activar_bg_eliminar_sabor"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_sabor) {
    bodyScroll_eliminar_sabor();
    modal_eliminar_sabor.classList.toggle("cerrar_modal_eliminar_sabor");
    setTimeout(function () {
      contenedor_modal_eliminar_sabor.classList.remove(
        "activar_bg_eliminar_sabor"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_sabor() {
  document.body.classList.toggle("no-scroll_eliminar");
}
