var form;
var objValidador;
$(document).ready(function () {
    $('#cerrarForm').click(function (e) {
        $('#formulario').find('input[type=hidden][name!=_token],input:text,select,textarea').val('');
        $('#formulario').find('input:radio, input:checkbox').prop('checked', false);
        if (objValidador != undefined)
            objValidador.resetForm();
        $('#formulario').css('display', 'none');
    });
});

function guardar(e) {
    InicioCarando();
    form = $('#clientes');
    objValidador = form.validate();
    if (!form.valid()) {
        e.preventDefault();
        FinCarando();
    } else {
        var data = $('#clientes').serialize();
        var url = baseUrl + 'mantenimiento/creaEditClientes';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        $(form).trigger("reset");
                        ResetForm(form, e);
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        $('#AlertResp').remove();
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError exito'>" +
                            "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
                        $('#tbClientes').html('');
                        var tb = "";
                        if (resp.rol === 1) {
                            $.each(resp.table, function (index, item) {
                                tb += '<tr>' +
                                    '<td><input type="checkbox"/></td>\n' +
                                    '<td>' + item.hez_compania.nomb_Companias +
                                    '<div class="OpcionesTabla">' +
                                    '<a disabled="disabled">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                    '<a onclick="eliminarCliente(' + item.id + ');">Eliminar</a></div></td>' +
                                    '<td>'+item.hez_compania_cliente.nomb_Companias+'</td>';
                            });
                        } else {
                            $.each(resp.table, function (index, item) {
                                $.each(resp.table, function (index, item) {
                                    tb += '<tr>' +
                                        '<td><input type="checkbox"/></td>\n' +
                                        '<td>' + item.hez_compania.nomb_Companias +
                                        '<div class="OpcionesTabla">' +
                                        '<a disabled="disabled">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                        '<a onclick="eliminarCliente(' + item.id + ');">Eliminar</a></div></td>';
                                });
                            });
                        }

                        $('#tbClientes').html(tb);
                        FinCarando();
                    } else {
                        $(form).trigger("reset");
                        ResetForm(form, e);
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        $('#AlertResp').remove();
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError eliminado'>" +
                            "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
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

function eliminarCliente(idDep) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/delCliente/';
    var parametros = {id: idDep};
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
                    url: url + idDep,
                    headers: {'X-CSRF-TOKEN': token},
                    data: JSON.stringify(parametros),
                    contentType: 'application/json; charset=UTF-8',
                    dataType: 'json',
                    success: function (resp) {
                        if (resp.msg != null) {
                            if (!resp.error) {
                                $('#AlertResp').remove();
                                $('#ContenedorAltertas').append(
                                    "<div id='AlertResp' class='AlertasAreaNoError eliminado'>" +
                                    "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                                    " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                                    "<p>" + resp.msg + " </p></div>"
                                );
                                $('#tbClientes').html('');
                                var tb = "";
                                if (resp.rol === 1) {
                                    if (resp.table.length > 0) {
                                        $.each(resp.table, function (index, item) {
                                            tb += '<tr>' +
                                                '<td><input type="checkbox"/></td>\n' +
                                                '<td>' + item.hez_compania.nomb_Companias +
                                                '<div class="OpcionesTabla">' +
                                                '<a disabled="disabled">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                                '<a onclick="eliminarCliente(' + item.id + ');">Eliminar</a></div></td>' +
                                                '<td>'+item.hez_compania_cliente.nomb_Companias+'</td>';
                                        });
                                    } else {
                                        tb += '<tr><td colspan="3">No se encontraron registros</td></tr>';
                                    }
                                } else {
                                    if (resp.table.length > 0) {
                                        $.each(resp.table, function (index, item) {
                                            $.each(resp.table, function (index, item) {
                                                tb += '<tr>' +
                                                    '<td><input type="checkbox"/></td>\n' +
                                                    '<td>' + item.hez_compania.nomb_Companias +
                                                    '<div class="OpcionesTabla">' +
                                                    '<a disabled="disabled">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                                    '<a onclick="eliminarCliente(' + item.id + ');">Eliminar</a></div></td>';
                                            });
                                        });
                                    } else {
                                        tb += '<tr><td colspan="2">No se encontraron registros</td></tr>';
                                    }
                                }
                                $('#tbClientes').html(tb);
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
