<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Mar 2019 14:52:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PmImportanciaProyecto
 * 
 * @property int $id
 * @property string $importancia
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class PmImportanciaProyecto extends Eloquent
{
	protected $fillable = [
	    'id',
		'importancia'
	];
}
