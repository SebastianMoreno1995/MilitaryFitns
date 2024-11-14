@include('Layouts.Header')
<!-- BANNER ANIMADO 1 -->
<!-- BANNER ANIMADO 1 -->
<!-- BANNER ANIMADO 1 -->
<div class="contenedor-banner">
  <div class="banner">
    <h2 class="banner__titulo">
      Producto <span class="segunda-mitad">estrella</span>
    </h2>
    <div class="banner__descripcion">
      <p class="banner__texto">
        Descubre aquí los productos favoritos de nuestros consumidores con
        los mejores descuentos
      </p>
    </div>
    <div class="banner__contenedor-sliders" id="slider">
      @foreach ($BannerOfertas as $Fila)
        <div class="banner__contenido" id="banner1">
          <div class="banner__producto">
            <img src="{{ $Fila->IMGPRESENTACION }}" alt="Imagen del producto" class="banner__producto-img" />
          </div>
          <div class="banner__blanco">
            <div class="banner__marca">
              <img src="{{ $Fila->MARC_IMAGEN }}" alt="Logo de la marca" class="banner__marca-img" />
            </div>
            <div class="banner__logo">
              <img src="img/logo_baja_calidad.png" alt="Logo Military Fitns" class="banner__logo-img" />
            </div>
          </div>
          <div class="banner__verde">
            <div class="banner__info-producto">
              <div class="banner_nombre-producto">
                {{ $Fila->PROD_NOMBRE }} <span class="segunda-mitad-nombre">{{ $Fila->COMPLEMENTO }}</span>
              </div>
              <div class="banner__dto">
                <p class="banner__dto-numero">{{ $Fila->OFER_DESCUENTO }}</p>
                <p class="banner__dto-signo">%</p>
                <p class="banner__dto-abrev">Dto.</p>
              </div>
              <a href="#" class="banner__btn-comprar">mas información</a>
            </div>
            <div class="banner__foto">
              <img src="{{ $Fila->IMGBANNER }}" alt="Foto Fisico-culturista" class="banner__foto-img" />
            </div>
          </div>
        </div>
      @endforeach

    </div>
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
<!-- PRODUCTOS -->
<!-- PRODUCTOS -->
<!-- PRODUCTOS -->
<section class="seccion-productos">
  <!-- TARJETA DE PRODUCTO -->
  <div class="contenedor-productos">
    <!-- CONTENEDOR TARJETA 1 -->
    @foreach ($Productos as $Fila)
      <div class="contenedor__tarjeta">
        <a class="card-producto__btn-informacion"
          href="{{ Route('DetalleProducto') }}?PRO_ID={{ $Fila->PROD_ID }}&GRSA_ID={{ $Fila->GRSA_ID }}">
          <p class="card-producto__tex-informacion">
            <span class="icon-eye"></span>Mas información
          </p>
        </a>
        <!-- TARJETA DE PRODUCTO -->
        <div class="card-producto">
          <span class="span"></span><span class="span"></span><span
            class="span"></span><span class="span"></span>
          <div class="card-producto__imagen">
            <img src="{{ $Fila->IMAG_DIRECCIONIMAGEN }}" loading="lazy" alt="Imagen del producto"
              class="card-producto__img" />
          </div>
          <div class="card-producto__nombre">
            <p class="card-producto__tex-nombre">{{ $Fila->PROD_NOMBRE }}</p>
            <p class="card-producto__tex-complemento">{{ $Fila->PROD_COMPLEMENTO }}</p>
          </div>
          <div class="card-producto__presentacion">
            <p class="card-producto__tex-presentacion"> {{ $Fila->UNME_MEDIDA }} </p>
          </div>
          <div class="card-producto__info-adicional">
            <p class="card-producto__text-envios">
              <span class="icon-truck-1"></span>Envios a toda Colombia
            </p>
            <p class="card-producto__tex-info-adicional">
              Tu pedido se entregará dentro de 3 a 5 días hábiles
            </p>
          </div>
          <div class="card-producto__precio">
            <p class="card-producto__tex-precio">${{ $Fila->GRSA_PRECIO }}</p>
            <span class="texto-producto__precio-antiguo">$0</span>
          </div>
          <div class="card-producto__btn-carrito">
            <p class="card-producto__tex-carrito">
              <span class="icon-basket-1"></span>Agregar al carrito
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
<div class="contenedor_paginacion">
  {{ $Productos->links('vendor.pagination.default') }}
</div>
@include('Layouts.Footer')
