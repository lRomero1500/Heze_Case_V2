<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $primaryKey = 'tipo_Doc_Empleado';
    protected $table='cotz_tipo_documento';
    protected $fillable=['tipo_Doc_Empleado','nom_Tipo_Documento'];
}
