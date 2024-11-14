@include('Layouts.Header')

<link rel="stylesheet" href="css/web_3_informacion_producto.css" />

<!-- INFORMACION DEL PRODUCTO -->
<!-- INFORMACION DEL PRODUCTO -->
<!-- INFORMACION DEL PRODUCTO -->
<section class="seccion__info-producto">
  <div class="contenedor__info-producto">
    <!-- SLIDER -->
    <div class="contenedor__slider">
      <div class="contenedor__slider-nuevo">
        <div class="contenedor__todas-imagenes" id="slider">
          @if ($ImagenesProducto != null)
            @foreach ($ImagenesProducto as $Fila)
              <div class="contenedor__imagen">
                <img class="contenedor__imagen--img" src="{{ $Fila->IMAG_DIRECCIONIMAGEN }}"
                  alt="Imagen del producto" />
              </div>
            @endforeach
          @endif
          {{-- <div class="contenedor__imagen">
            <img class="contenedor__imagen--img" src="img/productos/hyde-xtreme-pixie-dust-30-serve-thumb_1.png"
              alt="Imagen del producto" />
          </div>
          <div class="contenedor__imagen">
            <img class="contenedor__imagen--img"
              src="img/productos/mr-hyde-signature-blue-razz-popsicle-30-serve-thumb.png" alt="Imagen del producto" />
          </div>
          <div class="contenedor__imagen">
            <img class="contenedor__imagen--img" src="img/productos/athletes_whey_1_75lbs_chocolate_shake-244x300.png"
              alt="Imagen del producto" />
          </div>
          <div class="contenedor__imagen">
            <img class="contenedor__imagen--img" src="img/productos/prewo_pineapple_orange-232x300.png"
              alt="Imagen del producto" />
          </div>
          <div class="contenedor__imagen">
            <img src="img/productos/supro.125.png" class="contenedor__imagen--img" alt="Imagen del producto" />
          </div> --}}
        </div>
      </div>
      <div class="contenedor__slider-flechas">
        <div class="slider__flecha slider__flecha--arriba icon-up-open" id="btn_arriba"></div>
        <div class="slider__flecha slider__flecha--abajo icon-down-open" id="btn_abajo"></div>
      </div>
    </div>
    <div class="nuevo__div">
      <!-- VIDEO -->
      <video class="contenedor__video" loop autoplay muted>
        <source src="img/videos/Chain - 25380.mp4" type="video/mp4" />
        <source src="img/videos/Fireworks - 4045 20m.mp4" type="video/mp4" />
      </video>
      <!-- PARELELOGRAMA -->
      <div class="contenedor__parelelograma"></div>
      <!-- FOTO DEL PRODUCTO -->
      <div class="contenedor__fotos-productos">
        @if ($Producto != null)
          @foreach ($Producto as $Fila)
            <img  id="Img_InfoProducto" class="contenedor__fotos-productos--producto-img" src="{{ $Fila->IMAG_DIRECCIONIMAGEN }}" alt=""/>
            <input type="hidden" id="Prod_id" value="{{ $Fila->PROD_ID }}" name="Prod_id">
          @endforeach
        @endif
        {{-- <img class="contenedor__fotos-productos--producto-img"
          src="img/productos/hydrobcaa-essentials-30-serve-small.png" alt="" /> --}}
      </div>
      <!-- TEXTO DEL PRODUCTO -->
      <div class="contenedor__texto-productos">
        @if ($Producto != null)
          @foreach ($Producto as $Fila)
            <p class="texto-producto__titulo-ppal">{{ $Fila->PROD_NOMBRE }}</p>
            <p class="texto-producto__titulo-secundario">{{ $Fila->PROD_COMPLEMENTO }}</p>
            <p class="texto-producto__fabricante-lable">Marca:</p>
            <p class="texto-producto__fabricante-nombre">{{ $Fila->MARC_NOMBRE }}</p>
            <p class="texto-producto__estado">En stock: <span id="Stock_InfoProducto">{{ $Fila->GRSA_STOCK }}</span></p>
            <p class="texto-producto__precio-lable">Precio:</p>
            <p class="texto-producto__precio">
              <span id="Precio_InfoProducto">${{ $Fila->GRSA_PRECIO }}</span>
              <span class="texto-producto__precio-antiguo">$320.000</span>
            </p>
          @endforeach
        @endif
        <form action="" class="form-producto">
          @csrf
          <div class="contenedor__selects">
            <select class="select" name="info_presentacion" id="info_presentacion">
              <option value="">Presentacion:*</option>
              @if ($Presentaciones != null)
                @foreach ($Presentaciones as $Fila)
                  <option value="{{ $Fila->UNME_ID }}">{{ $Fila->UNME_MEDIDA }}</option>
                @endforeach
              @endif
            </select>
            <select class="select" name="info_Sabor" id="info_Sabor">
              <option value="">Sabores:*</option>
            </select>
          </div>
          <div class="contador">
            <input class="contador__btn" type="button" value="-" />
            <input class="contador__numero" type="number" name="" id="" min="1" />
            <input class="contador__btn" type="button" value="+" />
            <button class="btn__agregar-carrito" type="submit">
              Agregar al carrito
            </button>
          </div>
          <p class="texto-producto__subtotal-lable">Subtotal:</p>
          <p class="texto-producto__subtotal">$579.800</p>
        </form>
      </div>
      <!-- INFORMACION DE ENVIO -->
      <div class="texto-producto__contenedor-info-envio">
        <span class="icon-truck-1"></span>
        <p class="texto-producto__info-envio">
          Por compras superiores a $100.000 <br />
          el envió es completamente Gratuito
        </p>
      </div>
    </div>
  </div>
