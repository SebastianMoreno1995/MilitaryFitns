@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_7_marcas.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <div class="contenedor_contenido_derecha">
    @if (session('message'))
      <input type="hidden" id="messageExito" value="{{ session('message') }}">
    @endif
    @if (session('MsgErrorSistema'))
      <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
    @endif
    <!-- CONTENEDOR MARCAS -->
    <!-- CONTENEDOR MARCAS -->
    <!-- CONTENEDOR MARCAS -->
    <div class="contenedor_marca">
      <div class="contenedor_titulo">
        <span class="icono_nav icon-linode"></span>
        <p>Marcas</p>
      </div>
      <!-- CONTENIDO -->
      <!-- CONTENIDO -->
      <div class="elementos">
        <!-- ELEMENTOS DE NUEVO -->
        <!-- ELEMENTOS DE NUEVO -->
        <div class="contenedor_nuevo">
          <div class="titulo titulo_nuevo">
            <span class="icono_nav icon-plus"></span>
            <p>Nueva Marca</p>
          </div>
          <figure class="contenedro__imgElementos">
            <img src="img/svg/undraw_factory_dy-0-a.svg" alt="Imagen Marcas">
          </figure>
          <form action="{{ Route('RegistrarMarcas') }}" method="POST" class="formulario"
            id="formulario_nuevo_marca" enctype="multipart/form-data">
            @csrf
            <!-- INPUTS -->
            <!-- INPUTS -->
            <div class="formulario__contenedor-nuevo">
              <!-- INPUT MARCAS -->
              <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_marca">
                <div class="formulario__grupo-input">
                  <input autofocus class="formulario__input" type="text" name="txt_nombre_nuevo_marca"
                    id="txt_nombre_nuevo_marca" required />
                  <span class="formulario__placeholder">Nombre de la Marca:*</span>
                </div>
              </div>
              <!-- PREVISUALIZAR IMAGEN -->
              <figure class="contenedor_img-marca" id="contenedor_img_nuevo_marca">
                <img class="img-marca" src="img/Agregar Fotos.png" alt="Imagen de categoría"
                  id="img_nuevo_marca" />
              </figure>
              <!-- INPUT IMAGEN -->
              <div class="formulario__grupo" id="grupo__txt_imagen_nuevo_marca">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="text" name="txt_imagen_nuevo_marca"
                    id="txt_imagen_nuevo_marca" />
                  <span class="formulario__placeholder">Seleccione una imagen:*</span>
                  <label for="input_file_nuevo" class="label_subir">
                    <span class="icon-folder-open-empty"></span>
                  </label>
                  <input type="file" name="input_file_nuevo" id="input_file_nuevo"
                    onchange="vista_preliminar_nuevo(event)" />
                </div>
              </div>
              <!-- INPUT ESTADO -->
              <div class="formulario__grupo" id="grupo__sel_estado_nuevo_marca">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_estado_nuevo_marca" id="sel_estado_nuevo_marca" required>
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
              <div class="grupo__input-error" id="error__txt_nombre_nuevo_marca">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> El campo
                  <span class="nom_campo">"Marca"</span> debe contener
                  caracteres alfabeticos, maximo 30 caracteres.
                </p>
              </div>
              <!-- MENSAJE DE ERROR IMAGEN -->
              <div class="grupo__input-error" id="error__txt_imagen_nuevo_marca">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> Por favor
                  seleccione una
                  <span class="nom_campo">Imagen.</span>
                </p>
              </div>
              <!-- MENSAJE ESTADO -->
              <div class="grupo__input-error" id="error__sel_estado_nuevo_marca">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> Selecione por favor
                  un <span class="nom_campo">"Estado".</span>
                </p>
              </div>
            </div>
            <!-- BOTON SUBMIT -->
            <!-- BOTON SUBMIT -->
            <input class="btn btn_click btn_guardar btn_nuevo" type="submit" value="Nuevo" />
          </form>
        </div>
        <!-- ELEMENTOS DE LA TABLA -->
        <!-- ELEMENTOS DE LA TABLA -->
        <div class="contenedor_tabla">
          <div class="titulo titulo_tabla">
            <span class="icono_nav icon-"></span>
            <p>Tabla de Marcas</p>
          </div>
          <form class="tabla">
            <table id="tabla_marca" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio5">Marca</th>
                  <th class="tamanio2">Estado</th>
                  <th class="tamanio4">Acciones</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <!-- MODAL EDITAR MARCAS -->
    <!-- MODAL EDITAR MARCAS -->
    <!-- MODAL EDITAR MARCAS -->
    <div class="contenedor_modal_editar_marca">
      <div class="modal_editar_marca">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_editar titulo">
          <span class="icon-linode"></span>
          <p>Editar Marca</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_factory_dy-0-a verde.svg" alt="Imagen Editar" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form action="{{ Route('ModificarMarcas') }}" method="POST" class="formulario"
          id="formulario_editar_marca" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="txt_marc_id_editar" id="txt_marc_id_editar">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor-editar">
            <!-- PREVISUALIZAR IMAGEN -->
            <figure class="contenedor_img-marca" id="contenedor_img_editar_marca">
              <img class="img-marca" src="img/Agregar Fotos.png" alt="Imagen de categoría"
                id="img_editar_marca" />
            </figure>
            <div class="lado_derecho">
              <!-- INPUT IMAGEN -->
              <div class="formulario__grupo" id="grupo__txt_imagen_editar_marca">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="text" name="txt_imagen_editar_marca"
                    id="txt_imagen_editar_marca" />
                  <span class="formulario__placeholder">Seleccione una imagen:*</span>
                  <label for="input_file_editar" class="label_subir">
                    <span class="icon-folder-open-empty"></span>
                  </label>
                  <input type="file" name="input_file_editar" id="input_file_editar"
                    onchange="vista_preliminar_editar(event)" />
                </div>
              </div>
              <!-- INPUT NOMBRE -->
              <div class="formulario__grupo" id="grupo__txt_nombre_editar_marca">
                <div class="formulario__grupo-input">
                  <input class="formulario__input" type="text" name="txt_nombre_editar_marca"
                    id="txt_nombre_editar_marca" required />
                  <span class="formulario__placeholder">Nombre de la Marca:*</span>
                </div>
              </div>
              <!-- INPUT ESTADO -->
              <div class="formulario__grupo" id="grupo__sel_estado_editar_marca">
                <div class="formulario__grupo-input">
                  <select class="formulario__input select" name="sel_estado_editar_marca" id="sel_estado_editar_marca"
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
          </div>
          <!-- MENSAJES DE ERROR -->
          <!-- MENSAJES DE ERROR -->
          <div class="mensajes_error_inputs">
            <!-- MENSAJE DE ERROR NOMBRE -->
            <div class="grupo__input-error" id="error__txt_nombre_editar_marca">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Marca"</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR IMAGEN -->
            <div class="grupo__input-error" id="error__txt_imagen_editar_marca">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> Por favor seleccione
                una
                <span class="nom_campo">Imagen.</span>
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_marca">
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
          <div class="btn_cancelar btn_click btn_cerrar_editar_marca">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL ELIMINAR MARCAS -->
    <!-- MODAL ELIMINAR MARCAS -->
    <!-- MODAL ELIMINAR MARCAS -->
    <div class="contenedor_modal_eliminar_marca">
      <form class="modal_eliminar_marca" action="{{ Route('EliminarMarcas') }}" method="POST">
        @csrf
        <input type="hidden" name="txt_marc_id_eliminar" id="txt_marc_id_eliminar">
        <div class="titulo_eliminar titulo">
          <span class="icono_nav icon-attention-1"></span>
          <p>Eliminar Marca</p>
        </div>
        <figure class="contenedro__img-eliminar">
          <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
        </figure>
        <span class="icon-attention"></span>
        <div class="mensaje__eliminar">
          Esta seguro que desea <span class="nom_campo">Eliminar</span> la
          siguiente Marca:
        </div>
        <div class="mensaje__info-eliminar">
          <ul>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Marca: </span>
              <span class="txt__enter-eliminar" id="text_marc_nombre">Ninguna</span>
            </li>
          </ul>
        </div>
        <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
        <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_marca">
          Cancelar
        </div>
      </form>
    </div>
  </div>



  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#menu_marcas").addClass("item_select");
      listElement();
      var z = 0;
      var table = $('#tabla_marca').DataTable({
        "ajax": "{{ route('AllMarcasUser') }}",
        "order": [[ 1, 'asc' ]],
        "columns": [{
            data: 'MARC_ID'
          },
          {
            data: 'MARC_NOMBRE'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
            <div class="contenedor_botones">
                              <div
                                class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_marca">
                                <span class="icon-edit-1" title="Editar"></span>
                              </div>
                              <div
                                class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_marca">
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
          "info": "Mostrando la pagina  _PAGE_ de _PAGES_",
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


      $('#tabla_marca tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_editar_marca(data)
      });
      $('#tabla_marca tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_eliminar_marca(data['MARC_ID'], data['MARC_NOMBRE'])
      });



    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_7_marcas.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
