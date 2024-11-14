// TODO VALIDACIONES Y MODALES DATOS ESPECIFICOS
// TODO VALIDACIONES Y MODALES DATOS ESPECIFICOS
// TODO VALIDACIONES Y MODALES DATOS ESPECIFICOS

// !VALIDACIONES CAMPOS NUEVO PRESENTACION
// !VALIDACIONES CAMPOS NUEVO PRESENTACION
// !VALIDACIONES CAMPOS NUEVO PRESENTACION

const formulario_nuevo_factura = document.getElementById(
  "formulario_nuevo_factura"
);
const inputs_nuevo_factura = document.querySelectorAll(
  "#formulario_nuevo_factura input"
);
const selects_nuevo_factura = document.querySelectorAll(
  "#formulario_nuevo_factura select"
);

const expresiones_nuevo_factura = {
  date_fechaCompra_nuevo_factura: /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/, //Formato de fecha
  sel_proveedor_nuevo_factura: /^\d{1,10}$/, // 1 a 10 digitos.
  sel_impuesto_nuevo_factura: /^\d{1,10}$/, // 1 a 10 digitos.
  num_descuento_nuevo_factura: /^\d{1,3}$/, // 1 a 10 digitos.
  // date_fechaCaducidad_nuevo_factura: /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/, //Formato de fecha
  sel_producto_nuevo_factura: /^\d{1,10}$/, // 1 a 10 digitos.
  sel_presentacion_nuevo_factura: /^\d{1,10}$/, // 1 a 10 digitos.
  num_cantidad_nuevo_factura: /^\d{1,10}$/, // 1 a 10 digitos.
  num_precio_nuevo_factura: /^\d{1,10}$/, // 1 a 10 digitos.
};

const campos_nuevo_factura = {
  date_fechaCompra_nuevo_factura: false,
  sel_proveedor_nuevo_factura: false,
  sel_impuesto_nuevo_factura: false,
  num_descuento_nuevo_factura: false,
  // date_fechaCaducidad_nuevo_factura: false,
  sel_producto_nuevo_factura: false,
  sel_presentacion_nuevo_factura: false,
  num_cantidad_nuevo_factura: false,
  num_precio_nuevo_factura: false,
};

