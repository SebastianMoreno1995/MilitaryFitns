@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_5_sabores.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
  {{-- <link rel="stylesheet" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}" /> --}}
  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <div class="contenedor_contenido_derecha">
    @if (session('message'))
      <input type="hidden" id="messageExito" value="{{ session('message') }}">
    @endif
    <!-- CONTENEDOR SABORES -->
    <!-- CONTENEDOR SABORES -->
    <!-- CONTENEDOR SABORES -->
    <div class="contenedor_sabores">
      <div class="contenedor_titulo">
        <span class="icono_nav icon-linode"></span>
        <p>Sabores</p>
      </div>
      <!-- CONTENIDO -->
      <!-- CONTENIDO -->
      <div class="elementos">
        <!-- ELEMENTOS DE NUEVO -->
        <!-- ELEMENTOS DE NUEVO -->
        <div class="contenedor_nuevo">
          <div class="titulo titulo_nuevo">
            <span class="icono_nav icon-plus"></span>
            <p>Nuevo Sabor</p>
          </div>
          <figure class="contenedro__imgElementos">
            <img src="img/svg/undraw_tasting_re_fv9d.svg" alt="Imagen sabores">
          </figure>
          <form action="{{ Route('RegistrarSabores') }}" method="POST" class="formulario"
            id="formulario_nuevo_sabor">
            @csrf
            <!-- INPUTS -->
            <!-- INPUTS -->
            <div class="formulario__contenedor-nuevo">
              <!-- INPUT SABOR -->
              <div class="formulario__grupo" id="grupo__txt_nombre_nuevo_sabor">
                <div class="formulario__grupo-input">
                  <input autofocus class="formulario__input" type="text" name="txt_nombre_nuevo_sabor" id="txt_nombre_nuevo_sabor"
                    required />
                  <span class="formulario__placeholder">Sabor:*</span>
                </div>
              </div>
              <!-- INPUT ESTADO -->
              <div class="formulario__grupo" id="grupo__sel_estado_nuevo_sabor">
                <div class="formulario__grupo-input">
                  <select class="formulario__input" name="sel_estado_nuevo_sabor" id="sel_estado_nuevo_sabor" required>
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
              <div class="grupo__input-error" id="error__txt_nombre_nuevo_sabor">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> El campo
                  <span class="nom_campo">"Sabor"</span> debe contener
                  caracteres alfabeticos, maximo 30 caracteres.
                </p>
              </div>
              <div class="grupo__input-error" id="error__sel_estado_nuevo_sabor">
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
            <p>Tabla de Sabores</p>
          </div>
          <form class="tabla">
            <table id="tabla_sabores" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio5">Sabor</th>
                  <th class="tamanio2">Estado</th>
                  <th class="tamanio4">Acciones</th>
                </tr>
              </thead>

            </table>
          </form>
        </div>
      </div>
    </div>
    <!-- MODAL EDITAR sabor -->
    <!-- MODAL EDITAR sabor -->
    <!-- MODAL EDITAR sabor -->
    <div class="contenedor_modal_editar_sabor">
      <div class="modal_editar_sabor">
        <!-- TITULO -->
        <!-- TITULO -->
        <div class="titulo_editar titulo">
          <span class="icon-linode"></span>
          <p>Editar Sabor</p>
        </div>
        <!-- ILUSTRACION -->
        <!-- ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_tasting_re_fv9d verde.svg" alt="Imagen Editar" />
        </figure>
        <!-- FORMULARIO -->
        <!-- FORMULARIO -->
        <form action="{{ Route('ModificarSabores') }}" method="POST" class="formulario"
          id="formulario_editar_sabor">
          @csrf
          <input type="hidden" id="txt_sabo_id_editar" name="txt_sabo_id_editar">
          <!-- INPUTS -->
          <!-- INPUTS -->
          <div class="formulario__contenedor-editar">
            <!-- INPUT NOMBRE -->
            <div class="formulario__grupo" id="grupo__txt_nombre_editar_sabor">
              <div class="formulario__grupo-input">
                <input autofocus class="formulario__input" type="text" name="txt_nombre_editar_sabor" id="txt_nombre_editar_sabor"
                  required />
                <span class="formulario__placeholder">Sabor:*</span>
              </div>
            </div>
            <!-- INPUT ESTADO -->
            <div class="formulario__grupo" id="grupo__sel_estado_editar_sabor">
              <div class="formulario__grupo-input">
                <select class="formulario__input select" name="sel_estado_editar_sabor" id="sel_estado_editar_sabor"
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
            <div class="grupo__input-error" id="error__txt_nombre_editar_sabor">
              <p class="formulario__input-error-abajo">
                <span class="icon-attention"></span> El campo
                <span class="nom_campo">"Sabor"</span> puede
                contener caracteres alfanumericos.
              </p>
            </div>
            <!-- MENSAJE DE ERROR ESTADO -->
            <div class="grupo__input-error" id="error__sel_estado_editar_sabor">
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
          <div class="btn_cancelar btn_click btn_cerrar_editar_sabor">
            Cancelar
          </div>
        </form>
      </div>
    </div>
    <!-- MODAL ELIMINAR SABOR -->
    <!-- MODAL ELIMINAR SABOR -->
    <!-- MODAL ELIMINAR SABOR -->
    <div class="contenedor_modal_eliminar_sabor">
      <form class="modal_eliminar_sabor" action="{{ Route('EliminarSabores') }}" method="POST">
        @csrf
        <input type="hidden" id="txt_sabo_id_eliminar" name="txt_sabo_id_eliminar">
        <div class="titulo_eliminar titulo">
          <span class="icono_nav icon-attention-1"></span>
          <p>Eliminar Sabor</p>
        </div>
        <figure class="contenedro__img-eliminar">
          <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
        </figure>
        <span class="icon-attention"></span>
        <div class="mensaje__eliminar">
          Esta seguro que desea <span class="nom_campo">Eliminar</span> el
          siguiente sabor:
        </div>
        <div class="mensaje__info-eliminar">
          <ul>
            <li class="lista-info-eliminar">
              <span class="txt__negrita-eliminar">Sabor: </span>
              <span class="txt__enter-eliminar" id="text_Sabor_Nombre">Ninguno</span>
            </li>
          </ul>
        </div>
        <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
        <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_sabor">
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
      $("#menu_sabores").addClass("item_select");
      var z = 0;
      var table = $('#tabla_sabores').DataTable({
        "ajax": "{{ route('AllSaboresUser') }}",
        "order": [[ 1, 'asc' ]],
        "columns": [{
            data: 'SABO_ID'
          },
          {
            data: 'SABO_DESCRIPCION'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
            <div class="contenedor_botones">
                              <div
                                class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_sabor">
                                <span class="icon-edit-1" title="Editar"></span>
                              </div>
                              <div
                                class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_sabor">
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

      $('#tabla_sabores tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_editar_sabor(data['SABO_ID'], data['SABO_DESCRIPCION'], data['ESTADO_ESTA_ID'])
      });
      $('#tabla_sabores tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_eliminar_sabor(data['SABO_ID'], data['SABO_DESCRIPCION'])
      });


    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_5_sabores.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif