<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 08 Feb 2019 17:04:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezCompania
 * 
 * @property int $cod_Companias
 * @property string $nomb_Companias
 * @property string $nit_Companias
 * @property string $tel_Companias
 * @property string $direccion_companias
 * @property boolean $logo_companias
 * @property string $correo_companias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $hez_departamentos
 * @property \Illuminate\Database\Eloquent\Collection $hez_empleados
 * @property \Illuminate\Database\Eloquent\Collection $hez_roles
 *
 * @package App\Models
 */
class HezCompania extends Eloquent
{
	protected $primaryKey = 'cod_Companias';

	protected $casts = [
		'logo_companias' => 'boolean'
	];

	protected $fillable = [
	    'cod_Companias',
		'nomb_Companias',
		'nit_Companias',
		'tel_Companias',
		'direccion_companias',
		'logo_companias',
		'correo_companias'
	];

	public function hez_departamentos()
	{
		return $this->hasMany(\App\Models\HezDepartamento::class, 'cod_Companias');
	}

	public function hez_empleados()
	{
		return $this->hasMany(\App\Models\HezEmpleado::class, 'cod_Companias');
	}

	public function hez_roles()
	{
		return $this->hasMany(\App\Models\HezRole::class, 'cod_Companias');
	}
}
