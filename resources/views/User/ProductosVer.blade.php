@if (auth()->check())
  @include('Layouts.HeaderUser')

  <link rel="stylesheet" href="css/app_9_productos_ver.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
  <!-- TODO INICIO DEL CONTEDIO -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <!-- CONTENEDOR CONTEDIDO DERECHA -->
  <div class="contenedor_contenido_derecha">
    <!-- VER PRODUCTO -->
    <!-- VER PRODUCTO -->
    <!-- VER PRODUCTO -->
    <div class="contenedor_producto_ver">
      <!-- !TITULO -->
      <!-- !TITULO -->
      <div class="titulo_ver titulo">
        <span class="icono_nav icon-linode"></span>
        <p class="titulo_texto">Información del producto </p>
      </div>
      <div class="contenido_ver">
        <!-- !ILUSTRACION -->
        <!-- !ILUSTRACION -->
        <figure class="contenedro__img-ver">
          <img src="img/svg/undraw_advanced_customization_re_wo6h.svg" alt="Imagen guardado correctamente" />
        </figure>
        <!-- !NOMBRE DEL PRODUCTO -->
        <!-- !NOMBRE DEL PRODUCTO -->
        <!-- !NOMBRE DEL PRODUCTO -->
        <div class="contenedor_nombre_producto">
          <p id="nombre_producto">
            {{ $Producto->PROD_NOMBRE }}
            <span id="complemento_producto">{{ $Producto->PROD_COMPLEMENTO }}</span>
          </p>
        </div>
        <!-- !INFORMACION GENERAL DEL PRODUCTO -->
        <!-- !INFORMACION GENERAL DEL PRODUCTO -->
        <!-- !INFORMACION GENERAL DEL PRODUCTO -->
        <div class="fotos_producto">
          <div class="formulario__contenedor-nuevo">
            <!-- INFORMACION DEL PRODUCTO -->
            <!-- INFORMACION DEL PRODUCTO -->
            <div class="centro">
              <p class="establecer">Información del producto</p>
              <div class="mensaje__info-ver">
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Marca:</span>
                  <span class="txt__enter-ver">{{ $Producto->MARC_NOMBRE }}</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Categoría:</span>
                  <span class="txt__enter-ver">{{ $Producto->CATE_NOMBRE }}</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Subcategoría:</span>
                  <span class="txt__enter-ver">{{ $Producto->SUBC_NOMBRE }}</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Estado:</span>
                  <span class="txt__enter-ver">{{ $Producto->ESTA_TIPO }}</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Registro Invima:</span>
                  <span class="txt__enter-ver">{{ $Producto->PROD_REGISTROINVIMA }}</span>
                </div>
              </div>
            </div>
            <div class="lado_derecho">
              <!-- FOTO DE LA TABLA NUTRICIONAL -->
              <!-- FOTO DE LA TABLA NUTRICIONAL -->
              <p class="establecer">Tabla Nutricional</p>
              <figure class="contenedor_img-producto" id="contenedor_img_nutricional_nuevo_producto">
                <img class="img-producto" src="{{ $Nutricional }}" alt="Imagen tabla nutricional"
                  id="img_nutricional_nuevo_producto" />
              </figure>
            </div>
          </div>
        </div>
        <!-- !TABLA DE LAS PRESENTACIONES DEL PRODUCTO -->
        <!-- !TABLA DE LAS PRESENTACIONES DEL PRODUCTO -->
        <!-- !TABLA DE LAS PRESENTACIONES DEL PRODUCTO -->
        <div class="contenedor_tabla_presentaciones">
          <!-- TITULO TABLA PRESENTACIONES -->
          <!-- TITULO TABLA PRESENTACIONES -->
          <div class="titulo titulo_tabla_presentaciones">
            <span class="icono_nav icon-linode"></span>
            <p class="titulo_texto">Presentaciones Establecidas</p>
          </div>
          <!-- CONTENEDOR DE LA TABLA -->
          <!-- CONTENEDOR DE LA TABLA -->
          <form class="tabla_presentaciones">
            <table id="tabla_PresentacionProd" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio4">Presentacion</th>
                  <th class="tamanio2">Precio</th>
                  <th class="tamanio5">Sabor</th>
                  <th class="tamanio2">Stock min</th>
                  <th class="tamanio3">Estado</th>
                  <th class="tamanio2">Foto</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </form>
          <!-- !MODAL VER FOTO PRESENTACION O SABOR -->
          <!-- !MODAL VER FOTO PRESENTACION O SABOR -->
          <div class="contenedor_modal_ver_foto">
            <div class="modal_ver_foto">
              <!-- BOTON CERRAR -->
              <!-- BOTON CERRAR -->
              <span class="icon-cancel btn_cerrar_modal_ver_foto"></span>
              <!-- NOMBRE DE LA PRESENTACION O SABOR -->
              <!-- NOMBRE DE LA PRESENTACION O SABOR -->
              <div class="titulo_foto_presentacion titulo">
                <p>{{ $Producto->PROD_NOMBRE }} <span> {{ $Producto->PROD_COMPLEMENTO }}</span></p>
              </div>
              <!-- FOTO DE LA PRESENTACION O SABOR -->
              <!-- FOTO DE LA PRESENTACION O SABOR -->
              <figure class="contenedor_img-producto_foto">
                <img id="FotoPresentacion" class="img-producto_foto" src="" alt="Foto de la presentacion o sabor" />
              </figure>
            </div>
          </div>
        </div>
        <!-- !TABLA DE OBJETIVOS ESTABLECIDOS -->
        <!-- !TABLA DE OBJETIVOS ESTABLECIDOS -->
        <!-- !TABLA DE OBJETIVOS ESTABLECIDOS -->
        <div class="contenedor_tabla_objetivo">
          <!-- TITULO TABLA PRESENTACIONES -->
          <!-- TITULO TABLA PRESENTACIONES -->
          <div class="titulo titulo_tabla_objetivo">
            <span class="icono_nav icon-linode"></span>
            <p class="titulo_texto">Objetivos establecidos</p>
          </div>
          <!-- CONTENEDOR DE LA TABLA -->
          <!-- CONTENEDOR DE LA TABLA -->
          <form class="tabla_objetivo">
            <table id="tabla_objetivo_producto" class="hover">
              <thead>
                <tr>
                  <th class="tamanio_1">No</th>
                  <th class="tamanio_5">Objetivo</th>
                  <th class="tamanio_2">Estado</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </form>
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
        <!-- !BOTON DE ACEPTAR -->
        <!-- !BOTON DE ACEPTAR -->
        <a href="{{ Route('ProductosUser') }}" class="btn btn_click btn_atras">
          Atras
        </a>
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
          <p>{{ $Producto->PROD_NOMBRE }} <span> {{ $Producto->PROD_COMPLEMENTO }}</span></p>
        </div>
        <!-- FOTO DE LAS FOTOS RELACIONADAS -->
        <!-- FOTO DE LAS FOTOS RELACIONADAS -->
        <figure class="contenedor_img-producto_foto">
          <img id="FotoRelacionada" class="img-producto_foto" src="img/Agregar Fotos.png"
            alt="Foto producto relacionado" />
        </figure>
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
      $("#menu_producto").addClass("item_select");
      var z = 0;
      var table = $('#tabla_PresentacionProd').DataTable({
        "ajax": "{{ route('AllProductosPresentacionUser') }}?PROD_ID=" + {{ $PROD_ID }},
        "order": [
          [1, 'asc']
        ],
        "columns": [{
            data: 'GRSA_ID'
          },
          {
            data: 'UNME_MEDIDA'
          },
          {
            data: 'GRSA_PRECIO'
          },
          {
            data: 'SABO_DESCRIPCION'
          },
          {
            data: 'GRSA_STOCKMINIMO'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
            <div class="contenedor_botones">
                      <div class="btn_accion-ver btn btn_click btn_accion btn_abrir_modal_ver_foto">
                        <span class="icon-eye" title="Ver"></span>
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

      $('#tabla_PresentacionProd tbody').on('click', 'div.btn_abrir_modal_ver_foto', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_ver_foto(data)
      });

      var tableObjetivo = $('#tabla_objetivo_producto').DataTable({
        "ajax": "{{ route('AllProductosObjetivosUser') }}?PROD_ID=" + {{ $PROD_ID }},
        "order": [
          [1, 'asc']
        ],
        "columns": [{
            data: 'PROB_ID'
          },
          {
            data: 'OBJE_NOMBRE'
          },
          {
            data: 'ESTA_TIPO'
          },
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

      tableObjetivo.on('order.dt search.dt', function() {
        tableObjetivo.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();
    //
    var tableFotosRelacionadas = $('#tabla_fotosRelacionadas').DataTable({
      "ajax": "{{ route('AllProductosFotosUser') }}?PROD_ID=" + {{ $PROD_ID }},
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

    tableFotosRelacionadas.on('order.dt search.dt', function() {
      tableFotosRelacionadas.column(0, {
        search: 'applied',
        order: 'applied'
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();

    $('#tabla_fotosRelacionadas tbody').on('click', 'div.btn_abrir_modal_ver', function() {
      var data = tableFotosRelacionadas.row($(this).parents('tr')).data();
      abrir_modal_ver_fotoRelacionada(data);
    });

    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_9_productos_ver.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
