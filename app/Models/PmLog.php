<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 01 Apr 2019 17:03:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PmLog
 * 
 * @property int $id
 * @property string $desc_logs
 * @property int $usuario_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $operaciones_log_id
 * 
 * @property \App\Models\PmOperacionesLog $pm_operaciones_log
 * @property \App\Models\HezUsuario $hez_usuario
 *
 * @package App\Models
 */
class PmLog extends Eloquent
{
	protected $casts = [
		'usuario_id' => 'int',
		'operaciones_log_id' => 'int'
	];

	protected $fillable = [
		'desc_logs',
		'usuario_id',
		'operaciones_log_id'
	];

	public function pm_operaciones_log()
	{
		return $this->belongsTo(\App\Models\PmOperacionesLog::class, 'operaciones_log_id');
	}

	public function hez_usuario()
	{
		return $this->belongsTo(\App\Models\HezUsuario::class, 'usuario_id');
	}
}
