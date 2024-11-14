// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_marca = document.getElementById(
  "formulario_nuevo_marca"
);
const inputs_nuevo = document.querySelectorAll(
  "#formulario_nuevo_marca input"
);
const selects_nuevo = document.querySelectorAll(
  "#formulario_nuevo_marca select"
);

const expresiones_nuevo = {
  txt_nombre_nuevo_marca: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  txt_imagen_nuevo_marca: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_nuevo_marca: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo = {
  txt_nombre_nuevo_marca: false,
  txt_imagen_nuevo_marca: false,
  sel_estado_nuevo_marca: false,
};

const validarFormulario_nuevo_marca = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_nuevo_marca":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_nombre_nuevo_marca,
        e.target,
        e.target.name
      );
      break;
    case "txt_imagen_nuevo_marca":
      validarCampoInput_nuevo(
        expresiones_nuevo.txt_imagen_nuevo_marca,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_nuevo_marca":
      var valor =
        sel_estado_nuevo_marca.options[sel_estado_nuevo_marca.selectedIndex]
          .value;
      validarCampoSelect_nuevo(
        expresiones_nuevo.sel_estado_nuevo_marca,
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
  input.addEventListener("keyup", validarFormulario_nuevo_marca);
  input.addEventListener("blur", validarFormulario_nuevo_marca);
});
selects_nuevo.forEach((select) => {
  select.addEventListener("change", validarFormulario_nuevo_marca);
  select.addEventListener("blur", validarFormulario_nuevo_marca);
});

var txt_nombre_nuevo_marca = document.getElementById(
  "txt_nombre_nuevo_marca"
);
var txt_imagen_nuevo_marca = document.getElementById(
  "txt_imagen_nuevo_marca"
);
var sel_estado_nuevo_marca = document.getElementById(
  "sel_estado_nuevo_marca"
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
function activarMsgCorrecto_nuevo_marca(campo) {
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
    txt_nombre_nuevo_marca.value != "" &&
    txt_nombre_nuevo_marca.value != null
  ) {
    campos_nuevo["txt_nombre_nuevo_marca"] = true;
  } else {
    activarMsgErrors("txt_nombre_nuevo_marca");
  }
  if (
    txt_imagen_nuevo_marca.value != "" &&
    txt_imagen_nuevo_marca.value != null
  ) {
    campos_nuevo["txt_imagen_nuevo_marca"] = true;
  } else {
    activarMsgErrors("txt_imagen_nuevo_marca");
  }
  if (
    sel_estado_nuevo_marca.value != "" &&
    sel_estado_nuevo_marca.value != null
  ) {
    campos_nuevo["sel_estado_nuevo_marca"] = true;
  } else {
    activarMsgErrors("sel_estado_nuevo_marca");
  }
}

