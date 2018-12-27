<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $primaryKey = 'cod_Empleado';
    public $timestamps = true;
    protected $table = 'cotz_empleados';
    protected $fillable = ['cod_Empleado', 'documentoEmpleado', 'tipo_Doc_Empleado', 'nombre_Empleado', 'sexo_Empleado',
        'fecha_Nac_Empleado','telf_Celular_Empleado', 'telf_Corporativo_Empleado', 'email_contacto', 'email_corporativo',
        'cod_Companias','porc_Descuento', 'porc_Ganacia',"departamento_id"];

    public function Usuario()
    {
        return $this->belongsTo(Usuarios::class, 'cod_Empleado', 'cod_Empleado');
    }

    public function compania()
    {
        return $this->belongsTo(Companias::class, 'cod_Companias', 'cod_Companias');
    }
    public function departamentos()
    {
        return $this->belongsTo(CotzDepartamento::class, 'id', 'departamento_id');
    }

    public function tipoDoc()
    {
        return $this->hasOne(TipoDocumento::Class, 'tipo_Doc_Empleado', 'tipo_Doc_Empleado');
    }
}
