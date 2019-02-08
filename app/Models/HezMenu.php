<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Feb 2019 16:13:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use stdClass;

/**
 * Class HezMenu
 * 
 * @property int $cod_menu
 * @property string $nom_menu
 * @property string $url_menu
 * @property string $cod_seg
 * @property int $cod_menu_padre
 * @property string $url_icono
 * @property bool $activo
 * @property int $pos_menu
 * @property int $orden_menu
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $hez_detalle_roles
 *
 * @package App\Models
 */
class HezMenu extends Eloquent
{
	protected $table = 'hez_menu';
	protected $primaryKey = 'cod_menu';

	protected $casts = [
		'cod_menu_padre' => 'int',
		'activo' => 'bool',
		'pos_menu' => 'int',
		'orden_menu' => 'int'
	];

	protected $fillable = [
		'nom_menu',
		'url_menu',
		'cod_seg',
		'cod_menu_padre',
		'url_icono',
		'activo',
		'pos_menu',
		'orden_menu'
	];

	public function hez_detalle_roles()
	{
		return $this->hasMany(\App\Models\HezDetalleRole::class, 'cod_menu');
	}
    public static function newFromStd(stdClass $std, $fill = ['*'], $exists = true)
    {
        $instance = new self();

        $values = ($fill == ['*'])
            ? (array) $std
            : array_intersect_key( (array) $std, array_flip($fill));

        $instance->setRawAttributes($values, true);

        $instance->exists = $exists;

        return $instance;
    }
    public static function newCollectionFromStds(array $stds, $fill = ['*'], $exists = true)
    {
        $collection = new \Illuminate\Database\Eloquent\Collection;
        foreach ($stds as $std) {
            $instance = new self();

            $values = ($fill == ['*'])
                ? (array) $std
                : array_intersect_key( (array) $std, array_flip($fill));

            $instance->setRawAttributes($values, true);

            $instance->exists = $exists;

            $collection->push($instance);
        }
        return $collection;
    }
}
