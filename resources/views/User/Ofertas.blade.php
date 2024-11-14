@if (auth()->check())
  @include('Layouts.HeaderUser')
  <link rel="stylesheet" href="css/app_17_ofertas_tabla.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->

  @if (session('message'))
    <input type="hidden" id="messageExito" value="{{ session('message') }}">
  @endif
  @if (session('MsgErrorSistema'))
    <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
  @endif
  <div class="contenedor_contenido_derecha">
    <!-- CONTENEDOR OFERTA -->
    <!-- CONTENEDOR OFERTA -->
    <!-- CONTENEDOR OFERTA -->
    <div class="contenedor_ofertas">
      <div class="contenedor_titulo">
        <span class="icono_nav icon-money-1"></span>
        <p>Ofertas</p>
      </div>
      <!-- ELEMENTOS DE NUEVO -->
      <!-- ELEMENTOS DE NUEVO -->
      <div class="contenedor_nuevo">
        <div class="titulo titulo_nuevo">
          <span class="icono_nav icon-money-1"></span>
          <p>Productos Ofertados</p>
        </div>
        <figure class="contenedro__imgElementos">
          <img src="img/svg/undraw_discount_d-4-bd.svg" alt="Imagen Oferta" />
        </figure>
        <div class="contenedor_tabla">
          <div class="titulo titulo_tabla">
            <span class="icono_nav icon-"></span>
            <p>Tabla de Ofertas</p>
          </div>
          <!-- BOTON NUEVA OFERTA -->
          <!-- BOTON NUEVA OFERTA -->
          <div class="elementos_arriba">
            <a href="{{ Route('RegistrarOfertas') }}" class="titulo_btn_nuevo btn btn_click btn_nuevo">
              <span class="icon-plus"></span>
              <p>Nueva Oferta</p>
            </a>
          </div>
          <form class="tabla">
            <table id="tabla_ofertas" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio2">Producto</th>
                  <th class="tamanio3">Presentación</th>
                  <th class="tamanio4">Dto</th>
                  <th class="tamanio5">Precio Actual</th>
                  <th class="tamanio6">Precio con Oferta</th>
                  <th class="tamanio7">Fecha Final</th>
                  <th class="tamanio8">Estado</th>
                  <th class="tamanio9">Acciones</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </form>
        </div>
        <!-- MODAL ELIMINAR OFERTA -->
        <!-- MODAL ELIMINAR OFERTA -->
        <!-- MODAL ELIMINAR OFERTA -->
        <div class="contenedor_modal_eliminar_ofertas">
          <form class="modal_eliminar_ofertas" action="{{ Route('EliminarOferta') }}" method="POST">
            @csrf
            <div class="titulo_eliminar titulo">
              <span class="icono_nav icon-attention-1"></span>
              <p>Eliminar Oferta</p>
            </div>
            <figure class="contenedro__img-eliminar">
              <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
            </figure>
            <span class="icon-attention"></span>
            <div class="mensaje__eliminar">
              Esta seguro que desea
              <span class="nom_campo">Eliminar</span> la siguiente Oferta:
            </div>
            <div class="mensaje__info-eliminar">
              <ul>
                <li class="lista-info-eliminar">
                  <input type="hidden" name="txt_ofer_id_eliminar" id="txt_ofer_id_eliminar">
                  <span class="txt__negrita-eliminar">Oferta: </span>
                  <span class="txt__enter-eliminar" id="txt_ofer_nombre">Ninguna</span>
                </li>
              </ul>
            </div>
            <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
            <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_ofertas">
              Cancelar
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- TODO FIN DEL CONTENIDO -->

  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#menu_Ofertas").addClass("item_select");
      var z = 0;
      var table = $('#tabla_ofertas').DataTable({
        "ajax": "{{ route('AllOfertasUser') }}",
        "order": [
          [1, 'asc']
        ],
        "columns": [{
            data: 'OFER_ID'
          },
          {
            data: null,
                        render: function(data, type, row) {
                            return data.PROD_NOMBRE + " " + data.COMPLEMENTO;
                        }
          },
          {
            data: 'UNME_MEDIDA'
          },
          {
            data: null,
            render: function(data, type, row) {
              return data.OFER_DESCUENTO + "%";
            }
          },
          {
            data: 'GRSA_PRECIO'
          },
          {
            data: 'DESCUENTO'
          },
          {
            data: 'OFER_FECHAFIN'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
                    <div class="contenedor_botones">
                      <div class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_ofertas">
                        <span class="icon-edit-1" title="Editar"></span>
                      </div>
                      <div class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_ofertas">
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


      $('#tabla_ofertas tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        window.location.href = "{{ route('RegistrarOfertas') }}?OFER_ID=" + data['OFER_ID'] +
          "&Tipo=Modificar";
      });
      $('#tabla_ofertas tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_eliminar_ofertas(data)
      });



    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_17_ofertas_tabla.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
