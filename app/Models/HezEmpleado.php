<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 01 Mar 2019 21:30:27 +0000.
 */

namespace App\Models;

use Illuminate\Support\Carbon;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezEmpleado
 * 
 * @property int $cod_Empleado
 * @property string $documentoEmpleado
 * @property int $tipo_Doc_Empleado
 * @property string $nombre_Empleado
 * @property int $sexo_Empleado
 * @property \Carbon\Carbon $fecha_Nac_Empleado
 * @property string $telf_Celular_Empleado
 * @property string $telf_Corporativo_Empleado
 * @property string $email_contacto
 * @property string $email_corporativo
 * @property int $cod_Companias
 * @property int $porc_Descuento
 * @property int $porc_Ganacia
 * @property string $url_ImgPerfil
 * @property int $departamento_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\HezCompania $hez_compania
 * @property \App\Models\HezDepartamento $hez_departamento
 * @property \App\Models\HezTipoDocumento $hez_tipo_documento
 * @property \Illuminate\Database\Eloquent\Collection $hez_usuarios
 *
 * @package App\Models
 */
class HezEmpleado extends Eloquent
{
	protected $primaryKey = 'cod_Empleado';

	protected $casts = [
	    'cod_Empleado',
		'tipo_Doc_Empleado' => 'int',
		'sexo_Empleado' => 'int',
		'cod_Companias' => 'int',
		'porc_Descuento' => 'int',
		'porc_Ganacia' => 'int',
		'departamento_id' => 'int'
	];

    protected $dates = [
        'fecha_Nac_Empleado'
    ];

	protected $fillable = [
	    'cod_Empleado',
		'documentoEmpleado',
		'tipo_Doc_Empleado',
		'nombre_Empleado',
		'sexo_Empleado',
		'fecha_Nac_Empleado',
		'telf_Celular_Empleado',
		'telf_Corporativo_Empleado',
		'email_contacto',
		'email_corporativo',
		'cod_Companias',
		'porc_Descuento',
		'porc_Ganacia',
		'url_ImgPerfil',
		'departamento_id'
	];

	public function hez_compania()
	{
		return $this->belongsTo(\App\Models\HezCompania::class, 'cod_Companias');
	}

	public function hez_departamento()
	{
		return $this->belongsTo(\App\Models\HezDepartamento::class, 'departamento_id');
	}

	public function hez_tipo_documento()
	{
		return $this->belongsTo(\App\Models\HezTipoDocumento::class, 'tipo_Doc_Empleado');
	}

	public function hez_usuarios()
	{
		return $this->hasOne(\App\Models\HezUsuario::class, 'cod_Empleado');
	}
    public function setFechaNacEmpleadoAttribute($value){
	    try{
            $this->attributes['fecha_Nac_Empleado'] = Carbon::createFromFormat('d/m/Y',$value);
        }
        catch (\Exception $err){
            $this->attributes['fecha_Nac_Empleado']= new Carbon($value);
        }

    }
}
