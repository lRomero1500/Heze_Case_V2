<form id="colaborador">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em;width: 877px">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <div class="campoCorto"><h5>Nombres</h5>
                <input type="text" value="" placeholder="" title="Ingrese nombres del colaborador"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Apellidos</h5>
                <input type="text" value="" placeholder="" title="Ingrese apellidos del colaborador"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Genero</h5>
                <select title="Seleccione un genero para el colaborador">
                    <option value="-1">--Seleccione--</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="campoCorto"><h5>Fecha de Nacimiento</h5>
                <input rel="fecha" type="text" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Telefono de Contacto</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="10">
            </div>
            <div class="campoCorto"><h5>Telefono Coporativo</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="10">
            </div>
            <div class="campoCorto"><h5>Email de Contacto</h5>
                <input type="text" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Email Corporativo</h5>
                <input type="text" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Procentaje de Descuento</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3">
            </div>
            <div class="campoCorto"><h5>Procentaje de Descuento</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3">
            </div>
            <div class="campoCorto">
                <label class="labelChek"><input type="checkbox"> Crear Usuario de Portal</label>
            </div>
        </div>
    </div>
    <div class="btnGuardar" style="display: inline-block;bottom: -161px!important;">
        <button id="btnGuardar" style="color: #ffffff !important;"><i class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar datos</p></button>
    </div>
    <div id="errores" style="visibility: hidden">

    </div>
</form>
@section('scriptsEMB')
    <script>
        $(document).ready(function () {
            $('[rel=fecha]').datepicker();
        }).jquery;
    </script>
@endsection