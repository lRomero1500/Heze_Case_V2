<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = true;
    protected $primaryKey='cod_menu';
    protected $table='cotz_menu';
    protected $fillable=['nom_menu','url_menu','cod_seg','cod_menu_padre','url_icono','activo','pos_menu','orden_menu'];
    protected $hidden=['cod_menu'];
}
