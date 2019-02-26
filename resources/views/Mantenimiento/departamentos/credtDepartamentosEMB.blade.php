<form id="departamentos">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Datos del Departamento</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="id" name="id" type="hidden" value="0"/>
            <div class="campoCorto"><h5>Nombre Departamento</h5>
                <input id="departamento" name="departamento" type="text" value="" placeholder=""
                       style="" required data-rule-required="true" data-msg-required="Ingrese el nombre del departamento"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Asociado a:*</h5>
                <select title="Seleccione un empresa" name="cod_Companias" id="cod_Companias"
                        title="Seleccione la empresa con la que se vincula al departamento"
                        required data-rule-required="true"
                        data-msg-required="Seleccione la empresa del departamento">
                    <option value="">--Seleccione--</option>
                    @foreach($companias as $comp)
                        <option value="{{$comp->cod_Companias}}">{{$comp->nomb_Companias}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="btnGuardar" style="display: inline-block;">
        <button type="button" id="btnGuardar" style="color: #ffffff !important;" onclick="guardar(event);"><i
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
<script>
    $(document).ready(function () {
        $('#cerrarForm').click(function (e) {
            $('#formulario').trigger("reset");
            $('#formulario').css('display', 'none');
        });
    });
</script>
@endsection
