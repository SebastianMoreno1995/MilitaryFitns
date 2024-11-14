$(document).ready(function () {
    $("#txt_tipoDocumento option")
        .removeAttr("selected")
        .filter("[value=" + $("#sel_tipoDocumentoBd").val() + "]")
        .attr("selected", true);
    if ($("#IdCiudadBd").val() != null || $("#IdCiudadBd").val() !== "") {
        $("#txt_departamento option")
            .removeAttr("selected")
            .filter("[value=" + $("#IdDepartamentoBd").val() + "]")
            .attr("selected", true);
        BuscarCiudad($("#IdDepartamentoBd").val(), 1);
    }
    //-------------------------------------------|| CONSULTA POR DEPARTAMENTO  ||--------------------------------
    $("#txt_departamento").change(function () {
        BuscarCiudad($("#txt_departamento").val(), 0);
    });

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
            $("#txt_municipio").empty();
            $("#txt_municipio").append('<option value="" selected></option>');
            for (var i = 0; i < arreglo.length; i++) {
                $("#txt_municipio").append(
                    '<option value="' +
                        arreglo[i]["CIUD_ID"] +
                        '" >' +
                        arreglo[i]["CIUD_DESCRIPCION"] +
                        "</option>"
                );
            }
            if (opcion == 1) {
                $("#txt_municipio option")
                    .removeAttr("selected")
                    .filter("[value=" + $("#IdCiudadBd").val() + "]")
                    .attr("selected", true);
            }
        });
    }
});

// PERFIL
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");
const selects = document.querySelectorAll("#formulario select");
// PASSWORD
const formularioPassword = document.getElementById("formularioPassword");
const inputsPassword = document.querySelectorAll("#formularioPassword input");

const expresiones = {
    txt_nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    txt_apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    // txt_tipoDocumento: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    txt_tipoDocumento: /^\d{1,40}$/, // Letras y espacios, pueden llevar acentos.
    num_documento: /^\d{3,10}$/, // 3 a 10 numeros.
    // txt_departamento: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    txt_departamento: /^\d{1,40}$/, // Letras y espacios, pueden llevar acentos.
    //txt_municipio: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    txt_municipio: /^\d{1,200}$/, // Letras y espacios, pueden llevar acentos.
    txt_direccion: /^[#.0-9a-zA-Z\s,-]{8,80}$/, // Letras y espacios, pueden llevar acentos.
    num_telefono: /^\d{7,12}$/, // 7 a 10 numeros.
    txt_correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Formato de correo
    date_fechaNacimiento: /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/, //Formato de fecha
    txt_passwordAntiguo: /^[a-zA-Z0-9\_\-]{8,16}$/, // Letras y espacios, pueden llevar acentos.
    txt_password1: /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/, // Al menos una minuscula y mayusculua y un numero.
    txt_password2: /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/, // Al menos una minuscula y mayusculua y un numero.
};

const campos = {
    txt_nombre: false,
    txt_apellido: false,
    txt_tipoDocumento: false,
    num_documento: false,
    txt_departamento: false,
    txt_municipio: false,
    txt_direccion: false,
    num_telefono: false,
    txt_correo: false,
    date_fechaNacimiento: false,
    txt_passwordAntiguo: false,
    txt_password1: false,
    txt_password2: false,
};

const validarFormulario = (e) => {
    // console.log(e.target.name)
    switch (e.target.name) {
        case "txt_nombre":
            validarCampoInput(expresiones.txt_nombre, e.target, e.target.name);
            break;
        case "txt_apellido":
            validarCampoInput(
                expresiones.txt_apellido,
                e.target,
                e.target.name
            );
            break;
        case "txt_tipoDocumento":
            var valor =
                txt_tipoDocumento.options[txt_tipoDocumento.selectedIndex]
                    .value;
            validarCampoSelect(
                expresiones.txt_tipoDocumento,
                e.target,
                e.target.name
            );
            break;
        case "num_documento":
            validarCampoInput(
                expresiones.num_documento,
                e.target,
                e.target.name
            );
            break;
        case "txt_departamento":
            var valor =
                txt_departamento.options[txt_departamento.selectedIndex].value;
            validarCampoSelect(
                expresiones.txt_departamento,
                e.target,
                e.target.name
            );
            break;
        case "txt_municipio":
            var valor =
                txt_municipio.options[txt_municipio.selectedIndex].value;
            validarCampoSelect(
                expresiones.txt_municipio,
                e.target,
                e.target.name
            );
            break;
        case "txt_direccion":
            validarCampoInput(
                expresiones.txt_direccion,
                e.target,
                e.target.name
            );
            break;
        case "num_telefono":
            validarCampoInput(
                expresiones.num_telefono,
                e.target,
                e.target.name
            );
            break;
        case "txt_correo":
            validarCampoInput(expresiones.txt_correo, e.target, e.target.name);
            break;
        case "date_fechaNacimiento":
            validarCampoInput(
                expresiones.date_fechaNacimiento,
                e.target,
                e.target.name
            );
            break;
        case "txt_passwordAntiguo":
            validarCampoInput(
                expresiones.txt_passwordAntiguo,
                e.target,
                e.target.name
            );
            break;
        case "txt_password1":
            validarCampoInput(
                expresiones.txt_password1,
                e.target,
                e.target.name
            );
            validarPassword2();
            break;
        case "txt_password2":
            validarPassword2();
            break;
    }
};

const validarCampoInput = (expresion, input, campo) => {
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
        campos[campo] = true;
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
        campos[campo] = false;
    }
};
const validarCampoSelect = (expresion, select, campo) => {
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
        campos[campo] = true;
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
        campos[campo] = false;
    }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y LOS SELECTS EN EL FORMULARIO PERFILES
