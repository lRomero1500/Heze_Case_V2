//region Utiles Url
var baseUrl = document.getElementsByTagName('base')[0].href;
var token = $('meta[name="token"]').attr('content');
//endregion
//region Variables
var Traduccion = {
    errorTitle: 'Envio de formulario fallido!',
    requiredField: "Este Campo es requerido",
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
};
var caracteres = new Array("Ñ", "Á", "É", "Í", "Ó", "Ú", " "); //Arreglo con los caracteres permitidos para validar una cadena de solo letras
var getEl = function (elementId) {
    return document.getElementById(elementId);
}
var caracteres = new Array("Ñ", "Á", "É", "Í", "Ó", "Ú", " "); //Arreglo con los caracteres permitidos para validar una cadena de solo letras
var getEl = function (elementId) {
    return document.getElementById(elementId);
}
//endregion
//region Detener o iniciar procesando al completar o iniciar la carga de la pagina
$(window).bind('beforeunload', function () {
    if (!$('body').is(':loading')) {
        InicioCarando();
    }
});
var bootstrap = function (evt) {
    if (evt.target.readyState === "complete") {
        FinCarando();
    }
};
//endregion
//region Document Ready
$(document).ready(function () {
    document.addEventListener('readystatechange', bootstrap, false);
    $.fn.datepicker.languages['es-ES'] = {
        format: 'dd/mm/yyyy',
        days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        weekStart: 1,
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    };
    var options = {
        language: 'es-ES',
        format: 'dd/mm/yyyy'
    }
    $.fn.datepicker.setDefaults(options);
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("dateCustom",
        function (value, element) {
            return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
        },
        "Please enter a date in the format!"
    );
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
        if ($('#formulario').css('display') === 'none') {
            $('#formulario').css('display', '');
            crearMask('tel');
            $('#cerrarForm').click(function (e) {
                destruirMask('tel');
                $('#formulario').trigger("reset");
                $('#formulario').css('display', 'none');
            });
        }
    });
    $('#AddColaborador').click(function (e) {
        if ($('#formulario').css('display') == 'none') {
            $('#formulario').css('display', '');
            crearMask('tel');
            crearDatePick('dat');
            $('#cerrarForm').click(function (e) {
                destruirMask('tel');
                destruirDatePick('dat');
                $('#formulario').trigger("reset");
                $('#formulario').css('display', 'none');
            });
        }
    });
    $('#AddDepartamentos').click(function (e) {
        if ($('#formulario').css('display') == 'none') {
            $('#formulario').css('display', '');
            $('#cerrarForm').click(function (e) {
                $('#formulario').trigger("reset");
                $('#formulario').css('display', 'none');
            });
        }
    });
});
//endregion
//region Funciones Prototipo
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
/**
 * @return {string}
 */
String.prototype.ConvertirFecha = function () {
    if (this === "") {
        return this;
    } else {
        var prts = this.split('-')
        return [prts[2], prts[1], prts[0]].join("/");
    }
}
Date.prototype.convertir = function (fecha, formato) {
    var dia, mes, año
    dia = fecha.substring(0, 2)
    mes = fecha.substring(3, 5)
    año = fecha.substring(6, 10)
    var fecha = new Date(año, mes - 1, dia)
    return fecha
}
//endregion
//region Funciones Varias
function convertDate(dateString) {
    var p = dateString.split(/\D/g)
    return [p[2], p[1], p[0]].join("-")
}

function validaEntero(txt, e) {//Valida para una caja de texto que solamente se digiten números
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

                    } else if (item.type == 'checkbox') {
                        if (item.checked == false) {
                            resp.fallo = true;
                            resp.mensajes.push("Complete los campos en rojo");
                            item.setAttribute('style', 'border-color:red');
                        }
                    } else if (item.type == 'radio') {
                        if (item.checked == false) {
                            resp.fallo = true;
                            resp.mensajes.push("Complete los campos en rojo");
                            item.setAttribute('style', 'border-color:red');
                        }
                    }
                } else if (item.tagName == 'SELECT') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value == "0") {
                        resp.fallo = true;
                        resp.mensajes.push("Complete los campos en rojo");
                        item.setAttribute('style', 'background-color: #ffcb75;');
                    }
                } else if (item.tagName == 'TEXTAREA') {
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
    } catch (err) {
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
                } else if (item.type == 'email') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value != "") {
                        item.value = "";
                    }
                } else if (item.type == 'password') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.value != "") {
                        item.value = "";
                    }
                } else if (item.type == 'checkbox') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.checked != false) {
                        item.checked = false;
                    }
                } else if (item.type == 'radio') {
                    item.setAttribute('style', 'background-color: #fff;');
                    if (item.checked != false) {
                        item.checked = false;
                    }
                }
            } else if (item.tagName == 'SELECT') {
                item.setAttribute('style', 'background-color: #fff;');
                if (item.value != "0") {
                    item.value = "0"
                }
            } else if (item.tagName == 'TEXTAREA') {
                item.setAttribute('style', 'background-color: #fff;');
                if (item.value != "") {
                    item.value = "";
                }
            }
        });

    } catch (err) {
        alert(err);
    }
}

