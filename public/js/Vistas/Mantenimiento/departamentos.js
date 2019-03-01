var form;
var objValidador;
$(document).ready(function () {
    $('#cerrarForm').click(function () {
        $('#formulario').find('input:text,select,textarea').val('');
        $('#formulario').find('input:radio, input:checkbox').prop('checked', false);
        if(objValidador!=undefined)
            objValidador.resetForm();
        $('#formulario').css('display', 'none');
    });
});
function guardar(e) {
    InicioCarando();
    form = $('#departamentos');
    objValidador= form.validate();
    if (!form.valid()) {
        e.preventDefault();
        FinCarando();
    }
    else {
        var data = $('#departamentos').serialize();
        var url = baseUrl + 'mantenimiento/creaEditDepartamentos';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        $(form).trigger("reset");
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError'>" +
                            "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
                        $('#tbDepatamentos').html('');
                        var tb = "";
                        $.each(resp.table, function (index, item) {
                            tb += '<tr>' +
                                '<td><input type="checkbox"/></td>\n' +
                                '<td>' +item.departamento+
                                '<div class="OpcionesTabla">' +
                                '<a onclick="editDepartamento('+item.id+');">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                '<a onclick="eliminarDepartamento('+item.id+');">Eliminar</a></div>' +
                                '</td>'+
                                '<td>'+item.hez_compania.nomb_Companias+'</td>' +
                                '</tr>';
                        });
                        $('#tbDepatamentos').html(tb);
                        FinCarando();
                    }
                    else {
                        $('#errores').css('visibility', '');
                        $('#errores').css('color', 'red');
                        $('#errores').html('');
                        $('#errores').html(resp.msg);
                    }

                    FinCarando();
                }
                else {
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
function editDepartamento(idDep) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/getDepartamento/';
    $.ajax({
        type: "GET",
        url: url + idDep,
        success: function (resp) {
            if (resp != null && resp != undefined) {
                if ($('#formulario').css('display') == 'none') {
                    $('#formulario').css('display', '');
                }
                document.getElementById("departamentos").reset();
                $('#departamento').val(resp.departamento);
                $('#cod_Companias').val(resp.hez_compania.cod_Companias);
            }
            else {
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
function eliminarDepartamento(idDep) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/delDepartamento/';
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
                                $('#ContenedorAltertas').append(
                                    "<div id='AlertResp' class='AlertasAreaNoError'>" +
                                    "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                                    " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                                    "<p>" + resp.msg + " </p></div>"
                                );
                                $('#tbDepatamentos').html('');
                                var tb = "";
                                $.each(resp.table, function (index, item) {
                                    tb += '<tr>' +
                                        '<td><input type="checkbox"/></td>\n' +
                                        '<td>' +item.departamento+
                                        '<div class="OpcionesTabla">' +
                                        '<a onclick="editDepartamento('+item.id+');">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                        '<a onclick="eliminarDepartamento('+item.id+');">Eliminar</a></div>' +
                                        '</td>'+
                                        '<td>'+item.hez_compania.nomb_Companias+'</td>' +
                                        '</tr>';
                                });
                                $('#tbDepatamentos').html(tb);
                                FinCarando();
                            }
                            else {
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
