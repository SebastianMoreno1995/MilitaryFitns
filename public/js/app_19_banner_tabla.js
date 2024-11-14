// TODO MODALES BANNER
// TODO MODALES BANNER
// TODO MODALES BANNER

// !MODAL VER
// !MODAL VER
// !MODAL VER

var cerrar_modal_ver_banner = document.querySelector(".btn_cerrar_modal_ver_banner");
var contenedor_modal_ver_banner = document.querySelector(".contenedor_modal_ver_banner");
var modal_ver_banner = document.querySelector(".modal_ver_banner");

function abrir_modal_ver_banner(data) {
  // e.preventDefault();
  document.getElementById('Nom_producto').textContent = data['PROD_NOMBRE']+' '+data['COMPLEMENTO'];
  document.getElementById('Nom_presentacion').textContent = data['UNME_MEDIDA'];
  document.getElementById('Nom_imagen').textContent = data['IMAG_NOMBRE'];
  document.getElementById('Descuento').textContent = data['OFER_DESCUENTO']+'%';
  document.getElementById('Estado').textContent = data['ESTA_TIPO'];

  document.getElementById('Img_producto').src = data['IMGPRESENTACION'];
  document.getElementById('Img_producto_1').src = data['IMGPRESENTACION'];
  document.getElementById('Img_producto_2').src = data['IMGPRESENTACION'];

  document.getElementById('Img_marca').src = data['MARC_IMAGEN'];
  document.getElementById('Img_marca_1').src = data['MARC_IMAGEN'];
  document.getElementById('Img_marca_2').src = data['MARC_IMAGEN'];

  document.getElementById('Img_deportiva').src = data['IMGBANNER'];
  document.getElementById('Img_deportiva_1').src = data['IMGBANNER'];
  document.getElementById('Img_deportiva_2').src = data['IMGBANNER'];

  document.getElementById('Nombre_producto').textContent = data['PROD_NOMBRE'];
  document.getElementById('Nombre_producto_1').textContent = data['PROD_NOMBRE'];
  document.getElementById('Nombre_producto_2').textContent = data['PROD_NOMBRE'];

  document.getElementById('Nombre_complemento').textContent = data['COMPLEMENTO'];
  document.getElementById('Nombre_complemento_1').textContent = data['COMPLEMENTO'];
  document.getElementById('Nombre_complemento_2').textContent = data['COMPLEMENTO'];

  document.getElementById('Descuento_ver').textContent = data['OFER_DESCUENTO'];
  document.getElementById('Descuento_ver_1').textContent = data['OFER_DESCUENTO'];
  document.getElementById('Descuento_ver_2').textContent = data['OFER_DESCUENTO'];
  
  bodyScroll_ver_banner();
  contenedor_modal_ver_banner.classList.add("activar_bg_ver_banner");
  modal_ver_banner.classList.toggle("cerrar_modal_ver_banner");
}

cerrar_modal_ver_banner.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_ver_banner();
  modal_ver_banner.classList.toggle("cerrar_modal_ver_banner");
  setTimeout(function () {
    contenedor_modal_ver_banner.classList.remove("activar_bg_ver_banner");
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_ver_banner) {
    bodyScroll_ver_banner();
    modal_ver_banner.classList.toggle("cerrar_modal_ver_banner");
    setTimeout(function () {
      contenedor_modal_ver_banner.classList.remove("activar_bg_ver_banner");
    }, 800);
  }
});

function bodyScroll_ver_banner() {
  document.body.classList.toggle("no-scroll_ver_banner");
}

// !SLIDER Carrusel
// !SLIDER Carrusel
// !SLIDER Carrusel

const slider = document.querySelector("#slider");
let banner__contenido = document.querySelectorAll(".banner__contenido");
let banner__contenidoLast = banner__contenido[banner__contenido.length - 1];

