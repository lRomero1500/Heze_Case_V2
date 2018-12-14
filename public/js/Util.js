var baseUrl = document.getElementsByTagName('base')[0].href;
var token= $('meta[name="token"]').attr('content');
var Traduccion={
    errorTitle: 'Envio de formulario fallido!',
    requiredField:"Este Campo es requerido",
    requiredFields: 'No ha completado todos los campos requeridos',
    badTime: 'No ha proporcionado un tiempo correcto',
    badEmail: 'No ha proporcionado una direccion de correo valida',
    badTelephone: 'No ha proporcionado un numero telefonico correcto',
    badSecurityAnswer: 'No ha proporcionado una respuesta de seguridad correcta',
    badDate: 'No ha proporcionado una fecha correcta',
    lengthBadStart: 'El valor del campo debe estar entre ',
    lengthBadEnd: ' caracteres',
    lengthTooLongStart: 'El valor del campo es mayor que ',
    lengthTooShortStart: 'El valor del campo es menor que ',
    notConfirmed: 'Input values could not be confirmed',
    badDomain: 'Incorrect domain value',
    badUrl: 'The input value is not a correct URL',
    badCustomVal: 'The input value is incorrect',
    andSpaces: ' and spaces ',
    badInt: 'The input value was not a correct number',
    badSecurityNumber: 'Your social security number was incorrect',
    badUKVatAnswer: 'Incorrect UK VAT Number',
    badStrength: 'The password isn\'t strong enough',
    badNumberOfSelectedOptionsStart: 'You have to choose at least ',
    badNumberOfSelectedOptionsEnd: ' answers',
    badAlphaNumeric: 'The input value can only contain alphanumeric characters ',
    badAlphaNumericExtra: ' and ',
    wrongFileSize: 'The file you are trying to upload is too large (max %s)',
    wrongFileType: 'Only files of type %s is allowed',
    groupCheckedRangeStart: 'Please choose between ',
    groupCheckedTooFewStart: 'Please choose at least ',
    groupCheckedTooManyStart: 'Please choose a maximum of ',
    groupCheckedEnd: ' item(s)',
    badCreditCard: 'The credit card number is not correct',
    badCVV: 'The CVV number was not correct',
    wrongFileDim: 'Incorrect image dimensions,',
    imageTooTall: 'the image can not be taller than',
    imageTooWide: 'the image can not be wider than',
    imageTooSmall: 'the image was too small',
    min: 'min',
    max: 'max',
    imageRatioNotAccepted: 'Image ratio is not accepted'
}
function InicioCarando() {
    $('body').loading({
        message: '<p style="color:#151515 !important;"class="saving">Procesando<span>.</span><span>.</span><span>.</span></p>',
        stoppable: false
    });
}
function FinCarando() {
    $('body').loading('stop');
}
var bootstrap = function (evt) {
    if (evt.target.readyState === "complete") { FinCarando(); }
}
$(document).ready()
{
    document.addEventListener('readystatechange', bootstrap, false);
    $.fn.datepicker.languages['es-ES'] = {
        format: 'dd/mm/yyyy',
        days: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        daysShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
        daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
        weekStart: 1,
        months: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthsShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']
    };
    var options={
        language: 'es-ES',
        format: 'dd/mm/yyyy'
    }
    $.fn.datepicker.setDefaults(options);
    jQuery.validator.addMethod("lettersonly", function(value, element)
    {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("dateCustom",
        function(value, element) {
            return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
        },
        "Please enter a date in the format!"
    );
}
$(window).bind('beforeunload', function () {
    if(!$('body').is(':loading') ){
        InicioCarando();
    }
});
var caracteres = new Array("Ñ", "Á", "É", "Í", "Ó", "Ú", " "); //Arreglo con los caracteres permitidos para validar una cadena de solo letras
var getEl = function (elementId) {
    return document.getElementById(elementId);
}

var caracteres = new Array("Ñ", "Á", "É", "Í", "Ó", "Ú", " "); //Arreglo con los caracteres permitidos para validar una cadena de solo letras
var getEl = function (elementId) {
    return document.getElementById(elementId);
}

Array.prototype.encontrar = //Agrega Función prototipo a la clase Array para buscar un valor en el arreglo
    function (val) {
        for (var i = 0; i <= this.length; i++)
            if (this[i] == val)
                return true
        return false
    }
Array.prototype.encontrar = //Agrega Función prototipo a la clase Array para buscar un valor en el arreglo
    function (val) {
        if (!String.prototype.includes) {
            String.prototype.includes = function (search, start) {
                'use strict';
                if (typeof start !== 'number') {
                    start = 0;
                }

                if (start + search.length > this.length) {
                    return false;
                } else {
                    return this.indexOf(search, start) !== -1;
                }
            };
        }
        for (var i = 0; i <= this.length; i++) {
            var arr2;
            if ((String(this[i])).includes('=')) {
                arr2 = this[i].split('=');
                for (var o = 0; o <= arr2.length; o++)
                    if (String(arr2[o]).trim() == val)
                        return true
            }
        }

        return false
    }
Array.prototype.encontrarIndex = //Agrega Función prototipo a la clase Array para buscar un valor en el arreglo
    function (val) {
        for (var i = 0; i <= this.length; i++)
            if (this[i] == val)
                return i;
        return 0;
    }
Array.prototype.encontrarIndexLike = //Agrega Función prototipo a la clase Array para buscar un valor en el arreglo
    function (val) {
        if (!String.prototype.includes) {
            String.prototype.includes = function (search, start) {
                'use strict';
                if (typeof start !== 'number') {
                    start = 0;
                }

                if (start + search.length > this.length) {
                    return false;
                } else {
                    return this.indexOf(search, start) !== -1;
                }
            };
        }
        for (var i = 0; i <= this.length; i++) {
            var cad = this[i].toString();
            if (cad.includes(val))
                return i;
        }

        return 0;
    }
String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/g, "");
}
String.prototype.ltrim = function () {
    return this.replace(/^\s+/, "");
}
String.prototype.rtrim = function () {
    return this.replace(/\s+$/, "");
}
String.prototype.pad = function (l, s, t) {
    return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
        + 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
        + this + s.substr(0, l - t) : this;
};

