<form id="colaborador">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em;width: 877px">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="idEmpleado" name="cod_Empleado" type="hidden" value="0"/>
            <div class="campoCorto"><h5>Primer Nombre</h5>
                <input id="nombre1" name="nombre1" type="text" value="" placeholder="" title="Ingrese primer nombres del colaborador"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Segundo Nombre</h5>
                <input id="nombre2" name="nombre2" type="text" value="" placeholder="" title="Ingrese segundo nombre del colaborador"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Primer Apellido</h5>
                <input id="apellido1" name="apellido1" type="text" value="" placeholder="" title="Ingrese primer apellido del colaborador"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Segundo Apellido</h5>
                <input id="apellido2" name="apellido2" type="text" value="" placeholder="" title="Ingrese segundo apellido del colaborador"
                       onkeypress="return validaTexto();">
            </div>
            <div class="campoCorto"><h5>Genero</h5>
                <select title="Seleccione un genero para el colaborador" name="sexo_Empleado" id="sexo_Empleado">
                    <option value="">--Seleccione--</option>
                    <option value="1">Masculino</option>
                    <option value="0">Femenino</option>
                </select>
            </div>
            <div class="campoCorto"><h5>Fecha de Nacimiento</h5>
                <input rel="fecha" type="text" value="" placeholder="" name="fecha_Nac_Empleado" id="fecha_Nac_Empleado">
            </div>
            <div class="campoCorto"><h5>Telefono de Contacto</h5>
                <input type="text" value="" placeholder="" class="tel" name="telf_Celular_Empleado" id="telf_Celular_Empleado">
            </div>
            <div class="campoCorto"><h5>Telefono Coporativo</h5>
                <input type="text" value="" placeholder="" class="tel" name="telf_Corporativo_Empleado" id="telf_Corporativo_Empleado">
            </div>
            <div class="campoCorto"><h5>Email de Contacto</h5>
                <input type="text" value="" placeholder="" name="email_contacto" id="email_contacto">
            </div>
            <div class="campoCorto"><h5>Email Corporativo</h5>
                <input type="text" value="" placeholder="" name="email_corporativo" id="email_corporativo">
            </div>
            <div class="campoCorto"><h5>Asociado a:</h5>
                <select title="Seleccione un empresa" name="cod_Companias" id="cod_Companias">
                    <option value="">--Seleccione--</option>
                </select>
            </div>
            <div class="campoCorto"><h5>Procentaje de Descuento</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3" id="porc_Descuento" name="porc_Descuento">
            </div>
            <div class="campoCorto"><h5>Procentaje de Descuento</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3" id="porc_Ganacia" name="porc_Ganacia">
            </div>
            <div class="campoCorto">
                <label class="labelChek"><input type="checkbox" name="crearUsrHezeCase"> Crear Usuario de Portal</label>
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