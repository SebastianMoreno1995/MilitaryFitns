// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_presentacion = document.getElementById(
  "formulario_nuevo_presentacion"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_presentacion input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_presentacion select"
);

const expresiones_nuevo = {
  txt_nombre_nuevo_presentacion: /^[ A-Za-z0-9_@./#&+-\sáéíóúñ]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_nuevo_presentacion: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo = {
  txt_nombre_nuevo_presentacion: false,
  sel_estado_nuevo_presentacion: false,
};

const validarFormulario_nuevo_presentacion = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_nuevo_presentacion":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_nombre_nuevo_presentacion,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_presentacion":
      var valor =
        sel_estado_nuevo_presentacion.options[sel_estado_nuevo_presentacion.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_presentacion,
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
  input.addEventListener("keyup", validarFormulario_nuevo_presentacion);
  input.addEventListener("blur", validarFormulario_nuevo_presentacion);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_presentacion);
  select.addEventListener("blur", validarFormulario_nuevo_presentacion);
});

var txt_nombre_nuevo_presentacion = document.getElementById(
  "txt_nombre_nuevo_presentacion"
);
var sel_estado_nuevo_presentacion = document.getElementById(
  "sel_estado_nuevo_presentacion"
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
    txt_nombre_nuevo_presentacion.value != "" &&
    txt_nombre_nuevo_presentacion.value != null
  ) {
    campos_nuevo["txt_nombre_nuevo_presentacion"] = true;
  } else {
    activarMsgErrors("txt_nombre_nuevo_presentacion");
  }
  if (
    sel_estado_nuevo_presentacion.value != "" &&
    sel_estado_nuevo_presentacion.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_presentacion"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_presentacion");
  }
}

formulario_nuevo_presentacion.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_nuevo.txt_nombre_nuevo_presentacion &&
    campos_nuevo.sel_estado_nuevo_presentacion
  ) {
    formulario_nuevo_presentacion.submit();
  } else {
    // alert(campos_nuevo.txt_nombre_nuevo_presentacion + " " +
    // campos_nuevo.sel_estado_nuevo_presentacion );
  }
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR

const formulario_editar_presentacion = document.getElementById(
  "formulario_editar_presentacion"
);
const inputs_editar = document.querySelectorAll(
  "#formulario_editar_presentacion input"
);
const selects_editar = document.querySelectorAll(
  "#formulario_editar_presentacion select"
);

const expresiones_editar = {
  txt_nombre_editar_presentacion: /^[ A-Za-z0-9_@./#&+-\sáéíóúñ]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_editar_presentacion: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_editar = {
  txt_nombre_editar_presentacion: false,
  sel_estado_editar_presentacion: false,
};

const validarFormulario_editar_presentacion = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_editar_presentacion":
      validarCampoInput_editar(
        expresiones_editar.txt_nombre_editar_presentacion,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_editar_presentacion":
      var valor =
        sel_estado_editar_presentacion.options[sel_estado_editar_presentacion.selectedIndex]
          .value;
      validarCampoSelect_editar(
        expresiones_editar.sel_estado_editar_presentacion,
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
  input.addEventListener("keyup", validarFormulario_editar_presentacion);
  input.addEventListener("blur", validarFormulario_editar_presentacion);
});
selects_editar.forEach((select) => {
  select.addEventListener("change", validarFormulario_editar_presentacion);
  select.addEventListener("blur", validarFormulario_editar_presentacion);
});

var txt_nombre_editar_presentacion = document.getElementById(
  "txt_nombre_editar_presentacion"
);
var sel_estado_editar_presentacion = document.getElementById(
  "sel_estado_editar_presentacion"
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
    txt_nombre_editar_presentacion.value != "" &&
    txt_nombre_editar_presentacion.value != null
  ) {
    campos_editar["txt_nombre_editar_presentacion"] = true;
  } else {
    activarMsgErrors("txt_nombre_editar_presentacion");
  }
  if (
    sel_estado_editar_presentacion.value != "" &&
    sel_estado_editar_presentacion.value != null
  ) {
    campos_editar["sel_estado_editar_presentacion"] = true;
  } else {
    activarMsgErrors("sel_estado_editar_presentacion");
  }
}