</section>
<!-- PRODUCTOS -->
<!-- PRODUCTOS -->
<!-- PRODUCTOS -->
<section class="seccion-productos">
  <!-- TARJETA DE PRODUCTO -->
  <div class="contenedor-productos">
    <!-- CONTENEDOR TARJETA 1 -->
    <div class="contenedor__tarjeta">
      <div class="card-producto__btn-informacion">
        <p class="card-producto__tex-informacion">
          <span class="icon-eye"></span>Mas información
        </p>
      </div>
      <!-- TARJETA DE PRODUCTO -->
      <div class="card-producto">
        <span class="span"></span><span class="span"></span><span
          class="span"></span><span class="span"></span>
        <div class="card-producto__imagen">
          <img src="img/productos/hydrobcaa-essentials-30-serve-small.png" loading="lazy" alt="Imagen del producto"
            class="card-producto__img" />
        </div>
        <div class="card-producto__nombre">
          <p class="card-producto__tex-nombre">HIDRO BCAA ESSENTIALS</p>
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
          <p class="card-producto__tex-precio">$289.900</p>
        </div>
        <div class="card-producto__btn-carrito">
          <p class="card-producto__tex-carrito">
            <span class="icon-basket-1"></span>Agregar al carrito
          </p>
        </div>
      </div>
    </div>
    <!-- CONTENEDOR TARJETA 2 -->
    <div class="contenedor__tarjeta">
      <div class="card-producto__btn-informacion">
        <p class="card-producto__tex-informacion">
          <span class="icon-eye"></span>Mas información
        </p>
      </div>
      <!-- TARJETA DE PRODUCTO -->
      <div class="card-producto">
        <span class="span"></span><span class="span"></span><span
          class="span"></span><span class="span"></span>
        <div class="card-producto__imagen">
          <img src="img/productos/plant-perform-rich-chocolate-24-serve-thumb.png" loading="lazy"
            alt="Imagen del producto" class="card-producto__img" />
        </div>
        <div class="card-producto__nombre">
          <p class="card-producto__tex-nombre">plant perform</p>
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
          <p class="card-producto__tex-precio">$289.900</p>
        </div>
        <div class="card-producto__btn-carrito">
          <p class="card-producto__tex-carrito">
            <span class="icon-basket-1"></span>Agregar al carrito
          </p>
        </div>
      </div>
    </div>
    <!-- CONTENEDOR TARJETA 3 -->
    <div class="contenedor__tarjeta">
      <div class="card-producto__btn-informacion">
        <p class="card-producto__tex-informacion">
          <span class="icon-eye"></span>Mas información
        </p>
      </div>
      <!-- TARJETA DE PRODUCTO -->
      <div class="card-producto">
        <span class="span"></span><span class="span"></span><span
          class="span"></span><span class="span"></span>
        <div class="card-producto__imagen">
          <img src="img/productos/mr-hyde-signature-blue-razz-popsicle-30-serve-thumb.png" loading="lazy"
            alt="Imagen del producto" class="card-producto__img" />
        </div>
        <div class="card-producto__nombre">
          <p class="card-producto__tex-nombre">MR. HYDE SIGNATURE</p>
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
          <p class="card-producto__tex-precio">$289.900</p>
        </div>
        <div class="card-producto__btn-carrito">
          <p class="card-producto__tex-carrito">
            <span class="icon-basket-1"></span>Agregar al carrito
          </p>
        </div>
      </div>
    </div>
    <!-- CONTENEDOR TARJETA 4 -->
    <div class="contenedor__tarjeta">
      <div class="card-producto__btn-informacion">
        <p class="card-producto__tex-informacion">
          <span class="icon-eye"></span>Mas información
        </p>
      </div>
      <!-- TARJETA DE PRODUCTO -->
      <div class="card-producto">
        <span class="span"></span><span class="span"></span><span
          class="span"></span><span class="span"></span>
        <div class="card-producto__imagen">
          <img src="img/productos/hyde-xtreme-pixie-dust-30-serve-thumb_1.png" loading="lazy" alt="Imagen del producto"
            class="card-producto__img" />
        </div>
        <div class="card-producto__nombre">
          <p class="card-producto__tex-nombre">HYDE XTREME</p>
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
          <p class="card-producto__tex-precio">$289.900</p>
        </div>
        <div class="card-producto__btn-carrito">
          <p class="card-producto__tex-carrito">
            <span class="icon-basket-1"></span>Agregar al carrito
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>

