@extends('layouts/layoutLogin')

@section('headers')
    <link href="{{ asset('css/erroresLogin.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="logo-login">
        <img src="Img/Logo_Hezecase_login.png">
    </div>
    <div class="usps-login">
        <div id="avatar" style="display: none">
            <div class="login-Avatar">
                <h1 id="ini"></h1>
            </div>
            <h2 id="nomUsr"></h2>
        </div>

        <h6 id="textNomCont">Nombre</h6>

        <form id="login" method="POST">
            {!! csrf_field() !!}
            <div id="Usr" style="display:block ">
                <input class="login-control" type="text" name="usrName" id="usrName"
                       placeholder="Ingrese aquí su correo electrónico" data-validation="email" data-validation-event="keyup"/>
                <input id="btnValida" type="button" class="btn-login" value="Validar" onclick="validar();">
            </div>
            <div id="Pass" style="display: none">
                <input class="login-control" type="password" name="usrPass" id="usrPass"
                       placeholder="Ingrese aquí su contraseña" data-validation="required" data-validation-event="keyup"/>
                <input id="btnIngresa" type="button" class="btn-login" value="Ingresar" onclick="ingresar();"/>
            </div>
        </form>
    </div>
    <div id="passForgot" class="passForgot" style="display: none">
        <a href="#" style="color: #008080;text-decoration: none">Olvide mi contraseña</a>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/Vistas/ControlAcceso/login.js')!!}"></script>
@endsection

