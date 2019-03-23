/**
 * Created by luisd on 19/03/2018.
 */
var form;
var objValidador;
$(document).ready(function () {
    $('#cerrarForm').click(function (e) {
        $('.imgCortPop').prop('src', '');
        $('#base64FotPerf').prop('value', '');
        $('#formulario').find('input[type=hidden][name!=_token],input:text,select,textarea').val('');
        $('#formulario').find('input:radio, input:checkbox').prop('checked', false);
        if(objValidador!=undefined)
            objValidador.resetForm();
        $('#formulario').css('display', 'none');
    });
    $('img.imgCortPop').on('load', function () {
        $('#base64FotPerf').prop('value', this.src);
    });
});

function guardar(e) {
    InicioCarando();
    form = $('#empresa');
    objValidador=form.validate(/*{
        showErrors: function (errorMap, errorList) {
            e.preventDefault();
            var errs = "";
            $.each(errorList, function (index, item) {
                errs += item.message+'</br>';
            });
            $('#errores').css('visibility', '');
            $('#errores').html('');
            $('#errores').html(errs);
            FinCarando();
        }
    }*/);
    if (!form.valid()) {
        e.preventDefault();
        FinCarando();
    } else {
        var data = $('#empresa').serialize();
        var url = baseUrl + 'mantenimiento/creaEditEmpresas';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        $('.imgCortPop').prop('src', '');
                        ResetForm($('#empresa')[0], e);
                        $('#base64FotPerf').prop('value', '');
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        destruirMask('tel');
                        $('#AlertResp').remove();
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError exito'>" +
                            "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
                        $('#tbCompanias').html('');
                        var tb = "";
                        $.each(resp.table, function (index, item) {
                            tb += '<tr><td><input type="checkbox"/></td> ' +
                                '<td><div class="imgAvatarForm">';
                            if (item.logo_companias == '' || item.logo_companias == null)
                                tb += '<img src=""/></div></td>';
                            else
                                tb += '<img src="' + baseUrl + 'Recursos/1/img/tumbs/' + item.logo_companias + '.png"/></div></td>';
                            tb += '<td>' + item.nomb_Companias +
                                '<div class="OpcionesTabla">' +
                                '<a onclick="editEmpresa(' + item.cod_Companias + ',event);">Editar</a>' +
                                '<span class="SeparadorOpcionesTablas">|</span><a onclick="eliminarEmpresa( ' + item.cod_Companias + ' )">Eliminar</a>' +
                                '</div></td><td>' + item.nit_Companias + '</td>' +
                                '<td>' + item.tel_Companias + '</td>' +
                                '<td>' + item.correo_companias + '</td>' +
                                '<td>' + item.direccion_companias + '</td></tr>';

                        });
                        $('#tbCompanias').html(tb);
                        FinCarando();
                    } else {
                        $('#errores').css('visibility', '');
                        $('#errores').css('color', 'red');
                        $('#errores').html('');
                        $('#errores').html(resp.msg);
                    }

                    FinCarando();
                } else {
                    FinCarando();
                    $('#errores').css('visibility', '');
                    $('#errores').html('');
                    $('#errores').html(resp.msg);
                }

            },
            error: function (resp, textStatus) {
                FinCarando();
                $('#errores').css('visibility', '');
                $('#errores').html('');
                $('#errores').html('Error' + resp.msg);
            }
        });
    }

}

function editEmpresa(idEmpresa, e) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/getEmpresa/';
    $.ajax({
        type: "GET",
        url: url + idEmpresa,
        success: function (resp) {
            if (resp != null && resp != undefined) {
                if ($('#formulario').css('display') == 'none') {
                    $('#formulario').css('display', '');
                    crearMask('tel');
                }
                ResetForm($('#empresa')[0], e);
                $('#idcompanias').prop('value', resp.cod_Companias);
                $('#nomb_Companias').val(resp.nomb_Companias);
                $('#nit_Companias').val(resp.nit_Companias);
                $('#correo_companias').val(resp.correo_companias);
                $('#tel_Companias').val(resp.tel_Companias);
                $('#direccion_companias').val(resp.direccion_companias);
                $('.imgCortPop').prop('src', baseUrl + 'Recursos/1/img/' + resp.logo_companias + '.png');
                $('#base64FotPerf').prop('value', resp.logo_companias);
            } else {
                $('#errores').css('visibility', '');
                $('#errores').html('');
                $('#errores').html('Ocurrio un error, Comuniquese con el departamento de soporte');
            }
            FinCarando();
        },
        error: function (resp, textStatus) {
            FinCarando();
            $('#errores').css('visibility', '');
            $('#errores').html('');
            $('#errores').html('Error' + textStatus);
        }
    });
}

