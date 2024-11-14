// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_objetivo = document.getElementById(
  "formulario_nuevo_objetivo"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_objetivo input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_objetivo select"
);

const expresiones_nuevo = {
  txt_nombre_nuevo_objetivo: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_nuevo_objetivo: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo = {
  txt_nombre_nuevo_objetivo: false,
  sel_estado_nuevo_objetivo: false,
};

const validarFormulario_nuevo_objetivo = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_nuevo_objetivo":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_nombre_nuevo_objetivo,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_objetivo":
      var valor =
        sel_estado_nuevo_objetivo.options[sel_estado_nuevo_objetivo.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_objetivo,
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
  input.addEventListener("keyup", validarFormulario_nuevo_objetivo);
  input.addEventListener("blur", validarFormulario_nuevo_objetivo);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_objetivo);
  select.addEventListener("blur", validarFormulario_nuevo_objetivo);
});

var txt_nombre_nuevo_objetivo = document.getElementById(
  "txt_nombre_nuevo_objetivo"
);
var sel_estado_nuevo_objetivo = document.getElementById(
  "sel_estado_nuevo_objetivo"
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
    txt_nombre_nuevo_objetivo.value != "" &&
    txt_nombre_nuevo_objetivo.value != null
  ) {
    campos_nuevo["txt_nombre_nuevo_objetivo"] = true;
  } else {
    activarMsgErrors("txt_nombre_nuevo_objetivo");
  }
  if (
    sel_estado_nuevo_objetivo.value != "" &&
    sel_estado_nuevo_objetivo.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_objetivo"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_objetivo");
  }
}

formulario_nuevo_objetivo.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_nuevo.txt_nombre_nuevo_objetivo &&
    campos_nuevo.sel_estado_nuevo_objetivo
  ) {
    formulario_nuevo_objetivo.submit();
  } else {
    // alert(campos_nuevo.txt_nombre_nuevo_objetivo + " " +
    // campos_nuevo.sel_estado_nuevo_objetivo );
  }
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR

const formulario_editar_objetivo = document.getElementById(
  "formulario_editar_objetivo"
);
const inputs_editar = document.querySelectorAll(
  "#formulario_editar_objetivo input"
);
const selects_editar = document.querySelectorAll(
  "#formulario_editar_objetivo select"
);

const expresiones_editar = {
  txt_nombre_editar_objetivo: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_editar_objetivo: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_editar = {
  txt_nombre_editar_objetivo: false,
  sel_estado_editar_objetivo: false,
};

const validarFormulario_editar_objetivo = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_editar_objetivo":
      validarCampoInput_editar(
        expresiones_editar.txt_nombre_editar_objetivo,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_editar_objetivo":
      var valor =
        sel_estado_editar_objetivo.options[sel_estado_editar_objetivo.selectedIndex]
          .value;
      validarCampoSelect_editar(
        expresiones_editar.sel_estado_editar_objetivo,
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
  input.addEventListener("keyup", validarFormulario_editar_objetivo);
  input.addEventListener("blur", validarFormulario_editar_objetivo);
});
selects_editar.forEach((select) => {
  select.addEventListener("change", validarFormulario_editar_objetivo);
  select.addEventListener("blur", validarFormulario_editar_objetivo);
});

var txt_nombre_editar_objetivo = document.getElementById(
  "txt_nombre_editar_objetivo"
);
var sel_estado_editar_objetivo = document.getElementById(
  "sel_estado_editar_objetivo"
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
    txt_nombre_editar_objetivo.value != "" &&
    txt_nombre_editar_objetivo.value != null
  ) {
    campos_editar["txt_nombre_editar_objetivo"] = true;
  } else {
    activarMsgErrors("txt_nombre_editar_objetivo");
  }
  if (
    sel_estado_editar_objetivo.value != "" &&
    sel_estado_editar_objetivo.value != null
  ) {
    campos_editar["sel_estado_editar_objetivo"] = true;
  } else {
    activarMsgErrors("sel_estado_editar_objetivo");
  }
}

formulario_editar_objetivo.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion();
  if (
    campos_editar.txt_nombre_editar_objetivo &&
    campos_editar.sel_estado_editar_objetivo
  ) {
    formulario_editar_objetivo.submit();
  } else {
    // alert(campos_editar.txt_nombre_editar_objetivo + " " +
    // campos_editar.sel_estado_editar_objetivo );
  }
});

// TODO MODALES OBJETIVOS
// TODO MODALES OBJETIVOS
// TODO MODALES OBJETIVOS

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR

var cerrar_editar_objetivo = document.querySelector(".btn_cerrar_editar_objetivo");
var contenedor_modal_editar_objetivo = document.querySelector(
  ".contenedor_modal_editar_objetivo"
);
var modal_editar_objetivo = document.querySelector(".modal_editar_objetivo");

function abrir_editar_objetivo(data){
  $('#txt_obje_id_editar').val(data['OBJE_ID']);
  $('#txt_nombre_editar_objetivo').val(data['OBJE_NOMBRE']);
  $("#sel_estado_editar_objetivo option")
  .removeAttr("selected")
  .filter("[value=" + data['ESTADO_ESTA_ID']+ "]")
  .attr("selected", true);

  bodyScroll_editar_objetivo();
  contenedor_modal_editar_objetivo.classList.add("activar_bg_editar_objetivo");
  modal_editar_objetivo.classList.toggle("cerrar_modal_editar_objetivo");

}

cerrar_editar_objetivo.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_editar_objetivo();
  modal_editar_objetivo.classList.toggle("cerrar_modal_editar_objetivo");
  setTimeout(function () {
    contenedor_modal_editar_objetivo.classList.remove("activar_bg_editar_objetivo");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_editar_objetivo) {
    bodyScroll_editar_objetivo();
    modal_editar_objetivo.classList.toggle("cerrar_modal_editar_objetivo");
    setTimeout(function () {
      contenedor_modal_editar_objetivo.classList.remove("activar_bg_editar_objetivo");
    }, 800);
  }
});

function bodyScroll_editar_objetivo() {
  document.body.classList.toggle("no-scroll_editar_objetivo");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var cerrar_modal_eliminar_objetivo = document.querySelector(
  ".btn_cerrar_modal_eliminar_objetivo"
);
var contenedor_modal_eliminar_objetivo = document.querySelector(
  ".contenedor_modal_eliminar_objetivo"
);
var modal_eliminar_objetivo = document.querySelector(".modal_eliminar_objetivo");

function abrir_modal_eliminar_objetivo(data) {
  $('#txt_obje_id_eliminar').val(data['OBJE_ID']);
  $('#text_obje_nombre').text(data['OBJE_NOMBRE']);
  bodyScroll_eliminar_objetivo();
  contenedor_modal_eliminar_objetivo.classList.add("activar_bg_eliminar_objetivo");
  modal_eliminar_objetivo.classList.toggle("cerrar_modal_eliminar_objetivo");
}

cerrar_modal_eliminar_objetivo.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_objetivo();
  modal_eliminar_objetivo.classList.toggle("cerrar_modal_eliminar_objetivo");
  setTimeout(function () {
    contenedor_modal_eliminar_objetivo.classList.remove(
      "activar_bg_eliminar_objetivo"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_objetivo) {
    bodyScroll_eliminar_objetivo();
    modal_eliminar_objetivo.classList.toggle("cerrar_modal_eliminar_objetivo");
    setTimeout(function () {
      contenedor_modal_eliminar_objetivo.classList.remove(
        "activar_bg_eliminar_objetivo"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_objetivo() {
  document.body.classList.toggle("no-scroll_eliminar");
}
