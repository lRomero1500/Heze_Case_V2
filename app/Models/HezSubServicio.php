<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 23 Mar 2019 17:19:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezSubServicio
 * 
 * @property int $id
 * @property int $servicios_id
 * @property string $nomb_subservicio
 * @property int $tipocost_id
 * @property string $cost_servicio
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezServicio $hez_servicio
 * @property \App\Models\HezTipocost $hez_tipocost
 *
 * @package App\Models
 */
class HezSubServicio extends Eloquent
{
	protected $casts = [
		'servicios_id' => 'int',
		'tipocost_id' => 'int'
	];

	protected $fillable = [
	    'id',
		'servicios_id',
		'nomb_subservicio',
		'tipocost_id',
		'cost_servicio'
	];

	public function hez_servicio()
	{
		return $this->belongsTo(\App\Models\HezServicio::class, 'servicios_id');
	}

	public function hez_tipocost()
	{
		return $this->belongsTo(\App\Models\HezTipocost::class, 'tipocost_id');
	}
}