String.prototype.toFloat = function () {
    return isNaN(parseFloat(this.replace(/,/gi, ""))) ? 0 : parseFloat(this.replace(/,/gi, ""));
}

Date.prototype.convertir = function (fecha, formato) {
    var dia, mes, año
    dia = fecha.substring(0, 2)
    mes = fecha.substring(3, 5)
    año = fecha.substring(6, 10)
    var fecha = new Date(año, mes - 1, dia)
    return fecha
}
function validaEntero(txt,e) {//Valida para una caja de texto que solamente se digiten números
    if (isNaN(String.fromCharCode(e.keyCode)) && !(String.fromCharCode(e.keyCode) == "-" && txt.value.indexOf("-") < 0))
        return false;
    if (String.fromCharCode(e.keyCode) == "-") {
        txt.value = "-" + txt.value;
        return false;
    }
    return true;
}

function validaNatural(e) {//Valida para una caja de texto que solamente se digiten números
    var keycode = e.which;
    if (!(e.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || keycode != 110 || keycode != 190 || (keycode >= 48 && keycode <= 57)))) {
        e.preventDefault();
    }
}

function ValidarCero(numero) {
    if (parseInt(numero.value) < 1 || numero.value == "")
        numero.value = 1;
};

function validaFloat(txt, sepDecimal) {//Valida para una caja de texto que solamente se digiten numeros ó el separador decimal ó el sumbolo menos
    if (isNaN(String.fromCharCode(event.keyCode)) && !(String.fromCharCode(event.keyCode) == sepDecimal && txt.value.indexOf(sepDecimal) < 0) && !(String.fromCharCode(event.keyCode) == "-" && txt.value.indexOf("-") < 0))
        return false;
    if (String.fromCharCode(event.keyCode) == "-") {
        txt.value = "-" + txt.value;
        return false;
    }
    return true;
}

function validaTexto(e) {//Solo Permite digitar letras y los caracteres especificados en el arreglo caracteres
    var car = String.fromCharCode(e.keyCode).toUpperCase();
    if ((e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 97 && e.keyCode <= 122) || caracteres.encontrar(car))
        return true;
    return false;
}
function validaValorEnt(objTxt) {
    if (isNaN(parseInt(objTxt.value)))
        objTxt.value = ""
    else
        objTxt.value = parseInt(objTxt.value)
}
function validaValorFlo(objTxt) {
    objTxt.value = objTxt.value.replace(/,/, ".")
    if (isNaN(parseFloat(objTxt.value)))
        objTxt.value = ""
    else
        objTxt.value = parseFloat(objTxt.value)
    objTxt.value = objTxt.value.replace(/\./, ',')
}


