@if (auth()->check())
  @include('Layouts.HeaderUser')
  <link rel="stylesheet" href="css/app_19_banner_tabla.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

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
        <div class="titulo titulo_nuevo">
          <span class="icono_nav icon-picture"></span>
          <p>Producto Estrella</p>
        </div>
        <figure class="contenedro__imgElementos">
          <img src="img/svg/undraw_image_viewer_re_7ejc.svg" alt="Imagen Banner" />
        </figure>
        <!-- ELEMENTOS DE LA TABLA -->
        <!-- ELEMENTOS DE LA TABLA -->
        <div class="contenedor_tabla">
          <div class="titulo titulo_tabla">
            <span class="icono_nav icon-"></span>
            <p>Tabla de Banner</p>
          </div>
          <!-- BOTON NUEVO BANNER -->
          <!-- BOTON NUEVO BANNER -->
          <div class="elementos_arriba">
            <a href="{{ Route('RegistrarBannerOfertas') }}" class="titulo_btn_nuevo btn btn_click btn_nuevo">
              <span class="icon-plus"></span>
              <p>Nuevo Banner</p>
            </a>
          </div>
          <form class="tabla">
            <table id="tabla_bannerOfertas" class="hover">
              <thead>
                <tr>
                  <th class="tamanio1">No</th>
                  <th class="tamanio2">Producto</th>
                  <th class="tamanio3">Presentación</th>
                  <th class="tamanio4">Dto</th>
                  <th class="tamanio5">Imagen Deportiva</th>
                  <th class="tamanio6">Estado</th>
                  <th class="tamanio7">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </form>
        </div>
        <!-- MODAL VER BANNER -->
        <!-- MODAL VER BANNER -->
        <!-- MODAL VER BANNER -->
        <div class="contenedor_modal_ver_banner">
          <div class="modal_ver_banner">
            <!-- TITULO DEL MODAL -->
            <div class="titulo titulo_banner">
              <span class="icono_nav icon-picture"></span>
              <p>Producto Estrella</p>
            </div>
            <!-- INFORMACION DEL PRODUCTO -->
            <!-- INFORMACION DEL PRODUCTO -->
            <div class="centro">
              <div class="mensaje__info-ver">
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Producto:</span>
                  <span class="txt__enter-ver" id="Nom_producto">Ninguno</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Presentacion:</span>
                  <span class="txt__enter-ver" id="Nom_presentacion">Ninguno</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Nombre Img deportiva:</span>
                  <span class="txt__enter-ver" id="Nom_imagen">Ninguno</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Descuento:</span>
                  <span class="txt__enter-ver" id="Descuento">Ninguno</span>
                </div>
                <div class="lista-info-ver">
                  <span class="txt__negrita-ver">Estado:</span>
                  <span class="txt__enter-ver" id="Estado">Ninguno</span>
                </div>
              </div>
            </div>
            <!-- ELEMENTOS DEL BANNER -->
            <!-- ELEMENTOS DEL BANNER -->
            <div class="contenedor-banner">
              <div class="banner">
                <div class="banner__contenedor-sliders" id="slider">
                  <!-- BANNER 1 -->
                  <div class="banner__contenido" id="banner1">
                    <div class="banner__producto">
                      <img src="img/productos/super-mass-gainer.png" alt="Imagen del producto"
                        class="banner__producto-img" id="Img_producto" />
                    </div>
                    <div class="banner__blanco">
                      <div class="banner__marca">
                        <img src="img/marcas/dymatize-Nutrition.png" alt="Logo de la marca" class="banner__marca-img" id="Img_marca"/>
                      </div>
                      <div class="banner__logo">
                        <img src="img/logo_baja_calidad.png" alt="Logo Military Fitns" class="banner__logo-img"/>
                      </div>
                    </div>
                    <div class="banner__verde">
                      <div class="banner__info-producto">
                        <div class="banner_nombre-producto">
                          <span id="Nombre_producto">Ninguno</span>
                          <span class="segunda-mitad-nombre" id="Nombre_complemento">mas gainer</span>
                        </div>
                        <div class="banner__dto">
                          <p class="banner__dto-numero" id="Descuento_ver">0</p>
                          <p class="banner__dto-signo">%</p>
                          <p class="banner__dto-abrev">Dto.</p>
                        </div>
                        {{-- <a href="#" class="banner__btn-comprar">mas información</a> --}}
                      </div>
                      <div class="banner__foto">
                        <img src="img/banner/klipartz.com(1).png" alt="Foto Fisico-culturista"
                          class="banner__foto-img" id="Img_deportiva"/>
                      </div>
                    </div>
                  </div>
                  <!-- BANNER 2 -->
                  <div class="banner__contenido" id="banner2">
                    <div class="banner__producto">
                      <img src="img/productos/super-mass-gainer.png" alt="Imagen del producto"
                        class="banner__producto-img" id="Img_producto_1"/>
                    </div>
                    <div class="banner__blanco">
                      <div class="banner__marca">
                        <img src="img/marcas/dymatize-Nutrition.png" alt="Logo de la marca" class="banner__marca-img" id="Img_marca_1"/>
                      </div>
                      <div class="banner__logo">
                        <img src="img/logo_baja_calidad.png" alt="Logo Military Fitns" class="banner__logo-img"/>
                      </div>
                    </div>
                    <div class="banner__verde">
                      <div class="banner__info-producto">
                        <div class="banner_nombre-producto">
                          <span id="Nombre_producto_1">Ninguno</span>
                          <span class="segunda-mitad-nombre" id="Nombre_complemento_1">mas gainer</span>
                        </div>
                        <div class="banner__dto">
                          <p class="banner__dto-numero" id="Descuento_ver_1">0</p>
                          <p class="banner__dto-signo">%</p>
                          <p class="banner__dto-abrev">Dto.</p>
                        </div>
                        {{-- <a href="#" class="banner__btn-comprar">mas información</a> --}}
                      </div>
                      <div class="banner__foto">
                        <img src="img/banner/klipartz.com(1).png" alt="Foto Fisico-culturista"
                          class="banner__foto-img" id="Img_deportiva_1"/>
                      </div>
                    </div>
                  </div>
                  <!-- BANNER 3 -->
                  <div class="banner__contenido" id="banner3">
                    <div class="banner__producto">
                      <img src="img/productos/super-mass-gainer.png" alt="Imagen del producto"
                        class="banner__producto-img" id="Img_producto_2"/>
                    </div>
                    <div class="banner__blanco">
                      <div class="banner__marca">
                        <img src="img/marcas/dymatize-Nutrition.png" alt="Logo de la marca" class="banner__marca-img" id="Img_marca_2"/>
                      </div>
                      <div class="banner__logo">
                        <img src="img/logo_baja_calidad.png" alt="Logo Military Fitns" class="banner__logo-img" />
                      </div>
                    </div>
                    <div class="banner__verde">
                      <div class="banner__info-producto">
                        <div class="banner_nombre-producto">
                          <span id="Nombre_producto_2">Ninguno</span>
                          <span class="segunda-mitad-nombre" id="Nombre_complemento_2">mas gainer</span>
                        </div>
                        <div class="banner__dto">
                          <p class="banner__dto-numero" id="Descuento_ver_2">0</p>
                          <p class="banner__dto-signo">%</p>
                          <p class="banner__dto-abrev">Dto.</p>
                        </div>
                        {{-- <a href="#" class="banner__btn-comprar">mas información</a> --}}
                      </div>
                      <div class="banner__foto">
                        <img src="img/banner/klipartz.com(1).png" alt="Foto Fisico-culturista"
                          class="banner__foto-img" id="Img_deportiva_2"/>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- BOTONES DEL CARRUSEL -->
                <div class="banner__btn-carrusel">
                  <div class="banner__contenedor__btn-carrusel">
                    <div class="btn-carrusel">
                      <span class="icon-left-open" id="btn_izquierdo"></span>
                    </div>
                    <div class="btn-carrusel">
                      <span class="icon-right-open" id="btn_derecho"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- BOTON ATRAS -->
            <!-- BOTON ATRAS -->
            <input class="btn btn_click btn_atras btn_cerrar_modal_ver_banner" type="button" value="Atras" />
          </div>
        </div>
        <!-- MODAL ELIMINAR BANNER -->
        <!-- MODAL ELIMINAR BANNER -->
        <!-- MODAL ELIMINAR BANNER -->
        <div class="contenedor_modal_eliminar_banner">
          <form class="modal_eliminar_banner" action="{{ Route('EliminarBannerOferta') }}" method="POST">
            @csrf
            <div class="titulo_eliminar titulo">
              <span class="icono_nav icon-attention-1"></span>
              <p>Eliminar Banner</p>
            </div>
            <figure class="contenedro__img-eliminar">
              <img src="img/svg/undraw_throw_away_re_x60k.svg" alt="Imagen guardado correctamente" />
            </figure>
            <span class="icon-attention"></span>
            <div class="mensaje__eliminar">
              Esta seguro que desea
              <span class="nom_campo">Eliminar</span> el siguiente Banner:
            </div>
            <div class="mensaje__info-eliminar">
              <input type="hidden" name="txt_bann_id_eliminar" id="txt_bann_id_eliminar">
              <ul>
                <li class="lista-info-eliminar">
                  <span class="txt__negrita-eliminar">Banner: </span>
                  <span class="txt__enter-eliminar" id="txt_bann_nombre">Ninguno</span>
                </li>
              </ul>
            </div>
            <input class="btn btn_click btn_eliminacion" type="submit" value="Si, eliminar" />
            <div class="btn_cancelar_eliminar btn_click btn_cerrar_modal_eliminar_banner">
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
      var table = $('#tabla_bannerOfertas').DataTable({
        "ajax": "{{ route('AllBannerOfertasUser') }}",
        "order": [
          [1, 'asc']
        ],
        "columns": [{
            data: 'BANN_ID'
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
            data: 'IMAG_NOMBRE'
          },
          {
            data: 'ESTA_TIPO'
          },
          {
            "defaultContent": `
                    <div class="contenedor_botones">
                      <div class="btn_accion-ver btn btn_click btn_accion btn_abrir_modal_ver_banner">
                        <span class="icon-eye" title="Ver"></span>
                      </div>
                      <div class="btn_accion-editar btn btn_click btn_accion btn_abrir_modal_editar_banner">
                        <span class="icon-edit-1" title="Editar"></span>
                      </div>
                      <div class="btn_accion-eliminar btn btn_click btn_accion btn_abrir_modal_eliminar_banner">
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

      $('#tabla_bannerOfertas tbody').on('click', 'div.btn_accion-ver', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_ver_banner(data)
      });

      $('#tabla_bannerOfertas tbody').on('click', 'div.btn_accion-editar', function() {
        var data = table.row($(this).parents('tr')).data();
        window.location.href = "{{ route('RegistrarBannerOfertas') }}?BANN_ID=" + data['BANN_ID'] +
          "&Tipo=Modificar";
      });
      $('#tabla_bannerOfertas tbody').on('click', 'div.btn_accion-eliminar', function() {
        var data = table.row($(this).parents('tr')).data();
        abrir_modal_eliminar_banner(data)
      });



    });
  </script>
  <script src="js/Controller_app_modals.js"></script>
  <script src="js/app_19_banner_tabla.js"></script>
  </body>

  </html>
@else
  <p>No hay usuario logueado</p>
@endif
