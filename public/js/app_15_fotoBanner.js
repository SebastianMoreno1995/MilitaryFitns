// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_fotoBanner = document.getElementById(
  "formulario_nuevo_fotoBanner"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_fotoBanner input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_fotoBanner select"
);

const expresiones_nuevo = {
  txt_nombre_nuevo_fotoBanner: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  txt_imagen_nuevo_fotoBanner: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_nuevo_fotoBanner: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo = {
  txt_nombre_nuevo_fotoBanner: false,
  txt_imagen_nuevo_fotoBanner: false,
  sel_estado_nuevo_fotoBanner: false,
};

const validarFormulario_nuevo_fotoBanner = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_nuevo_fotoBanner":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_nombre_nuevo_fotoBanner,
        e.target,
        e.target.name
      );
      break;
    case "txt_imagen_nuevo_fotoBanner":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_imagen_nuevo_fotoBanner,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_fotoBanner":
      var valor =
        sel_estado_nuevo_fotoBanner.options[sel_estado_nuevo_fotoBanner.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_fotoBanner,
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
  input.addEventListener("keyup", validarFormulario_nuevo_fotoBanner);
  input.addEventListener("blur", validarFormulario_nuevo_fotoBanner);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_fotoBanner);
  select.addEventListener("blur", validarFormulario_nuevo_fotoBanner);
});

var txt_nombre_nuevo_fotoBanner = document.getElementById(
  "txt_nombre_nuevo_fotoBanner"
);
var txt_imagen_nuevo_fotoBanner = document.getElementById(
  "txt_imagen_nuevo_fotoBanner"
);
var sel_estado_nuevo_fotoBanner = document.getElementById(
  "sel_estado_nuevo_fotoBanner"
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
function activarMsgCorrecto_nuevo_fotoBanner(campo) {
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
    txt_nombre_nuevo_fotoBanner.value != "" &&
    txt_nombre_nuevo_fotoBanner.value != null
  ) {
    campos_nuevo["txt_nombre_nuevo_fotoBanner"] = true;
  } else {
    activarMsgErrors("txt_nombre_nuevo_fotoBanner");
  }
  if (
    txt_imagen_nuevo_fotoBanner.value != "" &&
    txt_imagen_nuevo_fotoBanner.value != null
  ) {
    campos_nuevo["txt_imagen_nuevo_fotoBanner"] = true;
  } else {
    activarMsgErrors("txt_imagen_nuevo_fotoBanner");
  }
  if (
    sel_estado_nuevo_fotoBanner.value != "" &&
    sel_estado_nuevo_fotoBanner.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_fotoBanner"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_fotoBanner");
  }
}

