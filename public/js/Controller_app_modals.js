// !DESPLEGAR EL MENU DEL ICONO DE HAMBURGUESAS
// !DESPLEGAR EL MENU DEL ICONO DE HAMBURGUESAS
// !DESPLEGAR EL MENU DEL ICONO DE HAMBURGUESAS

const iconMenu = document.getElementById("icon-menu");
const menuDesplegable = document.querySelector("#menuDesplegable");

iconMenu.addEventListener("click", (e) => {
    menuDesplegable.classList.toggle("active");
    document.body.classList.toggle("opacity");
});

// !ICONO HAMBUERGUESA ANIMACION
// !ICONO HAMBUERGUESA ANIMACION
// !ICONO HAMBUERGUESA ANIMACION

const hamburger__button = document.querySelector(".hamburger__button");

hamburger__button.addEventListener("click", (e) => {
    hamburger__button.classList.toggle("open");
});

// !MOSTRAR SUBCATEGORIAS
// !MOSTRAR SUBCATEGORIAS
// !MOSTRAR SUBCATEGORIAS

let listElements = document.querySelectorAll(".list_btn--clik");

listElements.forEach((listElement) => {
    listElement.addEventListener("click", () => {
        listElement.classList.toggle("arrow");
        let height = 0;
        let menu = listElement.nextElementSibling;
        if (menu.clientHeight == "0") {
            height = menu.scrollHeight;
        }
        menu.style.height = `${height}px`;
    });
});

function listElement() {
    listElements.forEach((listElement) => {
        listElement.classList.toggle("arrow");
        let height = 0;
        let menu = listElement.nextElementSibling;
        if (menu.clientHeight == "0") {
            height = menu.scrollHeight;
        }
        menu.style.height = `${height}px`;
    });
}

// !POPUP NOTIFICACIONES
// !POPUP NOTIFICACIONES
// !POPUP NOTIFICACIONES

var abrir_popup_notificaciones = document.querySelector(
    ".btn_abrir_popup_notificaciones"
);
var cerrar_popup_notificaciones = document.querySelector(
    ".btn_cerrar_popup_notificaciones"
);
var contenedor_popup_notificaciones = document.querySelector(
    ".contenedor_popup_notificaciones"
);
var popup_notificaciones = document.querySelector(".popup_notificaciones");

abrir_popup_notificaciones.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_notificaciones();
    contenedor_popup_notificaciones.classList.add("activar_bg_notificaciones");
    popup_notificaciones.classList.toggle("cerrar_popup_notificaciones");
});

cerrar_popup_notificaciones.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_notificaciones();
    popup_notificaciones.classList.toggle("cerrar_popup_notificaciones");
    setTimeout(function () {
        contenedor_popup_notificaciones.classList.remove(
            "activar_bg_notificaciones"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_popup_notificaciones) {
        bodyScroll_notificaciones();
        popup_notificaciones.classList.toggle("cerrar_popup_notificaciones");
        setTimeout(function () {
            contenedor_popup_notificaciones.classList.remove(
                "activar_bg_notificaciones"
            );
        }, 800);
    }
});

function bodyScroll_notificaciones() {
    document.body.classList.toggle("no-scroll_notificaciones");
}

// !POPUP USUARIOS OPCIONES
// !POPUP USUARIOS OPCIONES
// !POPUP USUARIOS OPCIONES

var abrir_popup_usuario = document.querySelector(".btn_abrir_popup_usuario");
var cerrar_popup_usuario = document.querySelector(".btn_cerrar_popup_usuario");
var contenedor_popup_usuario = document.querySelector(
    ".contenedor_popup_usuario"
);
var popup_usuario = document.querySelector(".popup_usuario");

abrir_popup_usuario.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_usuario();
    contenedor_popup_usuario.classList.add("activar_bg_usuario");
    popup_usuario.classList.toggle("cerrar_popup_usuario");
});

