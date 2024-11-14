<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Military Fitns</title>
  <link rel="icon" type="image" href="img/estrella.png" />
  <link rel="stylesheet" href="css/web_1_index.css" />
  <link rel="stylesheet" href="css/fontello.css" />
  <link rel="stylesheet" href="css/normalize.css" />
</head>

<body>
  <!-- HEADER -->
  <!-- HEADER -->
  <!-- HEADER -->
  <header>
    <div class="contenedor-header">
      <div class="fondo_blanco"></div>
      <div class="fondo_negro">
        <!-- MENU DE NAVEGACION       -->
        <nav class="nav" id="menu_navegacion">
          <ul class="nav__menu">
            <li class="nav__opciones">
              <a class="nav__links" href="{{ Route('Tienda') }}" ><svg>
                  <rect></rect>
                </svg>INICIO</a>
            </li>
            <li class="nav__opciones">
              <a class="nav__links" href="#modal-categorias"><svg>
                  <rect></rect>
                </svg>CATEGORIA</a>
            </li>
            <li class="nav__opciones">
              <a class="nav__links" href="#"><svg>
                  <rect></rect>
                </svg>MARCAS</a>
            </li>
            <li class="nav__opciones">
              <a class="nav__links" href="#"><svg>
                  <rect></rect>
                </svg>OBJETIVOS</a>
            </li>
            <li class="nav__opciones">
              <a class="nav__links" href="#"><svg>
                  <rect></rect>
                </svg>SERVICIOS</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- INICIAR SESION -->
      <div class="boton-animado">
        <a href="2_iniciar_sesion.html" class="boton-animado__btn">
          <svg width="277" height="62">
            <defs>
              <linearGradient id="grad1">
                <stop offset="0%" stop-color="#000" />
                <stop offset="100%" stop-color="#000" />
              </linearGradient>
            </defs>
            <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
          </svg>
          <span>Iniciar Sesión</span>
        </a>
      </div>
      <!-- LOGO MILITARY FITNS -->
      <img class="logo-ppal" src="img/logo.png" alt="Logo Military Fitns" />
      <!-- BUSCAR -->
      <div class="contenedor-buscar-ofertas">
        <div class="buscar">
          <input class="buscar__input" type="search" name="" id="" placeholder="Buscar Productos" />
          <!-- BOTON LUPITA -->
          <div class="icon-search-5"></div>
        </div>
      </div>
    </div>
    <!-- LO MAS VENDIDO -->
    <!-- LO MAS VENDIDO -->
    <!-- LO MAS VENDIDO -->
    <div class="contenedor__fondo-pesas">
      <img class="fondo-pesas__img" src="img/fondo1_pesas.jpg" alt="Fondo Pesas" />
      <div class="contenedor-cards">
        <!-- TARJETA LO MAS VENDIDO 1 -->
        <div class="card-lo-mas-vendido">
          <div
            class="
                card-lo-mas-vendido__triangulo
                card-lo-mas-vendido__triangulo--grande
              ">
          </div>
          <div
            class="
                card-lo-mas-vendido__triangulo
                card-lo-mas-vendido__triangulo--pequenio
              ">
          </div>
          <p class="card-lo-mas-vendido__titulo">lo más vendido</p>
          <button class="card-lo-mas-vendido__comprar">Comprar</button>
          <img class="card-lo-mas-vendido__img-producto" src="img/producto.png" alt="" />
          <div class="card-lo-mas-vendido__datos-producto">
            <p class="card-lo-mas-vendido__nombre-producto">Iso 100</p>
            <p class="card-lo-mas-vendido__info-producto">
              Tu pedido se entregará dentro de 3 a 5 días hábiles
            </p>
            <p class="card-lo-mas-vendido__precio-producto">$289.900</p>
          </div>
        </div>
        <!-- TARJETA LO MAS VENDIDO 2 -->
        <div class="card-lo-mas-vendido">
          <div
            class="
                card-lo-mas-vendido__triangulo
                card-lo-mas-vendido__triangulo--grande
              ">
          </div>
          <div
            class="
                card-lo-mas-vendido__triangulo
                card-lo-mas-vendido__triangulo--pequenio
              ">
          </div>
          <p class="card-lo-mas-vendido__titulo">lo más vendido</p>
          <button class="card-lo-mas-vendido__comprar">Comprar</button>
          <img class="card-lo-mas-vendido__img-producto" src="img/producto.png" alt="" />
          <div class="card-lo-mas-vendido__datos-producto">
            <p class="card-lo-mas-vendido__nombre-producto">
              Iso 100 Multivi- taminico
            </p>
            <p class="card-lo-mas-vendido__info-producto">
              Tu pedido se entregará dentro de 3 a 5 días hábiles
            </p>
            <p class="card-lo-mas-vendido__precio-producto">$289.900</p>
          </div>
        </div>
        <!-- TARJETA LO MAS VENDIDO 3 -->
        <div class="card-lo-mas-vendido">
          <div
            class="
                card-lo-mas-vendido__triangulo
                card-lo-mas-vendido__triangulo--grande
              ">
          </div>
          <div
            class="
                card-lo-mas-vendido__triangulo
                card-lo-mas-vendido__triangulo--pequenio
              ">
          </div>
          <p class="card-lo-mas-vendido__titulo">lo más vendido</p>
          <button class="card-lo-mas-vendido__comprar">Comprar</button>
          <img class="card-lo-mas-vendido__img-producto" src="img/producto.png" alt="" />
          <div class="card-lo-mas-vendido__datos-producto">
            <p class="card-lo-mas-vendido__nombre-producto">Iso 100</p>
            <p class="card-lo-mas-vendido__info-producto">
              Tu pedido se entregará dentro de 3 a 5 días hábiles
            </p>
            <p class="card-lo-mas-vendido__precio-producto">$289.900</p>
          </div>
        </div>
      </div>
    </div>
    <!-- CATEGORIAS -->
    <!-- CATEGORIAS -->
    <!-- CATEGORIAS -->
    <div class="modal" id="modal-categorias">
      <div class="contenedor__modal-categorias">
        <div class="contenedor-categorias">
          <a href="#" class="contenedor-categorias__btn-cerrar-modal icon-cancel"></a>
          <!-- <h2 class="titulo-categorias" >Categorias</h2> -->
          <svg>
            <symbol id="text">
              <text text-anchor="middle" x="50%" y="60%">Categorias</text>
            </symbol>
            <use xlink:href="#text"></use>
          </svg>
          <div class="contenedor-tarjetas">
            <!-- TARJETA CATEGORIA 1 -->
            @if ($Categorias !=null)
              @foreach ($Categorias as $Fila)
              <div class="card-categoria">
                <div class="card-categoria__circulo">
                  <img src="{{ $Fila->CATE_IMAGEN }}" alt="Imagen Categoria"
                    class="img-circulo" />
                </div>
                <div class="card-categoria__nombre">
                  <a href="#" class="card-categoria__texto">{{ $Fila->CATE_NOMBRE }}</a>
                </div>
              </div>
              @endforeach
            @endif

            {{-- <!-- TARJETA CATEGORIA 2 -->
            <div class="card-categoria">
              <div class="card-categoria__circulo">
                <img
                  src="img/categorias/home-icon-protein1-500x500.png"
                  alt="Imagen Categoria"
                  class="img-circulo"
                />
              </div>
              <div class="card-categoria__nombre">
                <a href="#" class="card-categoria__texto">Protein</a>
              </div>
            </div>
            <!-- TARJETA CATEGORIA 3 -->
            <div class="card-categoria">
              <div class="card-categoria__circulo">
                <img
                  src="img/categorias/home-icon-pre-workout-2-500x500.png"
                  alt="Imagen Categoria"
                  class="img-circulo"
                />
              </div>
              <div class="card-categoria__nombre">
                <a href="#" class="card-categoria__texto">Pre-workout</a>
              </div>
            </div>
            <!-- TARJETA CATEGORIA 4 -->
            <div class="card-categoria">
              <div class="card-categoria__circulo">
                <img
                  src="img/categorias/home-icon-fatloss-2-500x500.png"
                  alt="Imagen Categoria"
                  class="img-circulo"
                />
              </div>
              <div class="card-categoria__nombre">
                <a href="#" class="card-categoria__texto">Fat Burnes</a>
              </div>
            </div>
            <!-- TARJETA CATEGORIA 5 -->
            <div class="card-categoria">
              <div class="card-categoria__circulo">
                <img
                  src="img/categorias/home-icon-aminos-500x500.png"
                  alt="Imagen Categoria"
                  class="img-circulo"
                />
              </div>
              <div class="card-categoria__nombre">
                <a href="#" class="card-categoria__texto">aminos</a>
              </div>
            </div>
            <!-- TARJETA CATEGORIA 6 -->
            <div class="card-categoria">
              <div class="card-categoria__circulo">
                <img
                  src="img/categorias/home-icon-testosterone-500x500.png"
                  alt="Imagen Categoria"
                  class="img-circulo"
                />
              </div>
              <div class="card-categoria__nombre">
                <a href="#" class="card-categoria__texto">Testosterone</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </header>