formulario_nuevo_marca.addEventListener("submit", (e) => {
  // e.preventDefault();
  revalidacion();
  if (
    campos_nuevo.txt_nombre_nuevo_marca &&
    campos_nuevo.txt_imagen_nuevo_marca &&
    campos_nuevo.sel_estado_nuevo_marca
  ) {
    formulario_nuevo_marca.submit();
  } else {
    // alert(campos_nuevo.txt_nombre_nuevo_marca + " " +
    // campos_nuevo.sel_estado_nuevo_marca );
  }
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR

const formulario_editar_marca = document.getElementById(
  "formulario_editar_marca"
);
const inputs_editar = document.querySelectorAll(
  "#formulario_editar_marca input"
);
const selects_editar = document.querySelectorAll(
  "#formulario_editar_marca select"
);

const expresiones_editar = {
  txt_nombre_editar_marca: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  txt_imagen_editar_marca: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  sel_estado_editar_marca: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_editar = {
  txt_nombre_editar_marca: false,
  txt_imagen_editar_marca: false,
  sel_estado_editar_marca: false,
};

const validarFormulario_editar_marca = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_nombre_editar_marca":
      validarCampoInput_editar(
        expresiones_editar.txt_nombre_editar_marca,
        e.target,
        e.target.name
      );
      break;
    case "txt_imagen_editar_marca":
      validarCampoInput_editar(
        expresiones_editar.txt_imagen_editar_marca,
        e.target,
        e.target.name
      );
      break;
    case "sel_estado_editar_marca":
      var valor =
        sel_estado_editar_marca.options[sel_estado_editar_marca.selectedIndex]
          .value;
      validarCampoSelect_editar(
        expresiones_editar.sel_estado_editar_marca,
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
  input.addEventListener("keyup", validarFormulario_editar_marca);
  input.addEventListener("blur", validarFormulario_editar_marca);
});
selects_editar.forEach((select) => {
  select.addEventListener("change", validarFormulario_editar_marca);
  select.addEventListener("blur", validarFormulario_editar_marca);
});

var txt_nombre_editar_marca = document.getElementById(
  "txt_nombre_editar_marca"
);
var txt_imagen_editar_marca = document.getElementById(
  "txt_imagen_editar_marca"
);
var sel_estado_editar_marca = document.getElementById(
  "sel_estado_editar_marca"
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
function activarMsgCorrecto_editar_marca(campo) {
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
    txt_nombre_editar_marca.value != "" &&
    txt_nombre_editar_marca.value != null
  ) {
    campos_editar["txt_nombre_editar_marca"] = true;
  } else {
    activarMsgErrors("txt_nombre_editar_marca");
  }
  if (
    txt_imagen_editar_marca.value != "" &&
    txt_imagen_editar_marca.value != null
  ) {
    campos_editar["txt_imagen_editar_marca"] = true;
  } else {
    activarMsgErrors("txt_imagen_editar_marca");
  }
  if (
    sel_estado_editar_marca.value != "" &&
    sel_estado_editar_marca.value != null
  ) {
    campos_editar["sel_estado_editar_marca"] = true;
  } else {
    activarMsgErrors("sel_estado_editar_marca");
  }
}

formulario_editar_marca.addEventListener("submit", (e) => {
  // e.preventDefault();
  revalidacion();
  if (
    campos_editar.txt_nombre_editar_marca &&
    campos_editar.txt_imagen_editar_marca &&
    campos_editar.sel_estado_editar_marca
  ) {
    formulario_editar_marca.submit();
  } else {
    // alert(campos_editar.txt_nombre_editar_marca + " " +
    // campos_editar.sel_estado_editar_marca );
  }
});

// TODO MODALES MARCA
// TODO MODALES MARCA
// TODO MODALES MARCA

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR


var cerrar_editar_marca = document.querySelector(".btn_cerrar_editar_marca");
var contenedor_modal_editar_marca = document.querySelector(
  ".contenedor_modal_editar_marca"
);
var modal_editar_marca = document.querySelector(".modal_editar_marca");

function abrir_editar_marca (data){

  $('#txt_marc_id_editar').val(data['MARC_ID']);
  $('#txt_nombre_editar_marca').val(data['MARC_NOMBRE']);
  $("#txt_imagen_editar_marca").val(data['MARC_IMAGEN']);
  $("#img_editar_marca").attr("src", data['MARC_IMAGEN']);
  $("#sel_estado_editar_marca option")
  .removeAttr("selected")
  .filter("[value=" + data['ESTADO_ESTA_ID']+ "]")
  .attr("selected", true);
  bodyScroll_editar_marca();
  contenedor_modal_editar_marca.classList.add("activar_bg_editar_marca");
  modal_editar_marca.classList.toggle("cerrar_modal_editar_marca");
}

cerrar_editar_marca.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_editar_marca();
  modal_editar_marca.classList.toggle("cerrar_modal_editar_marca");
  setTimeout(function () {
    contenedor_modal_editar_marca.classList.remove("activar_bg_editar_marca");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_editar_marca) {
    bodyScroll_editar_marca();
    modal_editar_marca.classList.toggle("cerrar_modal_editar_marca");
    setTimeout(function () {
      contenedor_modal_editar_marca.classList.remove("activar_bg_editar_marca");
    }, 800);
  }
});

function bodyScroll_editar_marca() {
  document.body.classList.toggle("no-scroll_editar_marca");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR


var cerrar_modal_eliminar_marca = document.querySelector(
  ".btn_cerrar_modal_eliminar_marca"
);
var contenedor_modal_eliminar_marca = document.querySelector(
  ".contenedor_modal_eliminar_marca"
);
var modal_eliminar_marca = document.querySelector(".modal_eliminar_marca");

function abrir_modal_eliminar_marca(Marc_id,Marc_Nombre){
  $('#txt_marc_id_eliminar').val(Marc_id);
  $('#text_marc_nombre').text(Marc_Nombre);
  bodyScroll_eliminar_marca();
  contenedor_modal_eliminar_marca.classList.add("activar_bg_eliminar_marca");
  modal_eliminar_marca.classList.toggle("cerrar_modal_eliminar_marca");
}

cerrar_modal_eliminar_marca.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_marca();
  modal_eliminar_marca.classList.toggle("cerrar_modal_eliminar_marca");
  setTimeout(function () {
    contenedor_modal_eliminar_marca.classList.remove(
      "activar_bg_eliminar_marca"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_marca) {
    bodyScroll_eliminar_marca();
    modal_eliminar_marca.classList.toggle("cerrar_modal_eliminar_marca");
    setTimeout(function () {
      contenedor_modal_eliminar_marca.classList.remove(
        "activar_bg_eliminar_marca"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_marca() {
  document.body.classList.toggle("no-scroll_eliminar");
}

// !VALIDAR IMAGEN MODAL NUEVO
// !VALIDAR IMAGEN MODAL NUEVO
// !VALIDAR IMAGEN MODAL NUEVO

const input_file_nuevo = document.querySelector("#input_file_nuevo");
input_file_nuevo.addEventListener("change", function () {
  let text = this.value;
  text = text.replace(/^.*\\/, "");
  document.getElementById("txt_imagen_nuevo_marca").value = text;
  activarMsgCorrecto_nuevo_marca("txt_imagen_nuevo_marca");
  document.getElementById("contenedor_img_nuevo_marca").classList.add("contenedor_img-marca-correcto");
});

// !PREVISUALIZAR IMAGEN NUEVO 
// !PREVISUALIZAR IMAGEN NUEVO 
// !PREVISUALIZAR IMAGEN NUEVO 

let vista_preliminar_nuevo = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img_nuevo_marca");

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
  document.getElementById("txt_imagen_editar_marca").value = text;
  activarMsgCorrecto_editar_marca("txt_imagen_editar_marca");
  document.getElementById("contenedor_img_editar_marca").classList.add("contenedor_img-marca-correcto");
});

// !PREVISUALIZAR IMAGEN EDITAR 
// !PREVISUALIZAR IMAGEN EDITAR 
// !PREVISUALIZAR IMAGEN EDITAR 

let vista_preliminar_editar = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img_editar_marca");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  }
  leer_img.readAsDataURL(event.target.files[0]);
}