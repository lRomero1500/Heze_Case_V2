<form id="colaborador">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em;width: 877px">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="idEmpleado" name="cod_Empleado" type="hidden" value="0"/>
            <div class="campoCorto"><h5>Primer Nombre*</h5>
                <input id="nombre1" name="nombre1" type="text" value="" placeholder=""
                       title="Ingrese primer nombre del colaborador"
                       required data-rule-required="true" data-msg-required="Ingrese el primer nombre del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="campoCorto"><h5>Segundo Nombre</h5>
                <input id="nombre2" name="nombre2" type="text" value="" placeholder=""
                       title="Ingrese segundo nombre del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="campoCorto"><h5>Primer Apellido*</h5>
                <input id="apellido1" name="apellido1" type="text" value="" placeholder=""
                       title="Ingrese primer apellido del colaborador"
                       required data-rule-required="true" data-msg-required="Ingrese el primer apellido del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="campoCorto"><h5>Segundo Apellido</h5>
                <input id="apellido2" name="apellido2" type="text" value="" placeholder=""
                       title="Ingrese segundo apellido del colaborador"
                       data-rule-lettersonly="true" data-msg-lettersonly="Ingres solo caracteres alfabeticos y espacios"
                       data-rule-minlength="2" data-msg-minlength="ingrese minimo 2 caracteres"
                />
            </div>
            <div class="campoCorto"><h5>Genero*</h5>
                <select title="Seleccione un genero para el colaborador" name="sexo_Empleado" id="sexo_Empleado"
                        required data-rule-required="true" data-msg-required="Seleccione el genero del colaborador">
                    <option value="">--Seleccione--</option>
                    <option value="1">Masculino</option>
                    <option value="0">Femenino</option>
                </select>
            </div>
            <div class="campoCorto"><h5>Fecha de Nacimiento*</h5>
                <input type="text" value="" placeholder=""
                       title="Seleccione fecha de nacimiento del colaborador" name="fecha_Nac_Empleado"
                       id="fecha_Nac_Empleado"
                       required data-rule-required="true"
                       data-msg-required="Seleccione fecha de nacimiento del colaborador"
                       data-rule-dateCustom="true" data-msg-dateCustom="Ingrese una fecha valida" class="dat"
                       onchange="limpiarErrorFecha(this)"
                />
            </div>
            <div class="campoCorto"><h5>Telefono de Contacto*</h5>
                <input type="text" value="" placeholder="" class="tel"
                       title="Ingrese telefono de contacto del colaborador" name="telf_Celular_Empleado"
                       id="telf_Celular_Empleado" required data-rule-required="true"
                       data-msg-required="Ingrese el telefono de contacto del colaborador"
                />
            </div>
            <div class="campoCorto"><h5>Telefono Coporativo</h5>
                <input type="text" value="" placeholder="" class="tel"
                       title="Ingrese telefono corporativo del colaborador" name="telf_Corporativo_Empleado"
                       id="telf_Corporativo_Empleado"
                />
            </div>
            <div class="campoCorto"><h5>Email de Contacto*</h5>
                <input type="text" value="" placeholder=""
                       title="Ingrese email de contacto del colaborador, este sera si usuario en caso de seleccionar crear usuario de portal"
                       name="email_contacto" id="email_contacto"
                       required data-rule-required="true"
                       data-msg-required="Ingrese el email de contacto del colaborador"
                       data-rule-email="true" data-msg-email="Ingrese un email valido"/>
            </div>
            <div class="campoCorto"><h5>Email Corporativo</h5>
                <input type="text" value="" placeholder="" title="Ingrese email de corporativo del colaborador"
                       name="email_corporativo" id="email_corporativo"
                       data-rule-email="true" data-msg-email="Ingrese un email valido"
                />
            </div>
            <div class="campoCorto"><h5>Asociado a:*</h5>
                <select title="Seleccione un empresa" name="cod_Companias" id="cod_Companias"
                        title="Seleccione la empresa con la que se vincula al colaborador"
                        required data-rule-required="true"
                        data-msg-required="Seleccione la empresa del colaborador">
                    <option value="">--Seleccione--</option>
                    @foreach($companias as $comp)
                        <option value="{{$comp->cod_Companias}}">{{$comp->nomb_Companias}}</option>
                    @endforeach
                </select>
            </div>
            <div class="campoCorto"><h5>Procentaje de Descuento</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3"
                       id="porc_Descuento" name="porc_Descuento"
                       title="En caso de ser vendedor Ingrese % de ganacia que tendra el colaborador"
                       data-rule-number="true" data-msg-number="Ingrese solo caracteres numericos"
                />
            </div>
            <div class="campoCorto"><h5>Procentaje de Descuento</h5>
                <input type="text" value="" placeholder="" onkeypress="return validaEntero(this.value);" maxlength="3"
                       id="porc_Ganacia" name="porc_Ganacia"
                       title="En caso de ser vendedor Ingrese % de descuento que se le aplica al colaborador"
                       data-rule-number="true" data-msg-number="Ingrese solo caracteres numericos"
                />
            </div>
            <div class="campoCorto">
                <label class="labelChek">
                    <input type="checkbox" name="crearUsrHezeCase"
                           title="Seleccione esta opcion en caso de que desee que este colaborador ingrese a la plataforma"
                    />
                    Crear Usuario de Portal
                </label>
            </div>
        </div>
    </div>
    <div class="btnGuardar" style="display: inline-block;bottom: -161px!important;">
        <button type="button" id="btnGuardar" style="color: #ffffff !important;" onclick="guardar(event);">
            <i class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar datos</p>
        </button>
    </div>
    <div id="errores" style="visibility: hidden">

    </div>
</form>
@section('scriptsEMB')
@endsection