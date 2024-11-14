// TODO MODALES PRODUCTOS
// TODO MODALES PRODUCTOS
// TODO MODALES PRODUCTOS

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var cerrar_modal_eliminar_productos = document.querySelector(
  ".btn_cerrar_modal_eliminar_productos"
);
var contenedor_modal_eliminar_productos = document.querySelector(
  ".contenedor_modal_eliminar_productos"
);
var modal_eliminar_productos = document.querySelector(".modal_eliminar_productos");

function abrir_modal_eliminar_productos(data) {
  document.getElementById('txt_prod_id_eliminar').value=data['PROD_ID'];
  document.getElementById('txt_Prod_nombre').textContent=data['PROD_NOMBRE']+' '+ data['PROD_COMPLEMENTO'];
  bodyScroll_eliminar_productos();
  contenedor_modal_eliminar_productos.classList.add("activar_bg_eliminar_productos");
  modal_eliminar_productos.classList.toggle("cerrar_modal_eliminar_productos");
}

cerrar_modal_eliminar_productos.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_productos();
  modal_eliminar_productos.classList.toggle("cerrar_modal_eliminar_productos");
  setTimeout(function () {
    contenedor_modal_eliminar_productos.classList.remove(
      "activar_bg_eliminar_productos"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_productos) {
    bodyScroll_eliminar_productos();
    modal_eliminar_productos.classList.toggle("cerrar_modal_eliminar_productos");
    setTimeout(function () {
      contenedor_modal_eliminar_productos.classList.remove(
        "activar_bg_eliminar_productos"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_productos() {
  document.body.classList.toggle("no-scroll_eliminar");
}