@extends('layouts.layoutGeneral')

@section('headers')

@endsection

@section('content')
    <?php $rol = \Illuminate\Support\Facades\Auth::user()->hez_role->cod_Rol; ?>
    <div class="AreaTrabajo">
        <div class="ContenedorAreaTop">
            <div class="tituloAreaTrabajo">
                <h3>Mantenimiento/Clientes</h3>
            </div>
            <div class="conteedorIconoAreatrabajo">
                <a id="AddClientes"><span></span><h4 class="textIcono">Añadir
                        Nuevo</h4></a>
            </div>
        </div>
        <div id="formulario" class="contenedorFormsEditCrea" style="display: none">
            <div class="formsCreaEdit">
                @include('Mantenimiento.clientes.credtclientesEMB')
            </div>
        </div>
        <div id="ContenedorAltertas" class="ConetendorAlertasArea">
            <div id="AlertNoError" class="AlertasAreaNoError informe">
                <div id="btnCerrarAlert" class="btnCerrar" onclick="CerraralertaNoError(this);">
                    <button type="button" id="btnCerrar"></button>
                </div>
                <p>
                    En este espacio podrás agregar, editar y eliminar los clientes de tu empresa; para
                    crear o editar un cliente de forma correcta es necesario que diligencies todos los campos de manera
                    correcta. para mayor información acerca de <b>cómo crear un Cliente</b> visita la wiki de <b>Hezecase
                        <a
                                href="#">Aquí</a> </b> y conoce todo el potencial que tiene Hececaze para ti y tu
                    empresa
                </p>
            </div>
            @if (!($clientes->count()>0))
                <div class="AlertasAreaError" style="">
                    <table>
                        <tr>
                            <td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 30px">
                                <span style="color:#FFF" class="fa fa-exclamation fa-2x" aria-hidden="true"></span>
                            </td>
                            <td style="padding: 20px;text-align: justify;vertical-align: middle">
                                <p style="text-wrap: none">
                                    No tienes clientes creados
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif

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
                    @if($rol===1)
                        <th width="49%">Empresa</th>
                    @endif
                    <th width="49%">Cliente</th>
                </tr>
                </thead>
                <tbody id="tbClientes">
                @if ($clientes->count()>0)
                    @if($rol===1)
                        @foreach($clientes as $cliente)
                            <tr>
                                <td><input type="checkbox"/></td>
                                <td>{!! $cliente->hez_compania->nomb_Companias !!}
                                    <div class="OpcionesTabla"><a
                                                disabled="disabled">Editar</a>
                                        <span class="SeparadorOpcionesTablas">|</span>
                                        <a onclick="eliminarCliente({{$cliente->id}})">Eliminar</a>
                                    </div>
                                </td>
                                <td>{!! $cliente->hez_compania_cliente->nomb_Companias  !!}</td>
                            </tr>
                        @endforeach
                    @else
                        @foreach($clientes as $cliente)
                            <tr>
                                <td><input type="checkbox"/></td>
                                <td>{!! $cliente->hez_compania_cliente->nomb_Companias !!}
                                    <div class="OpcionesTabla"><a
                                                disabled="disabled">Editar</a>
                                        <span class="SeparadorOpcionesTablas">|</span>
                                        <a onclick="eliminarCliente({{$cliente->id}})">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @else
                    @if($rol===1)
                        <tr>
                            <td colspan="3">No se encontraron registros</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2">No se encontraron registros</td>
                        </tr>
                    @endif

                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('scriptsEMB')

@endsection