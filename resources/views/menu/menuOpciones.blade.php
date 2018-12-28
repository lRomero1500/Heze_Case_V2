@foreach($menuOpciones as $item2)
    <li>
        @if($item2->cod_menu==$activo)
            <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}" class="opcionMenuActivo"><i class="fas fa-pencil"></i>
                <h4>{!! $item2->nom_menu !!}</h4></a>
        @else
            <a style="color: #f7f7f7 !important" href="{!! $item2->url_menu !!}"><i class="fas fa-pencil"></i>
                <h4>{!! $item2->nom_menu !!}</h4></a>
        @endif
    </li>
@endforeach