const btn_izquierdo = document.querySelector("#btn_izquierdo");
const btn_derecho = document.querySelector("#btn_derecho");

slider.insertAdjacentElement("afterbegin", banner__contenidoLast);

function siguiente() {
  let banner__contenidoFirs = document.querySelectorAll(
    ".banner__contenido"
  )[0];
  slider.style.marginLeft = "-200%";
  slider.style.transition = "all 0.5s";
  setTimeout(function () {
    slider.style.transition = "none";
    slider.insertAdjacentElement("beforeend", banner__contenidoFirs);
    slider.style.marginLeft = "-100%";
  }, 500);
}
function anterior() {
  let banner__contenido = document.querySelectorAll(".banner__contenido");
  let banner__contenidoLast = banner__contenido[banner__contenido.length - 1];
  slider.style.marginLeft = "0";
  slider.style.transition = "all 0.5s";
  setTimeout(function () {
    slider.style.transition = "none";
    slider.insertAdjacentElement("afterbegin", banner__contenidoLast);
    slider.style.marginLeft = "-100%";
  }, 500);
}
btn_derecho.addEventListener("click", function () {
  siguiente();
});
btn_izquierdo.addEventListener("click", function () {
  anterior();
});

setInterval(() => {
  siguiente();
}, 10000);

// !BANNER IntersectionObserver
// !BANNER IntersectionObserver
// !BANNER IntersectionObserver

const banner1 = document.getElementById("banner1");
const banner2 = document.getElementById("banner2");
const banner3 = document.getElementById("banner3");

const cargarBanner = (entradas, observador) => {
  entradas.forEach((entrada) => {
    if (entrada.isIntersecting) {
      entrada.target.classList.add("visible");
    } else {
      entrada.target.classList.remove("visible");
    }
  });
};

const observador = new IntersectionObserver(cargarBanner, {
  root: null,
  rootMargin: "0px 0px 0px 0px",
  threshold: 1.0,
});

observador.observe(banner1);
observador.observe(banner2);
observador.observe(banner3);

// !MODAL ELIMINAR
// !MODAL ELIMINAR
// !MODAL ELIMINAR

var cerrar_modal_eliminar_banner = document.querySelector(
  ".btn_cerrar_modal_eliminar_banner"
);
var contenedor_modal_eliminar_banner = document.querySelector(
  ".contenedor_modal_eliminar_banner"
);
var modal_eliminar_banner = document.querySelector(".modal_eliminar_banner");

function abrir_modal_eliminar_banner(data) {
  document.getElementById('txt_bann_id_eliminar').value=data['BANN_ID'];
  document.getElementById('txt_bann_nombre').textContent=data['PROD_NOMBRE']+' '+ data['COMPLEMENTO']+ ' ' +  data['UNME_MEDIDA'];
  bodyScroll_eliminar_banner();
  contenedor_modal_eliminar_banner.classList.add("activar_bg_eliminar_banner");
  modal_eliminar_banner.classList.toggle("cerrar_modal_eliminar_banner");
}

cerrar_modal_eliminar_banner.addEventListener("click", function (e) {
  e.preventDefault();
  bodyScroll_eliminar_banner();
  modal_eliminar_banner.classList.toggle("cerrar_modal_eliminar_banner");
  setTimeout(function () {
    contenedor_modal_eliminar_banner.classList.remove(
      "activar_bg_eliminar_banner"
    );
  }, 800);
});

window.addEventListener("click", function (e) {
  let target = e.target;
  if (target == contenedor_modal_eliminar_banner) {
    bodyScroll_eliminar_banner();
    modal_eliminar_banner.classList.toggle("cerrar_modal_eliminar_banner");
    setTimeout(function () {
      contenedor_modal_eliminar_banner.classList.remove(
        "activar_bg_eliminar_banner"
      );
    }, 800);
  }
});

function bodyScroll_eliminar_banner() {
  document.body.classList.toggle("no-scroll_eliminar");
}