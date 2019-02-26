<form id="colaborador">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas contFormGobal" style="padding:0px!important;margin-bottom: 0.5em;">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="idEmpleado" name="cod_Empleado" type="hidden" value="0"/>
            <div class="contCampo W20"><h5>Primer Nombre*</h5>
                <input class="campo" id="nombre1" name="nombre1" type="text" value="" placeholder=""
                       title="Ingrese primer nombre del colaborador"
                       required data-rule-required="true" data-msg-required="Ingrese el primer nombre del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="contCampo W20"><h5>Segundo Nombre</h5>
                <input class="campo" id="nombre2" name="nombre2" type="text" value="" placeholder=""
                       title="Ingrese segundo nombre del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="contCampo W20"><h5>Primer Apellido*</h5>
                <input class="campo" id="apellido1" name="apellido1" type="text" value="" placeholder=""
                       title="Ingrese primer apellido del colaborador"
                       required data-rule-required="true" data-msg-required="Ingrese el primer apellido del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="contCampo W20"><h5>Segundo Apellido</h5>
                <input class="campo" id="apellido2" name="apellido2" type="text" value="" placeholder=""
                       title="Ingrese segundo apellido del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="contCampo W20"><h5>Tipo Documento*</h5>
                <select class="campo" title="Seleccione un tipo de documento" name="tipo_Doc_Empleado" id="tipo_Doc_Empleado"
                        required data-rule-required="true" data-msg-required="Seleccione el tipo de documento del colaborador del colaborador">
                    <option value="">--Seleccione--</option>
                    @foreach($tiposDoc as $tipoDoc)
                        <option value="{{$tipoDoc->tipo_Doc_Empleado}}">{{$tipoDoc->nom_Tipo_Documento}}</option>
                    @endforeach
                </select>
            </div>
            <div class="contCampo W20"><h5>Nro. Documento*</h5>
                <input class="campo" id="documentoEmpleado" name="documentoEmpleado" type="text" value="" placeholder=""
                       title="Ingrese documento de identidad del colaborador"
                       data-rule-minlength="6" data-msg-minlength="ingrese minimo 6 caracteres"
                       data-rule-number="true" data-msg-number="Ingrese solo caracteres numericos"
                       required data-rule-required="true" data-msg-required="Ingrese documento de identidad del colaborador"
                />
            </div>
            <div class="contCampo W20"><h5>Genero*</h5>
                <select class="campo" title="Seleccione un genero para el colaborador" name="sexo_Empleado" id="sexo_Empleado"
                        required data-rule-required="true" data-msg-required="Seleccione el genero del colaborador">
                    <option value="">--Seleccione--</option>
                    <option value="1">Masculino</option>
                    <option value="0">Femenino</option>
                </select>
            </div>
            <div class="contCampo W20"><h5>Fecha de Nacimiento*</h5>
                <input type="text" value="" placeholder=""
                       title="Seleccione fecha de nacimiento del colaborador" name="fecha_Nac_Empleado"
                       id="fecha_Nac_Empleado"
                       required data-rule-required="true"
                       data-msg-required="Seleccione fecha de nacimiento del colaborador"
                       data-rule-dateCustom="true" data-msg-dateCustom="Ingrese una fecha valida" class="dat campo"
                       onchange="limpiarErrorFecha(this)"
                />
            </div>
            <div class="contCampo W20"><h5>Telefono de Contacto*</h5>
                <input  type="text" value="" placeholder="" class="tel campo"
                       title="Ingrese telefono de contacto del colaborador" name="telf_Celular_Empleado"
                       id="telf_Celular_Empleado" required data-rule-required="true"
                       data-msg-required="Ingrese el telefono de contacto del colaborador"
                />
            </div>
            <div class="contCampo W20"><h5>Telefono Coporativo</h5>
                <input type="text" value="" placeholder="" class="tel campo"
                       title="Ingrese telefono corporativo del colaborador" name="telf_Corporativo_Empleado"
                       id="telf_Corporativo_Empleado"
                />
            </div>
            <div class="contCampo W20"><h5>Email de Contacto*</h5>
                <input class="campo" type="text" value="" placeholder=""
                       title="Ingrese email de contacto del colaborador, este sera si usuario en caso de seleccionar crear usuario de portal"
                       name="email_contacto" id="email_contacto"
                       required data-rule-required="true"
                       data-msg-required="Ingrese el email de contacto del colaborador"
                       data-rule-email="true" data-msg-email="Ingrese un email valido"/>
            </div>
            <div class="contCampo W20"><h5>Email Corporativo</h5>
                <input class="campo" type="text" value="" placeholder="" title="Ingrese email de corporativo del colaborador"
                       name="email_corporativo" id="email_corporativo"
                       data-rule-email="true" data-msg-email="Ingrese un email valido"
                />
            </div>
            <div class="contCampo W20"><h5>Asociado a:*</h5>
                <select class="campo" title="Seleccione un empresa" name="cod_Companias" id="cod_Companias"
                        title="Seleccione la empresa con la que se vincula al colaborador"
                        required data-rule-required="true"
                        data-msg-required="Seleccione la empresa del colaborador">
                    <option value="">--Seleccione--</option>
                    @foreach($companias as $comp)
                        <option value="{{$comp->cod_Companias}}">{{$comp->nomb_Companias}}</option>
                    @endforeach
                </select>
            </div>
            <div class="contCampo W20"><h5>Procentaje de Descuento</h5>
                <input class="campo" type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3"
                       id="porc_Descuento" name="porc_Descuento"
                       title="En caso de ser vendedor Ingrese % de ganacia que tendra el colaborador"
                       data-rule-number="true" data-msg-number="Ingrese solo caracteres numericos"
                />
            </div>
            <div class="contCampo W20"><h5>Procentaje de Descuento</h5>
                <input  class="campo" type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3"
                       id="porc_Ganacia" name="porc_Ganacia"
                       title="En caso de ser vendedor Ingrese % de descuento que se le aplica al colaborador"
                       data-rule-number="true" data-msg-number="Ingrese solo caracteres numericos"
                />
            </div>
            <div class="contCampo W20">
                <div>
                    <input class="campo" type="checkbox" name="crearUsrHezeCase" id="crearUsrHezeCase"
                           title="Seleccione esta opcion en caso de que desee que este colaborador ingrese a la plataforma"
                    />
                    <label for="crearUsrHezeCase" class="textCheckbox"><span class="check"></span>Crear Usuario de Portal</label>
                </div>
            </div>
        </div>
    </div>
    <div class="btnGuardar" style="display: inline-block;">
        <button type="button" id="btnGuardar" style="color: #ffffff !important;" onclick="guardar(event);">
            <i class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar datos</p>
        </button>
    </div>
    <div id="cerrarForm" class="btnCerrar">
        <button type="button" id="btnCerrar"></button>
    </div>
    <div id="errores" style="visibility: hidden">

    </div>
</form>
@section('scriptsEMB')
@endsection
