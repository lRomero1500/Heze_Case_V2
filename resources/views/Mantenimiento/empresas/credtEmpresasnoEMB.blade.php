@extends('layouts.layoutGeneral')

@section('content')
    <div class="AreaTrabajo">
        <div class="ContenedorAreaTop">
            <div class="tituloAreaTrabajo">
                <h3>Mantenimiento/Empresas</h3>
            </div>
            <div class="conteedorIconoAreatrabajo">
                <a id="AddEmpresa"><span></span><h4 class="textIcono">Añadir
                        Nuevo</h4></a>
            </div>
        </div>
        <div id="formulario" class="contenedorFormsEditCrea" style="display: none">
            <div class="formsCreaEdit">
                @include('Mantenimiento.empresas.credtEmpresasEMB')
            </div>
        </div>
        <div id="ContenedorAltertas" class="ConetendorAlertasArea">

            <div id="AlertNoError" class="AlertasAreaNoError informe">
                <div id="btnCerrarAlert" class="btnCerrar" onclick="CerraralertaNoError(this);">
                    <button type="button" id="btnCerrar"></button>
                </div>
                <p>
                    En este espacio podrás agregar, editar y eliminar las empresas; para crear o editar una empresa de
                    forma correcta es necesario que diligencies todos los campos de manera correcta. para mayor
                    información acerca de <b>cómo crear una empresa</b> visita la wiki de <b>Hezecase <a
                                href="#">Aquí</a> </b> y conoce todo el potencial que tiene Hececaze para ti y tu
                    empresa
                </p>
            </div>
            <div class="AlertasAreaError" style="display: none">
                <table>
                    <tr>
                        <td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 30px">
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
        <div class="ContenedorOpcionesFIltroArea">
            <div class="GrupoAcciones">
                <select class="ControlesOpciones">
                    <option>Acciones en lote</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <button class="Btn-GrupoOpciones">Aplicar</button>
            </div>
            <div class="GrupoOpcionesFiltro">
                <select class="ControlesOpciones">
                    <option>Todas las Empresas</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <select class="ControlesOpciones">
                    <option>Todos los Servicios</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <select class="ControlesOpciones">
                    <option>Todos los Colaboradores</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <button class="Btn-GrupoOpciones">Filtrar</button>
            </div>
            <div class="GrupoOpcionesBusq">
                <input type="text" class="ControlesOpciones"/>
                <button class="Btn-GrupoOpciones">Buscar Cliente</button>
            </div>

        </div>
        <div class="ContenedorTablaArea">
            <table class="TablasArea">
                <thead>
                <tr>
                    <th width="2%"><input type="checkbox"/></th>
                    <th width="9%">Logo</th>
                    <th width="20%">Empresa</th>
                    <th width="10%">Nit</th>
                    <th width="19%">Telefono</th>
                    <th width="20%">Correo</th>
                    <th width="20%">Direccion</th>
                </tr>
                </thead>
                <tbody id="tbCompanias">
                @foreach($Companias as $compania)
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>
                            <div class="imgAvatarForm">
                                @if($compania->logo_companias==null||$compania->logo_companias=="")
                                    <img src=""/>
                                @else
                                    <img src="{!! asset('Recursos/1/img/tumbs/'.$compania->logo_companias.'.png') !!}"/>
                                @endif
                            </div>
                        </td>
                        <td>{!! $compania->nomb_Companias !!}
                            <div class="OpcionesTabla"><a
                                        onclick="editEmpresa({!! $compania->cod_Companias.',event' !!});">Editar</a>
                                <span class="SeparadorOpcionesTablas">|</span>
                                <a onclick="eliminarEmpresa({!! $compania->cod_Companias !!});">Eliminar</a>
                            </div>
                        </td>
                        <td>{!! $compania->nit_Companias !!}</td>
                        <td>{!! $compania->tel_Companias !!}</td>
                        <td>{!! $compania->correo_companias !!}</td>
                        <td>{!! $compania->direccion_companias !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/Vistas/Mantenimiento/empresas.js')}}"></script>
@endsection