function eliminarEmpresa(idEmpresa) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/delEmpresa/';
    var parametros = {id: idEmpresa};
    $.confirm({
        title: 'Confirmación!',
        typeAnimated: true,
        useBootstrap: false,
        type: 'orange',
        icon: 'fa fa-exclamation-circle',
        boxWidth: '20%',
        content: "¿Desea eliminar este registro?",
        buttons: {
            Ok: function () {
                $.ajax({
                    type: 'POST',
                    url: url + idEmpresa,
                    headers: {'X-CSRF-TOKEN': token},
                    data: JSON.stringify(parametros),
                    contentType: 'application/json; charset=UTF-8',
                    dataType: 'json',
                    success: function (resp) {
                        if (resp.msg != null) {
                            if (!resp.error) {
                                $('#AlertResp').remove();
                                $('#ContenedorAltertas').append(
                                    "<div id='AlertResp' class='AlertasAreaNoError'>" +
                                    "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                                    " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                                    "<p>" + resp.msg + " </p></div>"
                                );
                                $('#tbCompanias').html('');
                                var tb = "";
                                $.each(resp.table, function (index, item) {
                                    tb += '<tr><td><input type="checkbox"/></td> ' +
                                        '<td><div class="imgAvatarForm">';
                                    if (item.logo_companias == '' || item.logo_companias == null)
                                        tb += '<img src=""/></div></td>';
                                    else
                                        tb += '<img src="' + baseUrl + 'Recursos/1/img/tumbs/' + item.logo_companias + '.png"/></div></td>';
                                    tb += '<td>' + item.nomb_Companias +
                                        '<div class="OpcionesTabla">' +
                                        '<a onclick="editEmpresa(' + item.cod_Companias + ',event);">Editar</a>' +
                                        '<span class="SeparadorOpcionesTablas">|</span><a onclick="eliminarEmpresa( ' + item.cod_Companias + ' )">Eliminar</a>' +
                                        '</div></td><td>' + item.nit_Companias + '</td>' +
                                        '<td>' + item.tel_Companias + '</td>' +
                                        '<td>' + item.correo_companias + '</td>' +
                                        '<td>' + item.direccion_companias + '</td></tr>';

                                });
                                $('#tbCompanias').html(tb);
                                FinCarando();
                            } else {
                                $('#ContenedorAltertas').append(
                                    '<div class="AlertasAreaError" >' +
                                    '<table><tr>' +
                                    '<td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 3%">' +
                                    '<span style="color:#FFF" class="fa fa-exclamation fa-2x" aria-hidden="true"></span>' +
                                    '</td>' +
                                    '<td style="padding: 20px;text-align: justify;vertical-align: middle">' +
                                    '<p style="text-wrap: none">' + resp.msg + '</p>' +
                                    '</td></tr></table></div>'
                                );
                                FinCarando();
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('#ContenedorAltertas').append(
                            '<div class="AlertasAreaError" style="display: none">' +
                            '<table><tr>' +
                            '<td style="background-color:#FF5012;text-align: center; vertical-align: middle;width: 3%">' +
                            '<span style="color:#FFF" class="fa fa-exclamation fa-2x" aria-hidden="true"></span>' +
                            '</td>' +
                            '<td style="padding: 20px;text-align: justify;vertical-align: middle">' +
                            '<p style="text-wrap: none">' + errorThrown + '</p>' +
                            '</td></tr></table></div>'
                        );
                        FinCarando();

                    }
                });
            },
            cancelar: function () {
                FinCarando();
            }
        }
    });
}
