<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $timestamps = true;
    protected $primaryKey='cod_Rol';
    protected $table='cotz_roles';
    protected $fillable=['nom_Rol','cod_Companias'];
    protected $hidden=['cod_Rol'];
}
