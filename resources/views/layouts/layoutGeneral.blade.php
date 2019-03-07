<!DOCTYPE html>
<html lang="es-es">
<head>
    <title>{!! $title_page !!} :: Hezecase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ csrf_token() }}">
    <base href="{!! URL::to('/').'/' !!}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/freddy.css') }}" rel="stylesheet" type="text/css"/>
    @yield('headers')
</head>
<body>
<header class="headerFrontEnd">
    <div class="ContentLeftlogo">
        <img class="ContentlogoImg" src="Img/Logo_Header_arcia.png">
        <div class="contInBox">
            <i class="fas fa-envelope"></i>
        </div>
    </div>
    <div class="ContentRightInfoMenuHeader">
        <div class="Nombre">
            <h5>
                <?php
                $nombre = (explode('/', Auth::user()->hez_empleado->nombre_Empleado))[2] . ' ' . (explode('/', Auth::user()->hez_empleado->nombre_Empleado))[0];
                echo $nombre;
                ?>
            </h5>
            <div class="contMenuUsuario">
                <i class="fas fa-angle-down"></i>
                <div class="itemMenu">
                    <label onclick="window.location.href='Usuario/misdatos'">Ver mis datos</label>
                    <label onclick="window.location.href='acceso/logout'">Cerrar sesión</label>
                </div>
            </div>
        </div>
        @if(!empty(Auth::user()->hez_empleado->url_ImgPerfil))
            <div class="Avatar" style="background: url('{!! asset('Recursos/1/img/tumbs/'.Auth::user()->hez_empleado->url_ImgPerfil.'.png') !!}')">
                <h1>
                </h1>
            </div>
        @else
            <div class="Avatar">
                <h1>
                    <?php
                    $ini = mb_substr((explode('/', Auth::user()->hez_empleado->nombre_Empleado))[2], 0, 1) . mb_substr((explode('/', Auth::user()->hez_empleado->nombre_Empleado))[0], 0, 1);
                    echo $ini;
                    ?>
                </h1>
            </div>
        @endif

        <div class="ContentMenuheader">
            <nav class="nav">
                <li>
                    <div class="IconoMenuBar">
                        <a id="iconoMenuTop">
                            <i class="fa fa-th-large iconoMenuNav"></i>
                        </a>
                    </div>
                    <ul>
                        <li class="ContentNavheader">
                            <div class="Flecha"></div>
                            <ul class="Navheader">
                                <?php $menu = session('menu'); ?>
                                @foreach($menu->where('pos_menu',2) as $item)
                                    <li>
                                        <a style="color: #f7f7f7 !important"
                                           href="@if($item->url_menu=='/'){!! '' !!} @else {!! $item->url_menu !!} @endif">
                                            <i class="{!! $item->url_icono !!}"></i>
                                            <h4>{!! $item->nom_menu !!}</h4>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
            </nav>
        </div>
    </div>
</header>
<div class="contGeneral">
    <div class="ContenedorMenuLateral">
        <div class="ContentMenuLat">
            <div class="ContentLatNav">
                <nav class="LatNav">
                    @include('menu.menuOpciones')
                    {{--@foreach(($menu->where('pos_menu',1)->where('cod_menu_padre',0)) as $item2)
                        <li>
                            <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}"><i class="fas fa-pencil"></i>
                                <h4>{!! $item2->nom_menu !!}</h4></a>

                            @if(($menu->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1))->count()>0)
                                <ul class="LatNavpadre">
                                    <li>
                                        <p class="fa fa-circle fa-fw LatNavAletasPadres"></p><a
                                                style="color: #f7f7f7 !important" href="#"><h4>Cotizador</h4></a>
                                        @foreach(($menu->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1)) as $item3)
                                            --}}{{--<p  class="fa fa-circle fa-fw LatNavAletasPadres"></p><a style="color: #f7f7f7 !important" href="#"><h4>Cotizador</h4></a>
                                            <ul class="LatNavHijo"><li><a style="color: #f7f7f7 !important" href="dashboard/crm/empresas"><h4>Empresa</h4></a></li></ul>
                                            <ul class="LatNavAletashijos"><li><a style="color: #f7f7f7 !important" href="dashboard/crm/clientes"><h4>Clientes</h4></a></li></ul>--}}{{--
                                            <ul class="LatNavHijo">
                                                <li><a style="color: #f7f7f7 !important"
                                                       href="{!! $item3->url_menu !!}"><h4>{!! $item3->nom_menu !!}</h4>
                                                    </a></li>
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                            @endif
                        </li>
                        --}}{{--<li>
                            <a style="color: #f7f7f7 !important" href="{!! $menu->url_menu !!}">
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                <h4>{!! $menu->nom_menu !!}</h4>
                            </a>
                        </li>--}}{{--
                    @endforeach--}}

                </nav>
            </div>
        </div>
    </div>
    <div id="app" class="ContenedorAreaTrabajo">
        @yield('content')

        <div class="contGeneralTimeLapse" id="contGeneralTimeLapse">
            <div class="contIcono activo" id="btnAbriCerrarTimeLapse">
                <span class="icono"></span>
            </div>
            <div class="contTimerTarea">
                <span>Nombre proyecto</span><span>Nombre de tarea</span><span>00:05:45</span>
            </div>
            <div class="contenidoTimeLapse">
                <h1 class="titulo">Time lapse</h1>
                <div class="contTarea">
                    <label>Proyecto:</label><select title="Seleccione un empresa" name="cod_Companias" id="cod_Companias" required="required" data-rule-required="true" data-msg-required="Seleccione la empresa del departamento" class="Btn-GrupoOpciones">
                        <option value="">--Seleccione un proyecto--</option> <option value="1">Proyecto 1</option> <option value="2">fdsfsdfds</option> <option value="21">rwerwer</option></select>
                </div>
                <div class="contTarea">
                    <label>Tarea:</label><select title="Seleccione un empresa" name="cod_Companias" id="cod_Companias" required="required" data-rule-required="true" data-msg-required="Seleccione la empresa del departamento" class="Btn-GrupoOpciones">
                        <option value="">--Seleccione una tarea--</option> <option value="1">Tarea 1</option> <option value="2">fdsfsdfds</option> <option value="21">rwerwer</option></select>
                </div>
            </div>
            <div class="contControlesTimeLapse">
                <div>
                    <span class="play"></span>
                    <span class="Stop"></span>
                </div>
            </div>
            <div class="contTimeLapse">
                <div class="contBarraTiempo">
                    <div class="barraTiempo">
                        <div class="tiempo">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="FooterFrontEnd">
    <div class="ContenedorTextDerechosFooter">
        <p class="TextDerechosFooter">&copy {!! date('Y') !!} Creado por Grupo Arcia S.A.S- Prohibida su reproducción
            total o parcial | <a href="https://arciait.com" class="red">Arciait</a></p>
    </div>
    <div class="ContenedorImgFooter">
        <img class="imgFooterLogo" src="Img/Logo_Lateral_hezecase.png">
    </div>
</footer>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/loading.js') }}"></script>
<script src="{{asset('js/Util.js')}}"></script>
@yield('scripts')
@yield('scriptsEMB')
</html>
