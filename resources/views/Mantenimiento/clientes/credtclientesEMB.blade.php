<form id="clientes" novalidate="novalidate">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas contFormGobal" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Asociacion de clientes</h2>
        </div>
        <div class="contenedorDeCampos">
            @if(\Illuminate\Support\Facades\Auth::user()->hez_role->cod_Rol===1)
                <div class="contCampo W20"><h5>Compania</h5>
                    <select title="Seleccione un Cliente" name="compania_id" id="compania_id"
                            title="Seleccione la empresa que tendra un nuevo cliente"
                            required data-rule-required="true"
                            data-msg-required="Seleccione la empresa que tendra un nuevo cliente" class="campo">
                        <option value="">--Seleccione--</option>
                        @foreach($companias as $comp)
                            <option value="{{$comp->cod_Companias}}">{{$comp->nomb_Companias}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="contCampo W20"><h5>Asociar Cliente</h5>
                <select title="Seleccione un Cliente" name="compania_cliente_id" id="compania_cliente_id"
                        title="Seleccione la empresa que se vinculara como cliente"
                        required data-rule-required="true"
                        data-msg-required="Seleccione la empresa cliente" class="campo">
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
    <script src="{{asset('js/Vistas/Mantenimiento/clientes.js')}}"></script>
@endsection