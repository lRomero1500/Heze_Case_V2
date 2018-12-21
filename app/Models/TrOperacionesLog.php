<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 19:32:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TrOperacionesLog
 * 
 * @property int $id
 * @property string $nombre_operacion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tr_logs
 *
 * @package App\Models
 */
class TrOperacionesLog extends Eloquent
{
	protected $fillable = [
		'nombre_operacion'
	];

	public function tr_logs()
	{
		return $this->hasMany(\App\Models\TrLog::class, 'operaciones_log_id');
	}
}
