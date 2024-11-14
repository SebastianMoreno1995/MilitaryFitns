@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_10_producto_nuevo_general.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR PRODUCTOS -->
  <!-- CONTENEDOR PRODUCTOS -->
  <!-- CONTENEDOR PRODUCTOS -->
  <div class="contenedor_producto">
    @if (session('message'))
      <input type="hidden" id="messageExito" value="{{ session('message') }}">
    @endif
    @if (session('MsgErrorSistema'))
      <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
    @endif
    @if ($Tipo == null)
      <div class="contenedor_titulo_nuevo">
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
    <!-- CONTENIDO -->
    <!-- CONTENIDO -->
    @if ($Tipo == null)
      <form class="elementos" id="formulario_nuevo_producto" action="{{ Route('RegistrarProducto') }}"
        method="POST">
        @csrf
    @endif
    @if ($Tipo != null && $Tipo === 'Modificar' && $Producto != null)
      <form class="elementos" id="formulario_nuevo_producto" action="{{ Route('ModificarProducto') }}"
        method="POST">
        @csrf
        <input type="hidden" id="PROD_ID" name="PROD_ID" value="{{ $Producto->PROD_ID }}">
    @endif

    <input type="hidden" id="opcion" name="opcion" value="1">
    <!-- !ELEMENTOS INFORMACION DEL PRODUCTO -->
    <!-- !ELEMENTOS INFORMACION DEL PRODUCTO -->
    <div class="contenedor_nuevo informacion_general_producto">
      <!-- TITULO -->
      <!-- TITULO -->
      <div class="titulo titulo_nuevo">
        <span class="icono_nav icon-linode"></span>
        <p class="titulo_texto">Información general del producto</p>
      </div>
      <!-- ILUSTRACION -->
      <!-- ILUSTRACION -->
      <figure class="contenedro__imgElementos">
        <img src="img/svg/undraw_product_teardown_re_m1pc.svg" alt="Imagen Productos" />
      </figure>
      <!-- FORMULARIO -->
      <!-- FORMULARIO -->
      <div class="formulario">
        <!-- INPUTS -->
        <!-- INPUTS -->
        <div class="formulario__contenedor-nuevo">
          <!-- INPUT NOMBRE -->
          <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_producto">
            <div class="formulario__grupo-input">
              <input autofocus class="formulario__input" type="text" name="txt_nombre_nuevo_producto"
                id="txt_nombre_nuevo_producto" required />
              <span class="formulario__placeholder">Nombre:*</span>
            </div>
          </div>
          <!-- INPUT COMPLEMENTO -->
          <div class="formulario__grupo" id="grupo__txt_complemento_nuevo_producto">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="text" name="txt_complemento_nuevo_producto"
                id="txt_complemento_nuevo_producto" />
              <span class="formulario__placeholder">Complemento:</span>
            </div>
          </div>
          <!-- INPUT MARCA -->
          <div class="formulario__grupo" id="grupo__sel_marca_nuevo_producto">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="sel_marca_nuevo_producto" id="sel_marca_nuevo_producto" required>
                <option value=""></option>
                @foreach ($Marcas as $Fila)
                  <option value="{{ $Fila->MARC_ID }}">{{ $Fila->MARC_NOMBRE }}</option>
                @endforeach
              </select>
              <span class="formulario__placeholder">Marca:*</span>
            </div>
          </div>
          <!-- INPUT CATEGORIA -->
          <div class="formulario__grupo" id="grupo__sel_categoria_nuevo_producto">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="sel_categoria_nuevo_producto" id="sel_categoria_nuevo_producto"
                required>
                <option value=""></option>
                @foreach ($Categorias as $Fila)
                  <option value="{{ $Fila->CATE_ID }}">{{ $Fila->CATE_NOMBRE }}</option>
                @endforeach
              </select>
              <span class="formulario__placeholder">Categoría:*</span>
              <input type="hidden" id="Ruta_SubCategoria" name="Ruta_SubCategoria"
                value="{{ Route('SubCategoriasEsp') }}">
            </div>
          </div>
          <!-- INPUT SUBCATEGORIA -->
          <div class="formulario__grupo" id="grupo__sel_subcategoria_nuevo_producto">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="sel_subcategoria_nuevo_producto"
                id="sel_subcategoria_nuevo_producto" required>
              </select>
              <span class="formulario__placeholder">Subategoría:*</span>
            </div>
          </div>
          <!-- INPUT ESTADO -->
          <div class="formulario__grupo" id="grupo__sel_estado_nuevo_producto">
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="sel_estado_nuevo_producto" id="sel_estado_nuevo_producto"
                required>
                <option value=""></option>
                @foreach ($Estados as $Fila)
                  @if ($Tipo != null && $Tipo === 'Modificar')
                    <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                  @else
                    @if ($Fila->ESTA_TIPO == 'Edicion')
                      <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                    @endif
                  @endif
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
          <div class="grupo__input-error" id="error__txt_nombre_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> El campo
              <span class="nom_campo">"Nombre"</span> puede contener
              caracteres alfanumericos, de maximo 30 caracteres.
            </p>
          </div>
          <!-- MENSAJE COMPLEMENTO -->
          <div class="grupo__input-error" id="error__txt_complemento_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> El campo
              <span class="nom_campo">"Nombre"</span> puede contener
              caracteres alfanumericos, de maximo 30 caracteres.
            </p>
          </div>
          <!-- MENSAJE MARCA -->
          <div class="grupo__input-error" id="error__sel_marca_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              una <span class="nom_campo">"Marca".</span>
            </p>
          </div>
          <!-- MENSAJE CATEGORIA -->
          <div class="grupo__input-error" id="error__sel_categoria_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              una <span class="nom_campo">"Categoría".</span>
            </p>
          </div>
          <!-- MENSAJE SUBCATEGORIA -->
          <div class="grupo__input-error" id="error__sel_subcategoria_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              una <span class="nom_campo">"Subategoría".</span>
            </p>
          </div>
          <!-- MENSAJE DE ERROR ESTADO -->
          <div class="grupo__input-error" id="error__sel_estado_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> En el campo
              <span class="nom_campo">"Estado"</span> debe seleccionar
              alguna opción.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- !ELEMENTOS DESCRIPCION DEL PRODUCTO -->
    <!-- !ELEMENTOS DESCRIPCION DEL PRODUCTO -->
    <div class="contenedor_nuevo descripcion_producto">
      <!-- TITULO -->
      <!-- TITULO -->
      <div class="titulo titulo_nuevo">
        <span class="icono_nav icon-linode"></span>
        <p class="titulo_texto">Descripción del producto</p>
      </div>
      <!-- FORMULARIO -->
      <!-- FORMULARIO -->
      <div class="formulario">
        <!-- INPUTS -->
        <!-- INPUTS -->
        <div class="formulario__contenedor-nuevo">
          <!-- INPUT DESCRIPCION -->
          <div class="formulario__grupo formulario__grupo_textarea" id="grupo__are_descripcion_nuevo_producto">
            <div class="formulario__grupo-input">
              <textarea class="formulario__input textarea" name="are_descripcion_nuevo_producto" id="are_descripcion_nuevo_producto"
                rows="4" required>  @if ($Producto  != null){{ $Producto->PROD_DESCRIPCION }}@endif</textarea>
              <span class="formulario__placeholder">Descripcíon del producto*:</span>
            </div>
          </div>
          <!-- INPUT ADVERTENCIA -->
          <div class="formulario__grupo formulario__grupo_textarea" id="grupo__are_advertencia_nuevo_producto">
            <div class="formulario__grupo-input">
              <textarea class="formulario__input textarea" name="are_advertencia_nuevo_producto" id="are_advertencia_nuevo_producto"
                rows="4">  @if ($Producto != null){{ $Producto->PROD_ADVERTENCIA }}@endif</textarea>
              <span class="formulario__placeholder">Advertencias del producto:</span>
            </div>
          </div>
          {{-- <!-- INPUT REFERENCIA O CODIGO DE BARRAS -->
          <div class="formulario__grupo" id="grupo__txt_codigoBarras_nuevo_producto">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="text" name="txt_codigoBarras_nuevo_producto"
                id="txt_codigoBarras_nuevo_producto" />
              <span class="formulario__placeholder">Ref. o Código de barras:</span>
            </div>
          </div> --}}
          <!-- INPUT REGISTRO INVIMA -->
          <div class="formulario__grupo" id="grupo__txt_invima_nuevo_producto">
            <div class="formulario__grupo-input">
              <input class="formulario__input" type="text" name="txt_invima_nuevo_producto"
                id="txt_invima_nuevo_producto" />
              <span class="formulario__placeholder">Registro Invima:</span>
            </div>
          </div>
        </div>
        <!-- MENSAJES DE ERROR -->
        <!-- MENSAJES DE ERROR -->
        <div class="mensajes_error_inputs">
          <!-- MENSAJE DESCRIPCION -->
          <div class="grupo__input-error" id="error__are_descripcion_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> El campo
              <span class="nom_campo">"Descripción del producto "</span>
              puede contener caracteres alfanumericos, de maximo 255
              caracteres.
            </p>
          </div>
          <!-- MENSAJE ADVERTENCIAS -->
          <div class="grupo__input-error" id="error__are_advertencia_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> El campo
              <span class="nom_campo">"Advertencias del producto "</span>
              puede contener caracteres alfanuméricos, de máximo 255
              caracteres.
            </p>
          </div>
          {{-- <!-- MENSAJE REFERENCIA O CODIGO DE BARRAS -->
          <div class="grupo__input-error" id="error__txt_codigoBarras_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> El campo
              <span class="nom_campo">"Referencia o Código de barras "</span>
              puede contener caracteres alfanuméricos, de máximo 30
              caracteres.
            </p>
          </div> --}}
          <!-- MENSAJE REGISTRO INVIMA -->
          <div class="grupo__input-error" id="error__txt_invima_nuevo_producto">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> El campo
              <span class="nom_campo">"Referencia o Código de barras "</span>
              puede contener caracteres alfanuméricos, de máximo 30
              caracteres.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="contenedor_btn">
      <!-- !BOTON SUBMIT -->
      <!-- !BOTON SUBMIT -->
      <input class="btn btn_click btn_guardar btn_nuevo" type="submit" value="Guardar y Continuar" />
      <!-- BOTON CANCELAR -->
      <!-- BOTON CANCELAR -->
      <a href="{{ Route('ProductosUser') }}" class="btn_cancelar btn_click">
        Cancelar
      </a>
    </div>
    </form>
  </div>
  {{-- <a href="{{ Route('ProductosFotosUser') }}">-></a> --}}
  <!-- TODO FIN DEL CONTENIDO -->

  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="js/app_10_producto_nuevo_general.js"></script>
  <script src="js/Controller_app_modals.js"></script>
  @if ($Tipo != null && $Tipo === 'Modificar' && $Producto != null && $SubCategorias != null)
    <script>
      $('#txt_nombre_nuevo_producto').val('{{ $Producto->PROD_NOMBRE }}');
      $('#txt_complemento_nuevo_producto').val('{{ $Producto->PROD_COMPLEMENTO }}');
      $("#sel_marca_nuevo_producto option")
        .removeAttr("selected")
        .filter("[value='{{ $Producto->MARCA_MARC_ID }}']")
        .attr("selected", true);
      $("#sel_estado_nuevo_producto option")
        .removeAttr("selected")
        .filter("[value='{{ $Producto->ESTADO_ESTA_ID }}']")
        .attr("selected", true);

      $("#sel_categoria_nuevo_producto option")
        .removeAttr("selected")
        .filter("[value='{{ $SubCategorias->CATEGORIA_CATE_ID }}']")
        .attr("selected", true);

   //   $('#are_descripcion_nuevo_producto').text('{{ $Producto->PROD_DESCRIPCION }}');
      // $('#are_advertencia_nuevo_producto').text('{{ $Producto->PROD_ADVERTENCIA }}');
      // $('#txt_codigoBarras_nuevo_producto').val('{{ $Producto->PROD_CODIGOBARRAS }}');
      $('#txt_invima_nuevo_producto').val('{{ $Producto->PROD_REGISTROINVIMA }}');

      BuscarSubcategorias(
        '{{ $SubCategorias->CATEGORIA_CATE_ID }}',
        $("#Ruta_SubCategoria").val(),
        '{{ $Producto->SUBCATEGORIA_SUBC_ID }}'
      );
    </script>
  @endif
  <script>
    $(document).ready(function() {
      $("#menu_producto").addClass("item_select");
    });
  </script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
