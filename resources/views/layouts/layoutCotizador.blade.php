<!DOCTYPE html>
<html lang="es-es">
<head>
    <title>{!! $title_page !!} :: Hezecase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ csrf_token() }}">
    <base href="{!! URL::to('/').'/' !!}"/>
    <link href="CSS/normalize.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="CSS/styleCotizadorFrontEnd.css">
    <link href="CSS/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="CSS/loading.css" rel="stylesheet"/>
    <script src="JS/loading.js"></script>
    <script src="/JS/Util.js"></script>
</head>
<body style="width: 100%;margin-top: 60px;background: #f2f2f2;">
<header class="headerFrontEnd">
    <div class="ContentLeftlogo">
        <img class="ContentlogoImg" src="img/Logo_Header_arcia.png">
    </div>
    <div class="ContentRightInfoMenuHeader">
        <div class="ContentMenuheader">
            <nav class="nav">
                <li>
                    <div class="IconoMenuBar">
                        <a href="" id="iconoMenuTop">
                            <i class="fa fa-th-large" aria-hidden="true"></i>
                        </a>
                    </div>
                    <ul>
                        <li class="ContentNavheader">
                            <div class="Flecha"></div>
                            <ul class="Navheader">
                                {{-- <li>
                                     <a style="color: #f7f7f7 !important" href="front/cotizador">
                                         <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                         <h4>Cotizador</h4>
                                     </a>
                                 </li>
                                 <li>
                                     <a style="color: #f7f7f7 !important" href="{!! URL::to('/').'/' !!}">
                                         <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                         <h4>Dashboard</h4>
                                     </a>
                                 </li>--}}
                                @foreach(session('menu') as $menu)
                                    <li>
                                        <a style="color: #f7f7f7 !important" href="{!! $menu->url_menu !!}">
                                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                            <h4>{!! $menu->nom_menu !!}</h4>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
            </nav>
        </div>
        <div class="Avatar">
            <h1>
                <?php
                $ini= mb_substr((explode('/',Auth::user()->empleados->nombre_Empleado))[2],0,1).mb_substr((explode('/',Auth::user()->empleados->nombre_Empleado))[0],0,1);
                echo $ini;
                ?>
            </h1>
        </div>
        <div class="Nombre">
            <h5>
                <?php
                $nombre= (explode('/',Auth::user()->empleados->nombre_Empleado))[2].' '.(explode('/',Auth::user()->empleados->nombre_Empleado))[0];
                echo $nombre;
                ?>
            </h5>
        </div>
    </div>
</header>
<table class="contentMenuServicios">
    <tr>
        <td class="tituloServicios">
            <h6>Agrega un servicio</h6>
        </td>
        <td>
            <nav class="nav2">
                <li class="nav2Servicios">
                    <a style="color: #f7f7f7 !important" href="#">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <h4>Marketing digital</h4>
                    </a>
                    <ul>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                    </ul>
                </li>
                <li class="nav2Servicios">
                    <a style="color: #f7f7f7 !important" href="#">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <h4>Desarrollo web</h4>
                    </a>
                    <ul>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>Landing Page</h4>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>One Page</h4>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>Website</h4>
                                <ul>
                                    <a style="color: #f7f7f7 !important" href="#">
                                        <li class="menuHijoServicios2">
                                            <h4>CMS</h4>
                                        </li>
                                    </a>
                                    <a style="color: #f7f7f7 !important" href="#">
                                        <li class="menuHijoServicios2">
                                            <h4>Desarrollo</h4>
                                        </li>
                                    </a>
                                </ul>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>e-Commerce</h4>
                            </li>
                        </a>
                    </ul>
                </li>
                <li class="nav2Servicios">
                    <a style="color: #f7f7f7 !important" href="#">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <h4>Desarrollo de software</h4>
                    </a>
                    <ul>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                    </ul>
                </li>
                <li class="nav2Servicios">
                    <a style="color: #f7f7f7 !important" href="#">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <h4>Desarrollo de APPs</h4>
                    </a>
                    <ul>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                    </ul>
                </li>
                <li class="nav2Servicios">
                    <a style="color: #f7f7f7 !important" href="#">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <h4>Diseño de marca</h4>
                    </a>
                    <ul>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                        <a style="color: #f7f7f7 !important" href="#">
                            <li class="menuHijoServicios">
                                <h4>otro</h4>
                            </li>
                        </a>
                    </ul>
                </li>
            </nav>
        </td>
    </tr>
</table>
@yield('content');
<footer class="FooterFrontEnd">
    <div class="ContenedorTextDerechosFooter">
        <p class="TextDerechosFooter">&copy {!! date('Y') !!} Creado por Grupo Arcia S.A.S- Prohibida su reproducción total o parcial | <a href="https://arciait.com" class="red">Arciait</a></p>
    </div>
    <div class="ContenedorImgFooter">
        <img class="imgFooterLogo" src="Img/Logo_Lateral_hezecase.png">
    </div>
</footer>
</body>
</html>