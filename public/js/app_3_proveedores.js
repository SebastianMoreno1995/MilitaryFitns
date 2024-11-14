// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

$(document).ready(function () {
    //-------------------------------------------|| CONSULTA POR DEPARTAMENTO  ||--------------------------------
    $("#sel_departamento_nuevo_proveedores").change(function () {
        BuscarCiudad(
            $("#sel_departamento_nuevo_proveedores").val(),
            "Registro"
        );
    });

    $("#sel_departamento_editar_proveedores").change(function () {
        BuscarCiudad(
            $("#sel_departamento_editar_proveedores").val(),
            "Modificar"
        );
    });
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO
// !VALIDACION DE LOS INPUTS DEL FORMULARIO NUEVO

const formulario_nuevo_proveedores = document.getElementById(
    "formulario_nuevo_proveedores"
);
const inputs_nuevo = document.querySelectorAll(
    "#formulario_nuevo_proveedores input"
);
const selects_nuevo = document.querySelectorAll(
    "#formulario_nuevo_proveedores select"
);

const expresiones_nuevo = {
    txt_nombre_nuevo_proveedores: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    sel_tipoDocumento_nuevo_proveedores: /^\d{1,40}$/, // Valida numeros
    num_documento_nuevo_proveedores: /^\d{3,10}$/, // 3 a 10 numeros.
    sel_departamento_nuevo_proveedores: /^\d{1,40}$/, // Letras y espacios, pueden llevar acentos.
    sel_municipio_nuevo_proveedores: /^\d{1,40}$/, // Letras y espacios, pueden llevar acentos.
    txt_direccion_nuevo_proveedores: /^[#.0-9a-zA-Z\s,-]{8,80}$/, // Letras y espacios, pueden llevar acentos.
    num_telefono_nuevo_proveedores: /^\d{7,12}$/, // 7 a 12 numeros.
    num_celular_nuevo_proveedores: /^\d{10}$/, // 10 numeros.
    txt_correo_nuevo_proveedores:
        /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Formato de correo
    sel_estado_nuevo_proveedores: /^\d{1,40}$/, // Valida numeros
};

const campos_nuevo = {
    txt_nombre_nuevo_proveedores: false,
    sel_tipoDocumento_nuevo_proveedores: false,
    num_documento_nuevo_proveedores: false,
    sel_departamento_nuevo_proveedores: false,
    sel_municipio_nuevo_proveedores: false,
    txt_direccion_nuevo_proveedores: false,
    num_telefono_nuevo_proveedores: false,
    num_celular_nuevo_proveedores: false,
    txt_correo_nuevo_proveedores: false,
    sel_estado_nuevo_proveedores: false,
};

const validarFormulario_nuevo_proveedores = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_nombre_nuevo_proveedores":
            validarCampoInput_nuevo(
                expresiones_nuevo.txt_nombre_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_tipoDocumento_nuevo_proveedores":
            var valor =
                sel_tipoDocumento_nuevo_proveedores.options[
                    sel_tipoDocumento_nuevo_proveedores.selectedIndex
                ].value;
            validarCampoSelect_nuevo(
                expresiones_nuevo.sel_tipoDocumento_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "num_documento_nuevo_proveedores":
            validarCampoInput_nuevo(
                expresiones_nuevo.num_documento_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_departamento_nuevo_proveedores":
            var valor =
                sel_departamento_nuevo_proveedores.options[
                    sel_departamento_nuevo_proveedores.selectedIndex
                ].value;
            validarCampoSelect_nuevo(
                expresiones_nuevo.sel_departamento_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_municipio_nuevo_proveedores":
            var valor =
                sel_municipio_nuevo_proveedores.options[
                    sel_municipio_nuevo_proveedores.selectedIndex
                ].value;
            validarCampoSelect_nuevo(
                expresiones_nuevo.sel_municipio_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "txt_direccion_nuevo_proveedores":
            validarCampoInput_nuevo(
                expresiones_nuevo.txt_direccion_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "num_telefono_nuevo_proveedores":
            validarCampoInput_nuevo(
                expresiones_nuevo.num_telefono_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "num_celular_nuevo_proveedores":
            validarCampoInput_nuevo(
                expresiones_nuevo.num_celular_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "txt_correo_nuevo_proveedores":
            validarCampoInput_nuevo(
                expresiones_nuevo.txt_correo_nuevo_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_nuevo_proveedores":
            var valor =
                sel_estado_nuevo_proveedores.options[
                    sel_estado_nuevo_proveedores.selectedIndex
                ].value;
            validarCampoSelect_nuevo(
                expresiones_nuevo.sel_estado_nuevo_proveedores,
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
    input.addEventListener("keyup", validarFormulario_nuevo_proveedores);
    input.addEventListener("blur", validarFormulario_nuevo_proveedores);
});
selects_nuevo.forEach((select) => {
    select.addEventListener("change", validarFormulario_nuevo_proveedores);
    select.addEventListener("blur", validarFormulario_nuevo_proveedores);
});

var txt_nombre_nuevo_proveedores = document.getElementById(
    "txt_nombre_nuevo_proveedores"
);
var sel_tipoDocumento_nuevo_proveedores = document.getElementById(
    "sel_tipoDocumento_nuevo_proveedores"
);
var num_documento_nuevo_proveedores = document.getElementById(
    "num_documento_nuevo_proveedores"
);
var sel_departamento_nuevo_proveedores = document.getElementById(
    "sel_departamento_nuevo_proveedores"
);
var sel_municipio_nuevo_proveedores = document.getElementById(
    "sel_municipio_nuevo_proveedores"
);
var txt_direccion_nuevo_proveedores = document.getElementById(
    "txt_direccion_nuevo_proveedores"
);
var num_telefono_nuevo_proveedores = document.getElementById(
    "num_telefono_nuevo_proveedores"
);
var num_celular_nuevo_proveedores = document.getElementById(
    "num_celular_nuevo_proveedores"
);
var txt_correo_nuevo_proveedores = document.getElementById(
    "txt_correo_nuevo_proveedores"
);
var sel_estado_nuevo_proveedores = document.getElementById(
    "sel_estado_nuevo_proveedores"
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
        txt_nombre_nuevo_proveedores.value != "" &&
        txt_nombre_nuevo_proveedores.value != null
    ) {
        campos_editar["txt_nombre_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("txt_nombre_nuevo_proveedores");
    }
    if (
        sel_tipoDocumento_nuevo_proveedores.value != "" &&
        sel_tipoDocumento_nuevo_proveedores.value != null
    ) {
        campos_editar["sel_tipoDocumento_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("sel_tipoDocumento_nuevo_proveedores");
    }
    if (
        num_documento_nuevo_proveedores.value != "" &&
        num_documento_nuevo_proveedores.value != null
    ) {
        campos_editar["num_documento_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("num_documento_nuevo_proveedores");
    }
    if (
        sel_departamento_nuevo_proveedores.value != "" &&
        sel_departamento_nuevo_proveedores.value != null
    ) {
        campos_editar["sel_departamento_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("sel_departamento_nuevo_proveedores");
    }
    if (
        sel_municipio_nuevo_proveedores.value != "" &&
        sel_municipio_nuevo_proveedores.value != null
    ) {
        campos_editar["sel_municipio_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("sel_municipio_nuevo_proveedores");
    }
    if (
        txt_direccion_nuevo_proveedores.value != "" &&
        txt_direccion_nuevo_proveedores.value != null
    ) {
        campos_editar["txt_direccion_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("txt_direccion_nuevo_proveedores");
    }
    if (
        num_telefono_nuevo_proveedores.value != "" &&
        num_telefono_nuevo_proveedores.value != null
    ) {
        campos_editar["num_telefono_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("num_telefono_nuevo_proveedores");
    }
    if (
        num_celular_nuevo_proveedores.value != "" &&
        num_celular_nuevo_proveedores.value != null
    ) {
        campos_editar["num_celular_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("num_celular_nuevo_proveedores");
    }
    if (
        txt_correo_nuevo_proveedores.value != "" &&
        txt_correo_nuevo_proveedores.value != null
    ) {
        campos_editar["txt_correo_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("txt_correo_nuevo_proveedores");
    }
    if (
        sel_estado_nuevo_proveedores.value != "" &&
        sel_estado_nuevo_proveedores.value != null
    ) {
        campos_editar["sel_estado_nuevo_proveedores"] = true;
    } else {
        activarMsgErrors("sel_estado_nuevo_proveedores");
    }
}

formulario_nuevo_proveedores.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion();
    if (
        campos_nuevo.txt_nombre_nuevo_proveedores &&
        campos_nuevo.sel_tipoDocumento_nuevo_proveedores &&
        campos_nuevo.num_documento_nuevo_proveedores &&
        campos_nuevo.sel_departamento_nuevo_proveedores &&
        campos_nuevo.sel_municipio_nuevo_proveedores &&
        campos_nuevo.txt_direccion_nuevo_proveedores &&
        campos_nuevo.num_telefono_nuevo_proveedores &&
        campos_nuevo.num_celular_nuevo_proveedores &&
        campos_nuevo.txt_correo_nuevo_proveedores &&
        campos_nuevo.sel_estado_nuevo_proveedores
    ) {
        formulario_nuevo_proveedores.submit();
    } else {
        // alert(campos_nuevo.txt_nombre_nuevo_proveedores + " " +
        // campos_nuevo.sel_tipoDocumento_nuevo_proveedores &&
        // campos_nuevo.num_documento_nuevo_proveedores &&
        // campos_nuevo.sel_departamento_nuevo_proveedores &&
        // campos_nuevo.sel_municipio_nuevo_proveedores &&
        // campos_nuevo.txt_direccion_nuevo_proveedores &&
        // campos_nuevo.num_telefono_nuevo_proveedores &&
        // campos_nuevo.num_celular_nuevo_proveedores &&
        // campos_nuevo.txt_correo_nuevo_proveedores &&
        // campos_nuevo.sel_estado_nuevo_proveedores);
    }
});

// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR
// !VALIDACION DE LOS INPUTS DEL FORMULARIO EDITAR

const formulario_editar_proveedores = document.getElementById(
    "formulario_editar_proveedores"
);
const inputs_editar = document.querySelectorAll(
    "#formulario_editar_proveedores input"
);
const selects_editar = document.querySelectorAll(
    "#formulario_editar_proveedores select"
);

const expresiones_editar = {
    txt_nombre_editar_proveedores: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    sel_tipoDocumento_editar_proveedores: /^\d{1,40}$/, // Valida numeros.
    num_documento_editar_proveedores: /^\d{3,10}$/, // 3 a 10 numeros.
    sel_departamento_editar_proveedores: /^\d{1,40}$/, // Letras y espacios, pueden llevar acentos.
    sel_municipio_editar_proveedores: /^\d{1,40}$/, // Letras y espacios, pueden llevar acentos.
    txt_direccion_editar_proveedores: /^[#.0-9a-zA-Z\s,-]{8,80}$/, // Letras y espacios, pueden llevar acentos.
    num_telefono_editar_proveedores: /^\d{7,12}$/, // 7 a 12 numeros.
    num_celular_editar_proveedores: /^\d{10}$/, // 10 numeros.
    txt_correo_editar_proveedores:
        /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Formato de correo
    sel_estado_editar_proveedores: /^\d{1,40}$/, // Valida numeros.
};

const campos_editar = {
    txt_nombre_editar_proveedores: false,
    sel_tipoDocumento_editar_proveedores: false,
    num_documento_editar_proveedores: false,
    sel_departamento_editar_proveedores: false,
    sel_municipio_editar_proveedores: false,
    txt_direccion_editar_proveedores: false,
    num_telefono_editar_proveedores: false,
    num_celular_editar_proveedores: false,
    txt_correo_editar_proveedores: false,
    sel_estado_editar_proveedores: false,
};

const validarFormulario_editar = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_nombre_editar_proveedores":
            validarCampoInput_editar(
                expresiones_editar.txt_nombre_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_tipoDocumento_editar_proveedores":
            var valor =
                sel_tipoDocumento_editar_proveedores.options[
                    sel_tipoDocumento_editar_proveedores.selectedIndex
                ].value;
            validarCampoSelect_select(
                expresiones_editar.sel_tipoDocumento_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "num_documento_editar_proveedores":
            validarCampoInput_editar(
                expresiones_editar.num_documento_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_departamento_editar_proveedores":
            var valor =
                sel_departamento_editar_proveedores.options[
                    sel_departamento_editar_proveedores.selectedIndex
                ].value;
            validarCampoSelect_select(
                expresiones_editar.sel_departamento_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_municipio_editar_proveedores":
            var valor =
                sel_municipio_editar_proveedores.options[
                    sel_municipio_editar_proveedores.selectedIndex
                ].value;
            validarCampoSelect_select(
                expresiones_editar.sel_municipio_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "txt_direccion_editar_proveedores":
            validarCampoInput_editar(
                expresiones_editar.txt_direccion_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "num_telefono_editar_proveedores":
            validarCampoInput_editar(
                expresiones_editar.num_telefono_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "num_celular_editar_proveedores":
            validarCampoInput_editar(
                expresiones_editar.num_celular_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "txt_correo_editar_proveedores":
            validarCampoInput_editar(
                expresiones_editar.txt_correo_editar_proveedores,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_editar_proveedores":
            var valor =
                sel_estado_editar_proveedores.options[
                    sel_estado_editar_proveedores.selectedIndex
                ].value;
            validarCampoSelect_select(
                expresiones_editar.sel_estado_editar_proveedores,
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
const validarCampoSelect_select = (expresion, select, campo) => {
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
    input.addEventListener("keyup", validarFormulario_editar);
    input.addEventListener("blur", validarFormulario_editar);
});
selects_editar.forEach((select) => {
    select.addEventListener("change", validarFormulario_editar);
    select.addEventListener("blur", validarFormulario_editar);
});

var txt_nombre_editar_proveedores = document.getElementById(
    "txt_nombre_editar_proveedores"
);
var sel_tipoDocumento_editar_proveedores = document.getElementById(
    "sel_tipoDocumento_editar_proveedores"
);
var num_documento_editar_proveedores = document.getElementById(
    "num_documento_editar_proveedores"
);
var sel_departamento_editar_proveedores = document.getElementById(
    "sel_departamento_editar_proveedores"
);
var sel_municipio_editar_proveedores = document.getElementById(
    "sel_municipio_editar_proveedores"
);
var txt_direccion_editar_proveedores = document.getElementById(
    "txt_direccion_editar_proveedores"
);
var num_telefono_editar_proveedores = document.getElementById(
    "num_telefono_editar_proveedores"
);
var num_celular_editar_proveedores = document.getElementById(
    "num_celular_editar_proveedores"
);
var txt_correo_editar_proveedores = document.getElementById(
    "txt_correo_editar_proveedores"
);
var sel_estado_editar_proveedores = document.getElementById(
    "sel_estado_editar_proveedores"
);

function activarMsgErrors_editar(campo) {
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

function revalidacion_editar() {
    if (
        txt_nombre_editar_proveedores.value != "" &&
        txt_nombre_editar_proveedores.value != null
    ) {
        campos_editar["txt_nombre_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("txt_nombre_editar_proveedores");
    }
    if (
        sel_tipoDocumento_editar_proveedores.value != "" &&
        sel_tipoDocumento_editar_proveedores.value != null
    ) {
        campos_editar["sel_tipoDocumento_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("sel_tipoDocumento_editar_proveedores");
    }
    if (
        num_documento_editar_proveedores.value != "" &&
        num_documento_editar_proveedores.value != null
    ) {
        campos_editar["num_documento_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("num_documento_editar_proveedores");
    }
    if (
        sel_departamento_editar_proveedores.value != "" &&
        sel_departamento_editar_proveedores.value != null
    ) {
        campos_editar["sel_departamento_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("sel_departamento_editar_proveedores");
    }
    if (
        sel_municipio_editar_proveedores.value != "" &&
        sel_municipio_editar_proveedores.value != null
    ) {
        campos_editar["sel_municipio_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("sel_municipio_editar_proveedores");
    }
    if (
        txt_direccion_editar_proveedores.value != "" &&
        txt_direccion_editar_proveedores.value != null
    ) {
        campos_editar["txt_direccion_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("txt_direccion_editar_proveedores");
    }
    if (
        num_telefono_editar_proveedores.value != "" &&
        num_telefono_editar_proveedores.value != null
    ) {
        campos_editar["num_telefono_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("num_telefono_editar_proveedores");
    }
    if (
        num_celular_editar_proveedores.value != "" &&
        num_celular_editar_proveedores.value != null
    ) {
        campos_editar["num_celular_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("num_celular_editar_proveedores");
    }
    if (
        txt_correo_editar_proveedores.value != "" &&
        txt_correo_editar_proveedores.value != null
    ) {
        campos_editar["txt_correo_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("txt_correo_editar_proveedores");
    }
    if (
        sel_estado_editar_proveedores.value != "" &&
        sel_estado_editar_proveedores.value != null
    ) {
        campos_editar["sel_estado_editar_proveedores"] = true;
    } else {
        activarMsgErrors_editar("sel_estado_editar_proveedores");
    }
}

formulario_editar_proveedores.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_editar();
    if (
        campos_editar.txt_nombre_editar_proveedores &&
        campos_editar.sel_tipoDocumento_editar_proveedores &&
        campos_editar.num_documento_editar_proveedores &&
        campos_editar.sel_departamento_editar_proveedores &&
        campos_editar.sel_municipio_editar_proveedores &&
        campos_editar.txt_direccion_editar_proveedores &&
        campos_editar.num_telefono_editar_proveedores &&
        campos_editar.num_celular_editar_proveedores &&
        campos_editar.txt_correo_editar_proveedores &&
        campos_editar.sel_estado_editar_proveedores
    ) {
        formulario_editar_proveedores.submit();
    } else {
        // alert(campos_editar.txt_nombre_editar_proveedores + " " +
        // campos_editar.sel_tipoDocumento_editar_proveedores &&
        // campos_editar.num_documento_editar_proveedores &&
        // campos_editar.sel_departamento_editar_proveedores &&
        // campos_editar.sel_municipio_editar_proveedores &&
        // campos_editar.txt_direccion_editar_proveedores &&
        // campos_editar.num_telefono_editar_proveedores &&
        // campos_editar.num_celular_editar_proveedores &&
        // campos_editar.txt_correo_editar_proveedores &&
        // campos_editar.sel_estado_editar_proveedores);
    }
});

// TODOS LOS MODALES
// TODOS LOS MODALES
// TODOS LOS MODALES

// !MODAL NUEVO
// !MODAL NUEVO
// !MODAL NUEVO

var abrir_nuevo = document.querySelector(".btn_abrir_modal_nuevo");
var cerrar_nuevo = document.querySelector(".btn_cerrar_nuevo");
var contenedor_modal_nuevo = document.querySelector(".contenedor_modal_nuevo");
var modal_nuevo = document.querySelector(".modal_nuevo");

abrir_nuevo.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_nuevo();
    contenedor_modal_nuevo.classList.add("activar_bg_nuevo");
    modal_nuevo.classList.toggle("cerrar_modal_nuevo");
});

cerrar_nuevo.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_nuevo();
    modal_nuevo.classList.toggle("cerrar_modal_nuevo");
    setTimeout(function () {
        contenedor_modal_nuevo.classList.remove("activar_bg_nuevo");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_nuevo) {
        bodyScroll_nuevo();
        modal_nuevo.classList.toggle("cerrar_modal_nuevo");
        setTimeout(function () {
            contenedor_modal_nuevo.classList.remove("activar_bg_nuevo");
        }, 800);
    }
});

function bodyScroll_nuevo() {
    document.body.classList.toggle("no-scroll_nuevo");
}

// !MODAL VER
// !MODAL VER
// !MODAL VER

var abrir_modal_ver = document.querySelector(".btn_abrir_modal_ver");
var cerrar_modal_ver = document.querySelector(".btn_cerrar_modal_ver");
var contenedor_modal_ver = document.querySelector(".contenedor_modal_ver");
var modal_ver = document.querySelector(".modal_ver");

function modalVer(Prod_id) {
    bodyScroll_ver();
    InformacionProveedor(Prod_id, "Ver");
    contenedor_modal_ver.classList.add("activar_bg_ver");
    modal_ver.classList.toggle("cerrar_modal_ver");
}

cerrar_modal_ver.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_ver();
    modal_ver.classList.toggle("cerrar_modal_ver");
    setTimeout(function () {
        contenedor_modal_ver.classList.remove("activar_bg_ver");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_ver) {
        bodyScroll_ver();
        modal_ver.classList.toggle("cerrar_modal_ver");
        setTimeout(function () {
            contenedor_modal_ver.classList.remove("activar_bg_ver");
        }, 800);
    }
});

function bodyScroll_ver() {
    document.body.classList.toggle("no-scroll_ver");
}

// !MODAL EDITAR
// !MODAL EDITAR
// !MODAL EDITAR

var abrir_editar = document.querySelector(".btn_abrir_modal_editar");
var contenedor_modal_editar = document.querySelector(
    ".contenedor_modal_editar"
);
var modal_editar = document.querySelector(".modal_editar");

function modalEditar(Prod_id) {
    bodyScroll_editar();
    InformacionProveedor(Prod_id, "Editar");
    contenedor_modal_editar.classList.add("activar_bg_editar");
    modal_editar.classList.toggle("cerrar_modal_editar");
}

function cerrar_editar() {
    bodyScroll_editar();
    modal_editar.classList.toggle("cerrar_modal_editar");
    setTimeout(function () {
        contenedor_modal_editar.classList.remove("activar_bg_editar");
    }, 800);
}

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_modal_editar) {
        bodyScroll_editar();
        modal_editar.classList.toggle("cerrar_modal_editar");
        setTimeout(function () {
            contenedor_modal_editar.classList.remove("activar_bg_editar");
        }, 800);
    }
});

function bodyScroll_editar() {
    document.body.classList.toggle("no-scroll_editar");
}

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var abrir_popup_eliminar = document.querySelector(".btn_abrir_popup_eliminar");
var cerrar_popup_eliminar = document.querySelector(
    ".btn_cerrar_popup_eliminar"
);
var contenedor_popup_eliminar = document.querySelector(
    ".contenedor_popup_eliminar"
);
var popup_eliminar = document.querySelector(".popup_eliminar");

function modalEliminar(Prod_id) {
    bodyScroll_eliminar();
    InformacionProveedor(Prod_id, "Eliminar");
    contenedor_popup_eliminar.classList.add("activar_bg_eliminar");
    popup_eliminar.classList.toggle("cerrar_popup_eliminar");
}

cerrar_popup_eliminar.addEventListener("click", function (e) {
    e.preventDefault();
    bodyScroll_eliminar();
    popup_eliminar.classList.toggle("cerrar_popup_eliminar");
    setTimeout(function () {
        contenedor_popup_eliminar.classList.remove("activar_bg_eliminar");
    }, 800);
});

window.addEventListener("click", function (e) {
    let target = e.target;
    if (target == contenedor_popup_eliminar) {
        bodyScroll_eliminar();
        popup_eliminar.classList.toggle("cerrar_popup_eliminar");
        setTimeout(function () {
            contenedor_popup_eliminar.classList.remove("activar_bg_eliminar");
        }, 800);
    }
});

function bodyScroll_eliminar() {
    document.body.classList.toggle("no-scroll_eliminar");
}

// --------------------------------------------------

function InformacionProveedor(Prov_id, tipo) {
    $.ajax({
        url: "InfoProveedores",
        type: "GET",
        data: {
            Prov_id: Prov_id,
            _token: $('input[name="_token"]').val(),
        },
    }).done(function (data) {
        var arreglo = JSON.parse(data);
        if (tipo == "Ver") {
            $("#Proveedor_Nombre_info").text(arreglo[0]["PROV_NOMBRE"]);
            $("#Proveedor_TipoDoc_info").text(arreglo[0]["TIDO_DESCRIPCION"]);
            $("#Proveedor_Nit_info").text(arreglo[0]["PROV_NIT"]);
            $("#Proveedor_Direccion_info").text(arreglo[0]["PROV_DIRECCION"]);
            $("#Proveedor_Departamento_info").text(
                arreglo[0]["DEPA_DESCRIPCION"]
            );
            $("#Proveedor_Ciudad_info").text(arreglo[0]["CIUD_DESCRIPCION"]);
            $("#Proveedor_Telefono_info").text(arreglo[0]["PROV_TELEFONO"]);
            $("#Proveedor_Celular_info").text(arreglo[0]["PROV_CELULAR"]);
            $("#Proveedor_Correo_info").text(arreglo[0]["PROV_CORREO"]);
            $("#Proveedor_Estado_info").text(arreglo[0]["ESTA_TIPO"]);
        }
        if (tipo == "Editar") {
            $("#Prov_id").val(arreglo[0]["PROV_ID"]);
            $("#txt_nombre_editar_proveedores").val(arreglo[0]["PROV_NOMBRE"]);
            $("#sel_tipoDocumento_editar_proveedores option")
                .removeAttr("selected")
                .filter("[value=" + arreglo[0]["TIDO_ID"] + "]")
                .attr("selected", true);
            $("#num_documento_editar_proveedores").val(arreglo[0]["PROV_NIT"]);
            $("#txt_direccion_editar_proveedores").val(
                arreglo[0]["PROV_DIRECCION"]
            );
            $("#sel_departamento_editar_proveedores option")
                .removeAttr("selected")
                .filter("[value=" + arreglo[0]["DEPA_ID"] + "]")
                .attr("selected", true);

            BuscarCiudad(arreglo[0]["DEPA_ID"], "Modificar");
            // $("#sel_municipio_editar_proveedores").val();
            $("#num_telefono_editar_proveedores").val(
                arreglo[0]["PROV_TELEFONO"]
            );
            $("#num_celular_editar_proveedores").val(
                arreglo[0]["PROV_CELULAR"]
            );
            $("#txt_correo_editar_proveedores").val(arreglo[0]["PROV_CORREO"]);
            $("#sel_estado_editar_proveedores option")
                .removeAttr("selected")
                .filter("[value=" + arreglo[0]["ESTA_ID"] + "]")
                .attr("selected", true);
        }
        if (tipo == "Eliminar") {
            $("#Proveedor_id_eliminar").val(arreglo[0]["PROV_ID"]);
            $("#Proveedor_Nombre_eliminar").text(arreglo[0]["PROV_NOMBRE"]);
            $("#Proveedor_TipoDoc_eliminar").text(
                arreglo[0]["TIDO_DESCRIPCION"]
            );
            $("#Proveedor_Documento_eliminar").text(arreglo[0]["PROV_NIT"]);
        }
    });
}

function BuscarCiudad(IdDepartamento, opcion) {
    $.ajax({
        url: "http://localhost/MilitaryFitns/public/CiudadEspecifica",
        type: "Post",
        data: {
            IdDepartamento: IdDepartamento,
            _token: $('input[name="_token"]').val(),
        },
    }).done(function (data) {
        var arreglo = JSON.parse(data);
        if (opcion == "Registro") {
            $("#sel_municipio_nuevo_proveedores").empty();
            $("#sel_municipio_nuevo_proveedores").append(
                '<option value="" selected></option>'
            );
            for (var i = 0; i < arreglo.length; i++) {
                $("#sel_municipio_nuevo_proveedores").append(
                    '<option value="' +
                        arreglo[i]["CIUD_ID"] +
                        '" >' +
                        arreglo[i]["CIUD_DESCRIPCION"] +
                        "</option>"
                );
            }
            $("#sel_municipio_nuevo_proveedores option")
                .removeAttr("selected")
                .filter("[value=" + $("#IdCiudadBd").val() + "]")
                .attr("selected", true);
        }
        if (opcion == "Modificar") {
            $("#sel_municipio_editar_proveedores").empty();
            $("#sel_municipio_editar_proveedores").append(
                '<option value="" selected></option>'
            );
            for (var i = 0; i < arreglo.length; i++) {
                $("#sel_municipio_editar_proveedores").append(
                    '<option value="' +
                        arreglo[i]["CIUD_ID"] +
                        '" >' +
                        arreglo[i]["CIUD_DESCRIPCION"] +
                        "</option>"
                );
            }
            $("#sel_municipio_editar_proveedores option")
                .removeAttr("selected")
                .filter("[value=" + arreglo[0]["CIUD_ID"] + "]")
                .attr("selected", true);
        }
    });
}
