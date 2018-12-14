<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    public $timestamps = true;
    protected $guard = 'usuarios';
    protected $primaryKey = 'id_Usuarios';
    protected $table='cotz_usuarios';
    protected $fillable=['cod_Empleado','email','password','cod_Rol'];
    protected $hidden=['id_Usuarios','cod_Empleado',];

    public function empleados(){
        return $this->hasOne(Empleados::class,'cod_Empleado','cod_Empleado');
    }
    public function roles(){
        return $this->hasOne(Rol::class,'cod_Rol','cod_Rol');
    }
    public function detalle(){
        return $this->hasMany(RolDetalle::class,'cod_Rol','cod_Rol');
    }
}

