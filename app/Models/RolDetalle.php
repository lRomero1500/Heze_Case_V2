<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolDetalle extends Model
{
    public $timestamps = true;
    protected $primaryKey='cod_Detale_Rol';
    protected $table='cotz_detalle_roles';
    protected $fillable=['cod_menu','permisos'];
    protected $hidden=['cod_Detale_Rol','cod_Rol'];
}
