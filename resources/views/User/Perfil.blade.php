@if (auth()->check())
  @include('Layouts.HeaderUser')
  <link rel="stylesheet" href="css/app_2_perfil.css" />
  <!-- PERFIL -->
  <!-- PERFIL -->
  <div class="contenedor_perfil-password">
    <!-- MODAL CONTENEDOR CONTRASEÑAS -->
    <!-- MODAL CONTENEDOR CONTRASEÑAS -->
    <!-- MODAL CONTENEDOR CONTRASEÑAS -->
    <div class="contendor_password">
      <div class="verde titulo">
        <span class="icono_nav icon-key"></span>
        <p>Cambiar contraseña</p>
      </div>
      <figure class="contenedro__imgElementos">
        <img src="img/svg/undraw_secure_login_pdn4.svg" alt="Imagen validar contraseña">
      </figure>
      <form action="{{ Route('ActualizarPassword') }}" method="POST" class="formulario__password"
        id="formularioPassword">
        @csrf
        @if (session('messagePassword'))
          <input type="hidden" id="messageExito" value="{{ session('messagePassword') }}">
        @endif
        @if (session('MsgErrorPassword'))
          <input type="hidden" id="messageErrorUsu" value="{{ session('MsgErrorPassword') }}">
        @endif
        @if (session('MsgErrorSistema'))
          <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
        @endif
        <!-- INPUTS -->
        <!-- INPUTS -->
        <div class="formulario__contenedor-password">
          <!-- INPUT CONTRASEÑA ANTIGUA -->
          <div class="formulario__grupo" id="grupo__txt_passwordAntiguo">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="password" name="txt_passwordAntiguo" id="txt_passwordAntiguo"
                required>
              <span class="formulario__placeholder">Contraseña Antigua</span>
            </div>
          </div>
          <!-- INPUT CONTRASEÑA 1 -->
          <div class="formulario__grupo" id="grupo__txt_password1">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="password" name="txt_password1" id="txt_password1" required>
              <span class="formulario__placeholder">Nueva contraseña:*</span>
            </div>
          </div>
          <!-- INPUT CONTRASEÑA 2 -->
          <div class="formulario__grupo" id="grupo__txt_password2">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="password" name="txt_password2" id="txt_password2" required>
              <span class="formulario__placeholder">Repita la contraseña:*</span>
            </div>
          </div>
        </div>
        <!-- MENSAJES DE ERROR -->
        <!-- MENSAJES DE ERROR -->
        <div class="password__mensajes_error_inputs">
          <div class="grupo__input-error" id="error__txt_passwordAntiguo">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Contraseña Antigua"</span> debe contener de 8 a 16 caracteres.
            </p>
          </div>
          <div class="grupo__input-error" id="error__txt_password1">
            <div class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Nueva Contraseña"</span> debe contener: <br><br>
              <li class="requisitos_password">De 8 a 16 caracteres.</li>
              <li class="requisitos_password">Al menos una mayuscula.</li>
              <li class="requisitos_password">Al menos una miniscula.</li>
              <li class="requisitos_password">Al menos un numero.</li>
            </div>
          </div>
          <div class="grupo__input-error" id="error__txt_password2">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Repita Contraseña"</span> debe ser igual al campo <span
                class="nom_campo">"Nueva Contraseña"</span>.</span> </p>
          </div>
        </div>
        <!-- BOTON SUBMIT -->
        <!-- BOTON SUBMIT -->
        <input class="azul btn btn_click btn_guardar" type="submit" value="Guardar" />
      </form>
    </div>
    <!-- DATOS DEL PERFIL -->
    <!-- DATOS DEL PERFIL -->
    <!-- DATOS DEL PERFIL -->
    <div class="contenedor_perfil">
      <div class="rojo titulo">
        <span class="icon-user-1"></span>
        <p>Perfil</p>
      </div>
      <form action="{{ Route('ActualizarUser') }}" method="POST" class="formulario" id="formulario">
        <!-- INPUTS -->
        <!-- INPUTS -->
        @csrf
        @if (session('message'))
          <input type="hidden" id="messageExito" value="{{ session('message') }}">
        @endif
        @if (session('MsgErrorSistema'))
          <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
        @endif
        @foreach ($MasDatos as $Fila)
          <input type="hidden" id="IdCiudadBd" name="IdCiudadBd" value="{{ $Fila->CIUDAD_CIUD_ID }}">
          <input type="hidden" id="IdDepartamentoBd" name="IdDepartamentoBd"
            value="{{ $Fila->DEPARTAMENTO_DEPA_ID }}">
        @endforeach
        <div class="formulario__contenedor-perfil">
          <!-- INPUT NOMBRES -->
          <div class="formulario__grupo" id="grupo__txt_nombre">
            <div class="formulario__grupo-input">
              <input autofocus class="formulario__input" type="text" name="txt_nombre" id="txt_nombre" required
                value="{{ auth()->user()->USUA_NOMBRES }}">
              <span class="formulario__placeholder">Nombres:*</span>
            </div>
          </div>
          <!-- INPUT APELLIDOS -->
          <div class="formulario__grupo" id="grupo__txt_apellido">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="text" name="txt_apellido" id="txt_apellido" required
                value="{{ auth()->user()->USUA_APELLIDOS }}">
              <span class="formulario__placeholder">Apellidos:*</span>
            </div>
          </div>
          <!-- INPUT TIPO DE DOCUMENTOS -->
          <div class="formulario__grupo" id="grupo__txt_tipoDocumento">
            <input type="hidden" name="sel_tipoDocumentoBd" id="sel_tipoDocumentoBd"
              value="{{ auth()->user()->TIPO_DOCUMENTO_TIDO_ID }}">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="txt_tipoDocumento" id="txt_tipoDocumento" required>
                <option value=""></option>
                @foreach ($TipoDoc as $Fila)
                  <option value="{{ $Fila->TIDO_ID }}">{{ $Fila->TIDO_DESCRIPCION }}</option>
                @endforeach
              </select>
              <span class="formulario__placeholder">Tipo de documento:*</span>
            </div>
          </div>
          <!-- INPUT NUMERO DE DOCUMENTO -->
          <div class="formulario__grupo" id="grupo__num_documento">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="number" name="num_documento" id="num_documento"
                value="{{ auth()->user()->USUA_NUMERODOCUMENTO }}">
              <span class="formulario__placeholder">Documento:*</span>
            </div>
          </div>
          <!-- INPUT DEPARTAMENTO -->
          <div class="formulario__grupo" id="grupo__txt_departamento">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="txt_departamento" id="txt_departamento" required>
                <option value=""></option>
                @foreach ($Departamento as $Fila)
                  <option value="{{ $Fila->DEPA_ID }}">{{ $Fila->DEPA_DESCRIPCION }}</option>
                @endforeach
              </select>
              <span class="formulario__placeholder">Departamento:*</span>
            </div>
          </div>
          <!-- INPUT MUNICIPIO -->
          <div class="formulario__grupo" id="grupo__txt_municipio">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="txt_municipio" id="txt_municipio" required>
                <option value=""></option>

              </select>
              <span class="formulario__placeholder">Ciudad:*</span>
            </div>
          </div>
          <!-- INPUT DIRECCION -->
          <div class="formulario__grupo" id="grupo__txt_direccion">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="text" name="txt_direccion" id="txt_direccion" required
                value="{{ auth()->user()->USUA_DIRECCION }}">
              <span class="formulario__placeholder">Dirección:*</span>
            </div>
          </div>
          <!-- INPUT TELEFONO -->
          <div class="formulario__grupo" id="grupo__num_telefono">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="number" name="num_telefono" id="num_telefono" required
                value="{{ auth()->user()->USUA_NUMEROCELULAR }}">
              <span class="formulario__placeholder">Telefono:*</span>
            </div>
          </div>
          <!-- INPUT CORREO -->
          <div class="formulario__grupo" id="grupo__txt_correo">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="email" name="txt_correo" id="txt_correo" required
                value="{{ auth()->user()->USUA_CORREO }}">
              <span class="formulario__placeholder">Correo electronico:*</span>
            </div>
          </div>
          <!-- INPUT FECHA DE NACIMIENTO -->
          <div class="formulario__grupo" id="grupo__date_fechaNacimiento">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="date" name="date_fechaNacimiento" id="date_fechaNacimiento"
                required value="{{ auth()->user()->USUA_FECHANACIMIENTO }}">
              <span class="formulario__placeholder">Fecha de nacimiento:*</span>
            </div>
          </div>
        </div>
        <!-- MENSAJES DE ERROR -->
        <!-- MENSAJES DE ERROR -->
        <div class="mensajes_error_inputs">
          <div class="grupo__input-error" id="error__txt_nombre">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Nombres"</span> debe contener caracteres alfabeticos, sin
              numeros ni
              caracteres especiales. </p>
          </div>
          <div class="grupo__input-error" id="error__txt_apellido">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Apellidos"</span> debe contener caracteres alfabeticos, sin
              numeros
              ni caracteres especiales. </p>
          </div>
          <div class="grupo__input-error" id="error__txt_tipoDocumento">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> Selecione por
              favor
              su <span class="nom_campo">"
                Tipo de documento."</span> </p>
          </div>
          <div class="grupo__input-error" id="error__num_documento">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Numero de documento"</span> debe contener un numero de 3 a 10
              digitos, sin puntos ni comas. </p>
          </div>
          <div class="grupo__input-error" id="error__txt_departamento">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> Seleccione por
              favor su <span class="nom_campo">"Departamento."</span></p>
          </div>
          <div class="grupo__input-error" id="error__txt_municipio">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> Seleccione por
              favor su <span class="nom_campo">"Ciudad"</span> o municipio.</p>
          </div>
          <div class="grupo__input-error" id="error__txt_direccion">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Dirección"</span> debe contener texto alfanumerico, de maximo
              80
              digitos. </p>
          </div>
          <div class="grupo__input-error" id="error__num_telefono">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Telefono"</span> debe contener un numero de 7 a 12 digitos, sin
              espacios.</p>
          </div>
          <div class="grupo__input-error" id="error__txt_correo">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> El campo <span
                class="nom_campo">"Correo electronico"</span> debe contener un correo electronico
              valdio. </p>
          </div>
          <div class="grupo__input-error" id="error__date_fechaNacimiento">
            <p class="formulario__input-error-abajo"> <span class="icon-attention"></span> En este campo
              ingrese por favor su <span class="nom_campo">"fecha de nacimiento."</span> </p>
          </div>
        </div>
        <!-- BOTON SUBMIT -->
        <!-- BOTON SUBMIT -->
        <input class="azul btn btn_click btn_guardar" type="submit" value="Actualizar" />
      </form>
    </div>
  </div>
  <!-- TODO FIN DEL CONTENIDO -->
  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_2_perfil.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
