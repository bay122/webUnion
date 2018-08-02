<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $ingoing_id
 * @property string $ingoing_type
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
