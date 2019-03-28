<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Feb 2019 16:14:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezRole
 * 
 * @property int $cod_Rol
 * @property string $nom_Rol
 * @property int $cod_Companias
 * 
 * @property \App\Models\HezCompania $hez_compania
 * @property \Illuminate\Database\Eloquent\Collection $hez_detalle_roles
 *
 * @package App\Models
 */
class HezRole extends Eloquent
{
	protected $primaryKey = 'cod_Rol';
	public $timestamps = false;

	protected $casts = [
		'cod_Companias' => 'int'
	];

	protected $fillable = [
	    'cod_Rol',
		'nom_Rol',
		'cod_Companias'
	];
	public function hez_compania()
	{
		return $this->belongsTo(\App\Models\HezCompania::class, 'cod_Companias');
	}

	public function hez_detalle_roles()
	{
		return $this->hasMany(\App\Models\HezDetalleRole::class, 'cod_Rol');
	}
/*    public function  getMenu_role()
    {
	    $deta=$this->hasMany(\App\Models\HezDetalleRole::class, 'cod_Rol');
        $in = [];
        $cont = 0;
        foreach ($deta as $item) {
            $in[$cont] = $item->cod_menu;
            $cont = $cont + 1;
        }
        return Menu::whereIn('cod_menu', $in)->where('activo', 1)->orderBy('orden_menu')->get();
    }*/
}
