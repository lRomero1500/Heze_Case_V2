<form id="empresa">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas contFormGobal" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="idcompanias" name="cod_Companias" type="hidden" value="0"/>
            <div class="contCampo W25"><h5>Nombre Servicio</h5>
                <input class="campo" id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder=""
                       style="" required data-rule-required="true" data-msg-required="Ingrese el nombre del servicio"
                       onkeypress="return validaTexto();">
            </div>
            <div class="lineaGris"></div>
            <div class="conteedorIconoAreatrabajo agregarInterno W25">
                <a id="AddEmpresa"><span></span><h4 class="textIcono">Añadir
                        Sub-servicio</h4></a>
            </div>
            <div class="lineaGris"></div>
            <div class="contCamposIndividuales">
                <div class="contCampo W25"><h5>Nombre Sub-Servicio 1</h5>
                    <input class="campo" id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder=""
                           style="" required data-rule-required="true" data-msg-required="Ingrese el nombre del servicio"
                           onkeypress="return validaTexto();">
                </div>
                <div class="contCampo W25"><h5>Valor</h5>
                    <input class="campo" id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder=""
                           style="" required data-rule-required="true" data-msg-required="Ingrese el nombre del servicio"
                           onkeypress="return validaTexto();">

                </div>
                <div class="contCampo W25"><h5>por:</h5>
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
                        <label for="valorSporHora" class="textCheckbox"><span class="check"></span>por hora</label>
                    </div>
                </div>
                <div id="cerrarForm" class="btnCerrar">
                    <button type="button" id="btnCerrar"></button>
                </div>
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
