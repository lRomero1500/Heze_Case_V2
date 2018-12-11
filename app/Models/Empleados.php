<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $primaryKey = 'cod_Empleado';

    protected $table='cotz_empleados';
    protected $fillable=['documentoEmpleado','tipo_Doc_Empleado','nombre_Empleado','sexo_Empleado','fecha_Nac_Empleado',
        'telf_Celular_Empleado','telf_Corporativo_Empleado','email','cod_Companias',
        'porc_Descuento','porc_Ganacia','password'];
    protected $hidden=['cod_Empleado',];
    public function  Usuario()
    {
        return $this->belongsTo(Usuarios::class,'cod_Empleado','cod_Empleado');
    }
}