inputs.forEach((input) => {
    input.addEventListener("keyup", validarFormulario);
    input.addEventListener("blur", validarFormulario);
});
selects.forEach((select) => {
    select.addEventListener("change", validarFormulario);
    select.addEventListener("blur", validarFormulario);
});

// CAPTURA EL EVENTO EN LOS INPUTS EN EL FORMULARIO PASSWORDS
inputsPassword.forEach((input) => {
    input.addEventListener("keyup", validarFormulario);
    input.addEventListener("blur", validarFormulario);
});

var txt_nombre = document.getElementById("txt_nombre");
var txt_apellido = document.getElementById("txt_apellido");
var txt_tipoDocumento = document.getElementById("txt_tipoDocumento");
var txt_departamento = document.getElementById("txt_departamento");
var txt_municipio = document.getElementById("txt_municipio");
var txt_direccion = document.getElementById("txt_direccion");
var num_telefono = document.getElementById("num_telefono");
var txt_correo = document.getElementById("txt_correo");
var date_fechaNacimiento = document.getElementById("date_fechaNacimiento");

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
    if (txt_nombre.value != "" && txt_nombre.value != null) {
        campos["txt_nombre"] = true;
    } else {
        activarMsgErrors("txt_nombre");
    }
    if (txt_apellido.value != "" && txt_apellido.value != null) {
        campos["txt_apellido"] = true;
    } else {
        activarMsgErrors("txt_apellido");
    }
    if (txt_tipoDocumento.value != "" && txt_tipoDocumento.value != null) {
        campos["txt_tipoDocumento"] = true;
    } else {
        activarMsgErrors("txt_tipoDocumento");
    }
    if (num_documento.value != "" && num_documento.value != null) {
        campos["num_documento"] = true;
    } else {
        activarMsgErrors("num_documento");
    }
    if (txt_departamento.value != "" && txt_departamento.value != null) {
        campos["txt_departamento"] = true;
    } else {
        activarMsgErrors("txt_departamento");
    }
    if (txt_municipio.value != "" && txt_municipio.value != null) {
        campos["txt_municipio"] = true;
    } else {
        activarMsgErrors("txt_municipio");
    }
    if (txt_direccion.value != "" && txt_direccion.value != null) {
        campos["txt_direccion"] = true;
    } else {
        activarMsgErrors("txt_direccion");
    }
    if (num_telefono.value != "" && num_telefono.value != null) {
        campos["num_telefono"] = true;
    } else {
        activarMsgErrors("num_telefono");
    }
    if (txt_correo.value != "" && txt_correo.value != null) {
        campos["txt_correo"] = true;
    } else {
        activarMsgErrors("txt_correo");
    }
    if (
        date_fechaNacimiento.value != "" &&
        date_fechaNacimiento.value != null
    ) {
        campos["date_fechaNacimiento"] = true;
    } else {
        activarMsgErrors("date_fechaNacimiento");
    }
}

formulario.addEventListener("submit", (e) => {
    e.preventDefault();
    revalidacion();
    const terminos = document.getElementById("terminos");
    if (
        campos.txt_nombre &&
        campos.txt_apellido &&
        campos.txt_tipoDocumento &&
        campos.num_documento &&
        campos.txt_departamento &&
        campos.txt_municipio &&
        campos.txt_direccion &&
        campos.num_telefono &&
        campos.txt_correo &&
        campos.date_fechaNacimiento
    ) {
        formulario.submit();
    } else {
        // alert(campos.txt_nombre + " " +
        //     campos.txt_apellido + " " +
        //     campos.txt_tipoDocumento + " " +
        //     campos.num_documento + " " +
        //     campos.txt_departamento + " " +
        //     campos.txt_municipio + " " +
        //     campos.txt_direccion + " " +
        //     campos.num_telefono + " " +
        //     campos.txt_correo + " " +
        //     campos.date_fechaNacimiento);
    }
});

// VALIDAR CONTRASEÑAS
// VALIDAR CONTRASEÑAS
// VALIDAR CONTRASEÑAS
const validarPassword2 = () => {
    const inputPassword1 = document.getElementById("txt_password1");
    const inputPassword2 = document.getElementById("txt_password2");

    if (inputPassword1.value !== inputPassword2.value) {
        document
            .getElementById(`grupo__txt_password2`)
            .classList.add("formulario__grupo-incorrecto");
        document
            .getElementById(`grupo__txt_password2`)
            .classList.remove("formulario__grupo-correcto");
        document
            .querySelector(`#grupo__txt_password2 span`)
            .classList.add("icon-cancel-circled2");
        document
            .querySelector(`#grupo__txt_password2 span`)
            .classList.remove("icon-ok-squared");
        document
            .querySelector(
                `#error__txt_password2 .formulario__input-error-abajo`
            )
            .classList.add("formulario__input-error-abajo-activo");
        campos["txt_password1"] = false;
    } else {
        document
            .getElementById(`grupo__txt_password2`)
            .classList.remove("formulario__grupo-incorrecto");
        document
            .getElementById(`grupo__txt_password2`)
            .classList.add("formulario__grupo-correcto");
        document
            .querySelector(`#grupo__txt_password2 span`)
            .classList.remove("icon-cancel-circled2");
        document
            .querySelector(`#grupo__txt_password2 span`)
            .classList.add("icon-ok-squared");
        document
            .querySelector(
                `#error__txt_password2 .formulario__input-error-abajo`
            )
            .classList.remove("formulario__input-error-abajo-activo");
        campos["txt_password1"] = true;
    }
};

formularioPassword.addEventListener("submit", (e) => {
    e.preventDefault();

    if (campos.txt_password1 && campos.txt_passwordAntiguo) {
        formularioPassword.submit();
    }
});
