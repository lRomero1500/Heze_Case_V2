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
            <div id="AlertNoError" class="AlertasAreaNoError">
                <i id="btnCerrarAlert" style="cursor: pointer;" class="CerrarAlertasAreaNoError fa fa-times fa-fw"
                   aria-hidden="true"></i>
                <p>
                    En este espacio podrás crear un proyecto nuevo; para crear un proyecto de forma correcta es necesario que diligencies todos los campos de manera correcta. Recuerda, el proyecto es el macro de todo, dependiendo del contenido del proyecto, se despliegan opciones diferentes para las tareas, para mayor información acerca de <b>cómo crear un proyecto</b> visita la wiki de <b>Heza-Case <a href="#">Aquí</a> </b> y conose todo el potencial que tiene Hace-caze para ti y tu empresa
                </p>
            </div>
            <div class="AlertasAreaError" style="display: none">
                <table>
                    <tr>
                        <td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 3%">
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
            <div class="contBtnWizard" id="contBtnWizard">

            </div>
            <div class="contContenidoWizard" id="contContenidoWizard">
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 1</h1>
                    <div name="otroNombre"> otro nombre</div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 2</h1>
                    <div name="otroNombre"> otro nombre</div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 3</h1>
                    <div name="otroNombre"> otro nombre</div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 4</h1>
                    <div name="otroNombre"> otro nombre</div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 5</h1>
                    <div name="otroNombre"> otro nombre</div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 6</h1>
                    <div name="otroNombre"> otro nombre</div>
                </div>
                <div class="cantenidoWizard" name="cantenidoWizard">
                    <h1>Contenido 7</h1>
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
    function irAdelante() {
        contBtnWizard[indice].classList.remove("activo");
        contBtnWizard[indice+1].className += " activo";

        contContenidoWizard[indice].classList.remove("activo");
        contContenidoWizard[indice+1].className += " activo";
        indice += 1;
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


