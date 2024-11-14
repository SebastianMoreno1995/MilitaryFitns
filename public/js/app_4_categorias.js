
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACIONES CAMPOS NUEVA CATEGORIA
// !VALIDACIONES CAMPOS NUEVA CATEGORIA
// !VALIDACIONES CAMPOS NUEVA CATEGORIA

const formulario_nueva_categoria = document.getElementById(
    "formulario_nueva_categoria"
);
const inputs_nuevo_categoria = document.querySelectorAll(
    "#formulario_nueva_categoria input"
);
const textareas_nuevo_categoria = document.querySelectorAll(
    "#formulario_nueva_categoria .textarea"
);
const selects_nuevo_categoria = document.querySelectorAll(
    "#formulario_nueva_categoria .select"
);

const expresiones_nuevo_categoria = {
    txt_imagen_nuevo_categorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    txt_nombre_nuevo_categorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    are_descripcion_nuevo_categorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{4,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_estado_nuevo_categorias: /^\d{1,40}$/, // Valida numeros
};

const campos_nuevo_categoria = {
    txt_imagen_nuevo_categorias: false,
    txt_nombre_nuevo_categorias: false,
    are_descripcion_nuevo_categorias: false,
    sel_estado_nuevo_categorias: false,
};

const validarformulario_nueva_categoria = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_imagen_nuevo_categorias":
            validarCampoInput_nuevo_categoria(
                expresiones_nuevo_categoria.txt_imagen_nuevo_categorias,
                e.target,
                e.target.name
            );
            break;
        case "txt_nombre_nuevo_categorias":
            validarCampoInput_nuevo_categoria(
                expresiones_nuevo_categoria.txt_nombre_nuevo_categorias,
                e.target,
                e.target.name
            );
            break;
        case "are_descripcion_nuevo_categorias":
            validarCampoTextArea_nuevo_categoria(
                expresiones_nuevo_categoria.are_descripcion_nuevo_categorias,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_nuevo_categorias":
            var valor =
                sel_estado_nuevo_categorias.options[
                    sel_estado_nuevo_categorias.selectedIndex
                ].value;
            validarCampoSelect_nuevo_categoria(
                expresiones_nuevo_categoria.sel_estado_nuevo_categorias,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_nuevo_categoria = (expresion, input, campo) => {
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
        campos_nuevo_categoria[campo] = true;
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
        campos_nuevo_categoria[campo] = false;
    }
};

// VALIDA TEXTAREAS
// VALIDA TEXTAREAS
const validarCampoTextArea_nuevo_categoria = (expresion, textarea, campo) => {
    if (expresion.test(textarea.value)) {
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
        campos_nuevo_categoria[campo] = true;
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
        campos_nuevo_categoria[campo] = false;
    }
};
// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_nuevo_categoria = (expresion, select, campo) => {
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
        campos_nuevo_categoria[campo] = true;
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
        campos_nuevo_categoria[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
inputs_nuevo_categoria.forEach((input) => {
    input.addEventListener("keyup", validarformulario_nueva_categoria);
    input.addEventListener("blur", validarformulario_nueva_categoria);
});
textareas_nuevo_categoria.forEach((textarea) => {
    textarea.addEventListener("keyup", validarformulario_nueva_categoria);
    textarea.addEventListener("blur", validarformulario_nueva_categoria);
});
selects_nuevo_categoria.forEach((select) => {
    select.addEventListener("change", validarformulario_nueva_categoria);
    select.addEventListener("blur", validarformulario_nueva_categoria);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_imagen_nuevo_categorias = document.getElementById(
    "txt_imagen_nuevo_categorias"
);
var txt_nombre_nuevo_categorias = document.getElementById(
    "txt_nombre_nuevo_categorias"
);
var are_descripcion_nuevo_categorias = document.getElementById(
    "are_descripcion_nuevo_categorias"
);
var sel_estado_nuevo_categorias = document.getElementById(
    "sel_estado_nuevo_categorias"
);

function activarMsgErrors_nuevo_categoria(campo) {
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

// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - NUEVA CATEGORIA
// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - NUEVA CATEGORIA
function activarMsgCorrecto_nuevo_categoria(campo) {
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
function revalidacion_categoria() {
    if (
        txt_imagen_nuevo_categorias.value != "" &&
        txt_imagen_nuevo_categorias.value != null
    ) {
        campos_nuevo_categoria["txt_imagen_nuevo_categorias"] = true;
    } else {
        activarMsgErrors_nuevo_categoria("txt_imagen_nuevo_categorias");
    }
    if (
        txt_nombre_nuevo_categorias.value != "" &&
        txt_nombre_nuevo_categorias.value != null
    ) {
        campos_nuevo_categoria["txt_nombre_nuevo_categorias"] = true;
    } else {
        activarMsgErrors_nuevo_categoria("txt_nombre_nuevo_categorias");
    }
    if (
        are_descripcion_nuevo_categorias.value != "" &&
        are_descripcion_nuevo_categorias.value != null
    ) {
        campos_nuevo_categoria["are_descripcion_nuevo_categorias"] = true;
    } else {
        activarMsgErrors_nuevo_categoria("are_descripcion_nuevo_categorias");
    }
    if (
        sel_estado_nuevo_categorias.value != "" &&
        sel_estado_nuevo_categorias.value != null
    ) {
        campos_nuevo_categoria["sel_estado_nuevo_categorias"] = true;
    } else {
        activarMsgErrors_nuevo_categoria("sel_estado_nuevo_categorias");
    }
}

formulario_nueva_categoria.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_categoria();
    if (
        (campos_nuevo_categoria.txt_imagen_nuevo_categorias &&
            campos_nuevo_categoria.txt_nombre_nuevo_categorias &&
            campos_nuevo_categoria.sel_estado_nuevo_categorias) ||
        campos_nuevo_categoria.are_descripcion_nuevo_categorias
    ) {
        formulario_nueva_categoria.submit();
    } else {
        // alert(campos_nuevo_categoria.txt_nombre_nuevo_categorias + " " +
        // campos_nuevo_categoria.are_descripcion_nuevo_categorias + " " +
        // campos_nuevo_categoria.sel_estado_nuevo_categorias);
    }
});

// !VALIDACIONES CAMPOS EDITAR CATEGORIA
// !VALIDACIONES CAMPOS EDITAR CATEGORIA
// !VALIDACIONES CAMPOS EDITAR CATEGORIA

const formulario_editar_categoria = document.getElementById(
    "formulario_editar_categoria"
);
const inputs_editar_categoria = document.querySelectorAll(
    "#formulario_editar_categoria input"
);
const textareas_editar_categoria = document.querySelectorAll(
    "#formulario_editar_categoria .textarea"
);
const selects_editar_categoria = document.querySelectorAll(
    "#formulario_editar_categoria .select"
);

const expresiones_editar_categoria = {
    txt_imagen_editar_categorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    txt_nombre_editar_categorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    are_descripcion_editar_categorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{4,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_estado_editar_categorias: /^\d{1,40}$/, // Valida numeros
};

const campos_editar_categoria = {
    txt_imagen_editar_categorias: false,
    txt_nombre_editar_categorias: false,
    are_descripcion_editar_categorias: false,
    sel_estado_editar_categorias: false,
};

const validarformulario_editar_categoria = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_imagen_editar_categorias":
            validarCampoInput_editar_categoria(
                expresiones_editar_categoria.txt_imagen_editar_categorias,
                e.target,
                e.target.name
            );
            break;
        case "txt_nombre_editar_categorias":
            validarCampoInput_editar_categoria(
                expresiones_editar_categoria.txt_nombre_editar_categorias,
                e.target,
                e.target.name
            );
            break;
        case "are_descripcion_editar_categorias":
            validarCampoTextArea_editar_categoria(
                expresiones_editar_categoria.are_descripcion_editar_categorias,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_editar_categorias":
            var valor =
                sel_estado_editar_categorias.options[
                    sel_estado_editar_categorias.selectedIndex
                ].value;
            validarCampoSelect_editar_categoria(
                expresiones_editar_categoria.sel_estado_editar_categorias,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_editar_categoria = (expresion, input, campo) => {
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
        campos_editar_categoria[campo] = true;
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
        campos_editar_categoria[campo] = false;
    }
};

// VALIDA TEXTAREAS
// VALIDA TEXTAREAS
const validarCampoTextArea_editar_categoria = (expresion, textarea, campo) => {
    if (expresion.test(textarea.value)) {
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
        campos_editar_categoria[campo] = true;
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
        campos_editar_categoria[campo] = false;
    }
};
// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_editar_categoria = (expresion, select, campo) => {
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
        campos_editar_categoria[campo] = true;
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
        campos_editar_categoria[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
inputs_editar_categoria.forEach((input) => {
    input.addEventListener("keyup", validarformulario_editar_categoria);
    input.addEventListener("blur", validarformulario_editar_categoria);
});
textareas_editar_categoria.forEach((textarea) => {
    textarea.addEventListener("keyup", validarformulario_editar_categoria);
    textarea.addEventListener("blur", validarformulario_editar_categoria);
});
selects_editar_categoria.forEach((select) => {
    select.addEventListener("change", validarformulario_editar_categoria);
    select.addEventListener("blur", validarformulario_editar_categoria);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_nombre_editar_categorias = document.getElementById(
    "txt_nombre_editar_categorias"
);
var are_descripcion_editar_categorias = document.getElementById(
    "are_descripcion_editar_categorias"
);
var sel_estado_editar_categorias = document.getElementById(
    "sel_estado_editar_categorias"
);

function activarMsgErrors_editar_categoria(campo) {
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
// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - EDITAR CATEGORIA
// FUNCION REVALIDAR INPUT TIPO FILE IMAGEN - EDITAR CATEGORIA
function activarMsgCorrecto_editar_categoria(campo) {
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
function revalidacion_categoria() {
    if (
        txt_imagen_editar_categorias.value != "" &&
        txt_imagen_editar_categorias.value != null
    ) {
        campos_editar_categoria["txt_imagen_editar_categorias"] = true;
    } else {
        activarMsgErrors_editar_categoria("txt_imagen_editar_categorias");
    }
    if (
        txt_nombre_editar_categorias.value != "" &&
        txt_nombre_editar_categorias.value != null
    ) {
        campos_editar_categoria["txt_nombre_editar_categorias"] = true;
    } else {
        activarMsgErrors_editar_categoria("txt_nombre_editar_categorias");
    }
    if (
        are_descripcion_editar_categorias.value != "" &&
        are_descripcion_editar_categorias.value != null
    ) {
        campos_editar_categoria["are_descripcion_editar_categorias"] = true;
    } else {
        activarMsgErrors_editar_categoria("are_descripcion_editar_categorias");
    }
    if (
        sel_estado_editar_categorias.value != "" &&
        sel_estado_editar_categorias.value != null
    ) {
        campos_editar_categoria["sel_estado_editar_categorias"] = true;
    } else {
        activarMsgErrors_editar_categoria("sel_estado_editar_categorias");
    }
}

formulario_editar_categoria.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_categoria();
    if (
        (campos_editar_categoria.txt_nombre_editar_categorias &&
            campos_editar_categoria.sel_estado_editar_categorias) ||
        campos_editar_categoria.are_descripcion_editar_categorias
    ) {
        formulario_editar_categoria.submit();
    } else {
        // alert(
        //   campos_editar_categoria.txt_nombre_editar_categorias +
        //     " " +
        //     campos_editar_categoria.are_descripcion_editar_categorias +
        //     " " +
        //     campos_nuevo_categoria.sel_estado_editar_categorias
        // );
    }
});

// !VALIDACIONES CAMPOS NUEVA SUBCATEGORIA
// !VALIDACIONES CAMPOS NUEVA SUBCATEGORIA
// !VALIDACIONES CAMPOS NUEVA SUBCATEGORIA

const formulario_nueva_subcategoria = document.getElementById(
    "formulario_nueva_subcategoria"
);
const inputs_nuevo_subcategoria = document.querySelectorAll(
    "#formulario_nueva_subcategoria input"
);
const textareas_nuevo_subcategoria = document.querySelectorAll(
    "#formulario_nueva_subcategoria .textarea"
);
const selects_nuevo_subcategoria = document.querySelectorAll(
    "#formulario_nueva_subcategoria .select"
);

const expresiones_nuevo_subcategoria = {
    txt_nombre_nuevo_subcategorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    are_descripcion_nuevo_subcategorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{4,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_estado_nuevo_subcategorias: /^\d{1,40}$/, // Valida numeros
};

const campos_nuevo_subcategoria = {
    txt_nombre_nuevo_subcategorias: false,
    are_descripcion_nuevo_subcategorias: false,
    sel_estado_nuevo_subcategorias: false,
};

const validarformulario_nueva_subcategoria = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_nombre_nuevo_subcategorias":
            validarCampoInput_nuevo_subcategoria(
                expresiones_nuevo_subcategoria.txt_nombre_nuevo_subcategorias,
                e.target,
                e.target.name
            );
            break;
        case "are_descripcion_nuevo_subcategorias":
            validarCampoTextArea_nuevo_subcategoria(
                expresiones_nuevo_subcategoria.are_descripcion_nuevo_subcategorias,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_nuevo_subcategorias":
            var valor =
                sel_estado_nuevo_subcategorias.options[
                    sel_estado_nuevo_subcategorias.selectedIndex
                ].value;
            validarCampoSelect_nuevo_subcategoria(
                expresiones_nuevo_subcategoria.sel_estado_nuevo_subcategorias,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_nuevo_subcategoria = (expresion, input, campo) => {
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
        campos_nuevo_subcategoria[campo] = true;
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
        campos_nuevo_subcategoria[campo] = false;
    }
};

// VALIDA TEXTAREAS
// VALIDA TEXTAREAS
const validarCampoTextArea_nuevo_subcategoria = (
    expresion,
    textarea,
    campo
) => {
    if (expresion.test(textarea.value)) {
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
        campos_nuevo_subcategoria[campo] = true;
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
        campos_nuevo_subcategoria[campo] = false;
    }
};

// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_nuevo_subcategoria = (expresion, select, campo) => {
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
        campos_nuevo_subcategoria[campo] = true;
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
        campos_nuevo_subcategoria[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
inputs_nuevo_subcategoria.forEach((input) => {
    input.addEventListener("keyup", validarformulario_nueva_subcategoria);
    input.addEventListener("blur", validarformulario_nueva_subcategoria);
});
textareas_nuevo_subcategoria.forEach((textarea) => {
    textarea.addEventListener("keyup", validarformulario_nueva_subcategoria);
    textarea.addEventListener("blur", validarformulario_nueva_subcategoria);
});
selects_nuevo_subcategoria.forEach((select) => {
    select.addEventListener("change", validarformulario_nueva_subcategoria);
    select.addEventListener("blur", validarformulario_nueva_subcategoria);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_nombre_nuevo_subcategorias = document.getElementById(
    "txt_nombre_nuevo_subcategorias"
);
var are_descripcion_nuevo_subcategorias = document.getElementById(
    "are_descripcion_nuevo_subcategorias"
);
var sel_estado_nuevo_subcategorias = document.getElementById(
    "sel_estado_nuevo_subcategorias"
);

function activarMsgErrors_nuevo_subcategoria(campo) {
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

function revalidacion_subcategoria() {
    if (
        txt_nombre_nuevo_subcategorias.value != "" &&
        txt_nombre_nuevo_subcategorias.value != null
    ) {
        campos_nuevo_subcategoria["txt_nombre_nuevo_subcategorias"] = true;
    } else {
        activarMsgErrors_nuevo_subcategoria("txt_nombre_nuevo_subcategorias");
    }
    if (
        are_descripcion_nuevo_subcategorias.value != "" &&
        are_descripcion_nuevo_subcategorias.value != null
    ) {
        campos_nuevo_subcategoria["are_descripcion_nuevo_subcategorias"] = true;
    } else {
        activarMsgErrors_nuevo_subcategoria(
            "are_descripcion_nuevo_subcategorias"
        );
    }
    if (
        sel_estado_nuevo_subcategorias.value != "" &&
        sel_estado_nuevo_subcategorias.value != null
    ) {
        campos_nuevo_categoria["sel_estado_nuevo_subcategorias"] = true;
    } else {
        activarMsgErrors_nuevo_subcategoria("sel_estado_nuevo_subcategorias");
    }
}

formulario_nueva_subcategoria.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_subcategoria();
    if (
        (campos_nuevo_subcategoria.txt_nombre_nuevo_subcategorias &&
            campos_nuevo_subcategoria.sel_estado_nuevo_subcategorias) ||
        campos_nuevo_subcategoria.are_descripcion_nuevo_subcategorias
    ) {
        formulario_nueva_subcategoria.submit();
    } else {
        // alert(campos_nuevo_subcategoria.txt_nombre_nuevo_subcategorias + " " +
        // campos_nuevo_subcategoria.are_descripcion_nuevo_subcategorias + " " + campos_nuevo_subcategoria.sel_estado_nuevo_subcategorias);
    }
});

// !VALIDACIONES CAMPOS EDITAR SUBCATEGORIA
// !VALIDACIONES CAMPOS EDITAR SUBCATEGORIA
// !VALIDACIONES CAMPOS EDITAR SUBCATEGORIA

const formulario_editar_subcategoria = document.getElementById(
    "formulario_editar_subcategoria"
);
const inputs_editar_subcategoria = document.querySelectorAll(
    "#formulario_editar_subcategoria input"
);
const textareas_editar_subcategoria = document.querySelectorAll(
    "#formulario_editar_subcategoria .textarea"
);
const selects_editar_subcategoria = document.querySelectorAll(
    "#formulario_editar_subcategoria .select"
);

const expresiones_editar_subcategoria = {
    txt_nombre_editar_subcategorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    are_descripcion_editar_subcategorias: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{4,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_estado_editar_subcategorias: /^\d{1,40}$/, // Valida numeros
};

const campos_editar_subcategoria = {
    txt_nombre_editar_subcategorias: false,
    are_descripcion_editar_subcategorias: false,
    sel_estado_editar_subcategorias: false,
};

const validarformulario_editar_subcategoria = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_nombre_editar_subcategorias":
            validarCampoInput_editar_subcategoria(
                expresiones_editar_subcategoria.txt_nombre_editar_subcategorias,
                e.target,
                e.target.name
            );
            break;
        case "are_descripcion_editar_subcategorias":
            validarCampoTextArea_editar_subcategoria(
                expresiones_editar_subcategoria.are_descripcion_editar_subcategorias,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_editar_subcategorias":
            var valor =
                sel_estado_editar_subcategorias.options[
                    sel_estado_editar_subcategorias.selectedIndex
                ].value;
            validarCampoSelect_editar_subcategoria(
                expresiones_editar_subcategoria.sel_estado_editar_subcategorias,
                e.target,
                e.target.name
            );
            break;
    }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_editar_subcategoria = (expresion, input, campo) => {
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
        campos_editar_subcategoria[campo] = true;
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
        campos_editar_subcategoria[campo] = false;
    }
};

// VALIDA TEXTAREAS
// VALIDA TEXTAREAS
const validarCampoTextArea_editar_subcategoria = (
    expresion,
    textarea,
    campo
) => {
    if (expresion.test(textarea.value)) {
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
        campos_editar_subcategoria[campo] = true;
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
        campos_editar_subcategoria[campo] = false;
    }
};

// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_editar_subcategoria = (expresion, select, campo) => {
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
        campos_editar_subcategoria[campo] = true;
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
        campos_editar_subcategoria[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y LOS TEXTAREA EN EL FORMULARIO
inputs_editar_subcategoria.forEach((input) => {
    input.addEventListener("keyup", validarformulario_editar_subcategoria);
    input.addEventListener("blur", validarformulario_editar_subcategoria);
});
textareas_editar_subcategoria.forEach((textarea) => {
    textarea.addEventListener("keyup", validarformulario_editar_subcategoria);
    textarea.addEventListener("blur", validarformulario_editar_subcategoria);
});
selects_editar_subcategoria.forEach((select) => {
    select.addEventListener("change", validarformulario_editar_subcategoria);
    select.addEventListener("blur", validarformulario_editar_subcategoria);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_nombre_editar_subcategorias = document.getElementById(
    "txt_nombre_editar_subcategorias"
);
var are_descripcion_editar_subcategorias = document.getElementById(
    "are_descripcion_editar_subcategorias"
);
var sel_estado_editar_subcategorias = document.getElementById(
    "sel_estado_editar_subcategorias"
);

function activarMsgErrors_editar_subcategoria(campo) {
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

function revalidacion_subcategoria() {
    if (
        txt_nombre_editar_subcategorias.value != "" &&
        txt_nombre_editar_subcategorias.value != null
    ) {
        campos_editar_subcategoria["txt_nombre_editar_subcategorias"] = true;
    } else {
        activarMsgErrors_editar_subcategoria("txt_nombre_editar_subcategorias");
    }
    if (
        are_descripcion_editar_subcategorias.value != "" &&
        are_descripcion_editar_subcategorias.value != null
    ) {
        campos_editar_subcategoria[
            "are_descripcion_editar_subcategorias"
        ] = true;
    } else {
        activarMsgErrors_editar_subcategoria(
            "are_descripcion_editar_subcategorias"
        );
    }
    if (
        sel_estado_editar_subcategorias.value != "" &&
        sel_estado_editar_subcategorias.value != null
    ) {
        campos_editar_subcategoria["sel_estado_editar_subcategorias"] = true;
    } else {
        activarMsgErrors_editar_subcategoria("sel_estado_editar_subcategorias");
    }
}

formulario_editar_subcategoria.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_subcategoria();
    if (
        (campos_editar_subcategoria.txt_nombre_editar_subcategorias &&
            campos_editar_subcategoria.sel_estado_editar_subcategorias) ||
        campos_editar_subcategoria.are_descripcion_editar_subcategorias
    ) {
        formulario_editar_subcategoria.submit();
    } else {
        // alert(campos_editar_subcategoria.txt_nombre_editar_subcategorias + " " +
        // campos_editar_subcategoria.are_descripcion_editar_subcategorias + " " + campos_editar_subcategoria.sel_estado_editar_subcategorias);
    }
});

// !MODAL NUEVA CATEGORIA
// !MODAL NUEVA CATEGORIA
// !MODAL NUEVA CATEGORIA

var abrir_nueva_categoria = document.querySelector(
    ".btn_abrir_modal_nueva_categoria"
);
var cerrar_nueva_categoria = document.querySelector(
    ".btn_cerrar_nueva_categoria"
);
var contenedor_modal_nueva_categoria = document.querySelector(
    ".contenedor_modal_nueva_categoria"
);
var modal_nueva_categoria = document.querySelector(".modal_nueva_categoria");

abrir_nueva_categoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_nueva_categoria();
    contenedor_modal_nueva_categoria.classList.add(
        "activar_bg_nueva_categoria"
    );
    modal_nueva_categoria.classList.toggle("cerrar_modal_nueva_categoria");
});

cerrar_nueva_categoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_nueva_categoria();
    modal_nueva_categoria.classList.toggle("cerrar_modal_nueva_categoria");
    setTimeout(function () {
        contenedor_modal_nueva_categoria.classList.remove(
            "activar_bg_nueva_categoria"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_nueva_categoria) {
        bodyScroll_nueva_categoria();
        modal_nueva_categoria.classList.toggle("cerrar_modal_nueva_categoria");
        setTimeout(function () {
            contenedor_modal_nueva_categoria.classList.remove(
                "activar_bg_nueva_categoria"
            );
        }, 800);
    }
});

function bodyScroll_nueva_categoria() {
    document.body.classList.toggle("no-scroll_nueva_categoria");
}

// !MODAL EDITAR CATEGORIA
// !MODAL EDITAR CATEGORIA
// !MODAL EDITAR CATEGORIA

var cerrar_editar_categoria = document.querySelector(
    ".btn_cerrar_editar_categoria"
);
var contenedor_modal_editar_categoria = document.querySelector(
    ".contenedor_modal_editar_categoria"
);
var modal_editar_categoria = document.querySelector(".modal_editar_categoria");

function ModificarCategoria(
    Cate_id,
    Cate_Nombre,
    Cate_Descripcion,
    Cate_Imagen,
    Cate_Estado
) {
    $("#Cate_id_Modificar").val(Cate_id);
    $("#txt_nombre_editar_categorias").val(Cate_Nombre);
    $("#txt_imagen_editar_categorias").val(Cate_Imagen);

    $("#img_editar_categoria").attr("src", Cate_Imagen);
    $("#are_descripcion_editar_categorias").html(Cate_Descripcion);
    $("#sel_estado_editar_categorias option")
        .removeAttr("selected")
        .filter("[value=" + Cate_Estado + "]")
        .attr("selected", true);
    bodyScroll_editar_categoria();
    contenedor_modal_editar_categoria.classList.add(
        "activar_bg_editar_categoria"
    );
    modal_editar_categoria.classList.toggle("cerrar_modal_editar_categoria");
}

cerrar_editar_categoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_editar_categoria();
    modal_editar_categoria.classList.toggle("cerrar_modal_editar_categoria");
    setTimeout(function () {
        contenedor_modal_editar_categoria.classList.remove(
            "activar_bg_editar_categoria"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_editar_categoria) {
        bodyScroll_editar_categoria();
        modal_editar_categoria.classList.toggle(
            "cerrar_modal_editar_categoria"
        );
        setTimeout(function () {
            contenedor_modal_editar_categoria.classList.remove(
                "activar_bg_editar_categoria"
            );
        }, 800);
    }
});

function bodyScroll_editar_categoria() {
    document.body.classList.toggle("no-scroll_editar_categoria");
}

// !MODAL ELIMINAR CATEGORIA
// !MODAL ELIMINAR CATEGORIA
// !MODAL ELIMINAR CATEGORIA

var cerrar_modal_eliminar_categoria = document.querySelector(
    ".btn_cerrar_modal_eliminar_categoria"
);
var contenedor_modal_eliminar_categoria = document.querySelector(
    ".contenedor_modal_eliminar_categoria"
);
var modal_eliminar_categoria = document.querySelector(
    ".modal_eliminar_categoria"
);

function EliminarCategoria(Cate_id, Cate_Nombre) {
    $("#Cate_id_Eliminar").val(Cate_id);
    $("#txt_nombre_eliminar_categorias").text(Cate_Nombre);
    bodyScroll_eliminar_categoria();
    contenedor_modal_eliminar_categoria.classList.add(
        "activar_bg_eliminar_categoria"
    );
    modal_eliminar_categoria.classList.toggle(
        "cerrar_modal_eliminar_categoria"
    );
}

cerrar_modal_eliminar_categoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_eliminar_categoria();
    modal_eliminar_categoria.classList.toggle(
        "cerrar_modal_eliminar_categoria"
    );
    setTimeout(function () {
        contenedor_modal_eliminar_categoria.classList.remove(
            "activar_bg_eliminar_categoria"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_eliminar_categoria) {
        bodyScroll_eliminar_categoria();
        modal_eliminar_categoria.classList.toggle(
            "cerrar_modal_eliminar_categoria"
        );
        setTimeout(function () {
            contenedor_modal_eliminar_categoria.classList.remove(
                "activar_bg_eliminar_categoria"
            );
        }, 800);
    }
});

function bodyScroll_eliminar_categoria() {
    document.body.classList.toggle("no-scroll_eliminar");
}

// !MODAL NUEVA SUB CATEGORIA
// !MODAL NUEVA SUB CATEGORIA
// !MODAL NUEVA SUB CATEGORIA

var cerrar_nueva_subcategoria = document.querySelector(
    ".btn_cerrar_nueva_subcategoria"
);
var contenedor_modal_nueva_subcategoria = document.querySelector(
    ".contenedor_modal_nueva_subcategoria"
);
var modal_nueva_subcategoria = document.querySelector(
    ".modal_nueva_subcategoria"
);

function NuevaSubCategoria(Cate_id, Cate_Nombre) {
    bodyScroll_nueva_subcategoria();
    $("#Cate_id_Registro").val(Cate_id);
    $("#name_categoria_pertenece").text(Cate_Nombre);
    contenedor_modal_nueva_subcategoria.classList.add(
        "activar_bg_nueva_subcategoria"
    );
    modal_nueva_subcategoria.classList.toggle(
        "cerrar_modal_nueva_subcategoria"
    );
}

cerrar_nueva_subcategoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_nueva_subcategoria();
    modal_nueva_subcategoria.classList.toggle(
        "cerrar_modal_nueva_subcategoria"
    );
    setTimeout(function () {
        contenedor_modal_nueva_subcategoria.classList.remove(
            "activar_bg_nueva_subcategoria"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_nueva_subcategoria) {
        bodyScroll_nueva_subcategoria();
        modal_nueva_subcategoria.classList.toggle(
            "cerrar_modal_nueva_subcategoria"
        );
        setTimeout(function () {
            contenedor_modal_nueva_subcategoria.classList.remove(
                "activar_bg_nueva_subcategoria"
            );
        }, 800);
    }
});

function bodyScroll_nueva_subcategoria() {
    document.body.classList.toggle("no-scroll_nueva_subcategoria");
}
// !MODAL EDITAR SUB CATEGORIA
// !MODAL EDITAR SUB CATEGORIA
// !MODAL EDITAR SUB CATEGORIA

var cerrar_editar_subcategoria = document.querySelector(
    ".btn_cerrar_editar_subcategoria"
);
var contenedor_modal_editar_subcategoria = document.querySelector(
    ".contenedor_modal_editar_subcategoria"
);
var modal_editar_subcategoria = document.querySelector(
    ".modal_editar_subcategoria"
);

function abrir_editar_subcategoria(data) {
    $("#Subc_id_modificar").val(data["SUBC_ID"]);
    $("#txt_nombre_editar_subcategorias").val(data["SUBC_NOMBRE"]);
    $("#are_descripcion_editar_subcategorias").text(data["SUBC_DESCRIPCION"]);
    $("#Cate_id_modificar").text(data["CATEGORIA_CATE_ID"]);
    $("#sel_estado_editar_subcategorias option")
        .removeAttr("selected")
        .filter("[value=" + data["ESTADO_ESTA_ID"] + "]")
        .attr("selected", true);

    bodyScroll_editar_subcategoria();
    contenedor_modal_editar_subcategoria.classList.add(
        "activar_bg_editar_subcategoria"
    );
    modal_editar_subcategoria.classList.toggle(
        "cerrar_modal_editar_subcategoria"
    );
}

cerrar_editar_subcategoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_editar_subcategoria();
    modal_editar_subcategoria.classList.toggle(
        "cerrar_modal_editar_subcategoria"
    );
    setTimeout(function () {
        contenedor_modal_editar_subcategoria.classList.remove(
            "activar_bg_editar_subcategoria"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_editar_subcategoria) {
        bodyScroll_editar_subcategoria();
        modal_editar_subcategoria.classList.toggle(
            "cerrar_modal_editar_subcategoria"
        );
        setTimeout(function () {
            contenedor_modal_editar_subcategoria.classList.remove(
                "activar_bg_editar_subcategoria"
            );
        }, 800);
    }
});

function bodyScroll_editar_subcategoria() {
    document.body.classList.toggle("no-scroll_editar_subcategoria");
}

// !MODAL ELIMINAR SUB CATEGORIA
// !MODAL ELIMINAR SUB CATEGORIA
// !MODAL ELIMINAR SUB CATEGORIA

var cerrar_modal_eliminar_subcategoria = document.querySelector(
    ".btn_cerrar_modal_eliminar_subcategoria"
);
var contenedor_modal_eliminar_subcategoria = document.querySelector(
    ".contenedor_modal_eliminar_subcategoria"
);
var modal_eliminar_subcategoria = document.querySelector(
    ".modal_eliminar_subcategoria"
);

function abrir_modal_eliminar_subcategoria(data) {
    $("#Subc_id_Eliminar").val(data["SUBC_ID"]);
    $("#nombre_subcategoria_eliminar").text(data["SUBC_NOMBRE"]);
    $("#mostrar_subcategoria_eliminar").text(data["SUBC_NOMBRE"]);
    $("#mostrar_categoria_eliminar").text(data["CATE_NOMBRE"]);
    bodyScroll_eliminar_subcategoria();
    contenedor_modal_eliminar_subcategoria.classList.add(
        "activar_bg_eliminar_subcategoria"
    );
    modal_eliminar_subcategoria.classList.toggle(
        "cerrar_modal_eliminar_subcategoria"
    );
}

cerrar_modal_eliminar_subcategoria.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_eliminar_subcategoria();
    modal_eliminar_subcategoria.classList.toggle(
        "cerrar_modal_eliminar_subcategoria"
    );
    setTimeout(function () {
        contenedor_modal_eliminar_subcategoria.classList.remove(
            "activar_bg_eliminar_subcategoria"
        );
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_eliminar_subcategoria) {
        bodyScroll_eliminar_subcategoria();
        modal_eliminar_subcategoria.classList.toggle(
            "cerrar_modal_eliminar_subcategoria"
        );
        setTimeout(function () {
            contenedor_modal_eliminar_subcategoria.classList.remove(
                "activar_bg_eliminar_subcategoria"
            );
        }, 800);
    }
});

function bodyScroll_eliminar_subcategoria() {
    document.body.classList.toggle("no-scroll_eliminar");
}

// !VALIDAR IMAGEN MODAL NUEVO
// !VALIDAR IMAGEN MODAL NUEVO
// !VALIDAR IMAGEN MODAL NUEVO

const input_file_nuevo = document.querySelector("#input_file_nuevo");
input_file_nuevo.addEventListener("change", function () {
    let text = this.value;
    text = text.replace(/^.*\\/, "");
    document.getElementById("txt_imagen_nuevo_categorias").value = text;
    activarMsgCorrecto_nuevo_categoria("txt_imagen_nuevo_categorias");
    document
        .getElementById("contenedor_img_nuevo_categoria")
        .classList.add("contenedor_img-categoria-correcto");
});
// !VALIDAR IMAGEN MODAL EDITAR
// !VALIDAR IMAGEN MODAL EDITAR
// !VALIDAR IMAGEN MODAL EDITAR

const input_file_editar = document.querySelector("#input_file_editar");
input_file_editar.addEventListener("change", function () {
    let text = this.value;
    text = text.replace(/^.*\\/, "");
    document.getElementById("txt_imagen_editar_categorias").value = text;
    activarMsgCorrecto_editar_categoria("txt_imagen_editar_categorias");
    document
        .getElementById("contenedor_img_editar_categoria")
        .classList.add("contenedor_img-categoria-correcto");
});

// !PREVISUALIZAR IMAGEN MODAL NUEVA CATEGORIA
// !PREVISUALIZAR IMAGEN MODAL NUEVA CATEGORIA
// !PREVISUALIZAR IMAGEN MODAL NUEVA CATEGORIA

let vista_preliminar_nuevo = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById("img_nuevo_categoria");

    leer_img.onload = () => {
        if (leer_img.readyState == 2) {
            id_img.src = leer_img.result;
        }
    };
    leer_img.readAsDataURL(event.target.files[0]);
};

// !PREVISUALIZAR IMAGEN MODAL EDITAR CATEGORIA
// !PREVISUALIZAR IMAGEN MODAL EDITAR CATEGORIA
// !PREVISUALIZAR IMAGEN MODAL EDITAR CATEGORIA

let vista_preliminar_editar = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById("img_editar_categoria");

    leer_img.onload = () => {
        if (leer_img.readyState == 2) {
            id_img.src = leer_img.result;
        }
    };
    leer_img.readAsDataURL(event.target.files[0]);
};
