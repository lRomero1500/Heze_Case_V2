Hola <i>{{ $creaUsrMail->receiver }}</i>,
<p>Este es un mensje de binvenida al universo Heze Case</p>

<p><u>Credenciales de acceso:</u></p>

<div>
    <p><b>Usuario:</b>&nbsp;{{ $creaUsrMail->usuario }}</p>
    <p><b>Pass:</b>&nbsp;{{ $creaUsrMail->pass }}</p>
</div>

Atentamente,
<br/>
<i>{{ $creaUsrMail->sender }}</i>