const validarformulario_nuevo_factura = (e) => {
  switch (e.target.name) {
    case "date_fechaCompra_nuevo_factura":
      validarCampoInput_nuevo_factura(
        expresiones_nuevo_factura.date_fechaCompra_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    case "sel_proveedor_nuevo_factura":
      var valor =
        sel_proveedor_nuevo_factura.options[
          sel_proveedor_nuevo_factura.selectedIndex
        ].value;
      validarCampoSelect_nuevo_factura(
        expresiones_nuevo_factura.sel_proveedor_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    case "sel_impuesto_nuevo_factura":
      var valor =
        sel_impuesto_nuevo_factura.options[
          sel_impuesto_nuevo_factura.selectedIndex
        ].value;
      validarCampoSelect_nuevo_factura(
        expresiones_nuevo_factura.sel_impuesto_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    case "num_descuento_nuevo_factura":
      validarCampoInput_nuevo_factura(
        expresiones_nuevo_factura.num_descuento_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    // case "date_fechaCaducidad_nuevo_factura":
    //   validarCampoInput_nuevo_factura(
    //     expresiones_nuevo_factura.date_fechaCaducidad_nuevo_factura,
    //     e.target,
    //     e.target.name
    //   );
    //   break;
    case "sel_producto_nuevo_factura":
      var valor =
        sel_producto_nuevo_factura.options[
          sel_producto_nuevo_factura.selectedIndex
        ].value;
      validarCampoSelect_nuevo_factura(
        expresiones_nuevo_factura.sel_producto_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    case "sel_presentacion_nuevo_factura":
      var valor =
        sel_presentacion_nuevo_factura.options[
          sel_presentacion_nuevo_factura.selectedIndex
        ].value;
      validarCampoSelect_nuevo_factura(
        expresiones_nuevo_factura.sel_presentacion_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    case "num_cantidad_nuevo_factura":
      validarCampoInput_nuevo_factura(
        expresiones_nuevo_factura.num_cantidad_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
    case "num_precio_nuevo_factura":
      validarCampoInput_nuevo_factura(
        expresiones_nuevo_factura.num_precio_nuevo_factura,
        e.target,
        e.target.name
      );
      break;
  }
};

// VALIDA INPUTS
// VALIDA INPUTS
const validarCampoInput_nuevo_factura = (expresion, input, campo) => {
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
    campos_nuevo_factura[campo] = true;
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
    campos_nuevo_factura[campo] = false;
  }
};

// VALIDA SELECTS
// VALIDA SELECTS
const validarCampoSelect_nuevo_factura = (expresion, select, campo) => {
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
    campos_nuevo_factura[campo] = true;
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
    campos_nuevo_factura[campo] = false;
  }
};

// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
// CAPTURA EL EVENTO EN LOS INPUTS Y SELECTS EN EL FORMULARIO
inputs_nuevo_factura.forEach((input) => {
  input.addEventListener("keyup", validarformulario_nuevo_factura);
  input.addEventListener("blur", validarformulario_nuevo_factura);
  input.addEventListener("change", validarformulario_nuevo_factura);
});
selects_nuevo_factura.forEach((select) => {
  select.addEventListener("change", validarformulario_nuevo_factura);
  select.addEventListener("blur", validarformulario_nuevo_factura);
});

// REVALIDACIONES
// REVALIDACIONES
var date_fechaCompra_nuevo_factura = document.getElementById(
  "date_fechaCompra_nuevo_factura"
);
var sel_proveedor_nuevo_factura = document.getElementById(
  "sel_proveedor_nuevo_factura"
);
var sel_impuesto_nuevo_factura = document.getElementById(
  "sel_impuesto_nuevo_factura"
);
var num_descuento_nuevo_factura = document.getElementById(
  "num_descuento_nuevo_factura"
);
// var date_fechaCaducidad_nuevo_factura = document.getElementById(
//   "date_fechaCaducidad_nuevo_factura"
// );
var sel_producto_nuevo_factura = document.getElementById(
  "sel_producto_nuevo_factura"
);
var sel_presentacion_nuevo_factura = document.getElementById(
  "sel_presentacion_nuevo_factura"
);
var num_cantidad_nuevo_factura = document.getElementById(
  "num_cantidad_nuevo_factura"
);
var num_precio_nuevo_factura = document.getElementById(
  "num_precio_nuevo_factura"
);

function activarMsgErrors_nuevo_factura(campo) {
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

function revalidacion_nuevo_factura() {
  if (
    date_fechaCompra_nuevo_factura.value != "" &&
    date_fechaCompra_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["date_fechaCompra_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("date_fechaCompra_nuevo_factura");
  }
  if (
    sel_proveedor_nuevo_factura.value != "" &&
    sel_proveedor_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["sel_proveedor_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("sel_proveedor_nuevo_factura");
  }
  if (
    sel_impuesto_nuevo_factura.value != "" &&
    sel_impuesto_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["sel_impuesto_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("sel_impuesto_nuevo_factura");
  }
  if (
    num_descuento_nuevo_factura.value != "" &&
    num_descuento_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["num_descuento_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("num_descuento_nuevo_factura");
  }
  // if (
  //   date_fechaCaducidad_nuevo_factura.value != "" &&
  //   date_fechaCaducidad_nuevo_factura.value != null
  // ) {
  //   campos_nuevo_factura["date_fechaCaducidad_nuevo_factura"] = true;
  // } else {
  //   activarMsgErrors_nuevo_factura("date_fechaCaducidad_nuevo_factura");
  // }
  if (
    sel_producto_nuevo_factura.value != "" &&
    sel_producto_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["sel_producto_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("sel_producto_nuevo_factura");
  }
  if (
    sel_presentacion_nuevo_factura.value != "" &&
    sel_presentacion_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["sel_presentacion_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("sel_presentacion_nuevo_factura");
  }
  if (
    num_cantidad_nuevo_factura.value != "" &&
    num_cantidad_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["num_cantidad_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("num_cantidad_nuevo_factura");
  }
  if (
    num_precio_nuevo_factura.value != "" &&
    num_precio_nuevo_factura.value != null
  ) {
    campos_nuevo_factura["num_precio_nuevo_factura"] = true;
  } else {
    activarMsgErrors_nuevo_factura("num_precio_nuevo_factura");
  }
}

formulario_nuevo_factura.addEventListener("submit", (e) => {
  e.preventDefault();
  revalidacion_nuevo_factura();
  if (
    (
      campos_nuevo_factura.date_fechaCompra_nuevo_factura &&
      campos_nuevo_factura.sel_proveedor_nuevo_factura &&
      campos_nuevo_factura.sel_impuesto_nuevo_factura &&
      campos_nuevo_factura.sel_producto_nuevo_factura &&
      campos_nuevo_factura.sel_presentacion_nuevo_factura &&
      campos_nuevo_factura.num_cantidad_nuevo_factura &&
      campos_nuevo_factura.num_precio_nuevo_factura 
    )
  ) {
    DetalleFactura();
    // formulario_nuevo_factura.submit();
  }
});

// TODO JAVASCRIPT FACTURA
// TODO JAVASCRIPT FACTURA
// TODO JAVASCRIPT FACTURA

// ELEMENTOS DEL DOM - CONTENEDORES
const $formCabecera = document.getElementById(
  "formCabecera"
);
const $formDetalle = document.getElementById(
  "formDetalle"
);
const $cuerpoTabla = document.getElementById(
  "cuerpoTabla"
);
// ELEMENTOS DE LA FACTURA
const $date_fechaCompra_nuevo_factura = document.getElementById(
  "date_fechaCompra_nuevo_factura"
);
const $sel_proveedor_nuevo_factura = document.getElementById(
  "sel_proveedor_nuevo_factura"
);
const $sel_impuesto_nuevo_factura = document.getElementById(
  "sel_impuesto_nuevo_factura"
);
const $num_descuento_nuevo_factura = document.getElementById(
  "num_descuento_nuevo_factura"
);
// ELEMENTOS DEL PRODUCTO
const $date_fechaCaducidad_nuevo_factura = document.getElementById(
  "date_fechaCaducidad_nuevo_factura"
);
const $sel_producto_nuevo_factura = document.getElementById(
  "sel_producto_nuevo_factura"
);
const $sel_presentacion_nuevo_factura = document.getElementById(
  "sel_presentacion_nuevo_factura"
);
const $num_cantidad_nuevo_factura = document.getElementById(
  "num_cantidad_nuevo_factura"
);
const $num_precio_nuevo_factura = document.getElementById(
  "num_precio_nuevo_factura"
);
const $num_input_sutotal_hidden = document.getElementById(
  "num_input_sutotal_hidden"
);
// ELEMENTOS DEL FOOTER DE LA TABLA
const $txt_subtotal = document.getElementById(
  "txt_subtotal"
);
const $txt_descuento = document.getElementById(
  "txt_descuento"
);
const $txt_impuesto = document.getElementById(
  "txt_impuesto"
);
const $num_total = document.getElementById(
  "txt_total"
);
const $btn_guardar = document.getElementById(
  "btn_guardar"
);

let arregloDetalle = [];
let facturas = [];

// !DIBUJA LA TABLA
const redibujarTabla = () => {
  $cuerpoTabla.innerHTML = "";
  let noItem = 1;
  let acumulaSubtotal = 0;
  arregloDetalle.forEach((detalle) => {
    let fila = document.createElement("tr");
    fila.innerHTML = `<td>${noItem}</td>
                      <td>${detalle.nombreProducto}</td>
                      <td>${detalle.nombrePresentacion}</td>
                      <td>${detalle.cantidad}</td>
                      <td>${detalle.precio.toLocaleString("en-US", { style: 'currency', currency: 'USD' })}</td>
                      <td>${detalle.subtotal.toLocaleString("en-US", { style: 'currency', currency: 'USD' })}</td>`;
    let tdEliminar = document.createElement("td");
    let botonEliminar = document.createElement("button");
    botonEliminar.classList.add("btn_accion-eliminar", "btn", "btn_click", "btn_accion", "icon-trash");
    botonEliminar.setAttribute("title", "Eliminar");
    botonEliminar.onclick = () => {
      // console.log(detalle);
      // console.log(arregloDetalle);
      eliminarDetalleById(detalle.producto);
      
      if (arregloDetalle.length == 0) {
        // SI EL USUARIO BORRA TODAS LAS FILAS LOS VALORES DEL FOOTER SE REINICIA A CERO
        $txt_subtotal.value = 0;
        $txt_descuento.value = 0;
        $txt_impuesto.value = 0;
        $num_total.value = 0;
      }
    }
    noItem = noItem + 1;
    acumulaSubtotal = acumulaSubtotal + +detalle.subtotal;

    //!Dibuja los resultados en el footer de la tabla
    let descuentoEstablecido = $num_descuento_nuevo_factura.value;

    let valorDescuento = acumulaSubtotal * (descuentoEstablecido / 100);
    $txt_descuento.value = valorDescuento.toLocaleString("en-US", { style: 'currency', currency: 'USD' });

    let aplicaDescuento = acumulaSubtotal - valorDescuento;
    $txt_subtotal.value = aplicaDescuento.toLocaleString("en-US", { style: 'currency', currency: 'USD' });

    let variable = $sel_impuesto_nuevo_factura.options[$sel_impuesto_nuevo_factura.selectedIndex].text;
    let valorIva = 0;
    if (variable != null && variable == "Iva 19%") {
      valorIva = aplicaDescuento * 0.19;
      $txt_impuesto.value = valorIva.toLocaleString("en-US", { style: 'currency', currency: 'USD' });
      // alert(`entro al if del impuesto ${variable}`);
    }

    let valorTotal = valorIva + aplicaDescuento;
    $num_total.value = valorTotal.toLocaleString("en-US", { style: 'currency', currency: 'USD' });

    tdEliminar.appendChild(botonEliminar);
    fila.appendChild(tdEliminar);
    $cuerpoTabla.appendChild(fila);
  })
}

//!Eliminar una fila en la tabla
const eliminarDetalleById = (id) => {
  arregloDetalle = arregloDetalle.filter((detalle) => {
    if (+id !== +detalle.producto) {
      return detalle
    }
  });
  redibujarTabla();
};

//!Agrega un producto que ya fue registrado previamente en la tabla
const agregarDetalle = (objDetalle) => {
  //Busca si el objeto detalle ya existia en el arregloDetalle 
  //de ser asi, suma las cantidades para que solo aparezca una vez en el arreglo 

  const resultado = arregloDetalle.find((detalle) => {
    if (+objDetalle.producto === +detalle.producto && +objDetalle.presentacion === +detalle.presentacion) {
      return detalle;
    }
  });

  if (resultado) {
    arregloDetalle = arregloDetalle.map((detalle) => {
      if (+objDetalle.producto === +detalle.producto && +objDetalle.presentacion === +detalle.presentacion) {
        return {
          producto: detalle.producto,
          // nombreProducto: detalle.nombreProducto,
          presentacion: detalle.presentacion,
          cantidad: +detalle.cantidad + +objDetalle.cantidad,
          precio: +objDetalle.precio,
          subtotal: (+detalle.cantidad + +objDetalle.cantidad) * +objDetalle.precio,
        }
      }
      return detalle;
    });
  } else {
    arregloDetalle.push(objDetalle);
  }
  // console.log(objDetalle);
};

//$formDetalle.onsubmit = (e) => {
// !Crea objeto detalle de la factura
function DetalleFactura() {
  //e.preventDefault();
  const objDetalle = {
    fechaCaducidad: $date_fechaCaducidad_nuevo_factura.value,

    producto: $sel_producto_nuevo_factura.value,
    nombreProducto: $sel_producto_nuevo_factura.options[$sel_producto_nuevo_factura.selectedIndex].text,

    presentacion: $sel_presentacion_nuevo_factura.value,
    nombrePresentacion: $sel_presentacion_nuevo_factura.options[$sel_presentacion_nuevo_factura.selectedIndex].text,

    cantidad: $num_cantidad_nuevo_factura.value,
    precio: $num_precio_nuevo_factura.value,
    subtotal: $num_input_sutotal_hidden.value,
  }
  // console.log(objDetalle);
  agregarDetalle(objDetalle);
  // console.log(arregloDetalle);
  redibujarTabla();
  $formDetalle.reset();
}

// !Objeto de la cabecera de la factura
$btn_guardar.onclick = () => {
  let objFactura = {
    fecha: $date_fechaCompra_nuevo_factura.value,
    proveedor: $sel_proveedor_nuevo_factura.value,
    impuesto: $sel_impuesto_nuevo_factura.value,
    descuento: $num_descuento_nuevo_factura.value,
    detalle: arregloDetalle,
  };
  // console.log(objFactura);
  facturas.push(objFactura);

  // Limpiar Campos
  $formDetalle.reset();
  $formCabecera.reset();
  //Limpiar la tabla
  arregloDetalle = [];
  redibujarTabla();

  // Guardarlo en el localStorage
  localStorage.setItem("facturas", JSON.stringify(facturas));
  if (facturas != null && facturas.length > 0) {
    window.location.href = $('#Ruta').val() + "?ArrayCompra=" + JSON.stringify(facturas);
  }
};

//!Resetear select producto
$sel_producto_nuevo_factura.onchange = () => {
  // console.log($sel_producto_nuevo_factura.value);
  if ($sel_producto_nuevo_factura.value == "0") {
    $formDetalle.reset();
    return;
  }
};

// !Calcula el subtotal del form Detalle cantidad * precio y lo guarda en el input tipo hidden
const calcularSubtotal = () => {
  const cantidad = +$num_cantidad_nuevo_factura.value;
  const precio = +$num_precio_nuevo_factura.value;
  const subtotal = cantidad * precio;
  $num_input_sutotal_hidden.value = subtotal;
  // console.log(`valor del subtotal en el detalle: ${$num_input_sutotal_hidden.value}`);
};

// !EVENTOS
$num_cantidad_nuevo_factura.onkeyup = () => {
  calcularSubtotal();
};
$num_precio_nuevo_factura.onkeyup = () => {
  calcularSubtotal();
};
$num_precio_nuevo_factura.onchange = () => {
  calcularSubtotal();
};
$date_fechaCompra_nuevo_factura.onchange = () => {
  redibujarTabla();
};
$sel_proveedor_nuevo_factura.onchange = () => {
  redibujarTabla();
};
$sel_impuesto_nuevo_factura.onchange = () => {
  redibujarTabla();
  if ($sel_impuesto_nuevo_factura.value != 1) {
    $txt_impuesto.value = 0;
  }
};
$num_descuento_nuevo_factura.onkeyup = () => {
  redibujarTabla();
};