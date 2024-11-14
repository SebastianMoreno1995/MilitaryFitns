// TODO MODALES OFERTA
// TODO MODALES OFERTA
// TODO MODALES OFERTA

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var cerrar_modal_eliminar_ofertas = document.querySelector(
  ".btn_cerrar_modal_eliminar_ofertas"
);
var contenedor_modal_eliminar_ofertas = document.querySelector(
  ".contenedor_modal_eliminar_ofertas"
);
var modal_eliminar_ofertas = document.querySelector(".modal_eliminar_ofertas");

function abrir_modal_eliminar_ofertas(data) {
  document.getElementById('txt_ofer_id_eliminar').value=data['OFER_ID'];
  document.getElementById('txt_ofer_nombre').textContent=data['PROD_NOMBRE']+' '+ data['COMPLEMENTO']+ ' ' +  data['UNME_MEDIDA'];
  bodyScroll_eliminar_ofertas();
  contenedor_modal_eliminar_ofertas.classList.add("activar_bg_eliminar_ofertas");
  modal_eliminar_ofertas.classList.toggle("cerrar_modal_eliminar_ofertas");
}

cerrar_modal_eliminar_ofertas.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_ofertas();
  modal_eliminar_ofertas.classList.toggle("cerrar_modal_eliminar_ofertas");
  setTimeout(function () {
    contenedor_modal_eliminar_ofertas.classList.remove(
      "activar_bg_eliminar_ofertas"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_ofertas) {
    bodyScroll_eliminar_ofertas();
    modal_eliminar_ofertas.classList.toggle("cerrar_modal_eliminar_ofertas");
    setTimeout(function () {
      contenedor_modal_eliminar_ofertas.classList.remove(
        "activar_bg_eliminar_ofertas"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_ofertas() {
  document.body.classList.toggle("no-scroll_eliminar");
}