@extends('layouts/layoutGeneral')


@section('content')
<div class="AreaTrabajo">
    <div class="ContenedorAreaTop">
        <div class="tituloAreaTrabajo">
            <h3>Cotizador/Clientes</h3>
        </div>
        <div class="conteedorIconoAreatrabajo">
            <a href="#"><i class="iconoAreatrabajo fa fa-plus fa-fw" aria-hidden="true"></i><h4 class="textIcono">Añadir Nuevo</h4></a>
        </div>
    </div>
    <div class="ConetendorAlertasArea" style="">
        <div id="AlertNoError" class="AlertasAreaNoError">
            <i id="btnCerrarAlert" style="cursor: pointer;" class="CerrarAlertasAreaNoError fa fa-times fa-fw" aria-hidden="true"></i>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Superiores tres erant, quae esse possent, quarum est una sola defensa, eaque vehementer. Omnia contraria, quos etiam insanos esse vultis. Non autem hoc: igitur ne illud quidem. Istam voluptatem, inquit, Epicurus ignorat? Ergo instituto veterum, quo etiam Stoici utuntur.
            </p>
        </div>
        <div class="AlertasAreaError">
            <table>
                <tr>
                    <td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 3%">
                        <span style="color:#FFF" class="fa fa-exclamation fa-2x" aria-hidden="true"></span>
                    </td>
                    <td style="padding: 20px;text-align: justify;vertical-align: middle">
                        <p style="text-wrap: none">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Superiores tres erant, quae esse possent, quarum est una sola defensa, eaque vehementer. Omnia contraria, quos etiam insanos esse vultis. Non autem hoc: igitur ne illud quidem. Istam voluptatem, inquit, Epicurus ignorat? Ergo instituto veterum, quo etiam Stoici utuntur.
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
                    <th width="2%"><input type="checkbox" /></th>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Colaborador</th>
                    <th>Servicio</th>
                </tr>
            </thead>
            <tbody>
                <tr >
                    <td><input type="checkbox" /></td>
                    <td>Freddy Arcia <div class="OpcionesTabla"><a href="#">Editar</a> <span class="SeparadorOpcionesTablas">|</span> <a href="#">Eliminar</a></div></td>
                    <td>Grupo Arcia S.A.S</td>
                    <td>Luis Romero</td>
                    <td>Desarrollo Web</td>
                </tr>
                <tr >
                    <td><input type="checkbox" /></td>
                    <td>Freddy Arcia <div class="OpcionesTabla"><a href="#">Editar</a> <span class="SeparadorOpcionesTablas">|</span> <a href="#">Eliminar</a></div></td>
                    <td>Grupo Arcia S.A.S</td>
                    <td>Luis Romero</td>
                    <td>Desarrollo Web</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#btnCerrarAlert').click(function () {
                $('#AlertNoError').css('display','none');
            });
        });
    </script>

@endsection