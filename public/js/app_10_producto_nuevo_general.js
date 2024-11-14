// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES
// TODO VALIDACIONES Y MODALES

// !VALIDACIONES CAMPOS NUEVO PRODUCTO
// !VALIDACIONES CAMPOS NUEVO PRODUCTO
// !VALIDACIONES CAMPOS NUEVO PRODUCTO
//-------------------------------------------|| CONSULTA POR DEPARTAMENTO  ||--------------------------------
$(document).ready(function () {
    $("#sel_categoria_nuevo_producto").change(function () {
        BuscarSubcategorias(
            $("#sel_categoria_nuevo_producto").val(),
            $("#Ruta_SubCategoria").val()
        );
    });
});

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
    txt_nombre_nuevo_producto: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{2,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    txt_complemento_nuevo_producto: /^[*.0-9a-zA-ZÀ-ÿ\s,@!¡¿?=$%&|°<>;#-\:\_\"]{1,30}$/, // Letras, numeros y espacios, pueden llevar acentos.
    sel_marca_nuevo_producto: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
    sel_categoria_nuevo_producto: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
    sel_subcategoria_nuevo_producto: /^[#.0-9a-zA-Z\s,-]{1,10}$/, // Valida numeros
    sel_estado_nuevo_producto: /^\d{1,10}$/, // 1 a 10 numeros.
    are_descripcion_nuevo_producto: /^[*.0-9a-zA-ZÀ-ÿ\s,@!¡¿?=$%&|°<>;#-\:\_\"]{4,2000}$/, 
    are_advertencia_nuevo_producto: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{4,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    // txt_codigoBarras_nuevo_producto: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{4,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
    txt_invima_nuevo_producto: /^[#.0-9a-zA-ZÀ-ÿ\s,-]{1,250}$/, // Letras, numeros y espacios, pueden llevar acentos.
};

const campos_nuevo_producto = {
    txt_nombre_nuevo_producto: false,
    txt_complemento_nuevo_producto: false,
    sel_marca_nuevo_producto: false,
    sel_categoria_nuevo_producto: false,
    sel_subcategoria_nuevo_producto: false,
    sel_estado_nuevo_producto: false,
    are_descripcion_nuevo_producto: false,
    are_advertencia_nuevo_producto: false,
    // txt_codigoBarras_nuevo_producto: false,
    txt_invima_nuevo_producto: false,
};

const validarformulario_nuevo_producto = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_nombre_nuevo_producto":
            validarCampoInput_nuevo_producto(
                expresiones_nuevo_producto.txt_nombre_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "txt_complemento_nuevo_producto":
            validarCampoInput_nuevo_producto(
                expresiones_nuevo_producto.txt_complemento_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "sel_marca_nuevo_producto":
            var valor =
                sel_marca_nuevo_producto.options[
                    sel_marca_nuevo_producto.selectedIndex
                ].value;
            validarCampoSelect_nuevo_producto(
                expresiones_nuevo_producto.sel_marca_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "sel_categoria_nuevo_producto":
            var valor =
                sel_categoria_nuevo_producto.options[
                    sel_categoria_nuevo_producto.selectedIndex
                ].value;
            validarCampoSelect_nuevo_producto(
                expresiones_nuevo_producto.sel_categoria_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "sel_subcategoria_nuevo_producto":
            var valor =
                sel_subcategoria_nuevo_producto.options[
                    sel_subcategoria_nuevo_producto.selectedIndex
                ].value;
            validarCampoSelect_nuevo_producto(
                expresiones_nuevo_producto.sel_subcategoria_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "sel_estado_nuevo_producto":
            var valor =
                sel_estado_nuevo_producto.options[
                    sel_estado_nuevo_producto.selectedIndex
                ].value;
            validarCampoSelect_nuevo_producto(
                expresiones_nuevo_producto.sel_estado_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "are_descripcion_nuevo_producto":
            validarCampoTextArea_nuevo_producto(
                expresiones_nuevo_producto.are_descripcion_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        case "are_advertencia_nuevo_producto":
            validarCampoTextArea_nuevo_producto(
                expresiones_nuevo_producto.are_advertencia_nuevo_producto,
                e.target,
                e.target.name
            );
            break;
        // case "txt_codigoBarras_nuevo_producto":
        //     validarCampoInput_nuevo_producto(
        //         expresiones_nuevo_producto.txt_codigoBarras_nuevo_producto,
        //         e.target,
        //         e.target.name
        //     );
        //     break;
        case "txt_invima_nuevo_producto":
            validarCampoInput_nuevo_producto(
                expresiones_nuevo_producto.txt_invima_nuevo_producto,
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

// VALIDA TEXTAREAS
// VALIDA TEXTAREAS
const validarCampoTextArea_nuevo_producto = (expresion, textarea, campo) => {
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

// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_nuevo_producto = (expresion, select, campo) => {
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

// CAPTURA EL EVENTO EN LOS INPUTS, SELECTS Y LOS TEXTAREA EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS, SELECTS Y LOS TEXTAREA EN EL FORMULARIO
inputs_nuevo_producto.forEach((input) => {
    input.addEventListener("keyup", validarformulario_nuevo_producto);
    input.addEventListener("blur", validarformulario_nuevo_producto);
    input.addEventListener("change", validarformulario_nuevo_producto);
});
textareas_nuevo_producto.forEach((textarea) => {
    textarea.addEventListener("keyup", validarformulario_nuevo_producto);
    textarea.addEventListener("blur", validarformulario_nuevo_producto);
});
selects_nuevo_producto.forEach((select) => {
    select.addEventListener("change", validarformulario_nuevo_producto);
    select.addEventListener("blur", validarformulario_nuevo_producto);
});

// REVALIDACIONES
// REVALIDACIONES
var txt_nombre_nuevo_producto = document.getElementById(
    "txt_nombre_nuevo_producto"
);
var txt_complemento_nuevo_producto = document.getElementById(
    "txt_complemento_nuevo_producto"
);
var sel_marca_nuevo_producto = document.getElementById(
    "sel_marca_nuevo_producto"
);
var sel_categoria_nuevo_producto = document.getElementById(
    "sel_categoria_nuevo_producto"
);
var sel_subcategoria_nuevo_producto = document.getElementById(
    "sel_subcategoria_nuevo_producto"
);
var sel_estado_nuevo_producto = document.getElementById(
    "sel_estado_nuevo_producto"
);
var are_descripcion_nuevo_producto = document.getElementById(
    "are_descripcion_nuevo_producto"
);
var are_advertencia_nuevo_producto = document.getElementById(
    "are_advertencia_nuevo_producto"
);
// var txt_codigoBarras_nuevo_producto = document.getElementById(
//     "txt_codigoBarras_nuevo_producto"
// );
var txt_invima_nuevo_producto = document.getElementById(
    "txt_invima_nuevo_producto"
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
        txt_nombre_nuevo_producto.value != "" &&
        txt_nombre_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["txt_nombre_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("txt_nombre_nuevo_producto");
    }
    if (
        txt_complemento_nuevo_producto.value != "" &&
        txt_complemento_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["txt_complemento_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("txt_complemento_nuevo_producto");
    }
    if (
        sel_marca_nuevo_producto.value != "" &&
        sel_marca_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["sel_marca_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("sel_marca_nuevo_producto");
    }
    if (
        sel_categoria_nuevo_producto.value != "" &&
        sel_categoria_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["sel_categoria_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("sel_categoria_nuevo_producto");
    }
    if (
        sel_subcategoria_nuevo_producto.value != "" &&
        sel_subcategoria_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["sel_subcategoria_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("sel_subcategoria_nuevo_producto");
    }
    if (
        sel_estado_nuevo_producto.value != "" &&
        sel_estado_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["sel_estado_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("sel_estado_nuevo_producto");
    }
    if (
        are_descripcion_nuevo_producto.value != "" &&
        are_descripcion_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["are_descripcion_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("are_descripcion_nuevo_producto");
    }
    if (
        are_advertencia_nuevo_producto.value != "" &&
        are_advertencia_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["are_advertencia_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("are_advertencia_nuevo_producto");
    }
    // if (
    //     txt_codigoBarras_nuevo_producto.value != "" &&
    //     txt_codigoBarras_nuevo_producto.value != null
    // ) {
    //     campos_nuevo_producto["txt_codigoBarras_nuevo_producto"] = true;
    // } else {
    //     activarMsgErrors_nuevo_producto("txt_codigoBarras_nuevo_producto");
    // }
    if (
        txt_invima_nuevo_producto.value != "" &&
        txt_invima_nuevo_producto.value != null
    ) {
        campos_nuevo_producto["txt_invima_nuevo_producto"] = true;
    } else {
        activarMsgErrors_nuevo_producto("txt_invima_nuevo_producto");
    }
}

formulario_nuevo_producto.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion_nuevo_producto();
    if (
        (campos_nuevo_producto.txt_nombre_nuevo_producto &&
            campos_nuevo_producto.sel_marca_nuevo_producto &&
            campos_nuevo_producto.sel_categoria_nuevo_producto &&
            campos_nuevo_producto.sel_subcategoria_nuevo_producto &&
            campos_nuevo_producto.sel_estado_nuevo_producto &&
            campos_nuevo_producto.are_descripcion_nuevo_producto) ||
        campos_nuevo_producto.txt_complemento_nuevo_producto ||
        campos_nuevo_producto.are_advertencia_nuevo_producto ||
        // campos_nuevo_producto.txt_codigoBarras_nuevo_producto ||
        campos_nuevo_producto.txt_invima_nuevo_producto
    ) {
        formulario_nuevo_producto.submit();
    }
});

function BuscarSubcategorias(Cate_id, Ruta, Altr) {
    $.ajax({
        url: Ruta,
        type: "Get",
        data: {
            Cate_id: Cate_id,
            _token: $('input[name="_token"]').val(),
        },
    }).done(function (data) {
        var arreglo = JSON.parse(data);

        $("#sel_subcategoria_nuevo_producto").empty();
        $("#sel_subcategoria_nuevo_producto").append(
            '<option value="" selected></option>'
        );
        for (var i = 0; i < arreglo.length; i++) {
            $("#sel_subcategoria_nuevo_producto").append(
                '<option value="' +
                    arreglo[i]["SUBC_ID"] +
                    '" >' +
                    arreglo[i]["SUBC_NOMBRE"] +
                    "</option>"
            );
        }
        if (Altr != null) {
            $("#sel_subcategoria_nuevo_producto option")
                .removeAttr("selected")
                .filter("[value=" + Altr + "]")
                .attr("selected", true);
        }
    });
}
