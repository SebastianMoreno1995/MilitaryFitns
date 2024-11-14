// SUSCRIBETE
// SUSCRIBETE
// SUSCRIBETE
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

observador.observe(menu_navegacion);
observador.observe(suscribete);