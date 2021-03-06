@extends('layouts.layoutGeneral')

@section('headers')

@endsection

@section('content')
    <div class="AreaTrabajo">
        <div class="ContenedorAreaTop">
            <div class="tituloAreaTrabajo">
                <h3>Mantenimiento/Departamentos</h3>
            </div>
            <div class="conteedorIconoAreatrabajo">
                <a id="AddDepartamentos"><span></span><h4 class="textIcono">Añadir
                        Nuevo</h4></a>
            </div>
        </div>
        <div id="formulario" class="contenedorFormsEditCrea" style="display: none">
            <div class="formsCreaEdit">
                @include('Mantenimiento.departamentos.credtDepartamentosEMB')
            </div>
        </div>
        <div id="ContenedorAltertas" class="ConetendorAlertasArea">
            <div id="AlertNoError" class="AlertasAreaNoError informe" >
                <div id="btnCerrarAlert" class="btnCerrar" onclick="CerraralertaNoError(this);">
                    <button type="button" id="btnCerrar"></button>
                </div>
                <p>
                    En este espacio podrás agregar, editar y eliminar los departamentos, tales cómo: Producción, Contable, Ventas, Comercial, etc; para crear o editar un departamento de forma correcta es necesario que diligencies todos los campos de manera correcta. para mayor información acerca de <b>cómo crear un departamento</b> visita la wiki de <b>Hezecase <a href="#">Aquí</a> </b> y conoce todo el potencial que tiene Hececaze para ti y tu empresa
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
                    <option>Todas los Departamentos</option>
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
                    <th width="20%">Departamento</th>
                    <th width="19%">Empresa</th>
                </tr>
                </thead>
                <tbody id="tbDepatamentos">
                @if ($departamentos->count()>0)
                    @foreach($departamentos as $departamento)
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>{!! $departamento->departamento !!}
                                <div class="OpcionesTabla"><a
                                            onclick="editDepartamento({!! $departamento->id.',event' !!});">Editar</a>
                                    <span class="SeparadorOpcionesTablas">|</span>
                                    <a onclick="eliminarDepartamento({!! $departamento->id !!});">Eliminar</a>
                                </div>
                            </td>
                            <td>{!! $departamento->hez_compania->nomb_Companias !!}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No se encontraron registros</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/Vistas/Mantenimiento/departamentos.js')}}"></script>
@endsection

@section('scriptsEMB')

@endsection

