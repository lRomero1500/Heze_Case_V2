var mailValido;
var PasValido;
$(document).ready(function () {
    $('#usrName').focus();
    document.addEventListener("keydown", function (event) {
        if ((event.keyCode == 13) && ($('#Usr').css('display') == 'block')) {
            $('#btnValida').click();
        }
        else if ((event.keyCode == 13) && ($('#Pass').css('display') == 'block')) {
            $('#btnIngresa').click()
        }
    });

});

$.validate({
    form: '#login',
    language: Traduccion,
    validateOnEvent:true,
    onElementValidate: function (valid, $el, $form, errorMess) {
        if ($el.attr('name') == 'usrName') {
            mailValido = valid;
        }
        else if ($el.attr('name') == 'usrPass'){
            PasValido=valid;
        }
    }
});
function validar() {
    if (mailValido) {
        var data = $('#login').serialize();
        var url = baseUrl+"valida";

        InicioCarando();
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg == null) {
                    $('#textNomCont').html('');
                    $('#textNomCont').html('Contraseña');
                    $('#ini').html(resp.ini);
                    $('#nomUsr').html(resp.nombre);
                    $('#Usr').hide();
                    $('#Pass').show("slow");
                    $('#avatar').show("slow");
                    $('#passForgot').show("slow");
                    $('#usrPass').focus();
                    FinCarando();
                }
                else {
                    FinCarando();
                    alertaError(resp.msg);
                }

            },
            error: function (resp, textStatus) {
                FinCarando();
                alertaError(resp.responseText);
            }
        });
    }
}
function ingresar() {
    if(PasValido){
        var data = $('#login').serialize();
        var url = baseUrl+"ingresa";
        InicioCarando();
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (!resp.error) {
                    window.location.href = baseUrl + resp.msg;
                }
                else {
                    alertaError(resp.msg);
                    FinCarando();
                }
            },
            error: function (resp, textStatus) {
                FinCarando();
                alertaError(resp.responseText);
            }
        });
    }
}