cerrar_popup_usuario.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_usuario();
    popup_usuario.classList.toggle("cerrar_popup_usuario");
    setTimeout(function () {
        contenedor_popup_usuario.classList.remove("activar_bg_usuario");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_popup_usuario) {
        bodyScroll_usuario();
        popup_usuario.classList.toggle("cerrar_popup_usuario");
        setTimeout(function () {
            contenedor_popup_usuario.classList.remove("activar_bg_usuario");
        }, 800);
    }
});

function bodyScroll_usuario() {
    document.body.classList.toggle("no-scroll_usuario");
}

// !MODAL CAMBIAR AVATAR
// !MODAL CAMBIAR AVATAR
// !MODAL CAMBIAR AVATAR

var abrir_avatar = document.querySelector(".btn_abrir_modal_avatar");
var cerrar_avatar = document.querySelector(".btn_cerrar_avatar");
var contenedor_modal_avatar = document.querySelector(
    ".contenedor_modal_avatar"
);
var modal_avatar = document.querySelector(".modal_avatar");

abrir_avatar.addEventListener("click", function (e) {
    e.preventDefault();
    // bodyScroll_avatar();
    contenedor_modal_avatar.classList.add("activar_bg_avatar");
    modal_avatar.classList.toggle("cerrar_modal_avatar");
});

