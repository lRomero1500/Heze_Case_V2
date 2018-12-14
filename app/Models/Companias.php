<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companias extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'cod_Companias';

    protected $table = 'cotz-companias';
    protected $fillable = ['cod_Companias','nomb_Companias', 'nit_Companias', 'tel_Companias', 'direccion_companias',
        'logo_companias','correo_companias'];
    /* protected $hidden = ['cod_Companias',];*/
}
