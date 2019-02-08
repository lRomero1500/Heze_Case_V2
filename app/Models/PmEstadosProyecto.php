<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:27:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrEstadosProyecto
 * 
 * @property int $id
 * @property string $nombre_estado
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tr_proyectos
 *
 * @package App\Models
 */
class PmEstadosProyecto extends Eloquent
{
	protected $fillable = [
		'nombre_estado'
	];

	public function pm_proyectos()
	{
		return $this->hasMany(\App\Models\PmProyecto::class, 'estado_proyecto_id');
	}
}
