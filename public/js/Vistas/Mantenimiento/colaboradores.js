var form;
var objValidador;
$(document).ready(function () {
    $('#cerrarForm').click(function (e) {
        $('.imgCortPop').prop('src', '');
        $('#base64FotPerf').prop('value', '');
        destruirMask('tel');
        destruirDatePick('dat');
        $('#formulario').find('input:text,select,textarea').val('');
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
    form = $('#colaborador');
    objValidador=form.validate();
    if (!form.valid()) {
        e.preventDefault();
        FinCarando();
    }
    else {
        var data = $('#colaborador').serialize();
        var url = baseUrl + 'mantenimiento/creaEditColaboradores';
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
                        destruirMask('tel');
                        destruirDatePick('dat');
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError'>" +
                            "<i onclick='CerraralertaNoError(this);' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
                        $('#tbColaboradores').html('');
                        var tb = "";
                        $.each(resp.table, function (index, item) {
                            var arrNombre=item.nombre_Empleado.split('/');
                            tb += '<tr>' +
                                '<td><input type="checkbox"/></td>\n' +
                                '<td>' +arrNombre[2]+' '+arrNombre[3]+' '+arrNombre[0]+' '+arrNombre[1]+
                                '<div class="OpcionesTabla">' +
                                '<a onclick="editColaborador('+item.cod_Empleado+');">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                '<a onclick="eliminarColaborador('+item.cod_Empleado+');">Eliminar</a></div>' +
                                '</td>'+
                                '<td>'+item.compania.nomb_Companias+'</td>' +
                                '<td>Desarrollo Web</td>' +
                                '</tr>';
                        });
                        $('#tbColaboradores').html(tb);
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
function editColaborador(idUsuario) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/getColaborador/';
    $.ajax({
        type: "GET",
        url: url + idUsuario,
        success: function (resp) {
            if (resp != null && resp != undefined) {
                if ($('#formulario').css('display') == 'none') {
                    $('#formulario').css('display', '');
                    crearMask('tel');
                    crearDatePick('dat');
                }
                document.getElementById("colaborador").reset();
                var nombres= (resp.nombre_Empleado).split('/');
                $('#idEmpleado').prop('value', resp.cod_Empleado);
                $('#nombre1').val(nombres[2]);
                $('#nombre2').val(nombres[3]);
                $('#apellido1').val(nombres[0]);
                $('#apellido2').val(nombres[1]);
                $('#tipo_Doc_Empleado').val(resp.tipo_Doc_Empleado);
                $('#documentoEmpleado').val(resp.documentoEmpleado);
                $('#sexo_Empleado').val(resp.sexo_Empleado);
                $('#fecha_Nac_Empleado').datepicker('setDate', resp.fecha_Nac_Empleado.ConvertirObjFecha());
                $('#telf_Celular_Empleado').val(resp.telf_Celular_Empleado);
                $('#telf_Corporativo_Empleado').val(resp.telf_Corporativo_Empleado);
                $('#email_contacto').val(resp.email_contacto);
                $('#email_corporativo').val(resp.email_corporativo);
                $('#cod_Companias').val(resp.cod_Companias);
                $('#porc_Descuento').val(resp.porc_Descuento);
                $('#porc_Ganacia').val(resp.porc_Ganacia);
                $('.imgCortPop').prop('src', baseUrl + 'Recursos/1/img/' + resp.url_ImgPerfil + '.png');
                $('#base64FotPerf').prop('value', resp.url_ImgPerfil);
                if(resp.hez_usuarios!=null)
                    document.getElementById('crearUsrHezeCase').checked=true;


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
function eliminarColaborador(idColaborador) {
    InicioCarando();
    var url = baseUrl + 'mantenimiento/delColaborador/';
    var parametros = {id: idColaborador};
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
                    url: url + idColaborador,
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
                                $('#tbColaboradores').html('');
                                var tb = "";
                                $.each(resp.table, function (index, item) {
                                    var arrNombre=item.nombre_Empleado.split('/');
                                    tb += '<tr>' +
                                        '<td><input type="checkbox"/></td>\n' +
                                        '<td>' +arrNombre[2]+' '+arrNombre[3]+' '+arrNombre[0]+' '+arrNombre[1]+
                                        '<div class="OpcionesTabla">' +
                                        '<a onclick="editColaborador('+item.cod_Empleado+');">Editar</a><span class="SeparadorOpcionesTablas">|</span>' +
                                        '<a onclick="eliminarColaborador('+item.cod_Empleado+');">Eliminar</a></div>' +
                                        '</td>'+
                                        '<td>'+item.hez_compania.nomb_Companias+'</td>' +
                                        '<td>Desarrollo Web</td>' +
                                        '</tr>';
                                });
                                $('#tbColaboradores').html(tb);
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
function limpiarErrorFecha(obj) {
    if(obj.value!=""){
       $($(obj).siblings('label')[0]).remove();
        $(obj).removeClass('error');
    }
}