const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //formato de correo con _ - .
	password: /^.{8,12}$/ // 8 a 12 digitos.
}

const campos = {
	correo: false,
	password: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
    case "correo":
			validarCampo(expresiones.correo, e.target, e.target.name);
		break;
		case "password":
			validarCampo(expresiones.password, e.target, e.target.name);
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
  if(expresion.test(input.value)){
    document.getElementById(`grupo__${campo}`).classList.remove("formulario__grupo-incorrecto");
    document.getElementById(`grupo__${campo}`).classList.add("formulario__grupo-correcto");
    document.querySelector(`#grupo__${campo} span`).classList.add("icon-check");
    document.querySelector(`#grupo__${campo} span`).classList.remove("icon-cancel-circled2");
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    campos[campo] = true;
  } else {
    document.getElementById(`grupo__${campo}`).classList.add("formulario__grupo-incorrecto");
    document.getElementById(`grupo__${campo}`).classList.remove("formulario__grupo-correcto");
    document.querySelector(`#grupo__${campo} span`).classList.add("icon-cancel-circled2");
    document.querySelector(`#grupo__${campo} span`).classList.remove("icon-check");
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    campos[campo] = false;
  }
}

inputs.forEach((input) =>{
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
	const terminos = document.getElementById('terminos');
	if(campos.correo && campos.password){
		formulario.submit();
	} else {
		document.getElementById('formulario__mensaje_controlador').classList.remove('formulario__mensaje_controlador-activo');
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});