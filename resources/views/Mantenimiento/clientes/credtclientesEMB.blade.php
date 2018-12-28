
<div class="contentFormulario2Colomnas" style="padding:0px!important;margin-bottom: 0.5em">
    <div class="tituloTabla">
        <h2>Datos del cliente</h2>
    </div>
    <div class="contenedorDeCampos">
        <div class="campoCorto"><h5>Nombre</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Cargo</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Correo</h5>
            <input type="mail" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Teléfono</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Empresa</h5>
            <select name="ddlEmpresa">
                <option>--Seleccione--</option>
            </select>
        </div>
    </div>
</div>
<div class="btnGuardar" style="display: inline-block;bottom: -171px">
    <button id="btnGuardar" style="color: #ffffff !important;"><i class="fa fa-floppy-o btnIconComun"></i><p> Guardar datos</p></button>
</div>
<script>
    $(document).ready(function () {
        $('#btnGuardar').click(function () {
            InicioCarando();
        });
    }).jquery;
</script>