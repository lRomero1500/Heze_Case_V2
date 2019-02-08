<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Feb 2019 16:15:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezDetalleRole
 * 
 * @property int $cod_Detale_Rol
 * @property int $cod_Rol
 * @property int $cod_menu
 * @property string $permisos
 * 
 * @property \App\Models\HezRole $hez_role
 * @property \App\Models\HezMenu $hez_menu
 *
 * @package App\Models
 */
class HezDetalleRole extends Eloquent
{
	protected $primaryKey = 'cod_Detale_Rol';
	public $timestamps = false;

	protected $casts = [
		'cod_Rol' => 'int',
		'cod_menu' => 'int'
	];

	protected $fillable = [
		'cod_Rol',
		'cod_menu',
		'permisos'
	];

	public function hez_role()
	{
		return $this->belongsTo(\App\Models\HezRole::class, 'cod_Rol');
	}
	public function hez_menu()
	{
		return $this->belongsTo(\App\Models\HezMenu::class, 'cod_menu');
	}
}
