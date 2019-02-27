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
            <div class="conteedorIconoAreatrabajo">
                <a><span></span><h4 class="textIcono">Añadir
                        Nuevo</h4></a>
            </div>
        </div>

        <!-- Contenedor de información -->
        <div id="ContenedorAltertas" class="ConetendorAlertasArea">
            <div id="AlertNoError" class="AlertasAreaNoError informe">
                <div id="btnCerrarAlert" class="btnCerrar">
                    <button type="button" id="btnCerrar"></button>
                </div>
                <p>
                    En este espacio podrás crear un proyecto nuevo; para crear un proyecto de forma correcta es necesario que diligencies todos los campos de manera correcta. Recuerda, el proyecto es el macro de todo, dependiendo del contenido del proyecto, se despliegan opciones diferentes para las tareas, para mayor información acerca de <b>cómo crear un proyecto</b> visita la wiki de <b>Hezecase <a href="#">Aquí</a> </b> y conoce todo el potencial que tiene Hececaze para ti y tu empresa
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
        <div class="contGeneralWizard">
            <div class="contBtnWizard" id="contBtnWizard"></div>
            <div class="contContenidoWizard" id="contContenidoWizard">
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Datos del proyecto</h1>
                    <h6>Ingresa los datos de manera correcta para continuar | ver más a cerca de  cómo crear un proyecto <a href="">Aquí</a></h6>
                    <div class="contFormGobal contFormWizard">
                        <div class="contCampo W25">
                            <label>Nombre del proyecto</label>
                            <input class="campo" type="text" placeholder="" required>
                        </div>
                        <div class="contCampo W25">
                            <label>Cliente</label>
                            <select class="campo" type="text" required>
                                <option>WCC</option>
                                <option>Coinpaz</option>
                                <option>OfertSHOP</option>
                                <option>Prelegal</option>
                            </select>
                        </div>
                        <div class="contCampo W25">
                            <label>Líder / Responsable</label>
                            <input class="campo" type="text" placeholder="" required>
                        </div>
                        <div class="contCampo W25">
                            <label>Nivel de importancia</label>
                            <select class="campo" type="text" required>
                                <option>Poco Importante</option>
                                <option>Importante</option>
                                <option>Muy Importante</option>
                                <option>Prioridad alta</option>
                            </select>
                        </div>
                        <div class="contCampo W100 H60">
                            <label>Obcervaciones</label>
                            <textarea class="campo" type="text" placeholder="" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Servicios</h1>
                    <h6>Ingresa los datos de manera correcta para continuar | ver más a cerca de  cómo crear un proyecto <a href="">Aquí</a></h6>
                    <div class="contFormGobal contFormWizard">
                        <div class="conteedorIconoAreatrabajo">
                            <a><span></span><h4 class="textIcono">Añadir Nuevo</h4></a>
                        </div>
                        <div class="linea"></div>
                        <div class="contServicios W100 columColpce2">
                            <div class="servicio W50"><label>Diseño Gráfico <span name="Eliminar"></span></label></div>
                            <div class="servicio W50"><label>Desarrollo de Software <span name="Eliminar"></span></label></div>
                            <div class="subServicio W50"><label>Marketing digital</label><p>Campañas en adwords <span name="Eliminar"></span></p><p>Campañas en redes <span name="Eliminar"></span></p><p>Capacitación <span name="Eliminar"></span></p><p>Manejo de redes <span name="Eliminar"></span></p></div>
                            <div class="servicio W50"><label>Marketing digital <span name="Eliminar"></span></label></div>
                            <div class="subServicio W50"><label>Desarrollo de Apps</label><p>Android <span name="Eliminar"></span></p><p>iOs <span name="Eliminar"></span></p><p>Window Phone <span name="Eliminar"></span></p></div>
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
        <button>ss</button>

    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    var contContenidoWizard = $('#contContenidoWizard').children('div') ;
    var primerItemWizard = contContenidoWizard[0];
    primerItemWizard.className += " activo";
    var cantidadWizard;
        for (i = 0; i < contContenidoWizard.length; i++) {
            cantidadWizard = i;
            document.getElementById('contBtnWizard').innerHTML += "<label>Paso " + (cantidadWizard + 1) + "</label>";
            if(i == 0){
                contContenidoWizard[i].innerHTML += "<button name='irAdelanteWizard' onclick='irAdelante()'>Ir al paso " + (cantidadWizard + 2) + "</button>"

            }else if((i > 0) && (i !== contContenidoWizard.length - 1)){
                contContenidoWizard[i].innerHTML += "<button name='irAdelanteWizard' onclick='irAdelante()'>Ir al paso " + (cantidadWizard + 2) + "</button>" + "<button name='irAtrasWizard' onclick='irAtras()'>Ir un paso atrás</button>"
            }else{
                contContenidoWizard[i].innerHTML += "<button name='irAdelanteWizard' onclick='finalizar()'>Finalizar</button>" + "<button name='irAtrasWizard' onclick='irAtras()'>Ir un paso atrás</button>"
            }
        }
    var contBtnWizard = $('#contBtnWizard').children('label');
    var primerItemBtnWizard = contBtnWizard[0];
    primerItemBtnWizard.className += " activo";
    var indice = 0;
    var validarCampos = $('#contContenidoWizard').children('div');
    var selectorRequired = validarCampos.find('input,select,textarea[required]');

    function irAdelante() {
        if (validarCampos.find('input,select,textarea[required]').length > 0){
        contBtnWizard[indice].classList.remove("activo");
        contBtnWizard[indice+1].className += " activo";

        contContenidoWizard[indice].classList.remove("activo");
        contContenidoWizard[indice+1].className += " activo";
        indice += 1;
        }
    }

    function irAtras(){
        contBtnWizard[indice].classList.remove("activo");
        contBtnWizard[indice-1].className += " activo";

        contContenidoWizard[indice].classList.remove("activo");
        contContenidoWizard[indice-1].className += " activo";
        indice -= 1;

    }
</script>
@endsection

@section('scriptsEMB')

@endsection


