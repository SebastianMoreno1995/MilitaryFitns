@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_12_producto_nuevo_presentacion.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />


  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR PRODUCTOS -->
  <!-- CONTENEDOR PRODUCTOS -->
  <!-- CONTENEDOR PRODUCTOS -->
  <div class="contenedor_presentacion">
    @if (session('message'))
      <input type="hidden" id="messageExito" value="{{ session('message') }}">
    @endif
    @if (session('MsgErrorSistema'))
      <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
    @endif
    @if ($Tipo == null)
      <div class="contenedor_titulo">
        <span class="icono_nav icon-plus"></span>
        <p>Nuevo Producto</p>
      </div>
    @endif
    @if ($Tipo != null && $Tipo === 'Modificar')
      <div class="contenedor_titulo_editar">
        <span class="icono_nav icon-plus"></span>
        <p>Modificar Producto</p>
      </div>
    @endif
    <!-- TITULO -->
    <!-- TITULO -->
    <div class="contenedor_titulo">
      <span class="icono_nav icon-plus"></span>
      <p>Nuevo Producto</p>
    </div>
    <!-- CONTENIDO -->
    <!-- CONTENIDO -->
    <form class="elementos" action="{{ Route('RegistrarProducto') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="opcion" name="opcion" value="3">
      @if (session('Prod_id' . auth()->user()->USUA_ID))
        <input type="hidden" id="Prod_id" name="Prod_id" value="{{ session('Prod_id' . auth()->user()->USUA_ID) }}">
      @endif
      <!-- !ELEMENTOS DATOS PRESENTACION DEL PRODUCTO -->
      <!-- !ELEMENTOS DATOS PRESENTACION DEL PRODUCTO -->
      <!-- NUEVO DATOS PRESENTACION -->
      <!-- NUEVO DATOS PRESENTACION -->
      <!-- NUEVO DATOS PRESENTACION -->
      <div class="contenedor_nuevo">
        <!-- BOTON DE ATRAS -->
        <!-- BOTON DE ATRAS -->

        <a href="{{ route('ProductosFotosUser') }}?PROD_ID={{ session('Prod_id' . auth()->user()->USUA_ID) }}&Tipo=Modificar"
          class="btn_atras"><span class="icon-left-big"></span>Atras</a>

        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo titulo_nuevo">
          <span class="icono_nav icon-linode"></span>
          <p>Datos especificos del producto</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__imgElementos">
          <img src="img/svg/undraw_collecting_re_lp6p.svg" alt="Imagen Presentacion" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <div class="formulario" id="formulario_nuevo_presentacion">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor">
            <div class="lado_izquierdo">
              <!-- INPUT PRESENTACION -->
              <div class="formulario__grupo" id="grupo__sel_presentacion_nuevo_presentacion">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_presentacion_nuevo_presentacion"
                    id="sel_presentacion_nuevo_presentacion" required>
                    <option value=""></option>
                    @foreach ($Presentacion as $Fila)
                      <option value="{{ $Fila->UNME_ID }}">{{ $Fila->UNME_MEDIDA }}</option>
                    @endforeach
                  </select>
                  <span class="formulario__placeholder">Presentación:*</span>
                </div>
              </div>
              <!-- INPUT PRECIO -->
              <div class="formulario__grupo" id="grupo__num_precio_nuevo_presentacion">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="number" name="num_precio_nuevo_presentacion"
                    id="num_precio_nuevo_presentacion" required />
                  <span class="formulario__placeholder">Precio de venta:*</span>
                </div>
              </div>
              <!-- INPUT SABOR -->
              <div class="formulario__grupo" id="grupo__sel_sabor_nuevo_presentacion">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_sabor_nuevo_presentacion"
                    id="sel_sabor_nuevo_presentacion">
                    <option value=""></option>
                    @foreach ($Sabor as $Fila)
                      <option value="{{ $Fila->SABO_ID }}">{{ $Fila->SABO_DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <span class="formulario__placeholder">Sabor:</span>
                </div>
              </div>
            </div>
            <!-- PREVISUALIZAR IMAGEN -->
            <figure class="contenedor_img-producto" id="contenedor_img_nuevo_presentacion">
              <img class="img-producto" src="img/Agregar Fotos.png" alt="Imagen de categoría"
                id="img_nuevo_presentacion" />
            </figure>
            <div class="lado_derecho">
              <!-- INPUT IMAGEN -->
              <div class="formulario__grupo" id="grupo__txt_imagen_nuevo_presentacion">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="text" name="txt_imagen_nuevo_presentacion"
                    id="txt_imagen_nuevo_presentacion" />
                  <span class="formulario__placeholder">Seleccione una imagen:</span>
                  <label for="input_file_nuevo" class="label_subir">
                    <span class="icon-folder-open-empty"></span>
                  </label>
                  <input type="file" name="input_file_nuevo" id="input_file_nuevo"
                    onchange="vista_preliminar_nuevo(event)" />
                </div>
              </div>
              <!-- INPUT STOCK MINIMO -->
              <div class="formulario__grupo" id="grupo__num_stockMin_nuevo_presentacion">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="number" name="num_stockMin_nuevo_presentacion"
                    id="num_stockMin_nuevo_presentacion" required />
                  <span class="formulario__placeholder">Stock Minimo:*</span>
                </div>
              </div>
              <!-- INPUT ESTADO -->
              <div class="formulario__grupo" id="grupo__sel_estado_nuevo_presentacion">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_estado_nuevo_presentacion"
                    id="sel_estado_nuevo_presentacion">
                    <option value=""></option>
                    @foreach ($Estados as $Fila)
                      <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                    @endforeach
                  </select>
                  <span class="formulario__placeholder">Estado:*</span>
                </div>
              </div>
            </div>
          </div>
          <!-- BOTON SUBMIT GUARDAR PRESENTACION O SABOR -->
          <input class="btn btn_click btn_guardar btn_presentacion" type="submit" value="Establecer Presentación" />
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <!-- MENSAJE PRESENTACION -->
            <div class="grupo__input-error" id="error__sel_presentacion_nuevo_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                una <span class="nom_campo">"Presentación".</span>
              </p>
            </div>
            <!-- MENSAJE PRECIO -->
            <div class="grupo__input-error" id="error__num_precio_nuevo_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Precio"</span> debe contener una
                cifra sin puntos ni comas.
              </p>
            </div>
            <!-- MENSAJE SABOR -->
            <div class="grupo__input-error" id="error__sel_sabor_nuevo_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                un <span class="nom_campo">"Sabor".</span>
              </p>
            </div>
            <!-- MENSAJE DE ERROR IMAGEN -->
            <div class="grupo__input-error" id="error__txt_imagen_nuevo_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor seleccione
                una
                <span class="nom_campo">Foto.</span>
              </p>
            </div>
            <!-- MENSAJE STOCK MINIMO -->
            <div class="grupo__input-error" id="error__num_stockMin_nuevo_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Stock minimo"</span> debe
                contener un numero sin puntos ni comas.
              </p>
            </div>
            <!-- MENSAJE ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_nuevo_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                un <span class="nom_campo">"Estado".</span>
              </p>
            </div>
          </div>
        </div>
        <!-- NOMBRE DEL PRODUCTO -->
        <!-- NOMBRE DEL PRODUCTO -->
        <div class="contenedor_nombre_presentacion">
          <p id="nombre_presentacion">
            @if (session('Prod_Nombre' . auth()->user()->USUA_ID))
              {{ session('Prod_Nombre' . auth()->user()->USUA_ID) }} <span id="complemento_presentacion">
                {{ session('Prod_Complemento' . auth()->user()->USUA_ID) }} </span>
            @else
              ERROR
            @endif
          </p>
        </div>
        <!-- TABLA PRESENTACIONES -->
        <!-- TABLA PRESENTACIONES -->
        <form class="contenedor_tabla_presentaciones">
          <div class="tabla_presentaciones">
            <table id="tabla_PresentacionProd" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio4">Presentacion</th>
                  <th class="tamanio3">Precio</th>
                  <th class="tamanio5">Sabor</th>
                  <th class="tamanio2">Stock min</th>
                  <th class="tamanio3">Estado</th>
                  <th class="tamanio3">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </form>
    <!-- MODAL EDITAR DATOS PRESENTACION -->
    <!-- MODAL EDITAR DATOS PRESENTACION -->
    <!-- MODAL EDITAR DATOS PRESENTACION -->
    <div class="contenedor_modal_editar_presentacion">
      <div class="modal_editar_presentacion">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_editar titulo">
          <span class="icono_nav icon-linode"></span>
          <p>Editar Presentación</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__imgElementos">
          <img src="img/svg/undraw_collecting_re_lp6p verde.svg" alt="Imagen Presentacion" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form class="formulario" id="formulario_editar_presentacion"
          action="{{ Route('ModificarGrupoSabores') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="Prod_id_Mod" id="Prod_id_Mod">
          <input type="hidden" name="Grsa_id_Mod" id="Grsa_id_Mod">
          <input type="hidden" name="Imag_id_Mod" id="Imag_id_Mod">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor">
            <div class="lado_izquierdo">
              <!-- INPUT PRESENTACION -->
              <div class="formulario__grupo" id="grupo__sel_presentacion_editar_presentacion">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_presentacion_editar_presentacion"
                    id="sel_presentacion_editar_presentacion" required>
                    <option value=""></option>
                    @foreach ($Presentacion as $Fila)
                      <option value="{{ $Fila->UNME_ID }}">{{ $Fila->UNME_MEDIDA }}</option>
                    @endforeach
                  </select>
                  </select>
                  <span class="formulario__placeholder">Presentación:*</span>
                </div>
              </div>
              <!-- INPUT PRECIO -->
              <div class="formulario__grupo" id="grupo__num_precio_editar_presentacion">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="number" name="num_precio_editar_presentacion"
                    id="num_precio_editar_presentacion" required />
                  <span class="formulario__placeholder">Precio de venta:*</span>
                </div>
              </div>
              <!-- INPUT SABOR -->
              <div class="formulario__grupo" id="grupo__sel_sabor_editar_presentacion">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_sabor_editar_presentacion"
                    id="sel_sabor_editar_presentacion" >
                    <option value=""></option>
                    @foreach ($Sabor as $Fila)
                      <option value="{{ $Fila->SABO_ID }}">{{ $Fila->SABO_DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <span class="formulario__placeholder">Sabor:</span>
                </div>
              </div>
            </div>
            <!-- PREVISUALIZAR IMAGEN -->
            <figure class="contenedor_img-producto" id="contenedor_img_editar_presentacion">
              <img class="img-producto" src="img/Agregar Fotos.png" alt="Imagen de categoría"
                id="img_editar_presentacion" />
            </figure>
            <div class="lado_derecho">
              <!-- INPUT IMAGEN -->
              <div class="formulario__grupo" id="grupo__txt_imagen_editar_presentacion">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="text" name="txt_imagen_editar_presentacion"
                    id="txt_imagen_editar_presentacion" />
                  <span class="formulario__placeholder">Seleccione una imagen:*</span>
                  <label for="input_file_editar" class="label_subir">
                    <span class="icon-folder-open-empty"></span>
                  </label>
                  <input type="file" name="input_file_editar" id="input_file_editar"
                    onchange="vista_preliminar_editar(event)" />
                </div>
              </div>
              <!-- INPUT STOCK MINIMO -->
              <div class="formulario__grupo" id="grupo__num_stockMin_editar_presentacion">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="number" name="num_stockMin_editar_presentacion"
                    id="num_stockMin_editar_presentacion" required />
                  <span class="formulario__placeholder">Stock Minimo:*</span>
                </div>
              </div>
              <!-- INPUT ESTADO -->
              <div class="formulario__grupo" id="grupo__sel_estado_editar_presentacion">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_estado_editar_presentacion"
                    id="sel_estado_editar_presentacion">
                    <option value=""></option>
                    @foreach ($Estados as $Fila)
                      <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                    @endforeach
                  </select>
                  <span class="formulario__placeholder">Estado:*</span>
                </div>
              </div>
            </div>
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <!-- MENSAJE PRESENTACION -->
            <div class="grupo__input-error" id="error__sel_presentacion_editar_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                una <span class="nom_campo">"Presentación".</span>
              </p>
            </div>
            <!-- MENSAJE PRECIO -->
            <div class="grupo__input-error" id="error__num_precio_editar_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Precio"</span> debe contener
                una cifra sin puntos ni comas.
              </p>
            </div>
            <!-- MENSAJE SABOR -->
            <div class="grupo__input-error" id="error__sel_sabor_editar_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                un <span class="nom_campo">"Sabor".</span>
              </p>
            </div>
            <!-- MENSAJE DE ERROR IMAGEN -->
            <div class="grupo__input-error" id="error__txt_imagen_editar_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor
                seleccione una
                <span class="nom_campo">Foto.</span>
              </p>
            </div>
            <!-- MENSAJE STOCK MINIMO -->
            <div class="grupo__input-error" id="error__num_stockMin_editar_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Stock minimo"</span> debe
                contener un numero sin puntos ni comas.
              </p>
            </div>
            <!-- MENSAJE ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_presentacion">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por favor
                un <span class="nom_campo">"Estado".</span>
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT GUARDAR PRESENTACION O SABOR -->
          <!-- BOTON SUBMIT GUARDAR PRESENTACION O SABOR -->
          <input class="btn btn_click btn_guardar btn_presentacion" type="submit" value="Editar" />
        </form>
        <!-- BOTON CANCELAR -->
        <!-- BOTON CANCELAR -->
        <div class="btn_cancelar_editar btn_click btn_cerrar_editar_presentacion">
          Cancelar
        </div>
      </div>
    </div>
    <!-- MODAL ELIMINAR DATOS PRESENTACION -->
    <!-- MODAL ELIMINAR DATOS PRESENTACION -->
    <!-- MODAL ELIMINAR DATOS PRESENTACION -->
    <div class="contenedor_modal_eliminar_presentacion">
      <form class="modal_eliminar_presentacion" action="{{ Route('EliminarGrupoSabores') }}" method="POST">
        @csrf
        <input type="hidden" name="Prod_id_Eli" id="Prod_id_Eli">
        <input type="hidden" name="Grsa_id_Eli" id="Grsa_id_Eli">
        <input type="hidden" name="Imag_id_Eli" id="Imag_id_Eli">
        <div class="titulo_eliminar titulo">
          <span class="icono_nav icon-attention-1"></span>
          <p>Eliminar Presentación</p>
        </div>
        <figure class="contenedro__img-eliminar">
          <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
        </figure>
        <span class="icon-attention"></span>
        <div class="mensaje__eliminar">
          Esta seguro que desea
          <span class="nom_campo">Eliminar</span> la siguiente
          Presentación:
        </div>
        <div class="mensaje__info-eliminar">
          <ul>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Presentación: </span>
              <span class="txt__enter-eliminar" id="text_eliminar_presentacion">Ninguno</span>
            </li>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Sabor: </span>
              <span class="txt__enter-eliminar" id="text_eliminar_sabor">Ninguno-</span>
            </li>
          </ul>
        </div>
        <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
        <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_presentacion">
          Cancelar
        </div>
      </form>
    </div>
    <!-- !ELEMENTOS OBJETIVOS DEL PRODUCTO  -->
    <!-- !ELEMENTOS OBJETIVOS DEL PRODUCTO  -->
    <!-- NUEVO OBJETIVOS -->
    <!-- NUEVO OBJETIVOS -->
    <!-- NUEVO OBJETIVOS -->
    <div class="contenedor_objetivo">
      <div class="contenedor_titulo_objetivo">
        <span class="icono_nav icon-linode"></span>
        <p>Objetivos</p>
      </div>
      <!-- CONTENIDO -->
      <!-- CONTENIDO -->
      <div class="elementos_objetivo">
        <!-- ELEMENTOS DE NUEVO -->
        <!-- ELEMENTOS DE NUEVO -->
        <div class="contenedor_nuevo_objetivo">
          <div class="titulo titulo_nuevo_objetivo">
            <span class="icono_nav icon-plus"></span>
            <p>Nuevo Objetivo</p>
          </div>
          <figure class="contenedro__imgElementos">
            <img src="img/svg/undraw_complete_design_re_h75h.svg" alt="Imagen Objetivos" />
          </figure>
          <form class="formulario_objetivo" id="formulario_nuevo_objetivo" action="{{ Route('RegistrarProducto') }}"
            method="POST">
            @csrf
            <input type="hidden" id="opcion" name="opcion" value="4">
            @if (session('Prod_id' . auth()->user()->USUA_ID))
              <input type="hidden" id="Prod_id" name="Prod_id"
                value="{{ session('Prod_id' . auth()->user()->USUA_ID) }}">
            @endif
            <!-- INPUTS -->
            <!-- INPUTS -->
            <div class="formulario__contenedor-nuevo">
              <!-- INPUT NOMBRE -->
              <div class="formulario__grupo" id="grupo__sel_nombre_nuevo_objetivo">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_nombre_nuevo_objetivo" id="sel_nombre_nuevo_objetivo"
                    required>
                    <option value=""></option>
                    @foreach ($Objetivo as $Fila)
                      <option value="{{ $Fila->OBJE_ID }}">{{ $Fila->OBJE_NOMBRE }}</option>
                    @endforeach
                  </select>
                  <span class="formulario__placeholder">Objetivo:*</span>
                </div>
              </div>
              <!-- INPUT ESTADO -->
              <div class="formulario__grupo" id="grupo__sel_estado_nuevo_objetivo">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_estado_nuevo_objetivo" id="sel_estado_nuevo_objetivo"
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
              <!-- MENSAJE NOMBRE -->
              <div class="grupo__input-error" id="error__sel_nombre_nuevo_objetivo">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> Selecione por
                  favor un <span class="nom_campo">"Objetivo".</span>
                </p>
              </div>
              <!-- MENSAJE ESTADO -->
              <div class="grupo__input-error" id="error__sel_estado_nuevo_objetivo">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> Selecione por
                  favor un <span class="nom_campo">"Estado".</span>
                </p>
              </div>
            </div>
            <!-- BOTON SUBMIT -->
            <!-- BOTON SUBMIT -->
            <input class="btn btn_click btn_guardar btn_objetivo" type="submit" value="Establecer Objetivo" />
          </form>
        </div>
        <!-- ELEMENTOS DE LA TABLA -->
        <!-- ELEMENTOS DE LA TABLA -->
        <div class="contenedor_tabla_objetivo">
          <div class="titulo titulo_tabla_objetivo">
            <span class="icono_nav icon-"></span>
            <p>Objetivos establecidos</p>
          </div>
          <form class="tabla_objetivo">
            <table id="tabla_objetivo_producto" class="hover">
              <thead>
                <tr>
                  <th class="tamanio_1">No</th>
                  <th class="tamanio_5">Objetivo</th>
                  <th class="tamanio_2">Estado</th>
                  <th class="tamanio_4">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <!-- MODAL EDITAR OBJETIVOS -->
    <!-- MODAL EDITAR OBJETIVOS -->
    <!-- MODAL EDITAR OBJETIVOS -->
    <div class="contenedor_modal_editar_objetivo">
      <div class="modal_editar_objetivo">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_editar titulo">
          <span class="icon-linode"></span>
          <p>Editar Objetivo</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_complete_design_re_h75h verde.svg" alt="Imagen Editar" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form class="formulario_objetivo" id="formulario_editar_objetivo"
          action="{{ Route('ModificarObjetivosProducto') }}" method="POST">
          @csrf

          <input type="hidden" id="Prob_id_objetivo" name="Prob_id_objetivo">
          <input type="hidden" id="Prod_id_mod_oj" name="Prod_id_mod_oj">

          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor-editar">
            <!-- INPUT NOMBRE -->
            <div class="formulario__grupo" id="grupo__sel_nombre_editar_objetivo">
              <div class="formulario__grupo-input">
                <select class="formulario__input select" name="sel_nombre_editar_objetivo"
                  id="sel_nombre_editar_objetivo" required>
                  <option value=""></option>
                  @foreach ($Objetivo as $Fila)
                    <option value="{{ $Fila->OBJE_ID }}">{{ $Fila->OBJE_NOMBRE }}</option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Objetivo:*</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_editar_objetivo">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_estado_editar_objetivo" id="sel_estado_editar_objetivo"
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
            <!-- MENSAJE DE ERROR NOMBRE -->
            <div class="grupo__input-error" id="error__sel_nombre_editar_objetivo">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span>Seleccione por favor
                un
                <span class="nom_campo">"Objetivo"</span>
              </p>
            </div>
            <!-- MENSAJE ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_objetivo">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Selecione por
                favor un <span class="nom_campo">"Estado".</span>
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_editar" type="submit" value="Editar" />
          <!-- BOTON CANCELAR -->
          <!-- BOTON CANCELAR -->
          <div class="btn_cancelar_editar btn_click btn_cerrar_editar_objetivo">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL ELIMINAR OBJETIVOS -->
    <!-- MODAL ELIMINAR OBJETIVOS -->
    <!-- MODAL ELIMINAR OBJETIVOS -->
    <div class="contenedor_modal_eliminar_objetivo">
      <form class="modal_eliminar_objetivo" action="{{ Route('EliminarObjetivosProducto') }}" method="POST">
        @csrf
        <input type="hidden" id="Prob_id_objetivo_Eliminar" name="Prob_id_objetivo_Eliminar">
        <div class="titulo_eliminar titulo">
          <span class="icono_nav icon-attention-1"></span>
          <p>Eliminar Objetivo</p>
        </div>
        <figure class="contenedro__img-eliminar">
          <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
        </figure>
        <span class="icon-attention"></span>
        <div class="mensaje__eliminar">
          Esta seguro que desea
          <span class="nom_campo">Eliminar</span> la siguiente Objetivo:
        </div>
        <div class="mensaje__info-eliminar">
          <ul>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Objetivo: </span>
              <span class="txt__enter-eliminar" id="text_nombre_producto">Ninguno</span>
            </li>
          </ul>
        </div>
        <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
        <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_objetivo">
          Cancelar
        </div>
      </form>
    </div>
    <!-- BOTON SUBMIT -->
    <!-- BOTON SUBMIT -->
    <form action="{{ Route('RegistrarProducto') }}" method="POST" class="contenedor_btn_finalizar">
      @csrf
      <input type="hidden" id="opcion" name="opcion" value="5">
      @if (session('Prod_id' . auth()->user()->USUA_ID))
        <input type="hidden" id="Prod_id" name="Prod_id" value="{{ session('Prod_id' . auth()->user()->USUA_ID) }}">
      @endif
      <input class="btn btn_click btn_finalizar btn_nuevo" type="submit" value="Finalizar" />
    </form>

    <!-- BOTON CANCELAR -->
    <!-- BOTON CANCELAR -->
    <a href="{{ Route('ProductosUser') }}" class="btn_cancelar btn_click">
      Cancelar
    </a>
    {{-- </form> --}}
  </div>
  <!-- TODO FIN DEL CONTENIDO -->



  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#menu_producto").addClass("item_select");
      var z = 0;
      var table = $('#tabla_PresentacionProd').DataTable({
        "ajax": "{{ route('AllProductosPresentacionUser') }}?PROD_ID=" + $('#Prod_id').val(),
        "order": [[ 1, 'asc' ]],
        "columns": [{
            data: 'GRSA_ID'
          },
          {
            data: 'UNME_MEDIDA'
          },
          {
            data: 'GRSA_PRECIO'
          },
          {
            data: 'SABO_DESCRIPCION'
          },
          {
            data: 'GRSA_STOCKMINIMO'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
            <div class="contenedor_botones">
                        <div class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_presentacion">
                          <span class="icon-edit-1" title="Editar"></span>
                        </div>
                        <div class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_presentacion">
                          <span class="icon-trash" title="Eliminar"></span>
                        </div>
                      </div>
                            
                        `,
            "className": "td_acciones"
          }
        ],
        "displayLength": 5,
        "language": {
          "lengthMenu": "Mostrar " +
            `<select> 
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                        </select>` +
            "registros por pagina",
          "zeroRecords": "Nada encontrado",
          "info": "Pagina _PAGE_ de _PAGES_",
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

      $('#tabla_PresentacionProd tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_editar_presentacion(data)
      });


      $('#tabla_PresentacionProd tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_eliminar_presentacion(data)
      });


      var tableObjetivo = $('#tabla_objetivo_producto').DataTable({
        "ajax": "{{ route('AllProductosObjetivosUser') }}?PROD_ID=" + $('#Prod_id').val(),
        "order": [[ 1, 'asc' ]],
        "columns": [{
            data: 'PROB_ID'
          },
          {
            data: 'OBJE_NOMBRE'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
            <div class="contenedor_botones_objetivo">
                      <div class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_objetivo">
                        <span class="icon-edit-1" title="Editar"></span>
                      </div>
                      <div class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_objetivo">
                        <span class="icon-trash" title="Eliminar"></span>
                      </div>
                    </div>
                        `,
            "className": "td_acciones"
          }
        ],
        "displayLength": 5,
        "language": {
          "lengthMenu": "Mostrar " +
            `<select> 
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                        </select>` +
            "registros por pagina",
          "zeroRecords": "Nada encontrado",
          "info": "Pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtrado de_MAX_ registros totales)",
          "search": "Buscar: ",
          "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
          }
        }
      });

      tableObjetivo.on('order.dt search.dt', function() {
        tableObjetivo.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();

      $('#tabla_objetivo_producto tbody').on('click', 'div.btn_accion-editar', function() {
        var data = tableObjetivo.row($(this).parents('tr')).data();
        abrir_editar_objetivo(data)
      });


      $('#tabla_objetivo_producto tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = tableObjetivo.row($(this).parents('tr')).data();
        abrir_modal_eliminar_objetivo(data)
      });

    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_12_producto_nuevo_presentacion.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
