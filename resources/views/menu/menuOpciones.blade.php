@foreach($menuOpciones as $item2)
    <li>
        <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}"><i class="fas fa-pencil"></i>
            <h4>{!! $item2->nom_menu !!}</h4></a>
    </li>
    {{--<li>
        <a style="color: #f7f7f7 !important" href="{!! $menu->url_menu !!}">
            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            <h4>{!! $menu->nom_menu !!}</h4>
        </a>
    </li>--}}
@endforeach