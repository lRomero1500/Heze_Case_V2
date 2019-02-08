<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Feb 2019 16:15:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HezTipoDocumento
 * 
 * @property int $tipo_Doc_Empleado
 * @property string $nom_Tipo_Documento
 * 
 * @property \Illuminate\Database\Eloquent\Collection $hez_empleados
 *
 * @package App\Models
 */
class HezTipoDocumento extends Eloquent
{
	protected $table = 'hez_tipo_documento';
	protected $primaryKey = 'tipo_Doc_Empleado';
	public $timestamps = false;

	protected $fillable = [
		'nom_Tipo_Documento'
	];

	public function hez_empleados()
	{
		return $this->hasMany(\App\Models\HezEmpleado::class, 'tipo_Doc_Empleado');
	}
}