function ValidaFormulario(form) {
    try {
        var resp = new mensajeValidacion(false);
        resp.fallo = false;
        $.each(form.elements, function (index, item) {
            var a = item.getAttribute('requerido');
            if ((item.getAttribute('requerido')) == "true") {
                if (item.tagName == 'INPUT') {
                    if (item.type == 'text') {
                        if (item.value == "") {
                            resp.fallo = true;
                            resp.mensajes.push("Complete los campos en rojo");
                            item.setAttribute('style', 'border-color:red');
                        }

                    }
                    else if (item.type == 'checkbox') {
                        if (item.checked == false) {
                            resp.fallo = true;
                            resp.mensajes.push("Complete los campos en rojo");
                            item.setAttribute('style', 'border-color:red');
                        }
                    }
                    else if (item.type == 'radio') {
                        if (item.checked == false) {
                            resp.fallo = true;
                            resp.mensajes.push("Complete los campos en rojo");
                            item.setAttribute('style', 'border-color:red');
                        }
                    }
                }
                else if (item.tagName == 'SELECT') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value == "0") {
                        resp.fallo = true;
                        resp.mensajes.push("Complete los campos en rojo");
                        item.setAttribute('style', 'background-color: #ffcb75;');
                    }
                }
                else if (item.tagName == 'TEXTAREA') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value == "") {
                        resp.fallo = true;
                        resp.mensajes.push("Complete los campos en rojo");
                        item.setAttribute('style', 'background-color: #ffcb75;');
                    }
                }
            }
        });
        return resp;
    }
    catch (err) {
        alert(err);
    }

}
function ResetForm(form, e) {
    e.preventDefault();
    try {

        $.each(form.elements, function (index, item) {
            var a = item.getAttribute('requerido');
            //var b = a.getAttribute('placeholder');

            if (item.tagName == 'INPUT') {
                if (item.type == 'text') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value != "") {
                        item.value = "";
                    }
                }
                else if (item.type == 'email') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value != "") {
                        item.value = "";
                    }
                }
                else if (item.type == 'password') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value != "") {
                        item.value = "";
                    }
                }
                else if (item.type == 'checkbox') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.checked != false) {
                        item.checked = false;
                    }
                }
                else if (item.type == 'radio') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.checked != false) {
                        item.checked = false;
                    }
                }
            }
            else if (item.tagName == 'SELECT') {
                item.setAttribute('style', 'background-color: #fff;');
                if (item.value != "0") {
                    item.value = "0"
                }
            }
            else if (item.tagName == 'TEXTAREA') {
                item.setAttribute('style', 'background-color: #fff;');
                if (item.value != "") {
                    item.value = "";
                }
            }
        });

    }
    catch (err) {
        alert(err);
    }
}
function mensajeValidacion(fallo) {
    this.fallo = fallo;
    this.mensajes = [];
}
function crearMask(cls) {

    $('.' + cls + '').inputmask({ mask: "+57(999)999-9999", clearIncomplete:true });
}
function destruirMask(cls) {
    $('.' + cls + '').inputmask('remove');
}
function crearDatePick(cls){
    $('.' + cls + '').datepicker({
        language: 'es-ES'
    });
}
function destruirDatePick(cls){
    $('.' + cls + '').datepicker('destroy');
}
$(document).ready(function () {
    $('#iconoMenuTop').mouseover(function () {
        $('#menuTop').attr('class', '');
        $('#menuTop').attr('class', 'ContentNavheaderActivo');
//            $('#menuTop').show( 'slide',{direction:'up',distance: 40});
    });
    $('#menuTop').mouseleave(function () {
        $('#menuTop').attr('class', '');
        $('#menuTop').attr('class', 'ContentNavheader');
    });
    $('#btnCerrarAlert').click(function () {
        $('#AlertNoError').css('display', 'none');
    });

    $('#AddEmpresa').click(function (e) {
        if ($('#formulario').css('display') == 'none') {
            $('#formulario').css('display', '');
            crearMask('tel');
        }
    })
    $('#AddColaborador').click(function (e) {
        if ($('#formulario').css('display') == 'none') {
            $('#formulario').css('display', '');
            crearMask('tel');
            crearDatePick('dat');
        }
    })
});
function cerrarResp() {
    $('#AlertResp').remove();
}
function alertaError(msg) {
    $.alert({
        title: 'Error!',
        icon: 'fa fa-exclamation-circle ',
        content: msg,
        type: 'red',
        typeAnimated: true,
        useBootstrap: false,
        boxWidth: '20%'
    });
}

function alertSucces(msg) {
    $.alert({
        title: 'Confirmacion!',
        icon: 'fa fa-check',
        content: msg,
        type: 'green',
        typeAnimated: true,
        useBootstrap: false,
        boxWidth: '20%'
    });
}


function defaultAlert(msg) {
    $.alert({
        title: 'Alerta',
        icon: 'fa fa-exclamation-circle',
        content: msg,
        type: 'orange',
        typeAnimated: true,
        useBootstrap: false,
        boxWidth: '20%'
    });
}