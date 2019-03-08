var form;
var objValidador;
var contCantSubServ=0;
$(document).ready(function () {
    $('#cerrarForm').click(function (e) {
        destruirMaskMoney('money');
        $('#formulario').find('input[type=hidden][name!=_token],input:text,select,textarea').val('');
        $('#formulario').find('input:radio, input:checkbox').prop('checked', false);
        $('#formulario').css('display', 'none');
    });
});
function agregaSubServicios() {
    var cmpsCosto=$('.contCampo.W20.activo');
    $.each(cmpsCosto,function (index,item) {
        $(item).removeClass('activo').addClass('inactivo')
    });
    contCantSubServ++;
    var html='<div class="contCamposIndividuales">' +
        '<div class="contCampo W40"><h5>Nombre Sub-Servicio '+contCantSubServ+'</h5>' +
        '<input class="campo" id="nomb-subservicio_'+contCantSubServ+'" name="nomb-subservicio_'+contCantSubServ+'" type="text" value="" placeholder=""' +
        '       style="" required data-rule-required="true"' +
        '       data-msg-required="Ingrese el nombre del Sub-servicio"' +
        '       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios">' +
        '</div>'+
        '<div class="contCampo W20"><h5>Valor</h5>' +
        '<input class="campo" id="cost-servicio_'+contCantSubServ+'" name="cost-servicio_'+contCantSubServ+'" type="text" value="" placeholder=""' +
        '       type="text" value="" placeholder="3.000,00"' +
        '       style="" required data-rule-required="true" data-msg-required="Ingrese el costo del Sub-servicio"><span class="iconoMoneda">$</span>' +
        '</div>' +
        '<div class="contCampo W40"><h5>por:</h5>' +
        '<div class="inlineBlock W50">' +
        '<input class="campo" type="radio" name="tipocost_id_'+contCantSubServ+'" id="valorStotal_'+contCantSubServ+'" value="3" required data-rule-required="true" data-msg-required="Seleccione un tipo de costo"/>' +
        '<label for="valorStotal_'+contCantSubServ+'" class="textCheckbox" title="Seleccione esta opcion en caso de que el costo sea el total del servicio"><span class="check"></span>Total</label></div>' +
        '<div class="inlineBlock W50">\n' +
        '<input class="campo" type="radio" name="tipocost_id_'+contCantSubServ+'" id="valorSporHora_'+contCantSubServ+'" value="2"/>' +
        '<label for="valorSporHora_'+contCantSubServ+'" class="textCheckbox" title="Seleccione esta opcion en caso de que el costo del servicio sea por hora"><span class="check"></span>Hora</label></div></div>' +
        '<div id="" class="btnCerrar">' +
        '<button type="button" id="btnEliminarSubServ" onclick="eliminaSubServici(this);"></button>' +
        '</div></div>';
    $('#contSubServ').append(html);
}
function eliminaSubServici(btn) {
    var padre=$(btn).parents('.contCamposIndividuales')[0];
    $(padre).remove();
    if($('div:not(".principal").contCamposIndividuales').length==0){
        contCantSubServ=0;
        var cmpsCosto=$('.contCampo.W20.inactivo');
        $.each(cmpsCosto,function (index,item) {
            $(item).removeClass('inactivo').addClass('activo')
        });
    }
}
function guardar(e) {
    InicioCarando();
    form = $('#servicios');
    objValidador=form.validate();
    if (!form.valid()) {
        e.preventDefault();
        FinCarando();
    }
    else {
        /*var data = $('#colaborador').serialize();
        var url = baseUrl + 'mantenimiento/creaEditColaboradores';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        $(form).trigger("reset");
                        ResetForm(form,e);
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        destruirMask('tel');
                        destruirDatePick('dat');
                        $('#AlertResp').remove();
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
        });*/
        FinCarando();
    }

}
/*function editServicios(idUsuario) {
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
function eliminarServicios(idColaborador) {
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
                                $('#AlertResp').remove();
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
}*/
