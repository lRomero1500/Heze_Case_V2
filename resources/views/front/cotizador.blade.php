@extends('layouts/layoutCotizador')

@section('content')

<div class="lineaGradiente"></div>
<div class="contentFormulario2Colomnas">
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
    </div>
</div>
<div class="contentFormulario3Colomnas">
    <div class="tituloTabla">
        <h2>Datos de la empresa</h2>
    </div>
    <div class="contenedorDeCampos">
        <div class="campoCorto"><h5>Razón social</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Nit</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Correo</h5>
            <input type="mail" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Teléfono</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Rubro</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Dirección</h5>
            <input type="text" value="" placeholder="">
        </div>
    </div>
</div>
<div class="btnGuardar" style="display: inline-block;">
    <button style="color: #ffffff !important;"><i class="fa fa-floppy-o btnIconComun"></i><p> Guardar datos</p></button>
</div>
<div class="contentMigaDePanServicio">
    <div class="contentBtnCargandoServicio">
        <div class="btnCargandoServicio">
            <a style="color: #f7f7f7 !important" href="#">
                <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
                <h4>Desarrollo web</h4><p>Website / CMS</p>
            </a>
        </div>
    </div>
</div>
<div class="contentNuevoServicio">
    <div class="contentFormulario2Colomnas">
        <div class="tituloTabla">
            <h2>Datos del sitio web</h2>
        </div>
        <div class="contenedorDeCampos">
            <div class="campoCorto"><h5>Cuantas páginas</h5>
                <input style="width: 146px;" type="number" name="" value="10" min="10" max="50" step="1">
            </div>
            <div class="campoCorto"><h5>Cuantas landing page</h5>
                <input style="width: 146px;" type="number" name="" value="3" min="3" max="10" step="1">
            </div>
            <div class="campoCorto"><h5>Cuantos Idiomas</h5>
                <input style="width: 146px;" type="number" name="" value="1" min="1" max="8" step="1">
            </div>
            <div class="campoCorto"><h5>Método de construcción</h5>
                <select name="OS">
                    <option value="1">50% Desarrollo 50% CMS</option>
                    <option value="2">100% CMS</option>
                    <option value="3">100% Desarrollo</option>
                </select>
            </div>
        </div>
    </div>
    <div class="contentFormulario2Colomnas">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <div class="campoCorto checkbox"><h5>Hosting</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Nombre del hosting</h5>
                <input type="text" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Dominio</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Nombre del dominio</h5>
                <input type="text" value="" placeholder="">
            </div>
        </div>
    </div>
    <div class="contentFormulario2Colomnas">
        <div class="tituloTabla">
            <h2>CMS</h2>
        </div>
        <div class="contenedorDeCampos">
            <div class="campoCorto"><h5>Tipo de CMS</h5>
                <input type="text" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Dispone de Tema</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Dispone de Plugins</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
        </div>
    </div>
    <div class="contentFormulario3Colomnas">
        <div class="tituloTabla">
            <h2 style="display: inline-block;">Funciones adicionales </h2><p style="display: inline-block; margin-left: 20px"> Marcar todo como
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label></p>
        </div>
        <div class="contenedorDeCampos">
            <div class="campoCorto"><h5>Multi lenguaje</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Boton de pago</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Publicidad</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Pasarela de pago</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Privatización de contenido</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
            <div class="campoCorto"><h5>Chat en línea</h5>
                <input id="" type="checkbox" value="1">
                <label class="checkbox-label" for="checkbox">Si</label>
                <input id="" type="checkbox" value="2">
                <label class="checkbox-label" for="checkbox" checked>No</label>
            </div>
        </div>
    </div>

</div>
<div class="botoneraServisios">
    <div class="btnComun">
        <button style="color: #ffffff !important;">
            <i class="fa fa-plus btnIconComun"></i>
            <p> Servicio</p>
        </button>
    </div>
    <div class="btnComun">
        <button style="color: #ffffff !important;">
            <i class="fa fa-plus btnIconComun"></i>
            <p> Servicio Adicional</p>
        </button>
    </div>
    <div class="btnGuardarCotiz">
        <button style="color: #ffffff !important;">
            <i class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar</p>
        </button>
    </div>
    <div class="btnCrearCotiz">
        <button style="color: #ffffff !important;">
            <i class="fa fa-file-text btnIconComun"></i>
            <p> Crear cotización</p>
        </button>
    </div>
</div>
@endsection