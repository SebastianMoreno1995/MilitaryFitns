// TODO MODALES
// TODO MODALES
// TODO MODALES

// !MODAL VER FOTO DE LA PRESENTACION O SABOR 
// !MODAL VER FOTO DE LA PRESENTACION O SABOR
// !MODAL VER FOTO DE LA PRESENTACION O SABOR

var cerrar_modal_ver_foto = document.querySelector(".btn_cerrar_modal_ver_foto");
var contenedor_modal_ver_foto = document.querySelector(".contenedor_modal_ver_foto");
var modal_ver_foto = document.querySelector(".modal_ver_foto");

function abrir_modal_ver_foto (data) {
  $("#FotoPresentacion").attr("src", data["IMAG_DIRECCIONIMAGEN"]);
  bodyScroll_ver();
  contenedor_modal_ver_foto.classList.add("activar_bg_ver_foto");
  modal_ver_foto.classList.toggle("cerrar_modal_ver_foto");
}

cerrar_modal_ver_foto.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_ver();
  modal_ver_foto.classList.toggle("cerrar_modal_ver_foto");
  setTimeout(function () {
    contenedor_modal_ver_foto.classList.remove("activar_bg_ver_foto");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_ver_foto) {
    bodyScroll_ver();
    modal_ver_foto.classList.toggle("cerrar_modal_ver_foto");
    setTimeout(function () {
      contenedor_modal_ver_foto.classList.remove("activar_bg_ver_foto");
    }, 800);
  }
});

function bodyScroll_ver() {
  document.body.classList.toggle("no-scroll_ver_foto");
}

// !MODAL VER FOTOS RELACIONADAS 
// !MODAL VER FOTOS RELACIONADAS
// !MODAL VER FOTOS RELACIONADAS

var cerrar_modal_ver_fotoRelacionada = document.querySelector(".btn_cerrar_modal_ver_fotoRelacionada");
var contenedor_modal_ver_fotoRelacionada = document.querySelector(".contenedor_modal_ver_fotoRelacionada");
var modal_ver_fotoRelacionada = document.querySelector(".modal_ver_fotoRelacionada");

function abrir_modal_ver_fotoRelacionada(data) {
  document.getElementById('FotoRelacionada').src = data["IMAG_DIRECCIONIMAGEN"];
  bodyScroll_ver_fotoRelacionada();
  contenedor_modal_ver_fotoRelacionada.classList.add("activar_bg_ver_fotoRelacionada");
  modal_ver_fotoRelacionada.classList.toggle("cerrar_modal_ver_fotoRelacionada");
}

cerrar_modal_ver_fotoRelacionada.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_ver_fotoRelacionada();
  modal_ver_fotoRelacionada.classList.toggle("cerrar_modal_ver_fotoRelacionada");
  setTimeout(function () {
    contenedor_modal_ver_fotoRelacionada.classList.remove("activar_bg_ver_fotoRelacionada");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_ver_fotoRelacionada) {
    bodyScroll_ver_fotoRelacionada();
    modal_ver_fotoRelacionada.classList.toggle("cerrar_modal_ver_fotoRelacionada");
    setTimeout(function () {
      contenedor_modal_ver_fotoRelacionada.classList.remove("activar_bg_ver_fotoRelacionada");
    }, 800);
  }
});

function bodyScroll_ver_fotoRelacionada() {
  document.body.classList.toggle("no-scroll_ver_fotoRelacionada");
}