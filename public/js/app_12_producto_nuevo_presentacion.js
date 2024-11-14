// TODO VALIDACIONES Y MODALES DATOS ESPECIFICOS
// TODO VALIDACIONES Y MODALES DATOS ESPECIFICOS
// TODO VALIDACIONES Y MODALES DATOS ESPECIFICOS

// !VALIDACIONES CAMPOS NUEVO PRESENTACION
// !VALIDACIONES CAMPOS NUEVO PRESENTACION
// !VALIDACIONES CAMPOS NUEVO PRESENTACION

const formulario_nuevo_presentacion = document.getElementById(
    "formulario_nuevo_presentacion"
);
const inputs_nuevo_presentacion = document.querySelectorAll(
    "#formulario_nuevo_presentacion input"
);
const selects_nuevo_presentacion = document.querySelectorAll(
    "#formulario_nuevo_presentacion select"
);
const textareas_nuevo_presentacion = document.querySelectorAll(
    "#formulario_nuevo_presentacion textarea"
);

const expresiones_nuevo_presentacion = {
    sel_presentacion_nuevo_presentacion: /^\d{1,10}$/, // 1 a 10 digitos.
    num_precio_nuevo_presentacion: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{1,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_sabor_nuevo_presentacion: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
    txt_imagen_nuevo_presentacion: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    num_stockMin_nuevo_presentacion: /^\d{1,3}$/, // 1 a 10 digitos.
    sel_estado_nuevo_presentacion: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
};

const campos_nuevo_presentacion = {
    sel_presentacion_nuevo_presentacion: false,
    num_precio_nuevo_presentacion: false,
    sel_sabor_nuevo_presentacion: false,
    txt_imagen_nuevo_presentacion: false,
    num_stockMin_nuevo_presentacion: false,
    sel_estado_nuevo_presentacion: false
};

const validarformulario_nuevo_presentacion = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "sel_presentacion_nuevo_presentacion":
            var valor =
                sel_presentacion_nuevo_presentacion.options[
                    sel_presentacion_nuevo_presentacion.selectedIndex
                ].value;
            validarCampoSelect_nuevo_presentacion(
                expresiones_nuevo_presentacion.sel_presentacion_nuevo_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "num_precio_nuevo_presentacion":
            validarCampoInput_nuevo_presentacion(
                expresiones_nuevo_presentacion.num_precio_nuevo_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "sel_sabor_nuevo_presentacion":
            var valor =
                sel_sabor_nuevo_presentacion.options[
                    sel_sabor_nuevo_presentacion.selectedIndex
                ].value;
            validarCampoSelect_nuevo_presentacion(
                expresiones_nuevo_presentacion.sel_sabor_nuevo_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "txt_imagen_nuevo_presentacion":
            validarCampoInput_nuevo_presentacion(
                expresiones_nuevo_presentacion.txt_imagen_nuevo_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "num_stockMin_nuevo_presentacion":
            validarCampoInput_nuevo_presentacion(
                expresiones_nuevo_presentacion.num_stockMin_nuevo_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_nuevo_presentacion":
            var valor =
                sel_estado_nuevo_presentacion.options[
                    sel_estado_nuevo_presentacion.selectedIndex
                ].value;
            validarCampoSelect_nuevo_presentacion(
                expresiones_nuevo_presentacion.sel_estado_nuevo_presentacion,
                e.target,
                e.target.name
            );
            break;
    }

};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_nuevo_presentacion = (expresion, input, campo) => {
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
        campos_nuevo_presentacion[campo] = true;
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
        campos_nuevo_presentacion[campo] = false;
    }
};

// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_nuevo_presentacion = (expresion, select, campo) => {
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
        campos_nuevo_presentacion[campo] = true;
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
        campos_nuevo_presentacion[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
inputs_nuevo_presentacion.forEach((input) => {
    input.addEventListener("keyup", validarformulario_nuevo_presentacion);
    input.addEventListener("blur", validarformulario_nuevo_presentacion);
    input.addEventListener("change", validarformulario_nuevo_presentacion);
});
selects_nuevo_presentacion.forEach((select) => {
    select.addEventListener("change", validarformulario_nuevo_presentacion);
    select.addEventListener("blur", validarformulario_nuevo_presentacion);
});

// REVALIDACIONES
// REVALIDACIONES
var sel_presentacion_nuevo_presentacion = document.getElementById(
    "sel_presentacion_nuevo_presentacion"
);
var num_precio_nuevo_presentacion = document.getElementById(
    "num_precio_nuevo_presentacion"
);
var sel_sabor_nuevo_presentacion = document.getElementById(
    "sel_sabor_nuevo_presentacion"
);
var txt_imagen_nuevo_presentacion = document.getElementById(
    "txt_imagen_nuevo_presentacion"
);
var num_stockMin_nuevo_presentacion = document.getElementById(
    "num_stockMin_nuevo_presentacion"
);
var sel_estado_nuevo_presentacion = document.getElementById(
    "sel_estado_nuevo_presentacion"
);

function activarMsgErrors_nuevo_presentacion(campo) {
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
function activarMsgCorrecto_nuevo_presentacion(campo) {
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

function revalidacion_nuevo_presentacion() {
    if (
        sel_presentacion_nuevo_presentacion.value != "" &&
        sel_presentacion_nuevo_presentacion.value != null
    ) {
        campos_nuevo_presentacion["sel_presentacion_nuevo_presentacion"] = true;
    } else {
        activarMsgErrors_nuevo_presentacion(
            "sel_presentacion_nuevo_presentacion"
        );
    }
    if (
        num_precio_nuevo_presentacion.value != "" &&
        num_precio_nuevo_presentacion.value != null
    ) {
        campos_nuevo_presentacion["num_precio_nuevo_presentacion"] = true;
    } else {
        activarMsgErrors_nuevo_presentacion("num_precio_nuevo_presentacion");
    }
    if (
        sel_sabor_nuevo_presentacion.value != "" &&
        sel_sabor_nuevo_presentacion.value != null
    ) {
        campos_nuevo_presentacion["sel_sabor_nuevo_presentacion"] = true;
    } else {
        activarMsgErrors_nuevo_presentacion("sel_sabor_nuevo_presentacion");
    }
    if (
        txt_imagen_nuevo_presentacion.value != "" &&
        txt_imagen_nuevo_presentacion.value != null
    ) {
        campos_nuevo_presentacion["txt_imagen_nuevo_presentacion"] = true;
    } else {
        activarMsgErrors_nuevo_presentacion("txt_imagen_nuevo_presentacion");
    }
    if (
        num_stockMin_nuevo_presentacion.value != "" &&
        num_stockMin_nuevo_presentacion.value != null
    ) {
        campos_nuevo_presentacion["num_stockMin_nuevo_presentacion"] = true;
    } else {
        activarMsgErrors_nuevo_presentacion("num_stockMin_nuevo_presentacion");
    }
    if (
        sel_estado_nuevo_presentacion.value != "" &&
        sel_estado_nuevo_presentacion.value != null
    ) {
        campos_nuevo_presentacion["sel_estado_nuevo_presentacion"] = true;
    } else {
        activarMsgErrors_nuevo_presentacion("sel_estado_nuevo_presentacion");
    }
}

formulario_nuevo_presentacion.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_nuevo_presentacion();
    if (campos_nuevo_presentacion.sel_presentacion_nuevo_presentacion &&
        campos_nuevo_presentacion.num_precio_nuevo_presentacion &&
        campos_nuevo_presentacion.txt_imagen_nuevo_presentacion &&
        campos_nuevo_presentacion.num_stockMin_nuevo_presentacion &&
        campos_nuevo_presentacion.sel_estado_nuevo_presentacion) {
        formulario_nuevo_presentacion.submit();
    }
});

// !VALIDACIONES CAMPOS EDITAR PRESENTACION
// !VALIDACIONES CAMPOS EDITAR PRESENTACION
// !VALIDACIONES CAMPOS EDITAR PRESENTACION

const formulario_editar_presentacion = document.getElementById(
    "formulario_editar_presentacion"
);
const inputs_editar_presentacion = document.querySelectorAll(
    "#formulario_editar_presentacion input"
);
const selects_editar_presentacion = document.querySelectorAll(
    "#formulario_editar_presentacion select"
);
const textareas_editar_presentacion = document.querySelectorAll(
    "#formulario_editar_presentacion textarea"
);

const expresiones_editar_presentacion = {
    sel_presentacion_editar_presentacion: /^\d{1,10}$/, // 1 a 10 digitos.
    num_precio_editar_presentacion: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{1,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_sabor_editar_presentacion: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
    txt_imagen_editar_presentacion: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    num_stockMin_editar_presentacion: /^\d{1,3}$/, // 1 a 10 digitos.
    sel_estado_editar_presentacion: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
};

const campos_editar_presentacion = {
    sel_presentacion_editar_presentacion: false,
    num_precio_editar_presentacion: false,
    sel_sabor_editar_presentacion: false,
    txt_imagen_editar_presentacion: false,
    num_stockMin_editar_presentacion: false,
    sel_estado_editar_presentacion: false
};

const validarformulario_editar_presentacion = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "sel_presentacion_editar_presentacion":
            var valor =
                sel_presentacion_editar_presentacion.options[
                    sel_presentacion_editar_presentacion.selectedIndex
                ].value;
            validarCampoSelect_editar_presentacion(
                expresiones_editar_presentacion.sel_presentacion_editar_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "num_precio_editar_presentacion":
            validarCampoInput_editar_presentacion(
                expresiones_editar_presentacion.num_precio_editar_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "sel_sabor_editar_presentacion":
            var valor =
                sel_sabor_editar_presentacion.options[
                    sel_sabor_editar_presentacion.selectedIndex
                ].value;
            validarCampoSelect_editar_presentacion(
                expresiones_editar_presentacion.sel_sabor_editar_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "txt_imagen_editar_presentacion":
            validarCampoInput_editar_presentacion(
                expresiones_editar_presentacion.txt_imagen_editar_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "num_stockMin_editar_presentacion":
            validarCampoInput_editar_presentacion(
                expresiones_editar_presentacion.num_stockMin_editar_presentacion,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_editar_presentacion":
            var valor =
                sel_estado_editar_presentacion.options[
                    sel_estado_editar_presentacion.selectedIndex
                ].value;
            validarCampoSelect_editar_presentacion(
                expresiones_editar_presentacion.sel_estado_editar_presentacion,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_editar_presentacion = (expresion, input, campo) => {
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
        campos_editar_presentacion[campo] = true;
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
        campos_editar_presentacion[campo] = false;
    }
};

// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_editar_presentacion = (expresion, select, campo) => {
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
        campos_editar_presentacion[campo] = true;
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
        campos_editar_presentacion[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
inputs_editar_presentacion.forEach((input) => {
    input.addEventListener("keyup", validarformulario_editar_presentacion);
    input.addEventListener("blur", validarformulario_editar_presentacion);
    input.addEventListener("change", validarformulario_editar_presentacion);
});
selects_editar_presentacion.forEach((select) => {
    select.addEventListener("change", validarformulario_editar_presentacion);
    select.addEventListener("blur", validarformulario_editar_presentacion);
});

// REVALIDACIONES
// REVALIDACIONES
var sel_presentacion_editar_presentacion = document.getElementById(
    "sel_presentacion_editar_presentacion"
);
var num_precio_editar_presentacion = document.getElementById(
    "num_precio_editar_presentacion"
);
var sel_sabor_editar_presentacion = document.getElementById(
    "sel_sabor_editar_presentacion"
);
var txt_imagen_editar_presentacion = document.getElementById(
    "txt_imagen_editar_presentacion"
);
var num_stockMin_editar_presentacion = document.getElementById(
    "num_stockMin_editar_presentacion"
);
var sel_estado_editar_presentacion = document.getElementById(
    "sel_estado_editar_presentacion"
);

function activarMsgErrors_editar_presentacion(campo) {
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
function activarMsgCorrecto_editar_presentacion(campo) {
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

function revalidacion_editar_presentacion() {
    if (
        sel_presentacion_editar_presentacion.value != "" &&
        sel_presentacion_editar_presentacion.value != null
    ) {
        campos_editar_presentacion[
            "sel_presentacion_editar_presentacion"
        ] = true;
    } else {
        activarMsgErrors_editar_presentacion(
            "sel_presentacion_editar_presentacion"
        );
    }
    if (
        num_precio_editar_presentacion.value != "" &&
        num_precio_editar_presentacion.value != null
    ) {
        campos_editar_presentacion["num_precio_editar_presentacion"] = true;
    } else {
        activarMsgErrors_editar_presentacion("num_precio_editar_presentacion");
    }
    if (
        sel_sabor_editar_presentacion.value != "" &&
        sel_sabor_editar_presentacion.value != null
    ) {
        campos_editar_presentacion["sel_sabor_editar_presentacion"] = true;
    } else {
        activarMsgErrors_editar_presentacion("sel_sabor_editar_presentacion");
    }
    if (
        txt_imagen_editar_presentacion.value != "" &&
        txt_imagen_editar_presentacion.value != null
    ) {
        campos_editar_presentacion["txt_imagen_editar_presentacion"] = true;
    } else {
        activarMsgErrors_editar_presentacion("txt_imagen_editar_presentacion");
    }
    if (
        num_stockMin_editar_presentacion.value != "" &&
        num_stockMin_editar_presentacion.value != null
    ) {
        campos_editar_presentacion["num_stockMin_editar_presentacion"] = true;
    } else {
        activarMsgErrors_editar_presentacion(
            "num_stockMin_editar_presentacion"
        );
    }
    if (
        sel_estado_editar_presentacion.value != "" &&
        sel_estado_editar_presentacion.value != null
    ) {
        campos_editar_presentacion["sel_estado_editar_presentacion"] = true;
    } else {
        activarMsgErrors_editar_presentacion("sel_estado_editar_presentacion");
    }
}

formulario_editar_presentacion.addEventListener("submit", (e) => {
    // e.preventDefault();
    revalidacion_editar_presentacion();
    if (campos_editar_presentacion.sel_presentacion_editar_presentacion &&
        campos_editar_presentacion.num_precio_editar_presentacion &&
        campos_editar_presentacion.txt_imagen_editar_presentacion &&
        campos_editar_presentacion.num_stockMin_editar_presentacion &&
        campos_editar_presentacion.sel_estado_editar_presentacion) {
        formulario_editar_presentacion.submit();
    }
});

// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO
// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO
// !VALIDAR INPUT DE TEXTO DE IMAGEN NUEVO

const input_file_nuevo = document.querySelector("#input_file_nuevo");
input_file_nuevo.addEventListener("change", function () {
    let text = this.value;
    text = text.replace(/^.*\\/, "");
    document.getElementById("txt_imagen_nuevo_presentacion").value = text;
    activarMsgCorrecto_nuevo_presentacion("txt_imagen_nuevo_presentacion");
    document
        .getElementById("contenedor_img_nuevo_presentacion")
        .classList.add("contenedor_img-producto-correcto");
});

// !PREVISUALIZAR IMAGEN NUEVO
// !PREVISUALIZAR IMAGEN NUEVO
// !PREVISUALIZAR IMAGEN NUEVO

let vista_preliminar_nuevo = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById("img_nuevo_presentacion");

    leer_img.onload = () => {
        if (leer_img.readyState == 2) {
            id_img.src = leer_img.result;
        }
    };
    leer_img.readAsDataURL(event.target.files[0]);
};
// !VALIDAR INPUT DE TEXTO DE IMAGEN EDITAR
// !VALIDAR INPUT DE TEXTO DE IMAGEN EDITAR
// !VALIDAR INPUT DE TEXTO DE IMAGEN EDITAR

const input_file_editar = document.querySelector("#input_file_editar");
input_file_editar.addEventListener("change", function () {
    let text = this.value;
    text = text.replace(/^.*\\/, "");
    document.getElementById("txt_imagen_editar_presentacion").value = text;
    activarMsgCorrecto_editar_presentacion("txt_imagen_editar_presentacion");
    document
        .getElementById("contenedor_img_editar_presentacion")
        .classList.add("contenedor_img-producto-correcto");
});

// !PREVISUALIZAR IMAGEN EDITAR
// !PREVISUALIZAR IMAGEN EDITAR
// !PREVISUALIZAR IMAGEN EDITAR

let vista_preliminar_editar = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById("img_editar_presentacion");

    leer_img.onload = () => {
        if (leer_img.readyState == 2) {
            id_img.src = leer_img.result;
        }
    };
    leer_img.readAsDataURL(event.target.files[0]);
};

// TODO MODALES PRESENTACION
// TODO MODALES PRESENTACION
// TODO MODALES PRESENTACION

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR

var cerrar_editar_presentacion = document.querySelector(
    ".btn_cerrar_editar_presentacion"
);
var contenedor_modal_editar_presentacion = document.querySelector(
    ".contenedor_modal_editar_presentacion"
);
var modal_editar_presentacion = document.querySelector(
    ".modal_editar_presentacion"
);

function abrir_editar_presentacion(data) {
    $("#Grsa_id_Mod").val(data["GRSA_ID"]);
    $("#Prod_id_Mod").val(data["PRODUCTO_PROD_ID"]);
    $("#Imag_id_Mod").val(data["IMAG_ID"]);
    $("#sel_presentacion_editar_presentacion option")
        .removeAttr("selected")
        .filter("[value=" + data["UNME_ID"] + "]")
        .attr("selected", true);

    $("#num_precio_editar_presentacion").val(data["GRSA_PRECIO"]);

    $("#sel_sabor_editar_presentacion option")
        .removeAttr("selected")
        .filter("[value=" + data["SABORES_SABO_ID"] + "]")
        .attr("selected", true);
    $("#sel_estado_editar_presentacion option")
        .removeAttr("selected")
        .filter("[value=" + data["ESTADO_ESTA_ID"] + "]")
        .attr("selected", true);

    $("#txt_imagen_editar_presentacion").val(data["IMAG_DIRECCIONIMAGEN"]);
    $("#img_editar_presentacion").attr("src", data["IMAG_DIRECCIONIMAGEN"]);
    $("#num_stockMin_editar_presentacion").val(data["GRSA_STOCKMINIMO"]);

    bodyScroll_editar_presentacion();
    contenedor_modal_editar_presentacion.classList.add(
        "activar_bg_editar_presentacion"
    );
    modal_editar_presentacion.classList.toggle(
        "cerrar_modal_editar_presentacion"
    );
}

cerrar_editar_presentacion.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_editar_presentacion();
    modal_editar_presentacion.classList.toggle(
        "cerrar_modal_editar_presentacion"
    );
    setTimeout(function () {
        contenedor_modal_editar_presentacion.classList.remove(
            "activar_bg_editar_presentacion"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_editar_presentacion) {
        bodyScroll_editar_presentacion();
        modal_editar_presentacion.classList.toggle(
            "cerrar_modal_editar_presentacion"
        );
        setTimeout(function () {
            contenedor_modal_editar_presentacion.classList.remove(
                "activar_bg_editar_presentacion"
            );
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
var modal_eliminar_presentacion = document.querySelector(
    ".modal_eliminar_presentacion"
);

function abrir_modal_eliminar_presentacion(data) {
    $("#Grsa_id_Eli").val(data["GRSA_ID"]);
    $("#Prod_id_Eli").val(data["PRODUCTO_PROD_ID"]);
    $("#Imag_id_Eli").val(data["IMAG_ID"]);
    $("#text_eliminar_sabor").val(data["SABO_DESCRIPCION"]);
    $("#text_eliminar_presentacion").val(data["UNME_MEDIDA"]);
    bodyScroll_eliminar_presentacion();
    contenedor_modal_eliminar_presentacion.classList.add(
        "activar_bg_eliminar_presentacion"
    );
    modal_eliminar_presentacion.classList.toggle(
        "cerrar_modal_eliminar_presentacion"
    );
}

cerrar_modal_eliminar_presentacion.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_eliminar_presentacion();
    modal_eliminar_presentacion.classList.toggle(
        "cerrar_modal_eliminar_presentacion"
    );
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
        modal_eliminar_presentacion.classList.toggle(
            "cerrar_modal_eliminar_presentacion"
        );
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

// TODO VALIDACIONES Y MODALES OBJETIVOS
// TODO VALIDACIONES Y MODALES OBJETIVOS
// TODO VALIDACIONES Y MODALES OBJETIVOS

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
    sel_nombre_nuevo_objetivo: /^\d{1,10}$/, // 1 a 10 digitos.
    sel_estado_nuevo_objetivo: /^\d{1,10}$/, // 1 a 10 digitos.
};

const campos_nuevo = {
    sel_nombre_nuevo_objetivo: false,
    sel_estado_nuevo_objetivo: false,
};

const validarFormulario_nuevo_objetivo = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "sel_nombre_nuevo_objetivo":
            var valor =
                sel_nombre_nuevo_objetivo.options[
                    sel_nombre_nuevo_objetivo.selectedIndex
                ].value;
            validarCampoSelect_nuevo(
                expresiones_nuevo.sel_nombre_nuevo_objetivo,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_nuevo_objetivo":
            var valor =
                sel_estado_nuevo_objetivo.options[
                    sel_estado_nuevo_objetivo.selectedIndex
                ].value;
            validarCampoSelect_nuevo(
                expresiones_nuevo.sel_estado_nuevo_objetivo,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA SELECTS
// VALIDA SELECTS
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

// CAPTURA EL EVENTO EN LOS SELECTS DEL FORMULARIO
selects_nuevo.forEach((select) => {
    select.addEventListener("change", validarFormulario_nuevo_objetivo);
    select.addEventListener("blur", validarFormulario_nuevo_objetivo);
});

// REVALIDACIONES
var sel_nombre_nuevo_objetivo = document.getElementById(
    "sel_nombre_nuevo_objetivo"
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
        sel_nombre_nuevo_objetivo.value != "" &&
        sel_nombre_nuevo_objetivo.value != null
    ) {
        campos_nuevo["sel_nombre_nuevo_objetivo"] = true;
    } else {
        activarMsgErrors("sel_nombre_nuevo_objetivo");
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
    if (campos_nuevo.sel_nombre_nuevo_objetivo &&
        campos_nuevo.sel_estado_nuevo_objetivo) {
        formulario_nuevo_objetivo.submit();
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
    sel_nombre_editar_objetivo: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Letras y espacios, pueden llevar acentos.
    sel_estado_editar_objetivo: /^\d{1,10}$/, // 1 a 10 digitos.
};

const campos_editar = {
    sel_nombre_editar_objetivo: false,
    sel_estado_editar_objetivo: false,
};

const validarFormulario_editar_objetivo = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "sel_nombre_editar_objetivo":
            var valor =
                sel_nombre_editar_objetivo.options[
                    sel_nombre_editar_objetivo.selectedIndex
                ].value;
            validarCampoSelect_editar(
                expresiones_editar.sel_nombre_editar_objetivo,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_editar_objetivo":
            var valor =
                sel_estado_editar_objetivo.options[
                    sel_estado_editar_objetivo.selectedIndex
                ].value;
            validarCampoSelect_editar(
                expresiones_editar.sel_estado_editar_objetivo,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA SELECTS
// VALIDA SELECTS
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

// CAPTURA EL EVENTO EN LOS SELECTS DEL FORMULARIO
selects_editar.forEach((select) => {
    select.addEventListener("change", validarFormulario_editar_objetivo);
    select.addEventListener("blur", validarFormulario_editar_objetivo);
});

// REVALIADACIONES
var sel_nombre_editar_objetivo = document.getElementById(
    "sel_nombre_editar_objetivo"
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
        sel_nombre_editar_objetivo.value != "" &&
        sel_nombre_editar_objetivo.value != null
    ) {
        campos_editar["sel_nombre_editar_objetivo"] = true;
    } else {
        activarMsgErrors("sel_nombre_editar_objetivo");
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
    if (campos_editar.sel_nombre_editar_objetivo &&
        campos_editar.sel_estado_editar_objetivo) {
        formulario_editar_objetivo.submit();
    }
});

// TODO MODALES OBJETIVOS
// TODO MODALES OBJETIVOS
// TODO MODALES OBJETIVOS

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR

var cerrar_editar_objetivo = document.querySelector(
    ".btn_cerrar_editar_objetivo"
);
var contenedor_modal_editar_objetivo = document.querySelector(
    ".contenedor_modal_editar_objetivo"
);
var modal_editar_objetivo = document.querySelector(".modal_editar_objetivo");

function abrir_editar_objetivo(data) {
    $("#Prob_id_objetivo").val(data["PROB_ID"]);
    $("#Prod_id_mod_oj").val(data["PRODUCTO_PROD_ID"]);

    $("#sel_nombre_editar_objetivo option")
        .removeAttr("selected")
        .filter("[value=" + data["OBJETIVOS_OBJE_ID"] + "]")
        .attr("selected", true);

        $("#sel_estado_editar_objetivo option")
        .removeAttr("selected")
        .filter("[value=" + data["ESTADO_ESTA_ID"] + "]")
        .attr("selected", true);

    bodyScroll_editar_objetivo();
    contenedor_modal_editar_objetivo.classList.add(
        "activar_bg_editar_objetivo"
    );
    modal_editar_objetivo.classList.toggle("cerrar_modal_editar_objetivo");
}

cerrar_editar_objetivo.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_editar_objetivo();
    modal_editar_objetivo.classList.toggle("cerrar_modal_editar_objetivo");
    setTimeout(function () {
        contenedor_modal_editar_objetivo.classList.remove(
            "activar_bg_editar_objetivo"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_editar_objetivo) {
        bodyScroll_editar_objetivo();
        modal_editar_objetivo.classList.toggle("cerrar_modal_editar_objetivo");
        setTimeout(function () {
            contenedor_modal_editar_objetivo.classList.remove(
                "activar_bg_editar_objetivo"
            );
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
var modal_eliminar_objetivo = document.querySelector(
    ".modal_eliminar_objetivo"
);

function abrir_modal_eliminar_objetivo(data) {
    $("#Prob_id_objetivo_Eliminar").val(data["PROB_ID"]);
    $("#text_nombre_producto").text(data["OBJE_NOMBRE"]);
    bodyScroll_eliminar_objetivo();
    contenedor_modal_eliminar_objetivo.classList.add(
        "activar_bg_eliminar_objetivo"
    );
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
        modal_eliminar_objetivo.classList.toggle(
            "cerrar_modal_eliminar_objetivo"
        );
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
