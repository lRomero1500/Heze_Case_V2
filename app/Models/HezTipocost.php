<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Feb 2019 16:51:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezTipocost
 * 
 * @property int $id
 * @property string $nomb-tipocost
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $hez_servicios
 * @property \Illuminate\Database\Eloquent\Collection $hez_sub-servicios
 *
 * @package App\Models
 */
class HezTipocost extends Eloquent
{
	protected $table = 'hez_tipocost';

	protected $fillable = [
		'nomb-tipocost'
	];

	public function hez_servicios()
	{
		return $this->hasMany(\App\Models\HezServicio::class, 'tipocost_id');
	}

	public function hez_subservicios()
	{
		return $this->hasMany(\App\Models\HezSubServicio::class, 'tipocost_id');
	}
}
