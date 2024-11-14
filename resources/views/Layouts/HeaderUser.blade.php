<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Military Fitns</title>
  <link rel="icon" type="image" href="img/estrella.png" />
  <link rel="stylesheet" href="css/app_0_estilos_aplicacion.css" />
  <link rel="stylesheet" href="css/app_0_estilos_generales.css" />
  <link rel="stylesheet" href="css/fontello.css" />
  <link rel="stylesheet" href="css/normalize.css" />
</head>

<body>
  <div class="contenedor">
    <!-- BARRA DE NAVEGACION IZQUIERDA -->
    <!-- BARRA DE NAVEGACION IZQUIERDA -->
    <!-- BARRA DE NAVEGACION IZQUIERDA -->
    <div class="contenedor_navegacion">
      <div class="dashboard_nombre">
        <span class="" id="icon-menu">
          <div class="hamburger" id="hamburger">
            <button class="hamburger__button">
              <span class="hamburger__span top-line"></span>
              <span class="hamburger__span middle-line"></span>
              <span class="hamburger__span bottom-line"></span>
            </button>
          </div>
        </span>
        <p class="nombre">Military Fints</p>
      </div>
      <div class="dashboard_navegacion active" id="menuDesplegable">
        <nav class="nav">
          <ul class="list">
            {{-- MENU DASHBOARD --}}
            <li class="list_item" id="menu_dashboard">
              <a class="list_btn" href="{{ Route('Dashboard') }}">
                <span class="icono_nav icon-fort-awesome"></span>
                <p>Dashboard</p>
              </a>
            </li>
            {{-- MENU PRODUCTOS --}}
            <li class="list_item list_item--click">
              <a class="list_btn list_btn--clik" href="#">
                <span class="icono_nav icon-linode"></span>
                <p>Productos</p>
                <span class="icon-angle-right"></span>
              </a>
              <ul class="list_show">
                {{-- SUBMENU CATEGORIAS --}}
                <li class="list_inside" id="">
                  <a class="nav_link nav_link--inside" href="{{ Route('CategoriaUser') }}">
                    <p>Categorias</p>
                  </a>
                </li>
                {{-- SUBMENU MARCAS --}}
                <li class="list_inside" id="menu_marcas">
                  <a class="nav_link nav_link--inside" href="{{ Route('MarcasUser') }}">
                    <p>Marcas</p>
                  </a>
                </li>
                {{-- SUBMENU SABORES --}}
                <li class="list_inside" id="menu_sabores">
                  <a class="nav_link nav_link--inside" href="{{ Route('SaboresUser') }}">
                    <p>Sabores</p>
                  </a>
                </li>
                {{-- SUBMENU PRESENTACIONES --}}
                <li class="list_inside" id="menu_presentacion">
                  <a class="nav_link nav_link--inside" href="{{ Route('PresentacionUser') }}">
                    <p>Presentaciones</p>
                  </a>
                </li>
                {{-- SUBMENU OBJETIVOS --}}
                <li class="list_inside" id="menu_objetivo">
                  <a class="nav_link nav_link--inside" href="{{ Route('ObjetivosUser') }}">
                    <p>Objetivos</p>
                  </a>
                </li>
                {{-- SUBMENU PRODUCTOS --}}
                <li class="list_inside" id="menu_producto">
                  <a class="nav_link nav_link--inside" href="{{ Route('ProductosUser') }}">
                    <p>Productos</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- MENU OFERTAS --}}
            <li class="list_item">
              <a class="list_btn" href="{{ Route('OfertasUser') }}">
                <span class="icono_nav icon-money-1"></span>
                <p>Ofertas</p>
              </a>
            </li>
            {{-- MENU BANNER OFERTAS --}}
            <li class="list_item list_item--click">
              <a class="list_btn list_btn--clik" href="#">
                <span class="icono_nav icon-picture"></span>
                <p>Banner&nbspOfertas</p>
                <span class="icon-angle-right"></span>
              </a>
              <ul class="list_show">
                {{-- SUBMENU BANNER FOTOS --}}
                <li class="list_inside" id="menu_fotosBanner">
                  <a class="nav_link nav_link--inside" href="{{ Route('FotosBannerUser') }}">
                    <p>Fotos Banner</p>
                  </a>
                </li>
                {{-- SUBMENU BANNER --}}
                <li class="list_inside" id="menu_banner">
                  <a class="nav_link nav_link--inside" href="{{ Route('OfertasBannerUser') }}">
                    <p>Banner</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- MENU PROVEEDORES --}}
            <li class="list_item" id="menu_proveedor">
              <a class="list_btn" href="{{ Route('ProveedorUser') }}">
                <span class="icono_nav icon-truck"></span>
                <p>Proveedores</p>
              </a>
            </li>
            {{-- MENU COMPRAS --}}
            <li class="list_item">
              <a class="list_btn" href="{{ Route('ComprasUser') }}">
                <span class="icono_nav icon-cart-plus"></span>
                <p>Compras</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-money"></span>
                <p>Ventas</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-truck-1"></span>
                <p>Pedidos</p>
              </a>
            </li>
            <li class="list_item list_item--click">
              <a class="list_btn list_btn--clik" href="#">
                <span class="icono_nav icon-linode"></span>
                <p>Popups</p>
                <span class="icon-angle-right"></span>
              </a>
              <ul class="list_show">
                <li class="list_inside">
                  <a class="nav_link nav_link--inside btn_abrir_popup_exito" href="#">
                    <p>Popup Exito</p>
                  </a>
                </li>
                <li class="list_inside">
                  <a class="nav_link nav_link--inside btn_abrir_popup_error" href="#">
                    <p>Popup Error</p>
                  </a>
                </li>
                <li class="list_inside">
                  <a class="nav_link nav_link--inside btn_abrir_popup_error_sistema" href="#">
                    <p>Popup Error Sistema</p>
                  </a>
                </li>
                <li class="list_inside">
                  <a class="nav_link nav_link--inside btn_abrir_modal_actualizarPerfil" href="#">
                    <p>Popup Actualizar Perfil</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-th"></span>
                <p>Inventario</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-chart-line"></span>
                <p>Reportes</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-group"></span>
                <p>Clientes</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-users-2"></span>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-user"></span>
                <p>Roles</p>
              </a>
            </li>
            <li class="list_item">
              <a class="list_btn" href="#">
                <span class="icono_nav icon-cogs"></span>
                <p>Configuración</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="contenido_derecha">
      <!-- BARRA DE NAVEGACION SUPERIOR -->
      <!-- BARRA DE NAVEGACION SUPERIOR -->
      <!-- BARRA DE NAVEGACION SUPERIOR -->
      <div class="contenedor_navbar">
        <div class="navbar_izquierda">
          <a class="contenedor_logo" href="{{ Route('Tienda') }}" target="_blank">
            <img class="logo" src="img/logo_baja_calidad.png" alt="Logo Military Fitns" />
          </a>
          <span class="paginas">
            Pagina /
            <p class="pagina">Dashboard</p>
          </span>
        </div>
        <div class="navbar_derecha">
          <input class="buscar" type="search" name="" id="" placeholder="Buscar..." />
          <span class="icono-navbar icon-search-2 " title="Realizar busqueda"></span>
          <span class="icono-navbar icon-cog-3 " title="Configuraciones"></span>
          <span class="icono-navbar icon-bell-alt btn_abrir_popup_notificaciones" title="Notificaciones"></span>
          <figure class="contenedor_avatar btn_abrir_popup_usuario" title="Usuario">
            @if (auth()->check())
              <img class="avatar" src="{{ auth()->user()->USUA_FOTO }}" alt="" />
            @else
              <img class="avatar" src="img/avatar/usuario_uno.png" alt="" />
            @endif
          </figure>
        </div>
      </div>
      <!-- POPUP NOTIFICACIONES -->
      <!-- POPUP NOTIFICACIONES -->
      <!-- POPUP NOTIFICACIONES -->
      <div class="contenedor_popup_notificaciones">
        <div class="popup_notificaciones cerrar_popup_notificaciones">
          <div class="icono_titulo">
            <span class="icono-navbar icon-bell-alt"></span>
            <p>Notificaciones</p>
            <br />
          </div>
          <div class="contenedor_notificaciones">
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_add_to_cart_re_wrdo.svg" alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_add_to_cart_re_wrdo.svg" alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_transfer_money_rywa.svg" alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_online_shopping_re_k1sv.svg"
                  alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_transfer_money_rywa.svg" alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_online_shopping_re_k1sv.svg"
                  alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_transfer_money_rywa.svg" alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
            <div class="contenedor_notificacion">
              <figure class="contenedor_img_notificaciones">
                <img class="img_notificaciones" src="img/svg/undraw_online_shopping_re_k1sv.svg"
                  alt="Imagen alusiva" />
              </figure>
              <div class="contenido_notificacion">
                <p class="tipo_notificacion">
                  Notificación /<span class="icon-money">Ventas</span>
                </p>
                <p>Cliente: Andres Cifuentes Perez</p>
                <p>Fecha: 23/12/2021 Hora: 2:35pm</p>
              </div>
              <span class="icono_notificacion icon-star"></span>
            </div>
          </div>
          <p class="btn btn_click btn_cerrar_popup_notificaciones">
            <span class="icon-logout">Salir </span>
          </p>
        </div>
      </div>
      <!-- POPUP USUARIO -->
      <!-- POPUP USUARIO -->
      <!-- POPUP USUARIO -->
      <div class="contenedor_popup_usuario">
        <div class="popup_usuario cerrar_popup_usuario">
          <div class="foto_nombre">
            @if (auth()->check())
              <figure class="contenedor_avatar">
                <img class="avatar" src="{{ auth()->user()->USUA_FOTO }}" alt="" />
              </figure>
            @else
              <figure class="contenedor_avatar">
                <img class="avatar" src="img/avatar/usuario_uno.png" alt="" />
              </figure>
            @endif

            @if (auth()->check())
              <input type="hidden" name="validarDatos" id="validarDatos"
                value="{{ auth()->user()->USUA_APELLIDOS }}">
              <p>{{ auth()->user()->USUA_NOMBRES . ' ' . auth()->user()->USUA_APELLIDOS }}</p>
            @else
              <p>No hay usuario logueado</p>
            @endif
            <br />
          </div>
          <p class="elementos_usuario btn btn_click btn_abrir_modal_avatar">
            <span class="icon-picture">Cambiar foto</span>
          </p>
          <a class="elementos_usuario btn btn_click" href="{{ Route('PerfilUser') }}">
            <span class="icon-user">Perfil</span>
          </a>
          <form action="{{ Route('Logout') }}" method="POST">
            <p class="elementos_usuario btn btn_click btn_cerrar_popup_usuario">
              @csrf
              <span onclick="this.closest('form').submit()"><span class="icon-logout">Cerrar
                  Sesión</span></span>
            </p>
          </form>
        </div>
      </div>
      <!-- CONTENEDOR FOTO AVATAR -->
      <!-- CONTENEDOR FOTO AVATAR -->
      <!-- CONTENEDOR FOTO AVATAR -->
      <div class="contenedor_modal_avatar">
        <div class="modal_avatar">
          <div class="titulo_avatar titulo">
            <span class="icono_nav icon-picture"></span>
            <p>Cambiar foto</p>
          </div>
          <form action="{{ Route('AvatarUsers') }}" method="POST" class="formulario_nuevo_avatar"
            id="formulario_nuevo_avatar" enctype="multipart/form-data">
            @csrf
            <!-- PREVISUALIZAR IMAGEN -->
            <figure class="contenedor_img-avatar" id="contenedor_img_nuevo_avatar">
              @if (auth()->check())
                <img class="img-avatar" src="{{ auth()->user()->USUA_FOTO }}" alt="Imagen Avatar"
                  id="img_nuevo_avatar" />
              @else
                <img class="img-avatar" src="img/Agregar Fotos.png" alt="Imagen Avatar"
                  id="img_nuevo_avatar" />
              @endif
            </figure>

            <!-- INPUTS -->
            <!-- INPUTS -->
            <!-- INPUT IMAGEN -->
            <div class="formulario__grupo" id="grupo__txt_imagen_nuevo_avatar">
              <div class="formulario__grupo-input">
                <input class="formulario__input" type="text" name="txt_imagen_nuevo_avatar"
                  id="txt_imagen_nuevo_avatar" />
                <span class="formulario__placeholder">Seleccione una imagen:*</span>
                <label for="input_file_nuevo_avatar" class="label_subir">
                  <span class="icon-folder-open-empty"></span>
                </label>
                <input type="file" name="file_FotoUser" id="input_file_nuevo_avatar"
                  onchange="vista_preliminar_nuevo_avatar(event)" />
              </div>
            </div>
            <!-- MENSAJES DE ERROR -->
            <!-- MENSAJES DE ERROR -->
            <div class="mensajes_error_inputs">
              <!-- MENSAJE DE ERROR IMAGEN -->
              <div class="grupo__input-error" id="error__txt_imagen_nuevo_avatar">
                <p class="formulario__input-error-abajo">
                  <span class="icon-attention"></span> Por favor seleccione
                  una
                  <span class="nom_campo">foto de avatar.</span>
                </p>
              </div>
            </div>
            {{-- @error('file_FotoUser')
              <small class="">{{ $message }}</small>
            @enderror --}}
            <input class="btn btn_click btn_avatar" type="submit" value="Guardar" />
            <div class="btn_cancelar_avatar btn_click btn_cerrar_avatar">
              Cancelar
            </div>
          </form>
        </div>
      </div>
      <!-- POPUP MENSAJE DE EXITO -->
      <!-- POPUP MENSAJE DE EXITO -->
      <!-- POPUP MENSAJE DE EXITO -->
      <div class="contenedor_popup_exito">
        <div class="popup_exito">
          <div class="titulo_exito titulo">
            <span class="icono_nav icon-ok-circled-1"></span>
            <p>Registro Exitoso</p>
          </div>
          <figure class="contenedro__img-exito">
            <img src="img/svg/undraw_unlock_-24-mb.svg" alt="Imagen guardado correctamente" />
          </figure>
          <span class="icon-ok-circle"></span>
          <div class="mensaje__exito">
            Datos guardados
            <span class="txt__negrita-exito txt__enter-exito">Correctamente.</span>
          </div>
          <div class="mensaje__info-exito">
            @if (session('RespuestaExito'))
              <div class="titulo_mensaje_exito txt__negrita-exito">
                {{ session('RespuestaExito') }}
              </div>
            @endif
            @if (session('RespuestaPassword'))
              <div class="titulo_mensaje_exito txt__negrita-exito">
                {{ session('RespuestaPassword') }}
              </div>
              {{-- <ul>
                        <li class="lista-info-exito">
                            <span class="txt__negrita-exito">Proveedor: </span>
                            <span class="txt__enter-exito">Ricardo Andres Cifuentes Perez</span>
                        </li>
                        <li class="lista-info-exito">
                            <span class="txt__negrita-exito">Tipo de documento: </span>
                            <span class="txt__enter-exito">Cedula de ciudadania</span>
                        </li>
                        <li class="lista-info-exito">
                            <span class="txt__negrita-exito">Numero de documento: </span>
                            <span class="txt__enter-exito">80208614</span>
                        </li>
                    </ul> --}}
            @endif
          </div>
          <input class="btn btn_click btn_exito btn_cerrar_popup_exito" type="button" value="Aceptar" />
        </div>
      </div>
      <!-- POPUP MENSAJE DE ERROR -->
      <!-- POPUP MENSAJE DE ERROR -->
      <!-- POPUP MENSAJE DE ERROR -->
      <div class="contenedor_popup_error">
        <div class="popup_error">
          <div class="titulo_error titulo">
            <span class="icono_nav icon-attention-2"></span>
            <p>Mensaje de error</p>
          </div>
          <figure class="contenedro__img-error">
            <img src="img/svg/undraw_cancel_re_ctke.svg" alt="Imagen guardado correctamente" />
          </figure>
          <span class="icon-attention-circled"></span>
          <div class="mensaje__error">
            <span class="txt__negrita-error txt__enter-error">UPS!</span>Hay
            algo mal.
          </div>
          <div class="mensaje__info-error">
            <ul>
              <li class="lista-info-error">
                <span class="txt__negrita-error">Mensaje de error:</span>
                @if (session('RespuestaErrorPassword'))
                  <span class="txt__enter-error"> {{ session('RespuestaErrorPassword') }}</span>
                @endif

              </li>
            </ul>
          </div>
          <input class="btn btn_click btn_error btn_cerrar_popup_error" type="submit" value="Aceptar" />
        </div>
      </div>
      <!-- POPUP MENSAJE DE ERROR SISTEMA -->
      <!-- POPUP MENSAJE DE ERROR SISTEMA -->
      <!-- POPUP MENSAJE DE ERROR SISTEMA -->
      <div class="contenedor_popup_error_sistema">
        <div class="popup_error_sistema">
          <div class="titulo_error_sistema titulo">
            <span class="icono_nav icon-attention-2"></span>
            <p>Error del sistema</p>
          </div>
          <figure class="contenedro__img-error_sistema">
            <img src="img/svg/undraw_server_down_s-4-lk.svg" alt="Imagen guardado correctamente" />
          </figure>
          <span class="icon-attention-circled"></span>
          <div class="mensaje__error_sistema">
            <span class="txt__negrita-error_sistema txt__enter-error_sistema">UPS!</span>
            Algo salio mal.
          </div>
          <div class="mensaje__info-error_sistema">
            <ul>
              <li class="lista-info-error_sistema">
                <span class="txt__negrita-error_sistema">Codigo de error:</span>
                <span class="txt__enter-error_sistema">404</span>
              </li>
              <li class="lista-info-error_sistema">
                <span class="txt__negrita-error">Tipo de error:</span>
                @if (session('RespuestaErrorSistema'))
                  <span class="txt__enter-error_sistema">{{ session('RespuestaErrorSistema') }}</span>
                @endif

              </li>
            </ul>
          </div>
          <input class="btn btn_click btn_error_sistema btn_cerrar_popup_error_sistema" type="submit"
            value="Aceptar" />
        </div>
      </div>
      <!-- MODAL ACTUALIZAR PERFIL -->
      <!-- MODAL ACTUALIZAR PERFIL -->
      <!-- MODAL ACTUALIZAR PERFIL -->
      <div class="contenedor_modal_actualizarPerfil">
        <div class="modal_actualizarPerfil">
          <div class="rojo titulo">
            <span class="icono_nav icon-edit"></span>
            <p>Actualizar Datos</p>
          </div>
          <figure class="contenedro__img-foto">
            <img src="img/svg/undraw_updated_resume_re_q1or.svg" alt="Imagen actualizar perfil">
          </figure>
          <span class="icon-attention"></span>
          <div class="mensaje__actualizarPerfil"> Por favor actualicé su <span
              class="nom_campo">Contraseña</span> y su <span class="nom_campo">Información de
              perfil</span>.</div>
          <a href="{{ Route('PerfilUser') }}" class="btn btn_click btn_actualizarPerfil ">Actualizar</a>
          <div class="btn_cancelar btn_click btn_cerrar_editar btn_cerrar_modal_actualizarPerfil">
            Cerrar
          </div>
        </div>
      </div>

      @if (session('messageFoto'))
        <input type="hidden" id="messageExito" value="{{ session('messageFoto') }}">
      @endif
