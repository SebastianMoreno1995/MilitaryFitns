<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Military Fitns</title>
  <link rel="icon" type="image" href="img/estrella.png" />
  <link rel="stylesheet" href="css/app_1_login_aplicacion.css" />
  <link rel="stylesheet" href="css/fontello.css" />
  <link rel="stylesheet" href="css/normalize.css" />
</head>

<body>
  <section class="section">
    <div class="contenedor__login">
      <div class="titulo">
        <p>Iniciar Sesión</p>
      </div>
      <h2 class="h2">Military Fitns</h2>
      <form action="{{ Route('LoginUsers.Login') }}" method="POST" class="formulario" id="formulario">
        @csrf
        <!-- INPUT USUARIO -->
        <div class="formulario__grupo" id="grupo__correo">
          @error('correo')
            <p>*{{ $message }}</p>
          @enderror
          <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones, guion bajo,
            un arroba y un dominio.</p>
          <div class="formulario__grupo-input">
            <input class="formulario__input" type="text" autofocus name="correo" id="correo" value="{{ old('correo') }}"
              required>
            <span class="formulario__placeholder">Usuario</span>
            <span class="formulario__validacion-estado icon-cancel-circled2"></span>
          </div>
        </div>
        <!-- INPUT CONTRASEÑA -->
        <div class="formulario__grupo" id="grupo__password">
          @error('password')
            <span>*{{ $message }}</span>
          @enderror
          <p class="formulario__input-error">La contraseña debe contener de 8 a 12 dígitos.</p>
          <div class="formulario__grupo-input">
            <input class="formulario__input" type="password" name="password" id="password" required>
            <span class="formulario__placeholder">Contraseña</span>
            <span class="formulario__validacion-estado icon-cancel-circled2"></span>
          </div>
        </div>
        <!-- CHECKBOX -->
        <div class="contenedor__checkbox">
          <input type="checkbox" name="recordarme" id="recordarme">
          <p class="recordarme_txt">Recuerdame</p>
        </div>
        <!-- MENSAJE DE ERROR -->
        <div class="formulario__mensaje" id="formulario__mensaje_controlador">
          @error('msg')
            <script>
              document.getElementById('formulario__mensaje_controlador').classList.add('formulario__mensaje_controlador-activo');
            </script>
            <p class="formulario__mensaje-error"><span class="icon-attention"><b>Error: </b>{{ $message }}</span></p>
          @enderror
        </div>
        <div class="formulario__mensaje" id="formulario__mensaje">
          <p class="formulario__mensaje-error"><span class="icon-attention"><b>Error:</b>&nbspComplete todos los
              campos</span></p>
        </div>
        <!-- BOTON ENVIAR FORMULARIO -->
        <div class="formulario__grupo formulario__grupo-btn-enviar">
          <button type="submit" class="formulario__btn">Iniciar Sesión</button>
        </div>
      </form>
      <a class="olvidaste" href="#">Olvidaste la contraseña? <span class="click_aqui">Click aqui</span></a>
    </div>
  </section>
  <script src="js/app_1_login.js"></script>
</body>

</html>
