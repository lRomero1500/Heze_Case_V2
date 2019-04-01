var form;
var objValidador;
var contContenidoWizard = $('#contContenidoWizard').children('div');
var primerItemWizard = contContenidoWizard[0];
primerItemWizard.className += " activo";
var cantidadWizard;
for (i = 0; i < contContenidoWizard.length; i++) {
    cantidadWizard = i;
    document.getElementById('contBtnWizard').innerHTML += "<label>Paso " + (cantidadWizard + 1) + "</label>";
    if (i == 0) {
        contContenidoWizard[i].innerHTML += "<button name='irAdelanteWizard' type='button' onclick='irAdelante(event)'>Ir al paso " + (cantidadWizard + 2) + "</button>"

    } else if ((i > 0) && (i !== contContenidoWizard.length - 1)) {
        contContenidoWizard[i].innerHTML += "<button name='irAdelanteWizard' type='button' onclick='irAdelante(event)'>Ir al paso " + (cantidadWizard + 2) + "</button>" + "<button type='button' name='irAtrasWizard' onclick='irAtras()'>Ir un paso atrás</button>"
    } else {
        contContenidoWizard[i].innerHTML += "<button name='irAdelanteWizard' type='button' onclick='finalizar(event)'>Finalizar</button>" + "<button type='button' name='irAtrasWizard' onclick='irAtras()'>Ir un paso atrás</button>"
    }
}
var contBtnWizard = $('#contBtnWizard').children('label');
var primerItemBtnWizard = contBtnWizard[0];
primerItemBtnWizard.className += " activo";
var indice = 0;
var validarCampos = $('#contContenidoWizard').children('div');
var selectorRequired = validarCampos.find('input,select,textarea[required]');

function irAdelante(e) {
    InicioCarando();
    form = $('#proyectoWZ');
    objValidador=form.validate();
    if (!form.valid()) {
        e.preventDefault();
        FinCarando();
    }
    else {
        if(guardar()){
            contBtnWizard[indice].classList.remove("activo");
            contBtnWizard[indice + 1].className += " activo";
            contContenidoWizard[indice].classList.remove("activo");
            contContenidoWizard[indice + 1].className += " activo";
            indice += 1;
            FinCarando();
        }
    }

    /*if (validarCampos.find('input,select,textarea[required]').length > 0) {

    }*/
}

function irAtras() {
    contBtnWizard[indice].classList.remove("activo");
    contBtnWizard[indice - 1].className += " activo";

    contContenidoWizard[indice].classList.remove("activo");
    contContenidoWizard[indice - 1].className += " activo";
    indice -= 1;

}

function guardar() {
        /*var data = $('#proyectoWZ').serialize();
        var url = baseUrl + 'pmlite/creaEditProyecto';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        return true;
                        FinCarando();
                    }
                    else {
                        $('#errores').css('visibility', '');
                        $('#errores').css('color', 'red');
                        $('#errores').html('');
                        $('#errores').html(resp.msg);
                        return false;
                    }

                    FinCarando();
                }
                else {
                    FinCarando();
                    $('#errores').css('visibility', '');
                    $('#errores').html('');
                    $('#errores').html(resp.msg);
                    return false;
                }

            },
            error: function (resp, textStatus) {
                FinCarando();
                $('#errores').css('visibility', '');
                $('#errores').html('');
                $('#errores').html('Error' + resp.msg);
                return false;
            }
        });*/
        return true;
}
/*
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
}
*/
function limpiarErrorFecha(obj) {
    if(obj.value!=""){
        $($(obj).siblings('label')[0]).remove();
        $(obj).removeClass('error');
    }
}