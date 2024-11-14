$(document).ready(function () {
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
            $("#" + opcion).empty();
            $("#" + opcion).append('<option value="" selected></option>');
            for (var i = 0; i < arreglo.length; i++) {
                $("#" + opcion).append(
                    '<option value="' +
                    arreglo[i]["CIUD_ID"] +
                    '" >' +
                    arreglo[i]["CIUD_DESCRIPCION"] +
                    "</option>"
                );
            }
            $("#" + opcion + " option")
                .removeAttr("selected")
                .filter("[value=" + $("#IdCiudadBd").val() + "]")
                .attr("selected", true);
        });
    }
});


function peticionAjax(ctr, datos, accion, idElemento, otro, otro1) {
    $.ajax({
        url: ctr,
        type: "POST",
        data: datos,
        success: function (data) {
            procesarRequest(data, accion, idElemento, otro, otro1);
        },
        error: function (E) {
            alert("Error en el procesamiento");
            // alert(E);
        }
    });
}


function peticionAjaxArch(ctr, id_Form, id_file, img, txt) {
    var formData = new FormData(document.getElementById(id_Form));

    $.ajax({
        url: ctr,
        type: "POST",
        data: formData,
        // dataType: "xml",
        async: true,
        contentType: false,
        processData: false,
        success: function (data) {
            datos = $.parseJSON(data);
            var mensaje = 'ERROR';
            if (datos['Result']) {
                mensaje = datos['Mensaje'];
                document.getElementById(id_file).value = '';
                document.getElementById(img).src = 'img/Agregar Fotos.png';
                document.getElementById(txt).value = '';

            }
            else {
                mensaje = datos['Mensaje'];
            }
            alert(mensaje);
            // procesarRequest(data,"","");
        },
        timeout: 80000,
        error: function () {
            alert("Error en el procesamiento");
        }
    });
}

function procesarRequest(response, accion, idElemento, Otro, otro1) {
    if (accion != null && accion === 'ImpSelect') {
        var arreglo = JSON.parse(response);
        $("#" + idElemento).empty();
        $("#" + idElemento).append('<option value="" selected></option>');
        var Descripcion ='';
        for (var i = 0; i < arreglo.length; i++) {
            if( arreglo[i]["SABO_DESCRIPCION"] !=null ){
                Descripcion =arreglo[i]["SABO_DESCRIPCION"] ;
            }
            $("#" + idElemento).append(
                '<option value="' + arreglo[i]["GRSA_ID"] + '" >' +
                arreglo[i]["UNME_MEDIDA"] + " " + Descripcion +
                "</option>"
            );
        }
    }
    if (accion != null && accion === 'ImpText') {
        var arreglo = JSON.parse(response);
        var variable = 0;
        for (var i = 0; i < arreglo.length; i++) {
            variable = arreglo[i]["GRSA_PRECIO"];
        }

        document.getElementById(idElemento).value = variable;
    }
    if (accion != null && accion === 'ImpImg') {
        var arreglo = JSON.parse(response);
        var DireccionImagen = 0;
        for (var i = 0; i < arreglo.length; i++) {
            DireccionImagen = arreglo[i]["IMAG_DIRECCIONIMAGEN"];
        }
        document.getElementById(idElemento).src = DireccionImagen;
    }

    if (accion != null && accion === 'ImpInfo') {
        var arreglo = JSON.parse(response);
        $("#" + idElemento).empty();
        $("#" + idElemento).append('<option value="" selected></option>');
        var Stock = 0;
        var Precio = 0;
        var DireccionImagen = 0;
        for (var i = 0; i < arreglo.length; i++) {
            Stock = arreglo[i]["GRSA_STOCK"];
            Precio = arreglo[i]["GRSA_PRECIO"];
            DireccionImagen = arreglo[i]["IMAG_DIRECCIONIMAGEN"];
        }
        document.getElementById(idElemento).src = DireccionImagen;
        document.getElementById(Otro).textContent = Stock;
        document.getElementById(otro1).textContent = Precio;
    }


    if (Otro != null) {
        if (Otro === 'selected') {
            $("#" + idElemento+ " option")
                .removeAttr("selected")
                .filter("[value='" + otro1 + "']")
                .attr("selected", true);
        }
    }
}
