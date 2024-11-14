@if (auth()->check())
    @include('Layouts.HeaderUser')

    <link rel="stylesheet" href="css/app_9_productos.css" />
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
        <!-- TABLA -->
        <!-- TABLA -->
        <!-- TABLA -->
        <form class="contenedor_tabla">
            <div class="tabla_titulo">
                <span class="icono_nav icon-group"></span>
                <p>Productos</p>
            </div>
            <div class="elementos_tabla">
                <div class="elementos_arriba">
                    <a href="{{ Route('RegistrarProductos') }}" class="titulo_btn_nuevo btn btn_click btn_nuevo">
                        <span class="icon-plus"></span>
                        <p>Nuevo Producto</p>
                    </a>
                </div>
                <div class="tabla">
                    <table id="tabla_productos" class="hover">
                        <thead>
                            <tr>
                                <th class="tamagnio1">No</th>
                                <th class="tamagnio5">Producto</th>
                                <th class="tamagnio3">Categoria</th>
                                <th class="tamagnio2">Estado</th>
                                <th class="tamagnio4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <!-- MODAL ELIMINAR OFERTA -->
    <!-- MODAL ELIMINAR OFERTA -->
    <!-- MODAL ELIMINAR OFERTA -->
    <div class="contenedor_modal_eliminar_productos">
        <form class="modal_eliminar_productos" action="{{ Route('EliminarProducto') }}" method="POST">
            @csrf
            <div class="titulo_eliminar titulo">
                <span class="icono_nav icon-attention-1"></span>
                <p>Eliminar Producto</p>
            </div>
            <figure class="contenedro__img-eliminar">
                <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
            </figure>
            <span class="icon-attention"></span>
            <div class="mensaje__eliminar">
                Esta seguro que desea
                <span class="nom_campo">Eliminar</span> el siguiente Producto:
            </div>
            <div class="mensaje__info-eliminar">
                <ul>
                    <li class="lista-info-eliminar">
                        <input type="hidden" name="txt_prod_id_eliminar" id="txt_prod_id_eliminar">
                        <span class="txt__negrita-eliminar">Producto: </span>
                        <span class="txt__enter-eliminar" id="txt_Prod_nombre">Ninguna</span>
                    </li>
                </ul>
            </div>
            <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
            <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_productos">
                Cancelar
            </div>
        </form>
    </div>
    <!-- TODO FIN DEL CONTENIDO -->

    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#menu_producto").addClass("item_select");
            listElement();
            var z = 0;
            var table = $('#tabla_productos').DataTable({
                "ajax": "{{ route('AllProductosUser') }}",
                "order": [
                    [1, 'asc']
                ],
                "columns": [{
                        data: 'PROD_ID'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return data.PROD_NOMBRE + " " + data.PROD_COMPLEMENTO;
                        }
                    },
                    {
                        data: 'CATE_NOMBRE'
                    },
                    //   {
                    //     data: 'SUBC_NOMBRE'
                    //   },
                    {
                        data: 'ESTA_TIPO'
                    },
                    {
                        "defaultContent": `
          <div class="contenedor_botones_tabla_productos">
                            <div
                              class="btn_accion-ver btn btn_click btn_accion btn_abrir_modal_ver">
                              <span class="icon-eye" title="Ver"></span>
                            </div>
                            <div
                              class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_marca">
                              <span class="icon-edit-1" title="Editar"></span>
                            </div>
                            <div
                              class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_productos">
                              <span class="icon-trash" title="Eliminar"></span>
                            </div>
                          </div>
                      `,
                        "className": "td_acciones_tabla_productos"
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


            $('#tabla_productos tbody').on('click', 'div.btn_abrir_modal_ver', function() {
                var data = table.row($(this).parents('tr')).data();
                window.location.href = "{{ route('VerProducto') }}?PROD_ID=" + data['PROD_ID'];
            });
            $('#tabla_productos tbody').on('click', 'div.btn_accion-editar', function() {
                var data = table.row($(this).parents('tr')).data();
                // abrir_editar_producto(data)
                window.location.href = "{{ route('RegistrarProductos') }}?PROD_ID=" + data['PROD_ID'] +
                    "&Tipo=Modificar";
            });
            $('#tabla_productos tbody').on('click', 'div.btn_accion-eliminar', function() {
                var data = table.row($(this).parents('tr')).data();
                abrir_modal_eliminar_productos(data)
            });
        });
    </script>
    <script src="js/Controller_app_modals.js"></script>
    <script src="js/app_9_productos.js"></script>
    </body>

    </html>
@else
    <p>No hay usuario logueado</p>
@endif
