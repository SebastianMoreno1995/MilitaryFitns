// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACIONES CAMPOS NUEVO PRODUCTO
// !VALIDACIONES CAMPOS NUEVO PRODUCTO
// !VALIDACIONES CAMPOS NUEVO PRODUCTO

const formulario_nuevo_producto = document.getElementById(
  "formulario_nuevo_producto"
);
const inputs_nuevo_producto = document.querySelectorAll(
  "#formulario_nuevo_producto input"
);
const selects_nuevo_producto = document.querySelectorAll(
  "#formulario_nuevo_producto select"
);
const textareas_nuevo_producto = document.querySelectorAll(
  "#formulario_nuevo_producto textarea"
);

const expresiones_nuevo_producto = {
  txt_portada_nuevo_producto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  txt_nutricional_nuevo_producto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo_producto = {
  txt_portada_nuevo_producto: false,
  txt_nutricional_nuevo_producto: false,
};

const validarformulario_nuevo_producto = (e) => {
  // console.log(e.target.name)
  switch (e.target.name) {
    case "txt_portada_nuevo_producto":
      validarCampoInput_nuevo_producto(
        expresiones_nuevo_producto.txt_portada_nuevo_producto,
        e.target,
        e.target.name
      );
      break;
    case "txt_nutricional_nuevo_producto":
      validarCampoInput_nuevo_producto(
        expresiones_nuevo_producto.txt_nutricional_nuevo_producto,
        e.target,
        e.target.name
      );
      break;
  }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_nuevo_producto = (expresion, input, campo) => {
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
    campos_nuevo_producto[campo] = true;
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
    campos_nuevo_producto[campo] = false;
  }
};

// CAPTURA EL EVENTO EN LOS INPUTS EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS EN EL FORMULARIO
inputs_nuevo_producto.forEach((input) => {
  input.addEventListener("keyup", validarformulario_nuevo_producto);
  input.addEventListener("blur", validarformulario_nuevo_producto);
  input.addEventListener("change", validarformulario_nuevo_producto);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_portada_nuevo_producto = document.getElementById(
  "txt_portada_nuevo_producto"
);
var txt_nutricional_nuevo_producto = document.getElementById(
  "txt_nutricional_nuevo_producto"
);

function activarMsgErrors_nuevo_producto(campo) {
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

// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - NUEVO
// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - NUEVO
function activarMsgCorrecto_nuevo_producto(campo) {
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

function revalidacion_nuevo_producto() {
  if (
    txt_portada_nuevo_producto.value != "" &&
    txt_portada_nuevo_producto.value != null
  ) {
    campos_nuevo_producto["txt_portada_nuevo_producto"] = true;
  } else {
    activarMsgErrors_nuevo_producto("txt_portada_nuevo_producto");
  }
  if (
    txt_nutricional_nuevo_producto.value != "" &&
    txt_nutricional_nuevo_producto.value != null
  ) {
    campos_nuevo_producto["txt_nutricional_nuevo_producto"] = true;
  } else {
    activarMsgErrors_nuevo_producto("txt_nutricional_nuevo_producto");
  }
}

// formulario_nuevo_producto.addEventListener("submit", (e) => {
//   e.preventDefault();
//   revalidacion_nuevo_producto();
//   if (
//     // (campos_nuevo_producto.txt_portada_nuevo_producto)
//     (true)
//   ) {
//     formulario_nuevo_producto.submit();
//   }
// });

// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO - PORTADA
// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO - PORTADA
// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO - PORTADA

const input_file_portada_nuevo = document.querySelector("#input_file_portada_nuevo");
input_file_portada_nuevo.addEventListener("change", function () {
  let text = this.value;
  text = text.replace(/^.*\\/, "");
  document.getElementById("txt_portada_nuevo_producto").value = text;
  activarMsgCorrecto_nuevo_producto("txt_portada_nuevo_producto");
  document.getElementById("contenedor_img_portada_nuevo_producto").classList.add("contenedor_img-producto-correcto");
});

// !PREVISUALIZAR IMAGEN NUEVO - PORTADA 
// !PREVISUALIZAR IMAGEN NUEVO - PORTADA 
// !PREVISUALIZAR IMAGEN NUEVO - PORTADA 

let vista_preliminar_nuevo_portada = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img_portada_nuevo_producto");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  }
  leer_img.readAsDataURL(event.target.files[0]);
}

// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO - NUTRICIONAL
// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO - NUTRICIONAL
// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO - NUTRICIONAL

const input_file_nutricional_nuevo = document.querySelector("#input_file_nutricional_nuevo");
input_file_nutricional_nuevo.addEventListener("change", function () {
  let text = this.value;
  text = text.replace(/^.*\\/, "");
  document.getElementById("txt_nutricional_nuevo_producto").value = text;
  activarMsgCorrecto_nuevo_producto("txt_nutricional_nuevo_producto");
  document.getElementById("contenedor_img_nutricional_nuevo_producto").classList.add("contenedor_img-producto-correcto");
});

// !PREVISUALIZAR IMAGEN NUEVO - PORTADA 
// !PREVISUALIZAR IMAGEN NUEVO - PORTADA 
// !PREVISUALIZAR IMAGEN NUEVO - PORTADA 

let vista_preliminar_nuevo_nutricional = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img_nutricional_nuevo_producto");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  }
  leer_img.readAsDataURL(event.target.files[0]);
}

// !MODAL VER FOTOS RELACIONADAS 
// !MODAL VER FOTOS RELACIONADAS
// !MODAL VER FOTOS RELACIONADAS

var cerrar_modal_ver_fotoRelacionada = document.querySelector(".btn_cerrar_modal_ver_fotoRelacionada");
var contenedor_modal_ver_fotoRelacionada = document.querySelector(".contenedor_modal_ver_fotoRelacionada");
var modal_ver_fotoRelacionada = document.querySelector(".modal_ver_fotoRelacionada");

function abrir_modal_ver_fotoRelacionada(data) {
  // $("#FotoPresentacion").attr("src", data["IMAG_DIRECCIONIMAGEN"]);

  document.getElementById('FotoPresentacion').src = data["IMAG_DIRECCIONIMAGEN"];
  bodyScroll_ver_fotoRelacionada();
  contenedor_modal_ver_fotoRelacionada.classList.add("activar_bg_ver_fotoRelacionada");
  modal_ver_fotoRelacionada.classList.toggle("cerrar_modal_ver_fotoRelacionada");
}

cerrar_modal_ver_fotoRelacionada.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_ver_fotoRelacionada();
  modal_ver_fotoRelacionada.classList.toggle("cerrar_modal_ver_fotoRelacionada");
  setTimeout(function () {
    contenedor_modal_ver_fotoRelacionada.classList.remove("activar_bg_ver_fotoRelacionada");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_ver_fotoRelacionada) {
    bodyScroll_ver_fotoRelacionada();
    modal_ver_fotoRelacionada.classList.toggle("cerrar_modal_ver_fotoRelacionada");
    setTimeout(function () {
      contenedor_modal_ver_fotoRelacionada.classList.remove("activar_bg_ver_fotoRelacionada");
    }, 800);
  }
});

function bodyScroll_ver_fotoRelacionada() {
  document.body.classList.toggle("no-scroll_ver_fotoRelacionada");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var cerrar_modal_eliminar_fotoRelacionada = document.querySelector(
  ".btn_cerrar_modal_eliminar_fotoRelacionada"
);
var contenedor_modal_eliminar_fotoRelacionada = document.querySelector(
  ".contenedor_modal_eliminar_fotoRelacionada"
);
var modal_eliminar_fotoRelacionada = document.querySelector(".modal_eliminar_fotoRelacionada");

function abrir_modal_eliminar_fotoRelacionada(data){
  document.getElementById('FotoPresentacionEliminar').src = data["IMAG_DIRECCIONIMAGEN"];
  document.getElementById('txt_img_id_eliminar').value = data["IMAG_ID"];
  bodyScroll_eliminar_fotoRelacionada();
  contenedor_modal_eliminar_fotoRelacionada.classList.add("activar_bg_eliminar_fotoRelacionada");
  modal_eliminar_fotoRelacionada.classList.toggle("cerrar_modal_eliminar_fotoRelacionada");
}

cerrar_modal_eliminar_fotoRelacionada.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_fotoRelacionada();
  modal_eliminar_fotoRelacionada.classList.toggle("cerrar_modal_eliminar_fotoRelacionada");
  setTimeout(function () {
    contenedor_modal_eliminar_fotoRelacionada.classList.remove(
      "activar_bg_eliminar_fotoRelacionada"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_fotoRelacionada) {
    bodyScroll_eliminar_fotoRelacionada();
    modal_eliminar_fotoRelacionada.classList.toggle("cerrar_modal_eliminar_fotoRelacionada");
    setTimeout(function () {
      contenedor_modal_eliminar_fotoRelacionada.classList.remove(
        "activar_bg_eliminar_fotoRelacionada"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_fotoRelacionada() {
  document.body.classList.toggle("no-scroll_eliminar");
}