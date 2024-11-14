@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_11_producto_nuevo_fotos.css" />
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
    <div class="elementos">

      <!-- ELEMENTOS FOTOS DEL PRODUCTO -->
      <!-- ELEMENTOS FOTOS DEL PRODUCTO -->
      <!-- ELEMENTOS FOTOS DEL PRODUCTO -->
      <div class="contenedor_nuevo fotos_producto">
        <!-- BOTON DE ATRAS -->
        <!-- BOTON DE ATRAS -->
        <a href="{{ route('RegistrarProductos') }}?PROD_ID={{ session('Prod_id' . auth()->user()->USUA_ID) }}&Tipo=Modificar"
          class="btn_atras"><span class="icon-left-big"></span>Atras</a>
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo titulo_nuevo">
          <span class="icono_nav icon-linode"></span>
          <p>Fotos del producto</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__imgElementos">
          <img src="img/svg/undraw_posting_photo_re_plk8.svg" alt="Imagen Productos" />
        </figure>
        <!-- NOMBRE DEL PRODUCTO -->
        <!-- NOMBRE DEL PRODUCTO -->
        <!-- NOMBRE DEL PRODUCTO -->
        <div class="contenedor_nombre_producto">
          <p id="nombre_producto">
            @if (session('Prod_Nombre' . auth()->user()->USUA_ID))
              {{ session('Prod_Nombre' . auth()->user()->USUA_ID) }} <span id="complemento_producto">
                {{ session('Prod_Complemento' . auth()->user()->USUA_ID) }} </span>
            @else
              ERROR
            @endif
          </p>
        </div>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <div class="formulario">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor-nuevo">

            <form class="lado_izquierdo" id="formulario_nuevo_producto" action="{{ route('ImagenesProducto') }}"
              method="POST" enctype="multipart/form-data">
              @csrf

              @if (session('Prod_id' . auth()->user()->USUA_ID))
                <input type="hidden" id="Prod_id" name="Prod_id"
                  value="{{ session('Prod_id' . auth()->user()->USUA_ID) }}">
              @endif
              {{-- <form class="lado_izquierdo"> --}}
              <!-- PREVISUALIZAR IMAGEN -->
              <p class="establecer">Establecer fotos relacionadas</p>
              <figure class="contenedor_img-producto" id="contenedor_img_portada_nuevo_producto">
                <img class="img-producto" src="img/Agregar Fotos.png" alt="Imagen de portada"
                  id="img_portada_nuevo_producto" />
              </figure>
              <!-- INPUT TIPO FILE DE LA IMAGEN -->
              <div class="formulario__grupo" id="grupo__txt_portada_nuevo_producto">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="text" name="txt_portada_nuevo_producto"
                    id="txt_portada_nuevo_producto" required/>
                  <span class="formulario__placeholder">Seleccione una imagen:*</span>
                  <label for="input_file_portada_nuevo" class="label_subir">
                    <span class="icon-folder-open-empty"></span>
                  </label>
                  <input type="file" name="input_file_portada_nuevo" id="input_file_portada_nuevo"
                    onchange="vista_preliminar_nuevo_portada(event)" required/>
                </div>
              </div>
              <!-- !BOTON AGREGAR -->
              <!-- !BOTON AGREGAR -->
              <input class="btn btn_click btn_guardar btn_agregar" type="submit" value="Agregar Foto" />
            </form>
            @if ($Tipo == null)
              <form class="lado_derecho" id="formulario_nuevo_producto" action="{{ Route('RegistrarProducto') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
            @endif

            @if ($Tipo != null && $Tipo === 'Modificar')
              <form class="lado_derecho" id="formulario_nuevo_producto" action="{{ Route('ModificarProducto') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
            @endif

            <input type="hidden" id="opcion" name="opcion" value="2">
            @if (session('Prod_id' . auth()->user()->USUA_ID))
              <input type="hidden" id="Prod_id" name="Prod_id"
                value="{{ session('Prod_id' . auth()->user()->USUA_ID) }}">
            @endif
            <!-- PREVISUALIZAR IMAGEN -->
            <p class="establecer">Establecer Tabla Nutricional</p>
            <figure class="contenedor_img-producto" id="contenedor_img_nutricional_nuevo_producto">
              <img class="img-producto" src="img/Agregar Fotos.png" alt="Imagen tabla nutricional"
                id="img_nutricional_nuevo_producto" />
            </figure>
            <!-- INPUT TIPO FILE DE LA IMAGEN -->
            <div class="formulario__grupo" id="grupo__txt_nutricional_nuevo_producto">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_nutricional_nuevo_producto"
                  id="txt_nutricional_nuevo_producto" required/>
                <span class="formulario__placeholder">Seleccione una imagen:</span>
                <label for="input_file_nutricional_nuevo" class="label_subir">
                  <span class="icon-folder-open-empty"></span>
                </label>
                <input type="file" name="input_file_nutricional_nuevo" id="input_file_nutricional_nuevo"
                  onchange="vista_preliminar_nuevo_nutricional(event)" required/>
              </div>
            </div>
            <!-- !BOTON AGREGAR -->
            <!-- !BOTON AGREGAR -->
            <input class="btn btn_click btn_guardar btn_agregar" type="submit" value="Agregar Tabla Nutricional" />
            </form>
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <!-- MENSAJE DE ERROR FOTO PORTADA -->
            <div class="grupo__input-error" id="error__txt_portada_nuevo_producto">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor seleccione
                una foto 
                <span class="nom_campo">Relacionada.</span>
              </p>
            </div>
            <!-- MENSAJE DE ERROR FOTO NUTRICIONAL -->
            <div class="grupo__input-error" id="error__txt_nutricional_nuevo_producto">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor seleccione
                una foto de:
                <span class="nom_campo">Tabla Nutricional.</span>
              </p>
            </div>
          </div>
        </div>
        <!-- !TABLA FOTOS RELACIONADAS -->
        <!-- !TABLA FOTOS RELACIONADAS -->
        <!-- !TABLA FOTOS RELACIONADAS -->
        <div class="tabla_fotosRelacionadas">
          <!-- TITULO TABLA FOTOS -->
          <!-- TITULO TABLA FOTOS -->
          <div class="titulo titulo_tabla_fotosRelacionadas">
            <span class="icono_nav icon-linode"></span>
            <p class="titulo_texto">Fotos Relacionadas</p>
          </div>
          <table id="tabla_fotosRelacionadas" class="hover">
            <thead>
              <tr>
                <th class="tamagnio_1">No</th>
                <th class="tamagnio_2">Foto</th>
                <th class="tamagnio_3">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- !BOTON SUBMIT -->
        <!-- !BOTON SUBMIT -->
        <a class="btn btn_click btn_guardar btn_nuevo" href="{{ Route('ProductosPresentacionesUser') }}">Guardar y Continuar</a>
        {{-- <input class="btn btn_click btn_guardar btn_nuevo" type="submit" value="Guardar y Continuar" /> --}}
        <!-- BOTON CANCELAR -->
        <!-- BOTON CANCELAR -->
        <a href="{{ Route('ProductosUser') }}" class="btn_cancelar btn_click">
          Cancelar
        </a>
      </div>
    </div>
  </div>
  <!-- !MODAL VER FOTOS RELACIONADAS -->
  <!-- !MODAL VER FOTOS RELACIONADAS -->
  <!-- !MODAL VER FOTOS RELACIONADAS -->
  <div class="contenedor_modal_ver_fotoRelacionada">
    <div class="modal_ver_fotoRelacionada">
      <!-- BOTON CERRAR -->
      <!-- BOTON CERRAR -->
      <span class="icon-cancel btn_cerrar_modal_ver_fotoRelacionada"></span>
      <!-- NOMBRE DE LAS FOTOS RELACIONADAS -->
      <!-- NOMBRE DE LAS FOTOS RELACIONADAS -->
      <div class="titulo_foto_presentacion titulo">
        <p>
          {{ session('Prod_Nombre' . auth()->user()->USUA_ID) }}
          <span>{{ session('Prod_Complemento' . auth()->user()->USUA_ID) }} </span>
        </p>
      </div>
      <!-- FOTO DE LAS FOTOS RELACIONADAS -->
      <!-- FOTO DE LAS FOTOS RELACIONADAS -->
      <figure class="contenedor_img-producto_foto">
        <img id="FotoPresentacion" class="img-producto_foto" src="img/Agregar Fotos.png"
          alt="Foto producto relacionado" />
      </figure>
    </div>
  </div>
  <!-- MODAL ELIMINAR FOTOS RELACIONADAS -->
  <!-- MODAL ELIMINAR FOTOS RELACIONADAS -->
  <!-- MODAL ELIMINAR FOTOS RELACIONADAS -->
  <div class="contenedor_modal_eliminar_fotoRelacionada">
    <form class="modal_eliminar_fotoRelacionada" action="{{ Route('EliminarFotoRelacionadas') }}" method="POST">
      @csrf
      <input type="hidden" name="txt_img_id_eliminar" id="txt_img_id_eliminar">
      <div class="titulo_eliminar titulo">
        <span class="icono_nav icon-attention-1"></span>
        <p>Eliminar Foto Relacionada</p>
      </div>
      <figure class="contenedro__img-eliminar">
        <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
      </figure>
      <span class="icon-attention"></span>
      <div class="mensaje__eliminar">
        Esta seguro que desea <span class="nom_campo">Eliminar</span> la
        siguiente Foto Relacionada:
      </div>
      <div class="mensaje__info-eliminar">
        <ul>
          <li class="lista-info-eliminar">
            <span class="txt__negrita-eliminar">Foto Relacionada: </span>
            <img id="FotoPresentacionEliminar" class="img-productoElimiar" src="img/Agregar Fotos.png"
              alt="Foto producto relacionado"  />
            {{-- <span class="txt__enter-eliminar" id="text_marc_nombre">Ninguna</span> --}}
          </li>
        </ul>
      </div>
      <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
      <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_fotoRelacionada">
        Cancelar
      </div>
    </form>
  </div>
  {{-- <a href="{{ Route('ProductosPresentacionesUser') }}">-></a> --}}
  <!-- TODO FIN DEL CONTENIDO -->

  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="js/Controller_app.js"></script>
  <script>
    $("#menu_producto").addClass("item_select");

    var table = $('#tabla_fotosRelacionadas').DataTable({
      "ajax": "{{ route('AllProductosFotosUser') }}?PROD_ID=" + $('#Prod_id').val(),
      "order": [
        [1, 'asc']
      ],
      "columns": [{
          data: 'IMAG_ID'
        },
        {
          "render": function(data, type, row) {
            return `<img width="100" src="${row.IMAG_DIRECCIONIMAGEN}"/>`;
          }
        },
        {
          "defaultContent": `
                            <div class="contenedor_botones_tabla_fotos">
                                <div class="btn_accion-ver btn btn_click btn_accion btn_abrir_modal_ver">
                                    <span class="icon-eye" title="Ver"></span>
                                </div>
                                <div
                                    class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_fotos">
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

    $('#tabla_fotosRelacionadas tbody').on('click', 'div.btn_abrir_modal_ver', function() {
      var data = table.row($(this).parents('tr')).data();
      abrir_modal_ver_fotoRelacionada(data)
    });

    $('#tabla_fotosRelacionadas tbody').on('click', 'div.btn_accion-eliminar', function() {
      var data = table.row($(this).parents('tr')).data();
      abrir_modal_eliminar_fotoRelacionada(data)
    });
  </script>

  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_11_producto_nuevo_fotos.js"></script>
  @if ($Tipo != null && $Tipo === 'Modificar' && $Imagenes != null)
    @foreach ($Imagenes as $Fila)
      @if ($Fila->TIPO_IMAGEN_TIIM_ID == '2')
        <script>
          $("#txt_nutricional_nuevo_producto").val('{{ $Fila->IMAG_DIRECCIONIMAGEN }}');
          $("#img_nutricional_nuevo_producto").attr("src", '{{ $Fila->IMAG_DIRECCIONIMAGEN }}');
        </script>
      @endif
    @endforeach
  @endif
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
