const slider = document.querySelector("#slider");
let contenedor__imagen = document.querySelectorAll(".contenedor__imagen");
let contenedor__imagenLast = contenedor__imagen[contenedor__imagen.length - 1];

const btn_arriba = document.querySelector("#btn_arriba");
const btn_abajo = document.querySelector("#btn_abajo");

slider.insertAdjacentElement("afterbegin", contenedor__imagenLast);

function siguiente() {
  let contenedor__imagenFirs = document.querySelectorAll(
    ".contenedor__imagen"
  )[0];
  slider.style.marginTop = "-200px";
  slider.style.transition = "all 0.5s";
  setTimeout(function () {
    slider.style.transition = "none";
    slider.insertAdjacentElement("beforeend", contenedor__imagenFirs);
    slider.style.marginTop = "-100px";
  }, 500);
}
function anterior() {
  let contenedor__imagen = document.querySelectorAll(".contenedor__imagen");
  let contenedor__imagenLast = contenedor__imagen[contenedor__imagen.length - 1];
  slider.style.marginTop = "0";
  slider.style.transition = "all 0.5s";
  setTimeout(function () {
    slider.style.transition = "none";
    slider.insertAdjacentElement("afterbegin", contenedor__imagenLast);
    slider.style.marginTop = "-100px";
  }, 500);
}
btn_abajo.addEventListener("click", function () {
  anterior();
});
btn_arriba.addEventListener("click", function () {
  siguiente();
});