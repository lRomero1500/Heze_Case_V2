@extends('layouts.layoutGeneral')

@section('headers')

@endsection

@section('content')
    <div class="AreaTrabajo">

        <!-- Contenedor de miga de pan -->
        <div class="ContenedorAreaTop">
            <div class="tituloAreaTrabajo">
                <h3>PL Lite / Proyecto / Crear </h3>
            </div>
            {{--<div class="conteedorIconoAreatrabajo">
                <a><span></span><h4 class="textIcono">Añadir
                        Nuevo</h4></a>
            </div>--}}
        </div>

        <!-- Contenedor de información -->
        <div id="ContenedorAltertas" class="ConetendorAlertasArea">
            <div id="AlertNoError" class="AlertasAreaNoError informe">
                <div id="btnCerrarAlert" class="btnCerrar">
                    <button type="button" id="btnCerrar"></button>
                </div>
                <p>
                    En este espacio podrás crear un proyecto nuevo; para crear un proyecto de forma correcta es
                    necesario que diligencies todos los campos de manera correcta. Recuerda, el proyecto es el macro de
                    todo, dependiendo del contenido del proyecto, se despliegan opciones diferentes para las tareas,
                    para mayor información acerca de <b>cómo crear un proyecto</b> visita la wiki de <b>Hezecase <a
                                href="#">Aquí</a> </b> y conoce todo el potencial que tiene Hececaze para ti y tu
                    empresa
                </p>
            </div>
            <div class="AlertasAreaError" style="display: none">
                <table>
                    <tr>
                        <td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 30px">
                            <span style="color:#FFF" class="fa fa-exclamation fa-2x" aria-hidden="true"></span>
                        </td>
                        <td style="padding: 20px;text-align: justify;vertical-align: middle">
                            <p style="text-wrap: none">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Superiores tres erant, quae
                                esse possent, quarum est una sola defensa, eaque vehementer. Omnia contraria, quos etiam
                                insanos esse vultis. Non autem hoc: igitur ne illud quidem. Istam voluptatem, inquit,
                                Epicurus ignorat? Ergo instituto veterum, quo etiam Stoici utuntur.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Contenedor generan -->
        <form id="proyectoWZ" novalidate="novalidate">
            <input id="id" name="id" value="0" type="hidden"/>
            {!! csrf_field() !!}
            <div class="contGeneralWizard">
                <div class="contBtnWizard" id="contBtnWizard"></div>
                <div class="contContenidoWizard" id="contContenidoWizard">
                    <div class="cantenidoWizard" name="cantenidoWizard">
                        <h1>Datos del proyecto</h1>
                        <h6>Ingresa los datos de manera correcta para continuar | ver más a cerca de cómo crear un proyecto
                            <a href="">Aquí</a></h6>
                        <div class="contFormGobal contFormWizard">
                            <div class="contCampo W25">
                                <label>Nombre del proyecto</label>
                                <input id="nombre_proyecto" name="nombre_proyecto" class="campo" type="text" placeholder="" required data-rule-required="true" data-msg-required="Ingrese un nombre para este proyecto">
                            </div>
                            <div class="contCampo W25">
                                <label>Cliente</label>
                                <select id="clienteemp_id" name="clienteemp_id" class="campo" type="text" required data-rule-required="true" data-msg-required="Seleccione un cliente para el proyecto">
                                    <option value="">Seleccione un Cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{!! $cliente->id !!}">{!! $cliente->hez_compania_cliente->nomb_Companias !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contCampo W25">
                                <label>Líder / Responsable</label>
                                <input id="lider_resp_nombre" name="lider_resp_nombre" class="campo" type="text" placeholder="" required data-rule-required="true" data-msg-required="Seleccione un cliente para el proyecto"
                                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios" data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres">
                            </div>
                            <div class="contCampo W25">
                                <label>Nivel de importancia</label>
                                <select id="importancia_proyecto_id" name="importancia_proyecto_id" class="campo" type="text" required data-rule-required="true" data-msg-required="Seleccione una importancia para el proyecto">
                                    <option value="">Seleccione importancia</option>
                                    @foreach($nivelimport as $import)
                                        <option value="{!! $import->id !!}">{!! $import->importancia !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contCampo W25"><h5>Fecha Estimada de Inicio*</h5>
                                <input type="text" value="" placeholder=""
                                       title="Seleccione fecha de inicio del proyecto" name="fecha_est_inicio"
                                       id="fecha_est_inicio"
                                       required data-rule-required="true"
                                       data-msg-required="Seleccione fecha de inicio del proyecto"
                                       data-rule-dateCustom="true" data-msg-dateCustom="Ingrese una fecha valida" class="dat campo"
                                       onchange="limpiarErrorFecha(this)"/>
                            </div>
                            <div class="contCampo W25"><h5>Fecha Estimada de Finalización*</h5>
                                <input type="text" value="" placeholder=""
                                       title="Seleccione fecha de finalizacion del proyecto" name="fecha_est_fin"
                                       id="fecha_est_fin"
                                       required data-rule-required="true"
                                       aria-mayorQue="true"
                                       data-rule-mayorQue="#fecha_est_inicio"
                                       data-msg-mayorQue="debe ser mayor a la fecha inicial"
                                       data-msg-required="Seleccione fecha de finalizacion del proyecto"
                                       data-rule-validaFechaInicio="#fecha_est_inicio"
                                       data-rule-dateCustom="true" data-msg-dateCustom="Ingrese una fecha valida" class="dat campo"
                                       onchange="limpiarErrorFecha(this)"/>
                            </div>
                            <div class="contCampo W100 H60">
                                <label>Observaciones</label>
                                <textarea id="observaciones" name="observaciones" class="campo" type="text" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="cantenidoWizard" name="cantenidoWizard">
                        <h1>Servicios</h1>
                        <h6>Ingresa los datos de manera correcta para continuar | ver más a cerca de cómo crear un proyecto
                            <a href="">Aquí</a></h6>
                        <div class="contFormGobal contFormWizard">
                            <div class="conteedorIconoAreatrabajo">
                                <a><span></span><h4 class="textIcono">Añadir Nuevo</h4></a>
                            </div>
                            <div class="linea"></div>
                            <div class="contServicios W100 columColpce2">
                                <div class="servicio W50"><label>Diseño Gráfico <span name="Eliminar"></span></label></div>
                                <div class="servicio W50"><label>Desarrollo de Software <span
                                                name="Eliminar"></span></label></div>
                                <div class="subServicio W50"><label>Marketing digital</label>
                                    <p>Campañas en adwords <span name="Eliminar"></span></p>
                                    <p>Campañas en redes <span name="Eliminar"></span></p>
                                    <p>Capacitación <span name="Eliminar"></span></p>
                                    <p>Manejo de redes <span name="Eliminar"></span></p></div>
                                <div class="servicio W50"><label>Marketing digital <span name="Eliminar"></span></label>
                                </div>
                                <div class="subServicio W50"><label>Desarrollo de Apps</label>
                                    <p>Android <span name="Eliminar"></span></p>
                                    <p>iOs <span name="Eliminar"></span></p>
                                    <p>Window Phone <span name="Eliminar"></span></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="cantenidoWizard" name="cantenidoWizard">
                        <h1>Contenido 3</h1>
                        <div name="otroNombre"> otro nombre</div>
                    </div>
                    <div class="cantenidoWizard" name="cantenidoWizard">
                        <h1>Contenido 4</h1>
                        <div name="otroNombre"> otro nombre</div>
                    </div>
                </div>
            </div>
        </form>

        {{-- <button>ss</button>--}}

    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/Vistas/PMLite/proyectos.js') !!}" type="text/javascript"></script>
@endsection


