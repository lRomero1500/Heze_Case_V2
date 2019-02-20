<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 08 Feb 2019 19:38:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezDepartamento
 * 
 * @property int $id
 * @property string $departamento
 * @property int $cod_Companias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezCompania $hez_compania
 * @property \Illuminate\Database\Eloquent\Collection $hez_empleados
 *
 * @package App\Models
 */
class HezDepartamento extends Eloquent
{
	protected $casts = [
		'cod_Companias' => 'int'
	];

	protected $fillable = [
		'id',
	    'departamento',
		'cod_Companias'
	];

	public function hez_compania()
	{
		return $this->belongsTo(\App\Models\HezCompania::class, 'cod_Companias');
	}

	public function hez_empleados()
	{
		return $this->hasMany(\App\Models\HezEmpleado::class, 'departamento_id');
	}
}
