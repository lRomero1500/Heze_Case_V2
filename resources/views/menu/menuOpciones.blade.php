@foreach($menuOpciones as $item2)
    <li>
        @if($item2->cod_menu==$activo)
            <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}" class="opcionMenuActivo"><i
                        class="{!! $item2->url_icono !!}"></i>
                <h4>{!! $item2->nom_menu !!}</h4></a>
            @if(($menuOpcionesHijos->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1))->count()>0)
                @foreach(($menuOpcionesHijos->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1)) as $item3)
                    <ul class="LatNavpadre">
                        <li>
                            <p class="fa fa-circle fa-fw LatNavAletasPadres"></p><a
                                    style="color: #f7f7f7 !important"  href="{!! $item3->url_menu !!}"><h4>{!! $item3->nom_menu !!}</h4></a>
                        </li>
                    </ul>
                @endforeach
            @endif

        @else
            <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}"><i class="{!! $item2->url_icono !!}"></i>
                <h4>{!! $item2->nom_menu !!}</h4></a>
            @if(($menuOpcionesHijos->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1))->count()>0)
                @foreach(($menuOpcionesHijos->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1)) as $item3)
                    <ul class="LatNavpadre">
                        <li>
                            <p class="fa fa-circle fa-fw LatNavAletasPadres"></p><a
                                    style="color: #f7f7f7 !important"  href="{!! $item3->url_menu !!}"><h4>{!! $item3->nom_menu !!}</h4></a>
                        </li>
                    </ul>
                @endforeach
            @endif
        @endif
    </li>
@endforeach
{{--
@foreach(($menu->where('pos_menu',1)->where('cod_menu_padre',0)) as $item2)
    <li>
        <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}"><i class="fas fa-pencil"></i>
            <h4>{!! $item2->nom_menu !!}</h4></a>

        @if(($menu->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1))->count()>0)
            <ul class="LatNavpadre">
                <li>
                    <p class="fa fa-circle fa-fw LatNavAletasPadres"></p><a
                            style="color: #f7f7f7 !important" href="#"><h4>Cotizador</h4></a>
                    @foreach(($menu->where('cod_menu_padre',$item2->cod_menu)->where('pos_menu',1)) as $item3)
                        <p class="fa fa-circle fa-fw LatNavAletasPadres"></p><a style="color: #f7f7f7 !important"
                                                                                href="#"><h4>Cotizador</h4></a>
                        <ul class="LatNavHijo">
                            <li><a style="color: #f7f7f7 !important" href="dashboard/crm/empresas"><h4>Empresa</h4></a>
                            </li>
                        </ul>
                        <ul class="LatNavAletashijos">
                            <li><a style="color: #f7f7f7 !important" href="dashboard/crm/clientes"><h4>Clientes</h4></a>
                            </li>
                        </ul>
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
    <li>
        <a style="color: #f7f7f7 !important" href="{!! $menu->url_menu !!}">
            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            <h4>{!! $menu->nom_menu !!}</h4>
        </a>
    </li>
@endforeach--}}
