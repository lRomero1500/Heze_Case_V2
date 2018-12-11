<form id="empresa">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="idcompanias" name="cod_Companias" type="hidden" value="0"/>
            <div class="campoCorto"><h5>Razón social</h5>
                <input id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder=""
                       style="" required data-rule-required="true" data-msg-required="Ingrese el nombre de la compañia">
            </div>
            <div class="campoCorto"><h5>Nit</h5>
                <input id="nit_Companias" name="nit_Companias" type="text" value="" placeholder="" required
                       data-rule-required="true" data-msg-required="Ingrese el nit de la compañia">
            </div>
            <div class="campoCorto"><h5>Correo</h5>
                <input id="correo_companias" name="correo_companias" type="mail" value="" placeholder="" required
                       data-rule-required="true" data-msg-required="Ingrese un correo de la compañia"
                       data-rule-email="true" data-msg-email="Igrese un correo valido">
            </div>
            <div class="campoCorto"><h5>Teléfono</h5>
                <input id="tel_Companias" class="tel" name="tel_Companias" type="text" value="" placeholder=""
                       requerido="true" required data-rule-required="true" data-msg-required="Ingrese un telefono de la compañia">
            </div>
            <div class="campoCorto"><h5>Dirección</h5>
                <input id="direccion_companias" name="direccion_companias" type="text" value="" placeholder=""
                       requerido="true" required data-rule-required="true" data-msg-required="Ingrese una direccion de la compañia">
            </div>
            {{--            <div class="campoCorto"><h5>Logo</h5>
                            <input id="logo_companias" name="logo_companias" type="file" accept="image/*">
                        </div>--}}
            <div class="campoCorto"><h5>Logo</h5>
                <input type="file" name="logo_companias" id="logo_companias" accept="image/*"
                       style=" width: 0.1px; height: 0.1px;  opacity: 0;  overflow: hidden;  position: absolute;  z-index: -1;">
                <label for="logo_companias" style="border: 1px solid #707070; background: #ffffff;"><span style=" width: 54%; min-height: 2em; display: inline-block;  text-overflow: ellipsis; white-space: nowrap;
    overflow: hidden; vertical-align: top;"></span> <strong
                            style=" height: 100%; color: #f1e5e6; background: #d3394c; display: inline-block;">
                        <i class="fa fa-upload" aria-hidden="true"></i>
                        Logo&hellip;</strong></label>
            </div>
        </div>
    </div>
    <div class="btnGuardar" style="display: inline-block;">
        <button type="button" id="btnGuardar" style="color: #ffffff !important;" onclick="guardar(event);"><i
                    class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar datos</p></button>
    </div>
    <div id="errores" style="visibility: hidden">

    </div>
</form>
@section('scriptsEMB')
    <script>

    </script>
@endsection



