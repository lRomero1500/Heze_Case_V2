<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 01 Apr 2019 16:49:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PmProyecto
 * 
 * @property int $id
 * @property string $nombre_proyecto
 * @property int $usuario_id
 * @property int $estado_proyecto_id
 * @property int $clienteemp_id
 * @property \Carbon\Carbon $fecha_est_inicio
 * @property \Carbon\Carbon $fecha_est_fin
 * @property int $cant_horas_total_asig
 * @property int $cant_horas_total_consum
 * @property string $observaciones
 * @property int $usuario_resp_id
 * @property string $lider_resp_nombre
 * @property bool $activo
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property int $importancia_proyecto_id
 * 
 * @property \App\Models\HezClientesemp $hez_clientesemp
 * @property \App\Models\PmImportanciaProyecto $pm_importancia_proyecto
 * @property \App\Models\PmEstadosProyecto $pm_estados_proyecto
 * @property \App\Models\HezUsuario $hez_usuario
 * @property \Illuminate\Database\Eloquent\Collection $pm_tareas
 *
 * @package App\Models
 */
class PmProyecto extends Eloquent
{
	protected $casts = [
		'usuario_id' => 'int',
		'estado_proyecto_id' => 'int',
		'clienteemp_id' => 'int',
		'cant_horas_total_asig' => 'int',
		'cant_horas_total_consum' => 'int',
		'usuario_resp_id' => 'int',
		'activo' => 'bool',
		'importancia_proyecto_id' => 'int'
	];

	protected $dates = [
		'fecha_est_inicio',
		'fecha_est_fin'
	];

	protected $fillable = [
	    'id',
		'nombre_proyecto',
		'usuario_id',
		'estado_proyecto_id',
		'clienteemp_id',
		'fecha_est_inicio',
		'fecha_est_fin',
		'cant_horas_total_asig',
		'cant_horas_total_consum',
		'observaciones',
		'usuario_resp_id',
		'lider_resp_nombre',
		'activo',
		'importancia_proyecto_id'
	];

	public function hez_clientesemp()
	{
		return $this->belongsTo(\App\Models\HezClientesemp::class, 'clienteemp_id');
	}

	public function pm_importancia_proyecto()
	{
		return $this->belongsTo(\App\Models\PmImportanciaProyecto::class, 'importancia_proyecto_id');
	}

	public function pm_estados_proyecto()
	{
		return $this->belongsTo(\App\Models\PmEstadosProyecto::class, 'estado_proyecto_id');
	}

	public function hez_usuario()
	{
		return $this->belongsTo(\App\Models\HezUsuario::class, 'usuario_id');
	}

	public function pm_tareas()
	{
		return $this->hasMany(\App\Models\PmTarea::class, 'proyecto_id');
	}
}
