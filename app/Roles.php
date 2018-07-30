<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $gl_nombre
 * @property string $gl_json_permisos
 */
class Roles extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'gl_json_permisos'];

}