formulario_editar_presentacion.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_editar.txt_nombre_editar_presentacion &&
    campos_editar.sel_estado_editar_presentacion
  ) {
    formulario_editar_presentacion.submit();
  } else {
    // alert(campos_editar.txt_nombre_editar_presentacion + " " +
    // campos_editar.sel_estado_editar_presentacion );
  }
});

// TODO MODALES PRESENTACIONES
// TODO MODALES PRESENTACIONES
// TODO MODALES PRESENTACIONES

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR


var cerrar_editar_presentacion = document.querySelector(".btn_cerrar_editar_presentacion");
var contenedor_modal_editar_presentacion = document.querySelector(
  ".contenedor_modal_editar_presentacion"
);
var modal_editar_presentacion = document.querySelector(".modal_editar_presentacion");

function abrir_editar_presentacion(Unme_id,Umne_medida,estado_id){
  $("#txt_pres_id_editar").val(Unme_id);
  $("#txt_nombre_editar_presentacion").val(Umne_medida);
  $("#sel_estado_editar_presentacion option")
  .removeAttr("selected")
  .filter("[value=" +estado_id+ "]")
  .attr("selected", true);
  bodyScroll_editar_presentacion();
  contenedor_modal_editar_presentacion.classList.add("activar_bg_editar_presentacion");
  modal_editar_presentacion.classList.toggle("cerrar_modal_editar_presentacion");
}

cerrar_editar_presentacion.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_editar_presentacion();
  modal_editar_presentacion.classList.toggle("cerrar_modal_editar_presentacion");
  setTimeout(function () {
    contenedor_modal_editar_presentacion.classList.remove("activar_bg_editar_presentacion");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_editar_presentacion) {
    bodyScroll_editar_presentacion();
    modal_editar_presentacion.classList.toggle("cerrar_modal_editar_presentacion");
    setTimeout(function () {
      contenedor_modal_editar_presentacion.classList.remove("activar_bg_editar_presentacion");
    }, 800);
  }
});

function bodyScroll_editar_presentacion() {
  document.body.classList.toggle("no-scroll_editar_presentacion");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var cerrar_modal_eliminar_presentacion = document.querySelector(
  ".btn_cerrar_modal_eliminar_presentacion"
);
var contenedor_modal_eliminar_presentacion = document.querySelector(
  ".contenedor_modal_eliminar_presentacion"
);
var modal_eliminar_presentacion = document.querySelector(".modal_eliminar_presentacion");

function abrir_modal_eliminar_presentacion(Unme_id,Umne_medida){
  $("#txt_pres_id_eliminar").val(Unme_id);
  $("#text_unme_nombre").text(Umne_medida);
  bodyScroll_eliminar_presentacion();
  contenedor_modal_eliminar_presentacion.classList.add("activar_bg_eliminar_presentacion");
  modal_eliminar_presentacion.classList.toggle("cerrar_modal_eliminar_presentacion");
}

cerrar_modal_eliminar_presentacion.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_presentacion();
  modal_eliminar_presentacion.classList.toggle("cerrar_modal_eliminar_presentacion");
  setTimeout(function () {
    contenedor_modal_eliminar_presentacion.classList.remove(
      "activar_bg_eliminar_presentacion"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_presentacion) {
    bodyScroll_eliminar_presentacion();
    modal_eliminar_presentacion.classList.toggle("cerrar_modal_eliminar_presentacion");
    setTimeout(function () {
      contenedor_modal_eliminar_presentacion.classList.remove(
        "activar_bg_eliminar_presentacion"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_presentacion() {
  document.body.classList.toggle("no-scroll_eliminar");
}
