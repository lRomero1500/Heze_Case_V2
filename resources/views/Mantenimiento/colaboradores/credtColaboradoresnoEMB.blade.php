@extends('layouts.layoutGeneral')

@section('content')
    <div class="AreaTrabajo">
        <div class="ContenedorAreaTop">
            <div class="tituloAreaTrabajo">
                <h3>Mantenimiento/Colaboradores</h3>
            </div>
            <div class="conteedorIconoAreatrabajo">
                <a id="AddColaborador"><span></span><h4 class="textIcono">Añadir
                        Nuevo</h4></a>
            </div>
        </div>
        <div id="formulario" class="contenedorFormsEditCrea" style="display: none">
            <div class="formsCreaEdit">
                @include('Mantenimiento.colaboradores.credtColaboradoresEMB')
            </div>
        </div>
        <div id="ContenedorAltertas" class="ConetendorAlertasArea">

            <div id="AlertNoError" class="AlertasAreaNoError informe">
                <div id="btnCerrarAlert" class="btnCerrar" onclick="CerraralertaNoError(this);">
                    <button type="button" id="btnCerrar"></button>
                </div>
                <p>
                    En este espacio podrás agregar, editar, eliminar y asignar a los colaboradores de tu empresa; para crear o editar un colaborador de forma correcta es necesario que diligencies todos los campos de manera correcta. para mayor información acerca de <b>cómo crear un colaborador</b> visita la wiki de <b>Hezecase <a href="#">Aquí</a> </b> y conoce todo el potencial que tiene Hececaze para ti y tu empresa
                </p>
            </div>
            <div class="AlertasAreaError" style="display: block">
                <table>
                    <tr>
                        <td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 30px">
                            <span style="color:#FFF" class="fa fa-exclamation fa-2x" aria-hidden="true"></span>
                        </td>
                        <td style="padding: 20px;text-align: justify;vertical-align: middle">
                            <p style="text-wrap: none">
                                Uno o más colaboradores no están asignados a una empresa
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
                    <th>Colaborador</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                </tr>
                </thead>
                <tbody id="tbColaboradores">
                @foreach($Colabors as $colaborador)
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>{!! (explode('/', $colaborador->nombre_Empleado))[2] . ' ' .(explode('/', $colaborador->nombre_Empleado))[3] . ' ' .(explode('/', $colaborador->nombre_Empleado))[0] . ' ' . (explode('/', $colaborador->nombre_Empleado))[1] !!}
                            <div class="OpcionesTabla"><a onclick="editColaborador({!! $colaborador->cod_Empleado !!});">Editar</a> <span
                                        class="SeparadorOpcionesTablas">|</span>
                                <a onclick="eliminarColaborador({!! $colaborador->cod_Empleado !!});">Eliminar</a></div>
                        </td>
                        <td>{{$colaborador->hez_compania->nomb_Companias}}</td>
                        <td>Desarrollo Web</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
