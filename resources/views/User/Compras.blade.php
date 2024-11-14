@if (auth()->check())
  @include('Layouts.HeaderUser')
  <link rel="stylesheet" href="css/app_13_compras_nuevo.css" />
  <link rel="stylesheet" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}" />
  <div class="contenedor_contenido_derecha">
    @if (session('message'))
      <input type="hidden" id="messageExito" value="{{ session('message') }}">
    @endif
    @if (session('MsgErrorSistema'))
      <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
    @endif

    <!-- TODO INICIO DEL CONTEDIO -->
    <!-- CONTENEDOR CONTEDIDO DERECHA -->
    <!-- CONTENEDOR CONTEDIDO DERECHA -->
    <!-- CONTENEDOR CONTEDIDO DERECHA -->
    <div class="contenedor_contenido_derecha">
      <!-- FACTURA DE COMPRA -->
      <!-- FACTURA DE COMPRA -->
      <!-- FACTURA DE COMPRA -->
      <div class="contenedor_compras">
        <div class="compras_titulo">
          <span class="icono_nav icon-cart-plus"></span>
          <p>Compras</p>
        </div>
        <!-- ELEMENTOS DE LA TABLA -->
        <!-- ELEMENTOS DE LA TABLA -->
        <div class="contenedor_tabla">
          <!-- TITULO TABLA -->
          <!-- TITULO TABLA -->
          <div class="titulo titulo_tabla">
            <span class="icono_nav icon-"></span>
            <p>Factura, Remisión u Orden de compra</p>
          </div>
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="encabezado_compras formulario_nuevo_factura" id="formulario_nuevo_factura">
            <form action="" id="formCabecera">
              <fieldset class="info_factura">
                <legend>Información de compra</legend>
                <!-- INPUT FECHA DE COMPRA -->
                <div class="formulario__grupo" id="grupo__date_fechaCompra_nuevo_factura">
                  <div class="formulario__grupo-input">
                    <input autofocus class="formulario__input" type="date" name="date_fechaCompra_nuevo_factura"
                      id="date_fechaCompra_nuevo_factura" />
                    <span class="formulario__placeholder">Fecha de la compra:*</span>
                  </div>
                </div>
                <!-- INPUT PROVEEDOR -->
                <div class="formulario__grupo" id="grupo__sel_proveedor_nuevo_factura">
                  <div class="formulario__grupo-input">
                    <select class="formulario__input" name="sel_proveedor_nuevo_factura"
                      id="sel_proveedor_nuevo_factura">
                      <option value=""></option>
                      @foreach ($Proveedores as $Fila)
                        <option value="{{ $Fila->PROV_ID }}">{{ $Fila->PROV_NOMBRE }}
                        </option>
                      @endforeach
                    </select>
                    <span class="formulario__placeholder">Proveedor:*</span>
                  </div>
                </div>
                <!-- INPUT IMPUESTO -->
                <div class="formulario__grupo" id="grupo__sel_impuesto_nuevo_factura">
                  <div class="formulario__grupo-input">
                    <select class="formulario__input" name="sel_impuesto_nuevo_factura" id="sel_impuesto_nuevo_factura">
                      <option value=""></option>
                      @foreach ($Impuesto as $Fila)
                        <option value="{{ $Fila->TPIM_ID }}">{{ $Fila->TPIM_DESCRIPCION }}
                        </option>
                      @endforeach
                    </select>
                    <span class="formulario__placeholder">Impuesto:*</span>
                  </div>
                </div>
                <!-- INPUT DESCUENTO -->
                <div class="formulario__grupo" id="grupo__num_descuento_nuevo_factura">
                  <div class="formulario__grupo-input">
                    <input class="formulario__input" type="number" name="num_descuento_nuevo_factura"
                      id="num_descuento_nuevo_factura" value="0"/>
                    <span class="formulario__placeholder">Descuento:</span>
                  </div>
                </div>
              </fieldset>
            </form>
            <div class="contenedor_info_producto">
              <form action="" id="formDetalle">
                <fieldset class="info_producto">
                  <legend>Información del producto</legend>
                  <div class="lado_izquierdo">
                    <!-- INPUTS -->
                    <!-- INPUTS -->
                    <!-- INPUT FECHA DE CADUCIDAD -->
                    <div class="formulario__grupo" id="grupo__date_fechaCaducidad_nuevo_factura">
                      <div class="formulario__grupo-input">
                        <input autofocus class="formulario__input" type="date" name="date_fechaCaducidad_nuevo_factura"
                          id="date_fechaCaducidad_nuevo_factura" />
                        <span class="formulario__placeholder">Fecha de caducidad:</span>
                      </div>
                    </div>
                    <!-- INPUT PRODUCTO -->
                    <div class="formulario__grupo" id="grupo__sel_producto_nuevo_factura">
                      <div class="formulario__grupo-input">
                        <select class="formulario__input" name="sel_producto_nuevo_factura"
                          id="sel_producto_nuevo_factura">

                          <option value=""></option>
                          @foreach ($Producto as $Fila)
                            <option value="{{ $Fila->PROD_ID }}">
                              {{ $Fila->PROD_NOMBRE . ' - ' . $Fila->PROD_COMPLEMENTO }}
                            </option>
                          @endforeach
                        </select>
                        <span class="formulario__placeholder">Producto:*</span>
                      </div>
                    </div>
                    <!-- INPUT PRESENTACION -->
                    <div class="formulario__grupo" id="grupo__sel_presentacion_nuevo_factura">
                      <div class="formulario__grupo-input">
                        <select class="formulario__input" name="sel_presentacion_nuevo_factura"
                          id="sel_presentacion_nuevo_factura">
                          <option value=""></option>
                          {{-- @foreach ($Presentacion as $Fila)
                              <option value="{{ $Fila->UNME_ID }}">{{ $Fila->UNME_MEDIDA." - ".$Fila->PROD_COMPLEMENT }}</option>
                          @endforeach --}}
                        </select>
                        <span class="formulario__placeholder">Presentación:*</span>
                      </div>
                    </div>
                  </div>
                  <div class="lado_derecho">
                    <!-- INPUTS -->
                    <!-- INPUTS -->
                    <!-- INPUT CANTIDAD -->
                    <div class="formulario__grupo" id="grupo__num_cantidad_nuevo_factura">
                      <div class="formulario__grupo-input">
                        <input class="formulario__input" type="number" name="num_cantidad_nuevo_factura"
                          id="num_cantidad_nuevo_factura" />
                        <span class="formulario__placeholder">Cantidad:*</span>
                      </div>
                    </div>
                    <!-- INPUT PRECIO -->
                    <div class="formulario__grupo" id="grupo__num_precio_nuevo_factura">
                      <div class="formulario__grupo-input">
                        <input class="formulario__input" type="number" name="num_precio_nuevo_factura"
                          id="num_precio_nuevo_factura" />
                        <span class="formulario__placeholder">Precio:*</span>
                      </div>
                    </div>
                    <!-- INPUT TIPO HIDDEN SUBTOTAL -->
                    <input type="hidden" name="num_input_sutotal" id="num_input_sutotal_hidden">
                    <!-- BOTON SUBMIT AGREGAR PRODUCTO -->
                    <input type="submit" class="btn btn_click btn_guardar btn_agregarProducto icon-plus"
                      value="Agregar Producto">
                    <!-- <button type="submit" class="btn btn_click btn_guardar btn_agregarProducto"><span class="icon-plus"></span>Agregar Producto</button> -->
                  </div>
                </fieldset>
              </form>
              <!-- MENSAJES DE ERROR -->
              <!-- MENSAJES DE ERROR -->
              <div class="mensajes_error_inputs">
                <!-- MENSAJE DE ERROR - FECHA DE FACTURA -->
                <div class="grupo__input-error" id="error__date_fechaCompra_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Ingrese por favor la <span class="nom_campo">"fecha de la
                      factura de compra, orden de compra o remisión."</span></span>
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - NOMBRE DEL PROVEEDOR -->
                <div class="grupo__input-error" id="error__sel_proveedor_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Por favor seleccione un
                    <span class="nom_campo">"Proveedor"</span> de la lista.
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - TIPO DE INPUESTO -->
                <div class="grupo__input-error" id="error__sel_impuesto_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Seleccione el tipo de
                    <span class="nom_campo">"Impuesto"</span>.
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - DESCUENTO -->
                <div class="grupo__input-error" id="error__num_descuento_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Ingrese por favor el
                    <span class="nom_campo">"Descuento"</span> solo valores numericos, sin el
                    signo: "%".
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - REFERENCIA O CODIGO DE BARRAS -->
                <div class="grupo__input-error" id="error__date_fechaCaducidad_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Ingrese por favor la <span class="nom_campo">"fecha de
                      caducidad."</span>
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - NOMBRE DEL PRODUCTO -->
                <div class="grupo__input-error" id="error__sel_producto_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Seleccione un
                    <span class="nom_campo">"Producto"</span> de la lista.
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - PRESENTACION -->
                <div class="grupo__input-error" id="error__sel_presentacion_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Seleccione un
                    <span class="nom_campo">"Presentación"</span> de la lista.
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - CANTIDAD -->
                <div class="grupo__input-error" id="error__num_cantidad_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Ingrese por favor la
                    <span class="nom_campo">"Cantidad"</span>.
                  </p>
                </div>
                <!-- MENSAJE DE ERROR - PRECIO -->
                <div class="grupo__input-error" id="error__num_precio_nuevo_factura">
                  <p class="formulario__input-error-abajo">
                    <span class="icon-attention"></span> Ingrese por favor el
                    <span class="nom_campo">"Precio"</span> del producto.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- FACTURA TABLA -->
          <!-- FACTURA TABLA -->
          <div class="tabla">
            <table id="tabla_presentacion" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio5">Producto</th>
                  <th class="tamanio5">Presentación</th>
                  <th class="tamanio2">Cantidad</th>
                  <th class="tamanio2">Precio</th>
                  <th class="tamanio2">Subtotal</th>
                  <th class="tamanio4">-</th>
                </tr>
              </thead>
              <tbody id="cuerpoTabla">
                <tr>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>

              </tbody>
            </table>
            <!-- FOOTER DE LA TABLA -->
            <!-- FOOTER DE LA TABLA -->
            <div class="footer_tabla">
              <div class="footer_labelInput">
                <label class="footer_label" for="txt_descuento">Descuento </label>
                <input class="footer_input" type="text" id="txt_descuento" name="num_descuento" disabled />
              </div>
              <div class="footer_labelInput">
                <label class="footer_label" for="txt_subtotal">Subtotal </label>
                <input class="footer_input" type="text" id="txt_subtotal" name="num_subtotal" disabled />
              </div>
              <div class="footer_labelInput">
                <label class="footer_label" for="txt_impuesto">Iva </label>
                <input class="footer_input" type="text" id="txt_impuesto" name="num_impuesto" disabled />
              </div>
              <div class="footer_labelInput">
                <label class="footer_label total" for="txt_total">Total </label>
                <input class="footer_input total" type="text" id="txt_total" name="num_total" disabled />
              </div>
            </div>
          </div>
          <!-- BOTON SUBMIT -->
          <!-- BOTON SUBMIT -->
          <input type="hidden" id="Ruta" value="{{ route('RegistrarCompra') }}">
          <button class="btn btn_click btn_guardar btn_registrarCompra" id="btn_guardar">Registrar
            Compra</button>
          <!-- BOTON CANCELAR -->
          <!-- BOTON CANCELAR -->
          <a href="app_9_productos.html" class="btn_cancelar btn_click">
            Cancelar
          </a>
        </div>
      </div>
    </div>
    <!-- TODO FIN DEL CONTENIDO -->
  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/Controller_app.js"></script>
  <script>
    $('#sel_producto_nuevo_factura').change(function() {
      peticionAjax("{{ route('BuscarPresentacionesProducto') }}", '_token=' + $('input[name="_token"]').val() +
        '&Prod_id=' + $('#sel_producto_nuevo_factura').val(), 'ImpSelect', 'sel_presentacion_nuevo_factura', '');
    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_13_compras_nuevo.js"></script>

  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
