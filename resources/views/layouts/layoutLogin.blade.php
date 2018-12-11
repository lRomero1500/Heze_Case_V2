<!DOCTYPE html>
<html lang="es-es">
<head>
    <title>{!! $title_page !!} :: Hezecase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ csrf_token() }}">
    <base href="{!! URL::to('/').'/' !!}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    @yield('headers')
</head>
<body style="text-align: center">
{{--<div id="app">--}}
    <div class="contenedor">
        @yield('content')
    </div>
{{--</div>--}}
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
<script src="{{ asset('js/loading.js') }}"></script>
<script src="{{asset('js/Util.js')}}"></script>
@yield('scripts')
</html>
