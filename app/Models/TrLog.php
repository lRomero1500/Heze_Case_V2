<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:29:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrLog
 * 
 * @property int $id
 * @property string $desc_logs
 * @property int $usuario_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $operaciones_log_id
 * 
 * @property \App\Models\TrOperacionesLog $tr_operaciones_log
 * @property \App\Models\CotzUsuario $cotz_usuario
 *
 * @package App\Models
 */
class TrLog extends Eloquent
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

	public function tr_operaciones_log()
	{
		return $this->belongsTo(\App\Models\TrOperacionesLog::class, 'operaciones_log_id');
	}

	public function cotz_usuario()
	{
		return $this->belongsTo(\App\Models\CotzUsuario::class, 'id_Usuarios','usuario_id');
	}
}
