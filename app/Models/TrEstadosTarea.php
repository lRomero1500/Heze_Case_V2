<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:29:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrEstadosTarea
 * 
 * @property int $id
 * @property string $nombre_estado
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tr_tareas
 *
 * @package App\Models
 */
class TrEstadosTarea extends Eloquent
{
	protected $fillable = [
		'nombre_estado'
	];

	public function tr_tareas()
	{
		return $this->hasMany(\App\Models\TrTarea::class, 'estado_tarea_id');
	}
}
