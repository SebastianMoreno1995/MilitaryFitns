// !SLIDER Carrusel
// !SLIDER Carrusel
// !SLIDER Carrusel

const slider = document.querySelector("#slider");
let banner__contenido = document.querySelectorAll(".banner__contenido");
let banner__contenidoLast = banner__contenido[banner__contenido.length - 1];

document.getElementsByClassName("banner__contenedor-sliders")[0].style.width = `${banner__contenido.length * 100}%`;

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

const todosBanners = document.querySelectorAll(".banner__contenido");
const menu_navegacion = document.getElementById("menu_navegacion");
const suscribete = document.getElementById("suscribete");

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

todosBanners.forEach(element => observador.observe(element));
observador.observe(menu_navegacion);
// observador.observe(suscribete);