function mensajeValidacion(fallo) {
    this.fallo = fallo;
    this.mensajes = [];
}

function crearMask(cls) {

    $('.' + cls + '').inputmask({mask: "+57(999)999-9999", clearIncomplete: true});
}

function destruirMask(cls) {
    $('.' + cls + '').inputmask('remove');
}

function crearDatePick(cls) {
    $('.' + cls + '').datepicker({
        language: 'es-ES'
    });
}

function destruirDatePick(cls) {
    $('.' + cls + '').datepicker('destroy');
}

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

function InicioCarando() {
    $('body').loading({
        message: '<p style="color:#151515 !important;"class="saving">Procesando<span>.</span><span>.</span><span>.</span></p>',
        stoppable: false
    });
}

function FinCarando() {
    $('body').loading('stop');
}

function menuActivo(obj, t) {
    switch (t) {
        case 1:
            var padre = $(obj).parent('li')[0];
            if ($(padre).hasClass('active')) {
                $(padre).removeClass('active');
            } else{
                var hermanosPadre=$(padre).siblings('li');
                $.each(hermanosPadre,function (index,item) {
                    $(item).removeClass('active');
                });
                $(padre).addClass('active');
            }
            break;
    }
}

//endregion
//region Cropper
function iniciaCropper(relAspec,tipo) {
    var console = window.console || { log: function () {} };
    var URL = window.URL || window.webkitURL;
    var tipoCrop = tipo;
    var $image = $('#image');
    var $download = $('#download');
    var $dataX = $('#dataX');
    var $dataY = $('#dataY');
    var $dataHeight = $('#dataHeight');
    var $dataWidth = $('#dataWidth');
    var $dataRotate = $('#dataRotate');
    var $dataScaleX = $('#dataScaleX');
    var $dataScaleY = $('#dataScaleY');
    var options = {
        aspectRatio: relAspec,
        crop: function (e) {
            $dataX.val(Math.round(e.detail.x));
            $dataY.val(Math.round(e.detail.y));
            $dataHeight.val(Math.round(e.detail.height));
            $dataWidth.val(Math.round(e.detail.width));
            $dataRotate.val(e.detail.rotate);
            $dataScaleX.val(e.detail.scaleX);
            $dataScaleY.val(e.detail.scaleY);
        }
    };
    var originalImageURL = $image.attr('src');
    var uploadedImageName = 'cropped.jpg';
    var uploadedImageType = 'image/jpeg';
    var uploadedImageURL;

    // Tooltip
    //$('[data-toggle="tooltip"]').tooltip();//aspectRatio

    // Cropper
    $image.on({
        ready: function (e) {
            console.log(e.type);
        },
        cropstart: function (e) {
            console.log(e.type, e.detail.action);
        },
        cropmove: function (e) {
            console.log(e.type, e.detail.action);
        },
        cropend: function (e) {
            console.log(e.type, e.detail.action);
        },
        crop: function (e) {
            console.log(e.type);
        },
        zoom: function (e) {
            console.log(e.type, e.detail.ratio);
        }
    }).cropper(options);

    // Buttons
    if (!$.isFunction(document.createElement('canvas').getContext)) {
        $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
    }

    if (typeof document.createElement('cropper').style.transition === 'undefined') {
        $('button[data-method="rotate"]').prop('disabled', true);
        $('button[data-method="scale"]').prop('disabled', true);
    }

    // Download
    /*if (typeof $download[0].download === 'undefined') {
        $download.addClass('disabled');
    }*/

    // Options
    $('.docs-toggles').on('change', 'input', function () {
        var $this = $(this);
        var name = $this.attr('name');
        var type = $this.prop('type');
        var cropBoxData;
        var canvasData;

        if (!$image.data('cropper')) {
            return;
        }

        if (type === 'checkbox') {
            options[name] = $this.prop('checked');
            cropBoxData = $image.cropper('getCropBoxData');
            canvasData = $image.cropper('getCanvasData');

            options.ready = function () {
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            };
        } else if (type === 'radio') {
            options[name] = $this.val();
        }

        $image.cropper('destroy').cropper(options);
    });

    // Methods
    $('.docs-buttons').on('click', '[data-method]', function () {
        var $this = $(this);
        var data = $this.data();
        var cropper = $image.data('cropper');
        var cropped;
        var $target;
        var result;

        if ($this.prop('disabled') || $this.hasClass('disabled')) {
            return;
        }

        if (cropper && data.method) {
            data = $.extend({}, data); // Clone a new one

            if (typeof data.target !== 'undefined') {
                $target = $(data.target);

                if (typeof data.option === 'undefined') {
                    try {
                        data.option = JSON.parse($target.val());
                    } catch (e) {
                        console.log(e.message);
                    }
                }
            }

            cropped = cropper.cropped;

            switch (data.method) {
                case 'rotate':
                    if (cropped && options.viewMode > 0) {
                        $image.cropper('clear');
                    }

                    break;

                case 'getCroppedCanvas':
                    if (uploadedImageType === 'image/jpeg') {
                        if (!data.option) {
                            data.option = {};
                        }

                        data.option.fillColor = '#fff';
                    }

                    break;
            }

            result = $image.cropper(data.method, data.option, data.secondOption);

            switch (data.method) {
                case 'rotate':
                    if (cropped && options.viewMode > 0) {
                        $image.cropper('crop');
                    }

                    break;

                case 'scaleX':
                case 'scaleY':
                    $(this).data('option', -data.option);
                    break;

                case 'getCroppedCanvas':
                    if (result) {
                        //                  download.download = uploadedImageName;
                        //$download.attr('href', result.toDataURL(uploadedImageType));
                        if (tipoCrop === 1) {
                            setImagePerfilClosePOp(result.toDataURL(uploadedImageType));
                        }
                    }

                    break;

                case 'destroy':
                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                        uploadedImageURL = '';
                        $image.attr('src', originalImageURL);
                    }

                    break;
            }

            if ($.isPlainObject(result) && $target) {
                try {
                    $target.val(JSON.stringify(result));
                } catch (e) {
                    console.log(e.message);
                }
            }
        }
    });

    // Keyboard
    $(document.body).on('keydown', function (e) {
        if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300) {
            return;
        }

        switch (e.which) {
            case 37:
                e.preventDefault();
                $image.cropper('move', -1, 0);
                break;

            case 38:
                e.preventDefault();
                $image.cropper('move', 0, -1);
                break;

            case 39:
                e.preventDefault();
                $image.cropper('move', 1, 0);
                break;

            case 40:
                e.preventDefault();
                $image.cropper('move', 0, 1);
                break;
        }
    });

    // Import image
    // var $inputImage = $('#inputImage');

    /* if (URL) {
         $inputImage.change(function () {
             var files = this.files;
             var file;

             if (!$image.data('cropper')) {
                 return;
             }

             if (files && files.length) {
                 file = files[0];

                 if (/^image\/\w+$/.test(file.type)) {
                     uploadedImageName = file.name;
                     uploadedImageType = file.type;

                     if (uploadedImageURL) {
                         URL.revokeObjectURL(uploadedImageURL);
                     }

                     uploadedImageURL = URL.createObjectURL(file);
                     $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                     $inputImage.val('');
                 } else {
                     window.alert('Please choose an image file.');
                 }
             }
         });
     } else {
         $inputImage.prop('disabled', true).parent().addClass('disabled');
     }*/
}
//tipo{ 1=popup}
$('.iniCropPOPPerfil').change(function () {
    var URL = window.URL || window.webkitURL;
    var uploadedImageURL;
    var files = this.files;
    var file;

    if (files && files.length) {
        file = files[0];

        if (/^image\/\w+$/.test(file.type)) {
            uploadedImageName = file.name;
            uploadedImageType = file.type;

            if (uploadedImageURL) {
                URL.revokeObjectURL(uploadedImageURL);
            }

            uploadedImageURL = URL.createObjectURL(file);
            if ($('#image').data('cropper')) {
                $('.popUpCropper').addClass('activo');
                $('#image').cropper('destroy').attr('src', uploadedImageURL);
                iniciaCropper(1,1);
            }
            else {
                $('.popUpCropper').addClass('activo');
                $('#image').attr('src', uploadedImageURL);
                iniciaCropper(1,1);
            }



            $('#image').val('');
        } else {
            window.alert('Please choose an image file.');
        }
    }
});

function setImagePerfilClosePOp(imagenCortada) {
    var img = ($('.imgCortPop'))[0];
    img.src = imagenCortada;
    $('#image').cropper('destroy').attr('src', '');
    $('.popUpCropper').removeClass('activo');
}
//endregion