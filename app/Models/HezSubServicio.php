<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Feb 2019 16:52:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezSubServicio
 * 
 * @property int $id
 * @property int $servicios_id
 * @property string $nomb-subservicio
 * @property int $tipocost_id
 * @property string $cost-servicio
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
		'servicios_id',
		'nomb-subservicio',
		'tipocost_id',
		'cost-servicio'
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
