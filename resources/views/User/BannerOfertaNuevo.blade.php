@if (auth()->check())
  @include('Layouts.HeaderUser')
  <link rel="stylesheet" href="css/app_18_banner.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />


  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <div class="contenedor_contenido_derecha">
    <!-- CONTENEDOR BANNER -->
    <!-- CONTENEDOR BANNER -->
    <!-- CONTENEDOR BANNER -->
    <div class="contenedor_banner">
      <div class="contenedor_titulo">
        <span class="icono_nav icon-picture"></span>
        <p>Banner</p>
      </div>
      <!-- ELEMENTOS DE NUEVO -->
      <!-- ELEMENTOS DE NUEVO -->
      <div class="contenedor_nuevo">

        @if (session('message'))
          <input type="hidden" id="messageExito" value="{{ session('message') }}">
        @endif
        @if (session('MsgErrorSistema'))
          <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
        @endif
        @if ($Tipo == null)
          <div class="titulo titulo_nuevo">
            <span class="icono_nav icon-plus"></span>
            <p>Nuevo Banner</p>
          </div>
        @endif
        @if ($Tipo != null && $Tipo === 'Modificar')
          <div class="titulo titulo_editar">
            <span class="icono_nav icon-plus"></span>
            <p>Modificar Banner</p>
          </div>
        @endif
        @if ($Tipo == null)
          <figure class="contenedro__imgElementos">
            <img src="img/svg/undraw_image_viewer_re_7ejc.svg" alt="Imagen Banner" />
          </figure>
        @endif
        @if ($Tipo != null && $Tipo === 'Modificar')
          <figure class="contenedro__imgElementos">
            <img src="img/svg/undraw_image_viewer_re_7ejc verde.svg" alt="Imagen Banner" />
          </figure>
        @endif
        @if ($Tipo == null)
          <form class="formulario" id="formulario_nuevo_banner" action="{{ Route('RegistrarBannerOferta') }}"
            method="POST">
            @csrf
        @endif
        @if ($Tipo != null && $Tipo === 'Modificar' && $BannerOferta != null)
          <form class="formulario" id="formulario_nuevo_banner" action="{{ Route('ModificarBannerOferta') }}"
            method="POST">
            @csrf
            @foreach ($BannerOferta as $Fila)
              <input type="hidden" id="bann_id" name="bann_id" value="{{ $Fila->BANN_ID }}">
            @endforeach

        @endif
        {{-- <form action="" class="formulario" id="formulario_nuevo_banner"> --}}
        <!-- INPUTS -->
        <!-- INPUTS -->
        <div class="formulario__contenedor-nuevo">
          <!-- LADO IZQUIERDO -->
          <!-- LADO IZQUIERDO -->
          <div class="izquierdo">
            <!-- INPUT NOMBRE DEL PRODUCTO -->
            <div class="formulario__grupo" id="grupo__sel_producto_nuevo_banner">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_producto_nuevo_banner" id="sel_producto_nuevo_banner"
                  required>
                  <option value=""></option>
                  @foreach ($Productos as $Fila)
                    <option value="{{ $Fila->PROD_ID }}">
                      {{ $Fila->PROD_NOMBRE . ' ' . $Fila->PROD_COMPLEMENTO }}</option>
                  @endforeach

                </select>
                <span class="formulario__placeholder">Producto a ofertar:*</span>
              </div>
            </div>
            <!-- INPUT PRESENTACION -->
            <div class="formulario__grupo" id="grupo__sel_presentacion_nuevo_banner">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_presentacion_nuevo_banner"
                  id="sel_presentacion_nuevo_banner" required>
                </select>
                <span class="formulario__placeholder">Presentacion:*</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_nuevo_banner">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_estado_nuevo_banner" id="sel_estado_nuevo_banner" required>
                  <option value=""></option>
                  @foreach ($Estados as $Fila)
                    <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Estado:*</span>
              </div>
            </div>
          </div>
          <!-- CENTRO -->
          <!-- CENTRO -->
          <div class="centro">
            <!-- PREVISUALIZAR IMAGEN -->
            <figure class="contenedor_img-banner" id="contenedor_img_nuevo_banner">
              <img class="img-banner" src="img/Agregar Fotos.png" alt="Imagen de Presentación"
                id="img_nuevo_banner" />
            </figure>
          </div>
          <!-- LADO DERECHO -->
          <!-- LADO DERECHO -->
          <div class="derecho">
            <!-- PREVISUALIZAR IMAGEN -->
            <figure class="contenedor_img-banner" id="contenedor_img_nuevo_banner">
              <img class="img-banner" src="img/Agregar Fotos.png" alt="Imagen de categoría"
                id="img_nuevo_deportiva" />
            </figure>
            <!-- INPUT IMAGEN -->
            <div class="formulario__grupo" id="grupo__sel_imgDeportiva_nuevo_banner">
              <div class="formulario__grupo-input">
                <select class="formulario__input" name="sel_imgDeportiva_nuevo_banner"
                  id="sel_imgDeportiva_nuevo_banner" required>
                  <option value=""></option>
                  @foreach ($ImagenDeportiva as $Fila)
                    <option value="{{ $Fila->IMAG_ID }}">{{ $Fila->IMAG_NOMBRE }}</option>
                  @endforeach
                </select>
                <span class="formulario__placeholder">Imagen deportiva:*</span>
              </div>
            </div>
          </div>
        </div>
        <!-- MENSAJES DE ERROR -->
        <!-- MENSAJES DE ERROR -->
        <div class="mensajes_error_inputs">
          <!-- MENSAJE PRODUCTO A OFERTAR -->
          <div class="grupo__input-error" id="error__sel_producto_nuevo_banner">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              un <span class="nom_campo">"Producto".</span>
            </p>
          </div>
          <!-- MENSAJE PRODUCTO A OFERTAR -->
          <div class="grupo__input-error" id="error__sel_presentacion_nuevo_banner">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              una <span class="nom_campo">"Presentacion".</span>
            </p>
          </div>
          <!-- MENSAJE ESTADO -->
          <div class="grupo__input-error" id="error__sel_estado_nuevo_banner">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              un <span class="nom_campo">"Estado".</span>
            </p>
          </div>
          <!-- MENSAJE PRODUCTO A OFERTAR -->
          <div class="grupo__input-error" id="error__sel_imgDeportiva_nuevo_banner">
            <p class="formulario__input-error-abajo">
              <span class="icon-attention"></span> Selecione por favor
              una <span class="nom_campo">"Imagen Deportiva".</span>
            </p>
          </div>
        </div>
        <!-- BOTON SUBMIT -->
        <!-- BOTON SUBMIT -->
        @if ($Tipo == null)
          <input class="btn btn_click btn_guardar btn_nuevo" type="submit" value="Nuevo" />
        @endif
        @if ($Tipo != null && $Tipo === 'Modificar')
          <input class="btn btn_click btn_guardar btn_editar" type="submit" value="Nuevo" />
        @endif
        <!-- BOTON CANCELAR -->
        <!-- BOTON CANCELAR -->
        <a class="btn_cancelar btn_click" href="{{ Route('OfertasBannerUser') }}">
          Cancelar
        </a>
        </form>
      </div>
    </div>
  </div>
  <!-- TODO FIN DEL CONTENIDO -->

  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="js/Controller_app.js"></script>
  <script>
    function ConsultaPresentacion(Otro, Otro1) {
      peticionAjax("{{ route('BuscarPresentacionesProductoOferta') }}", '_token=' + $('input[name="_token"]')
        .val() + '&Prod_id=' + $('#sel_producto_nuevo_banner').val(), 'ImpSelect',
        'sel_presentacion_nuevo_banner', Otro, Otro1);
    }

    function ConsultaFotoPresentacion() {
      peticionAjax("{{ route('BuscarPresentacionesProductoOferta') }}", '_token=' + $('input[name="_token"]')
        .val() + '&Prod_id=' + $('#sel_producto_nuevo_banner').val(), 'ImpImg',
        'img_nuevo_banner');
    }

    function ConsultaFotoDepotiva() {
      peticionAjax("{{ route('BuscarFotoDeportiva') }}", '_token=' + $('input[name="_token"]')
        .val() + '&Imag_id=' + $('#sel_imgDeportiva_nuevo_banner').val(), 'ImpImg',
        'img_nuevo_deportiva');
    }


    $('#sel_producto_nuevo_banner').change(function() {
      ConsultaPresentacion();
    });
    $('#sel_presentacion_nuevo_banner').change(function() {
      ConsultaFotoPresentacion();
    });
    $('#sel_imgDeportiva_nuevo_banner').change(function() {
      ConsultaFotoDepotiva();
    });
  </script>
  @if ($Tipo != null && $Tipo === 'Modificar' && $BannerOferta != null)
    @foreach ($BannerOferta as $Fila)
      <script>
        $("#sel_producto_nuevo_banner option")
          .removeAttr("selected")
          .filter("[value='{{ $Fila->PROD_ID }}']")
          .attr("selected", true);
        ConsultaPresentacion('selected', "{{ $Fila->GRSA_ID }}");
        $("#sel_estado_nuevo_banner option")
          .removeAttr("selected")
          .filter("[value='{{ $Fila->ESTADO_ESTA_ID }}']")
          .attr("selected", true);
        $("#sel_imgDeportiva_nuevo_banner option")
          .removeAttr("selected")
          .filter("[value='{{ $Fila->IDBANNER }}']")
          .attr("selected", true);
          document.getElementById('img_nuevo_deportiva').src = "{{ $Fila->IMGBANNER }}";
          document.getElementById('img_nuevo_banner').src = "{{ $Fila->IMGPRESENTACION }}";
      </script>
    @endforeach
  @endif
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_18_banner.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
