@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_8_objetivos.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />


  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <div class="contenedor_contenido_derecha">
    @if (session('message'))
      <input type="hidden" id="messageExito" value="{{ session('message') }}">
    @endif
    <!-- CONTENEDOR OBJETIVOS -->
    <!-- CONTENEDOR OBJETIVOS -->
    <!-- CONTENEDOR OBJETIVOS -->
    <div class="contenedor_objetivo">
      <div class="contenedor_titulo">
        <span class="icono_nav icon-linode"></span>
        <p>Objetivos</p>
      </div>
      <!-- CONTENIDO -->
      <!-- CONTENIDO -->
      <div class="elementos">
        <!-- ELEMENTOS DE NUEVO -->
        <!-- ELEMENTOS DE NUEVO -->
        <div class="contenedor_nuevo">
          <div class="titulo titulo_nuevo">
            <span class="icono_nav icon-plus"></span>
            <p>Nuevo Objetivo</p>
          </div>
          <figure class="contenedro__imgElementos">
            <img src="img/svg/undraw_complete_design_re_h75h.svg" alt="Imagen Objetivos">
          </figure>
          <form action="{{ Route('RegistrarObjetivos') }}" method="POST" class="formulario"
            id="formulario_nuevo_objetivo">
            @csrf
            <!-- INPUTS -->
            <!-- INPUTS -->
            <div class="formulario__contenedor-nuevo">
              <!-- INPUT NOMBRE -->
              <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_objetivo">
                <div class="formulario__grupo-input">
                  <input autofocus class="formulario__input" type="text" name="txt_nombre_nuevo_objetivo"
                    id="txt_nombre_nuevo_objetivo" required />
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
              <div class="grupo__input-error" id="error__txt_nombre_nuevo_objetivo">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> El campo
                  <span class="nom_campo">"Objetivo"</span> debe contener
                  caracteres alfabeticos, maximo 30 caracteres.
                </p>
              </div>
              <div class="grupo__input-error" id="error__sel_estado_nuevo_objetivo">
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
            <p>Tabla de Objetivos</p>
          </div>
          <form class="tabla">
            <table id="tabla_objetivo" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio5">Objetivo</th>
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
        <form action="{{ Route('ModificarObjetivos') }}" method="POST" class="formulario"
          id="formulario_editar_objetivo">
          <!-- INPUTS -->
          <!-- INPUTS -->
          @csrf
          <input type="hidden" id="txt_obje_id_editar" name="txt_obje_id_editar">
          <div class="formulario__contenedor-editar">
            <!-- INPUT NOMBRE -->
            <div class="formulario__grupo" id="grupo__txt_nombre_editar_objetivo">
              <div class="formulario__grupo-input">
                <input autofocus class="formulario__input" type="text" name="txt_nombre_editar_objetivo"
                  id="txt_nombre_editar_objetivo" required />
                <span class="formulario__placeholder">Objetivo:*</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_editar_objetivo">
              <div class="formulario__grupo-input">
                <select class="formulario__input select" name="sel_estado_editar_objetivo"
                  id="sel_estado_editar_objetivo" required>
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
            <div class="grupo__input-error" id="error__txt_nombre_editar_objetivo">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Objetivo"</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_objetivo">
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
          <div class="btn_cancelar btn_click btn_cerrar_editar_objetivo">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL ELIMINAR OBJETIVOS -->
    <!-- MODAL ELIMINAR OBJETIVOS -->
    <!-- MODAL ELIMINAR OBJETIVOS -->
    <div class="contenedor_modal_eliminar_objetivo">
      <form class="modal_eliminar_objetivo"  action="{{ Route('EliminarObjetivos') }}" method="POST">
        @csrf
        <div class="titulo_eliminar titulo">
          <span class="icono_nav icon-attention-1"></span>
          <p>Eliminar Objetivo</p>
        </div>
        <figure class="contenedro__img-eliminar">
          <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
        </figure>
        <span class="icon-attention"></span>
        <div class="mensaje__eliminar">
          Esta seguro que desea <span class="nom_campo">Eliminar</span> la
          siguiente Objetivo:
        </div>
        <div class="mensaje__info-eliminar">
          <ul>
            <li class="lista-info-eliminar">
              <input type="hidden" name="txt_obje_id_eliminar" id="txt_obje_id_eliminar">
              <span class="txt__negrita-eliminar">Objetivo: </span>
              <span class="txt__enter-eliminar" id="text_obje_nombre">Ninguno</span>
            </li>
          </ul>
        </div>
        <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
        <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_objetivo">
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
      $("#menu_objetivo").addClass("item_select");
      var z = 0;
      var table = $('#tabla_objetivo').DataTable({
        "ajax": "{{ route('AllObjetivosUser') }}",
        "order": [[ 1, 'asc' ]],
        "columns": [{
            data: 'OBJE_ID'
          },
          {
            data: 'OBJE_NOMBRE'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
          <div class="contenedor_botones">
                            <div
                              class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_objetivo">
                              <span class="icon-edit-1" title="Editar"></span>
                            </div>
                            <div
                              class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_objetivo">
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
          "info": "Mostrando la pagina _PAGE_ de _PAGES_",
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


      $('#tabla_objetivo tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_editar_objetivo(data)
      });
      $('#tabla_objetivo tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_eliminar_objetivo(data)
      });


    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_8_objetivos.js"></script>
  </body>

  </html>

@else
  <p>No hay usuario logueado</p>
@endif
