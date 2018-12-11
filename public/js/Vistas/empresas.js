/**
 * Created by luisd on 19/03/2018.
 */
var form;

function guardar(e) {
    InicioCarando();
    form = $('#empresa');
    form.validate(/*{
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
    }
    else {
        var data = $('#empresa').serialize();
        var url = baseUrl + 'CreaEditEmpresa';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        ResetForm($('#empresa')[0], e);
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        destruirMask('tel');
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError'>" +
                            "<i onclick='cerrarResp();' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
                        $('#tbCompanias').html('');
                        var tb = "";
                        $.each(resp.table, function (index, item) {
                            tb += '<tr><td><input type="checkbox"/></td><td>' + item.nomb_Companias +
                                '<div class="OpcionesTabla">' +
                                '<a onclick="editEmpresa(' + item.cod_Companias + ');">Editar</a>' +
                                '<span class="SeparadorOpcionesTablas">|</span><a href="#">Eliminar</a>' +
                                '</div></td><td>' + item.nit_Companias + '</td>' +
                                '<td>' + item.tel_Companias + '</td>' +
                                '<td>' + item.correo_companias + '</td>' +
                                '<td>' + item.direccion_companias + '</td></tr>';

                        });
                        $('#tbCompanias').html(tb);
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

function editEmpresa(idEmpresa, e) {
    InicioCarando();
    var url = baseUrl + 'getEmpresa/';
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

function eliminarEmpresa(idEmpresa) {
    InicioCarando();
    var url = baseUrl + 'deleteEmpresa/';
    var parametros = {id: idEmpresa};
    $("#Confirm").dialog({
        buttons: {
            "Aceptar": function () {
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
                                $('#ContenedorAltertas').append(
                                    "<div id='AlertResp' class='AlertasAreaNoError'>" +
                                    "<i onclick='cerrarResp();' style='cursor: pointer;'" +
                                    " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                                    "<p>" + resp.msg + " </p></div>"
                                );
                                $('#tbCompanias').html('');
                                var tb = "";
                                $.each(resp.table, function (index, item) {
                                    tb += '<tr><td><input type="checkbox"/></td><td>' + item.nomb_Companias +
                                        '<div class="OpcionesTabla">' +
                                        '<a onclick="editEmpresa(' + item.cod_Companias + ');">Editar</a>' +
                                        '<span class="SeparadorOpcionesTablas">|</span><a href="#">Eliminar</a>' +
                                        '</div></td><td>' + item.nit_Companias + '</td>' +
                                        '<td>' + item.tel_Companias + '</td>' +
                                        '<td>' + item.correo_companias + '</td>' +
                                        '<td>' + item.direccion_companias + '</td></tr>';

                                });
                                $('#tbCompanias').html(tb);
                                $("#Confirm").dialog("close");
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
                                $("#Confirm").dialog("close");
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
                        $("#Confirm").dialog("close");
                        FinCarando();

                    }
                });
            },
            "Cancelar": function () {
                $("#Confirm").dialog("close");
                FinCarando();
                //this.attr("style", "background-color:blue")
            }
        },
        open: function (event, ui) {
            $(".ui-dialog-titlebar-close", ui.dialog).hide();
        },
        resizable: false,
        draggable: false
    });

    $("#Confirm").dialog("open");

}