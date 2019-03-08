<form id="servicios" novalidate="novalidate">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas contFormGobal" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Crear un servicio</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="id" name="id" type="hidden" value="0"/>
            <input id="subServ" name="subServ" type="hidden"  value="false"/>
            <input id="CantsubServ" name="CantsubServ" type="hidden"  value="0"/>
            <div class="contCamposIndividuales principal">
                <div class="contCampo W20"><h5>Nombre Servicio</h5>
                    <input class="campo" id="nomb-servicio" name="nomb-servicio" title="Ingrese el nombre del servicio"
                           type="text" value="" placeholder=""
                           style="" required data-rule-required="true"
                           data-msg-required="Ingrese el nombre del servicio"
                           data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios">
                </div>
                <div class="contCampo W20"><h5>Compania que lo ofrece</h5>
                    <select class="campo" title="Seleccione un empresa" name="cod_Companias" id="cod_Companias"
                            title="Seleccione la empresa con la que se vincula el servicio"
                            required data-rule-required="true"
                            data-msg-required="Seleccione la empresa que ofrece el servicio">
                        <option value="">--Seleccione--</option>
                        @foreach($companias as $comp)
                            <option value="{{$comp->cod_Companias}}">{{$comp->nomb_Companias}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="contCampo W20 activo"><h5>Valor</h5>
                    <input class="campo money" id="cost-servicio" name="cost-servicio" title="Ingrese el costo del servicio"
                           type="text" value="" placeholder="3.000,00"
                           style="" required data-rule-required="true" data-msg-required="Ingrese el costo del servicio">
                    <span class="iconoMoneda">$</span>

                </div>
                <div class="contCampo W20 activo"><h5>por:</h5>
                    <div class="inlineBlock W50">
                        <input class="campo" type="radio" name="tipocost_id" id="valorStotal"
                               value="3" required data-rule-required="true"
                               data-msg-required="Seleccione un tipo de costo"/>
                        <label for="valorStotal" class="textCheckbox"
                               title="Seleccione esta opcion en caso de que el costo sea el total del servicio">
                            <span class="check"></span>Total</label>
                    </div>
                    <div class="inlineBlock W50">
                        <input class="campo" type="radio" name="tipocost_id" id="valorSporHora"
                               value="2" />
                        <label for="valorSporHora" class="textCheckbox"
                               title="Seleccione esta opcion en caso de que el costo del servicio sea por hora">
                            <span class="check"></span>Hora</label>
                    </div>
                </div>
            </div>

            <div class="lineaGris"></div>
            <div class="conteedorIconoAreatrabajo agregarInterno W25">
                <a id="AddSubServ" onclick="agregaSubServicios();"><span></span><h4 class="textIcono">Añadir
                        Sub-servicio</h4></a>
            </div>
            <div id="contSubServ">
                {{--<div class="contCamposIndividuales">
                    <div class="contCampo W40"><h5>Nombre Sub-Servicio 1</h5>
                        <input class="campo" id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder=""
                               style="" required data-rule-required="true"
                               data-msg-required="Ingrese el nombre del servicio"
                               data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios">
                    </div>
                    <div class="contCampo W20"><h5>Valor</h5>
                        <input class="campo" id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder=""
                               style="" required data-rule-required="true"
                               data-msg-required="Ingrese el nombre del servicio"
                               onkeypress="return validaTexto();"><span class="iconoMoneda">$</span>

                    </div>
                    <div class="contCampo W40"><h5>por:</h5>
                        <div class="inlineBlock W50">
                            <input class="campo" type="radio" name="crearUsrHezeCase" id="valorStotal"
                                   title="Seleccione esta opcion en caso de que desee que este colaborador ingrese a la plataforma"
                            />
                            <label for="valorStotal" class="textCheckbox"><span class="check"></span>Total</label>
                        </div>
                        <div class="inlineBlock W50">
                            <input class="campo" type="radio" name="crearUsrHezeCase" id="valorSporHora"
                                   title="Seleccione esta opcion en caso de que desee que este colaborador ingrese a la plataforma"
                            />
                            <label for="valorSporHora" class="textCheckbox"><span class="check"></span>Hora</label>
                        </div>
                    </div>
                    <div id="" class="btnCerrar">
                        <button type="button" id="btnCerrar"></button>
                    </div>
                </div>--}}
            </div>

        </div>
    </div>
    <div class="btnGuardar">
        <button type="button" id="btnGuardar" onclick="guardar(event);"><i
                    class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar datos</p></button>
    </div>
    <div id="cerrarForm" class="btnCerrar">
        <button type="button" id="btnCerrar"></button>
    </div>
    <div id="errores" style="visibility: hidden">

    </div>
</form>
@section('scriptsEMB')
<script type="text/javascript" src="{!! asset('js/Vistas/Mantenimiento/servicios.js') !!}"></script>
@endsection