<script src="js/jquery.js"></script>
<script src="js/web_informacion_producto.js"></script>
<script src="js/Controller_app.js"></script>

<script type="text/javascript">
  // <![CDATA[  <-- For SVG support
  if ('WebSocket' in window) {
    (function() {
      function refreshCSS() {
        var sheets = [].slice.call(document.getElementsByTagName("link"));
        var head = document.getElementsByTagName("head")[0];
        for (var i = 0; i < sheets.length; ++i) {
          var elem = sheets[i];
          var parent = elem.parentElement || head;
          parent.removeChild(elem);
          var rel = elem.rel;
          if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
          }
          parent.appendChild(elem);
        }
      }
      var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
      var address = protocol + window.location.host + window.location.pathname + '/ws';
      var socket = new WebSocket(address);
      socket.onmessage = function(msg) {
        if (msg.data == 'reload') window.location.reload();
        else if (msg.data == 'refreshcss') refreshCSS();
      };
      if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
        console.log('Live reload enabled.');
        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
      }
    })();
  } else {
    console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
  }
  // ]]>


  $('#info_presentacion').change(function() {
    peticionAjax("{{ route('BuscarSaboresPresentaciones') }}", '_token=' + $('input[name="_token"]').val() +
      '&Prod_id=' + $('#Prod_id').val() + '&Unme_id=' + $('#info_presentacion').val(), 'ImpSelect', 'info_Sabor',
      '');
  });

  $('#info_Sabor').change(function() {
    peticionAjax("{{ route('BuscarInfoPresentaciones') }}", '_token=' + $('input[name="_token"]').val() +
      '&Grsa_id=' + $('#info_Sabor').val(), 'ImpInfo', 'Img_InfoProducto','Stock_InfoProducto','Precio_InfoProducto');
  });
</script>
@include('Layouts.Footer')
