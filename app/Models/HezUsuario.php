<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Feb 2019 16:49:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class HezUsuario
 * 
 * @property int $id_Usuarios
 * @property int $cod_Empleado
 * @property string $password
 * @property string $email
 * @property int $cod_Rol
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezEmpleado $hez_empleado
 * @property \App\Models\HezRole $hez_role
 * @property \Illuminate\Database\Eloquent\Collection $pm_logs
 * @property \Illuminate\Database\Eloquent\Collection $pm_proyectos
 * @property \Illuminate\Database\Eloquent\Collection $pm_tareas
 * @property \Illuminate\Database\Eloquent\Collection $pm_tiempostareas
 * @property \Illuminate\Database\Eloquent\Collection $pm_usuario_tareas
 *
 * @package App\Models
 */
class HezUsuario extends Authenticatable
{
    use Notifiable;

    public $timestamps = true;
    protected $guard = 'usuarios';
	protected $primaryKey = 'id_Usuarios';
    protected $table='hez_usuarios';
	protected $casts = [
		'cod_Empleado' => 'int',
		'cod_Rol' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'cod_Empleado',
		'password',
		'email',
		'cod_Rol'
	];

	public function hez_empleado()
	{
		return $this->belongsTo(\App\Models\HezEmpleado::class, 'cod_Empleado');
	}

	public function hez_role()
	{
		return $this->belongsTo(\App\Models\HezRole::class, 'cod_Rol');
	}

	public function pm_logs()
	{
		return $this->hasMany(\App\Models\PmLog::class, 'usuario_id');
	}

	public function pm_proyectos()
	{
		return $this->hasMany(\App\Models\PmProyecto::class, 'usuario_id');
	}

	public function pm_tareas()
	{
		return $this->hasMany(\App\Models\PmTarea::class, 'usuario_id');
	}

	public function pm_tiempostareas()
	{
		return $this->hasMany(\App\Models\PmTiempostarea::class, 'usuario_id');
	}

	public function pm_usuario_tareas()
	{
		return $this->hasMany(\App\Models\PmUsuarioTarea::class, 'usuario_id');
	}
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
}