cerrar_avatar.addEventListener("click", function (e) {
    e.preventDefault();
    // bodyScroll_avatar();
    modal_avatar.classList.toggle("cerrar_modal_avatar");
    setTimeout(function () {
        contenedor_modal_avatar.classList.remove("activar_bg_avatar");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_avatar) {
        // bodyScroll_avatar();
        modal_avatar.classList.toggle("cerrar_modal_avatar");
        setTimeout(function () {
            contenedor_modal_avatar.classList.remove("activar_bg_avatar");
        }, 800);
    }
});

// !VALIDACIONES CAMPOS AVATAR
// !VALIDACIONES CAMPOS AVATAR
// !VALIDACIONES CAMPOS AVATAR

const formulario_nuevo_avatar = document.getElementById(
    "formulario_nuevo_avatar"
);
const inputs_nuevo_avatar = document.querySelectorAll(
    "#formulario_nuevo_avatar input"
);

const expresiones_nuevo_avatar = {
    txt_imagen_nuevo_avatar: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
};

const campos_nuevo_avatar = {
    txt_imagen_nuevo_avatar: false,
};

const validarformulario_nuevo_avatar = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_imagen_nuevo_avatar":
            validarCampoInput_nuevo_avatar(
                expresiones_nuevo_avatar.txt_imagen_nuevo_avatar,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_nuevo_avatar = (expresion, input, campo) => {
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
        campos_nuevo_avatar[campo] = true;
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
        campos_nuevo_avatar[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
inputs_nuevo_avatar.forEach((input) => {
    input.addEventListener("keyup", validarformulario_nuevo_avatar);
    input.addEventListener("blur", validarformulario_nuevo_avatar);
    input.addEventListener("change", validarformulario_nuevo_avatar);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_imagen_nuevo_avatar = document.getElementById(
    "txt_imagen_nuevo_avatar"
);

function activarMsgErrors_nuevo_avatar(campo) {
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
function activarMsgCorrecto_nuevo_avatar(campo) {
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

function revalidacion_nuevo_avatar() {
    if (
        txt_imagen_nuevo_avatar.value != "" &&
        txt_imagen_nuevo_avatar.value != null
    ) {
        campos_nuevo_avatar["txt_imagen_nuevo_avatar"] = true;
    } else {
        activarMsgErrors_nuevo_avatar("txt_imagen_nuevo_avatar");
    }
}

formulario_nuevo_avatar.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_nuevo_avatar();
    if (campos_nuevo_avatar.txt_imagen_nuevo_avatar) {
        formulario_nuevo_avatar.submit();
    }
});

// !VALIDAR INPUT DE TEXTO DE IMAGEN AVATAR
// !VALIDAR INPUT DE TEXTO DE IMAGEN AVATAR
// !VALIDAR INPUT DE TEXTO DE IMAGEN AVATAR

const input_file_nuevo_avatar = document.querySelector("#input_file_nuevo_avatar");
input_file_nuevo_avatar.addEventListener("change", function () {
    let text = this.value;
    text = text.replace(/^.*\\/, "");
    document.getElementById("txt_imagen_nuevo_avatar").value = text;
    activarMsgCorrecto_nuevo_avatar("txt_imagen_nuevo_avatar");
});

// !PREVISUALIZAR IMAGEN AVATAR 
// !PREVISUALIZAR IMAGEN AVATAR 
// !PREVISUALIZAR IMAGEN AVATAR 

let vista_preliminar_nuevo_avatar = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById("img_nuevo_avatar");

    leer_img.onload = () => {
        if (leer_img.readyState == 2) {
            id_img.src = leer_img.result;
        }
    }
    leer_img.readAsDataURL(event.target.files[0]);
}

// !POPUP EXITOSO
// !POPUP EXITOSO
// !POPUP EXITOSO

var abrir_popup_exito = document.querySelector(".btn_abrir_popup_exito");
var cerrar_popup_exito = document.querySelector(".btn_cerrar_popup_exito");
var contenedor_popup_exito = document.querySelector(".contenedor_popup_exito");
var popup_exito = document.querySelector(".popup_exito");

var AbrirModal = document.getElementById("messageExito");
if (AbrirModal != null) {
    if (
        AbrirModal.value != "" &&
        AbrirModal.value != null &&
        AbrirModal.value != " "
    ) {
        AutoModalExito();
    }
}

function AutoModalExito() {
    bodyScroll_exito();
    contenedor_popup_exito.classList.add("activar_bg_exito");
    popup_exito.classList.toggle("cerrar_popup_exito");
}

abrir_popup_exito.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_exito();
    contenedor_popup_exito.classList.add("activar_bg_exito");
    popup_exito.classList.toggle("cerrar_popup_exito");
});

cerrar_popup_exito.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_exito();
    popup_exito.classList.toggle("cerrar_popup_exito");
    setTimeout(function () {
        contenedor_popup_exito.classList.remove("activar_bg_exito");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_popup_exito) {
        bodyScroll_exito();
        popup_exito.classList.toggle("cerrar_popup_exito");
        setTimeout(function () {
            contenedor_popup_exito.classList.remove("activar_bg_exito");
        }, 800);
    }
});

function bodyScroll_exito() {
    document.body.classList.toggle("no-scroll_exito");
}

// !POPUP ERROR DE USUARIO
// !POPUP ERROR DE USUARIO
// !POPUP ERROR DE USUARIO

var abrir_popup_error = document.querySelector(".btn_abrir_popup_error");
var cerrar_popup_error = document.querySelector(".btn_cerrar_popup_error");
var contenedor_popup_error = document.querySelector(".contenedor_popup_error");
var popup_error = document.querySelector(".popup_error");

var AbrirModalErrorUsu = document.getElementById("messageErrorUsu");
if (AbrirModalErrorUsu != null) {
    if (
        AbrirModalErrorUsu.value != "" &&
        AbrirModalErrorUsu.value != null &&
        AbrirModalErrorUsu.value != " "
    ) {
        AutoModalErrorUsu();
    }
}

function AutoModalErrorUsu() {
    bodyScroll_exito();
    contenedor_popup_error.classList.add("activar_bg_error");
    popup_error.classList.toggle("cerrar_popup_error");
}

abrir_popup_error.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_error();
    contenedor_popup_error.classList.add("activar_bg_error");
    popup_error.classList.toggle("cerrar_popup_error");
});

cerrar_popup_error.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_error();
    popup_error.classList.toggle("cerrar_popup_error");
    setTimeout(function () {
        contenedor_popup_error.classList.remove("activar_bg_error");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_popup_error) {
        bodyScroll_error();
        popup_error.classList.toggle("cerrar_popup_error");
        setTimeout(function () {
            contenedor_popup_error.classList.remove("activar_bg_error");
        }, 800);
    }
});

function bodyScroll_error() {
    document.body.classList.toggle("no-scroll_error");
}

