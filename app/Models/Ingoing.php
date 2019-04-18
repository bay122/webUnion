<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $ingoing_id
 * @property string $ingoing_type
 *
 * Ingoing (Entrante): se encarga de registrar en la tabla ingoing los registros entrantes
 * Esto lo utiliza para determinar cuales son los nuevos registros y listara en el dashboard (nuevos usuarios, nuevos comentarios, etc.)
 * En la practica, es bastante inutil, porque podria reemplazarse por un campo en la tabla en cuestión y facilitar mucho mas el desarrollo
 */
class Ingoing extends Model
{
	/**
     * Morph To relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
	public function ingoing()
	{
		return $this->morphTo();
	}
}
