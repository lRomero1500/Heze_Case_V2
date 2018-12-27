<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:34:22 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrUsuarioTarea
 * 
 * @property int $id
 * @property int $usuario_id
 * @property int $tarea_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TrTarea $tr_tarea
 * @property \App\Models\CotzUsuario $cotz_usuario
 *
 * @package App\Models
 */
class TrUsuarioTarea extends Eloquent
{
	protected $table = 'tr_usuario_tarea';

	protected $casts = [
		'usuario_id' => 'int',
		'tarea_id' => 'int'
	];

	protected $fillable = [
		'usuario_id',
		'tarea_id'
	];

	public function tr_tarea()
	{
		return $this->belongsTo(\App\Models\TrTarea::class, 'tarea_id');
	}

	public function cotz_usuario()
	{
		return $this->belongsTo(\App\Models\CotzUsuario::class, 'usuario_id');
	}
}