formulario_nuevo_fotoBanner.addEventListener("submit", (e) => {
  // e.preventDefault();
  revalidacion();
  if (
    campos_nuevo.txt_nombre_nuevo_fotoBanner &&
    campos_nuevo.txt_imagen_nuevo_fotoBanner &&
    campos_nuevo.sel_estado_nuevo_fotoBanner
  ) {
    formulario_nuevo_fotoBanner.submit();
  } else {
    // alert(campos_nuevo.txt_nombre_nuevo_fotoBanner + " " +
    // campos_nuevo.sel_estado_nuevo_fotoBanner );
  }
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR

const formulario_editar_fotoBanner = document.getElementById(
  "formulario_editar_fotoBanner"
);
const inputs_editar = document.querySelectorAll(
  "#formulario_editar_fotoBanner input"
);
const selects_editar = document.querySelectorAll(
  "#formulario_editar_fotoBanner select"
);

const expresiones_editar = {
  txt_nombre_editar_fotoBanner: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  txt_imagen_editar_fotoBanner: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_editar_fotoBanner: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_editar = {
  txt_nombre_editar_fotoBanner: false,
  txt_imagen_editar_fotoBanner: false,
  sel_estado_editar_fotoBanner: false,
};

const validarFormulario_editar_fotoBanner = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_editar_fotoBanner":
      validarCampoInput_editar(
        expresiones_editar.txt_nombre_editar_fotoBanner,
        e.target,
        e.target.name
      );
      break;
    case "txt_imagen_editar_fotoBanner":
      validarCampoInput_editar(
        expresiones_editar.txt_imagen_editar_fotoBanner,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_editar_fotoBanner":
      var valor =
        sel_estado_editar_fotoBanner.options[sel_estado_editar_fotoBanner.selectedIndex]
          .value;
      validarCampoSelect_editar(
        expresiones_editar.sel_estado_editar_fotoBanner,
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
  input.addEventListener("keyup", validarFormulario_editar_fotoBanner);
  input.addEventListener("blur", validarFormulario_editar_fotoBanner);
});
selects_editar.forEach((select) => {
  select.addEventListener("change", validarFormulario_editar_fotoBanner);
  select.addEventListener("blur", validarFormulario_editar_fotoBanner);
});

var txt_nombre_editar_fotoBanner = document.getElementById(
  "txt_nombre_editar_fotoBanner"
);
var txt_imagen_editar_fotoBanner = document.getElementById(
  "txt_imagen_editar_fotoBanner"
);
var sel_estado_editar_fotoBanner = document.getElementById(
  "sel_estado_editar_fotoBanner"
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

// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - EDITAR 
// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - EDITAR 
function activarMsgCorrecto_editar_fotoBanner(campo) {
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
    txt_nombre_editar_fotoBanner.value != "" &&
    txt_nombre_editar_fotoBanner.value != null
  ) {
    campos_editar["txt_nombre_editar_fotoBanner"] = true;
  } else {
    activarMsgErrors("txt_nombre_editar_fotoBanner");
  }
  if (
    txt_imagen_editar_fotoBanner.value != "" &&
    txt_imagen_editar_fotoBanner.value != null
  ) {
    campos_editar["txt_imagen_editar_fotoBanner"] = true;
  } else {
    activarMsgErrors("txt_imagen_editar_fotoBanner");
  }
  if (
    sel_estado_editar_fotoBanner.value != "" &&
    sel_estado_editar_fotoBanner.value != null
  ) {
    campos_editar["sel_estado_editar_fotoBanner"] = true;
  } else {
    activarMsgErrors("sel_estado_editar_fotoBanner");
  }
}

formulario_editar_fotoBanner.addEventListener("submit", (e) => {
  // e.preventDefault();
  revalidacion();
  if (
    campos_editar.txt_nombre_editar_fotoBanner &&
    campos_editar.txt_imagen_editar_fotoBanner &&
    campos_editar.sel_estado_editar_fotoBanner
  ) {
    formulario_editar_fotoBanner.submit();
  } else {
    // alert(campos_editar.txt_nombre_editar_fotoBanner + " " +
    // campos_editar.sel_estado_editar_fotoBanner );
  }
});

// TODO MODALES FOTOS DEL BANNER
// TODO MODALES FOTOS DEL BANNER
// TODO MODALES FOTOS DEL BANNER

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR


var cerrar_editar_fotoBanner = document.querySelector(".btn_cerrar_editar_fotoBanner");
var contenedor_modal_editar_fotoBanner = document.querySelector(
  ".contenedor_modal_editar_fotoBanner"
);
var modal_editar_fotoBanner = document.querySelector(".modal_editar_fotoBanner");

function abrir_editar_fotoBanner (data){

  $('#txt_fotoBanner_id_editar').val(data['IMAG_ID']);
  $('#txt_nombre_editar_fotoBanner').val(data['IMAG_NOMBRE']);
  $("#txt_imagen_editar_fotoBanner").val(data['IMAG_DIRECCIONIMAGEN']);
  $("#img_editar_fotoBanner").attr("src", data['IMAG_DIRECCIONIMAGEN']);
  $("#sel_estado_editar_fotoBanner option")
  .removeAttr("selected")
  .filter("[value=" + data['ESTADO_ESTA_ID']+ "]")
  .attr("selected", true);
  bodyScroll_editar_fotoBanner();
  contenedor_modal_editar_fotoBanner.classList.add("activar_bg_editar_fotoBanner");
  modal_editar_fotoBanner.classList.toggle("cerrar_modal_editar_fotoBanner");
}

cerrar_editar_fotoBanner.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_editar_fotoBanner();
  modal_editar_fotoBanner.classList.toggle("cerrar_modal_editar_fotoBanner");
  setTimeout(function () {
    contenedor_modal_editar_fotoBanner.classList.remove("activar_bg_editar_fotoBanner");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_editar_fotoBanner) {
    bodyScroll_editar_fotoBanner();
    modal_editar_fotoBanner.classList.toggle("cerrar_modal_editar_fotoBanner");
    setTimeout(function () {
      contenedor_modal_editar_fotoBanner.classList.remove("activar_bg_editar_fotoBanner");
    }, 800);
  }
});

function bodyScroll_editar_fotoBanner() {
  document.body.classList.toggle("no-scroll_editar_fotoBanner");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR


var cerrar_modal_eliminar_fotoBanner = document.querySelector(
  ".btn_cerrar_modal_eliminar_fotoBanner"
);
var contenedor_modal_eliminar_fotoBanner = document.querySelector(
  ".contenedor_modal_eliminar_fotoBanner"
);
var modal_eliminar_fotoBanner = document.querySelector(".modal_eliminar_fotoBanner");

function abrir_modal_eliminar_fotoBanner(IMAG_id,IMAG_Nombre){
  $('#txt_fotoBanner_id_eliminar').val(IMAG_id);
  $('#text_fotoBanner_nombre').text(IMAG_Nombre);
  bodyScroll_eliminar_fotoBanner();
  contenedor_modal_eliminar_fotoBanner.classList.add("activar_bg_eliminar_fotoBanner");
  modal_eliminar_fotoBanner.classList.toggle("cerrar_modal_eliminar_fotoBanner");
}

cerrar_modal_eliminar_fotoBanner.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_fotoBanner();
  modal_eliminar_fotoBanner.classList.toggle("cerrar_modal_eliminar_fotoBanner");
  setTimeout(function () {
    contenedor_modal_eliminar_fotoBanner.classList.remove(
      "activar_bg_eliminar_fotoBanner"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_fotoBanner) {
    bodyScroll_eliminar_fotoBanner();
    modal_eliminar_fotoBanner.classList.toggle("cerrar_modal_eliminar_fotoBanner");
    setTimeout(function () {
      contenedor_modal_eliminar_fotoBanner.classList.remove(
        "activar_bg_eliminar_fotoBanner"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_fotoBanner() {
  document.body.classList.toggle("no-scroll_eliminar");
}

// !VALIDAR IMAGEN MODAL NUEVO
// !VALIDAR IMAGEN MODAL NUEVO
// !VALIDAR IMAGEN MODAL NUEVO

const input_file_nuevo = document.querySelector("#input_file_nuevo");
input_file_nuevo.addEventListener("change", function () {
  let text = this.value;
  text = text.replace(/^.*\\/, "");
  document.getElementById("txt_imagen_nuevo_fotoBanner").value = text;
  activarMsgCorrecto_nuevo_fotoBanner("txt_imagen_nuevo_fotoBanner");
  document.getElementById("contenedor_img_nuevo_fotoBanner").classList.add("contenedor_img-fotoBanner-correcto");
});

// !PREVISUALIZAR IMAGEN NUEVO 
// !PREVISUALIZAR IMAGEN NUEVO 
// !PREVISUALIZAR IMAGEN NUEVO 

let vista_preliminar_nuevo = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img_nuevo_fotoBanner");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  }
  leer_img.readAsDataURL(event.target.files[0]);
}
// !VALIDAR IMAGEN MODAL EDITAR
// !VALIDAR IMAGEN MODAL EDITAR
// !VALIDAR IMAGEN MODAL EDITAR

const input_file_editar = document.querySelector("#input_file_editar");
input_file_editar.addEventListener("change", function () {
  let text = this.value;
  text = text.replace(/^.*\\/, "");
  document.getElementById("txt_imagen_editar_fotoBanner").value = text;
  activarMsgCorrecto_editar_fotoBanner("txt_imagen_editar_fotoBanner");
  document.getElementById("contenedor_img_editar_fotoBanner").classList.add("contenedor_img-fotoBanner-correcto");
});

// !PREVISUALIZAR IMAGEN EDITAR 
// !PREVISUALIZAR IMAGEN EDITAR 
// !PREVISUALIZAR IMAGEN EDITAR 

let vista_preliminar_editar = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img_editar_fotoBanner");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  }
  leer_img.readAsDataURL(event.target.files[0]);
}