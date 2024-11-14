@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_4_categorias.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}" />
  <div class="contenedor_contenido_derecha">
    @if (session('MsgErrorSistema'))
      <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
    @endif
    <!-- CONTENEDOR CATEGORIAS -->
    <!-- CONTENEDOR CATEGORIAS -->
    <!-- CONTENEDOR CATEGORIAS -->
    <div class="contenedor_categorias">
      <div class="titulo_categorias">
        <span class="icono_nav icon-linode"></span>
        <p>Categorías</p>
      </div>
      <div class="elementos_categorias">
        <!-- ELEMENTOS DE ARRIBA -->
        <!-- ELEMENTOS DE ARRIBA -->
        <div class="elementos_arriba">
          <div class="btn btn_click btn_nueva_categoria btn_abrir_modal_nueva_categoria">
            <span class="icon-plus"></span>
            <p>Nueva Categoría</p>
          </div>

          <div class="mostrar_registros">
            <p class="texto_registros">
              Registros <br />
              por pagina
            </p>
            <select name="CantCategorias" id="CantCategorias" onchange="FiltrarRegistros($(this).val())">
              <option value="2">2</option>
              <option value="4">4</option>
              <option value="8">8</option>
              <option value="16">16</option>

            </select>
          </div>
          <form method="GET" action="{{ Route('BusquedaCategorias') }}">
            @csrf
            <input class="buscar" type="text" name="Buscar" id="Buscar" value="" placeholder="Buscar..." />
            <button><span class="icono-navbar icon-search-2"></span></button>
          </form>
        </div>
        <!-- ELEMENTOS DE ABAJO - TABLAS DE CATEGORIAS -->
        <!-- ELEMENTOS DE ABAJO - TABLAS DE CATEGORIAS -->
        <div class="elementos_abajo">
          @if (count($Categorias) <= 0)
            <h2>NO HAY RESULTADOS</h2>
          @else


            @foreach ($Categorias as $Fila)
              <div class="contendor_contenido_categoria">
                <!-- TITULO CATEGORIA -->
                <!-- TITULO CATEGORIA -->
                <div class="titulo_categoria">
                  <p>
                    <span class="icono_nav icon-linode"></span>{{ $Fila->CATE_NOMBRE }}
                  </p>
                  <p class="no_categoria">Categoría /<span>{{ $Fila->ESTA_TIPO }}</span></p>
                  <div class="tooptil_contenedor_categoria">
                    <p class="tooptil_titulo">{{ $Fila->CATE_NOMBRE }}</p>
                    <p class="tooptil_subcategoria">/Categoría</p>
                    <p class="tooltip_descripcion_categoria">
                      {{ $Fila->CATE_DESCRIPCION }}
                    </p>
                  </div>
                </div>
                <!-- BOTONES CATEGORIA -->
                <!-- BOTONES CATEGORIA -->
                <div class="contenedor_botones_categoria">
                  <div class="btn_accion_categoria-editar btn btn_click btn_abrir_modal_editar_categoria"
                    onclick="ModificarCategoria({{ $Fila->CATE_ID }},'{{ $Fila->CATE_NOMBRE }}','{{ $Fila->CATE_DESCRIPCION }}','{{ $Fila->CATE_IMAGEN }}',{{ $Fila->ESTADO_ESTA_ID }})">
                    <span class="icon-edit-1" title="Editar">Editar Categoría</span>
                  </div>
                  <div class="btn_accion_categoria-eliminar btn btn_click btn_abrir_modal_eliminar_categoria"
                    onclick="EliminarCategoria({{ $Fila->CATE_ID }},'{{ $Fila->CATE_NOMBRE }}')">
                    <span class="icon-trash" title="Eliminar">Eliminar Categoría</span>
                  </div>
                </div>
                <!-- CONTENEDOR TABLA -->
                <!-- CONTENEDOR TABLA -->
                <div class="contenedor_padre_tooltips">
                  <div class="contenedor_tabla">
                    <table id="{{ $Fila->CATE_ID }}_tabla_SubCategorias">
                      <thead>
                        <tr>
                          <th class="tamanio1">#</th>
                          <th class="tamanio5">Sub Categorías</th>
                          <th class="tamanio2">Estado</th>
                          <th class="tamanio4">Acciones</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <!-- BTN NUEVA SUBCATEGORIA -->
                <!-- BTN NUEVA SUBCATEGORIA -->
                <a class="btn btn_click btn_abrir_modal_nueva_subcategoria btn_nueva_subcategoria"
                  onclick="NuevaSubCategoria({{ $Fila->CATE_ID }},'{{ $Fila->CATE_NOMBRE }}')">
                  <span class="icon-plus"></span>
                  <p>Nueva Subcategoría</p>
                </a>
              </div>
            @endforeach
          @endif
        </div>
        <div class="contenedor_paginacion">
          {{ $Categorias->links('vendor.pagination.default') }}
          {{-- <span class="btn_click elemento_paginacion icon-angle-double-left"></span>
          <span class="btn_click elemento_paginacion">Anterio</span>
          <span class="btn_click elemento_paginacion azul">1</span>
          <span class="btn_click elemento_paginacion">2</span>
          <span class="btn_click elemento_paginacion">3</span>
          <span class="btn_click elemento_paginacion">4</span>
          <span class="btn_click elemento_paginacion">5</span>
          <span class="btn_click elemento_paginacion btn_popup_password">Siguiente</span>
          <span class="btn_click elemento_paginacion icon-angle-double-right btn_popup_error_sistema"></span> --}}
        </div>
      </div>
    </div>
    <!-- MODAL NUEVA CATEGORIA -->
    <!-- MODAL NUEVA CATEGORIA -->
    <!-- MODAL NUEVA CATEGORIA -->
    <div class="contenedor_modal_nueva_categoria">
      <div class="modal_nueva_categoria">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_nuevo titulo">
          <span class="icon-linode"></span>
          <p>Nueva Categoría</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_select_option_re_u4qn.svg" alt="Imagen guardado correctamente" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form method="POST" action="{{ Route('RegistrarCategorias') }}" class="formulario"
          id="formulario_nueva_categoria" enctype="multipart/form-data">
          <!-- INPUTS -->
          <!-- INPUTS -->
          @csrf

          @if (session('message'))
            <input type="hidden" id="messageExito" value="{{ session('message') }}">
          @endif

          <div class="contenedor_lados">
            <div class="lado_izquierdo">
              <!-- INPUTS -->
              <!-- INPUTS -->
              <div class="formulario__contenedor-nuevo">
                <!-- PREVISUALIZAR IMAGEN -->
                <figure class="contenedor_img-categoria" id="contenedor_img_nuevo_categoria">
                  <img class="img-categoria" src="img/Agregar Fotos.png"
                    alt="Imagen de categoría" id="img_nuevo_categoria" />
                </figure>
                <!-- INPUT IMAGEN -->
                <div class="formulario__grupo" id="grupo__txt_imagen_nuevo_categorias">
                  <div class="formulario__grupo-input">
                    <input class="formulario__input" type="text" name="txt_imagen_nuevo_categorias"
                      id="txt_imagen_nuevo_categorias" />
                    <span class="formulario__placeholder">Seleccione una imagen:*</span>
                    <label for="input_file_nuevo" class="label_subir">
                      <span class="icon-folder-open-empty"></span>
                    </label>
                    <input type="file" name="input_file_nuevo" id="input_file_nuevo" accept="image/*"
                      onchange="vista_preliminar_nuevo(event)" />
                  </div>
                </div>
              </div>
            </div>
            <div class="lado_derecho">
              <!-- INPUTS -->
              <!-- INPUTS -->
              <div class="formulario__contenedor-nuevo">
                <!-- INPUT NOMBRE -->
                <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_categorias">
                  <div class="formulario__grupo-input">
                    <input class="formulario__input" type="text" name="txt_nombre_nuevo_categorias"
                      id="txt_nombre_nuevo_categorias" required />
                    <span class="formulario__placeholder">Nombre de la categoría:*</span>
                  </div>
                </div>
                <!-- INPUT DESCRIPCION -->
                <div class="formulario__grupo" id="grupo__are_descripcion_nuevo_categorias">
                  <div class="formulario__grupo-input">
                    <textarea class="formulario__input textarea" name="are_descripcion_nuevo_categorias"
                      id="are_descripcion_nuevo_categorias" rows="4"></textarea>
                    <span class="formulario__placeholder">Descripcíon de la categoría:</span>
                  </div>
                </div>
                <!-- INPUT ESTADO -->
                <div class="formulario__grupo" id="grupo__sel_estado_nuevo_categorias">
                  <div class="formulario__grupo-input">
                    <select class="formulario__input select" name="sel_estado_nuevo_categorias"
                      id="sel_estado_nuevo_categorias" required>
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
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <!-- MENSAJE DE ERROR IMAGEN -->
            <div class="grupo__input-error" id="error__txt_imagen_nuevo_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor selecciones una
                <span class="nom_campo">Imagen.</span>
              </p>
            </div>
            <!-- MENSAJE DE ERROR NOMBRE -->
            <div class="grupo__input-error" id="error__txt_nombre_nuevo_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Nombre de categoría"</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR DESCRIPCION -->
            <div class="grupo__input-error" id="error__are_descripcion_nuevo_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"La descripción de categoría"</span>
                puede contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_nuevo_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> En el campo
                <span class="nom_campo">"Estado"</span> debe seleccionar
                alguna opción.
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_nuevo" type="submit" value="Nueva" />
          <!-- BOTON CANCELAR -->
          <!-- BOTON CANCELAR -->
          <div class="btn_cancelar btn_click btn_cerrar_nueva_categoria">
            Cancelar
          </div>

        </form>
      </div>
    </div>
    <!-- MODAL EDITAR CATEGORIA -->
    <!-- MODAL EDITAR CATEGORIA -->
    <!-- MODAL EDITAR CATEGORIA -->
    <div class="contenedor_modal_editar_categoria">
      <div class="modal_editar_categoria">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_editar titulo">
          <span class="icon-linode"></span>
          <p>Editar Categoría</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_new_notifications_re_xpcv.svg" alt="Imagen Editar" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form action="{{ Route('ModificarCategorias') }}" method="POST" class="formulario"
          id="formulario_editar_categoria" enctype="multipart/form-data">
          <!-- INPUTS -->
          <!-- INPUTS -->
          @csrf
          <input type="hidden" id="Cate_id_Modificar" name="Cate_id_Modificar">

          <div class="contenedor_lados">
            <div class="lado_izquierdo">
              <!-- INPUTS -->
              <!-- INPUTS -->
              <div class="formulario__contenedor-editar">
                <!-- PREVISUALIZAR IMAGEN -->
                <figure class="contenedor_img-categoria" id="contenedor_img_editar_categoria">
                  <img class="img-categoria" src="img/Agregar Fotos.png"
                    alt="Imagen de categoría" id="img_editar_categoria" />
                </figure>
                <!-- INPUT IMAGEN -->
                <div class="formulario__grupo" id="grupo__txt_imagen_editar_categorias">
                  <div class="formulario__grupo-input">
                    <input class="formulario__input" type="txt" name="txt_imagen_editar_categorias"
                      id="txt_imagen_editar_categorias" />
                    {{-- <span class="formulario__placeholder">Seleccione una imagen:*</span> --}}
                    <label for="input_file_editar" class="label_subir">
                      <span class="icon-folder-open-empty"></span>
                    </label>
                    <input type="file" name="input_file_editar" id="input_file_editar" accept="image/*"
                      onchange="vista_preliminar_editar(event)" />
                  </div>
                </div>
              </div>
            </div>
            <div class="lado_derecho">
              <!-- INPUTS -->
              <!-- INPUTS -->
              <div class="formulario__contenedor-editar">
                <!-- INPUT NOMBRE -->
                <div class="formulario__grupo" id="grupo__txt_nombre_editar_categorias">
                  <div class="formulario__grupo-input">
                    <input class="formulario__input" type="text" name="txt_nombre_editar_categorias"
                      id="txt_nombre_editar_categorias" required />
                    <span class="formulario__placeholder">Nombre de la categoría:*</span>
                  </div>
                </div>
                <!-- INPUT DESCRIPCION -->
                <div class="formulario__grupo" id="grupo__are_descripcion_editar_categorias">
                  <div class="formulario__grupo-input">
                    <textarea class="formulario__input textarea" name="are_descripcion_editar_categorias"
                      id="are_descripcion_editar_categorias" rows="4"></textarea>
                    <span class="formulario__placeholder">Descripcíon de la categoría:</span>
                  </div>
                </div>
                <!-- INPUT ESTADO -->
                <div class="formulario__grupo" id="grupo__sel_estado_editar_categorias">
                  <div class="formulario__grupo-input">
                    <select class="formulario__input select" name="sel_estado_editar_categorias"
                      id="sel_estado_editar_categorias" required>
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
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <!-- MENSAJE DE ERROR IMAGEN -->
            <div class="grupo__input-error" id="error__txt_imagen_editar_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor selecciones una
                <span class="nom_campo">Imagen.</span>
              </p>
            </div>
            <!-- MENSAJE DE ERROR NOMBRE -->
            <div class="grupo__input-error" id="error__txt_nombre_editar_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Nombre de categoría</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR DESCRIPCION -->
            <div class="grupo__input-error" id="error__are_descripcion_editar_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"La descripción de categoría</span>
                puede contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_categorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> En el campo
                <span class="nom_campo">"Estado"</span> debe seleccionar
                alguna opción.
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_editar" type="submit" value="Editar" />
          <!-- BOTON CANCELAR -->
          <!-- BOTON CANCELAR -->
          <div class="btn_cancelar btn_click btn_cerrar_editar_categoria">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL ELIMINAR CATEGORIA -->
    <!-- MODAL ELIMINAR CATEGORIA -->
    <!-- MODAL ELIMINAR CATEGORIA -->
    <form action="{{ Route('EliminarCategorias') }}" method="POST">
      @csrf
      <input type="hidden" id="Cate_id_Eliminar" name="Cate_id_Eliminar">
      <div class="contenedor_modal_eliminar_categoria">
        <div class="modal_eliminar_categoria">
          <div class="titulo_eliminar titulo">
            <span class="icono_nav icon-attention-1"></span>
            <p>Eliminar Categoría</p>
          </div>
          <figure class="contenedro__img-eliminar">
            <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
          </figure>
          <span class="icon-attention"></span>
          <div class="mensaje__eliminar">
            Esta seguro que desea <span class="nom_campo">Eliminar</span> la
            siguiente categoría:
          </div>
          <div class="mensaje__info-eliminar">
            <ul>
              <li class="lista-info-eliminar">
                <span class="txt__negrita-eliminar">Categoría : </span>
                <span class="txt__enter-eliminar" id="txt_nombre_eliminar_categorias">Ninguna</span>
              </li>
            </ul>
          </div>
          <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
          <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_categoria">
            Cancelar
          </div>
        </div>
      </div>
    </form>
    <!-- MODAL NUEVA SUB CATEGORIA -->
    <!-- MODAL NUEVA SUB CATEGORIA -->
    <!-- MODAL NUEVA SUB CATEGORIA -->
    <div class="contenedor_modal_nueva_subcategoria">
      <div class="modal_nueva_subcategoria">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_nuevo titulo_subcategoria">
          <div class="titulo_ppal">
            <span class="icon-linode"></span>
            <p>Nueva Sub Categoría</p>
          </div>
          <div class="titulo_referencia">
            <span>Categoría /</span>
            <span id="name_categoria_pertenece">Muscle Building</span>
          </div>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_select_option_re_u4qn.svg" alt="Imagen guardado correctamente" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form action="{{ Route('RegistrarSubCategorias') }}" method="POST" class="formulario"
          id="formulario_nueva_subcategoria">
          <!-- INPUTS -->
          <!-- INPUTS -->
          @csrf
          <input type="hidden" id="Cate_id_Registro" name="Cate_id_Registro">
          <div class="formulario__contenedor-nuevo">
            <!-- INPUT NOMBRE -->
            <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_subcategorias">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_nombre_nuevo_subcategorias"
                  id="txt_nombre_nuevo_subcategorias" required />
                <span class="formulario__placeholder">Nombre de la sub categoría:*</span>
              </div>
            </div>
            <!-- INPUT DESCRIPCION -->
            <div class="formulario__grupo" id="grupo__are_descripcion_nuevo_subcategorias">
              <div class="formulario__grupo-input">
                <textarea class="formulario__input textarea" name="are_descripcion_nuevo_subcategorias"
                  id="are_descripcion_nuevo_subcategorias" rows="4"></textarea>
                <span class="formulario__placeholder">Descripcíon de la sub categoría:</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_nuevo_subcategorias">
              <div class="formulario__grupo-input">
                <select class="formulario__input select" name="sel_estado_nuevo_subcategorias"
                  id="sel_estado_nuevo_subcategorias" required>
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
            <div class="grupo__input-error" id="error__txt_nombre_nuevo_subcategorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Nombre de categoría</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR DESCRIPCION -->
            <div class="grupo__input-error" id="error__are_descripcion_nuevo_subcategorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"La descripción de categoría</span>
                puede contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_nuevo_subcategorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> En el campo
                <span class="nom_campo">"Estado"</span> debe seleccionar
                alguna opción.
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_nuevo" type="submit" value="Nueva" />
          <!-- BOTON CANCELAR -->
          <!-- BOTON CANCELAR -->
          <div class="btn_cancelar btn_click btn_cerrar_nueva_subcategoria">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL EDITAR SUB CATEGORIA -->
    <!-- MODAL EDITAR SUB CATEGORIA -->
    <!-- MODAL EDITAR SUB CATEGORIA -->
    <div class="contenedor_modal_editar_subcategoria">
      <div class="modal_editar_subcategoria">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_editar titulo_subcategoria">
          <div class="titulo_ppal">
            <span class="icon-linode"></span>
            <p>Editar Sub Categoría</p>
          </div>
          <div class="titulo_referencia">
            <span>Categoría 1 /</span>
            <span>Muscle Building</span>
          </div>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_new_notifications_re_xpcv.svg" alt="Imagen guardado correctamente" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form action="{{ Route('ModificarSubCategorias') }}" method="POST" class="formulario"
          id="formulario_editar_subcategoria">
          <!-- INPUTS -->
          <!-- INPUTS -->
          @csrf
          <input type="hidden" id="Subc_id_modificar" name="Subc_id_modificar">
          <input type="hidden" id="Cate_id_modificar" name="Cate_id_modificar">
          <div class="formulario__contenedor-editar">
            <!-- INPUT NOMBRE -->
            <div class="formulario__grupo" id="grupo__txt_nombre_editar_subcategorias">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_nombre_editar_subcategorias"
                  id="txt_nombre_editar_subcategorias" required />
                <span class="formulario__placeholder">Nombre de la sub categoría:*</span>
              </div>
            </div>
            <!-- INPUT DESCRIPCION -->
            <div class="formulario__grupo" id="grupo__are_descripcion_editar_subcategorias">
              <div class="formulario__grupo-input">
                <textarea class="formulario__input textarea" name="are_descripcion_editar_subcategorias"
                  id="are_descripcion_editar_subcategorias" rows="4" required></textarea>
                <span class="formulario__placeholder">Descripcíon de la sub categoría:</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_editar_subcategorias">
              <div class="formulario__grupo-input">
                <select class="formulario__input select" name="sel_estado_editar_subcategorias"
                  id="sel_estado_editar_subcategorias" required>
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
            <div class="grupo__input-error" id="error__txt_nombre_editar_subcategorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Nombre de categoría</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR DESCRIPCION -->
            <div class="grupo__input-error" id="error__are_descripcion_editar_subcategorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"La descripción de categoría</span>
                puede contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_subcategorias">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> En el campo
                <span class="nom_campo">"Estado"</span> debe seleccionar
                alguna opción.
              </p>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input class="btn btn_click btn_formulario_editar" type="submit" value="Editar" />
          <!-- BOTON CANCELAR -->
          <!-- BOTON CANCELAR -->
          <div class="btn_cancelar btn_click btn_cerrar_editar_subcategoria">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL ELIMINAR SUB CATEGORIA -->
    <!-- MODAL ELIMINAR SUB CATEGORIA -->
    <!-- MODAL ELIMINAR SUB CATEGORIA -->
    <div class="contenedor_modal_eliminar_subcategoria">
      <form action="{{ Route('EliminarSubCategorias') }}" method="POST">
        @csrf
        <input type="hidden" id="Subc_id_Eliminar" name="Subc_id_Eliminar">
        <div class="modal_eliminar_subcategoria">
          <div class="titulo_eliminar titulo_subcategoria">
            <div class="titulo_ppal">
              <span class="icon-linode"></span>
              <p>Eliminar Sub Categoría</p>
            </div>
            <div class="titulo_referencia">
              <span id="nombre_subcategoria_eliminar">Ninguna</span>
            </div>
          </div>
          <figure class="contenedro__img-eliminar">
            <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
          </figure>
          <span class="icon-attention"></span>
          <div class="mensaje__eliminar">
            Esta seguro que desea <span class="nom_campo">Eliminar</span> la
            siguiente subcategoría:
          </div>
          <div class="mensaje__info-eliminar">
            <ul>
              <li class="lista-info-eliminar">
                <span class="txt__negrita-eliminar">Sub Categoría: </span>
                <span class="txt__enter-eliminar" id="mostrar_subcategoria_eliminar">Ninguna</span>
                <span class="txt__negrita-eliminar">Pertenece a la categoría: </span>
                <span class="txt__enter-eliminar" id="mostrar_categoria_eliminar">Ninguna</span>
              </li>
            </ul>
          </div>
          <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
          <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_subcategoria">
            Cancelar
          </div>
        </div>
      </form>
    </div>

    {{-- {{ $Categorias->links('vendor.pagination.default') }} --}}

  </div>
  <!-- TODO FIN DEL CONTENIDO -->
  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  @if (count($Categorias) <= 0)
    <h2>NO HAY RESULTADOS SE SUBCATEGORIAS</h2>
  @else
    @foreach ($Categorias as $Fila)
      <script>
        $(document).ready(function() {
          $("#menu_categorias").addClass("item_select");
          var z = 0;
          var table = $('#{{ $Fila->CATE_ID }}_tabla_SubCategorias').DataTable({
            "ajax": "{{ route('AllSubCategoriasUser') }}?CATE_ID={{ $Fila->CATE_ID }}",
            "order": [[ 1, 'asc' ]],
            "columns": [{
                data: 'SUBC_ID'
              },
              {
                data: 'SUBC_NOMBRE'
              },
              {
                data: 'ESTA_TIPO'
              },
              {
                "defaultContent": `
                              <div class="contenedor_botones">
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

          $('#{{ $Fila->CATE_ID }}_tabla_SubCategorias tbody').on('click', 'div.btn_accion-editar', function() {
            var data = table.row($(this).parents('tr')).data();
            abrir_editar_subcategoria(data)
          });


          $('#{{ $Fila->CATE_ID }}_tabla_SubCategorias tbody').on('click', 'div.btn_accion-eliminar', function() {
            var data = table.row($(this).parents('tr')).data();
            abrir_modal_eliminar_subcategoria(data)
          });


        });
      </script>
    @endforeach
  @endif
  <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
  <script>
    $("#Buscar").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "{{ route('SearchCategorias') }}",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function(data) {
            response(data);
          },
        });
      },
    });
    // FILTRA CANTIDAD
    function FiltrarRegistros(Cantidad) {
      window.location.href = "{{ route('BusquedaCategoriasFilas') }}?CantCategorias=" + Cantidad;
    }
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_4_categorias.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
