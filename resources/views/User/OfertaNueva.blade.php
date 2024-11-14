@if (auth()->check())
    @include('Layouts.HeaderUser')
    <link rel="stylesheet" href="css/app_16_ofertas.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

    <!-- TODO INICIO DEL CONTEDIO -->
    <!-- CONTENEDOR CONTEDIDO DERECHA -->
    <!-- CONTENEDOR CONTEDIDO DERECHA -->
    <!-- CONTENEDOR CONTEDIDO DERECHA -->
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

                @if (session('message'))
                    <input type="hidden" id="messageExito" value="{{ session('message') }}">
                @endif
                @if (session('MsgErrorSistema'))
                    <input type="hidden" id="messageErrorSis" value="{{ session('MsgErrorSistema') }}">
                @endif
                @if ($Tipo == null)
                    <div class="titulo titulo_nuevo">
                        <span class="icono_nav icon-money-1"></span>
                        <p>Nueva Oferta</p>
                    </div>
                    <figure class="contenedro__imgElementos">
                        <img src="img/svg/undraw_discount_d-4-bd.svg" alt="Imagen Oferta" />
                    </figure>
                @endif
                @if ($Tipo != null && $Tipo === 'Modificar')
                    <div class="titulo titulo_editar">
                        <span class="icono_nav icon-money-1"></span>
                        <p>Modificar Oferta</p>
                    </div>
                    <figure class="contenedro__imgElementos">
                        <img src="img/svg/undraw_discount_d-4-bd verde.svg" alt="Imagen Oferta" />
                    </figure>
                @endif

                @if ($Tipo == null)
                    <form class="formulario" id="formulario_nuevo_ofertas" action="{{ Route('RegistrarOferta') }}"
                        method="POST">
                        @csrf
                @endif
                @if ($Tipo != null && $Tipo === 'Modificar' && $Oferta !=null)
                    <form class="formulario" id="formulario_nuevo_ofertas" action="{{ Route('ModificarOferta') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" id="OFER_ID" name="OFER_ID" value="{{ $Oferta->OFER_ID }}">
                @endif

                <!-- INPUTS -->
                <!-- INPUTS -->
                <div class="formulario__contenedor-nuevo">
                    <!-- INPUT PRODUCTO OFERTADO -->
                    <div class="formulario__grupo" id="grupo__sel_producto_nuevo_ofertas">
                        <div class="formulario__grupo-input">
                            <select class="formulario__input" name="sel_producto_nuevo_ofertas"
                                id="sel_producto_nuevo_ofertas" required>
                                <option value=""></option>
                                @foreach ($Productos as $Fila)
                                    <option value="{{ $Fila->PROD_ID }}">
                                        {{ $Fila->PROD_NOMBRE . ' ' . $Fila->PROD_COMPLEMENTO }}</option>
                                @endforeach
                            </select>
                            <span class="formulario__placeholder">Producto a ofertar:*</span>
                        </div>
                    </div>
                    <!-- INPUT PRESENTACION -->
                    <div class="formulario__grupo" id="grupo__sel_presentacion_nuevo_ofertas">
                        <div class="formulario__grupo-input">
                            <select class="formulario__input" name="sel_presentacion_nuevo_ofertas"
                                id="sel_presentacion_nuevo_ofertas" required>
                            </select>
                            <span class="formulario__placeholder">Presentacion:*</span>
                        </div>
                    </div>
                    <!-- INPUT  DESCUENTO -->
                    <div class="formulario__grupo" id="grupo__num_descuento_nuevo_ofertas">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="text" name="num_descuento_nuevo_ofertas"
                                id="num_descuento_nuevo_ofertas" required />
                            <span class="formulario__placeholder">Descuento:*</span>
                        </div>
                    </div>
                    <!-- INPUT PRECIO ACTUAL -->
                    <div class="formulario__grupo" id="grupo__num_precioActual_nuevo_ofertas">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="text" name="valor_presentacion"
                                id="valor_presentacion" required disabled />
                            <span class="formulario__placeholder">Precio Actual:*</span>
                        </div>
                    </div>
                    <!-- INPUT PRECIO CON DESCUENTO -->
                    <div class="formulario__grupo" id="grupo__num_precioDto_nuevo_ofertas">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="text" name="nuevo_valor_presentacion"
                                id="nuevo_valor_presentacion" required disabled />
                            <span class="formulario__placeholder">Precio con descuento:*</span>
                        </div>
                    </div>
                    <!-- INPUT ESTADO -->
                    <div class="formulario__grupo" id="grupo__sel_estado_nuevo_ofertas">
                        <div class="formulario__grupo-input">
                            <select class="formulario__input" name="sel_estado_nuevo_ofertas"
                                id="sel_estado_nuevo_ofertas" required>
                                <option value=""></option>
                                @foreach ($Estados as $Fila)
                                    <option value="{{ $Fila->ESTA_ID }}">{{ $Fila->ESTA_TIPO }}</option>
                                @endforeach
                            </select>
                            <span class="formulario__placeholder">Estado:*</span>
                        </div>
                    </div>
                    <!-- INPUT FECHA DE INCIO -->
                    <div class="formulario__grupo" id="grupo__date_fechaInicio_ofertas">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="date" name="date_fechaInicio_ofertas"
                                id="date_fechaInicio_ofertas" required />
                            <span class="formulario__placeholder">Fecha de Inicio:*</span>
                        </div>
                    </div>
                    <!-- INPUT FECHA FINAL -->
                    <div class="formulario__grupo" id="grupo__date_fechaFin_ofertas">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="date" name="date_fechaFin_ofertas"
                                id="date_fechaFin_ofertas" required />
                            <span class="formulario__placeholder">Fecha de Final:*</span>
                        </div>
                    </div>
                </div>
                <!-- MENSAJES DE ERROR -->
                <!-- MENSAJES DE ERROR -->
                <div class="mensajes_error_inputs">
                    <!-- MENSAJE PRODUCTO A OFERTAR -->
                    <div class="grupo__input-error" id="error__sel_producto_nuevo_ofertas">
                        <p class="formulario__input-error-abajo">
                            <span class="icon-attention"></span> Selecione por favor
                            un <span class="nom_campo">"Producto".</span>
                        </p>
                    </div>
                    <!-- MENSAJE PRODUCTO A OFERTAR -->
                    <div class="grupo__input-error" id="error__sel_presentacion_nuevo_ofertas">
                        <p class="formulario__input-error-abajo">
                            <span class="icon-attention"></span> Selecione por favor
                            una <span class="nom_campo">"Presentacion".</span>
                        </p>
                    </div>
                    <!-- MENSAJE DESCUENTO -->
                    <div class="grupo__input-error" id="error__num_descuento_nuevo_ofertas">
                        <p class="formulario__input-error-abajo">
                            <span class="icon-attention"></span> Por favor establesca
                            un <span class="nom_campo">Descuento,</span> numeros
                            enteros o decimales sin usar el signo %, maximo 2
                            decimales.
                        </p>
                    </div>
                    <!-- MENSAJE ESTADO -->
                    <div class="grupo__input-error" id="error__sel_estado_nuevo_ofertas">
                        <p class="formulario__input-error-abajo">
                            <span class="icon-attention"></span> Selecione por favor
                            un <span class="nom_campo">"Estado".</span>
                        </p>
                    </div>
                    <!-- MENSAJE FECHA INICIO -->
                    <div class="grupo__input-error" id="error__date_fechaInicio_ofertas">
                        <p class="formulario__input-error-abajo">
                            <span class="icon-attention"></span> Selecione por favor
                            una <span class="nom_campo">"Fecha Inicial".</span>
                        </p>
                    </div>
                    <!-- MENSAJE FECHA FINAL -->
                    <div class="grupo__input-error" id="error__date_fechaFin_ofertas">
                        <p class="formulario__input-error-abajo">
                            <span class="icon-attention"></span> Selecione por favor
                            una <span class="nom_campo">"Fecha Final".</span>
                        </p>
                    </div>
                </div>

                <!-- BOTON SUBMIT -->
                <!-- BOTON SUBMIT -->
                @if ($Tipo == null)
                    <input class="btn btn_click btn_guardar btn_nuevo" type="submit" value="Guardar" />
                @endif
                @if ($Tipo != null && $Tipo === 'Modificar')
                    <input class="btn btn_click btn_guardar btn_editar" type="submit" value="Guardar" />
                @endif
                <!-- BOTON CANCELAR -->
                <!-- BOTON CANCELAR -->
                <a class="btn_cancelar btn_click" href="{{ Route('OfertasUser') }}">
                    Cancelar
                </a>
                </form>
            </div>
        </div>
    </div>
    <!-- TODO FIN DEL CONTENIDO -->

    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="js/Controller_app.js"></script>
    <script>
        function ConsultaPresentacion(Otro, Otro1) {
            peticionAjax("{{ route('BuscarPresentacionesProducto') }}", '_token=' + $('input[name="_token"]')
                .val() + '&Prod_id=' + $('#sel_producto_nuevo_ofertas').val(), 'ImpSelect',
                'sel_presentacion_nuevo_ofertas', Otro, Otro1);
        }

        function ConsultaCostoPresentacion() {
            peticionAjax("{{ route('CostoPresentacionProducto') }}", '_token=' + $('input[name="_token"]')
                .val() + '&Grsa_id=' + $('#sel_presentacion_nuevo_ofertas').val(), 'ImpText',
                'valor_presentacion');
        }

        function CalcularDescuento() {
            let Descuento = (document.getElementById('num_descuento_nuevo_ofertas').value / 100);
            let ValorAnterior = document.getElementById('valor_presentacion').value;
            let ValorNuevo = (ValorAnterior * Descuento);
            let Total = (ValorAnterior - ValorNuevo)
            document.getElementById('nuevo_valor_presentacion').value = Total;
        }
        $('#sel_producto_nuevo_ofertas').change(function() {
            ConsultaPresentacion();
        });
        $('#sel_presentacion_nuevo_ofertas').change(function() {
            ConsultaCostoPresentacion();
        });
        $('#num_descuento_nuevo_ofertas').keyup(function() {
            CalcularDescuento();
        });
    </script>
    @if ($Tipo != null && $Tipo === 'Modificar' && $Oferta != null && $GrupoSabores != null)
        <script>
            $("#sel_producto_nuevo_ofertas option")
                .removeAttr("selected")
                .filter("[value='{{ $GrupoSabores->PRODUCTO_PROD_ID }}']")
                .attr("selected", true);
            ConsultaPresentacion('selected', "{{ $Oferta->GRUPO_SABORES_GRSA_ID }}");

            document.getElementById('num_descuento_nuevo_ofertas').value = '{{ $Oferta->OFER_DESCUENTO }}';
            $("#sel_estado_nuevo_ofertas option")
                .removeAttr("selected")
                .filter("[value='{{ $Oferta->ESTADO_ESTA_ID }}']")
                .attr("selected", true);
            document.getElementById('valor_presentacion').value = '{{ $GrupoSabores->GRSA_PRECIO }}';
            document.getElementById('date_fechaInicio_ofertas').value = '{{ $Oferta->OFER_FECHAINICIO }}';
            document.getElementById('date_fechaFin_ofertas').value = '{{ $Oferta->OFER_FECHAFIN }}';
            CalcularDescuento();
        </script>
    @endif
    <script src="js/Controller_app_modals.js"></script>
    <script src="js/app_16_ofertas.js"></script>
    </body>

    </html>
@else
    <p>No hay usuario logueado</p>
@endif