// !MODAL ERROR DEL SISTEMA
// !MODAL ERROR DEL SISTEMA
// !MODAL ERROR DEL SISTEMA

var abrir_popup_error_sistema = document.querySelector(
    ".btn_abrir_popup_error_sistema"
);
var cerrar_popup_error_sistema = document.querySelector(
    ".btn_cerrar_popup_error_sistema"
);
var contenedor_popup_error_sistema = document.querySelector(
    ".contenedor_popup_error_sistema"
);
var popup_error_sistema = document.querySelector(".popup_error_sistema");

var AbrirModalErrorSis = document.getElementById("messageErrorSis");
if (AbrirModalErrorSis != null) {
    if (
        AbrirModalErrorSis.value != "" &&
        AbrirModalErrorSis.value != null &&
        AbrirModalErrorSis.value != " "
    ) {
        AutoModalErrorSis();
    }
}

function AutoModalErrorSis() {
    bodyScroll_error_sistema();
    contenedor_popup_error_sistema.classList.add("activar_bg_error_sistema");
    popup_error_sistema.classList.toggle("cerrar_popup_error_sistema");
}

abrir_popup_error_sistema.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_error_sistema();
    contenedor_popup_error_sistema.classList.add("activar_bg_error_sistema");
    popup_error_sistema.classList.toggle("cerrar_popup_error_sistema");
});

cerrar_popup_error_sistema.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_error_sistema();
    popup_error_sistema.classList.toggle("cerrar_popup_error_sistema");
    setTimeout(function () {
        contenedor_popup_error_sistema.classList.remove(
            "activar_bg_error_sistema"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_popup_error_sistema) {
        bodyScroll_error_sistema();
        popup_error_sistema.classList.toggle("cerrar_popup_error_sistema");
        setTimeout(function () {
            contenedor_popup_error_sistema.classList.remove(
                "activar_bg_error_sistema"
            );
        }, 800);
    }
});

function bodyScroll_error_sistema() {
    document.body.classList.toggle("no-scroll_error_sistema");
}

// !MODAL ACTUALIZAR PERFIL
// !MODAL ACTUALIZAR PERFIL
// !MODAL ACTUALIZAR PERFIL

var abrir_actualizarPerfil = document.querySelector(
    ".btn_abrir_modal_actualizarPerfil"
);
var cerrar_actualizarPerfil = document.querySelector(
    ".btn_cerrar_modal_actualizarPerfil"
);
var contenedor_modal_actualizarPerfil = document.querySelector(
    ".contenedor_modal_actualizarPerfil"
);
var modal_actualizarPerfil = document.querySelector(".modal_actualizarPerfil");

var AbrirModal = document.getElementById("validarDatos").value;

if (AbrirModal === "" || AbrirModal == null) {
    AutoModalActualizarDatos();
}

function AutoModalActualizarDatos() {
    contenedor_modal_actualizarPerfil.classList.add(
        "activar_bg_actualizarPerfil"
    );
    modal_actualizarPerfil.classList.toggle("cerrar_modal_actualizarPerfil");
}

abrir_actualizarPerfil.addEventListener("click", function (e) {
    e.preventDefault();
    contenedor_modal_actualizarPerfil.classList.add(
        "activar_bg_actualizarPerfil"
    );
    modal_actualizarPerfil.classList.toggle("cerrar_modal_actualizarPerfil");
});

cerrar_actualizarPerfil.addEventListener("click", function (e) {
    e.preventDefault();
    modal_actualizarPerfil.classList.toggle("cerrar_modal_actualizarPerfil");
    setTimeout(function () {
        contenedor_modal_actualizarPerfil.classList.remove(
            "activar_bg_actualizarPerfil"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_actualizarPerfil) {
        modal_actualizarPerfil.classList.toggle(
            "cerrar_modal_actualizarPerfil"
        );
        setTimeout(function () {
            contenedor_modal_actualizarPerfil.classList.remove(
                "activar_bg_actualizarPerfil"
            );
        }, 800);
    }
});
