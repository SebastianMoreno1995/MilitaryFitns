@if (auth()->check())
  @include('Layouts.HeaderUser')
  <link rel="stylesheet" href="css/app_3_proveedores.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
  {{-- @section('css')
        <link rel="stylesheet"
            href="https://datatables.net/#:~:text=//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    @endsection --}}
  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <div class="contenedor_contenido_derecha">
    <!-- TABLA -->
    <!-- TABLA -->
    <!-- TABLA -->
    <form class="contenedor_tabla">
      <div class="tabla_titulo">
        <span class="icono_nav icon-group"></span>
        <p>Proveedores</p>
      </div>
      <div class="elementos_tabla">
        <div class="elementos_arriba">
          <div class="titulo_btn_nuevo btn btn_click btn_abrir_modal_nuevo btn_nuevo">
            <span class="icon-plus"></span>
            <p>Nuevo Proveedor</p>
          </div>
        </div>
        <div class="tabla">
          <table id="tabla_proveedores" class="hover">
            <thead>
              <tr>
                <th class="tamanio1">No</th>
                <th class="tamanio5">Nombre</th>
                <th class="tamanio3">Tipo Documento</th>
                <th class="tamanio3">Documento</th>
                <th class="tamanio3">Celular</th>
                <th class="tamanio2">Estado</th>
                <th class="tamanio4">Acciones</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </form>
    <!-- MODAL NUEVO -->
    <!-- MODAL NUEVO -->
    <!-- MODAL NUEVO -->
    <div class="contenedor_modal_nuevo">
      <div class="modal_nuevo cerrar_modal">
        <div class="titulo_nuevo titulo">
          <span class="icon-truck"></span>
          <p>Nuevo Proveedor</p>
        </div>
        <form action="{{ Route('ActualizarProveedores') }}" method="POST" class="formulario"
          id="formulario_nuevo_proveedores">
          @csrf
          @if (session('message'))
            <input type="hidden" id="messageExito" value="{{ session('message') }}">
          @endif
          <input type="hidden" id="Accion" name="Accion" value="Registrar">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor-nuevo">
            <!-- INPUT NOMBRES -->
            <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_nombre_nuevo_proveedores"
                  id="txt_nombre_nuevo_proveedores" required />
                <span class="formulario__placeholder">Nombres:*</span>
              </div>
            </div>
            <!-- INPUT TIPO DE DOCUMENTOS -->
            <div class="formulario__grupo" id="grupo__sel_tipoDocumento_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_tipoDocumento_nuevo_proveedores"
                  id="sel_tipoDocumento_nuevo_proveedores" required>
                  <option value=""></option>
                  @foreach ($TipoDoc as $Fila)
                    <option value="{{ $Fila->TIDO_ID }}">{{ $Fila->TIDO_DESCRIPCION }}</option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Tipo de documento:*</span>
              </div>
            </div>
            <!-- INPUT NUMERO DE DOCUMENTO -->
            <div class="formulario__grupo" id="grupo__num_documento_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="number" name="num_documento_nuevo_proveedores"
                  id="num_documento_nuevo_proveedores" required />
                <span class="formulario__placeholder">Documento:*</span>
              </div>
            </div>
            <!-- INPUT DEPARTAMENTO -->
            <div class="formulario__grupo" id="grupo__sel_departamento_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_departamento_nuevo_proveedores"
                  id="sel_departamento_nuevo_proveedores" required>
                  <option value=""></option>
                  @foreach ($Departamento as $Fila)
                    <option value="{{ $Fila->DEPA_ID }}">{{ $Fila->DEPA_DESCRIPCION }}
                    </option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Departamento:*</span>
              </div>
            </div>
            <!-- INPUT MUNICIPIO -->
            <div class="formulario__grupo" id="grupo__sel_municipio_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_municipio_nuevo_proveedores"
                  id="sel_municipio_nuevo_proveedores" required>
                  <option value=""></option>
                </select>
                <span class="formulario__placeholder">Ciudad:*</span>
              </div>
            </div>
            <!-- INPUT DIRECCION -->
            <div class="formulario__grupo" id="grupo__txt_direccion_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_direccion_nuevo_proveedores"
                  id="txt_direccion_nuevo_proveedores" required />
                <span class="formulario__placeholder">Dirección:*</span>
              </div>
            </div>
            <!-- INPUT TELEFONO -->
            <div class="formulario__grupo" id="grupo__num_telefono_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="number" name="num_telefono_nuevo_proveedores"
                  id="num_telefono_nuevo_proveedores" required />
                <span class="formulario__placeholder">Telefono:*</span>
              </div>
            </div>
            <!-- INPUT CELULAR -->
            <div class="formulario__grupo" id="grupo__num_celular_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="number" name="num_celular_nuevo_proveedores"
                  id="num_celular_nuevo_proveedores" required />
                <span class="formulario__placeholder">Celular:*</span>
              </div>
            </div>
            <!-- INPUT CORREO -->
            <div class="formulario__grupo" id="grupo__txt_correo_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_correo_nuevo_proveedores"
                  id="txt_correo_nuevo_proveedores" required />
                <span class="formulario__placeholder">Correo electronico:*</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_nuevo_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_estado_nuevo_proveedores" id="sel_estado_nuevo_proveedores"
                  required>
                  <option value=""></option>
                  @foreach ($Estados as $Fila)
                    <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Estado:*</span>
              </div>
            </div>
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <div class="grupo__input-error" id="error__txt_nombre_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Nombres"</span> debe contener
                caracteres alfabeticos, sin numeros ni caracteres
                especiales.
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_tipoDocumento_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                su <span class="nom_campo">" Tipo de documento."</span>
              </p>
            </div>
            <div class="grupo__input-error" id="error__num_documento_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Numero de documento"</span> debe
                contener un numero de 3 a 10 digitos, sin puntos ni comas.
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_departamento_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Seleccione por favor
                su <span class="nom_campo">"Departamento."</span>
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_municipio_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Seleccione por favor
                su <span class="nom_campo">"Ciudad"</span> o municipio.
              </p>
            </div>
            <div class="grupo__input-error" id="error__txt_direccion_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Dirección"</span> debe contener
                texto alfanumerico, de maximo 80 digitos.
              </p>
            </div>
            <div class="grupo__input-error" id="error__num_telefono_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Telefono"</span> debe contener un
                numero de 7 a 12 digitos, sin espacios.
              </p>
            </div>
            <div class="grupo__input-error" id="error__num_celular_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Celular"</span> debe contener un
                numero de 10 digitos, sin espacios.
              </p>
            </div>
            <div class="grupo__input-error" id="error__txt_correo_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Correo electronico"</span> debe
                contener un correo electronico valdio.
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_estado_nuevo_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> En el campo
                <span class="nom_campo">"Estado"</span> debe
                seleccionar alguna opción.
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_nuevo" type="submit" value="Nuevo" />
          <div class="btn_cancelar btn_click btn_cerrar_nuevo">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL VER -->
    <!-- MODAL VER -->
    <!-- MODAL VER -->
    <div class="contenedor_modal_ver">
      <div class="modal_ver">
        <div class="titulo_ver titulo">
          <span class="icono_nav icon-truck"></span>
          <p>Datos del proveedor</p>
        </div>
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_connecting_teams_re_hno7.svg" alt="Imagen guardado correctamente" />
        </figure>
        <div class="mensaje__info-ver">
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Proveedor:</span>
            <span class="txt__enter-ver" id="Proveedor_Nombre_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Tipo Documento:</span>
            <span class="txt__enter-ver" id="Proveedor_TipoDoc_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Documento / Nit:</span>
            <span class="txt__enter-ver" id="Proveedor_Nit_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Direccion:</span>
            <span class="txt__enter-ver" id="Proveedor_Direccion_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Departamento:</span>
            <span class="txt__enter-ver" id="Proveedor_Departamento_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Ciudad:</span>
            <span class="txt__enter-ver" id="Proveedor_Ciudad_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Telefono:</span>
            <span class="txt__enter-ver" id="Proveedor_Telefono_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Celular:</span>
            <span class="txt__enter-ver" id="Proveedor_Celular_info">Ninguno</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Correo electronico:</span>
            <span class="txt__enter-ver" id="Proveedor_Correo_info">Ninguno@gmail.com</span>
          </div>
          <div class="lista-info-ver">
            <span class="txt__negrita-ver">Estado:</span>
            <span class="txt__enter-ver" id="Proveedor_Estado_info">Ninguno</span>
          </div>
        </div>
        <input class="btn btn_click btn_ver btn_cerrar_modal_ver" type="button" value="Aceptar" />
      </div>
    </div>
    <!-- MODAL EDITAR -->
    <!-- MODAL EDITAR -->
    <!-- MODAL EDITAR -->
    <div class="contenedor_modal_editar">
      <div class="modal_editar cerrar_modal">
        <div class="titulo_editar titulo">
          <span class="icon-truck"></span>
          <p>Editar Proveedor</p>
        </div>
        <form action="{{ Route('ActualizarProveedores') }}" method="POST" class="formulario"
          id="formulario_editar_proveedores">
          @csrf
          @if (session('message'))
            <input type="hidden" id="messageExito" value="{{ session('message') }}">
          @endif
          <input type="hidden" id="Prov_id" name="Prov_id">
          <input type="hidden" id="Accion" name="Accion" value="Modificar">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor-editar">
            <!-- INPUT NOMBRES -->
            <div class="formulario__grupo" id="grupo__txt_nombre_editar_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_nombre_editar_proveedores"
                  id="txt_nombre_editar_proveedores" required />
                <span class="formulario__placeholder">Nombres:*</span>
              </div>
            </div>
            <!-- INPUT TIPO DE DOCUMENTOS -->
            <div class="formulario__grupo" id="grupo__sel_tipoDocumento_editar_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_tipoDocumento_editar_proveedores"
                  id="sel_tipoDocumento_editar_proveedores" required>
                  @foreach ($TipoDoc as $Fila)
                    <option value="{{ $Fila->TIDO_ID }}">{{ $Fila->TIDO_DESCRIPCION }}
                    </option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Tipo de documento:*</span>
              </div>
            </div>
            <!-- INPUT NUMERO DE DOCUMENTO -->
            <div class="formulario__grupo" id="grupo__num_documento_editar_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="number" name="num_documento_editar_proveedores"
                  id="num_documento_editar_proveedores" required />
                <span class="formulario__placeholder">Documento:*</span>
              </div>
            </div>
            <!-- INPUT DEPARTAMENTO -->
            <div class="formulario__grupo" id="grupo__sel_departamento_editar_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_departamento_editar_proveedores"
                  id="sel_departamento_editar_proveedores" required>
                  <option value=""></option>
                  @foreach ($Departamento as $Fila)
                    <option value="{{ $Fila->DEPA_ID }}">{{ $Fila->DEPA_DESCRIPCION }}
                    </option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Departamento:*</span>
              </div>
            </div>
            <!-- INPUT MUNICIPIO -->
            <div class="formulario__grupo" id="grupo__sel_municipio_editar_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_municipio_editar_proveedores"
                  id="sel_municipio_editar_proveedores" required>
                  <option value=""></option>

                </select>
                <span class="formulario__placeholder">Ciudad:*</span>
              </div>
            </div>
            <!-- INPUT DIRECCION -->
            <div class="formulario__grupo" id="grupo__txt_direccion_editar_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_direccion_editar_proveedores"
                  id="txt_direccion_editar_proveedores" required />
                <span class="formulario__placeholder">Dirección:*</span>
              </div>
            </div>
            <!-- INPUT TELEFONO -->
            <div class="formulario__grupo" id="grupo__num_telefono_editar_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="number" name="num_telefono_editar_proveedores"
                  id="num_telefono_editar_proveedores" required />
                <span class="formulario__placeholder">Telefono:*</span>
              </div>
            </div>
            <!-- INPUT CELULAR -->
            <div class="formulario__grupo" id="grupo__num_celular_editar_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="number" name="num_celular_editar_proveedores"
                  id="num_celular_editar_proveedores" required />
                <span class="formulario__placeholder">Celular:*</span>
              </div>
            </div>
            <!-- INPUT CORREO -->
            <div class="formulario__grupo" id="grupo__txt_correo_editar_proveedores">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_correo_editar_proveedores"
                  id="txt_correo_editar_proveedores" required />
                <span class="formulario__placeholder">Correo electronico:*</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_editar_proveedores">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_estado_editar_proveedores"
                  id="sel_estado_editar_proveedores" required>
                  <option value=""></option>
                  @foreach ($Estados as $Fila)
                    <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Estado:*</span>
              </div>
            </div>
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <div class="grupo__input-error" id="error__txt_nombre_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Nombres"</span> debe contener
                caracteres alfabeticos, sin numeros ni caracteres
                especiales.
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_tipoDocumento_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                su <span class="nom_campo">" Tipo de documento."</span>
              </p>
            </div>
            <div class="grupo__input-error" id="error__num_documento_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Numero de documento"</span> debe
                contener un numero de 3 a 10 digitos, sin puntos ni comas.
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_departamento_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Seleccione por favor
                su <span class="nom_campo">"Departamento."</span>
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_municipio_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Seleccione por favor
                su <span class="nom_campo">"Ciudad"</span> o municipio.
              </p>
            </div>
            <div class="grupo__input-error" id="error__txt_direccion_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Dirección"</span> debe contener
                texto alfanumerico, de maximo 80 digitos.
              </p>
            </div>
            <div class="grupo__input-error" id="error__num_telefono_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Telefono"</span> debe contener un
                numero de 7 a 12 digitos, sin espacios.
              </p>
            </div>
            <div class="grupo__input-error" id="error__num_celular_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Celular"</span> debe contener un
                numero de 10 digitos, sin espacios.
              </p>
            </div>
            <div class="grupo__input-error" id="error__txt_correo_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Correo electronico"</span> debe
                contener un correo electronico valdio.
              </p>
            </div>
            <div class="grupo__input-error" id="error__sel_estado_editar_proveedores">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> En el campo
                <span class="nom_campo">"Estado"</span> debe
                seleccionar una opción.
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_editar" type="submit" value="Editar" />
          <div class="btn_cancelar btn_click btn_cerrar_editar" onclick="cerrar_editar();">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- POPUP ELIMINAR REGISTRO -->
    <!-- POPUP ELIMINAR REGISTRO -->
    <!-- POPUP ELIMINAR REGISTRO -->
    <div class="contenedor_popup_eliminar">
      <form class="popup_eliminar" action="{{ Route('EliminarProveedores') }}" method="POST">
        @csrf
        <div class="titulo_eliminar titulo">
          <span class="icono_nav icon-attention-1"></span>
          <p>Eliminar Registro</p>
        </div>
        <figure class="contenedro__img-eliminar">
          <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
        </figure>
        <span class="icon-attention"></span>
        <div class="mensaje__eliminar">
          Esta seguro que desea <span class="nom_campo">Eliminar</span> el
          siguiente registro:
        </div>
        <div class="mensaje__info-eliminar">
          <ul>
            <li class="lista-info-eliminar">
              <input type="hidden" id="Proveedor_id_eliminar" name="Proveedor_id_eliminar">
              <span class="txt__negrita-eliminar">Nombre del proveedor:
              </span>
              <span class="txt__enter-eliminar" id="Proveedor_Nombre_eliminar">Ninguno</span>
            </li>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Tipo de documento: </span>
              <span class="txt__enter-eliminar" id="Proveedor_TipoDoc_eliminar">Ninguno</span>
            </li>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Numero de documento:
              </span>
              <span class="txt__enter-eliminar" id="Proveedor_Documento_eliminar">Ninguno</span>
            </li>
          </ul>
        </div>
        <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
        <div class="btn_cancelar_eliminar btn_click btn_cerrar_popup_eliminar">
          Cancelar
        </div>
      </form>
    </div>
  </div>
  <!-- TODO FIN DEL CONTENIDO -->

  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#menu_proveedor").addClass("item_select");
      var z = 0;
      var table = $('#tabla_proveedores').DataTable({
        "ajax": "{{ route('AllProveedorUser') }}",
        "order": [[ 1, 'asc' ]],
        "columns": [{
            data: 'PROV_ID'
          },
          {
            data: 'PROV_NOMBRE'
          },
          {
            data: 'TIDO_DESCRIPCION'
          },
          {
            data: 'PROV_NIT'
          },
          {
            data: 'PROV_CELULAR'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
                            <div class="contenedor_botones">
                              <div class="btn_accion-ver btn btn_click btn_accion btn_abrir_modal_ver">
                                    <span class="icon-eye" title="Ver"></span>
                                </div>
                                <div class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar">
                                    <span class="icon-edit-1" title="Editar"></span>
                                </div>
                                <div class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_popup_eliminar">
                                    <span class="icon-trash" title="Eliminar"></span>
                                </div>
                            </div>
                        `,
            "className": "td_acciones"
          }
        ],
        "language": {
          "lengthMenu": "Mostrar " +
            `<select> 
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                        </select>` +
            " registros por pagina",
          "zeroRecords": "Nada encontrado",
          "info": "Mostrando la pagina page _PAGE_ de _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtrado de_MAX_ registros totales)",
          "search": "Buscar: ",
          "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
          }
        }
      });

      table.on('order.dt search.dt', function() {
        table.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();

      $('#tabla_proveedores tbody').on('click', 'div.btn_accion-ver', function() {
        var data = table.row($(this).parents('tr')).data();
        modalVer(data['PROV_ID'])
      });

      $('#tabla_proveedores tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        modalEditar(data['PROV_ID'])
      });
      $('#tabla_proveedores tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        modalEliminar(data['PROV_ID'])
      });


    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_3_proveedores.js"></script>

  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
