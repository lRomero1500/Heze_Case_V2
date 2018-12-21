<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:33:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrTarea
 * 
 * @property int $id
 * @property int $proyecto_id
 * @property string $nombre_tarea
 * @property string $desc_tarea
 * @property \Carbon\Carbon $fecha_est_inicio
 * @property \Carbon\Carbon $fecha_est_fin
 * @property int $cant_horas_asig
 * @property int $cant_horas_consum
 * @property int $usuario_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $estado_tarea_id
 * 
 * @property \App\Models\TrEstadosTarea $tr_estados_tarea
 * @property \App\Models\TrProyecto $tr_proyecto
 * @property \App\Models\CotzUsuario $cotz_usuario
 * @property \Illuminate\Database\Eloquent\Collection $tr_tiempostareas
 * @property \Illuminate\Database\Eloquent\Collection $tr_usuario_tareas
 *
 * @package App\Models
 */
class TrTarea extends Eloquent
{
	protected $casts = [
		'proyecto_id' => 'int',
		'cant_horas_asig' => 'int',
		'cant_horas_consum' => 'int',
		'usuario_id' => 'int',
		'estado_tarea_id' => 'int'
	];

	protected $dates = [
		'fecha_est_inicio',
		'fecha_est_fin'
	];

	protected $fillable = [
		'proyecto_id',
		'nombre_tarea',
		'desc_tarea',
		'fecha_est_inicio',
		'fecha_est_fin',
		'cant_horas_asig',
		'cant_horas_consum',
		'usuario_id',
		'estado_tarea_id'
	];

	public function tr_estados_tarea()
	{
		return $this->belongsTo(\App\Models\TrEstadosTarea::class, 'estado_tarea_id');
	}

	public function tr_proyecto()
	{
		return $this->belongsTo(\App\Models\TrProyecto::class, 'proyecto_id');
	}

	public function cotz_usuario()
	{
		return $this->belongsTo(\App\Models\CotzUsuario::class, 'usuario_id');
	}

	public function tr_tiempostareas()
	{
		return $this->hasMany(\App\Models\TrTiempostarea::class, 'tarea_id');
	}

	public function tr_usuario_tareas()
	{
		return $this->hasMany(\App\Models\TrUsuarioTarea::class, 'tarea_id');
	}
}
