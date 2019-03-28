<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Mar 2019 14:58:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezClienteshc
 * 
 * @property int $id
 * @property int $compania_id
 * @property string $token
 * @property \Carbon\Carbon $fecha_inicio_tok
 * @property \Carbon\Carbon $fecha_fin_tok
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezCompania $hez_compania
 *
 * @package App\Models
 */
class HezClienteshc extends Eloquent
{
	protected $table = 'hez_clienteshc';

	protected $casts = [
		'compania_id' => 'int'
	];

	protected $dates = [
		'fecha_inicio_tok',
		'fecha_fin_tok'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
	    'id',
		'compania_id',
		'token',
		'fecha_inicio_tok',
		'fecha_fin_tok'
	];

	public function hez_compania()
	{
		return $this->belongsTo(\App\Models\HezCompania::class, 'compania_id');
	}
}
