<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:33:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrTiempostarea
 * 
 * @property int $id
 * @property int $tarea_id
 * @property int $usuario_id
 * @property string $comentario_inicio
 * @property string $comentario_fin
 * @property \Carbon\Carbon $fechainicio
 * @property \Carbon\Carbon $fechaHoraFin
 * @property int $tiempoTranscurrido
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TrTarea $tr_tarea
 * @property \App\Models\CotzUsuario $cotz_usuario
 *
 * @package App\Models
 */
class TrTiempostarea extends Eloquent
{
	protected $casts = [
		'tarea_id' => 'int',
		'usuario_id' => 'int',
		'tiempoTranscurrido' => 'int'
	];

	protected $dates = [
		'fechainicio',
		'fechaHoraFin'
	];

	protected $fillable = [
		'tarea_id',
		'usuario_id',
		'comentario_inicio',
		'comentario_fin',
		'fechainicio',
		'fechaHoraFin',
		'tiempoTranscurrido'
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
