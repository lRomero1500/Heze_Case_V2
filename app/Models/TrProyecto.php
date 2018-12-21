<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:32:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrProyecto
 * 
 * @property int $id
 * @property string $nombre_proyecto
 * @property int $usuario_id
 * @property \Carbon\Carbon $fecha_est_inicio
 * @property \Carbon\Carbon $fecha_est_fin
 * @property int $cant_horas_total_asig
 * @property int $cant_horas_total_consum
 * @property bool $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $estado_proyecto_id
 * 
 * @property \App\Models\TrEstadosProyecto $tr_estados_proyecto
 * @property \App\Models\CotzUsuario $cotz_usuario
 * @property \Illuminate\Database\Eloquent\Collection $tr_tareas
 *
 * @package App\Models
 */
class TrProyecto extends Eloquent
{
	protected $casts = [
		'usuario_id' => 'int',
		'cant_horas_total_asig' => 'int',
		'cant_horas_total_consum' => 'int',
		'activo' => 'bool',
		'estado_proyecto_id' => 'int'
	];

	protected $dates = [
		'fecha_est_inicio',
		'fecha_est_fin'
	];

	protected $fillable = [
		'nombre_proyecto',
		'usuario_id',
		'fecha_est_inicio',
		'fecha_est_fin',
		'cant_horas_total_asig',
		'cant_horas_total_consum',
		'activo',
		'estado_proyecto_id'
	];

	public function tr_estados_proyecto()
	{
		return $this->belongsTo(\App\Models\TrEstadosProyecto::class, 'estado_proyecto_id');
	}

	public function cotz_usuario()
	{
		return $this->belongsTo(\App\Models\CotzUsuario::class, 'usuario_id');
	}

	public function tr_tareas()
	{
		return $this->hasMany(\App\Models\TrTarea::class, 'proyecto_id');
	}
}
