<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Feb 2019 16:52:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezServicio
 * 
 * @property int $id
 * @property int $cod_Companias
 * @property string $nomb-servicio
 * @property int $tipocost_id
 * @property string $cost-servicio
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezCompania $hez_compania
 * @property \App\Models\HezTipocost $hez_tipocost
 * @property \Illuminate\Database\Eloquent\Collection $hez_sub-servicios
 *
 * @package App\Models
 */
class HezServicio extends Eloquent
{
	protected $casts = [
		'cod_Companias' => 'int',
		'tipocost_id' => 'int'
	];

	protected $fillable = [
	    'id',
		'cod_Companias',
		'nomb-servicio',
		'tipocost_id',
		'cost-servicio'
	];

	public function hez_compania()
	{
		return $this->belongsTo(\App\Models\HezCompania::class, 'cod_Companias');
	}

	public function hez_tipocost()
	{
		return $this->belongsTo(\App\Models\HezTipocost::class, 'tipocost_id');
	}

	public function hez_subservicios()
	{
		return $this->hasMany(\App\Models\HezSubServicio::class, 'servicios_id');
	}
}
