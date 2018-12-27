<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 16:20:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CotzDepartamento
 * 
 * @property int $id
 * @property string $departamento
 * @property int $cod_Companias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class CotzDepartamento extends Eloquent
{
	protected $casts = [
		'cod_Companias' => 'int'
	];

	protected $fillable = [
		'departamento',
		'cod_Companias'
	];
}
