<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Mar 2019 15:27:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezClientesemp
 * 
 * @property int $id
 * @property int $compania_id
 * @property int $compania_cliente_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezCompania $hez_compania
 *
 * @package App\Models
 */
class HezClientesemp extends Eloquent
{
	protected $table = 'hez_clientesemp';

	protected $casts = [
		'compania_id' => 'int',
		'compania_cliente_id' => 'int'
	];

	protected $fillable = [
	    'id',
		'compania_id',
		'compania_cliente_id'
	];

	public function hez_compania()
	{
		return $this->belongsTo(\App\Models\HezCompania::class, 'compania_id');
	}
    public function hez_compania_cliente()
    {
        return $this->belongsTo(\App\Models\HezCompania::class, 'compania_cliente_id');
    }
}
